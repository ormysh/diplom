$(document).ready(function(){
	var ProductData = $('#ProductList').DataTable({
		"lengthChange": false,
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"action.php",
			type:"POST",
			data:{action:'listProduct'},
			dataType:"json"
		},
		"columnDefs":[
			{
				"targets":[0, 1, 2],
				"orderable":false,
			},
		],
		"pageLength": 10
	});		
	$(document).on('click', '.delete', function(){
		var id_product = $(this).attr("id_product");		
		var action = "ProductDelete";
		if(confirm("Вы уверены, что хотите удалить этот товар?")) {
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{id_product:id_product, action:action},
				success:function(data) {					
					productData.ajax.reload();
				}
			})
		} else {
			return false;
		}
	});	
	$('#addProduct').click(function(){
	
		$('#productModal').modal('show');
		$('#productForm')[0].reset();
		$('#passwordSection').show();
		$('.modal-title').html("<i class='fa fa-plus'></i> Добавить товар");
		$('#action').val('addProduct');
		$('#save').val('Добавить товар');
		if (errorMessage !== '') {
		var errorMessage = "<?php echo ($errorMessage != '') { ?>";
		}
	});	
	$(document).on('click', '.update', function(){
		var id_product = $(this).attr("id_product");
		var action = 'getProduct';
		$.ajax({
			url:'action.php',
			method:"POST",
			data:{id_product:id_product, action:action},
			dataType:"json",
			success:function(data){
				$('#productModal').modal('show');
				$('#id_product').val(data.id_product);
				$('#name').val(data.name);
				$('#code').val(data.code);
				$('#image').val(data.image);
				$('#price').val(data.price);
				$('#discount').val(data.discount);
				$('#price_without_discount').val(data.price_without_discount);	
				$('#composition').val(data.composition);
				$('#id_category').val(data.id_category);	
				$('#quantity').val(data.quantity);
				$('#calories').val(data.calories);		
				if(data.status == 'Актуален') {
					$('#Актуален').prop("checked", true);
				} else if(data.status == 'Удален') {
					$('#Удален').prop("checked", true);
				}									
				$('.modal-title').html("<i class='fa fa-plus'></i> Редактировать товар");
				$('#action').val('updateProduct');
				$('#save').val('Сохранить');
			}
		})
	});	
	$(document).on('submit','#productForm', function(event){
		event.preventDefault();
		$('#save').attr('disabled','disabled');
		var formData = $(this).serialize();
		$.ajax({
			url:"action.php",
			method:"POST",
			data:formData,
			success:function(data){				
				$('#productForm')[0].reset();
				$('#productModal').modal('hide');				
				$('#save').attr('disabled', false);
				productData.ajax.reload();
			}
		})
	});	
});