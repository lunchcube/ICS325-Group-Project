<?php
require 'session.php';

$db_connect = mysqli_connect("localhost", "root", "root", "moe");
if (!$db_connect) {
    die('Connection unsuccessful:' . mysqli_connect_errno());
}

if(isset( $_POST['prod_id'])){
    $prod_id=$_POST['prod_id'];
}
if(isset( $_POST['prod_name'])){
    $prod_name=$_POST['prod_name'];
}

if(isset( $_POST['selectqty'])){
    $qty=$_POST['selectqty'];
}


if(isset( $_POST['prod_id'])){
    $prod_id=$_POST['prod_id'];
}

if(isset( $_POST['current_table'])){
    $current_table=$_POST['current_table'];
}
$session_id=$_SESSION['session_id'];


//check if product already added to cart
$sql = "SELECT qty FROM `cart` WHERE session_id='$session_id'AND prod_id='$prod_id';";
$result = mysqli_query($db_connect,$sql);
$resultqty = mysqli_fetch_array($result) ;

//product is not in cart
if(!$resultqty[0]){
    $sql_insert = "INSERT INTO `cart` (session_id, prod_id, qty,current_table) VALUES ('$session_id', '$prod_id','$qty','$current_table');";
    $result_insert = mysqli_query($db_connect,$sql_insert);

}
else{
    //product in cart, update quantity
    $newqty=$qty+$resultqty[0];

    $sql_update = "UPDATE  `cart` SET qty='$newqty' WHERE session_id='$session_id'AND prod_id='$prod_id'";

    $result_update = mysqli_query($db_connect,$sql_update);
}

$Message = '<p>'.'Product "'.$prod_name.'" has been added to your cart'.'</p>';
header("Location: view_prod.php?prod_id=".$prod_id."&Message=" . urlencode($Message));





?>