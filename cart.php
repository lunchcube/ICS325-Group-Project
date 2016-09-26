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
    <title>Cart</title>

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

                    $db_connect = mysqli_connect("localhost", "root", "root", "moe");
                    if (!$db_connect) {
                        die('Connection unsuccessful:' . mysqli_connect_errno());
                    }
                    ?>
                </td>
            </tr>
        </table>
    </div>
    <div id="header">
        <table  id="header-table" cellpadding="0" cellspacing="1" width="100%"><tr>
                <td align="left"><h2><strong>Cart</strong></h2></td>
                <td align="right"><ul class="nav">
                        <li class="active menu-item" id="item-1"><a class=" active" href="index.php" title="Home">Home</a></li>
                        <li class="menu-item" id="item-2"><a href="men.php" title="Men">Men</a></li>
                        <li class="menu-item" id="item-4"><a class="" href="women.php" title="Women">Women</a></li>
                        <li class="menu-item" id="item-5"><a href="Kids.php" title="Kids">Kids</a></li><li class="menu-item" id="item-6"><a href="cart.php" title="Cart">Cart</a></li>
                </td>

            </tr>
        </table>
    </div>

    <table bgcolor="#BCED91" align="center" width="100%"><tr><td><div style="text-align:center;" >
                    <span id="messageheader"> </span>
                </div>
            </td>
        </tr>
    </table>

    <?php  $session_id=$_SESSION['session_id'];?>
    <div style="text-align:center;margin:20px 0;">
        <table class="shopping_cart" cellpadding="5" align="center" cellspacing="2" border="1" >
            <tr>
                <?php
                $db_connect = mysqli_connect("localhost", "root", "root", "moe");
                if (!$db_connect) {
                    die('Connection unsuccessful:' . mysqli_connect_errno());
                }

                ?>
            </tr>
            <form method="post" action="cart.php">
                <?php
                // remove item from cart
                if(isset($_GET['update'])=='remove'){
                    $pid= $_GET['prod_id'];
                    $sql_remove="DELETE FROM cart WHERE prod_id=$pid AND session_id='$session_id'";

                    $result_remove = mysqli_query($db_connect,$sql_remove);
                }


                //update cart with the new quantity
                if(isset($_POST['form_checkout_btn'])){
                    header("Location: checkout.php");
                }
                if(isset($_POST['form_update_btn'])){

                    foreach($_POST['quantity'] as $key => $val) {
                        if($val==0){
                            $sql_remove="DELETE FROM cart WHERE prod_id=$key AND session_id='$session_id'";

                            $result_remove = mysqli_query($db_connect,$sql_remove);
                        }

                        else {

                            // Check to make sure given value is not higher than maximum.
                            //print_r($_POST);
                            //print '<br>';
                            //print_r($_SESSION);
                            //print '<br>';

                            //$currentloadedtable = $_SESSION["currentTable"];
                            // Get quantity on cart
                            $sql = "SELECT qty
                            FROM `cart`";
                            //WHERE (prod_id=$prod_id)";
                            $result = mysqli_query($db_connect, $sql);
                            $row = mysqli_fetch_array($result);
                            $currentqty = $row['qty'];

                            // Get table to use
                            $gettable = "SELECT current_table
                            FROM `cart`";
                            //WHERE (prod_id=$prod_id)";
                            $resulttable = mysqli_query($db_connect, $gettable);
                            $row = mysqli_fetch_array($resulttable);
                            $tabletouse = $row['current_table'];

                            // Get Max Quantity
                            $getmaxqty = "SELECT $tabletouse.qty
                            FROM $tabletouse
                            INNER JOIN cart
                            ON $tabletouse.prod_id=cart.prod_id";
                            $resultquantity = mysqli_query($db_connect, $getmaxqty);
                            $row = mysqli_fetch_array($resultquantity);
                            $maxquantity = $row['qty'];


                            //print "current loaded table is: ".$currentloadedtable.'<br>';
                            //print "current quantity is: " . $currentqty . '<br>';
                            //print "table to use is: " . $tabletouse . '<br>';
                            //print "max quantity is: ".$maxquantity.'<br>';

                            if ($val > $maxquantity) {
                                print '<script type = "text/javascript">';
                                print 'document.getElementByID("messageheader").innerHTML = "Cart quantity is over maximum quantity of '.$maxquantity.';';
                                print '</script>';

//                                print "Cart quantity is over maximum quantity of " . $maxquantity;
                                $Message="Cart quantity is over maximum quantity of";
                                //document.getElementById("messageheader").innerHTML='$message';
                            } else {

                                // Update the quantity
                                $sql_update = "UPDATE cart SET qty='$val' WHERE prod_id='$key' AND session_id='$session_id'";
                                $result_update = mysqli_query($db_connect, $sql_update);
                            }
                        }


                    }

                }
                ?>


                <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Items Price</th>
                    <th></th>

                </tr>

                <?php
                $subtotal=0;

                $sql="SELECT prod_id,qty,current_table FROM cart WHERE session_id='$session_id'";

                $result = mysqli_query($db_connect,$sql);

                while($rows = mysqli_fetch_array($result)){?>
                    <tr>
                        <?php
                        $id=$rows["prod_id"];
                        $current_table=$rows["current_table"];
                        $sql_prod="SELECT descrip,price FROM $current_table WHERE prod_id='$id'";
                        $query_prod = mysqli_query($db_connect,$sql_prod);
                        while($prods = mysqli_fetch_array($query_prod)){?>

                            <td><?php print $prods['descrip'] ?></td><td>
                                <input type="text" name="quantity[<?php echo $rows['prod_id'] ?>]" size="5" value="<?php print $rows['qty'] ?>" />
                            </td><td><?php print $prods['price']; ?></td> <td><?php print $prods['price']*$rows["qty"] ;?></td>
                            <td><a href="cart.php?update=remove&prod_id=<?php print $id;?>">remove</td>

                            <?php    $subtotal+= $prods['price']*$rows["qty"];
                        }

                        ?></tr>
                <?php     }

                ?>
                <tr></tr>
                <tr><<td colspan="5" align="right"><strong>Total: $<?php  print $subtotal;?></strong></td></tr>

        </table>

        <button type="submit" name="form_update_btn">Update Cart</button>
        <button type="submit" name="form_checkout_btn">Checkout</button>
        </form>


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
