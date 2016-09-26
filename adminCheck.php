<?php
session_start();
if(isset($_SESSION["admin"]) !=1 || !isset($_SESSION["admin"])){
    $Message="You dont have permission to access this page";
    header("Location: login.php?Message=" . urlencode($Message));}

if(isset($_SESSION["admin"]) && isset($_SESSION["admin"]) == 1){
    print 'Welcome '.$_SESSION["name"].' |  '.'<a href="logout.php" title="logout">Logout</a>';
    if(isset($_SESSION["admin"]) == 1) print ' |'.'<a href="admin.php" title="admin">Admin</a>';
}
else
{
    print '<a href="login.php" title="login">Log in</a>'.' |  '.'<a href="register.php" title="register">Register</a>';
}

?>