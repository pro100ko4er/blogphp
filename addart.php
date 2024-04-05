<?php 

if ($_COOKIE['name'] == '') {
  header("Location: sign.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
     

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- Bootstrap Grid -->
    <link rel="stylesheet" type="text/css" href="media/assets/bootstrap-grid-only/css/grid12.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- Custom -->
    <link rel="stylesheet" type="text/css" href="media/css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='styles/style2.css'>
    <title>Document</title>
</head>
<body>
    <?php include 'include/header.php'; ?>
     
<div class='categoryes'>
 <form action='addart-pass.php' method='POST'>
    <h3>Категории для вашей статьи</h3>
<ul>
    <li>Категория 1(Спорт)</li>
    <li>Категория 2(Программирование)</li>
    <li>Категория 3(Кулинария)</li>
    <li>Категория 4(Природа)</li>
    <li>Категория 5(Безопасность)</li>
    <li>Категория 6(Хакерство)</li>
</ul>
<input type='text' name='img' class='img' placeholder='Путь для фото для статьи'>
<select name='cat' class="form-select" aria-label="Default select example">
  <option selected>Выберите категорию</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="1">4</option>
  <option value="2">5</option>
  <option value="3">6</option>
</select>
<input placeholder='Название' class='title' type='text' name='title'>
<textarea class='text' name='text' placeholder='Бла-бла-бла...' cols='40' rows='20'></textarea>
<input type='submit' value='Добавить статью' >
</form>
</div>
 
 
<?php include 'sitebar.php' ?>
 
</body>
</html>

