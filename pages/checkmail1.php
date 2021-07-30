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
                                <h2> Forget Password Form - Check Email </h2>

                                </div>
                            </div>
                        </div>
                        <!--End header-->
                        <!--start form-->
                        <div class="col-sm-12">
                            <form action="check1.php" method="POST" validate>
                                <div class="form-header">
                                    <div class="form-header-content">
                                        <h2>log in</h2>
                                    </div>
                                    
                                <div class="email"> 
                                    <input type="email" name="txtemail" placeholder="Enter your E-mail or phone"  required>
                                </div>
                                
                                <button class="button" name="btncheck">Check Email</button>
                               
                                
                                
                            </form>
                        </div>
                         
                        
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