<?php 
	$nombre = $_POST['nombre'];
	$fecha= $_POST['fecha'];
  $horaini = $_POST['horaini'];
  $descripcion = $_POST['descripcion'];
  $acercacosto=$_POST['acercacosto'];
	
  $lugar=$_POST['lugar'];
  $artista=$_POST['art'];
  $org = $_POST['org'];


echo $artista;
  //$idgenero=$_POST['tipo'];
$bd=mysqli_connect("localhost","root","NewPassword","fama");
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
$query = "INSERT INTO evento (nombre,fecha,horaini,descripcion,acercacosto,idorganizer,idplace) values
('$nombre','$fecha','$horaini','$descripcion','$acercacosto','$org','$lugar')";





$result=mysqli_query($bd, $query)or die(mysql_error());

$query1 = "SELECT idevento ,nombre,fecha FROM evento WHERE nombre='$nombre' and fecha='$fecha' and descripcion='$descripcion' and acercacosto='$acercacosto'";
$resulty=mysqli_query($bd, $query1) or die(mysql_error());

while($row = mysqli_fetch_array($resulty)) {
   $idevento=$row["idevento"];
    $nombre=$row["nombre"];
    $fecha=$row["fecha"];

   $idstar=$artista;
   $query5 = "insert into starevento
   (idstar,idevento) values ('$idstar','$idevento')";
   $result4=mysqli_query($bd, $query5);

   $query1="Insert into tcalendario  (fecha,evento,idevento)values ('$fecha','$nombre','$idevento')";
      $result4=mysqli_query($bd, $query1);

 }
 mysqli_close($bd);
 echo " 
<p>El registro ha sido insertado con exito.</p> 

<p><a href='eve.php'>Back</a></p> 
"; 
  
?> 