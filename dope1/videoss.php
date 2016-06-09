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




<div class="container-fluid">
    

        <div class="col-md-12">
     

<?php   
$bd=mysqli_connect("localhost","root","NewPassword","fama");
$result=mysqli_query($bd,"SELECT e.idevento as ide, e.nombre as evento , e.fecha as fe ,e.horaini as hora ,e.descripcion as des ,e.acercacosto as costo ,p.nameplace as lugar,p.placeliterally as direccion ,o.nameorganizer as org ,o.contacto as con ,p.picplace as pic
from evento e,place p,organizer o where e.idplace=p.idplace and e.idorganizer=o.idorganizer "); 
    ?> 

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading"></div>
                <!-- Table -->
                <table class="table">
                    <tr class="success">
                        <td>
                            &nbsp;&nbsp;
                        </td>
                        <td>
                            &nbsp;&nbsp;
                        </td>
                        

                    </tr>
                    <?php       
                    while($row = mysqli_fetch_array($result)) {  
                        printf("<tbody>
                            <tr class='active'>
                                <td>
                                   <&nbsp;%s&nbsp; 
                                     
                                
                             
                                   <h1> &nbsp;%s&nbsp; </h1>
                                       <br>   </br>
                                
                               
                                 <br>     &nbsp;%s&nbsp;   </br>
                                   
                                
                                 <br>     &nbsp;%s&nbsp;   </br>

                               
                                 <br>     &nbsp;%s&nbsp;   </br>
                               
                                 <br>     &nbsp;%s&nbsp;   </br>
                               
                                 <br>     &nbsp;%s&nbsp;   </br>
                                
                                 <br>     &nbsp;%s&nbsp;   </br>
                                
                                 <br>     &nbsp;%s&nbsp;   </br>
                            
                                    &nbsp;%s&nbsp;
                                
                                 <td>
                                    &nbsp;%s&nbsp;
                                </td>
                                
                            </tr>
                        </tbody>",
                      $x=  $row["ide"], 
                        $row["evento"],  
                        $row["fe"],
                        $row["hora"],
                        $row["des"],
                        $row["costo"],
                        $row["lugar"],
                        $row["direccion"],
                        $row["org"],
                        $row["con"],
                        $row["pic"]);



echo $x;



$result1=mysqli_query($bd,"SELECT e.idevento as ide, e.nombre as evento , e.fecha as fe ,e.horaini as hora ,e.descripcion as des ,e.acercacosto as costo ,p.nameplace as lugar,p.placeliterally as direccion ,o.nameorganizer as org ,o.contacto as con ,p.picplace as pic
from evento e,place p,organizer o where e.idplace=p.idplace and e.idorganizer=o.idorganizer "); 
    


















                    
                        
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






<?php include "footer.php" ?>



    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
