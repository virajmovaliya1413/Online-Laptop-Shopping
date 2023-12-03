<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flipkart_1";

$con = mysqli_connect($servername, $username, $password, $dbname);

//check the connection

if ($con) {
    echo "Connection OK";
} else {
    echo "Connection Failed" . mysqli_connect_error();
}

error_reporting(E_ALL);

//registration

if (isset($_POST['sub'])) {
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email = $_POST['emailid'];
    $password = $_POST['pwd'];
    $cpassword = $_POST['cpwd'];
    $dob = $_POST['dob'];



    $query1 = "INSERT INTO signup(fname,lname,emailid,pwd,cpwd,dob) VALUES('$firstname','$lastname','$email','$password','$cpassword','$dob')";
    $data1 = mysqli_query($con, $query1);
    if ($data1) {
        header('Location:loginvalidation.html');
    } else {
        echo "Error : Try again later";
    }
}


?>