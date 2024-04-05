<?php 

if ($_COOKIE['name']) {
  header('Location: sign-pass.php');
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
      <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>

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
        <li><a href="../pages/about.php">Обо мне</a></li>
        <li><a href="../index.php">Перейти к статьям</a></li>
        <li><a href="../pages/copyright.php">Правила</a></li>
      </ul>
    </div>
  </nav>
<form class='form' action='set_cookie.php' method = 'POST'>
<input class='name' type='text' placeholder='Имя' name='name'><br>
<input class='email' type='text' placeholder='Емейл' name='email'><br>
<input type='text' class='password' placeholder='Пароль' name='password'><br>
<button class="btn waves-effect submit waves-light" type="submit" name="action">Зарегистрироваться
    <i class="material-icons right">send</i>
  </button>
        <br>
</form>
<hr>

<h3>Вход</h3>

<form class='form' action='sign-in.php' method = 'POST'>
<input type='text' class='email' placeholder='Емейл' name='email'><br>
<input type='text' class='password' placeholder='Пароль' name='password'><br>
<button class="btn waves-effect waves-light" type="submit" name="action">Войти
    <i class="material-icons right">send</i>
  </button>
        <br>
</form>
<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
  </body>

</html>



 