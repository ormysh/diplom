<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Сеты</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&amp;display=swap" rel="stylesheet">

<link rel="apple-touch-icon" sizes="57x57" href="assets/img/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="assets/img/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="assets/img/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="assets/img/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="assets/img/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="assets/img/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
<link rel="manifest" href="assets/img/favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<script>
if (‘serviceWorker’ in navigator) {
 window.addEventListener(‘load’, function() {  
   navigator.serviceWorker.register(‘assets/js/sw.js’).then(
     function(registration) {
       // Registration was successful
       console.log(‘ServiceWorker registration successful with scope: ‘, registration.scope); },
     function(err) {
       // registration failed :(
       console.log(‘ServiceWorker registration failed: ‘, err);
     });
 });
}
</script>


   <script>
	window.addEventListener('load', function() {
  // Находим тег <li>, которому нужно добавить класс active
  	var liElement = document.getElementById('sety'); // замените 'yourLiId' на id вашего тега <li>

  // Добавляем класс active к найденному тегу <li>
  	liElement.classList.add('active');
});
</script>
</head>

<body>

<?php include 'assets/piece/header.php'; ?>
<?php include 'assets/piece/katalog_sety.php'; ?>
<?php include 'assets/piece/footer.php'; ?>

<script src="assets/js/script.js">
    </script>
</body>

</html>