<?php

print $_POST["category"];
print '<br>';
print $_POST["addtotable"];
$table = $_POST["addtotable"];
$subcategory = $_POST["subcategory"];

session_start();

if(isset($_SESSION["admin"]) !=1 || !isset($_SESSION["admin"])) {
    $Message = "You dont have permission to access this page";
    header("Location: login.php");
}

$db_connect = mysqli_connect("localhost", "root", "root", "moe");
if (!$db_connect) {
    die('Connection unsuccessful:' . mysqli_connect_errno());
}

/*$sql = "UPDATE $table SET uid=$uid, admin=$admin, username='$username', email='$email', fname='$fname',
           lname='$lname', gender='$gender', phone='$phone', address='$address', city='$city',
           state='$state', postalcode=$postal WHERE uid=$uid";*/

$sql = "INSERT INTO category  (subcategory, type)
        VALUES ('$subcategory', '$table')";

$result = mysqli_query($db_connect, $sql);

if(!$result){
    print mysqli_errno();
}

$Message = '<p>'.' Category added'.'</p>';
header("Location: crud.php?Message=" . urlencode($Message));

//Closes connection to DB server
mysqli_close($db_connect );
?>


