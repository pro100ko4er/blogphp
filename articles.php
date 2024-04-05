<?php 
include 'include/config.php';
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Блог IT_Минималиста!</title>

    <!-- Bootstrap Grid -->
    <link rel="stylesheet" type="text/css" href="media/assets/bootstrap-grid-only/css/grid12.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- Custom -->
    <link rel="stylesheet" type="text/css" href="media/css/style.css">
  </head>

  <body>

    <div id="wrapper">

 <?php include 'include/header.php' ?>
<?php 

$all_articles = mysqli_query($conn, "SELECT * FROM `articles`")

?>
      <div id="content">
        <div class="container">
          <div class="row">
            <section class="content__left col-md-8">
              <div class="block">
               
               <h3>Все статьи</h3>
                <div class="block__content">
                  <div class="articles articles__horizontal">
                    <?php 
                    $page = 1;
                    $per_page = 4;
                    if (isset($_GET['page'])) {
                      $page = (int)$_GET['page'];
                    }
                    $total_count_q = mysqli_query($conn, "SELECT COUNT(`id`) as `total_count` FROM `articles`");
                    $total_count = mysqli_fetch_assoc($total_count_q);
                    $total_count = $total_count['total_count'];
                    $total_pages = ceil($total_count / $per_page);
                    if ($page <= 1 || $page > $total_pages) {
                      $page = 1;
                    }
                    $offset = ($per_page * $page) - $per_page;
                    $articles = mysqli_query($conn, "SELECT * FROM `articles` ORDER BY id DESC LIMIT $offset, $per_page");

                    $article_exist = true;
                  if (mysqli_num_rows($articles) <=0) {
                    $article_exist = true;
                    echo '<h1>Статей нет!</h1>';
                  }
                      ?>
                      <?php 
                      while($get = mysqli_fetch_assoc($articles)) {
                        ?>
                    <article class="article">
                      <div class="article__image" style="background-image: url(<?php echo $get['image'] ?>);"></div>
                      <div class="article__info">
                        <a href="include/article.php?id=<?php echo $get['id'] ?>"><?php echo $get['title'] ?></a>
                        <div class="article__info__meta">
                          <?php 
                          $art_cat = false;
                          foreach($categoryes as $at) {
                            if ($at['id'] == $get['category']) {
                              $art_cat = $at;
                              break;
                            }
                          }
                          ?>
                          <small>Категория: <a href="../lesson.ru/include/category.php?id= <?php echo $art_cat['id'] ?>"><?php echo $art_cat['category'] ?></a></small>
                        </div>
                        <div class="article__info__preview"><?php echo mb_substr(strip_tags($get['text']), 0, 50, 'utf-8') . '...' ?> <a href="../lesson.ru/include/category.php?id= <?php echo $art_cat['id'] ?>">читать больше</a></div>
                      </div>
                    </article>
                        <?php } ?>
              </div>
           </div>
                <?php 
                     
                     if ($article_exist) {
                       echo '<div class="paginator">';
                        if ($page > 1) {
                          echo '<a href="articles.php?page='.($page - 1).'">&laquo; '.($page - 1).' </a>';
                        }
                        if ($page < $total_pages) {
                          
                         echo '<a href="articles.php?page='.($page + 1).'">'.($page + 1).' &raquo;</a>';
                        }
                        echo '</div>';
                     }
   
                     ?>
              </div>
            
           
            </section>
            <section>
              <?php include 'pages/sitebar.php'; ?>
</section>
          </div>
        </div>
      </div>

       <?php include 'include/footer.php' ?>

    </div>

  </body>

</html>