<?php 
include('../class/User.php');
$user = new User();
$user->adminLoginStatus();
include('include/header.php');
?>

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/users.js"></script>	
<link rel="stylesheet" href="css/style.css">

<div class="contact">	
	
	<?php include 'menus.php'; ?>
	<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">   
		<a href="#"><strong><span class="fa fa-dashboard"></span> Список пользователей </strong></a>
		<hr>		
		<div class="panel-heading">
			<div class="row">
				<div class="col-md-10">
					<h3 class="panel-title"></h3>
				</div>
				<div class="col-md-2" align="right">
					<button type="button" name="add" id="addUser" class="btn btn-success btn-xs">Добавить</button>
				</div>
			</div>
		</div>
		<table id="userList" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Имя</th>					
					<th>Пол</th>
					<th>Дата рождения</th>
					<th>Почта</th>
					<th>Телефон</th>
					<th>Роль</th>					
					<th>Статус</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
		</table>
	</div>
	<div id="userModal" class="modal fade">
    	<div class="modal-dialog">
    		<form method="post" id="userForm">
    			<div class="modal-content">
    				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Редактировать пользователя</h4>
    				</div>
    				<div class="modal-body">
						<div class="form-group">
							<label for="name" class="control-label">Имя*</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Имя" required>							
						</div>
						<div class="form-group">
							<label for="surname" class="control-label">Отчество</label>							
							<input type="text" class="form-control" id="patronymic" name="patronymic" placeholder="Отчество" null>							
						</div>
						<div class="form-group">
							<label for="surname" class="control-label">Фамилия</label>							
							<input type="text" class="form-control" id="surname" name="surname" placeholder="Фамилия">							
						</div>	   	
						<div class="form-group">
							<label for="surname" class="control-label">Почта*</label>							
							<input type="text" class="form-control"  id="email" name="email" placeholder="Почта" required>							
						</div>	 
						<div class="form-group">
							<label for="surname" class="control-label">Дата рождения*</label>							
							<input type="date" class="form-control"  id="birth_date" name="birth_date" placeholder="Дата рождения" required>							
						</div>	
						<div class="form-group" id="passwordSection">
							<label for="surname" class="control-label">Пароль*</label>							
							<input type="password" class="form-control"  id="password" name="password" placeholder="Пароль" required>							
						</div>
						<div class="form-group">
							<label for="gender" class="control-label">Пол</label>							
							<label class="radio-inline">
								<input type="radio" name="gender" id="Мужской" value="Мужской" required>Мужской
							</label>
							<label class="radio-inline">
								<input type="radio" name="gender" id="Женский" value="Женский" required>Женский
							</label>							
						</div>	
						<div class="form-group">
							<label for="surname" class="control-label">Телефон</label>							
							<input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Телефон">							
						</div>	 
							
						<div class="form-group">
							<label for="gender" class="control-label">Статус</label>							
							<label class="radio-inline">
								<input type="radio" name="status" id="Действителен" value="Действителен" required>Действителен
							</label>
							<label class="radio-inline">
								<input type="radio" name="status" id="В ожидании" value="В ожидании" required>В ожидании
							</label>							
						</div>
						<div class="form-group">
							<label for="type" class="control-label">Тип пользователя</label>							
							<label class="radio-inline">
								<input type="radio" name="type" id="Пользователь" value="Пользователь" required>Пользователь
							</label>
							<label class="radio-inline">
								<input type="radio" name="type" id="Администратор" value="Администратор" required>Администратор
							</label>							
						</div>	
    				</div>
    				<div class="modal-footer">
    					<input type="hidden" name="id_users" id="id_users" />
    					<input type="hidden" name="action" id="action" value="updateUser" />
    					<input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
    					<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
    				</div>
    			</div>
    		</form>
    	</div>
    </div>
</div>	
<?php include('include/footer.php');?>