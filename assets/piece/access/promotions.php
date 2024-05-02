<?php
//session_start();
require_once('connect.php');

// Выборка данных из БД
$sql = "SELECT name, description, image FROM promotions WHERE activity = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Вывод данных
  while($row = $result->fetch_assoc()) {
        echo "<div class='card'>";
        echo "<img src='" . $row['image'] . "' alt='Promotion Image'>";
        echo "<div class='text'>";
        echo "<h3>" . $row['name'] . "</h3>";
        echo "<p>" . $row['description'] . "</p>";
        echo "</div>";
        echo "</div>";
  }
} else {
  echo "0 результатов";
}
$conn->close();
?>