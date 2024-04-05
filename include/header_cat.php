
<?php 
 include 'config.php';
?>
<header id="header">
        <div class="header__top">
          <div class="container">
            <div class="header__top__logo">
              <h1><?php echo $config['title'] ?></h1>
            </div>
            <nav class="header__top__menu">
              <ul>
                <li><a href="/lesson.ru">Главная</a></li>
                <li><a href="/lesson.ru/pages/about.php">Обо мне</a></li>
                <li><a href="/lesson.ru/sign-pass.php">Личный кабинет</a></li>
                <li><a href="sign.php">Регистрация</a></li>
                <li><a href="/vk.com" target='blank'>Я Вконтакте</a></li>
              </ul>
            </nav>
          </div>
        </div>
        <?php 
             $categoryes = mysqli_query($conn, "SELECT * FROM `categoryes` ");
              
             ?>
        <div class="header__bottom">
          <div class="container">
            <nav>
          <ul>
                <?php
              while( $cat = mysqli_fetch_assoc($categoryes)) {
            
                ?>
                <li><a href="/lesson.ru/include/category.php?id= <?php echo $cat['id'] ?>"><?php echo $cat['category']; ?></a></li>
              <?php 
              };
              ?>
            
            </ul>
            </nav>
          </div>
        </div>
      </header>