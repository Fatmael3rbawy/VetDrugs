<?php
ob_start();
session_start();
include_once "HeaderAfter.php";
?>

<form method="post">


    <!--start product header-->
    <div class="product-header">

    </div>
    <!-- End product header-->

    <!--start section product-->
    <section class="product-home">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="product_header text-center">

                    <h2>Your shopping cart contains: <span style="color:red"><?php

                                                                                include_once "Shoppingcart.php";
                                                                                $cart = new Cart();
                                                                                $rss = $cart->GetCount();
                                                                                if ($ro = mysqli_fetch_assoc($rss))
                                                                                    echo ($ro["count"]);


                                                                                ?> Products</span></h2>
                </div>

            </div>


            <!--start products-->
            <center>
                <div>
                    <div class="table-responsive-sm">

                        <table class="table table-border table-striped " style="padding:30; margin:25px;width:85%">

                            <tr>
                                <th>SL No.</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>

                            <?php
                            include_once "Shoppingcart.php";
                            $cart = new Cart();
                            $rs = $cart->GetAll();
                            $x = 1;
                            while ($row = mysqli_fetch_assoc($rs)) {

                            ?>

                                <tr>
                                    <td><?php echo ($x); ?></td>
                                    <td><img src="product/<?php echo ($row["prono"]); ?>.jpg" class="rounded" class="float-left" width='85px' /></td>
                                    <td>
                                        <div class="row">
                                            <input type="submit" name="btnmin<?php echo ($row["prono"]); ?>" class="entry value-minus" value="-" />
                                            <center>
                                                <div><span><?php echo ($row["qty"]); ?></span></div>
                                            </center>
                                            <input type="submit" name="btnplus<?php echo ($row["prono"]); ?>" class="value-plus active" value="+" />
                                            <?php
                                            if (isset($_POST["btnmin" . $row["prono"]])) {
                                                include_once "Shoppingcart.php";
                                                $cart = new Cart();
                                                $rss = $cart->UpdateQTYM($row["prono"]);
                                                echo ("<script> window.open('cart1.php', '_self')</script>");
                                            }
                                            if (isset($_POST["btnplus" . $row["prono"]])) {
                                                include_once "Shoppingcart.php";
                                                $cart = new Cart();
                                                $rss = $cart->UpdateQTYP($row["prono"]);
                                                echo ("<script> window.open('cart1.php', '_self')</script>");
                                            }
                                            ?>


                                        </div>
                                    </td>
                                    <td><?php echo ($row["proname"]); ?> <?php

                                                                            include_once "Shoppingcart.php";
                                                                            $cart = new Cart();
                                                                            $rss = $cart->GetCount();
                                                                            if ($ro = mysqli_fetch_assoc($rss))
                                                                                echo ($ro["count"]);


                                                                            ?></td>
                                    <td><?php echo ($row["price"]); ?></td>
                                    <td><?php echo ($row["total"]); ?></td>
                                    <td class="invert">
                                        <div class="rem">

                                            <input type="submit" class="btn btn-danger" value="Delete" name="delete<?php echo ($row["prono"]); ?>" />
                                        </div>
                                        <?php
                                        if (isset($_POST["delete" . $row["prono"]])) {
                                            include_once "Shoppingcart.php";
                                            $cart = new Cart();
                                            $rss = $cart->DeleteCart($row["prono"]);
                                            echo ("<script> window.open('cart1.php', '_self')</script>");
                                        }
                                        ?>

                                        </script>
                                    </td>
                                </tr>
                            <?php $x++;
                            } ?>
                        </table>
                    </div>

            </center>
            <center>

                <h4>Continue to basket</h4>
                <ul>


                    <li>Total <i></i>

                        <span style="color: red; ">
                            <?php
                            include_once "Shoppingcart.php";
                            $cart = new Cart();
                            $rss = $cart->GetSum();
                            if ($ro = mysqli_fetch_assoc($rss))
                                echo ($ro["total"] . " LE");
                            ?>
                        </span> </li>
                </ul>

            </center>

            <center>
                <div>
                    <input type="submit" style="padding:5px;width:350px ;height:40px" class="btn btn-info" name="btnconfirm" value="Continue Shopping" />
                </div>
            </center>
            <?php
            if (isset($_POST["btnconfirm"])) {
                include_once "Shoppingcart.php";
                            $cart = new Cart();
                            $rs = $cart->GetAll();
                if (!mysqli_fetch_assoc($rs)){
                echo ("<center><h5><br><div class='alert alert-danger' width='20%'> No Products Added  </div> </h5> </center");
                }
                else {
                    include_once "DBclass.php";
                    $db = new database();
                    $msg = $db->RunDML("insert into orders values(Default,'Pending',Default,'" . $_SESSION["ID"] . "')");
                    if ($msg == "ok") {
                        $mx = $db->GetData("select max(order_id) as  max from orders where user_id='" . $_SESSION["ID"] . "'");
                        if ($rowmax = mysqli_fetch_assoc($mx)) {
                            $max = $rowmax["max"];
                            include_once "Shoppingcart.php";
                            $cart = new Cart();
                            $rss = $cart->GetAll();
                            while ($ro = mysqli_fetch_assoc($rss)) {
                                $ms = $db->RunDML("insert into sales values(Default,'" . $max . "','" . $ro["prono"] . "','" . $ro["price"] . "','" . $ro["qty"] . "','" . $ro["total"] . "')");
                            }

                            $db->RunDML("Delete from ordertemp where user_id='" . $_SESSION["ID"] . "'");

                            echo ("<script> window.open('cartMSG.php?orderno=$max', '_self')</script>");
                        }
                    }
                }
            }

            ?>
        </div>
        </div>
    </section>
</form>
<?php include_once "footer.php"; ?>