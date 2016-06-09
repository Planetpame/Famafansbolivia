<?php include "../dope1/headerfan.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Concierto</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <style type="text/css">
      img{
        width: 400px;
        height: 300px;
      }
      /*.prueba{
        width: 50%;
        float: left;
      }*/
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
//include_once "fun.php";
    if(isset($_GET["idcal"])){
        //echo $_GET["idcal"];
        require_once("config.inc.php");
        $query=$db->query("SELECT * FROM ".$tabla." WHERE id=".$_GET["idcal"]);
        $fila=$query->fetch_array();
        $idevent=$fila["idevento"];
        $query=$db->query("SELECT * FROM evento WHERE idevento=".$idevent);
        $fila=$query->fetch_array();
        //echo $fila["idevento"]."<br>";
        //echo $fila["nombre"]."<br>";
        //echo $fila["fecha"]."<br>";
        //echo $fila["horaini"]."<br>";
        //echo $fila["descripcion"]."<br>";
        //echo $fila["acercacosto"]."<br>";
        //echo $fila["idorganizer"]."<br>";
        //echo $fila["idplace"]."<br>";
    
$query=$db->query("SELECT DISTINCT e.idevento as ide, e.nombre as evento , e.fecha as fe ,e.horaini as hora ,e.descripcion as des ,p.nameplace as lugar ,o.nameorganizer as org ,o.contacto as con , s.namestar as artista,p.picplace as pic
    from evento e,place p,organizer o ,starevento se ,star s where e.idplace=p.idplace and e.idorganizer=o.idorganizer and s.idstar=se.idstar and se.idevento=e.idevento AND e.idevento=".$idevent);
while($output = $query->fetch_array())
{
    echo '<div class="container-fluid" align="center">';
    echo '<div class="row">';
    echo "<div class='col-md-9'>";
     echo '<table align="center" >';
     echo '<h5>'.'Nombre Evento  :'.'</h5>';
     echo '<h2>' .$output['evento'].' </h2>';
     echo '<h5>'.'Fecha   :'. '</h5>';
     echo '<h1>' .$output['fe'].' </h1>';
     echo '<h5>'.'Hora   :'. '</h5>';
     echo '<h2>' .$output['hora'].' </h2>';
     echo '<h5>'.'Descripcion   :'. '</h5>';
     echo '<p>' .$output['des'].' </p>';
  
     echo '<h5>'.'Organiza  :'. '</h5>';
     echo '<h2>' .$output['org'].' </h2>';
     echo '<h5>'.'Contacto  :'. '</h5>';
     echo '<h2>' .$output['con'].' </h2>';
    echo "</div>";
    echo "</div>" ;   
    echo $output['pic'].'<br / >';
    $x=$output['ide'];
    $query1 = $db->query("SELECT DISTINCT * from starevento sa , evento e , star s where sa.idevento=e.idevento and sa.idstar=s.idstar and e.idevento=$x");
   
   while($output1 = $query1->fetch_array())
   {
      echo "<div class='prueba'>";
      echo '<h5>'.'Nombre Artista  :'. '</h5>';
      echo $output1['namestar'].'<br />';
      echo '<h5>'.'Genero :'. '</h5>';
      echo $output1['genero'].'<br />';
      '<tr>';
       echo "<img src='".$output1['fotos']."''></img>";
       '</tr>';
      echo '<hr />'; 
     echo '</div>'; 
   }
   echo "</div>";
   $querye = $db->query("SELECT * FROM boletos WHERE idevento=$x group by tipoboleto");
   echo "<div class='prueba'>";
   echo "<h1>BOLETOS</h1>";
   while($fila = $querye->fetch_array())
   {
      echo '<h5>'.'TIPO BOLETO:  '. $fila['tipoboleto'].'</h5>';
      echo '<h5>'.'PRECIO: '.$fila['precio'].'Bs</h5>';
      echo '<a href="http://google.com"><h5>COMPRAR</h5></a>';
      echo '<hr/>'; 
   }
   echo "<div>";
   break;
 }
}
?>


<?php include "footer.php" ?>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
