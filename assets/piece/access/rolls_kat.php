<?php
//session_start();
require_once('connect.php');

// Выборка данных из БД
$sql = "SELECT name, composition, image, price, price_without_discount FROM product WHERE id_category IN (1, 2);";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Вывод данных
  while($row = $result->fetch_assoc()) {
 
        
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
  echo "0 результатов";
}
$conn->close();
?>