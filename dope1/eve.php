<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Crear Evento</title>

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
<br> </br>

    <div class="container-fluid">
        
        
        <div class="row">
            <div class="col-md-8">
                
                <H3>Regístrar Evento</H3> 
                </br>

                <form role="form" action="procesaevento.php" method="post">
                    <div class="form-group">
                        <!--<label for="examplename">
                            Idartista
                        </label>
                        <input name="idartista" class="form-control" id="examplename" type="text" />
                        -->
                    </div>
                    <div class="form-group">
                        <label for="examplename">
                            Nombre
                        </label>
                        <input name="nombre" class="form-control" id="examplename" type="text" />
                    </div>
                    <div class="form-group">
                        <label for="examplename">
                            Fecha (Ex 2016-06-14)
                        </label>
                        <input name="fecha" class="form-control" id="examplename" type="text" />
                    </div>
                    <div class="form-group">
                        <label for="examplename">
                            Hora Inicio
                        </label>
                        <input name="horaini" class="form-control" id="examplename" type="text" />
                    </div>
                    <div class="form-group">
                        <label for="examplename">
                            Descripcion
                        </label>
                        <input name="descripcion" class="form-control" id="examplename" type="text" />
                    </div>
                    <div class="form-group">
                        <label for="examplename">
                            Evento en Facebook
                        </label>
                        <input name="acercacosto" class="form-control" id="examplename" type="text" />
                    </div>
                    
                    <!--<label for="examplename">
                            Genero
                        </label>
                    <SELECT name='descripcion' SIZE='1'>-->
                    <?php
                          /* $bd=mysqli_connect("localhost","root","","p1");
                           $result=mysqli_query($bd,"SELECT nombreg,idgenero FROM genero"); 
                              
                        while($row = mysqli_fetch_array($result)) {  
                          printf("
                        
                            <OPTION VALUE='%s'>%s</OPTION>
                         ", 
                          $row["idgenero"],
                          $row["nombreg"]); 
                        } 
                        mysqli_free_result($result); 
                        mysqli_close($bd);*/
                     ?>
                     <!--</SELECT>-->

                    
                    <!--</SELECT>-->
                    <!--
                        <SELECT name="tipo" SIZE="1">
                            <OPTION VALUE="1">musical</OPTION>
                            <OPTION VALUE="2">teatral</OPTION>
                            <OPTION VALUE="3">fotografico</OPTION>
                            <OPTION VALUE="4">Pintura</OPTION>
                            <OPTION VALUE="5">Otro</OPTION>
                        </SELECT>
                     
                    <div class="checkbox">
                    
                    <label>
                            <input type="checkbox" /> Check me out
                        </label>-->
                    </div>
                    <div class="form-group">
                    <label for="examplename">
                            Lugar
                        </label>
                     <SELECT name='lugar' SIZE='1'>
                        <?php
                           $bd=mysqli_connect("localhost","root","NewPassword","fama");
                           $result=mysqli_query($bd,"SELECT idplace,nameplace FROM place"); 
                              
                        while($row = mysqli_fetch_array($result)) {  
                          printf("
                        
                            <OPTION VALUE='%s'>%s</OPTION>
                         ", 
                          $row["idplace"],
                          $row["nameplace"]); 
                        } 
                        mysqli_free_result($result); 
                        mysqli_close($bd);
                     ?>
                     </SELECT><br><br>
                     <label for="examplename">
                            Artista
                        </label>
                     <SELECT name='art' SIZE='1'>
                        <?php
                           $bd=mysqli_connect("localhost","root","NewPassword","fama");
                           $result=mysqli_query($bd,"SELECT idstar,namestar FROM star"); 
                              
                        while($row = mysqli_fetch_array($result)) {  
                          printf("
                        
                            <OPTION VALUE='%s'>%s</OPTION>
                         ", 
                          $row["idstar"],
                          $row["namestar"]); 
                        } 
                        mysqli_free_result($result); 
                        mysqli_close($bd);
                     ?>
                     </SELECT><br><br>



                      <label for="examplename">
                            Organizador
                        </label>
                     <SELECT name='org' SIZE='1'>
                        <?php
                           $bd=mysqli_connect("localhost","root","NewPassword","fama");
                           $result=mysqli_query($bd,"SELECT idorganizer,nameorganizer FROM organizer"); 
                              
                        while($row = mysqli_fetch_array($result)) {  
                          printf("
                        
                            <OPTION VALUE='%s'>%s</OPTION>
                         ", 
                          $row["idorganizer"],
                          $row["nameorganizer"]); 
                        } 
                        mysqli_free_result($result); 
                        mysqli_close($bd);
                     ?>
                     </SELECT><br><br>




                     <button name="accion" type="submit" class="btn btn-primary">
                        Registrarse
                    </button>
                      <a href="procesar.php" role="button" class="btn btn-primary">Atrás</a> 
                     </div>

                     </div>
                    
                    
                </form>
            </div>
            <div class="col-md-4">
                <img class="img-responsive"alt="Bootstrap Image Preview" src="img/lp.jpg" />
            </div>

        </div>
    </div>


<?php include "footer.php" ?>



    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
