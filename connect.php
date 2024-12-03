<?php
	$Name = $_POST['Name'];
	$Email =$_POST['Email'];
	$Message = $_POST['Message'];


	// Database connection
	$connect = new mysqli('localhost','root','','araneta');
	if($connect->connect_error){
		echo "$connect->connect_error";
		die("Connection Failed : ". $connect->connect_error);
	} else {
		$stmt = $connect->prepare("INSERT INTO list (Name, Email, Message) VALUES (?, ?, ?)");
		$stmt->bind_param("sss", $Name, $Email, $Message);
		$execval = $stmt->execute();    
		echo $execval;
		echo " 	Inserted!";
		$stmt->close();
		$connect->close();
	}
?>