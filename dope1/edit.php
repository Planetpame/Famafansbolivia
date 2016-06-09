


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Editar Noticia</title>

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

 <?php include "headeradm.php" ?>

</head>

<body>

 <br> </br>

 <br> </br>
 <br> </br>
 <br> </br>



<?php
function clear($message)
{
	if(!get_magic_quotes_gpc())
		$message = addslashes($message);
	$message = strip_tags($message);
	$message = htmlentities($message);
	return trim($message);
}
mysql_connect('localhost','root','NewPassword');
mysql_select_db('fama');
if(!$_GET['id'])
{
	$query = mysql_query("SELECT * FROM news ORDER BY id DESC");
	echo 'Edit<hr />';
	while($output = mysql_fetch_assoc($query))
		echo $output['subject'].' &raquo; <a href="?id='.$output['id'].'">Edit</a><br />';
}
else
{
	if ($_POST['submit'])
	{
		$postedby = clear($_POST['postedby']); 
		$subject = clear($_POST['subject']); 
		$news = clear($_POST['news']); 
		$id = $_GET['id']; 
		mysql_query("UPDATE news SET postedby='$postedby', news='$news', subject='$subject' WHERE id='$id'");
		mysql_close();
		echo 'News Edited.';
	}
	else
	{
		$id = $_GET['id']; 
		$query = mysql_query("SELECT * FROM news WHERE id='$id'");
		$output = mysql_fetch_assoc($query);
?>
<form method="post" action="?id=<? echo $output['id']; ?>"> 
Editing <? echo $output['subject']; ?><hr />
Posted By:<input name="postedby" id="postedby" type="Text" size="50" maxlength="50" value="<? echo $output['postedby']; ?>"><br />
Subject:<input name="subject" id="subject" type="Text" size="50" maxlength="50" value="<? echo $output['subject']; ?>"><br />
News:<textarea name="news" cols="50" rows="5"><? echo $output['news']; ?></textarea><br />
<input type="Submit" name="submit" value="Enter information">
</form>
<?php }} ?>










   
    <!-- Footer -->


<?php include "footer.php" ?>



    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
