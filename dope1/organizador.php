<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrar Organizadores</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
 <?php include "headeradm.php" ?>
<br>
    
</br>



<form action="addorg.php" method="post" align="center">

<h1>Inserta Organizador </h1>
    <p>
        <label for="nameorganizer">Nombre del Organizador:</label>
        <input type="text" name="nameorganizer" id="nameorganizer">
    </p>
    <p>
        <label for="contacto">Contacto :</label>
        <input type="text" name="contacto" id="contacto">
    </p>
   
 <input type="submit" value="Submit">
  
 <br />
 </p>
</form>

<div class="container-fluid">
    

        <div class="col-md-12">
            <h1 style="text-align:center">Organizadores</h1>
        </br>
    </br>
</br>
<?php   
$bd=mysqli_connect("localhost","root","NewPassword","fama");
$result=mysqli_query($bd,"select a.idorganizer,a.nameorganizer,a.contacto
 from organizer a"); 
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
                            &nbsp;Contacto&nbsp;
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
                                    
                            </tr>
                        </tbody>",
                        $row["idorganizer"], 
                        $row["nameorganizer"],
                        $row["contacto"]);
                        
                    
                        
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
$sql = "SELECT * FROM organizer";

$resultado = mysql_query($sql);
/*ahora creamos la tabla en html para mostrar los resultados
agregandole un par de botones de radio */
echo "<html>
        <h1>Modificar y/o Eliminar</h1>
        <body>
        <form name='ejecuta' method='post' action='ejecutaorg.php'>
            <table align='center'>
                <tr><td>Id</td><td>Nombre</td><td>Genero</td><td>Modificar</td><td>Eliminar</td></tr>";
$i = 0 ; //iniciamos nuestro cont en cero
/*el siguiente bucle nos permite obtener la informacion obtenida
de la ejecución de la sentencia de sql */
while ($row = mysql_fetch_row($resultado)){
            echo "<tr><td><input type='hidden' name='idorganizer[$i]' value='".$row[0]."' />".$row[0]."</td>
                      <td><input type='text' name='nameorganizer[$i]' value='".$row[1]."' /></td>
                      <td><input type='text' name='contacto[$i]' value='".$row[2]."'/></td>
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
