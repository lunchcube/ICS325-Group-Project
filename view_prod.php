<?php
$prod_id = $_GET["prod_id"];
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Product Information</title>

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
                    require 'session.php';
                    $session_id=$_SESSION['session_id'];
                    //  print $session_id;
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
    if (isset($_GET['Message']) ) {?>
        <table bgcolor="#BCED91" align="center" width="100%"><tr><td><div style="text-align:center;" >
                        <?php print  $_GET['Message'];

                        ?>
                    </div>
                </td>
            </tr>
        </table>
    <?php }?>
    <table class="clothing-table" cellpadding="2" cellspacing="2">


        <?php
        $db_connect = mysqli_connect("localhost", "root", "root", "moe");
        if (!$db_connect) {
            die('Connection unsuccessful:' . mysqli_connect_errno());
        }

        $currentloadedtable = $_SESSION["currentTable"];
        //print $currentloadedtable;
        //exit(0);
        $sql="SELECT qty, descrip, size, price, img_loc
                          FROM `$currentloadedtable`
                          WHERE (prod_id=$prod_id)";

        $result=mysqli_query($db_connect,$sql);

        while($row = mysqli_fetch_array($result)) {
            $fid = $currentloadedtable . $prod_id;
            $img = '';
            $price = '';
            $qty = '';
            $name = '';
            $img = $row['img_loc'];
            $price = $row['price'];
            $qty = $row['qty'];
            $name = $row['descrip'];
            $img = ltrim($img, '.');
            $img = ltrim($img, '/');
            print '<tr><td>';
            print '<p align="center"><img src="' . $img . '" width="150" height="150"></p>';
            print '<p align="center"><strong>Description: </strong></p>';
            print '<p align="center">' . $row['descrip'] . '</p>';
            print '<p align="center"><strong>Available sizes: </strong>' . strtoupper($row['size']) . '</p>';

            print '<p align="center"><strong>Price: </strong>$' . $price . '</p>';
            print '<p align="center">';
            print '<form action="addtocart.php" method="post" id="' . $fid . '">
            <input type="hidden" name="prod_id" value="' . $prod_id . '"/>
            <input type="hidden" name="prod_name" value="' . $name . '"/>
            <input type="hidden" name="current_table" value="' . $currentloadedtable . '"/>';
            print '<p align="center"><strong>QTY: </strong><select name="selectqty"></p>';
            if ($qty == 0) {
                echo '<option value="0"> SOLD OUT </option>';
            } else {
                for ($i = 1; $i <= $qty; $i++) {
                    echo "<option value=$i>$i</option>";
                }
            }
            print '</select>';
            print '<br><br>';
            if($qty == 0) {
                print '<input type="submit" disabled name="addtocart" value="Add To Cart"></form>';
            }
            else{
                print '<input type="submit" name="addtocart" value="Add To Cart"></form>';
            }

            print '</p>';

            print '</td></tr>';
        }


        print '</table>';
        ?>
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
