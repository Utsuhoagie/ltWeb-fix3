<?php
session_start();

include_once('../libs/session.php');
include_once('../libs/database.php');
include_once('../libs/role.php');
include_once('../libs/helper.php');
$sql = db_create_sql("SELECT * FROM car");
$car = db_get_list($sql);
$msg = "";
$msg_class = "";


// Code for Add New Sub Admi
if (isset($_POST['submit'])) {
    $name = input_post('name');
    $brand = input_post('brand');
    $year = input_post('year');
    $seats = input_post('seats');
    $color = input_post('color');
    $engine = input_post('engine');
    $price = input_post('price');
    $trasmission = input_post('trasmission');
    $warranty = input_post('warranty');
    $description = input_post('description');

    $target_dir = "../../img/car/";
    $carImageName1 = time() . '-' . $_FILES["carImage1add"]["name"];
    $target_file1 = $target_dir . basename($carImageName1);
    $photo_tmp_name1 = $_FILES["carImage1add"]["tmp_name"];
    $photo_size1 = $_FILES["carImage1add"]["size"];
    $photo_new_name1 = rand() . $carImageName1;

    $carImageName2 = time() . '-' . $_FILES["carImage2add"]["name"];
    $target_file2 = $target_dir . basename($carImageName2);
    $photo_tmp_name2 = $_FILES["carImage2add"]["tmp_name"];
    $photo_size2 = $_FILES["carImage2add"]["size"];
    $photo_new_name2 = rand() . $carImageName2;

    $carImageName3 = time() . '-' . $_FILES["carImage3add"]["name"];
    $target_file3 = $target_dir . basename($carImageName3);
    $photo_tmp_name3 = $_FILES["carImage3add"]["tmp_name"];
    $photo_size3 = $_FILES["carImage3add"]["size"];
    $photo_new_name3 = rand() . $carImageName3;
    if (!preg_match("/\\.(gif|jpg|png)$/i", $carImageName1)) {
        $msg = "Your image file was not jpg, gif or png type";
        $msg_class = "alert-danger";
        exit();
    } else if (!preg_match("/\\.(gif|jpg|png)$/i", $carImageName2)) {
        $msg = "Your image file was not jpg, gif or png type";
        $msg_class = "alert-danger";
        exit();
    } else if (!preg_match("/\\.(gif|jpg|png)$/i", $carImageName3)) {
        $msg = "Your image file was not jpg, gif or png type";
        $msg_class = "alert-danger";
        exit();
    } else if (move_uploaded_file($photo_tmp_name1, $target_file1) and move_uploaded_file($photo_tmp_name2, $target_file2) and move_uploaded_file($photo_tmp_name3, $target_file3)) {
        $sql = "INSERT INTO car (name,brand,year,seats,color,transmission,engine,price,warranty,description,car_img1,car_img2,car_img3)
    VALUES ('$name','$brand','$year','$seats','$color','$trasmission','$engine','$price','$warranty','$description','$carImageName1','$carImageName2','$carImageName3')";;
    }
    db_execute($sql);
    redirect(base_url('admin/add-car.php'));
}


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <title>Newsportal | Add Car</title>

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
    <script src="assets/js/modernizr.min.js"></script>
    <link href="my/car.css" rel="stylesheet">
    <script type="text/javascript" src="my/car.js"></script>
    <script>
        function checkAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check_availability.php",
                data: 'username=' + $("#sadminusername").val(),
                type: "POST",
                success: function(data) {
                    $("#user-availability-status").html(data);
                    $("#loaderIcon").hide();
                },
                error: function() {}
            });
        }
    </script>
</head>


