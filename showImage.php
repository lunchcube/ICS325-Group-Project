<?php
$dbcn = mysqli_connect("localhost","root", "root");
mysqli_select_db($dbcn, "ics325labs");
$sql = "SELECT filename FROM names";
$rs = mysqli_query($dbcn, $sql);
while($row = mysqli_fetch_array($rs)){
    echo "<a href=uploads/".$row["filename"] .
        " border=0><img src=uploads/".$row["filename"] .
        " width=100 height=80 /></a><p />";
}
mysqli_close($dbcn);
?>