<?php
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
        <!--start section sin up-->
        <section class="signup">
            
            <div class="container">
                <div class="row justify-content-md-center">
                     <div class="signup-content"> 
                         <!--start header-->    
                         <div class="row">
                             <div class="col-sm-12">
                                 <div class="sign-header">
                                     <h3>welcome ,please create your account</h3>
                                 </div>
                             </div>
                         </div>
                         <?php
                            if(isset($_POST['btnsub'])){
                                $reg = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
                                if(preg_match($reg , $_POST['password'])){
                                    include_once "users.php";
                                    $user= new Users();
                                    $user-> setname($_POST['name']);
                                    $user-> setphone($_POST['phone']);
                                    $user->setemail($_POST['email']);
                                    $user->settype($_POST['type']);
                                    $user->setpassword($_POST['password']);
                                    $ms = $user->add();
                                    if($ms== "ok")
                                    echo("<div class ='alert alert-success'>Your Account has been created</div>");
                                    elseif(strpos($ms , "phone"))
                                    echo("<div class ='alert alert-warning'>This Phone is used</div>");
                                    elseif(strpos($ms , "email"))
                                    echo("<div class ='alert alert-warning'>This Email is used</div>");
                                    else
                                        echo("<div class ='alert alert-danger'>$ms</div>");
                                    
                                     //    Show Home page based on type of user
                                //  $user_type =$_SESSION["TYPE"];
                                //  if($user_type == "customer")
                                //      echo("<script>window.open ('customerhome.php','_self')</script>");
                                //  elseif($user_type == "pharmacy")
                                //      echo("<script>window.open ('pharmacyhome.php','_self')</script>");
                                //  elseif($user_type == "Company")
                                     echo("<script> window.open ('Home.php','_self')</script>");
                                }
                                else 
                                 echo("<div class ='alert alert-warning'>This Password is week, It should contain minimum eight characters,<br> at least one uppercase letter, one lowercase letter,<br> one number and one special character</div>");
                           
                            
                                
                            
                         ?>
                         <!--End header-->
                         <!--start form-->
                         <div class="col-sm-12">
                            <div class="form-content">
                                <div class="form-header">
                                    <h2>sign up</h2>
                                </div>
                             <form action="" validate method="POST">
                                 <!--start sin in with social media-->
                                    <div class="form-social">
                                        <ul class="list-unstyled">
                                            <li> <a href="#"> <i class="fa fa-facebook fa-2x"></i></a> </li >
                                            <li > <a href="#"> <i class="fa fa-twitter fa-2x"></i> </a> </li>
                                            <li > <a href="#"> <i class="fa fa-google fa-2x"></i> </a> </li>
                                        </ul>
                                    </div>
                                    
                                    <div class="or text-center">
                                        <span> or</span>
                                        
                             </div>
                                    
                                    <!-- end sin in with social media-->
                                 <div class="selected">
                                     <label>type user</label>
                                     
                                     <select name ="type">
                                        <option><!--select--></option>
                                         <option>Company</option>
                                         <option>pharmacy</option>
                                         <option>customer</option>
                                     </select>
                                 </div>
                                 <div class="name">
                                    <div class="input-header">
                                        <i class="fa fa-user"></i>
                                        <label>Name</label>
                                     </div>
                                    <input type="text" name ="name"  required>
                                </div>
                                
                                 <!--<div class="name">
                                    <div class="input-header">
                                        <i class="fa fa-user"></i>
                                        <label>hh</label>
                                     </div>
                                    <input type="text" name ="name" autocomplete="off" required>
                                </div> -->

                                 <div class="email">
                                     <div class="input-header">
                                        <i class="fa fa-envelope"></i>
                                        <label>E-mail</label>
                                     </div>
                                     <input type="email" name ="email"  required>
                                 </div>
                                 <div class="phone">
                                    <div class="input-header">
                                        <i class="fa fa-phone"></i>
                                        <label>Phone</label>
                                     </div>
                                    <input type="text" name ="phone"  required>
                                </div>
                                 <div class="pass">
                                    <div class="input-header">
                                        <i class="fa fa-lock"></i>
                                        <label>password</label>
                                     </div>
                                     <input type="password" name ="password" autocomplete="off" required/>
                                     <i class="fa fa-eye"></i>
                                 </div>
                                 <div class="confirm-pass">
                                    <div class="input-header">
                                        <i class="fa fa-lock"></i>
                                        <label>confirm password</label>
                                     </div>
                                    <input type="password" name ="confpass" autocomplete="off" required/>
                                    
                                </div>
                                <div class="submit">
                                    <input class="button" type="submit" name ="btnsub">
                                </div>
                                 
                             </form>
                            </div>
                         </div>
                         <!--end form-->
                        
                         
                    </div> <!--end log-content-->
                </div> <!--end row-->
            </div> <!--end container-->
        </section>
        <!--End section sin up-->

        

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