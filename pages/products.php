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
          <h2>All Products</h2>
        </div>
      </div>
      <!--start products-->
      <div class="row">

        <?php
        include_once "product_class.php";
        $p = new Products();
        if (isset($_GET['company']))
          $rs = $p->getbycom();
        elseif (isset($_GET['se']))
          $rs = $p->filter();
        else
          $rs = $p->GetAll();
        //if($prow=mysqli_fetch_assoc($rs)){

        // $result=$p->GetAll();
        while ($prow = mysqli_fetch_assoc($rs)) {
        ?>
          <div class="col-md-3">
            <div class="card">
              <div class="card-body">

                <img src="customer/<?php echo ($prow["user_id"]) ?>.jpg" class="rounded-circle" class="float-left" width='85px' />
                <a href="products.php?company=<?php echo ($prow["user_id"]); ?>">
                  <h3><?php echo $prow["name"]; ?></h3>
                </a>
                <a href="singleproduct.php?id=<?php echo ($prow["product_id"]); ?>">
                <img width='200px' height='200px' src="product/<?php
                                                                //   if(is_file('product/'.$prow['product_id'].'jpg'))
                                                                echo ($prow["product_id"]);
                                                                // else
                                                                //   echo 'default' ;
                                                                ?>.jpg" class="card-img-top" alt="...">

                <!-- <p class="card-text"> -->
                  <span class="text-danger"><?php echo $prow["pname"]; ?></span>
                  <h6><?php echo "Conce: " . $prow["concentration"]; ?> <br>
                    <?php echo "price: " . $prow["price"] . " LE"; ?> </h6>
                  <input type="submit" name="btncart<?php echo ($prow['product_id']); ?>" value="Add to cart" class="button" >
                  <!-- <p> -->
                    <?php
                    if (isset($_POST["btncart".$prow['product_id']])) {
                      include_once "Shoppingcart.php";
                      $cart = new Cart();
                      $cart->setprono($prow['product_id']);
                      $cart->setproname($prow['pname']);
                      $cart->setqty(1.0);
                      $cart->setprice($prow["price"]);
                      $cart->setTotal($prow["price"]);
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

        <?php //} 
        } ?>

      </div>
      <!--end product row-->
      <!--End products-->
      <!-- start product button control-->
      <div class="button-control">
        <ul class="list-unstyled">
          <?php  
          echo('<li id="1" class="active"><input type="submit" name="1" value="1" class="button" ></li>');
          // if(isset($_POST['1'])){
          //   include_once "product_class.php";
          //   $p = new Products();
          //   $p->getbypageno(1);
          // }

          echo('<li id="2"> 2 </li>');
          echo('<li id="3"> 3 </li>');
          echo('<li id="4"> 4 </li>');

         echo('<li class="button">Next</li>');
          ?>
        </ul>
      </div>
      <!-- End product button control-->
    </div>
  </section>
</form>


<?php include_once "footer.php"; ?>