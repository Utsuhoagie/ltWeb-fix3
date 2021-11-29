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
if (is_submit('delete_car')) {
    // Lấy ID và ép kiểu
    $id = input_post('id');
    $sql = "DELETE FROM car where id = '$id'";
    db_execute($sql);
    redirect(base_url('admin/manage-car.php'));
}
if (is_submit('edit_car')) {
    $id = input_post('id');

    $name = input_post('name');
    $brand = input_post('brand');
    $year = input_post('year');
    $seats = input_post('seats');
    $color = input_post('color');
    $engine = input_post('engine');
    $price = input_post('price');
    $description = input_post('description');
    /*$sql = "UPDATE car SET name='$name', brand='$brand', year='$year', 
    seats='$seats', color='$color', engine='$engine', price='$price', 
    description='$description' WHERE id='$id'";*/
    // Upload image

    $target_dir = "../../img/car/";
    $carImageName1 = time() . '-' . $_FILES["carImage1$id"]["name"];
    $target_file1 = $target_dir . basename($carImageName1);
    $photo_tmp_name1 = $_FILES["carImage1$id"]["tmp_name"];
    $photo_size1 = $_FILES["carImage1$id"]["size"];
    $photo_new_name1 = rand() . $carImageName1;

    $carImageName2 = time() . '-' . $_FILES["carImage2$id"]["name"];
    $target_file2 = $target_dir . basename($carImageName2);
    $photo_tmp_name2 = $_FILES["carImage2$id"]["tmp_name"];
    $photo_size2 = $_FILES["carImage2$id"]["size"];
    $photo_new_name2 = rand() . $carImageName2;

    $carImageName3 = time() . '-' . $_FILES["carImage3$id"]["name"];
    $target_file3 = $target_dir . basename($carImageName3);
    $photo_tmp_name3 = $_FILES["carImage3$id"]["tmp_name"];
    $photo_size3 = $_FILES["carImage3$id"]["size"];
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
        $sql = "UPDATE car SET name='$name', brand='$brand', year='$year', 
        seats='$seats', color='$color', engine='$engine', price='$price', 
        description='$description', car_img1='$carImageName1', car_img2='$carImageName2', car_img3='$carImageName3' WHERE id='$id'";
    }
    db_execute($sql);
    redirect(base_url('admin/manage-car.php'));
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery.js"></script>
    <title> | Manage Subadmins</title>
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


</head>


