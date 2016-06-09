<?php

if(!empty($_POST)){
	if(isset($_POST["username"]) &&isset($_POST["password"]) ){
		if($_POST["username"]!=""&&$_POST["password"]!="" ){
			include "conexion.php";
			
			$user_id=null;
			$nombre=null;
			$sql1= "select * from user where (username=\"$_POST[username]\" or email=\"$_POST[username]\") and password=\"$_POST[password]\" ";
			$query = $con->query($sql1);
			while ($r=$query->fetch_array()) {
				$user_id=$r["id"];
				$nombre=$r["fullname"];
				$color_fondo=$r["color_fondo"];
				break;
			}
			if($user_id==null){
				print "<script>alert(\"Acceso invalido.\");window.location='../login.php';</script>";
			}else{ 

				if($r["rol"]=="F"){
				session_start();
				$_SESSION["user_id"]=$user_id;
				$_SESSION["nombre"]=$nombre;
				$_SESSION["color_fondo"]=$color_fondo;
				print "<script>window.location='../indexf.php';</script>";		} 

				else{
                
                session_start();
				$_SESSION["user_id"]=$user_id;
                $_SESSION["nombre"]=$nombre;
                $_SESSION["color_fondo"]=$color_fondo;
				print "<script>window.location='../indexa.php';</script>";		} 

			}
		}
	}
}



?>