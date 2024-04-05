<?php 
include 'include/config.php';
if (!isset($_COOKIE['name'])) {
  header("Location: sign.php");
  exit;
   
}
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Блог IT_Минималиста!</title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css" media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- Bootstrap Grid -->
    <link rel="stylesheet" type="text/css" href="media/assets/bootstrap-grid-only/css/grid12.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="styles/style.css" rel="stylesheet">
    <!-- Custom -->
    <link rel="stylesheet" type="text/css" href="media/css/style.css">
  </head>

  <body>

  <nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">Личный кабинет</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="pages/about.php">Обо мне</a></li>
        <li><a href="index.php">Перейти к статьям</a></li>
        <li><a href="pages/copyright.php">Правила</a></li>
        <li><a href="del_cookie.php">Выйти</a></li>
      </ul>
    </div>
  </nav>
  <div class='visit'>
 <div class='name-profile data'>Имя:<?php echo $_COOKIE['name']; ?></div>
  <?php 
  
  $data = mysqli_query($conn, "SELECT * FROM `users` WHERE name = '".$_COOKIE['name']."'");
  $result = mysqli_fetch_assoc($data);
  ?>
 <div class='data'>id: <?php echo $result['id']; ?></div>
 <div class='data'>Емэйл:<?php echo $result['email']; ?></div>
 <div class='data'>Ник:<?php echo $result['nickname']; ?></div>
 <div  class='data'><a href='myart.php'>Мои статьи</a></div>
 <div  class='data'><a href='addart.php'>Добавить статью</a></div>
</div>

 
          <?php include 'sitebar.php' ?>
   
<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
<script src='js/script.js'></script>
  </body>

</html>
