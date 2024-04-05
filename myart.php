<?php 
include 'include/config.php';
if ($_COOKIE['name'] == '') {
    header('Location: sign.php');
}
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap Grid -->
     <link rel="stylesheet" type="text/css" href="media/assets/bootstrap-grid-only/css/grid12.css">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

<!-- Custom -->
<link rel="stylesheet" type="text/css" href="media/css/style.css">
    <title>Document</title>
</head>
<body>



<?php 
include 'include/header_cat.php';
?>

<div id="content">
        <div class="container">
          <div class="row">
            <section class="content__left col-md-8">
              <div class="block">
                <a href="#">Все записи</a>
                <h3>Мои статьи</h3>
                <div class="block__content">
                  <div class="articles articles__horizontal">
<?php
$id = $_GET['id'];
$art = mysqli_query($conn, "SELECT * FROM `articles` WHERE author = '".$_COOKIE['name']."'");
while($get = mysqli_fetch_assoc($art)) {


  ?>
  

<article class="article">
                <div class="article__image" style="background-image: url(<?php echo $get['image'] ?>);"></div>
               
            <div class="article__info">
             <a href="/lesson.ru/include/article.php?id=<?php echo $get['id'] ?>"><?php echo $get['title'] ?></a>
              <div class="article__info__meta">

              <?php
              foreach($categoryes as $cat) {
                  $flag = false;
                  if ($cat['id'] == $get['category']) {
                      $flag = $cat;
                      break;
                  }
              }
              
              ?>
               <small>Категория: <a href="/lesson.ru/include/category.php?id= <?php echo $cat['id'] ?>"><?php echo $flag['category'] ?></a></small><br>
               <small>Автор: <a href=""><?php echo $get['author'] ?></a></small>
               </div>
             <div class="article__info__preview"><?php echo mb_substr(strip_tags($get['text']), 0,50,'utf-8') . "..." . " " ?><a href='/lesson.ru/include/article.php?id=<?php echo $get['id']; ?>'>читать больше...</a></div>
              </div>
              </article>


<?php 
}
?>
    </div>
                </div>
              </div>
              </section>
              <section>
            <?php include 'sitebar.php' ?>
</section>
              </div>
 
</div>
</div>
                </div>
                <?php include 'include/footer.php' ?>
              </div>
            
</body>
</html>

