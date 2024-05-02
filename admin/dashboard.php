<?php 
include('../class/User.php');
$user = new User();
$user->adminLoginStatus();
include('../class/Product.php');
$product = new Product();
include('include/header.php');
?>

<link rel="stylesheet" href="css/style.css">

<div class="contact">	
	
	<?php include 'menus.php'; ?>
	<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">   
		<a href="#"><strong><span class="fa fa-dashboard"></span> Моя панель</strong></a>
		<hr>		
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<p class="ms-1">Пользователи</p>
					<div class="col-md-3">
						<div class="panel panel-default">
							<div class="panel-body bk-primary text-light">
								<div class="stat-panel text-center">
									<div class="stat-panel-number h1 "><?php echo $user->totalUsers(""); ?></div>
									<div class="stat-panel-title text-uppercase">Общее количество</div>
								</div>
							</div>											
						</div>
					</div>
					<div class="col-md-3">
						<div class="panel panel-default">
							<div class="panel-body bk-success text-light">
								<div class="stat-panel text-center">
									<div class="stat-panel-number h1 "><?php echo $user->totalUsers('Действителен'); ?></div>
									<div class="stat-panel-title text-uppercase">Активные</div>
								</div>
							</div>											
						</div>
					</div>		
					<div class="col-md-3">
						<div class="panel panel-default">
							<div class="panel-body bk-warning text-light">
								<div class="stat-panel text-center">
									<div class="stat-panel-number h1 "><?php echo $user->totalUsers('В ожидании'); ?></div>
									<div class="stat-panel-title text-uppercase">В ожидании</div>
								</div>
							</div>											
						</div>
					</div>													
					<div class="col-md-3">
						<div class="panel panel-default">
							<div class="panel-body bk-danger text-light">
								<div class="stat-panel text-center">												
									<div class="stat-panel-number h1 "><?php echo $user->totalUsers('Удален'); ?></div>
									<div class="stat-panel-title text-uppercase">Удаленные</div>
								</div>
							</div>											
						</div>
					</div>							
				</div>
				<hr>
				<div class="row">
				<p class="ms-1">Товары</p>
					<div class="col-md-3">
						<div class="panel panel-default">
							<div class="panel-body bk-primary text-light">
								<div class="stat-panel text-center">
									<div class="stat-panel-number h1 "><?php echo $product->totalProduct(""); ?></div>
									<div class="stat-panel-title text-uppercase">Общее количество</div>
								</div>
							</div>											
						</div>
					</div>
					<div class="col-md-3">
						<div class="panel panel-default">
							<div class="panel-body bk-success text-light">
								<div class="stat-panel text-center">
									<div class="stat-panel-number h1 "><?php echo $product->totalProduct('Актуален'); ?></div>
									<div class="stat-panel-title text-uppercase">Актуальные</div>
								</div>
							</div>											
						</div>
					</div>		
																		
					<div class="col-md-3">
						<div class="panel panel-default">
							<div class="panel-body bk-danger text-light">
								<div class="stat-panel text-center">												
									<div class="stat-panel-number h1 "><?php echo $product->totalProduct('Удален'); ?></div>
									<div class="stat-panel-title text-uppercase">Удаленные</div>
								</div>
							</div>											
						</div>
					</div>							
				</div>
			</div>
		</div>		
	</div>
</div>	
<?php include('include/footer.php');?>