<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <?php include('includes/topheader.php'); ?>

        <!-- ========== Left Sidebar Start ========== -->
        <?php include('includes/leftsidebar.php'); ?>
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">


                    <div class="row">
                        <div class="col-xs-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Manage Car</h4>
                                <ol class="breadcrumb p-0 m-0">

                                    <li>
                                        <a href="#">Car </a>
                                    </li>
                                    <li class="active">
                                        Manage Car
                                    </li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="demo-box m-t-20">
                                <div class="m-b-30">
                                
                                </div>

                                <div class="table-responsive">
                                    <table class="table text-nowrap">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">Name</th>
                                                <th class="border-top-0">Brand</th>
                                                <th class="border-top-0">Price</th>
                                                <th class="border-top-0">Design</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($car as $item) { ?>
                                                <tr>
                                                    <td><?php echo $item['name']; ?></td>
                                                    <td><?php echo $item['brand']; ?></td>
                                                    <td><?php echo $item['price']; ?></td>
                                                    <td>
                                                        <div class="box1">
                                                            <div class="box2">
                                                                <div class="box3">
                                                                    <?php
                                                                    if (empty($item['car_img1'])) :
                                                                    ?>
                                                                        <img class="carImg" src="../../img/car/default.png" alt="car">
                                                                    <?php else : ?>
                                                                        <img class="carImg" src="<?php echo "../../img/car/" . $item['car_img1'] ?>" alt="car">
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <form method="POST" class="form-delete" action="">
                                                                        <input type="hidden" name="id" value="<?php echo $item['id']; ?>" />
                                                                        <input type="hidden" name="request_name" value="delete_car" />
                                                                        <button class="btn btn-danger">Delete</button>
                                                                    </form>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#model<?php echo $item['id']; ?>">Detail & Edit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- ============================================================== -->
                                                        <!-- JS FOR EACH CAR -->
                                                        <!-- ============================================================== -->
                                                        <script>
                                                            function triggerClick1<?php echo $item['id']; ?>() {
                                                                document.querySelector('#carImage1<?php echo $item['id']; ?>').click();
                                                            }

                                                            function displayImage1<?php echo $item['id']; ?>(e) {
                                                                if (e.files[0]) {
                                                                    var reader = new FileReader();

                                                                    reader.onload = function(e) {
                                                                        document.querySelector('#carDisplay1<?php echo $item['id']; ?>').setAttribute('src', e.target.result);
                                                                    }

                                                                    reader.readAsDataURL(e.files[0]);
                                                                }
                                                            }

                                                            function triggerClick2<?php echo $item['id']; ?>() {
                                                                document.querySelector('#carImage2<?php echo $item['id']; ?>').click();
                                                            }

                                                            function displayImage2<?php echo $item['id']; ?>(e) {
                                                                if (e.files[0]) {
                                                                    var reader = new FileReader();

                                                                    reader.onload = function(e) {
                                                                        document.querySelector('#carDisplay2<?php echo $item['id']; ?>').setAttribute('src', e.target.result);
                                                                    }

                                                                    reader.readAsDataURL(e.files[0]);
                                                                }
                                                            }

                                                            function triggerClick3<?php echo $item['id']; ?>() {
                                                                document.querySelector('#carImage3<?php echo $item['id']; ?>').click();
                                                            }

                                                            function displayImage3<?php echo $item['id']; ?>(e) {
                                                                if (e.files[0]) {
                                                                    var reader = new FileReader();

                                                                    reader.onload = function(e) {
                                                                        document.querySelector('#carDisplay3<?php echo $item['id']; ?>').setAttribute('src', e.target.result);
                                                                    }

                                                                    reader.readAsDataURL(e.files[0]);
                                                                }
                                                            }
                                                        </script>
                                                        <!-- ============================================================== -->
                                                        <!-- EDIT MODEL -->
                                                        <!-- ============================================================== -->
                                                        <div class="modal fade" id="model<?php echo $item['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <legend class="text-center">CAR INFOMATION</legend>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="well well-sm">
                                                                            <!-- ============================================================== -->
                                                                            <!-- FORM PLACE -->
                                                                            <!-- ============================================================== -->
                                                                            <form class="" action="" method="post" enctype="multipart/form-data">
                                                                                <div class="form-row">
                                                                                    <div class="form-group">
                                                                                        <div class="col-md-12">
                                                                                            <div class="row">

                                                                                                <input type="hidden" name="id" value="<?php echo $item['id']; ?>" />
                                                                                                <input type="hidden" name="request_name" value="edit_car" />
                                                                                                <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" id="name" name="name" value="<?php echo $item['name']; ?>" required></div>
                                                                                                <div class="col-md-6"><label class="labels">Brand</label><input type="text" class="form-control" id="brand" name="brand" value="<?php echo $item['brand']; ?>" required></div>

                                                                                                <div class="col-md-6"><label class="labels">Year</label><input type="text" class="form-control" id="year" name="year" value="<?php echo $item['year']; ?>"></div>
                                                                                                <div class="col-md-6"><label class="labels">Seats</label><input type="text" class="form-control" id="seats" name="seats" value="<?php echo $item['seats']; ?>" required></div>

                                                                                                <div class="col-md-6"><label class="labels">Color</label><input type="text" class="form-control" id="color" name="color" value="<?php echo $item['color']; ?>" required></div>
                                                                                                <div class="col-md-6"><label class="labels">Engine</label><input type="text" class="form-control" id="engine" name="engine" value="<?php echo $item['engine']; ?>" required></div>

                                                                                                <div class="col-md-6"><label class="labels">Price</label><input type="text" class="form-control" id="price" name="price" value="<?php echo $item['price']; ?>" required></div>
                                                                                                <div class="col-md-12"><label class="labels">Description</label><input type="text" class="form-control" id="description" name="description" value="<?php echo $item['description']; ?>" required></div>
                                                                                                <!-- Upload image -->
                                                                                                <div class="box1">
                                                                                                    <div class="box2">
                                                                                                        <div class="box3">
                                                                                                            <div class="text-center img-placeholder" onClick="triggerClick1<?php echo $item['id']; ?>()">
                                                                                                                <h4>Update image</h4>
                                                                                                            </div>
                                                                                                            <?php

                                                                                                            if (empty($item['car_img1'])) :

                                                                                                            ?>
                                                                                                                <img class="carImg" src="../../img/car/default.png" onClick="triggerClick1<?php echo $item['id']; ?>()" id="carDisplay1<?php echo $item['id']; ?>">
                                                                                                            <?php else : ?>
                                                                                                                <img class="carImg" src="<?php echo '../../img/car/' . $item['car_img1'] ?>" alt="avatar" onClick="triggerClick1<?php echo $item['id']; ?>()" id="carDisplay1<?php echo $item['id']; ?>">
                                                                                                            <?php endif; ?>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <input type="file" accept=".jpg,.jpeg,.png" name="carImage1<?php echo $item['id']; ?>" onChange="displayImage1<?php echo $item['id']; ?>(this)" id="carImage1<?php echo $item['id']; ?>" class="form-control" style="display: none;">

                                                                                                </div>
                                                                                                <!-- End upload image -->
                                                                                                <!-- Upload image -->
                                                                                                <div class="box1">
                                                                                                    <div class="box2">
                                                                                                        <div class="box3">
                                                                                                            <div class="text-center img-placeholder" onClick="triggerClick2<?php echo $item['id']; ?>()">
                                                                                                                <h4>Update image</h4>
                                                                                                            </div>
                                                                                                            <?php

                                                                                                            if (empty($item['car_img2'])) :

                                                                                                            ?>
                                                                                                                <img class="carImg" src="../../img/car/default.png" onClick="triggerClick2<?php echo $item['id']; ?>()" id="carDisplay2<?php echo $item['id']; ?>">
                                                                                                            <?php else : ?>
                                                                                                                <img class="carImg" src="<?php echo '../../img/car/' . $item['car_img2'] ?>" alt="avatar" onClick="triggerClick2<?php echo $item['id']; ?>()" id="carDisplay2<?php echo $item['id']; ?>">
                                                                                                            <?php endif; ?>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <input type="file" accept=".jpg,.jpeg,.png" name="carImage2<?php echo $item['id']; ?>" onChange="displayImage2<?php echo $item['id']; ?>(this)" id="carImage2<?php echo $item['id']; ?>" class="form-control" style="display: none;">

                                                                                                </div>
                                                                                                <!-- End upload image -->
                                                                                                <!-- Upload image -->
                                                                                                <div class="box1">
                                                                                                    <div class="box2">
                                                                                                        <div class="box3">
                                                                                                            <div class="text-center img-placeholder" onClick="triggerClick3<?php echo $item['id']; ?>()">
                                                                                                                <h4>Update image</h4>
                                                                                                            </div>
                                                                                                            <?php

                                                                                                            if (empty($item['car_img3'])) :

                                                                                                            ?>
                                                                                                                <img class="carImg" src="../../img/car/default.png" onClick="triggerClick3<?php echo $item['id']; ?>()" id="carDisplay3<?php echo $item['id']; ?>">
                                                                                                            <?php else : ?>
                                                                                                                <img class="carImg" src="<?php echo '../../img/car/' . $item['car_img3'] ?>" alt="avatar" onClick="triggerClick3<?php echo $item['id']; ?>()" id="carDisplay3<?php echo $item['id']; ?>">
                                                                                                            <?php endif; ?>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <input type="file" accept=".jpg,.jpeg,.png" name="carImage3<?php echo $item['id']; ?>" onChange="displayImage3<?php echo $item['id']; ?>(this)" id="carImage3<?php echo $item['id']; ?>" class="form-control" style="display: none;">

                                                                                                </div>
                                                                                                <!-- End upload image -->

                                                                                            </div>

                                                                                            <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" name="submit">Save</button></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- ============================================================== -->
                                                        <!-- END EDIT MODEL -->
                                                        <!-- ============================================================== -->
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>




                            </div>

                        </div>


                    </div>
                    <!--- end row -->






                </div> <!-- container -->

            </div> <!-- content -->
            <?php include('includes/footer.php'); ?>
        </div>

    </div>
    <!-- END wrapper -->



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