<?php
/*****************************************
Author: Matthew Gabiou, Josh Caruso, Abu Ghanem
Date:   7/18/16
Description:
Admin function page
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
        <table bgcolor="#BCED91" align="center" width="100%"><tr><td><div style="text-align:center;" >
                        <?php print  $_GET['Message'];?>
                    </div>
                </td>
            </tr>
        </table>
    <?php }?>

    <table class="main-table" cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td>
                <?php
                if (isset($_POST['submit'])) {
                    $form_description = $_POST['form_description'];
                    if (is_uploaded_file ($_FILES['aFile']['tmp_name'])) {
                        $realName = $_FILES['aFile']['name'];


                        $uploadpath = "./images/{$_POST["upttable"]}/".$realName;
                        echo $uploadpath;
                        $table = $_POST["upttable"];
                        $productid = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $_POST["form_prod_id"]);

                        //move_uploaded_file ($_FILES['aFile']['tmp_name'], "C:/ics325Mamp/labs/MainProject/images/".$_POST["upttable"].$realNa4me );
                        move_uploaded_file ($_FILES['aFile']['tmp_name'], $uploadpath );

                        // Finding out what is in $_POST
                        /*print_r($_POST).'<br>';
                        print ($uploadpath);
                        exit(0);*/


                        if (!$dbcn = mysqli_connect("localhost","root","root")) {
                            echo "Error connecting to DB<br />";
                            exit();
                        }
                        //if (!mysqli_select_db($dbcn, "ics325labs"))   {
                        if (!mysqli_select_db($dbcn, "moe"))   {
                            echo "Error selecting DB<br />";
                            exit();
                        }

//                        $sql="INSERT INTO names VALUES (NULL, '$form_description','$realName')";
                        $sql="UPDATE $table SET img_loc='$uploadpath' WHERE prod_id=$productid";

                        /*print($uploadpath).'<br>';
                        print($table).'<br>';
                        print($productid).'<br>';
                        exit(0);*/


                            /*"INSERT INTO $table (img_loc)
                              VALUES ('$uploadpath')
                              WHERE prod_id=$productid";*/

                        $result=mysqli_query($dbcn, $sql);
                        if (!$result)  {
                            echo "Error in query<br />";
                            exit();
                        }
                        mysqli_close($dbcn);
                    } else {
                        echo "Error uploading";
                        exit();
                    }
                }
                ?>

                <form method="post" action="<? $_SERVER['PHP_SELF'] ?>"
                      enctype="multipart/form-data">
<!--                    File Description:<br />-->
<!--                    <input type="text" name="form_description"  size="40">-->
<!--                    <input type="hidden" name="MAX_FILE_SIZE" value="2000000"><br><br>-->
                    Product ID:<br />
                    <input type="text" name="form_prod_id"  required="required" size="40"><br><br>
                    Choose the category of the file to upload:
                    <br>
                    <select name="upttable">
                    <option value="mens">Mens</option>
                    <option value="womens">Womens</option>
                    <option value="kids">Kids</option>
                    </select>

                    <br><br />File to upload/store in database:<br />
                    <input type="file" name="aFile"  size="40"><p>
                        <input type="submit" name="submit" value="submit">
<!--                        <br /><a href="showImage.php">Show Images</a>-->
                </form>

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
