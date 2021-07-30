<?php
//  ob_start();
//  session_start();
if (!isset($_SESSION["ID"]))
  echo ("<script>window.open ('index.php','_self')</script>");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Vet</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css" />
  <link rel="stylesheet" href="../css/font-awesome.min.css" />
  <link rel="stylesheet" href="../css/normalize.css" />
  <link rel="stylesheet" href="../css/main.css" />

</head>

<body>
  <!--start navbar-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
      <div class="navbar-brand logo">
        <img src="../images/logo2.jpeg" />
        <span>vet drugs</span>
      </div>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="Home.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">about</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="events.php">events</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="products.php">products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">contact us</a>
          </li>
          <li>

          </li>
          <li class="nav-item">
            <span class=" dropdown">
              <img src="customer/<?php echo ($_SESSION["ID"]) ?>.jpg" class="img-fluid image_profile" />
              <span><?php echo ($_SESSION["name"]); ?></span>

              <a class=" dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php
                if ($_SESSION["TYPE"] == "customer") {
                  echo (' <a class="dropdown-item" href="profile.php">My Profile </a>');
                  echo (' <a class="dropdown-item" href="orders.html">orders</a>');
                  echo ('<a class="dropdown-item" href="logout.php">log out</a>');
                } elseif ($_SESSION["TYPE"] == ("Company" || "pharmacy")) {
                  echo ('<a class="dropdown-item" href="profile.php">My Profile</a>');
                  echo ('<a class="dropdown-item" href="orders.html">orders</a>');
                  echo ('<a class="dropdown-item" href="myproducts.php">my products</a>');
                  echo ('<a class="dropdown-item" href="myevents.php">my event</a>');
                  echo ('<a class="dropdown-item" href="logout.php">log out</a>');
                }
                ?>
              </div>
            </span>
          </li>
        </ul>

        <form class="form-inline my-2 my-lg-0" method="POST">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="btnsearch">
            <i class="fa fa-search"></i>
          </button>
          <?php
          if (isset($_POST["Search"])) {
            $search = $_POST["Search"];
            echo ("<script> window.open('products.php?se=$search', '_self')</script>");
          }
          ?>
          <center><div class="product_list_header">
            <input type="hidden" name="cmd" value="_cart">
            <input type="hidden" name="display" value="1">
            <a href="cart1.php" class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a>
            <span class="badge badge-danger">
              <?php

              include_once "Shoppingcart.php";
              $cart = new Cart();
              $rss = $cart->GetCount();
              if ($ro = mysqli_fetch_assoc($rss))
                echo ($ro["count"]);


              ?>
            </span>
          </div>
          </center>
        </form>





      </div>
    </div>
  </nav>
  <!--End navbar-->