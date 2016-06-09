<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrar Artistas</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

   

</head>

<body>
 <?php include "headeradm.php" ?>

<br>
    
</br>
<form action="addstar.php" method="post" align="center">

<h1>Insertar Artista</h1>
    <p>
        <label for="namestar">Nombre del Artista :</label>
        <input type="text" name="namestar" id="namestar">
    </p>
    <p>
        <label for="genero">Genero :</label>
        <input type="text" name="genero" id="genero">
    </p>
    <p>
        <label for="foto">Foto (PhotoBucket):</label>
        <input type="text" name="foto" id="foto">
    </p>
   
 <input type="submit" value="Submit">


                    <a href="showstar.php">Ver Lista</a>
  
 <br />
 </p>
</form>

<div class="container-fluid">
    

        <div class="col-md-12">
            <h1 style="text-align:center">Artistas Insertados</h1>
        </br>
    </br>
</br>
<?php   
$bd=mysqli_connect("localhost","root","NewPassword","fama");
$result=mysqli_query($bd,"select a.idstar,a.namestar,a.genero ,a.fotos
 from star a"); 
    ?> 

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">LISTADO DE Artistas</div>
                <!-- Table -->
                <table class="table">
                    <tr class="success">
                        <td>
                            &nbsp;ID&nbsp;
                        </td>
                        <td>
                            &nbsp;Nombre&nbsp;
                        </td>
                        <td>
                            &nbsp;Genero&nbsp;
                        </td>
                        <td>
                            &nbsp;Fotos&nbsp;
                        </td>
                    
                
                    </tr>
                    <?php       
                    while($row = mysqli_fetch_array($result)) {  
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
                                    
                            </tr>
                        </tbody>",
                        $row["idstar"], 
                        $row["namestar"],
                        $row["genero"],
                        $row["fotos"]);
                        
                    
                        
                    } 
                    mysqli_free_result($result); 
                    mysqli_close($bd);
                    ?>
                </table>
            </div> 


        </div>
    </div>
</div>
</div>


<div align="center">



 <?php
/* http://programarenphp.wordpress.com 
primero creamos nuestra conexion tanto con el 
mysql, como con la base de datos, recuerda que 
el nombre del host, del user y del pass los 
debes de cambiar por los de tu configuración*/

$con = mysql_connect("localhost","root","NewPassword");
if (! $con){die ("ERROR EN LA CONEXION CON MYSQL: ".mysql_error());}

$base = mysql_select_db ("fama",$con);
if(! $base){die ("ERROR AL CONECTAR CON LA BASE DE DATOS: ".mysql_error());}

/********************************************/
/* Luego vamos a obtener todos los datos que esten contenidos 
en la tabla con una consulta */
$sql = "SELECT * FROM star";

$resultado = mysql_query($sql);
/*ahora creamos la tabla en html para mostrar los resultados
agregandole un par de botones de radio */
echo "<html>
        <h1>Modificar o Eliminar Registro</h1>
        <body>
        <form name='ejecuta' method='post' action='ejecutastar.php'  align='center'>
            <table align='center'>
                <tr><td>Id</td><td>Nombre</td><td>Genero</td><td>Foto</td><td>Modificar</td><td>Eliminar</td></tr>";
$i = 0 ; //iniciamos nuestro cont en cero
/*el siguiente bucle nos permite obtener la informacion obtenida
de la ejecución de la sentencia de sql */
while ($row = mysql_fetch_row($resultado)){
            echo "<tr><td><input type='hidden' name='idstar[$i]' value='".$row[0]."' />".$row[0]."</td>
                      <td><input type='text' name='namestar[$i]' value='".$row[1]."' /></td>
                      <td><input type='text' name='genero[$i]' value='".$row[2]."'/></td>
                      <td><input type='text' name='fotos[$i]' value='".$row[3]."'/></td>

                      <td><input type='radio' name='seleccion[$i]' value='modifica".$row[0]."'></td><!-- Esta línea es para saber si se modifica -->
                      <td><input type='radio' name='seleccion[$i]' value='elimina".$row[0]."'></td><!-- Esta línea es para saber si se elimina -->
                      </tr>";$i++; 
}
echo "</table><input type='submit' value='Enviar'></form></body></html>";
?>






<?php include "footer.php" ?>



    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
