<?php
ob_start();
session_start();
include_once "HeaderAfter.php";
if (!isset($_GET['id'])) {
    echo ("<script> window.open ('myproducts.php','_self')</script>");
}
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
                                    <?php
                                    include_once "event_class.php";
                                    $E = new Events();
                                    $E->setid($_GET['id']);
                                    $result = $E->GetByID();
                                    if ($row = mysqli_fetch_assoc($result)) {
                                    ?>


                                        <h1 class="username">Event Data</h1>
                                        <div>

                                            <tr>
                                                <td>
                                                    <h6>Event Name</h6>
                                                </td>
                                                <td>
                                                    <h5><input class="form-control" type="text" name="Ename" value="<?php echo ($row["event_name"]); ?>"></h5>
                                                </td>
                                            </tr>
                                        </div>
                                        <div class="name">
                                            <tr>
                                                <td>
                                                    <h6>Location</h6>
                                                </td>
                                                <td>
                                                    <h5><input type="text" name="place" value="<?php echo ($row["place"]); ?>"></h5>
                                                </td>
                                            </tr>

                                        </div>
                                        <div class="name">
                                            <tr>
                                                <td>
                                                    <h6>Details</h6>
                                                </td>
                                                <td>
                                                    <h5><textarea name="desc" rows="4" cols="50"> <?php echo ($row["details"]); ?></textarea></h5>
                                                </td>
                                            </tr>
                                        </div>
                                        <div class="name">
                                            <tr>
                                                <td>
                                                    <h6>Event Time</h6>
                                                </td>
                                                <td>
                                                    <h5><input type="text" name="time" value="<?php echo ($row["time"]); ?>"> </h5>
                                                </td>
                                            </tr>
                                        </div>
                                        
                                        <tr>
                                            <td> Upload Product Image </td>
                                            <td><input type="file" name="file" class="form-control-file border" /> </td>
                                        </tr>


                                        <tr>
                                            <td>
                                                <div class="submit">
                                                    <input style="padding:5px;width:250px ;height:40px" class="btn btn-info" type="submit" name="btnsave" value="Update"></div>
                                            </td>
                                        </tr>

                                    <?php } ?>
                                </table>
                            </form>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    if (isset($_POST['btnsave'])) {

        include_once "event_class.php";
        $event = new Events();
        $event->setid($_GET['id']);
        $event->setname($_POST['Ename']);
        $event->setplace($_POST['place']);
        $event->setdetails($_POST['desc']);
        $event->settime($_POST['time']);
        $ms = $event->Update();
        if ($ms == "ok") {
            $dir = "event/";
            $image = $_FILES['file']['name'];
            $temp_name = $_FILES['file']['tmp_name'];
            $img = $_GET['id'];
            if ($image != "") {
                $fdir = $dir . $img . ".jpg";
                move_uploaded_file($temp_name, $fdir);
            }
            echo ("<div class='alert alert-success'> The event has been updated successfully</div>");

            echo ("<script> window.open ('myevents.php','_self')</script> ");
        } else
            echo ("<div class ='alert alert-danger'>$ms</div>");
    }
    ?>


    <?php include_once "footer.php"; ?>
</body>

</html>