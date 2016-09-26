<?php

?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>User Information</title>

    <link href="css/style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/script.js"></script>

</head>
<body>
<div class="wrapper">
    <div class="top-bar" >
        <table id="top-bar-table">
            <tr>
                <td id="clockbox" align="left" colspan="2">Maggie's Boutique</td>
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
                <td align="right"><ul class="nav">
                        <li class="active menu-item" id="item-1"><a class=" active" href="index.php" title="Home">Home</a></li>
                        <li class="menu-item" id="item-2"><a href="men.php" title="Men">Men</a></li>
                        <li class="menu-item" id="item-4"><a class="" href="women.php" title="Women">Women</a></li>
                        <li class="menu-item" id="item-5"><a href="Kids.php" title="Kids">Kids</a></li><li class="menu-item" id="item-6"><a href="cart.php" title="Cart">Cart</a></li>
                </td>

            </tr>
        </table>
    </div>
    <?php 
    if (isset($_GET['Message'])) {?>
        <table bgcolor="#BCED91" align="center" width="100%"><tr><td><div style="text-align:center;" >
                    <?php print  $_GET['Message'];
                    ?>
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
                <table class="content-table" border="0" cellpadding="3" align="center">
                    <thead><th> </th><th >Uid</th><th>Username</th><th>Email</th><th>First Name</th><th>Last Name</th><th>Gender</th><th>Phone</th><th>Address</th><th>City</th><th>State</th><th>Postal Code</th></thead>
                    <?php
                    $db_connect = mysqli_connect("localhost", "root", "root", "moe");
                    if (!$db_connect) {
                        die('Connection unsuccessful:' . mysqli_connect_errno());
                    }

                    $sql="SELECT uid,username,email,fname,lname,gender,phone,address,city,state,postalcode 
                          FROM `users` 
                          ";

                    $result=mysqli_query($db_connect,$sql);
                    while($row = mysqli_fetch_array($result)){
                        print '<tr align="center">';
                        print '<td><a href="getuser.php?uid='.$row[0].'">Edit</a></td>';
                        print '<td>'.$row[0].'</td>';
                        print '<td>'.$row[1].'</td>';
                        print '<td>'.$row[2].'</td>';
                        print '<td>'.$row[3].'</td>';
                        print '<td>'.$row[4].'</td>';
                        print '<td>'.$row[5].'</td>';
                        print '<td>'.$row[6].'</td>';
                        print '<td>'.$row[7].'</td>';
                        print '<td>'.$row[8].'</td>';
                        print '<td>'.$row[9].'</td>';
                        print '<td>'.$row[10].'</td>';


                        print '</tr>';
                    }

                    ?>


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
</body>
</html>
