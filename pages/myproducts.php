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
<section class="product-home">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="product_header text-center">

                <h2>My Products</h2>
            </div>

        </div>
        <?php
        if (isset($_POST["btnyes"])) {
            include_once "product_class.php";
            $pro = new Products();
            $pro->setid($_POST["btnval"]);
            $msg = $pro->Delete();
            if ($msg == "ok") {
                $dir = "products/";
                $img = $_POST['btnval'];
                $fdir = $dir . $img . ".jpg";
                if (is_file($fdir))
                    unlink($fdir);

                echo ("<div class='alert alert-success'> The Product has been deleted successfully</div>");
            } else
                echo ("<div class='alert alert-danger'> " . $msg . "</div>");
        }

        ?>

        <!--start products-->
        <center>
            <div >
                <div class="table-responsive-sm">

                    <table class="table table-border table-striped " style="padding:30; margin:25px;width:85%">
                        <tr>
                            <th>Product No </th>
                            <th>Product Name</th>
                            <th>Image </th>
                            <th>concentration </th>
                            <th>Price </th>
                            <th>Production Date </th>
                            <th>Description </th>
                            <th>Manage </th>

                        </tr>

                        <?php
                        include_once "product_class.php";
                        $p = new Products();
                        $result = $p->GetfromView();
                        while ($row = mysqli_fetch_assoc($result)) {

                        ?>
                            <tr>
                                <td><?php echo ($row["product_id"]); ?></td>
                                <td><?php echo ($row["pname"]); ?></td>
                                <td> <img src="Product/<?php echo ($row["product_id"]); ?>.jpg" class="rounded" class="float-left" width='85px' /></td>
                                <td><?php echo ($row["concentration"]); ?></td>
                                <td><?php echo ($row["price"]); ?></td>
                                <td><?php echo ($row["productionDate"]); ?></td>
                                <td><?php echo ($row["description"]); ?></td>
                                <div class="controle-button">
                                    <td><a href="updateproducts.php?id=<?php echo ($row["product_id"]); ?>" class="btn btn-outline-warning" style="margin:5px">Update </a>

                                        <!-- <button type="button"name="delete" class="btn btn-outline-danger"style="margin:5px" >Delete</button>  -->
                                        <button onclick="deletepro(<?php echo $row['product_id']; ?>);" data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-danger" style="margin:5px">Delete </button> </td>

                                </div>
                            </tr>


                        <?php } ?>
                    </table>
                </div>
               
        </center>
    </div>
    </div>
   <center><div >
                    <a href="Addproduct.php" style="padding:5px;width:250px ;height:40px"  class="btn btn-info">Add New Product </a>
                </div>
                </center>
</section>

<!-- /////////////////// -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Delete Products</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">

                    <div class="form-group alert alert-danger">
                        Are you sure delete this product ?

                    </div>
                    <div class="right-w3l">
                        <input type="hidden" id="delbtn" name="btnval" value="">
                        <input type="submit" style="width:200px" class="btn btn-danger" value="Yes" name="btnyes">
                        <a href="myproducts.php" style="width:200px" class="btn btn-success">
                            No </a>
                    </div>



                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function deletepro(id) {
        $('#delbtn').attr('value', id);

    }
</script>
<?php include_once "footer.php"; ?>