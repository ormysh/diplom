<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="dashboard.php">Админ панель</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="fa fa-user-circle"></i> Админ <span class="caret"></span></a>
                    <ul id="g-account-menu" class="dropdown-menu" role="menu">
                        <li><a href="profile.php"><i class="fa fa-user-secret"></i> Мой профиль</a></li>
						<li><a href="change_password.php"><i class="fa fa-lock"></i> Сменить пароль</a></li>
                    </ul>
                </li>
                <li><a href="logout.php"><i class="fa fa-sign-out"></i> Выйти</a></li>
            </ul>
        </div>
    </div>    
</div>
<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
    <ul class="nav nav-pills nav-stacked" style="border-right:1px solid black">       
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Админ панель</a></li>
        <li><a href="user_list.php"><i class="fa fa-tags"></i> Список пользователей</a></li>    
        <li><a href="product_list.php"><i class="fa fa-tags"></i> Список товаров</a></li>    
	</ul>
</div>
