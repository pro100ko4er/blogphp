<link rel="stylesheet" type="text/css" href="../media/assets/bootstrap-grid-only/css/grid12.css">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

<!-- Custom -->
<link rel="stylesheet" type="text/css" href="../media/css/style.css">
<section class="content__right col-md-4">
              <div class="block">
                <h3>Мы_знаем</h3>
                <div class="block__content">
                  <script type="text/javascript"
                    src="//ra.revolvermaps.com/0/0/6.js?i=02op3nb0crr&amp;m=7&amp;s=320&amp;c=e63100&amp;cr1=ffffff&amp;f=arial&amp;l=0&amp;bv=90&amp;lx=-420&amp;ly=420&amp;hi=20&amp;he=7&amp;hc=a8ddff&amp;rs=80"
                    async="async"></script>
                </div>
              </div>

              <div class="block">
                <h3>Топ читаемых статей</h3>
                <div class="block__content">
                  <div class="articles articles__vertical">
                  <?php 
                  include 'include/config.php';
                $top_art_cat = mysqli_query($conn, "SELECT * FROM `categoryes`");
               
                $top_art = mysqli_query($conn, "SELECT * FROM `articles` ORDER BY views DESC LIMIT 3");
                while($get_top_art = mysqli_fetch_assoc($top_art)) {

                ?>
   
                    <article class="article">
                      <div class="article__image" style="background-image: url(<?php echo $get_top_art['image'] ?>);"></div>
                      <div class="article__info">
                        <a href="/lesson.ru/include/article.php?id=<?php echo $get_top_art['id'] ?>"><?php echo $get_top_art['title'] ?></a>
                        <div class="article__info__meta">

                        <?php 
                        
                        foreach($top_art_cat as $cat_top) {
                          if ($cat_top['id'] == $get_top_art['category'] ) {
                            $set_top_art = $cat_top;
                          }
                        }
                        
                        ?>
                          <small>Категория: <a href="include/category.php?id=<?php echo $set_top_art['id'] ?>"><?php echo $set_top_art['category'] ?></a></small>
                        </div>
                        <div class="article__info__preview"><?php echo mb_substr(strip_tags($get_top_art['text']), 0, 50, 'utf-8') . '...' ?><a href='http://localhost/lesson.ru/include/category.php?id=<?php echo $set_top_art['id']?>'>читать больше...</a></div>
                      </div>
                    </article>
                      <?php 
                      } 
                      ?>
 

                  </div>
                </div>
              </div>
              <div class="block">
                <h3>Комментарии</h3>
                <div class="block__content">
                  <div class="articles articles__vertical">
                  <?php
                $get_art = mysqli_query($conn, "SELECT * FROM `articles`");
                $get_comm = mysqli_query($conn, "SELECT * FROM `comments`ORDER BY id DESC LIMIT 3");
                while ($comm = mysqli_fetch_assoc($get_comm)) {
                  

                ?>
                    <article class="article">
                      <div class="article__image" style="background-image: url(https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=125);"></div>
                      <div class="article__info">
                        <?php 
                        $flag_art = false;
                        foreach($get_art as $art) {
                          if ($comm['articles_id'] == $art['id']) {
                            $flag_art = $art;
                            break;
                          }
                        }
                        
                        ?>
                        <a href="#"><?php echo $comm['nickname'] ?></a>
                        <div class="article__info__meta">
                          <small><a href="http://localhost/lesson.ru/include/article.php?id=<?php echo $art['id'] ?>"><?php echo $flag_art['title'] ?></a></small>
                        </div>
                        <div class="article__info__preview"><?php echo $comm['text']; ?></div>
                      </div>
                    </article>
                    <?php
                } 
                    ?>
                  </div>
                </div>
              </div>
            </section>