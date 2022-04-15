<!DOCTYPE html>
<html>

<head>
    <title>Smart Basket</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="don.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/09d49739dc.js" crossorigin="anonymous"></script>
</head>

<body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top py-2" id="mainNav">
        <div class="container">
            <a class="navbar-brand text-white" href="lav2.html">Smart Basket (Logged in as NGO)</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#myNavbar" aria-controls="myNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                   <li class="nav-item">
                        <a class="nav-link" href="lav2.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="lav2.html#about-section">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="log2.html">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="don2main.php">Donate</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="lav2.html#contact-us">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="support.html">Support Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="lav.html">Sign Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <div class="wrapper">
        <div class="title">Contribution Details</div>
        <form action="donate2.php" method="post">
            <div class="input-box">
                <label for="name"></label>
                <input type="text" placeholder="Name" name="name" required>
            </div>
            <div class="input-box">
                <label for="email"></label>
                <input type="email" placeholder="Email" name="email" required>
            </div>
            <div class="input-box">
                <label for="doorno"></label>
                <input type="text" placeholder="Door no" name="doorno" required>
            </div>
            <div class="input-box">
                <label for="street"></label>
                <input type="text" placeholder="Street Details" name="street" required>
            </div>
            <div class="input-box">
                <label for="city"></label>
                <input type="text" placeholder="City" name="city" required>
            </div>
            <div class="input-box">
                <label for="state"></label>
                <input type="text" placeholder="State" name="state" required>
            </div>
            <div class="input-box">
                <label for="pincode"></label>
                <input type="number" placeholder="Pincode" name="pincode" required>
            </div>
            <div class="input-box">
                <label for="mobile"></label>
                <input type="number" placeholder="Mobile number " name="mobile" required>
            </div>
            <div class="input-box ">
                <label for="mobile2"></label>
                <input type="number" placeholder="Mobile number 2(optional) " name="mobile2">
            </div>
            <br>
            <div class="End-div">
                <input type="submit" value="Donate">
            </div>
            <div class="text ">
                <h3>Have an NGO account? <a class="login-now" href="login2.html">Login now</a></h3>
            </div>
        </form>
    </div>


<?php

$server = "sql201.epizy.com";
    $username = "epiz_31524775";
    $password = "jiBWj5netG";
    $dbname = "epiz_31524775_smartbasket";

// Database connection
$con = mysqli_connect($server,$username,$password,$dbname);

