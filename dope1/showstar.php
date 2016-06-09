<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Artistas o Grupos</title>
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

</head>
<body>


	<div class="container-fluid">
	

		<div class="col-md-12">
			<h1 style="text-align:center">Artistas </h1>
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

 <a href="mostrarmodistar.php">Modifical</a>
  


<div align="center">



<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>

