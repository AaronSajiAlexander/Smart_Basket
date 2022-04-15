<?php
    session_start();
   $server = "sql201.epizy.com";
    $username = "epiz_31524775";
    $password = "jiBWj5netG";
    $dbname = "epiz_31524775_smartbasket";
    

	$email = $_POST['email'];
	$message = $_POST['message'];

	// Database connection
	$con = mysqli_connect($server,$username,$password,$dbname);
    if($con->connect_error)
    {
        echo "$con->connect-error";
        die("Connection Failed :".$con->connect_error);
    }
    else {
		$stmt = $con->prepare("INSERT INTO contact(email,message) VALUES(?,?)");
		$stmt->bind_param("ss", $email, $message);
		$stmt->execute();
         echo("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Message sent!')
        window.location.href='lav2.html';
        </SCRIPT>");
		$stmt->close();
		$con->close();
	}

?>