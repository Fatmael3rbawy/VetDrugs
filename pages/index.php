<?php
 ob_start();
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Vet</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../css/font-awesome.min.css"/>
        <link rel="stylesheet" href="../css/normalize.css"/>
        <link rel="stylesheet" href="../css/main.css"/>
        
    </head>
    <body>
        <!--start navbar-->
        <nav>
            <div class="container">
                <div class="Navbar">
                    <div class="logo">
                        <img  src="../images/logo2.jpeg" class="image-logo"/>
                    </div>
                    <div class="nav-header">
                        <h2>vet drugs</h2>
                    </div>
                </div>
            </div>
        </nav>
        <!--End navbar-->
        <!--start section log in-->
        <section class="login">
    
           <div class="container">
               <div class="row justify-content-md-center">
                    <div class="log-content"> 
                        <!--start header-->    
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="log-header">
                                    <h1>login to our site</h1>
                                    <p class="lead">use the form below to our website if you have account</p>
                                </div>
                            </div>
                        </div>
                        <!--End header-->
                        <!--start form-->
                        <div class="col-sm-12">
                            <form action="" method="POST" validate>
                                <div class="form-header">
                                    <div class="form-header-content">
                                        <h2>log in</h2>
                                    </div>
                                    <i class="fa fa-lock fa-3x"></i>
                                    <p class="lead">enter your E-mail and password to log in</p>
                                </div>
                                <div class="email"> 
                                    <input type="email" name="email" placeholder="Enter your E-mail or phone"  required>
                                </div>
                                <div class="spass">
                                    <input type="password" name="password" placeholder="Password" autocomplete="off" required/>
                                    <i class="fa fa-eye"></i>
                                <button class="button" name="login">log in</button>
                                <?php
                                //   if(isset($_COOKIE['usercookie'])){
                                //     echo("<script>window.open ('Home.php','_self')</script>");

                                //    }
                                  if(isset($_POST['login'])){
                                        include_once "Users.php";
                                        $u = new Users();
                                        $u->setemail($_POST['email']);
                                        $u->setphone($_POST['email']);
                                        $u->setpassword($_POST['password']);
                                        $result = $u->login();
                                        if($row=mysqli_fetch_assoc($result)){
                                            $_SESSION["ID"] = $row["user_id"];
                                            $_SESSION["name"] = $row["name"];
                                            $_SESSION["TYPE"] = $row["type"];
                                            echo("<script>window.open('Home.php','_self')</script>");

                                            //$t=$row["type"];
                                            // if( $_SESSION["TYPE"] == "customer")
                                            //     echo("<script>window.open ('customerhome.php','_self')</script>");
                                            // elseif( $_SESSION["TYPE"] == "pharmacy")
                                            //     echo("<script>window.open ('pharmacyhome.php','_self')</script>");
                                            // elseif( $_SESSION["TYPE"] == "Company")
                                            // echo("<script> window.open ('companyhome.php','_self')</script>");
                                        
                                        }
                                        else 
                                            echo("<div class='alert alert-danger' > Invalid Data Login </div>");
                                  }
                                ?>
                                <span class="signup_des">Don't Have Accout?</span >
                                <a href="Register.php" class="signup_link" target="_self">create new account</a>

                                <div class="checkd">
                                    <input type="checkbox" id="checked">
                                    <label class="checke" for="checked" name="rem_me">Remember me</label>
                                    <?php
                                    if(isset($_POST["rem_me"])){
                                        // setcookie("usercookie" , $_POST["email"] , time()+60*60*24*365);

                                    }
                                    ?>
                                </div>
                                <div class="forget-password">
                                    <a href="checkmail.php">Forgot password ?</a>
                                </div>
                                
                            </form>
                        </div>
                        <!--end form-->
                        <!--start sin in with social media-->
                        <div class="social">
                            <h3>... or login with:</h3>
                            <ul class="list-unstyled">
                                <li class="button"> <a href="#"> <i class="fa fa-facebook fa-2x"></i> facebook</a> </li c>
                                <li class="button"> <a href="#"> <i class="fa fa-twitter fa-2x"></i> twitter</a> </li>
                                <li class="button"> <a href="#"> <i class="fa fa-google fa-2x"></i>  google</a> </li>
                            </ul>
                        </div>
                        <!-- end sin in with social media-->
                        
                   </div> <!--end log-content-->
               </div> <!--end row-->
           </div> <!--end container-->
        </section>
        <!--End section log in-->

        
        <!--End div sign up-->

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