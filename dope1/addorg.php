<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "NewPassword", "fama");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$nameorganizer= mysqli_real_escape_string($link, $_POST['nameorganizer']);
$contacto = mysqli_real_escape_string($link, $_POST['contacto']);
 
// attempt insert query execution
$sql = "INSERT INTO organizer (nameorganizer, contacto) VALUES ('$nameorganizer', '$contacto')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>