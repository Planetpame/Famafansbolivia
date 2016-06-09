<?php include "../dope1/headeradm.php" ?>
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

  <a  name="facebook"></a>
   <div class="content-section-a" align="center">
<?php
include 'php/conexion.php';
  if(isset($_POST["evento"])){
     $ev=$_POST["evento"];
    $tb=$_POST["tipoboleto"];
     $pr=$_POST["precio"];
    $query=$con->query("INSERT INTO boletos (idevento,tipoboleto,precio) VALUES ($ev,'$tb',$pr)");  
    print "<script>window.location='registrar_boleto';</script>";
  }
?>
<h2>INSERTAR PRECIOS</h2>
<form role="form" name="rboleto" id="formulario" action="registrar_boleto.php" method="post">
   <div class="form-group">
        <label for="evento">EVENTO</label>
        <select name="evento" id="evento" class="form-group">
          <option value="0">Seleccione un evento</option>
          <?php 
            $query=$con->query("select * from evento");
        while ($fila=$query->fetch_array()) {
          echo "<option value='".$fila["idevento"]."'>".$fila["nombre"]."</option>";
        }
          ?>
        </select>
   </div>
   <div class="form-group">
            <label for="tipoboleto">TIPO DE BOLETO</label>
            <input type="text" class="form-control" id="tipoboleto" name="tipoboleto" placeholder="Tipo de boleto">
   </div>
   <div class="form-group">
            <label for="precio">PRECIO</label>
            <input type="text" class="form-control" id="precio" name="precio" placeholder="Precio en Bolivianos">
   </div>

   <button type="submit" class="btn btn-primary btn-lg">REGISTRAR</button>
 </form>
</div>
<?php include "footer.php" ?>



    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>



