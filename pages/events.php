
<?php
    ob_start();
    session_start();
    include_once "HeaderAfter.php";
    ?>
     
      <section class="product-home">
          <div class="container">
              <div class="row justify-content-md-center">
                  <div class="product_header text-center">
                      <h2 >All Events</h2>
                  </div>
              </div>
              <!--start events-->
              <div class="row">
                  
                     <?php 
                        include_once "event_class.php";
                        $p=new Events();
                        if(isset($_GET['company']))
                          $rs=$p->getbycom();
                        else
                        $rs = $p->GetAll();
                        //if($prow=mysqli_fetch_assoc($rs)){

                             // $result=$p->GetAll();
                              while($prow=mysqli_fetch_assoc($rs)){
                              ?>
                                <div class="col-md-4">
                                <div class="card"> 
                                <div class="card-body">

                                <img src="customer/<?php echo($prow["user_id"]) ?>.jpg"  class="rounded-circle" class="float-left"  width='85px'/> 
                                <a href="events.php?company=<?php echo ($prow["user_id"]); ?>"><h3><?php echo $prow["name"];?></h3></a>
                                <!-- class="img-fluid image_profile" -->
                                <img   width='200px' height='200px' src="event/<?php echo($prow["event_id"]);?>.jpg" class="card-img-top" alt="..." >

                                  <p class="card-text">
                                      <h5><span  class="text-danger"><?php echo $prow["event_name"];?></span> </h5>
                                      <h6><?php echo ("<span  class='text-info'> Place: </span>" .$prow["place"]);?> <br>
                                      <?php echo "<span  class='text-info'>Time: </span>". $prow["time"];?> <br>
                                      <?php echo "<span  class='text-info'>About event: </span>". $prow["details"];?> </h6> 

                                  

                                  <p>
                                </div>
                            </div>
                        
                      </div>
                       
                   <?php //} 
                   }?>
                   
              </div><!--end product row-->
              <!--End products-->
               <!-- start product button control-->
               <div class="button-control">
                  <ul class="list-unstyled">
                      <li id="1" class="active"> 1 </li>
                      <li id="2"> 2 </li>
                      <li id="3"> 3 </li>
                      <li id="4"> 4 </li>
                      <li class="button">Next</li>
                  </ul>
                </div>
            <!-- End product button control-->
          </div>
      </section>
      <!--End section proudect-->

      <!--start section events-->
     
      <!--End section events-->

     
    <?php include_once "footer.php"; ?>