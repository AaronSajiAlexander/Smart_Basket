<?php

    session_start();

    $server = "sql103.epizy.com";
    $username = "epiz_31491912";
    $password = "edjJonLakykVBT";
    $dbname = "epiz_31491912_smartbasket";

    $name = $_POST['name'];
    $email = $_POST['email'];
    $doorno = $_POST['doorno'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pincode = $_POST['pincode'];
    $mobile = $_POST['mobile'];
    $mobile2 = $_POST['mobile2'];

    // Database connection
    $con = mysqli_connect($server,$username,$password,$dbname);

    if($con->connect_error)
    {
        echo "$con->connect-error";
        die("Connection Failed :".$con->connect_error);
    }
    else{
        $stmt = $con->prepare("INSERT INTO donate(name,email,doorno,street,city,state,pincode,mobile,mobile2) VALUES(?,?,?,?,?,?,?,?,?)");
		$stmt->bind_param("ssisssiii", $name,$email,$doorno,$street,$city,$state,$pincode,$mobile,$mobile2);
		$stmt->execute();
         echo("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Details Received!')
        window.location.href='foodclothmisc.html';
        </SCRIPT>");
		$stmt->close();
		$con->close();
    }


?>