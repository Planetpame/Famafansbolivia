
 <?php include "header.php" ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Noticias</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>

     <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
        <link href="css/landing-page.css" rel="stylesheet">

  </head>
  <body>

  <br> </br>
    <br> </br>
<?php
include 'php/conexion.php';
?>
<div class="panel-group" id="accordion">
   
    
  <?php
   $query=$con->query("SELECT * FROM news ORDER BY id DESC");
    while($row=$query->fetch_assoc()){
      $id=$row['id'];
      echo "<div class='panel panel-default'>";
       echo '<div class="panel-heading">';
        echo '<h4 class="panel-title">';
          echo "<a data-toggle='collapse' data-parent='#accordion' href='#collapse$id'>";
          echo $row["subject"]."</a>";
        echo '</h4>';
       echo '</div>';
       echo "<div id='collapse$id' class='panel-collapse collapse'>";
        echo "<div class='panel-body'>";
         echo "FECHA: ".$row["date"]."<br>";
         echo "POSTEADO POR: ".$row["postedby"]."<br>";
         echo "<h1></h1>";
         echo "<p>".$row["news"]."</p><br>";
        echo "</div>"; 
       echo "</div>";   
      echo "</div>";
    }
    ?>
</div>
</body>
</html>



 <?php include "footer.php" ?>



