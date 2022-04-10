<?php

    session_start();
    $server = "sql103.epizy.com";
    $username = "epiz_31491912";
    $password = "edjJonLakykVBT";
    $dbname = "epiz_31491912_smartbasket";

    $ngoid = $_POST['ngoid'];
    $password = $_POST['password'];

     //Database connection
    $con = mysqli_connect($server,$username,$password,$dbname);
    
    
    if($con->connect_error)
    {
        echo "$con->connect-error";
        die("Connection Failed :".$con->connect_error);
    }else
    {

        $s = "select * from registration where ngoid = '$ngoid' && password = '$password'";
        
        $result = mysqli_query($con,$s);

        $num = mysqli_num_rows($result);

        if($num == 1)
        {
            echo("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Login Successful !');
        window.location.href='lav2.html';
        </SCRIPT>");
        }
        else{      
        echo("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('User not Found :/')
        window.location.href='log.html';
        </SCRIPT>");
        }
    }

?>