<?php
	include('database_connect.php');
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$name=mysqli_real_escape_string($con,$_POST['name']);
		$age=mysqli_real_escape_string($con,$_POST['age']);
		$degree=mysqli_real_escape_string($con,$_POST['degree']);
		$email=mysqli_real_escape_string($con,$_POST['email']);
		$password=mysqli_real_escape_string($con,$_POST['password']);
		$gender=mysqli_real_escape_string($con,$_POST['gender']);
		$mobile_number=mysqli_real_escape_string($con,$_POST['phone_number']);
		$validation=mysqli_query($con,"select email from registration where email='$email'");
		$mobile_number1=mysqli_query($con,"select mobile_number from registration where mobile_number='$mobile_number'");

		if(mysqli_num_rows($validation)>0){
			echo json_encode(array('indicator'=>"1", 'msg' => "Invalid phone number"));
		}
		else{
			if(mysqli_num_rows($mobile_number1)>0){
				echo json_encode(array('indicator'=>"2"));
			}
			else{
			if(mysqli_query($con,"INSERT INTO registration (name,age,degree,email,password,mobile_number,gender) values ('$name','$age','$degree','$email','$password','$mobile_number','$gender') ")){
				if(file_exists('regis.json')==1){
					$file=fopen('regis.json', 'r+');
					$stat = fstat($file);
					ftruncate($file, $stat['size']-1);
					fclose($file);
					$file=fopen("regis.json", 'a');
					fwrite($file,',');
					fclose($file);	
				}
				else{
					$file=fopen('regis.json', 'w+');
					$sy='[';
					fwrite($file,$sy);
					fclose($file);
				}
				$data="regis.json";
				$st=json_encode($_POST,JSON_PRETTY_PRINT);
				file_put_contents($data, $st,FILE_APPEND);
				$file=fopen("regis.json", 'a');
				$sy=']';
				fwrite($file,$sy);
				fclose($file);
				echo json_encode(array('indicator'=>"0"));
			}
			else{
				echo json_encode(array('indicator'=>"3"));
			}
			}
		}
}
mysqli_close($con);
?>