if($con->connect_error)
{
   echo "$con->connect-error";
   die("Connection Failed :".$con->connect_error);
}
else{

$stmt2 = "SELECT * FROM donate where status = 'PENDING';"; 
$stmt3 = "SELECT * FROM donations;";

$res = mysqli_query($con,$stmt2);
$res1 = mysqli_query($con,$stmt3);

$row = mysqli_fetch_array($res); 
$row2 = mysqli_fetch_array($res1);
$count = 1;   
while($row && $row2)
{
    if($row2["fooddata"] == " ")
    {
        echo'<div class="pending-donation">'.
   '<h4>Donation '.$count.'</h4>'.
   '<h5>Name : '.$row["name"].'</h5>'.
   '<h5>Email : '.$row["email"].'</h5>'.
   '<h5>Door no : '.$row["doorno"].'</h5>'.
   '<h5>Street : '.$row["street"].'</h5>'.
   '<h5>City : '.$row["city"].'</h5>'.
   '<h5>State : '.$row["state"].'</h5>'.
   '<h5>Pincode : '.$row["pincode"].'</h5>'.
   '<h5>Mobile num : '.$row["mobile"].'</h5>'.
   '<h5>Mobile num 2 : '.$row["mobile2"].'</h5>'.
   

   '<h5>Cloth: '.$row2["clothdata"].'</h5>'.
   '<h5>Cloth Quantity : '.$row2["clothquantity"].'</h5>'.
   '<h5>Miscellenous : '.$row2["miscdata"].'</h5>'.
   '<h5>Miscellenous Quantity : '.$row2["miscquantity"].'</h5>'.
   '<h5>Status : '.$row["status"].'</h5>'.
   '<div class="col-md-5">'.
       '<fieldset class="form-group text-xs-right">'.
       '<form>'.
           '<input type="submit" value="Carry out" class="btn btn-outline-info">'.
           '<form>'.
               '<input type="submit" value="Completed" class="btn btn-outline-success">'.
       '</fieldset>'.
   '</div>'.
   '</div>';
   '</div>';
    }
    else if($row2["clothdata"] == null)
    {
         echo'<div class="pending-donation">'.
   '<h4>Donation '.$count.'</h4>'.
   '<h5>Name : '.$row["name"].'</h5>'.
   '<h5>Email : '.$row["email"].'</h5>'.
   '<h5>Door no : '.$row["doorno"].'</h5>'.
   '<h5>Street : '.$row["street"].'</h5>'.
   '<h5>City : '.$row["city"].'</h5>'.
   '<h5>State : '.$row["state"].'</h5>'.
   '<h5>Pincode : '.$row["pincode"].'</h5>'.
   '<h5>Mobile num : '.$row["mobile"].'</h5>'.
   '<h5>Mobile num 2 : '.$row["mobile2"].'</h5>'.
   
   '<h5>Food: '.$row2["fooddata"].'</h5>'.
   '<h5>Food Quantity : '.$row2["foodquantity"].'</h5>'.     
   '<h5>Miscellenous : '.$row2["miscdata"].'</h5>'.
   '<h5>Miscellenous Quantity : '.$row2["miscquantity"].'</h5>'.
   '<h5>Status : '.$row["status"].'</h5>'.
   '<div class="col-md-5">'.
       '<fieldset class="form-group text-xs-right">'.
           '<input type="submit" value="Carry out" class="btn btn-outline-info">'.
               '<input type="submit" value="Completed" class="btn btn-outline-success">'.
       '</fieldset>'.
   '</div>'.
   '</div>';
   '</div>';
    }
    else if($row2["miscdata"] == " ")
    {
          echo'<div class="pending-donation">'.
   '<h4>Donation '.$count.'</h4>'.
   '<h5>Name : '.$row["name"].'</h5>'.
   '<h5>Email : '.$row["email"].'</h5>'.
   '<h5>Door no : '.$row["doorno"].'</h5>'.
   '<h5>Street : '.$row["street"].'</h5>'.
   '<h5>City : '.$row["city"].'</h5>'.
   '<h5>State : '.$row["state"].'</h5>'.
   '<h5>Pincode : '.$row["pincode"].'</h5>'.
   '<h5>Mobile num : '.$row["mobile"].'</h5>'.
   '<h5>Mobile num 2 : '.$row["mobile2"].'</h5>'.
   
   '<h5>Food: '.$row2["fooddata"].'</h5>'.
   '<h5>Food Quantity : '.$row2["foodquantity"].'</h5>'. 
    '<h5>Cloth: '.$row2["clothdata"].'</h5>'.
   '<h5>Cloth Quantity : '.$row2["clothquantity"].'</h5>'.    
   '<h5>Status : '.$row["status"].'</h5>'.
   '<div class="col-md-5">'.
       '<fieldset class="form-group text-xs-right">'.
           '<input type="submit" value="Carry out" class="btn btn-outline-info">'.
               '<input type="submit" value="Completed" class="btn btn-outline-success">'.
       '</fieldset>'.
   '</div>'.
   '</div>';
   '</div>';
    }
    else
    {
         echo'<div class="pending-donation">'.
   '<h4>Donation '.$count.'</h4>'.
   '<h5>Name : '.$row["name"].'</h5>'.
   '<h5>Email : '.$row["email"].'</h5>'.
   '<h5>Door no : '.$row["doorno"].'</h5>'.
   '<h5>Street : '.$row["street"].'</h5>'.
   '<h5>City : '.$row["city"].'</h5>'.
   '<h5>State : '.$row["state"].'</h5>'.
   '<h5>Pincode : '.$row["pincode"].'</h5>'.
   '<h5>Mobile num : '.$row["mobile"].'</h5>'.
   '<h5>Mobile num 2 : '.$row["mobile2"].'</h5>'.
   
   '<h5>Food: '.$row2["fooddata"].'</h5>'.
   '<h5>Food Quantity : '.$row2["foodquantity"].'</h5>'. 
    '<h5>Cloth: '.$row2["clothdata"].'</h5>'.
   '<h5>Cloth Quantity : '.$row2["clothquantity"].'</h5>'.  
   '<h5>Miscellenous : '.$row2["miscdata"].'</h5>'.
   '<h5>Miscellenous Quantity : '.$row2["miscquantity"].'</h5>'.  
   '<h5>Status : '.$row["status"].'</h5>'.
   '<div class="col-md-5">'.
       '<fieldset class="form-group text-xs-right">'.
           '<input type="submit" value="Carry out" class="btn btn-outline-info">'.
               '<input type="submit" value="Completed" class="btn btn-outline-success">'.
       '</fieldset>'.
   '</div>'.
   '</div>';
   '</div>';
    }
   
   $row = mysqli_fetch_array($res);
   $row2 = mysqli_fetch_array($res1);
   $count = $count + 1;  
}
mysqli_free_result($res);
mysqli_free_result($res1);
mysqli_close($con);

}
?>



        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <h5>Smart Basket</h5>
                        <div class="row">
                            <div class="col-6">
                                <ul class="list-unstyled">
                                    <li>
                                    <a href="mailto:lamsamigos2@gmail.com ">Mail at lams</a><br>
                                    </li>
                                     <li><a href="#">Contact number: 7200687207</a></li>
                                    
                                    <li><a href="#">LICET Nungambakkam, Chennai  600034</a></li>
                                </ul>
                            </div>
                        </div>
                        <ul class="nav">
                        <li class="nav-item"><a href="https://www.facebook.com/aaronsajialexander" class="nav-link pl-0"><i class="fa fa-facebook fa-lg"></i></a></li>
                        <li class="nav-item"><a href="https://twitter.com/flamingxod" class="nav-link"><i class="fa fa-twitter fa-lg"></i></a></li>
                        <li class="nav-item"><a href="https://github.com/AaronSajiAlexander" class="nav-link"><i class="fa fa-github fa-lg"></i></a></li>
                        <li class="nav-item"><a href="https://www.instagram.com/aaron7.1.2/?hl=en" class="nav-link"><i class="fa fa-instagram fa-lg"></i></a></li>
                    </ul>
                        <br>
                    </div>
                </div>
                <div class="copyright">
                    &copy; Copyright 2022. All rights reserved
                </div>
            </div>
        </footer>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src=" https://code.jquery.com/jquery-3.3.1.slim.min.js " integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo " crossorigin="anonymous "></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js " integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1 " crossorigin="anonymous "></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js " integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM " crossorigin="anonymous "></script>

</body>

</html>