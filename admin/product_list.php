<?php 

include('../class/Product.php');
$product = new Product();
include('include/header.php');
?>

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/product.js"></script>	
<link rel="stylesheet" href="css/style.css">

<div class="contact">	
	
	<?php include 'menus.php'; ?>
	<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">   
		<a href="#"><strong><span class="fa fa-dashboard"></span> Список товаров </strong></a>
		<hr>		
		<div class="panel-heading">
			<div class="row">
				<div class="col-md-10">
					<h3 class="panel-title"></h3>
				</div>
				<div class="col-md-2" align="right">
					<button type="button" name="add" id="addProduct" class="btn btn-success btn-xs">Добавить</button>
				</div>
			</div>
		</div>
		<table id="ProductList" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th></th>
					<th></th>
					<th>ID</th>
					<th>Название</th>					
					<th>Код</th>
					<th>Путь к картинке</th>
					<th>Цена</th>
					<th>Скидка</th>
					<th>Цена без скидки</th>					
					<th>Описание</th>
					<th>Категория</th>
					<th>Количество</th>
					<th>Калории</th>
					<th>Статус</th>
					
				</tr>
			</thead>
		</table>
	</div>
	<div id="productModal" class="modal fade">
    	<div class="modal-dialog">
    		<form method="post" id="productForm">
    			<div class="modal-content">
    				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Редактировать товар</h4>
    				</div>
    				<div class="modal-body">
						<div class="form-group">
							<label for="name" class="control-label">Название*</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Название" required>							
						</div>
						<div class="form-group">
							<label for="code" class="control-label">Код</label>							
							<input type="text" class="form-control" id="code" name="code" placeholder="Код">							
						</div>
						<div class="form-group">
							<label for="image" class="control-label">Путь к картинке</label>							
							<input type="text" class="form-control" id="image" name="image" placeholder="Путь к картинке">							
						</div>	   	
						<div class="form-group">
							<label for="price" class="control-label">Цена*</label>							
							<input type="text" class="form-control"  id="price" name="price" placeholder="Цена" required>							
						</div>	 
						<div class="form-group">
							<label for="discount" class="control-label">Скидка*</label>							
							<input type="text" class="form-control"  id="discount" name="discount" placeholder="Скидка" null>							
						</div>							
						<div class="form-group">
							<label for="price_without_discount" class="control-label">Цена без скидки</label>							
							<input type="text" class="form-control" id="price_without_discount" name="price_without_discount" placeholder="Цена без скидки" null>							
						</div>	 
						<div class="form-group">
							<label for="composition" class="control-label">Описание</label>							
							<input type="text" class="form-control" id="composition" name="composition" placeholder="Описание">							
						</div>	
						<div class="form-group">
							<label for="id_category" class="control-label">Категория</label>							
							
							<select id="id_category" name="id_category" required>
            <?php
                // Подключение к базе данных и получение списка категорий
                $dbConnect = mysqli_connect("localhost", "malestick", "ma465", "malestick");
                $categoryQuery = "SELECT * FROM category";
                $categoryResult = mysqli_query($dbConnect, $categoryQuery);

                // Выводим каждую категорию в виде опции выпадающего списка
                while($row = mysqli_fetch_assoc($categoryResult)) {
                    echo "<option value='".$row['id']."'>".$row['name']."</option>";
                }

                // Закрываем соединение с базой данных
                mysqli_close($dbConnect);
            ?>
        </select>				 						
						</div>	
						<div class="form-group">
							<label for="quantity" class="control-label">Количество</label>							
							<input type="text" class="form-control" id="quantity" name="quantity" placeholder="Количество">							
						</div>	
						<div class="form-group">
							<label for="calories" class="control-label">Калории</label>							
							<input type="text" class="form-control" id="calories" name="calories" placeholder="Калории">							
						</div>	
							
						<div class="form-group">
							<label for="gender" class="control-label">Статус</label>							
							<label class="radio-inline">
								<input type="radio" name="status" id="Актуален" value="Актуален" required>Актуален
							</label>
							<label class="radio-inline">
								<input type="radio" name="status" id="Удален" value="Удален" required>Удален
							</label>							
						</div>
						
    				</div>
    				<div class="modal-footer">
    					<input type="hidden" name="id_product" id="id_product" />
    					<input type="hidden" name="action" id="action" value="updateProduct" />
    					<input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
    					<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
    				</div>
    			</div>
    		</form>
    	</div>
    </div>
</div>	
<?php include('include/footer.php');?>