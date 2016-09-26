<?php

session_start();

$uid = $_GET["uid"];

$db_connect = mysqli_connect("localhost", "root", "root", "moe");
if (!$db_connect) {
    die('Connection unsuccessful:' . mysqli_connect_errno());
}

/*$sql="SELECT uid, admin, username, email, fname, lname, gender, phone, address, city, state, postalcode
FROM `users`
WHERE (uid=$uid)";

$result = mysqli_query($db_connect,$sql);*/

?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Add Product</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="wrapper">
    <div class="top-bar" >
        <table id="top-bar-table"><tr><td id="clockbox" align="left" colspan="2">Maggie's Boutique</td>
                <td valign="middle"  align="right">
                    <?php
                    require 'adminCheck.php';
                    ?>
                </td>

            </tr>
        </table>
    </div>
    <div id="header">
        <table  id="header-table" cellpadding="0" cellspacing="1" width="100%"><tr>
                <td align="left"><h2><strong>Maggie's Clothing</strong></h2></td>
                <td align="right">

                    <ul class="nav">
                        <li class="active menu-item" id="item-1"><a class=" active" href="index.php" title="Home">Home</a></li>
                        <li class="menu-item" id="item-2"><a href="men.php" title="Men">Men</a></li>
                        <li class="menu-item" id="item-4"><a class="" href="women.php" title="Women">Women</a></li>
                        <li class="menu-item" id="item-5"><a href="Kids.php" title="Kids">Kids</a></li><li class="menu-item" id="item-6"><a href="cart.php" title="Cart">Cart</a></li>
                </td>
            </tr>
        </table>
    </div>

    <?php if (isset($_GET['Message'])) {?>
        <table bgcolor="#BCED91" align="center" width="100%">
            <tr>
                <td>
                    <div style="text-align:center;" >
                        <?php print  $_GET['Message'];?>
                    </div>
                </td>
            </tr>
        </table>
    <?php }?>

    <table class="main-table" cellpadding="0" cellspacing="0" border="0">
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td>

                <table class="content-table" border="0" cellpadding="4" cellspacing="4" align="center">

                    <thead><th>Category</th><th>Subcategory</th><th>Quantity</th><th>Size</th><th>Price</th><th>Description</th></thead>
                    <?php




                    // Trying to build a dynamic select box for category
                    $db_connect = mysqli_connect("localhost", "root", "root", "moe");
                    if (!$db_connect) {
                        die('Connection unsuccessful:' . mysqli_connect_errno());
                    }

                    // Get the categories
                    $getcats = "SELECT subcategory, cat_id
                                FROM `category`
                                ";
                    // Display the categories
                    $result=mysqli_query($db_connect,$getcats);
                    /*while($row = mysqli_fetch_array($result)) {
                        print $row[0];
                    }*/




                    print '<form action="addprod2.php" method="post">';
                    print '<tr align="center">';

                    // Print the table names
                    print '<td><select name="upttable">
                        <option value="mens">Mens</option>
                        <option value="womens">Womens</option>
                        <option value="kids">Kids</option>
                        </select></td>';

                    // Print the subcategories echo '<option value="'.$row[0].'">'.$row[0].'</option>'; //close your tags!!
                    print "<td><select name='subcatselect'>";
                    while($row = mysqli_fetch_array($result)){
                        echo '<option value=\"'.$row['cat_id'].'\">'. $row['subcategory'].'</option>';

                    }
                    print "</select>";


                    //print '<td><input name="subcategory" type="text" size="8"></td>';
                    print '<td><input name="quantity" type="text" size="8"></td>';
                    print '<td><input name="size" type="text" size="8"></td>';
                    print '<td><input name="price" type="text" size="8"></td>';
                    print '<td><input name="description" type="text" size="35"></td>';
                    //print '<td><input name="imagelocation" type="text" size="35"></td>';

                    print '</tr>';

                    ?>
                    <tr>
                        <td>
                            <input type="submit" value="Submit">
                        </td>
                    </tr>
                    </form>
                </table>
            </td>
        </tr>
    </table>

    <div class="footer">
        <table align='center'><tr><td>
                    <a class="" href="about.php" title="About us">About Us | </a>
                    <a class="" href="careers.php" title="careers">Careers | </a>
                    <a class="" href="contactus.php" title="contact us">Contact us | </a>
                    <a href="location.php" title="where to find us">Where to find us</a></td>
                <td id="clock"></td>
            </tr>
            <tr > <td>Follow us: &nbsp;&nbsp;<img src="images/social-media.png"  alt="socialmedia" width="142"></td></tr>
        </table>
    </div>
</body>
</html>

