<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	// $password = $_POST['password'];
	// $number = $_POST['number'];

	// Database connection
	$conn = new mysqli('localhost','root','Ranjit@2001','contact');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into comment(name, email, subject, message) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $name, $email, $subject, $message);
		$execval = $stmt->execute();
		echo $execval;
		echo "Your message has been sent. Thank you!...";
		$stmt->close();
		$conn->close();
	}
?>