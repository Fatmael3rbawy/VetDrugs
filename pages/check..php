<?php
                                  	if(isset($_POST["btncheck"]))
                                      {       
                                              include_once "users.php";
                                              $cust=new Users();
                                               
                                              $cust->setemail($_POST["txtemail"]);
                                           
                                              $rs=$cust->GetByEmail();
                                              if($row=mysqli_fetch_assoc($rs))
                                              {
                                               
                                                  $no=rand(1111,9999);
                                                  $link="http://localhost/VetProject/pages/updatepassword.php?id=".$row["user_id"];
                                                  //Send Email
                                                  
                                              require_once "src/PHPMailer.php";
                                              require_once "src/Exception.php";
                                              require_once "src/SMTP.php";
                                              require_once "vendor/autoload.php";
                                                  
                                                  $mail = new  PHPMailer\PHPMailer\PHPMailer();
                          
                                                  $mail->IsSMTP();
                                                  //$mail->SMTPDebug = 1;
                                                  $mail->SMTPAuth = true;
                                                  $mail->SMTPSecure = 'ssl';
                                                  $mail->Host = "smtp.gmail.com";
                                                  $mail->Port = 465; 
                                                  $mail->IsHTML(true);
                      
                                                  $mail->Username = "fa2911674@gmail.com";
                                                  $mail->Password = "171@abcd";
                      
                                                  $mail->setFrom('fa2911674@gmail.com', 'VET_DRUGS');
                                                
                                                  
                  
                                                  $mail->addAddress($_POST["txtemail"], "VET_DRUGS");
                                                  $mail->Subject = 'Forget Password';
                                           
                                                  $mail->Body ="Dear : ".($row["name"])."\n Your Verfication Code is ".$no."\n Please Clike here To Update Password ".$link;
                                                  
                                                  if(!$mail->send()) {
                                                      echo "Mailer Error: " . $mail->ErrorInfo;
                                                  }
                                                  else{
                                                      $_SESSION["code"]=$no;
                                                      echo("<div class='alert alert-success'> Check Your Email </div>");		 
                                                  } 
                                              }
                                              else{
                                                  echo("<br/><div class='alert alert-danger'> Invaild Email , Try Again </div>");
                                              }
                                      }
                                      ?>
