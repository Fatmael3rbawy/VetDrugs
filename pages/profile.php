<?php
 ob_start();
 session_start();
 include_once "HeaderAfter.php";
?>



<!DOCTYPE html>
<html lang="en">
    <body>

        <!--start section profile-->
        <section class="profile">
        <div class="overlay"></div>
            <div class="container">
        
       
                <div class="row justify-content-md-center">
                    <div class="col-sm-9">
                        <div class="profile-content">
                           
                            <center>
                                <table class="table table-border table-striped" style="margin:25px;width:75%" >
                                <?php
                                include_once "Users.php";
                                $u=new Users();
                                $result = $u->GetByID();
                                if($row=mysqli_fetch_assoc($result)){

                                ?>
                            </div>
                            <div class="prifile-image">
                                <tr><img src="customer/<?php echo($_SESSION["ID"]) ?>.jpg"  class="img-fluid" /></tr>
                                <div class="img-upload-profile">
                                    <i class="fa fa-camera"></i>
                                </div>
                                <h1 class="username"  >Profile Data</h1>
                               <div class="name">
                                   
                                  <tr> <td><h6>Name</h6></td><td><h5><?php echo($row["name"]);?> </h5></td></tr>
                               </div>
                               <div class="email">
                                <tr> <td><h6>E-mail</h6></td><td><h5><?php echo($row["email"]);?> </h5></td></tr>

                            </div>
                            
                            <div class="phone">
                                <tr> <td><h6>Phone</h6></td><td><h5><?php echo($row["phone"]);?></h5></td></tr>
                            </div>
                            <div class="name">
                                  <tr> <td><h6>Type</h6></td><td><h5><?php echo($row["type"]);?> </h5></td></tr>
                               </div>
                            <div class="name">
                            <tr><td  style="text-align:center"> <a href="updateprofile.php" class="btn btn-warning" >Update My Profile</a>  </td>
                            <td  style="text-align:center"> <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-danger" >Delete My Account</a>  </td></tr>
                                </div>
                            <?php }?>
                                </table>
                        </center>
                        </div>
                    </div>
                </div>
            </div>
        </section>
   <!-- Unsubscribe user -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-center">Unsubscribe User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form  method="post">
						 
						<div class="form-group alert alert-danger">
						Are you sure delete your account ? 
							
						</div>
						<div class="right-w3l">
							<input type="submit" style="width:200px" class="btn btn-danger" value="Yes" name="btnyes">
							<a href="profile.php" style="width:200px;height:45px"  class="btn btn-success">
							No </a>
						</div>
						 

						<?php
								if(isset($_POST["btnyes"]))
								{
									include_once "Users.php";
									$cust=new users();
									 $msg=$cust->Delete();
									 if($msg=="ok")
										{
											$dir="customer/";
											$img=$_SESSION['ID'];
											$fdir= $dir.$img.".jpg";
											unlink($fdir);
										   echo("<script> window.open('logout.php', '_self')</script>");		 
										}
										else
										   echo("<div class='alert alert-danger'> ".$msg."</div>");		
								}

							?>
					</form>
				</div>
			</div>
        </div>
     </div>
     <?php include_once "footer.php"; ?>
    </body>
</html>
