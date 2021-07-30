<?php
ob_start();
session_start();
include_once "HeaderAfter.php";
?>



<!--start slider-->
<section class="slider">
  
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">

      <div class="carousel-item active">
        <a href="#"> <img src="../images/slider/login.jpeg" class="d-block w-100" alt="..."> </a>
      </div>

      <div class="carousel-item">
        <a href="#"> <img src="../images/slider/WhatsApp Image 2020-03-08 at 5.25.59 PM (1).jpeg" class="d-block w-100" alt="..."> </a>

      </div>
      
      <div class="carousel-item">
        <a href="#"> <img src="../images/slider/hhhhhhh.jpg" class="d-block w-100" alt="..."> </a>
      </div>
      <script></script>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
</section>
<hr style="border: 3px solid #222;">
<!-- End slider-->
<form method="POST">

<!--start section product-->
<section class="product-home">
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="product_header text-center">
        <h2>Last Products</h2>
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
          $rs = $p->getlast();
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
                <!-- class="img-fluid image_profile" -->
                <a href="singleproduct.php?id=<?php echo ($prow["product_id"]); ?>">
                  <img width='200px' height='200px' src="product/<?php echo ($prow["product_id"]); ?>.jpg" class="card-img-top" alt="...">
                </a>
                <!-- <p class="card-text"> -->
                <span class="text-danger"><?php echo $prow["pname"]; ?></span>
                <h6><?php echo "Conce: " . $prow["concentration"]; ?> <br>
                  <?php echo "price: " . $prow["price"] . " LE"; ?> </h6>
                <input type="submit" name="btncart<?php echo ($prow['product_id']); ?>" value="Add to cart" class="button">
                <?php
                if (isset($_POST["btncart" . $prow['product_id']])) {
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
   
    <!-- End product button control-->
  </div>
</section>
<!--end product row-->
</form>

<!--start section events-->
<section class="product-home">
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="product_header text-center">
        <h2>Last Events</h2>
      </div>
    </div>
    <!--start events-->
    <div class="row">

      <?php
      include_once "event_class.php";
      $p = new Events();
      if (isset($_GET['company']))
        $rs = $p->getbycom();
      else
        $rs = $p->GetAll();
      //if($prow=mysqli_fetch_assoc($rs)){

      // $result=$p->GetAll();
      while ($prow = mysqli_fetch_assoc($rs)) {
      ?>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">

              <img src="customer/<?php echo ($prow["user_id"]) ?>.jpg" class="rounded-circle" class="float-left" width='85px' />
              <a href="events.php?company=<?php echo ($prow["user_id"]); ?>">
                <h3><?php echo $prow["name"]; ?></h3>
              </a>
              <!-- class="img-fluid image_profile" -->
              <img width='200px' height='200px' src="event/<?php echo ($prow["event_id"]); ?>.jpg" class="card-img-top" alt="...">

              <p class="card-text">
                <h5><span class="text-danger"><?php echo $prow["event_name"]; ?></span> </h5>
                <h6><?php echo ("<span  class='text-info'> Place: </span>" . $prow["place"]); ?> <br>
                  <?php echo "<span  class='text-info'>Time: </span>" . $prow["time"]; ?> <br>
                  <?php echo "<span  class='text-info'>About event: </span>" . $prow["details"]; ?> </h6>



                <p>
            </div>
          </div>

        </div>

      <?php //} 
      } ?>

    </div>
    <!--end product row-->
    <!--End products-->
    <!-- start product button control-->
    
    <!-- End product button control-->
  </div>
</section>
<?php include_once "footer.php"; ?>