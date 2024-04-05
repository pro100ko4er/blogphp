<?php	
setcookie ("name", $name, time() - 3600);
header("Location: sign-pass.php");
?>