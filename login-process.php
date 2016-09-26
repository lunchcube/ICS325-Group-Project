<?php
/**
 * Created by PhpStorm.
 * User: Matt Gabiou
 * Date: 5/30/2016
 * Time: 1:40 PM
 */



// Show all super globals
//print_r($_POST);
//print_r($_GET);
//echo "<br>";


// Assign user input to vars
if(($_POST["user_name"]) == "" || ($_POST["pass"]) == ""){
    print 'Username or password is empty. <br>';
    print 'Redirecting back to login page.';
    header('Refresh: 3; URL= login.php');
    return;
}

else{
    $userlogin = $_POST["user_name"];
    $userpass = $_POST["pass"];
}



//Establish connection with database server
$db_connect = mysqli_connect("localhost", "root", "root", "moe");
if (!$db_connect) {
    die('Connection unsuccessful:' . mysqli_connect_errno());
}

//Store user id and username in query variable
$sql="SELECT admin, username, uid FROM `users` WHERE (username = '$userlogin' AND password = sha1('$userpass'))";



//Verify username and password
$loginresult = mysqli_query($db_connect,$sql);
if(mysqli_num_rows($loginresult) <= 0){
    print 'Username or password is not correct <br>';
    print 'Redirecting back to login page.';
    header('Refresh: 3; URL= login.php');
    $Message = "Login Failed";
    return;
}
//exit(0);

//Stores sql query in php variable
$result = mysqli_query($db_connect,$sql);

//Creates array named singleRow
$singleRow = mysqli_fetch_array($result) ;
$admin = $singleRow[0];

// Store username in session variable $_SESSION["name"]
if(isset($admin) && $admin !=1){
    session_start();
    $_SESSION["name"] = $singleRow[1];
    $_SESSION["uid"] = $singleRow[2];
    $Message="Login successful";
    header("Location: index.php?Message=" . urlencode($Message));
}
else{
    session_start();
    $_SESSION["name"] = $userlogin;
    $_SESSION["admin"] = $admin;
    $Message="Login successful";
    header("Location: admin.php?Message=" . urlencode($Message));
}

?>