<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <?php include('includes/topheader.php'); ?>
        <!-- Top Bar End -->


        <!-- ========== Left Sidebar Start ========== -->
        <?php include('includes/leftsidebar.php'); ?>
        <!-- Left Sidebar End -->

        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">


                    <div class="row">
                        <div class="col-xs-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Add Car</h4>
                                <ol class="breadcrumb p-0 m-0">
                                    <li>
                                        <a href="#">Admin</a>
                                    </li>
                                    <li>
                                        <a href="#">Car </a>
                                    </li>
                                    <li class="active">
                                        Add Car
                                    </li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->


                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <h4 class="m-t-0 header-title"><b>Add Car </b></h4>
                                <hr />
                                <div class="row">
                                    <div class="col-md-6">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <input type="hidden" name="request_name" value="add_car" />
                                                            <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" id="name" name="name" value="" required></div>
                                                            <div class="col-md-6"><label class="labels">Brand</label><input type="text" class="form-control" id="brand" name="brand" value="" required></div>
                                                            <div class="col-md-6"><label class="labels">Year</label><input type="text" class="form-control" id="year" name="year" value=""></div>
                                                            <div class="col-md-6"><label class="labels">Seats</label><input type="text" class="form-control" id="seats" name="seats" value="" required></div>
                                                            <div class="col-md-6"><label class="labels">Color</label><input type="text" class="form-control" id="color" name="color" value="" required></div>
                                                            <div class="col-md-6"><label class="labels">Engine</label><input type="text" class="form-control" id="engine" name="engine" value="" required></div>
                                                            <div class="col-md-6"><label class="labels">Price</label><input type="text" class="form-control" id="price" name="price" value="" required></div>
                                                            <div class="col-md-6"><label class="labels">Warranty</label><input type="text" class="form-control" id="warranty" name="warranty" value="" required></div>
                                                            <div class="col-md-6"><label class="labels">Transmission</label><input type="text" class="form-control" id="transmission" name="transmission" value="" required></div>
                                                            <div class="col-md-12"><label class="labels">Description</label><input type="text" class="form-control" id="description" name="description" value="" required></div>
                                                            <!-- Upload image -->
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="box1">
                                                                <div class="box2">
                                                                    <div class="box3">
                                                                        <div class="text-center img-placeholder" onClick="triggerClick1add()">
                                                                            <h4>Update image</h4>
                                                                        </div>

                                                                        <img class="carImg" src="../../img/car/default.png" onClick="triggerClick1add()" id="carDisplay1add">

                                                                    </div>
                                                                </div>
                                                                <input type="file" accept=".jpg,.jpeg,.png" name="carImage1add" onChange="displayImage1add(this)" id="carImage1add" class="form-control" style="display: none;">

                                                            </div>
                                                            <!-- End upload image -->
                                                            <!-- Upload image -->
                                                            <div class="box1">
                                                                <div class="box2">
                                                                    <div class="box3">
                                                                        <div class="text-center img-placeholder" onClick="triggerClick2add()">
                                                                            <h4>Update image</h4>
                                                                        </div>

                                                                        <img class="carImg" src="../../img/car/default.png" onClick="triggerClick2add()" id="carDisplay2add">

                                                                    </div>
                                                                </div>
                                                                <input type="file" accept=".jpg,.jpeg,.png" name="carImage2add" onChange="displayImage2add(this)" id="carImage2add" class="form-control" style="display: none;">

                                                            </div>
                                                            <!-- End upload image -->
                                                            <!-- Upload image -->
                                                            <div class="box1">
                                                                <div class="box2">
                                                                    <div class="box3">
                                                                        <div class="text-center img-placeholder" onClick="triggerClick3add()">
                                                                            <h4>Update image</h4>
                                                                        </div>

                                                                        <img class="carImg" src="../../img/car/default.png" onClick="triggerClick3add()" id="carDisplay3add">

                                                                    </div>
                                                                </div>
                                                                <input type="file" accept=".jpg,.jpeg,.png" name="carImage3add" onChange="displayImage3add(this)" id="carImage3add" class="form-control" style="display: none;">

                                                            </div>
                                                            <!-- End upload image -->
                                                        </div>

                                                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" name="submit">Add Car</button></div>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>


                                </div>











                            </div>
                        </div>
                    </div>
                    <!-- end row -->


                </div> <!-- container -->

            </div> <!-- content -->

            <?php include('includes/footer.php'); ?>

        </div>
    </div>

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="../plugins/switchery/switchery.min.js"></script>

    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>

</body>

</html>