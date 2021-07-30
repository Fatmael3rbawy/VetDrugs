<?php
session_start();

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
    <nav>
        <div class="container">
            <div class="Navbar">
                <div class="logo">
                    <img src="../images/logo2.jpeg" class="image-logo" />
                </div>
                <div class="nav-header">
                    <h2>vet drugs</h2>
                </div>
            </div>
        </div>
    </nav>
    <!--End navbar-->
    <!--start section verifiy-->
    <section class="verifiy">

        <div class="container">
            <h2>Forget Password Form - Update</h2>

            <div class="row justify-content-md-center">
                <div class="col-md-9">

                    <form action="" method="POST">

                        <div class="verifiy-email">
                            <input type="text" name="code" required autocomplete="of" placeholder="Enter the verification code">
                        </div>
                        <div class="verifiy-email">
                            <input type="password" name="txtpass" required placeholder="Enter the New Password"/>
                        </div>
                        <div class="verifiy-email">
                            
                            <input type="password" name="txtconfirm" placeholder="Confirm New Password" required />
                        </div>

                        <input type="submit" value="Update Password" name="btnupdate" class="btn btn-info">
                        <?php
                        if (isset($_POST["btnupdate"])) {
                            include_once "users.php";
                            $cust = new Users();
                            if ($_SESSION["code"] == $_POST["code"]) {
                                if ($_POST["txtpass"] == $_POST["txtconfirm"]) {
                                    $cust->setpassword($_POST["txtpass"]);
                                    $ms = $cust->UpdatePW();
                                    echo ("<br/><div class='alert alert-success'> Your Password Has been Updated </div>");
                                } else
                                    echo ("<br/><div class='alert alert-danger'>Confirm must be match password , Try Again </div>");
                            } else
                                echo ("<br/><div class='alert alert-danger'> Invaild Code , Try Again </div>");
                        }
                        ?>




                        <h4>For New People</h4>
                        <h5><a href="Register.php">Register Here<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></h5>
                    </form>

                </div>

            </div>
            <!--verifiy-->


        </div>

    </section>
    <!--End section verifiy-->




    <!--start section loading-->
    <section class="load-page">
        <div class="sk-fading-circle">
            <div class="sk-circle1 sk-circle"></div>
            <div class="sk-circle2 sk-circle"></div>
            <div class="sk-circle3 sk-circle"></div>
            <div class="sk-circle4 sk-circle"></div>
            <div class="sk-circle5 sk-circle"></div>
            <div class="sk-circle6 sk-circle"></div>
            <div class="sk-circle7 sk-circle"></div>
            <div class="sk-circle8 sk-circle"></div>
            <div class="sk-circle9 sk-circle"></div>
            <div class="sk-circle10 sk-circle"></div>
            <div class="sk-circle11 sk-circle"></div>
            <div class="sk-circle12 sk-circle"></div>
        </div>
    </section>
    <!--End section loading-->
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.nicescroll.min.js"></script>
    <script src="../js/custom.js"></script>
</body>

</html>