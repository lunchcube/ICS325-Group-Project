<?php

// Start remembering session Vars
session_start();
if(!isset($_SESSION["name"])){
$_SESSION["session_id"]=uniqid();
}

if(isset($_SESSION["name"])){
    print 'Welcome '.$_SESSION["name"].' |  '.'<a href="logout.php" title="logout">Logout</a> | <a href="myOrders.php">View Orders</a>';
    if(isset($_SESSION["admin"]) == 1) print ' |'.'<a href="admin.php" title="admin">Admin</a>';
}
else
{
    print '<a href="login.php" title="login">Log in</a>'.' |  '.'<a href="register.php" title="register">Register</a>';
}

?>