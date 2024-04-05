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

 
<?php 

$all_articles = mysqli_query($conn, "SELECT * FROM `articles`")

?>
        <?php include 'articles.php'; ?>
 
          </div>
        </div>
      </div>

       

    </div>

  </body>

</html>