<?php
ob_start();
session_start();
include_once "HeaderAfter.php";
?>


<form method="post">

    <?php
    include_once "product_class.php";
    $pro = new Products();
    $result = $pro->GetByPID();
    if ($row = mysqli_fetch_assoc($result)) {
    ?>
        <div class="container mx-auto px-50"  >
        <div><h4> Description: </h4> </div>   
        <div><h4> Description: </h4> </div>   

        <div class="row">
                <!--  class="float-left"  -->

                <div>
                    <img  class="img-fluid" width='300px' height='200px' src="product/<?php echo ($row["product_id"]); ?>.jpg">
                </div>
                <div style="text-align:center">
                   <h4>Product Name: </h4>
                <h3> <span class="text-danger"><?php echo $row["pname"]; ?></span></h3>
                    <h4> Description: </h4>
                    <h5><?php echo ($row["description"]); ?> </h5>


                    <h5> Price: <span><?php echo ($row["price"]) . " LE" ?></span></h5>

                    <center>
                        <input type="number" placeholder="Quantity" class="form-control" name="txtqty" style="width:50%;height:40px" />
                    </center>
                    <p class="card-text">
                        <?php echo ('<input  type="submit" name="btncart" value="Add to cart" class="button"> '); ?>

                        <p>
                        <?php
                    if (isset($_POST["btncart"])) {

                      include_once "Shoppingcart.php";
                      $cart = new Cart();
                      $cart->setprono($row['product_id']);
                      $cart->setproname($row['pname']);
                      $cart->setqty($_POST['txtqty']);
                      $cart->setprice($row["price"]);
                      $total=$row["price"] * $_POST['txtqty'];
                      $cart->setTotal( $total);
                      $cart->setUserID($_SESSION['ID']);

                      $ms = $cart->Add();
                      if ($ms == "ok")
                        echo ("<div class='alert alert-success'>Product In Cart</div>");
                      else
                        echo ($ms);
                    }

                    ?>

                </div>
            </div>
        </div>
    <?php }
    ?>

</form>
<?php include_once "footer.php"; ?>