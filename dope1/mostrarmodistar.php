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
		<h1>MODIFICAR Y/O ELIMINAR</h1>
		<body>
		<form name='ejecuta' method='post' action='ejecutastar.php'>
			<table>
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