<?php

session_start();

$uid = $_GET["uid"];

$db_connect = mysqli_connect("localhost", "root", "root", "moe");
if (!$db_connect) {
    die('Connection unsuccessful:' . mysqli_connect_errno());
}



$result = mysqli_query($db_connect,$sql);

?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>All Products</title>
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

<!--    // Mens Table-->
    <table class="main-table" cellpadding="0" cellspacing="0" border="0">
        <tr><td>&nbsp;</td></tr>

        <tr>
            <td>

                <table class="content-table" border="0" cellpadding="4" cellspacing="4" align="center">

                    <thead><th>Description</th><th>Product ID</th></thead>
                    <?php

                    // Get data from Mens table
                    $sql="SELECT descrip, prod_id
                          FROM `mens`";

                    $result = mysqli_query($db_connect,$sql);
                    //$row = mysqli_fetch_array($result);

                    print '<form action="editusers.php" method="post">';
                    print "<center><h4>Mens: </h4></center>";
                    while($row = mysqli_fetch_array($result)) {
                        print '<tr align="center">';
                        print '<td><input name="p_descrip" type="text" size="50" value="' . $row[0] . '"></td>';
                        print '<td><input name="productid" type="text" size="4" value="' . $row[1] . '"></td>';

                        print '</tr>';
                    }

                    ?>
                    <tr>
                        <td>
<!--                            <input type="submit" value="Submit">-->
                        </td>
                    </tr>
                    </form>
                </table>
            </td>
        </tr>
    </table>

    <!--    // Womens Table-->
    <table class="main-table" cellpadding="0" cellspacing="0" border="0">
        <tr><td>&nbsp;</td></tr>

        <tr>
            <td>

                <table class="content-table" border="0" cellpadding="4" cellspacing="4" align="center">

                    <thead><th>Description</th><th>Product ID</th></thead>
                    <?php

                    // Get data from Womens table
                    $sql="SELECT descrip, prod_id
                          FROM `womens`";

                    $result = mysqli_query($db_connect,$sql);
                    //$row = mysqli_fetch_array($result);

                    print '<form action="editusers.php" method="post">';
                    print "<center><h4>Womens: </h4></center>";
                    while($row = mysqli_fetch_array($result)) {
                        print '<tr align="center">';
                        print '<td><input name="p_descrip" type="text" size="50" value="' . $row[0] . '"></td>';
                        print '<td><input name="productid" type="text" size="4" value="' . $row[1] . '"></td>';

                        print '</tr>';
                    }

                    ?>
                    <tr>
                        <td>
                            <!--                            <input type="submit" value="Submit">-->
                        </td>
                    </tr>
                    </form>
                </table>
            </td>
        </tr>
    </table>


    <!--    // Kids Table-->
    <table class="main-table" cellpadding="0" cellspacing="0" border="0">
        <tr><td>&nbsp;</td></tr>

        <tr>
            <td>

                <table class="content-table" border="0" cellpadding="4" cellspacing="4" align="center">

                    <thead><th>Description</th><th>Product ID</th></thead>
                    <?php

                    // Get data from Kids table
                    $sql="SELECT descrip, prod_id
                          FROM `Kids`";

                    $result = mysqli_query($db_connect,$sql);
                    //$row = mysqli_fetch_array($result);

                    print '<form action="editusers.php" method="post">';
                    print "<center><h4>Kids: </h4></center>";
                    while($row = mysqli_fetch_array($result)) {
                        print '<tr align="center">';
                        print '<td><input name="p_descrip" type="text" size="50" value="' . $row[0] . '"></td>';
                        print '<td><input name="productid" type="text" size="4" value="' . $row[1] . '"></td>';

                        print '</tr>';
                    }

                    ?>
                    <tr>
                        <td>
                            <!--                            <input type="submit" value="Submit">-->
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

