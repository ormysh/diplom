$(document).ready(function(){
	var usersData = $('#userList').DataTable({
		"lengthChange": false,
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"action.php",
			type:"POST",
			data:{action:'listUser'},
			dataType:"json"
		},
		"columnDefs":[
			{
				"targets":[0, 8, 9],
				"orderable":false,
			},
		],
		"pageLength": 10
	});		
	$(document).on('click', '.delete', function(){
		var id_users = $(this).attr("id_users");		
		var action = "userDelete";
		if(confirm("Вы уверены, что хотите удалить этого пользователя?")) {
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{id_users:id_users, action:action},
				success:function(data) {					
					usersData.ajax.reload();
				}
			})
		} else {
			return false;
		}
	});	
	$('#addUser').click(function(){
	
		$('#userModal').modal('show');
		$('#userForm')[0].reset();
		$('#passwordSection').show();
		$('.modal-title').html("<i class='fa fa-plus'></i> Добавить пользователя");
		$('#action').val('addUser');
		$('#save').val('Добавить пользователя');
		if (errorMessage !== '') {
		var errorMessage = "<?php echo ($errorMessage != '') { ?>";
		}
	});	
	$(document).on('click', '.update', function(){
		var id_users = $(this).attr("id_users");
		var action = 'getUser';
		$.ajax({
			url:'action.php',
			method:"POST",
			data:{id_users:id_users, action:action},
			dataType:"json",
			success:function(data){
				$('#userModal').modal('show');
				$('#id_users').val(data.id_users);
				$('#name').val(data.name);
				$('#patronymic').val(data.patronymic);
				$('#surname').val(data.surname);
				$('#birth_date').val(data.birth_date);
				$('#email').val(data.email);
				$('#password').val(data.password);
				$('#passwordSection').hide();
				if(data.gender == 'Мужской') {
					$('#Мужской').prop("checked", true);
				} else if(data.gender == 'Женский') {
					$('#Женский').prop("Женский", true);
				}
				if(data.status == 'Действителен') {
					$('#Действителен').prop("checked", true);
				} else if(data.status == 'В ожидании') {
					$('#В ожидании').prop("checked", true);
				}
				if(data.type == 'Пользователь') {
					$('#Пользователь').prop("checked", true);
				} else if(data.type == 'Администратор') {
					$('#Администратор').prop("checked", true);
				}
				$('#phone_number').val(data.phone_number);	
				$('.modal-title').html("<i class='fa fa-plus'></i> Редактировать пользователя");
				$('#action').val('updateUser');
				$('#save').val('Сохранить');
			}
		})
	});	
	$(document).on('submit','#userForm', function(event){
		event.preventDefault();
		$('#save').attr('disabled','disabled');
		var formData = $(this).serialize();
		$.ajax({
			url:"action.php",
			method:"POST",
			data:formData,
			success:function(data){				
				$('#userForm')[0].reset();
				$('#userModal').modal('hide');				
				$('#save').attr('disabled', false);
				usersData.ajax.reload();
			}
		})
	});	
});