
        <?php include "headeradm.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Registro de Boletos</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <style type="text/css">
      #formulario{
        width: 700px;
      }
      select{
        width: 100%;
        height: 33px;
      }
    </style>

</head>

<body>
 <br>

  </br>

   <br>

  </br>
<?php
  @session_start();
  if(isset($_POST["username"])){
    $un=$_POST["username"];
    $fn=$_POST["fullname"];
    $e=$_POST["email"];
    $pwd=$_POST["password"];
    $f=$_POST["foto"];
    $fondo=$_POST["fondo"];
    $id=$_SESSION["user_id"];
    include "php/conexion.php";
    $sql="UPDATE user SET fullname='$fn',username='$un',email='$e',password='$pwd',link='$f',color_fondo='$fondo' WHERE id=$id";
    $query = $con->query($sql);
    $_SESSION["color_fondo"]=$fondo;
    
  }
  if(isset($_SESSION["user_id"])){
      include "php/conexion.php";
      $sql1= "SELECT * FROM user WHERE id=".$_SESSION["user_id"];
      $query = $con->query($sql1);
      $r=$query->fetch_array();
?>
  <h2>Editar Perfil</h2>

        <form role="form" name="registro" action="edit_user" method="post">
          <div class="form-group">
            <label for="username">Nombre de usuario</label>
            <input type="text" class="form-control" id="username" name="username" value="<?=$r["username"];?>">
          </div>
          <div class="form-group">
            <label for="fullname">Nombre Completo</label>
            <input type="text" class="form-control" id="fullname" name="fullname" value="<?=$r["fullname"];?>">
          </div>
          <div class="form-group">
            <label for="email">Correo Electronico</label>
            <input type="email" class="form-control" id="email" name="email" value="<?=$r["email"];?>">
          </div>
          <div class="form-group">
            <label for="password">Contrase&ntilde;a</label>
            <input type="password" class="form-control" id="password" name="password" value="<?=$r["password"];?>">
          </div>
          <div class="form-group">
            <label for="foto">Foto</label>
            <input type="text" class="form-control" id="foto" name="foto" value="<?=$r["link"];?>">
          </div>
          <div class="form-group">
            <label for="fondo">Color Fondo</label>
            <input type="text" class="form-control" id="fondo" name="fondo" value="<?=$r["color_fondo"];?>">
          </div>
          <button type="submit" class="btn btn-default">Guardar</button>
        </form>
<?php
  }
?>



  
<?php include "footer.php" ?>




    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>







