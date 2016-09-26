<?php
$db_connect = mysqli_connect("localhost", "root", "root", "moe");
if (!$db_connect) {
    die('Connection unsuccessful:' . mysqli_connect_errno());
    }
    echo 'Connection successful';
?>