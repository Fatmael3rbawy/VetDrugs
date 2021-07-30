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
                            <form action="" validate method="POST" enctype="multipart/form-data">
                                <table class="table table-border table-striped" style="margin:25px;width:75%">

                                    <h1 class="username">Add New Event </h1>
                                    <div>

                                        <tr>
                                            <td>
                                                <h6>Event Name</h6>
                                            </td>
                                            <td>
                                                <h5><input class="form-control" type="text" name="name" required placeholder="Enter the event name" style="width:500px " ></h5>
                                            </td>
                                        </tr>
                                    </div>
                                    <div class="name">
                                        <tr>
                                            <td>
                                                <h6>Location</h6>
                                            </td>
                                            <td>
                                                <h5><input class="form-control" type="text" name="place" required placeholder="Enter the event price"  style="width:500px "></h5>
                                            </td>
                                        </tr>

                                    </div>
                                    <div class="name">
                                        <tr>
                                            <td>
                                                <h6>Details</h6>
                                            </td>
                                            <td>
                                                <h5><textarea class="form-control" name="desc" rows="4" cols="50"> </textarea></h5>
                                            </td>
                                        </tr>
                                    </div>
                                    <div class="name">
                                        <tr>
                                            <td>
                                                <h6>Event Time </h6>
                                            </td>
                                            <td>
                                                <h5><input class="form-control" type="text" name="time" required placeholder="Enter the event time" style="width:500px "> </h5>
                                            </td>
                                        </tr>
                                    </div>
                                   
                                    <tr>
                                        <td> Upload Product Image </td>
                                        <td><input type="file" name="file" class="form-control-file border"  required style="width:500px "/> </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            <div class="submit">
                                                <input style="padding:5px;width:350px ;height:40px" class="btn btn-info" type="submit" name="btnadd" value="ADD"></div>
                                        </td>
                                    </tr>
                                    <?php
                                    if (isset($_POST['btnadd'])) {

                                        include_once "event_class.php";
                                        $event = new Events();
                                        $event->setname($_POST['name']);
                                        $event->setplace($_POST['place']);
                                        $event->setdetails($_POST['desc']);
                                        $event->settime($_POST['time']);
                                        $ms = $event->Add();
                                        
                                        if ($ms == "ok") {
                                            $last_id=$event->GetLasstID();
                                            $dir = "event/";
                                            $image = $_FILES['file']['name'];
                                            $temp_name = $_FILES['file']['tmp_name'];
                                            $img =  $last_id;
                                            if ($image != "") {
                                                $fdir = $dir . $img . ".jpg";
                                                move_uploaded_file($temp_name, $fdir);
                                            }
                                            echo ("<div class='alert alert-success'> The Event has been added successfully</div>");

                                            echo ("<script> window.open ('myevents.php','_self')</script> ");
                                        } else
                                            echo ("<div class ='alert alert-danger'>$ms</div>");
                                    }
                                    ?>

                                </table>
                            </form>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php include_once "footer.php"; ?>
</body>

</html>