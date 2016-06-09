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


<?php
function toSpanishDate( $fecha){
    $arrayDateTime=explode(" ",$fecha);
    $arrayDate=explode("-", $arrayDateTime[0]);
    $newDate=$arrayDate[2]."-".$arrayDate[1]."-".$arrayDate[0];
    return $newDate;

}

//include_once "fun.php";
mysql_connect('localhost','root','NewPassword');
mysql_select_db('fama');
$query = mysql_query('SELECT * FROM news ORDER BY id DESC');
while($output = mysql_fetch_assoc($query))
{
    echo $output['subject'].'<br />';
    echo $output['news'].'<br / >';
    echo  toSpanishDate($output['date']).'<br / >';

    echo 'Posted by '.$output['postedby'];
    echo '<hr />'; 
}
?>




<?php include "footer.php" ?>



    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
