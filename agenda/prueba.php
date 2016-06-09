 


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

</head>

<body>
 <br>

  </br>

   <br>

  </br>



  <table class="table">
                    <tr class="success">
                        <td>
                            &nbsp;ID&nbsp;
                        </td>
                        <td>
                            &nbsp;Nombre&nbsp;
                        </td>
                        <td>
                            &nbsp;Foto&nbsp;
                        </td>
                        <td>
                            &nbsp;Descripcion&nbsp;
                        </td>

                      </tr>
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
    
$query=$db->query("SELECT DISTINCT e.idevento as ide, e.nombre as evento , e.fecha as fe ,e.horaini as hora ,e.descripcion as des ,e.acercacosto as costo ,p.nameplace as lugar,p.placeliterally as direccion ,o.nameorganizer as org ,o.contacto as con , s.namestar as artista,p.picplace as pic
    from evento e,place p,organizer o ,starevento se ,star s where e.idplace=p.idplace and e.idorganizer=o.idorganizer and s.idstar=se.idstar and se.idevento=e.idevento AND e.idevento=".$idevent);
while($output = $query->fetch_array())
{
 

  





  printf("<tbody>
                            <tr class='active'>
                                <td>
                                    &nbsp;%s&nbsp;
                                </td>
                                <td>
                                    &nbsp;%s&nbsp;
                                <td>
                                   &nbsp;%s&nbsp;
                                </td>
                                <td>
                                    &nbsp;%s&nbsp;
                                </td>
                                 <td>
                                    &nbsp;%s&nbsp;
                                </td>
                                <td>
                                    &nbsp;%s&nbsp;
                                <td>
                                   &nbsp;%s&nbsp;
                                </td>
                                <td>
                                    &nbsp;%s&nbsp;
                                </td>
                              <td>
                                    &nbsp;%s&nbsp;
                                </td>
                            
                                
                            </tr>
                        </tbody>",
                        $row["ide"], 
                        $row["evento"],
                        $row["fe"],
                         $row["hora"],
                           $row["des"],
                             $row["costo"],
                               $row["direccion"],
                                 $row["lugar"],
                                   $row["org"],
                                   
                        $row["con"]);

    $x=$output['ide'];
    echo $x;
    echo '<hr />'; 
$query1 = $db->query("SELECT DISTINCT * from starevento sa , evento e , star s where sa.idevento=e.idevento and sa.idstar=s.idstar and e.idevento=$x");
   while($output1 = $query1->fetch_array())
   {

      echo   'Artistajjj here:-------   ';
      echo $output1['namestar'].'<br />';
      echo $output1['genero'].'<br />';
      echo "<img src='".$output1['fotos']."''></img>";
      echo '<hr />'; 
   }
   break;
 }
}

?>



</table>

<?php include "footer.php" ?>



    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
