<?php 
include 'include/config.php';
if ($_POST['email'] == '' or $_POST['password'] == '') {
    header("Location: sign.php");
}
else {
    echo $_POST['password'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE password = '".$_POST['password']."'");
   # if ($result == false) {
    #    echo 'Такого пользователя нет!';
   # }
    if ($result == true) {
        $res = mysqli_fetch_assoc($result);
        setcookie("name",  $res['name'], time() + 3600);
        header("Location: sign-pass.php");
    }
}
?>