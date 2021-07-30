<?php
 //ob_start();
  session_start();
  if(!isset($_SESSION["ID"]))
 echo("<script>window.open ('index.php','_self')</script>");
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
                                 
                             </div>
                         </div>
                         <?php
                            if(isset($_POST['btnsave'])){
                                $reg = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
                            //    if(preg_match($reg , $_POST['password'])){
                                    include_once "users.php";
                                    $user= new Users();
                                    $user-> setname($_POST['name']);
                                    $user-> setphone($_POST['phone']);
                                    $user->setemail($_POST['email']);
                                    $user->settype($_POST['type']);
                                    $user->setpassword($_POST['password']);
                                    $ms = $user->Update();
                                    if($ms== "ok")
                                    {
                                        $dir="customer/";
                                        $image=$_FILES['file']['name'];              
                                        $temp_name=$_FILES['file']['tmp_name'];
                                        $img=$_SESSION["ID"];
                                        if($image!="")
                                        {
                                            $fdir= $dir.$img.".jpg";
                                            move_uploaded_file($temp_name, $fdir);
                                        }
                                        echo("<script> window.open ('profile.php','_self')</script>");
                                    }
                                    elseif(strpos($ms , "phone"))
                                    echo("<div class ='alert alert-warning'>This Phone is used</div>");
                                    elseif(strpos($ms , "email"))
                                    echo("<div class ='alert alert-warning'>This Email is used</div>");
                                    else
                                        echo("<div class ='alert alert-danger'>$ms</div>");
                                //}
                                // else 
                                // echo("<div class ='alert alert-warning'>This Password is week, It should contain minimum eight characters,<br> at least one uppercase letter, one lowercase letter,<br> one number and one special character</div>");
                              
                            
                                
                            }
                         ?>
                         <!--End header-->
                         <!--start form-->
                         <div class="col-sm-12">
                            <div class="form-content">
                                <div class="form-header">
                                    <h2>Update Profile</h2>
                                </div>
                             <form action="" validate method="POST" enctype="multipart/form-data">
                                 <!--start sin in with social media-->
                                  
                                    <?php
                                        include_once "Users.php";
                                        $u=new Users();
                                        $result = $u->GetByID();
                                        if($row=mysqli_fetch_assoc($result)){

                                ?>
                                 <div class="selected">
                                     <label>type user</label>
                                     
                                     <select name ="type">
                                        <option><!--select--></option>
                                         <option <?php if($row["type"]=="Company") echo("selected"); ?>>Company</option>
                                         <option <?php if($row["type"]=="pharmacy") echo("selected"); ?>>pharmacy</option>
                                         <option <?php if($row["type"]=="customer") echo("selected"); ?>>customer</option>
                                     </select>
                                 </div>
                                 <div class="name">
                                    <div class="input-header">
                                        <i class="fa fa-user"></i>
                                        <label>Name</label>
                                     </div>
                                    <input type="text" name ="name"   value="<?php echo($row["name"]); ?>">
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
                                     <input type="email" name ="email"  value="<?php echo($row["email"]); ?>">
                                 </div>
                                 <div class="phone">
                                    <div class="input-header">
                                        <i class="fa fa-phone"></i>
                                        <label>Phone</label>
                                     </div>
                                    <input type="text" name ="phone"  value="<?php echo($row["phone"]); ?>">
                                </div>
                                 <div class="pass">
                                    <div class="input-header">
                                        <i class="fa fa-lock"></i>
                                        <label>password</label>
                                     </div>
                                     <input type="password" name ="password" autocomplete="off" value="<?php echo($row["password"]); ?>"/>
                                     <i class="fa fa-eye"></i>
                                 </div>
                                 
                                 <lable> Upload Image Profile </lable>
                                    <input type="file"   name="file"/>   
                                
                                <div class="submit">
                                    <input class="button" type="submit" name ="btnsave" value="Update">
                                </div>
                                        <?php } ?>
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