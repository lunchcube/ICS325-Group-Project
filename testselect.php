<?php
// Trying to build a dynamic select box for category
$db_connect = mysqli_connect("localhost", "root", "root", "moe");
if (!$db_connect) {
    die('Connection unsuccessful:' . mysqli_connect_errno());
}

// Get the categories
$getcats = "SELECT subcategory
            FROM `category`";

// Display the categories
$result = mysqli_query($db_connect,$getcats);

/*while($row = mysqli_fetch_array($result)) {
    print "inside first loop";
    print $row[0].'<br>';
                    }*/
/*
while($row = mysqli_fetch_array($result)) {
    print "inside second loop";
    print $row[0].'<br>';
}*/

// Print the subcategories echo '<option value="'.$row[0].'">'.$row[0].'</option>'; //close your tags!!

print "<td><select name='upttable'>";
        while($row = mysqli_fetch_array($result)){
                  echo '<option value=\"'.$row['subcatecory'].'\">'. $row['subcategory'].'</option>';

                    }
                     print "</select>";
?>