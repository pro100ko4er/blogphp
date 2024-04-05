<?php 
include '../include/config.php';
if ($_POST['name'] == '' || $_POST['email'] == '' || $_POST['password'] == '') {
    header("Location: sign.php");
}
else {
    setcookie("name", $_POST['name'], time() + 3600);
mysqli_query($conn, "INSERT INTO `users` (`name`, `email`, `password`) VALUES('".$_POST['name']."', '".$_POST['email']."', '".$_POST['password']."')");
sleep(2);
header("Location: sign-pass.php");

}

?>