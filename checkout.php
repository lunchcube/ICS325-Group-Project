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

                    if(!isset($_SESSION["name"])) {
                        $Message = '<p>' . ' You must be logged in to access this page' . '</p>';
                        header("Location: login.php?Message=" . urlencode($Message));
                        exit();
                    }
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
    <?php  $session_id=$_SESSION['session_id'];?>
    <?php
    /*    if(isset($_POST['form_submit_order_btn'])){
    if(!(is_integer($_POST['card_number']) ) || strlen($_POST['card_number']) !=8)
    {
    ?>
           <table bgcolor="#BCED91" align="center" width="100%"><tr><td><div style="text-align:center;" >
                            <?php print  "Card number is incorrect";

                            ?>
                        </div>
                    </td>
                </tr>
            </table>

     <?php   }
    }*/

    if(isset($_POST['form_submit_order_btn'])){
        $sql_remove="DELETE FROM cart WHERE session_id='$session_id'";
        $result_remove = mysqli_query($db_connect,$sql_remove);

//$Message = '<p>'.'Thank You, Your Order has been submitted'.'</p><p>Your order number is: '.$session_id.'</p>';
        header("Location: confirmation.php?&sess_id=" . $session_id);
    }
    ?>


    <div style="text-align:center;margin:20px 0;padding-bottom: 150px;">

        <table class="shopping_cart" cellpadding="5" align="center" cellspacing="2" border="1" >
            <tr>
                <?php
                $db_connect = mysqli_connect("localhost", "root", "root", "moe");
                if (!$db_connect) {
                    die('Connection unsuccessful:' . mysqli_connect_errno());
                }

                ?>
            </tr>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Items Price</th>

            </tr>

            <?php
            $subtotal=0;

            $sql="SELECT prod_id,qty,current_table FROM cart WHERE session_id='$session_id'";
            $result = mysqli_query($db_connect,$sql);

            while($rows = mysqli_fetch_array($result)){?>
                <tr>
                    <?php
                    $id=$rows["prod_id"];
                    $_SESSION['orderedprodid'] = $rows["prod_id"];
                    $current_table=$rows["current_table"];
                    $sql_prod="SELECT descrip,price FROM $current_table WHERE prod_id='$id'";
                    $query_prod = mysqli_query($db_connect,$sql_prod);

                    while($prods = mysqli_fetch_array($query_prod)){
//                        print "descrip is: ".$prods['descrip'].'<br>';
//                        print "qty is: ".$rows['qty'].'<br>';
//                        print "qty is: ".$prods['price'].'<br>';
                        $_SESSION['orderdescrip'] = $prods['descrip'];
                        $_SESSION['orderquantity'] = $rows['qty'];
                        $_SESSION['orderdeprice'] = $prods['price'] * $rows['qty'];
                        ?>

                        <td><?php print $prods['descrip'] ?></td><td>
                            <?php echo $rows['qty'] ?>
                        </td><td><?php print $prods['price']; ?></td> <td>
                            <?php print $prods['price']*$rows["qty"] ;?></td>

                        <?php    $subtotal+= $prods['price']*$rows["qty"];
                    }
                    $prods = mysqli_fetch_array($query_prod);
//                    print "descrip is: ".$prods['descrip'].'<br>';
//                    print "qty is: ".$prods['qty'].'<br>';


                    ?></tr>
            <?php     }

            ?>
            <tr></tr>
            <tr><<td colspan="5" align="right"><strong>Total: $<?php  print $subtotal;?></strong></td></tr>

        </table>

        <?php

        $uid='';
        $fname='';
        $email='';
        $lname='';
        $address='';
        $city='';
        $state='';
        $postal='';
        $phone='';
        ?>
        <?php

        // GET UID
        $usernamefromsession = $_SESSION["name"];
        $sql_userinfo="SELECT uid FROM users WHERE username='$usernamefromsession'";
        $result_useruid = mysqli_query($db_connect,$sql_userinfo);
        $row = mysqli_fetch_array($result_useruid);
        //print '<br>'."The uid is: ".$row[0];
        $_SESSION['uid'] = $row[0];

        if(isset($_SESSION['uid'])){

            // Get uid of logged in user
            $uid=$_SESSION['uid'];
            $sql_info="SELECT email,fname,lname,phone,address,city,state,postalcode FROM users WHERE uid='$uid'";
            $result_info = mysqli_query($db_connect,$sql_info);

            while($rows_info = mysqli_fetch_array($result_info)){
                $email=$rows_info['email'];
                $fname=$rows_info['fname'];
                $lname=$rows_info['lname'];
                $address=$rows_info['address'];
                $city=$rows_info['city'];
                $state=$rows_info['state'];
                $phone=$rows_info['phone'];
                $postal=$rows_info['postalcode'];
                $_SESSION['state'] = $rows_info['state'];
            }
        }?>

        <form method="post" action="checkout.php">
            <div>
                <div class="form-item" id="form-item-first-name"><div class="form-item" id="edit-submitted-first-name-wrapper">
                        <label>First Name: </label>
                        <input type="text" maxlength="128" name="first_name" id="edit-submitted-first-name" size="60" value="<?php print $fname;?>" class="form-text">
                    </div>
                </div>
                <div class="form-item" id="form-item-last-name"><div class="form-item" id="edit-submitted-last-name-wrapper">
                        <label >Last Name: </label>
                        <input type="text" maxlength="128" name="last_name" id="edit-submitted-last-name" size="60" value="<?php print $lname;?>" class="form-text">
                    </div>
                </div><div class="form-item" id="form-item-email"><div class="form-item" id="edit-submitted-email-wrapper">
                        <label>Email: </label>
                        <input type="text" maxlength="128" required name="email" id="edit-submitted-email" size="60" value="<?php print $email;?>" class="form-text  email">
                    </div>
                </div>
                <div class="form-item" id="form-item-phone"><div class="form-item" id="edit-submitted-phone-wrapper">
                        <label>Phone: </label>
                        <input type="text" maxlength="128" name="phone" id="edit-submitted-phone" size="60" value="<?php print $phone;?>" class="form-text ">
                    </div>
                </div>
                <div class="form-item" id="form-item-address"><div class="form-item" id="edit-submitted-address-wrapper">
                        <label>Address: </label>
                        <input type="text" maxlength="128" name="address" id="edit-submitted-address" size="60" value="<?php print $address;?>" class="form-text ">
                    </div>
                </div><div class="form-item" id="form-item-city"><div class="form-item" id="edit-submitted-city-wrapper">
                        <label>City:</label>
                        <input type="text" maxlength="128" name="city" id="edit-submitted-city" size="60" value="<?php print $city;?>" class="form-text ">
                    </div>
                </div>

                <div class="form-item" id="form-item-state"><div class="form-item" id="edit-submitted-state-wrapper">
                        <label>State / Province: </label>
    <span class="a" style="width:500px">
 <select name="state" >
   <optgroup label="USA">
       <?php
       // Set users state on selected box
       if(isset($_SESSION['state'])) {
           $state = $_SESSION['state'];
           print "<option selected >$state</option >";
       }
       ?>
     <option value="Choose"> Choose</option>
     <option value="AL"> Alabama(AL)</option>
     <option value="AK"> Alaska(AK)</option>
     <option value="AZ"> Arizona(AZ)</option>
     <option value="AR"> Arkansas(AR)</option>
     <option value="CA"> California(CA)</option>
     <option value="CO"> Colorado(CO)</option>
     <option value="CT"> Connecticut(CT)</option>
     <option value="DE"> Delaware(DE)</option>
     <option value="FL"> Florida(FL)</option>
     <option value="GA"> Georgia(GA)</option>
     <option value="HI"> Hawaii(HI)</option>
     <option value="ID"> Idaho(ID)</option>
     <option value="IL"> Illinois(IL)</option>
     <option value="IN"> Indiana(IN)</option>
     <option value="IA"> Iowa(IA)</option>
     <option value="KS"> Kansas(KS)</option>
     <option value="KY"> Kentucky(KY)</option>
     <option value="LA"> Louisiana(LA)</option>
     <option value="ME"> Maine(ME)</option>
     <option value="MD"> Maryland(MD)</option>
     <option value="MA"> Massachusetts(MA)</option>
     <option value="MI"> Michigan(MI)</option>
     <option value="MN"> Minnesota(MN)</option>
     <option value="MS"> Mississippi(MS)</option>
     <option value="MO"> Missouri(MO)</option>
     <option value="MT"> Montana(MT)</option>
     <option value="NE"> Nebraska(NE)</option>
     <option value="NV"> Nevada(NV)</option>
     <option value="NH"> New Hampshire(NH)</option>
     <option value="NJ"> New Jersey(NJ)</option>
     <option value="NM"> New Mexico(NM)</option>
     <option value="NY"> New York(NY)</option>
     <option value="NC"> North Carolina(NC)</option>
     <option value="ND"> North Dakota(ND)</option>
     <option value="OH"> Ohio(OH)</option>
     <option value="OK"> Oklahoma(OK)</option>
     <option value="OR"> Oregon(OR)</option>
     <option value="PA"> Pennsylvania(PA)</option>
     <option value="RI"> Rhode Island(RI)</option>
     <option value="SC"> South Carolina(SC)</option>
     <option value="SD"> South Dakota(SD)</option>
     <option value="TN"> Tennessee(TN)</option>
     <option value="TX"> Texas(TX)</option>
     <option value="UT"> Utah(UT)</option>
     <option value="VT"> Vermont(VT)</option>
     <option value="VA"> Virginia(VA)</option>
     <option value="WA"> Washington(WA)</option>
     <option value="WV"> West Virginia(WV)</option>
     <option value="WI"> Wisconsin(WI)</option>
     <option value="WY"> Wyoming(WY)</option>
     </optgroup>
   <optgroup label="CANADA">
     <option value="AB"> Alberta(AB)</option>
     <option value="BC"> British Columbia(BC)</option>
     <option value="MB"> Manitoba(MB)</option>
     <option value="NB"> New Brunswick(NB)</option>
     <option value="NL"> New Foundland(NL)</option>
     <option value="NS"> Nova Scotia(NS)</option>
     <option value="ON"> Ontario(ON)</option>
     <option value="PE"> Prince Edward Island(PE)</option>
     <option value="QC"> Quebec(QC)</option>
     <option value="SK"> Saskatchewan(SL)</option>
     </optgroup>
 </select>
 </span></div>
                </div><div class="form-item" id="form-item-postal-code"><div class="form-item" id="edit-submitted-postal-code-wrapper">
                        <label>Postal Code: </label>
                        <input type="text" maxlength="128" name="postal_code" id="edit-submitted-postal-code" size="60" value="<?php print $postal;?>" class="form-text ">
                    </div>
                </div>

                <div class="form-item" id="form-item-payment-type">
                    <div class="form-item" id="edit-submitted-payment-type-wrapper">
                        <label>Payment:</label>
                        <select name="payment">
                            <option value="Visa">Visa</option>
                            <option value="master"> Master Card</option>
                            <option value="discover"> Discover</option>
                        </select>
                    </div></div>
                <div class="form-item" id="form-item-card-num">
                    <div class="form-item" id="edit-submitted-card-num-wrapper">
                        <label>Card Number:</label>
                        <input type="text" maxlength="16" pattern=".[0-9]{15,16}" required title="Must be 15 or 16 digit number" placeholder="16 Digits" name="card_number" required id="edit-submitted-card-num" size="60" value="4444555566661111" class="form-text ">
                    </div>
                </div>
                <br>
                <br>
                <div></div>
                <div></div>
                <button type="submit" name="form_submit_order_btn">Submit Order</button>
            </div>
        </form>

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
    </div>
</body>
</html>
