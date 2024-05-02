<?php
if (isset($_GET['query'])) {
  // Подключение к базе данных
require_once('connect.php');

  // Получение введенного пользователем названия
  $query = $_GET['query'];

  // Формирование SQL-запроса
  $sql = "SELECT * FROM product WHERE name LIKE '%$query%'";

  // Выполнение запроса
  $result = mysqli_query($conn, $sql);

  // Проверка успешности выполнения запроса
  if ($result) {
    // Обработка результатов
    if (mysqli_num_rows($result) > 0) {
      // Вывод найденных записей
      while ($row = mysqli_fetch_assoc($result)) {
         echo "<div class='card__set'>";
         echo "  <img src='" . $row['image'] . "' alt='Product 1' class='product-image'>";
         echo "  <div class='card-info'>";
         echo "      <h3 class='product-title'>" . $row['name'] . "</h3>";
         echo "<p class='product-description'>Состав: " . $row['composition'] . "</p>";
         echo "      <div class='card-foot'>";
         echo "<h3 class='product-price'>" . $row['price'];
                 if ($row['price_without_discount'] !== null) {
         echo "<span class='old-price'>" . $row['price_without_discount'] . "</span>";}
         echo "</h3>";
         echo "          <button class='add-to-cart'>В КОРЗИНУ</button>";
         echo "      </div>";
         echo "  </div>";
         echo "  </div>";
      }
    } else {
      echo "Ничего не найдено";
    }
  } else {
    echo "Ошибка выполнения запроса: " . mysqli_error($conn);
  }

  // Закрытие соединения с базой данных
  mysqli_close($conn);
}

?>