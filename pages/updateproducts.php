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
                                    include_once "product_class.php";
                                    $p = new Products();
                                    $p->setid($_GET['id']);
                                    $result = $p->GetByID();
                                    if ($row = mysqli_fetch_assoc($result)) {
                                    ?>


                                        <h1 class="username">Product Data</h1>
                                        <div>

                                            <tr>
                                                <td>
                                                    <h6>Product Name</h6>
                                                </td>
                                                <td>
                                                    <h5><input class="form-control" type="text" name="pname" value="<?php echo ($row["pname"]); ?>"></h5>
                                                </td>
                                            </tr>
                                        </div>
                                        <div class="name">
                                            <tr>
                                                <td>
                                                    <h6>Price</h6>
                                                </td>
                                                <td>
                                                    <h5><input type="text" name="price" value="<?php echo ($row["price"]); ?>"></h5>
                                                </td>
                                            </tr>

                                        </div>
                                        <div class="name">
                                            <tr>
                                                <td>
                                                    <h6>Description</h6>
                                                </td>
                                                <td>
                                                    <h5><textarea name="desc" rows="4" cols="50"> <?php echo ($row["description"]); ?></textarea></h5>
                                                </td>
                                            </tr>
                                        </div>
                                        <div class="name">
                                            <tr>
                                                <td>
                                                    <h6>Production Date</h6>
                                                </td>
                                                <td>
                                                    <h5><input type="text" name="prodate" value="<?php echo ($row["productionDate"]); ?>"> </h5>
                                                </td>
                                            </tr>
                                        </div>
                                        <div class="name">
                                            <tr>
                                                <td>
                                                    <h6>Concentration</h6>
                                                </td>
                                                <td>
                                                    <h5><input type="text" name="conc" value="<?php echo ($row["concentration"]); ?>"> </h5>
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

        include_once "product_class.php";
        $pro = new Products();
        $pro->setid($_GET['id']);
        $pro->setpname($_POST['pname']);
        $pro->setprice($_POST['price']);
        $pro->setdescription($_POST['desc']);
        $pro->setprod_date($_POST['prodate']);
        $pro->setconcentration($_POST['conc']);
        $ms = $pro->Update();
        if ($ms == "ok") {
            $dir = "product/";
            $image = $_FILES['file']['name'];
            $temp_name = $_FILES['file']['tmp_name'];
            $img = $_GET['id'];
            if ($image != "") {
                $fdir = $dir . $img . ".jpg";
                move_uploaded_file($temp_name, $fdir);
            }
            echo ("<div class='alert alert-success'> The Product has been updated successfully</div>");

            echo ("<script> window.open ('myproducts.php','_self')</script> ");
        } else
            echo ("<div class ='alert alert-danger'>$ms</div>");
    }
    ?>


    <?php include_once "footer.php"; ?>
</body>

</html>