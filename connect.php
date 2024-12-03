<?php
	$Name = $_POST['Name'];
	$Email =$_POST['Mes'];
	$Mes = $_POST['Email'];

	// Database connection
	$conn = new mysqli('localhost','root','','eric');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into contact(Name, Email, Mes) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("sss", $Name, $Email, $Mes);
		$execval = $stmt->execute();    
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>