<?php

$con = mysql_connect("localhost","root","NewPassword");
if (! $con){die ("ERROR EN LA CONEXION CON MYSQL: ".mysql_error());}

$base = mysql_select_db ("fama",$con);

if(! $base){die ("ERROR AL CONECTAR CON LA BASE DE DATOS: ".mysql_error());}
/********************************************
iniciamos el ciclo con el que obtendremos lo que envio el formulario
**************************************************************/
foreach ($_POST['seleccion'] as $indice => $valor){
//Vamos a verificar si trae la opcion de eliminar o modificar
$opcion = substr ($_POST['seleccion'][$indice],0,-1); //extraemos la parte de la cadena que elimina y/o modifica
switch($opcion){
//generamos la sentencia para la modificación filtrando por el id para que solo cambie ese registro
	case 'modifica':$sql="UPDATE place SET 
	                      nameplace='".$_POST['nameplace'][$indice]."',
						  placeliterally='".$_POST['placeliterally'][$indice]."',
						  picplace='".$_POST['picplace'][$indice]."'
						  WHERE idplace=".$_POST['idplace'][$indice];break;
	case 'elimina':$sql="DELETE FROM place WHERE idplace=".$_POST['idplace'][$indice];break;
	default: echo "<center>NO HAY NADA SELECCIONADO</center>"; break;
}
echo "Variable sql: ".$sql;
$resultado = mysql_query($sql);
if (! $resultado ){die ("ERROR AL EJECUTAR LA CONSULTA ".$_POST['seleccion'].":".mysql_error());}
else{
	echo "<center>FELICIDADES SENTENCIA EJECUTADA CORRECTAMENTE</center><br />
	<a href='lugar.php'>Volver al panel</a>";
}
}
?>
