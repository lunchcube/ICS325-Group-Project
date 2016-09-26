<?php
/**
 * Created by PhpStorm.
 * User: Matt Gabiou
 * Date: 5/30/2016
 * Time: 1:40 PM
 */

$uid='';
// Assign user input to vars

//If post variable is empty, set to Null
if(isset($_POST["user_name"])) $userlogin = $_POST["user_name"];else $userlogin ='Null';
if(isset($_POST["pass"]) )$userpass  = $_POST["pass"];else $userpass ='Null';
if(isset($_POST["first_name"]) )$userfname = $_POST["first_name"];else $userfname ='Null';
if(isset($_POST["last_name"])) $userlname= $_POST["last_name"];else $userlname ='Null';
if(isset($_POST["email"])) $useremail= $_POST["email"];else $useremail ='Null';
if(isset($_POST["phone"])) $userphone = $_POST["phone"];else $userphone ='Null';
if(isset($_POST["gender"])) $usergender = $_POST["gender"];else $usergender ='Null';
if(isset($_POST["address"])) $useradddress = $_POST["address"];else $useradddress ='Null';
if(isset($_POST["city"])) $usercity= $_POST["city"];else $usercity ='Null';
if(isset($_POST["state"])) $userstate= $_POST["state"];else $userstate ='Null';
if(isset($_POST["postal_code"])) $userpostal = $_POST["postal_code"];else $userpostal ='NULL';


$checkuser='';
$checkemail='';
if(isset($_POST['terms']) != 'YES')
    die("accept terms");

//Establish connection to DB server or display error
$db_connect = mysqli_connect("localhost", "root", "root", "moe");
if (!$db_connect) {
    die('Connection unsuccessful:' . mysqli_connect_errno());
}

//Store SQL query into variable
$sqluid = "SELECT MAX(uid) FROM users";
//Get number of users in table
$resultuid = mysqli_query($db_connect,$sqluid);
//Turns query into array.
$singleRow = mysqli_fetch_array($resultuid) ;
$uid = $singleRow[0];
//Increment user ID numbers
$uid = $uid + 1;

//Creates SQL query to insert new user into DB
$sql = "INSERT INTO `users` (uid, username, email, password, fname, lname, gender, phone, address,city, state, postalcode) VALUES 
($uid, '$userlogin','$useremail', sha1('$userpass'), '$userfname', '$userlname', '$usergender' ,'$userphone'  , '$useradddress', '$usercity' , '$userstate',' $userpostal');";



/*$sql="INSERT INTO `users` (`uid`, `username`, `email`, `password`, `fname`, `lname`, `gender`, `phone`, `address`, `city`, `state`, `postalcode`) VALUES ($uid, '$userlogin', 'hamza', '1234', '', '', '', '', '', '', '', 'Null')";*/
//Running SQL command inserting user into table
$result = mysqli_query($db_connect,$sql);

if(!$result){
    die(mysqli_errno());
}

$Message = '<p>'.'Congratulations '.$userlogin. '! You have succesfully registered!'.'</p>';
header("Location: login.php?Message=" . urlencode($Message));

//Closes connection to DB server
mysqli_close($db_connect );


// Checks if user input is empty and if not passes the input to a input validator
function test_empty_required($input){
    if (empty($input)) {
        // popup error page
        //echo '<p>Userid, password, an9*d email address are required! Please hit back in your browser to complete the missing fields.';
        //  exit();
    } else {
        test_input($input);
        return $input;
    }
}

function test_empty_optional($input){
    if (empty($input)) {
        $input = "\"\"";
    } else {
        test_input($input);
    }
    return $input;
}

function test_input($data) {
    $data = htmlspecialchars(strip_tags($data));
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
