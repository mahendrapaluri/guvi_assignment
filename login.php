<?php
include('database_connect.php');
 if($_SERVER["REQUEST_METHOD"] == "POST") {
 	
 	$name = mysqli_real_escape_string($con, $_POST['email']);
 	$password =mysqli_real_escape_string($con, $_POST['password']);
 	$result = mysqli_query($con, "select email,password from registration where email='$name' AND password='$password'");
 	if(mysqli_num_rows($result)>0){
 		//header("Location: success.html ");
 		echo json_encode(array('indicator'=>"1"));
 		}
 	else{
 		echo json_encode(array('indicator'=>"0"));
 	}
 	}
 ?>