<?php
// define variables and set to empty values
$title = $description = $assigned = $type = $priority = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = test_input($_POST["title"]);
  $description = test_input($_POST["description"]);
  $assigned = test_input($_POST["search_categories_assign"]);
  $type = test_input($_POST["search_categories_type"]);
  $priority = test_input($_POST["search_categories_priority"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>