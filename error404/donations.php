<?php

 session_start();

   $server = "sql201.epizy.com";
    $username = "epiz_31524775";
    $password = "jiBWj5netG";
    $dbname = "epiz_31524775_smartbasket";

    $fooddata = $_POST['fooddata'];
    $foodquantity = $_POST['foodquantity'];
    $clothdata = $_POST['clothdata'];
    $clothquantity = $_POST['clothquantity'];
    $miscdata = $_POST['miscdata'];
    $miscquantity = $_POST['miscquantity'];

    // Database connection
    $con = mysqli_connect($server,$username,$password,$dbname);

    if($con->connect_error)
    {
        echo "$con->connect-error";
        die("Connection Failed :".$con->connect_error);
    }
    else{
        $stmt = $con->prepare("INSERT INTO donations(fooddata,foodquantity,clothdata,clothquantity,miscdata,miscquantity) VALUES(?,?,?,?,?,?)");
		$stmt->bind_param("sisisi", $fooddata,$foodquantity,$clothdata,$clothquantity,$miscdata,$miscquantity);
		$stmt->execute();
         echo("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Thanks for your valuable donations!')
        window.location.href='lav.html';
        </SCRIPT>");
		$stmt->close();
		$con->close();
    }

?>