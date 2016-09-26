<?php

//print_r($_POST);
//exit(0);

$descrip = $_POST["description"];
$price = $_POST["price"];
$clothingsize = $_POST["size"];
$qty = $_POST["quantity"];
$imageloc = $_POST["imagelocation"];
$subcategory = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $_POST["subcatselect"]);
$table = $_POST['upttable'];


/*print "subcategory is here: ";
print ($subcategory);
exit(0);*/

session_start();

if(isset($_SESSION["admin"]) !=1 || !isset($_SESSION["admin"])) {
    $Message = "You dont have permission to access this page";
    header("Location: login.php");
}

$db_connect = mysqli_connect("localhost", "root", "root", "moe");
if (!$db_connect) {
    die('Connection unsuccessful:' . mysqli_connect_errno());
}

$sql = "INSERT INTO $table (cat_id, qty, descrip, size,  price, img_loc)
        VALUES ('$subcategory','$qty', '$descrip', '$clothingsize', '$price', '$imageloc')";

$result = mysqli_query($db_connect, $sql);

if(!$result){
    print mysqli_errno();
}

$Message = '<p>'.' Product added'.'</p>';
header("Location: admin.php?Message=" . urlencode($Message));

//Closes connection to DB server
mysqli_close($db_connect );
print $desc.$price.$clothingsize.$qty.$imageloc.$subcategory;
?>

