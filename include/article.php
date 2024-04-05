 <!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Блог IT_Минималиста!</title>

    <!-- Bootstrap Grid -->
    <link rel="stylesheet" type="text/css" href="../media/assets/bootstrap-grid-only/css/grid12.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- Custom -->
    <link rel="stylesheet" type="text/css" href="../media/css/style.css">
  </head>



<?php 

 
include 'header_art.php';

$name = $_POST['name'];
$nickname = $_POST['nickname'];
$text = $_POST['text'];
$art_id = $_POST['art_id'];
$id = $_POST['id'];
mysqli_query($conn, "INSERT INTO `comments`(`author`, `nickname`, `text`, `articles_id`) VALUES('".$name."', '".$nickname."', '".$text."', '".$art_id."')");

$id = $_GET['id'];
$article = mysqli_query($conn, "SELECT * FROM `articles` WHERE id = " . (int)$id);
if (mysqli_num_rows($article) <= 0) {
  echo '<h1>Статья не была найдена!</h1>';
}

else {

$get = mysqli_fetch_assoc($article);
$views = mysqli_query($conn, "UPDATE `articles` SET views = views + 1 WHERE id = $id" );

 
?>

<div id="content">
      <div class="container">
        <div class="row">
          <section class="content__left col-md-8">
            <div class="block">
              <a>Просмотров <?php echo $get['views'] ?></a>
              <h3><?php echo $get['title'] ?></h3>
              <div class="block__content">
                <img src="<?php echo $get['image'] ?>" width='500px' height='300px'>

                <div class="full-text">
                  <?php echo $get['text']; ?>
                </div>
              </div>
            </div>

            <div class="block">
              <a href="#comment-add-form">Добавить свой</a>

              <?php 
              $per_page = 4;
              if (isset($_GET['page'])) {
                $page = (int)$_GET['page'];
              }  
              $total_count_q = mysqli_query($conn, "SELECT COUNT(`id`) as `total_count` FROM `comments`");
              $total_count = mysqli_fetch_assoc($total_count_q);
              $total_count = $total_count['total_count'];
              $total_pages = ceil($total_count / $per_page);
              if ($page <= 1 || $page > $total_pages) {
                $page = 1;
              }
              $offset = ($page * $per_page) - $per_page;
              $comments = mysqli_query($conn, "SELECT * FROM `comments` WHERE articles_id = $id ORDER BY date DESC LIMIT $offset, $per_page");
              $comm_exist = true;
              if (mysqli_num_rows($comments) <= 0) {
                $comm_exist = true;
                    ?>

<h3>Комментарии к статье</h3>
              <div class="block__content">
                <div class="articles articles__vertical">
                  
                <h3 style="margin: 50px;">Комментариев нет!</h3>

                </div>

              </div>
              <?php 
              
              if ($comm_exist) {
                echo '<div class="paginator">';
                if ($page > 1) {
                  echo '<a href="article.php?id='.$id.'&page='.($page - 1).'">'.($page - 1).'</a>';
                  
                }
           
              echo '</div>';
              }
              ?>
            </div>

            <div class="block" id="comment-add-form">
              <h3>Добавить комментарий</h3>
              <div class="block__content">
                <form class="form" action='article.php?id=<?php echo $get['id'] ?>' method='POST'>
                <?php 
                ?>
                <input type='text' value='<?php echo $get['id']?>' name='art_id'>
                  <div class="form__group">
                    <div class="row">
                      <div class="col-md-6">
                        <input type="text" class="form__control" required="" name="name" placeholder="Имя">
                      </div>
                      <div class="col-md-6">
                        <input type="text" class="form__control" required="" name="nickname" placeholder="Никнейм">
                      </div>
                    </div>
                  </div>
                  <div class="form__group">
                    <textarea name="text" required="" class="form__control" placeholder="Текст комментария ..."></textarea>
                  </div>
                  <div class="form__group">
                    <input type="submit" class="form__control" name="do_post" value="Добавить комментарий">
                  </div>
                </form>
              
                   
              </div>
            </div>
           
          </section>
          <section>
          <?php include '../pages/sitebar.php' ?>
          </section>
          </div>
</div>
</div>
              </div>
          
        
              <?php  
         }  
           ?>
          <h3>Комментарии к статье</h3>
       
              <div class="block__content">
                <div class="articles articles__vertical">
                <?php 
            while($comm = mysqli_fetch_assoc($comments)) {

              ?>
                  <article class="article">
                    <div class="article__image" style="background-image: url(https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=125);"></div>
                    <div class="article__info">
                      <a href="#"><?php echo $comm['nickname'] ?></a>
                      <div class="article__info__meta">
                        <small><?php echo $comm['date'] ?></small>
                      </div>
                      <div class="article__info__preview" ><?php echo $comm['text'] ?></div>
                    </div>
                  </article>
                  <?php } ?>
                </div>
              </div>
              <?php 
              
              if ($comm_exist) {
                echo '<div class="paginator" style="margin: 20px;">';
                if ($page > 1) {
                  echo '<a href="article.php?id='.$id.'&page='.($page - 1).'">'.($page - 1).' </a>';
                }
                echo " " . $page . " ";
                if ($page < $total_pages) {
                  echo '<a href="article.php?id='.$id.'&page='.($page + 1).'">'.($page+1).'</a>';

              }
              echo '</div>';
              }
              ?>
            </div>
             
            <div class="block" id="comment-add-form">
              <h3>Добавить комментарий</h3>
              <div class="block__content">
                <form class="form" action='article.php?id=<?php echo $id ?>' method='POST'>
                <input type='text' value='<?php echo $get['id']?>' name='art_id'>
                  <div class="form__group">
                    <div class="row">
                      <div class="col-md-6">
                        <input type="text" class="form__control" required="" name="name" placeholder="Имя">
                      </div>
                      <div class="col-md-6">
                        <input type="text" class="form__control" required="" name="nickname" placeholder="Никнейм">
                      </div>
                    </div>
                  </div>
                  <div class="form__group">
                    <textarea name="text" required="" class="form__control" placeholder="Текст комментария ..."></textarea>
                  </div>
                  <div class="form__group">
                    <input type="submit" class="form__control" name="do_post" value="Добавить комментарий">

                
                  </div>
                </form>
              </div>
            </div>
             
          </section>
           
          <section>
          
          <?php include '../pages/sitebar.php' ?>
          </section>
</div>
</div>
</div>
          
          
           
          <?php }
          
          include 'footer.php' ?>