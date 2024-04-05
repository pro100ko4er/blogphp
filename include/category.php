<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap Grid -->
     <link rel="stylesheet" type="text/css" href="../media/assets/bootstrap-grid-only/css/grid12.css">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

<!-- Custom -->
<link rel="stylesheet" type="text/css" href="../media/css/style.css">
    <title>Document</title>
</head>
<body>



<?php 
$id = $_GET['id'];
include 'config.php';
include 'header_cat.php';
?>

<div id="content">
        <div class="container">
          <div class="row">
            <section class="content__left col-md-8">
              <div class="block">
                <a href="#">Все записи</a>
                <h3>Новейшее_в_блоге</h3>
                <div class="block__content">
                  <div class="articles articles__horizontal">
<?php
$per_page = 4;
if (isset($_GET['page'])) {
  $page = (int)$_GET['page'];
}
else {
  $page = 1;
};
$total_count_q = mysqli_query($conn, "SELECT COUNT(`id`) as `total_count` FROM `articles` WHERE category = '$id'");
$total_count = mysqli_fetch_assoc($total_count_q);
$total_count = $total_count['total_count'];
$total_pages = ceil($total_count / $per_page);
echo $total_pages;
if ($page <= 1 || $page > $total_pages) {
  $page = 1;
}
$offset = ($per_page * $page) - $per_page;
$cat = mysqli_query($conn, "SELECT * FROM `categoryes` WHERE id='$id'");
$art = mysqli_query($conn, "SELECT * FROM `articles` WHERE category= '$id' ORDER BY id DESC LIMIT $offset, $per_page");
$article_exist = true;
if (mysqli_num_rows($art) <= 0) {
  $article_exist = true;
  echo '<h1>Статей нет</h1>';
  
}
$getCat = mysqli_fetch_assoc($cat);
while($get = mysqli_fetch_assoc($art)) {
?>
<article class="article">
        <div class="article__image" style="background-image: url(<?php echo $get['image'] ?>);"></div>
               
        <div class="article__info">
       <a href="article.php?id=<?php echo $get['id'] ?>"><?php echo $get['title'] ?></a>
           <div class="article__info__meta">
       <small>Категория: <a href="#"><?php echo $getCat['category'] ?></a></small>
               </div>
             <div class="article__info__preview"><?php echo mb_substr(strip_tags($get['text']),0,100,'utf-8') . '...' ?><a href='article.php?id=<?php echo $get['id'] ?>'>чиать больше...</a></div>
              </div>
              </article>
<?php 
};
?>
              </div>
                </div>
                <?php 
                  
                  if ($article_exist) {
                    echo '<div class="paginator">';
                    if ($page > 1) {
                      echo '<a href="category.php?id='.$id.'&page='.($page - 1).' "> '.($page - 1).'</a>';
                      echo $page;
                    }
                    if ($page < $total_pages) {
                      echo '<a href="category.php?id='.$id.'&page='.($page + 1).' ">  '.($page + 1).'  </a>';
                    }
                  }
                 echo '</div>';
                  ?>
              </div>
              </section>
               
              <section>
            <?php include '../pages/sitebar.php' ?>
</section>
</div>
</div>
                </div>
                <?php include 'footer.php' ?>
              </div>
            
</body>
</html>
