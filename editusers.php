<?php

session_start();

if(isset($_SESSION["admin"]) !=1 || !isset($_SESSION["admin"])) {
    $Message = "You dont have permission to access this page";
    header("Location: login.php");
}

if(isset($_POST["uid"])) $uid = $_POST["uid"];else $uid ='Null';
if(isset($_POST["admin"])) $admin = $_POST["admin"];else $admin ='0';
if(isset($_POST["username"])) $username = $_POST["username"];else $username ='Null';
if(isset($_POST["fname"]) )$fname = $_POST["fname"];else $fname ='Null';
if(isset($_POST["lname"])) $lname= $_POST["lname"];else $lname ='Null';
if(isset($_POST["email"])) $email= $_POST["email"];else $email ='Null';
if(isset($_POST["phone"])) $phone = $_POST["phone"];else $phone ='Null';
if(isset($_POST["gender"])) $gender = $_POST["gender"];else $gender ='Null';
if(isset($_POST["address"])) $address = $_POST["address"];else $address ='Null';
if(isset($_POST["city"])) $city= $_POST["city"];else $city ='Null';
if(isset($_POST["state"])) $state= $_POST["state"];else $state ='Null';
if(isset($_POST["postal"])) $postal = $_POST["postal"];else $postal ='NULL';

$db_connect = mysqli_connect("localhost", "root", "root", "moe");
if (!$db_connect) {
    die('Connection unsuccessful:' . mysqli_connect_errno());
}

$sql = "UPDATE users SET uid=$uid, admin=$admin, username='$username', email='$email', fname='$fname',
           lname='$lname', gender='$gender', phone='$phone', address='$address', city='$city',
           state='$state', postalcode=$postal WHERE uid=$uid";

$result = mysqli_query($db_connect, $sql);

if(!$result){
    print mysqli_errno();
}

$Message = '<p>'.'User '.$_POST[username]. ' succesfully updated'.'</p>';
header("Location: allusers.php?Message=" . urlencode($Message));

//Closes connection to DB server
mysqli_close($db_connect );
?>