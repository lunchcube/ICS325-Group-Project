<?php
/**
 * Created by PhpStorm.
 * User: Matt Gabiou
 * Date: 5/30/2016
 * Time: 1:40 PM
 */

session_start();
session_destroy();
$Message='Logged out ...';
header("Location: index.php?Message=" . urlencode($Message));


?>