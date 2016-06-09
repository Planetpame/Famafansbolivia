<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Videos</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

</head>

<body>
 <?php include "header.php" ?>




<?php


//include_once "fun.php";
mysql_connect('localhost','root','NewPassword');
mysql_select_db('fama');
$query = mysql_query('SELECT e.idevento as ide, e.nombre as evento , e.fecha as fe ,e.horaini as hora ,e.descripcion as des ,e.acercacosto as costo ,p.nameplace as lugar,p.placeliterally as direccion ,o.nameorganizer as org ,o.contacto as con , s.namestar as artista,p.picplace as pic
from evento e,place p,organizer o ,starevento se ,star s where e.idplace=p.idplace and e.idorganizer=o.idorganizer and s.idstar=se.idstar and se.idevento=e.idevento');
while($output = mysql_fetch_assoc($query))
{
      echo $output['ide'].'<br />';
    echo $output['evento'].'<br />';
    echo $output['fe'].'<br / >';
    echo $output['hora'].'<br />';
    echo $output['des'].'<br / >';

    echo $output['costo'].'<br />';
    echo $output['lugar'].'<br / >';
    echo $output['direccion'].'<br />';
    echo $output['org'].'<br / >';
    echo $output['con'].'<br />';

    echo   'Artista:  kk ';
    echo $output['artista'].'<br / >';
    echo $output['pic'].'<br />';


echo "este es el puto id";

$x=$output['ide'];
echo $x;

    echo '<hr />'; 



$query1 = mysql_query("SELECT s.namestar as b from starevento sa , evento e , star s where sa.idevento=e.idevento and sa.idstar=s.idstar and e.idevento='$x'");
while($output1 = mysql_fetch_assoc($query1))
{

      echo   'Artistajjj here:   ';
      echo $output1['b'].'<br />';
   

    

    echo '<hr />'; 



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
