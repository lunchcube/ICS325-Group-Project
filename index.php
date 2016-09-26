<?php
/*****************************************
Author: Matthew Gabiou, Josh Caruso, Abu Ghanem
Date:   7/25/16
Description:
Home page for the clothing site
 *****************************************/
?>


<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Maggie's Clothing Store</title>

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
        <table bgcolor="#BCED91" align="center" width="100%"><tr><td><div style="text-align:center;" >
                    <?php print  $_GET['Message'];?></div></td></tr></table><?php }?>
    <div class="clothing-main"></div>
    <table class="main-table" cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td>
                <table class="content-table">
                    <tr>
                    </tr>
                    <tr>
                    </tr>
                </table>
            </td>
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
