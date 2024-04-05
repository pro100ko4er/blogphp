<?php 
include 'include/config.php';
$title = $_POST['title'];
$text = $_POST['text'];
$cat = $_POST['cat'];
$img = $_POST['img'];
$author = $_COOKIE['name'];
mysqli_query($conn, "INSERT INTO `articles`(`title`, `text`, `category`, `image`, `author`) VALUES('".$title."', '".$text."', '".$cat."', '".$img."', '".$author."')");

?>


 