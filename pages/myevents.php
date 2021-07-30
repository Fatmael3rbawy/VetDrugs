<?php
ob_start();
session_start();
include_once "HeaderAfter.php";
?>



<!--start product header-->
<div class="product-header">

</div>
<!-- End product header-->

<!--start section product-->
<section class="event-home">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="product_header text-center">

                <h2>My Events</h2>
            </div>

        </div>
        <?php
        if (isset($_POST["btnyes"])) {
            include_once "event_class.php";
            $event = new Events();
            $event->setid($_POST["btnval"]);
            $msg = $event->Delete();
            if ($msg == "ok") {
                $dir = "event/";
                $img = $_POST['btnval'];
                $fdir = $dir . $img . ".jpg";
                if (is_file($fdir))
                    unlink($fdir);

                echo ("<div class='alert alert-success'> The Event has been deleted successfully</div>");
            } else
                echo ("<div class='alert alert-danger'> " . $msg . "</div>");
        }

        ?>

        <!--start products-->
        <center>
            <div class="row">
                <div class="table-responsive-sm">

                    <table class="table table-border table-striped" style="margin:25px;width:85%">
                        <tr>
                            <th>Event No </th>
                            <th>Event Name</th>
                            <th>Image </th>
                            <th>Location </th>
                            <th>Time </th>
                            <th>Details </th>
                            <th>Manage </th>

                        </tr>

                        <?php
                        include_once "event_class.php";
                        $E = new Events();
                        $result = $E->GetfromView();
                        while ($row = mysqli_fetch_assoc($result)) {

                        ?>
                            <tr>
                                <td><?php echo ($row["event_id"]); ?></td>
                                <td><?php echo ($row["event_name"]); ?></td>
                                <td> <img src="event/<?php echo ($row["event_id"]); ?>.jpg" class="rounded" class="float-left" width='85px' /></td>
                                <td><?php echo ($row["place"]); ?></td>
                                <td><?php echo ($row["time"]); ?></td>
                                <td><?php echo ($row["details"]); ?></td>
                               
                                <div class="controle-button">
                                    <td><a href="updateEvent.php?id=<?php echo ($row["event_id"]); ?>" class="btn btn-outline-warning" style="margin:5px">Update </a>

                                        <!-- <button type="button"name="delete" class="btn btn-outline-danger"style="margin:5px" >Delete</button>  -->
                                        <button onclick="deleteEvent(<?php echo $row['event_id']; ?>);" data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-danger" style="margin:5px">Delete </button> </td>

                                </div>
                            </tr>


                        <?php } ?>
                    </table>
                </div>
                <div>
                    <a href="Addevent.php" style="padding:5px;width:250px ;height:40px" class="btn btn-info">Add New Event </a>
                </div>
        </center>
    </div>
    </div>
</section>

<!-- /////////////////// -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Delete events</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">

                    <div class="form-group alert alert-danger">
                        Are you sure delete this event ?

                    </div>
                    <div class="right-w3l">
                        <input type="hidden" id="delbtn" name="btnval" value="">
                        <input type="submit" style="width:200px" class="btn btn-danger" value="Yes" name="btnyes">
                        <a href="myevents.php" style="width:200px" class="btn btn-success">
                            No </a>
                    </div>



                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function deleteEvent(id) {
        $('#delbtn').attr('value', id);

    }
</script>
<?php include_once "footer.php"; ?>