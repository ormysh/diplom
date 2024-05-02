<?php
session_start();
require_once('include/config.php');
class User extends Dbconfig {	
    protected $hostName;
    protected $userName;
    protected $password;
	protected $dbName;
	private $userTable = 'users';
	private $dbConnect = false;
    public function __construct(){
        if(!$this->dbConnect){ 		
			$database = new dbConfig();            
            $this -> hostName = 'localhost';
            $this -> userName = 'malestick';
            $this -> password = 'ma465';
			$this -> dbName = 'malestick';			
            $conn = new mysqli($this->hostName, $this->userName, $this->password, $this->dbName);
            if($conn->connect_error){
               die("Ошибка: не удалось подключиться к MySQL: " . $conn->connect_error);
            } else{
                $this->dbConnect = $conn;
            }
        }
    }
	private function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Ошибка в запросе: '. mysqli_error());
		}
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[]=$row;            
		}
		return $data;
	}
	private function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Ошибка в запросе: '. mysqli_error());
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}	

	public function adminLoginStatus (){
		if(empty($_SESSION["adminUserid"])) {
			header("Location: index.php");
		}
	}		
	public function adminLogin(){		
		$errorMessage = '';
		if(!empty($_POST["login"]) && $_POST["email"]!=''&& $_POST["password"]!='') {	
			$email = $_POST['email'];
			$password = $_POST['password'];
			$sqlQuery = "SELECT * FROM ".$this->userTable." 
				WHERE email='".$email."' AND password='".crypt($password, '$6$rounds=5000$mysalt$')."' AND status = 'Действителен' AND type = 'Администратор'";							
			$resultSet = mysqli_query($this->dbConnect, $sqlQuery);
			$isValidLogin = mysqli_num_rows($resultSet);				
			if($isValidLogin){
				$userDetails = mysqli_fetch_assoc($resultSet);
				$_SESSION["adminUserid"] = $userDetails['id_users'];
				$_SESSION["admin"] = $userDetails['name']." ".$userDetails['surname'];
				header("location: dashboard.php"); 		
			} else {		
				$errorMessage = "Неверный логин!";		 
			}
		} else if(!empty($_POST["login"])){
			$errorMessage = "Введите и имя пользователя и пароль!";	
		}
		return $errorMessage; 		
	}
	
	public function getAuthtoken($email) {
		$code = md5(889966);
		$authtoken = $code."".md5($email);
		return $authtoken;
	}	
		
	public function userDetails () {
		$sqlQuery = "SELECT * FROM ".$this->userTable." 
			WHERE id_users ='".$_SESSION["id_users"]."'";
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$userDetails = mysqli_fetch_assoc($result);
		return $userDetails;
	}	
	
	public function getUserList(){		
		$sqlQuery = "SELECT * FROM ".$this->userTable." WHERE id_users !='".$_SESSION['adminUserid']."' ";
		if(!empty($_POST["search"]["value"])){
			$sqlQuery .= '(id_users LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR name LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR surname LIKE "%'.$_POST["search"]["value"].'%" ';			
			$sqlQuery .= ' OR status LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR phone_number LIKE "%'.$_POST["search"]["value"].'%") ';			
		}
		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'ORDER BY id DESC ';
		}
		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}	
		$sqlQuery = "SELECT * FROM ".$this->userTable." WHERE id_users != '".$_SESSION['adminUserid']."' ";
    $result = mysqli_query($this->dbConnect, $sqlQuery);
    
    if($result === false) {
        // Обработка ошибки запроса
        echo "Ошибка запроса: " . mysqli_error($this->dbConnect);
        return;
    }
		
		$userData = array();	
		while( $users = mysqli_fetch_assoc($result) ) {		
			$userRows = array();
			$status = '';
			if($users['status'] == 'Действителен')	{
				$status = '<span class="label label-success">Действителен</span>';
			} else if($users['status'] == 'В ожидании') {
				$status = '<span class="label label-warning">В ожидании</span>';
			} else if($users['status'] == 'Удален') {
				$status = '<span class="label label-danger">Удален</span>';
			}
			$userRows[] = $users['id_users'];
			$userRows[] = ucfirst($users['surname']." ".$users['name']." ".$users['patronymic']);
			$userRows[] = $users['gender'];	
			$userRows[] = $users['birth_date'];		
			$userRows[] = $users['email'];				
			$userRows[] = $users['phone_number'];	
			$userRows[] = $users['type'];
			$userRows[] = $status;						
			$userRows[] = '<button type="button" name="update" id_users="'.$users["id_users"].'" class="btn btn-warning btn-xs update">Редактировать</button>';
			$userRows[] = '<button type="button" name="delete" id_users="'.$users["id_users"].'" class="btn btn-danger btn-xs delete" >Удалить</button>';
			$userData[] = $userRows;
		}
		
		$numRows = count($userData);
		
		$output = array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"  	=>  $numRows,
			"recordsFiltered" 	=> 	$numRows,
			"data"    			=> 	$userData
		);
		echo json_encode($output);
	}
	public function deleteUser(){
		if($_POST["id_users"]) {
			$sqlUpdate = "
				UPDATE ".$this->userTable." SET status = 'Удален'
				WHERE id_users = '".$_POST["id_users"]."'";		
			mysqli_query($this->dbConnect, $sqlUpdate);		
		}
	}
	public function getUser(){
		$sqlQuery = "
			SELECT * FROM ".$this->userTable." 
			WHERE id_users = '".$_POST["id_users"]."'";
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		echo json_encode($row);
	}
	public function updateUser() {
		if($_POST['id_users']) {	
			$updateQuery = "UPDATE ".$this->userTable." 
			SET name = '".$_POST["name"]."', patronymic= '".$_POST["patronymic"]."', surname = '".$_POST["surname"]."', email = '".$_POST["email"]."', birth_date= '".$_POST["birth_date"]."' , phone_number= '".$_POST["phone_number"]."' , gender = '".$_POST["gender"]."', status = '".$_POST["status"]."', type = '".$_POST['type']."'
			WHERE id_users ='".$_POST["id_users"]."'";
			$isUpdated = mysqli_query($this->dbConnect, $updateQuery);		
		}	
	}	
	public function saveAdminPassword(){
		$message = '';
		if($_POST['password'] && $_POST['password'] != $_POST['cpassword']) {
			$message = "Пароль не совпадает с подтвержденным паролем.";
		} else {
		
			$password = $_POST['password'];
				    
				    if (!preg_match('/^(?=.\d)(?=.[a-z].[a-z])(?=.[A-Z])(?=.[А-Яа-я])(?=.*[^a-zA-Z\d]{3}).{12,24}$/', $password)) {
					$missingElements = [];
				    if (!preg_match('/\d/', $password)) {
				        $missingElements[] = 'цифр не менее 1';
				    }
				    if (!preg_match('/.*[a-z].*[a-z]/', $password)) {
				    	$missingElements[] = 'латинских букв не менее 2';
				    }
				    if (!preg_match('/[A-Z]/', $password)) {
				    	$missingElements[] = 'заглавных латинских букв не менее 0';
				    }
				    if (preg_match('/[А-Яа-я]/u', $password)) {
    					$missingElements[] = 'Пароль не должен содержать символов кириллицы';  					
				    }
				    if (!preg_match('/[^a-zA-Z0-9]{3}/', $password)) {
				       $missingElements[] = 'специальных символов не менее 3 (!\/* и т.д.)';
				    }				    
				    if (!preg_match('/^.{12,24}$/', $password)) {
				    	$missingElements[] = 'длина пароля от 12 до 24 символов';
				    }
				
				    if (!empty($missingElements)) {
				       return $errorMessage = 'Пароль не соответствует требованиям. Не хватает: ' . implode('; ', $missingElements);
				        die($errorMessage);
				    }
				    
					}
					
			$sqlUpdate = "
				UPDATE ".$this->userTable." 
				SET password='".crypt($_POST['password'], '$6$rounds=5000$mysalt')."'
				WHERE id_users='".$_SESSION['adminUserid']."' AND type='Администратор'";	
			$isUpdated = mysqli_query($this->dbConnect, $sqlUpdate);	
			if($isUpdated) {
				$message = "Пароль успешно сохранен.";
			}				
		}
		return $message;
	}
	public function adminDetails () {
		$sqlQuery = "SELECT * FROM ".$this->userTable." 
			WHERE id_users ='".$_SESSION["adminUserid"]."'";
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$userDetails = mysqli_fetch_assoc($result);
		return $userDetails;
	}	
	
	
	public function addUser () {
        $message = '';
		if($_POST["email"]) {	

            $sqlQuery = "SELECT * FROM ".$this->userTable." 
				WHERE email='".$_POST["email"]."'";
			$result = mysqli_query($this->dbConnect, $sqlQuery);
			$isUserExist = mysqli_num_rows($result);
			if($isUserExist) {
				$message = "Пользователь с этим адресом электронной почты уже существует.";
			} else {
               

			$authtoken = $this->getAuthtoken($_POST['email']);
			$insertQuery = "INSERT INTO ".$this->userTable."(name, surname, patronymic, birth_date, email, gender, password, phone_number, type, status, authtoken) 
				VALUES ('".$_POST["name"]."', '".$_POST["surname"]."', '".$_POST["patronymic"]."', '".$_POST["birth_date"]."', '".$_POST["email"]."', '".$_POST["gender"]."', '".crypt($_POST["password"], '$6$rounds=5000$mysalt')."', '".$_POST["phone_number"]."', '".$_POST['type']."', 'Действителен', '".$authtoken."')";
			$userSaved = mysqli_query($this->dbConnect, $insertQuery);
		}
	}
    return $message;
	}   
	
	
	public function totalUsers ($status) {
		$query = '';
		if($status) {
			$query = " AND status = '".$status."'";
		}
		$sqlQuery = "SELECT * FROM ".$this->userTable." 
		WHERE id_users !='".$_SESSION["adminUserid"]."' $query";
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}
}
?>