<?php
include('../class/User.php');

$user = new User();
if(!empty($_POST['action']) && $_POST['action'] == 'listUser') {
	$user->getUserList();
}
if(!empty($_POST['action']) && $_POST['action'] == 'userDelete') {
	$user->deleteUser();
}
if(!empty($_POST['action']) && $_POST['action'] == 'getUser') {
	$user->getUser();
}
if(!empty($_POST['action']) && $_POST['action'] == 'addUser') {
	$user->addUser();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateUser') {
	$user->updateUser();
}

include('../class/Product.php');

$product = new Product();
if(!empty($_POST['action']) && $_POST['action'] == 'listProduct') {
	$product->getProductList();
}
if(!empty($_POST['action']) && $_POST['action'] == 'ProductDelete') {
	$product->deleteProduct();
}
if(!empty($_POST['action']) && $_POST['action'] == 'getProduct') {
	$product->getProduct();
}
if(!empty($_POST['action']) && $_POST['action'] == 'addProduct') {
	$product->addProduct();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateProduct') {
	$product->updateProduct();
}
?>