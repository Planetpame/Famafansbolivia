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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
 <?php include "headerfan.php" ?>

<div class="container-fluid">
    

        <div class="col-md-12">
     

<?php   
$bd=mysqli_connect("localhost","root","NewPassword","fama");
$result=mysqli_query($bd,"SELECT * FROM news ORDER BY id DESC"); 
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
                               <p>'Posteado Por:'<p>
                               <h4> &nbsp;%s&nbsp;</h4>
                                <p>'Fecha:'<p>
                                   <h4> &nbsp;%s&nbsp; </h4>
                                   <br>   </br>
                                   </td>
                                <td>
                                  <h1> &nbsp;%s&nbsp;   </h1>
                                   <p>   &nbsp;%s&nbsp;</p>
                                </td>        
                            </tr>
                        </tbody>",
                        $row["postedby"], 
                        $row["date"],  
                        $row["subject"],
                        $row["news"]);
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
