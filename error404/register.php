<?php

    session_start();

    $server = "sql201.epizy.com";
    $username = "epiz_31524775";
    $passwords = "jiBWj5netG";
    $dbname = "epiz_31524775_smartbasket";
    

    $name = $_POST['name'];
    $ngoid = $_POST['ngoid'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    //Database connection
    $con = mysqli_connect($server,$username,$passwords,$dbname);

    if($con->connect_error)
    {
        echo "$con->connect-error";
        die("Connection Failed :".$con->connect_error);
    }else
    {

        $s = "select * from registration where ngoid = '$ngoid'";
        $t = "select * from registration where email = '$email'";
        
        $result = mysqli_query($con,$s);
        $result2 = mysqli_query($con,$t);

        $num = mysqli_num_rows($result);
        $num2 = mysqli_num_rows($result2);

        if($num == 1)
        {
            echo("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('NGO ID already exists :/')
        window.location.href='log.html';
        </SCRIPT>");
        }
        else if($num2 == 1)
        {
            echo("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Email already exists :/')
        window.location.href='log.html';
        </SCRIPT>");
        }
        else if($password != $cpassword)
        {
            echo("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Passwords do not match')
        window.location.href='log.html';
        </SCRIPT>");
        }
        else{
        $stmt = $con->prepare("INSERT INTO registration(name,ngoid,email,password,cpassword) VALUES(?,?,?,?,?)");
        $stmt->bind_param("sssss",$name,$ngoid,$email,$password,$cpassword);
        $stmt->execute();       
        echo("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Registered Successfully')
        window.location.href='log.html';
        </SCRIPT>");
        }
        $stmt->close();
        $con->close();
    }

?>