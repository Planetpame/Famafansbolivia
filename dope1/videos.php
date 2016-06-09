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
$result=mysqli_query($bd,"select v.linkvid, v.titulo,v.des, s.namestar from videos v, star s where v.idstar=s.idstar group by v.linkvid"); 
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
                                    &nbsp;%s&nbsp;
                                </td>
                                <td>
                                   <h2> &nbsp;%s&nbsp; </h2>

                                   <br>   </br>
                                
                                  <br> &nbsp;%s&nbsp;   </br>
                        
                                
                                   <br>   &nbsp;%s&nbsp;</br>
                                </td>
                            
                                
                            </tr>
                        </tbody>",
                        $row["linkvid"], 
                        $row["titulo"],  
                        $row["des"],
                        $row["namestar"]);
                    
                        
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
