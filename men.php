<?php
/*****************************************
Author: Matthew Gabiou, Josh Caruso, Abu Ghanem
Date:   5/23/16
Description:
Men's page for the clothing site
 *****************************************/

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Men's Fashion</title>

    <link href="css/style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/script.js"></script>

</head>

<body>

<div class="wrapper">
    <div class="top-bar" >
        <table id="top-bar-table"><tr><td id="clockbox" align="left" colspan="2">Maggie's Boutique</td>
                <td valign="middle"  align="right">
                    <?php
                    require 'session.php';
                    $_SESSION['currentTable'] = "mens";
                    ?>
                </td>
            </tr>
        </table>
    </div>
    <div id="header">
        <table  id="header-table" cellpadding="0" cellspacing="1" width="100%"><tr>
                <td align="left"><h2><strong>Men's Fashion</strong></h2></td>
                <td align="right"><ul class="nav">
                        <li class="active menu-item" id="item-1"><a class=" active" href="index.php" title="Home">Home</a></li>
                        <li class="menu-item" id="item-2"><a href="men.php" title="Men">Men</a></li>
                        <li class="menu-item" id="item-4"><a class="" href="women.php" title="Women">Women</a></li>
                        <li class="menu-item" id="item-5"><a href="Kids.php" title="Kids">Kids</a></li><li class="menu-item" id="item-6"><a href="cart.php" title="Cart">Cart</a></li>
                </td>

            </tr>
        </table>
    </div>

    <table class="clothing-table" cellpadding="5" cellspacing="2" border="1" >

        <tr>
            <?php
            $db_connect = mysqli_connect("localhost", "root", "root", "moe");
            if (!$db_connect) {
            die('Connection unsuccessful:' . mysqli_connect_errno());
            }

            $sql="SELECT DISTINCT subcategory
            FROM category
            JOIN mens
            ON mens.cat_id = category.cat_id
            ";

            $result = mysqli_query($db_connect,$sql);
            while($row = mysqli_fetch_array($result)) {
            print '<td align="center">'.$row[0].'</td>';
            }
            ?>
        </tr>
        <tr>
                <?php

                $sql="SELECT DISTINCT img_loc, prod_id
                      FROM mens
                      WHERE img_loc !=''";

                $result = mysqli_query($db_connect,$sql);
                while($row = mysqli_fetch_array($result)) {
                    print '<td class="clothing-cell">';
                    $row[0] = ltrim($row[0], '.');
                    $row[0] = ltrim($row[0], '/');
                    print '<a href="view_prod.php?prod_id='.$row[1].'"><img src="'.$row[0].'" style="width:128px;height:128px;"></a>';
                    print '</td>';
                }
                ?>
        </tr>
    </table>
</div>
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
