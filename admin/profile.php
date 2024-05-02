<?php 
include('../class/User.php');
$user = new User();
$user->adminLoginStatus();
$message  = '';
$userDetail = $user->adminDetails();
include('include/header.php');
?>

<link rel="stylesheet" href="css/style.css">

<div class="contact">	
	
	<?php include 'menus.php'; ?>
	<div class="table-responsive">		
		<div><span style="font-size:20px;">Сведения об администраторе:</span><div class="pull-right"></div>
		<table class="table table-boredered">		
			<tr>
				<th>Имя</th>
				<td><?php echo $userDetail['surname']." ".$userDetail['name']." ".$userDetail['patronymic']; ?></td>
			</tr>
			<tr>
				<th>Почта</th>
				<td><?php echo $userDetail['email']; ?></td>
			</tr>
			<tr>
				<th>Пароль</th>
				<td>**********</td>
			</tr>
			<tr>
				<th>Пол</th>
				<td><?php echo $userDetail['gender']; ?></td>
			</tr>
			<tr>
				<th>Телефон</th>
				<td><?php echo $userDetail['phone_number']; ?></td>
			</tr>

			<tr>
				<th>Тип пользователя</th>
				<td><?php echo $userDetail['type']; ?></td>
			</tr>		
		</table>
	</div>
</div>	
<?php include('include/footer.php');?>