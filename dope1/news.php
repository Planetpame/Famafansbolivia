<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrar Artistas</title>

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
 <br> </br>
 <br> 
 </br>


 
<form method="post" action="#" align="center"> 
<h1>Escribe una Noticia</h1>
    Posted By:<br /><input name="postedby" id="postedby" type="Text" size="50" maxlength="50"><br />
    Subject:<br /><input name="subject" id="subject" type="Text" size="50" maxlength="50"><br />
    <textarea name="news" id="news" cols="100" rows="10"></textarea><br />

<div class="form-group">
                    <label for="examplename">
                            Artista
                        </label>
                     <SELECT name='lugar' SIZE='1'>
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


</div>

<?php
$idartista=$_POST['lugar'];?>


<div class="form-group">
                    <label for="examplename">
                            Eventos
                        </label>
                     <SELECT name='Evento' SIZE='1'>
                        <?php
                           $bd=mysqli_connect("localhost","root","NewPassword","fama");
                           $result=mysqli_query($bd,"SELECT idevento,nombre FROM evento"); 
                              
                        while($row = mysqli_fetch_array($result)) {  
                          printf("
                        
                            <OPTION VALUE='%s'>%s</OPTION>
                         ", 
                          $row["idevento"],
                          $row["nombre"]); 
                        } 


                        mysqli_free_result($result); 
                        mysqli_close($bd);
                     ?>
                     </SELECT><br><br>


</div>

<?php
$idevento=$_POST['Evento'];?>





    <input type="Submit" name="submit" id="submit" value="Enter News">




</form>
<?php
function clear($message)
{
    if(!get_magic_quotes_gpc())
        $message = addslashes($message);
    $message = strip_tags($message);
    $message = htmlentities($message);
    return trim($message);
}
if ($_POST['submit'])
{ 
    if (empty($_POST['postedby']))
        die('Enter a name.'); 
    else if (empty($_POST['subject']))
        die('Enter a subject.'); 
    else if (empty($_POST['news']))
        die('Enter an article.'); 
    $postedby = clear($_POST['postedby']); 
    $subject = clear($_POST['subject']); 
    $news = clear($_POST['news']); 



/// $date = date_default_timezone_set();
    mysql_connect('localhost','root','NewPassword');
    mysql_select_db('fama');
    if(mysql_query("INSERT INTO news (id , postedby , news , subject ) VALUES ('', '$postedby', '$news', '$subject')"))
            echo $idartista;


        echo 'News Entered.';
        $bd=mysqli_connect("localhost","root","NewPassword","fama");

  


    $query1 = "SELECT id FROM news WHERE postedby='$postedby' and subject='$subject'";
$resulty=mysqli_query($bd, $query1) or die(mysql_error());

while($row = mysqli_fetch_array($resulty)) {
   $id=$row["id"];
    

   $idstar=$artista;
   $query5 = "insert into eventonoticia
   (idevento,idnoticia) values ('$idevento','$id')";
   $result4=mysqli_query($bd, $query5);

 }
 mysqli_close($bd);
}
?>



<?php include "footer.php" ?>



    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
