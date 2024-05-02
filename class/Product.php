<?php
require_once('include/config.php');
class Product extends Dbconfig {	
    protected $hostName;
    protected $userName;
    protected $password;
	protected $dbName;
	private $ProductTable = 'product';
	private $CategoryTable = 'category';
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
		
	public function ProductDetails () {
		$sqlQuery = "SELECT * FROM ".$this->ProductTable." 
			WHERE id_product ='".$_SESSION["id_product"]."'";
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$productDetails = mysqli_fetch_assoc($result);
		return $productDetails;
	}	
	
	public function getProductList(){		
		$sqlQuery = "SELECT * FROM ".$this->ProductTable;
		if(!empty($_POST["search"]["value"])){
			$sqlQuery .= '(id_product LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR name LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR id_category LIKE "%'.$_POST["search"]["value"].'%" ';									
		}
		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'ORDER BY id DESC ';
		}
		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}	

		
		$sqlQuery = "SELECT p.id_product, p.name, p.code, p.image, p.price, p.discount, p.price_without_discount, p.composition, p.remaining, p.quantity, p.calories, p.status, c.name AS category_name FROM ".$this->ProductTable." AS p INNER JOIN ".$this->CategoryTable." AS c ON p.id_category = c.id_category";
		
    		$result = mysqli_query($this->dbConnect, $sqlQuery);
    
    		if($result === false) {
        		// Обработка ошибки запроса
       			echo "Ошибка запроса: " . mysqli_error($this->dbConnect);
        		return;
    		}
		
		$productData = array();	
		while( $product = mysqli_fetch_assoc($result) ) {		
			$productRows = array();
			$status = '';
			if($product['status'] == 'Актуален')	{
				$status = '<span class="label label-success">Актуален</span>';
			} else if($product['status'] == 'Удален') {
				$status = '<span class="label label-danger">Удален</span>';
			}
			$productRows[] = '<button type="button" name="update" id_product ="'.$product["id_product"].'" class="btn btn-warning btn-xs update">Редактировать</button>';
			$productRows[] = '<button type="button" name="delete" id_product="'.$product["id_product"].'" class="btn btn-danger btn-xs delete" >Удалить</button>';
			$productRows[] = $product['id_product'];
			$productRows[] = $product['name'];
			$productRows[] = $product['code'];	
			$productRows[] = $product['image'];		
			$productRows[] = $product['price'];				
			$productRows[] = $product['discount'];	
			$productRows[] = $product['price_without_discount'];
			$productRows[] = $product['composition'];
			$productRows[] = $product['category_name'];
			$productRows[] = $product['quantity'];
			$productRows[] = $product['calories'];
			$productRows[] = $status;						
			
			$productData[] = $productRows;
		}
		
		$numRows = count($productData);

		
		$output = array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"  	=>  $numRows,
			"recordsFiltered" 	=> 	$numRows,
			"data"    			=> 	$productData
		);
		echo json_encode($output);
	}
	public function deleteProduct(){
		if($_POST["id_product"]) {
			$sqlUpdate = "
				UPDATE ".$this->ProductTable." SET status = 'Удален'
				WHERE id_product = '".$_POST["id_product"]."'";		
			mysqli_query($this->dbConnect, $sqlUpdate);		
		}
	}
	public function getProduct(){
		$sqlQuery = "
			SELECT * FROM ".$this->ProductTable." 
			WHERE id_product = '".$_POST["id_product"]."'";
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		echo json_encode($row);
	}
	public function updateProduct() {
		if($_POST['id_product']) {	
			$updateQuery = "UPDATE ".$this->ProductTable." 
			SET name = '".$_POST["name"]."', code = '".$_POST["code"]."', image = '".$_POST["image"]."', price = '".$_POST["price"]."', discount = '".$_POST["discount"]."' , price_without_discount = '".$_POST["price_without_discount"]."' , composition = '".$_POST["composition"]."', id_category = '".$_POST["id_category"]."', quantity = '".$_POST["quantity"]."', calories = '".$_POST["calories"]."', status = '".$_POST["status"]."'
			WHERE id_product ='".$_POST["id_product"]."'";
			$isUpdated = mysqli_query($this->dbConnect, $updateQuery);		
		}	
	}	
	
	public function addProduct() {
    $message = '';

    // Проверяем наличие всех необходимых POST параметров
    if(isset($_POST["code"], $_POST["name"], $_POST["image"], $_POST["price"], $_POST["discount"], $_POST["price_without_discount"], $_POST["composition"], $_POST["id_category"], $_POST['quantity'], $_POST['calories'])) {	

        // Подготавливаем SQL запрос с использованием подготовленного выражения для предотвращения SQL инъекций
        $checkProductQuery = "SELECT * FROM ".$this->ProductTable." WHERE code=?";
        $stmt = mysqli_prepare($this->dbConnect, $checkProductQuery);
        mysqli_stmt_bind_param($stmt, "s", $_POST["code"]);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        // Проверяем, существует ли товар с указанным кодом
        if(mysqli_stmt_num_rows($stmt) > 0) {
            $message = "Товар с этим кодом уже существует.";
        } else {
            // Подготавливаем SQL запрос на вставку нового продукта
            $insertQuery = "INSERT INTO ".$this->ProductTable."(name, code, image, price, discount, price_without_discount, composition, id_category, quantity, calories, status) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Актуален')";
            $stmt = mysqli_prepare($this->dbConnect, $insertQuery);
            mysqli_stmt_bind_param($stmt, "ssssssssss", $_POST["name"], $_POST["code"], $_POST["image"], $_POST["price"], $_POST["discount"], $_POST["price_without_discount"], $_POST["composition"], $_POST["id_category"], $_POST['quantity'], $_POST['calories']);
            
            // Выполняем запрос на вставку нового продукта
            if(mysqli_stmt_execute($stmt)) {
                $message = "Продукт успешно добавлен.";
            } else {
                $message = "Ошибка при добавлении продукта.";
            }
        }

        // Закрываем подготовленное выражение
        mysqli_stmt_close($stmt);
    } else {
        $message = "Недостаточно данных для добавления продукта.";
    }

    return $message;
}
	
	public function totalProduct($status) {
    		$query = '';
    		if ($status) {
       			$query = " AND status = '".$status."'";
    		}
    		$sqlQuery = "SELECT * FROM ".$this->ProductTable;
    		if (!empty($query)) {
        		$sqlQuery .= " WHERE 1 ".$query;
    		}
    		$result = mysqli_query($this->dbConnect, $sqlQuery);
    		if ($result) {
        		$numRows = mysqli_num_rows($result);
        		return $numRows;
    		} else {
        		// Обработка ошибки запроса
        	return false;
    	}
    	
    	
}





	
}
?>