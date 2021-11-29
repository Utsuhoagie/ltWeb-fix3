<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact Us - Carworld</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery.js"></script>

    <link rel="stylesheet" href="css/navbar.css">

    <script>
        function contact() {
            $('form').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    type: 'post',
                    url: 'php_be/insertContact.php',
                    data: $(this).serialize(),
                    success: function (strData) {
                        alert(strData)
                    }
                });

            });

        }
    </script>
</head>

<body>

    <?php include "includes/navbar.php" ?>

    <div class="container-fluid">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active" id="slide1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>PHONG CÁCH</h5>
                    </div>
                </div>
                <div class="carousel-item" id="slide2">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>HIỆN ĐẠI</h5>
                    </div>
                </div>
                <div class="carousel-item" id="slide3">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>BỀN BỈ</h5>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="row text-center mb-3" style="margin-top:90px;">
            <div class="col-md-12">
                <h2>POPULAR PRODUCT</h2>
                <hr>
            </div>
        </div>

        <div class="row" style="margin-top:90px;align-items:center;">
            <div class="col">
                <div class="card">
                    <div class="card-img">
                        <img id="showImg1" src="img/Hung/img1.jpg" style="width:100%">
                    </div>
                    <div class="card-body">
                        <h5>Renault KWID</h5>
                        <h4 class="pt-1 pb-2">Rs. 5.44-6.77 Lac</h4>

                        <button type="button" class="btn btn-outline-danger btn-block btn-sm">Lets Judge
                            it.</button>
                    </div>
                </div>
            </div>

            <!-- The Modal -->
            <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="showImg11">
            </div>


            <div class="col">
                <div class="card">
                    <div class="card-img">
                        <img src="img/Hung/img1.jpg" style="width:100%">
                    </div>
                    <div class="card-body">
                        <h5>Renault KWID</h5>
                        <h4 class="pt-1 pb-2">Rs. 5.44-6.77 Lac</h4>

                        <button type="button" class="btn btn-outline-danger btn-block btn-sm">Lets Judge
                            it.</button>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-img">
                        <img src="img/Hung/img1.jpg" style="width:100%">
                    </div>
                    <div class="card-body">
                        <h5>Renault KWID</h5>
                        <h4 class="pt-1 pb-2">Rs. 5.44-6.77 Lac</h4>

                        <button type="button" class="btn btn-outline-danger btn-block btn-sm">Lets Judge
                            it.</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="contact" style="margin-top:90px;">
            <!-- Hover #2 -->
            <button type="button" class="btn btn-outline-light" id="btn_contact" data-toggle="modal"
                data-target="#exampleModalCenter">
                <H2>Contact Us</H2>
            </button>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <legend class="text-center">Contact us</legend>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="well well-sm">
                            <form class="form-horizontal">
                                <fieldset>
                                    <!-- Name input-->
                                    <div class="form-group">
                                        <label class="col-md-6 control-label" for="name">Name</label>
                                        <div class="col">
                                            <input id="name" name="name" type="text" placeholder="Your name"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <!-- Email input-->
                                    <div class="form-group">
                                        <label class="col-md-6 control-label" for="email">Your E-mail</label>
                                        <div class="col">
                                            <input id="email" name="email" type="text" placeholder="Your email"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <!-- Message body -->
                                    <div class="form-group">
                                        <label class="col-md-6 control-label" for="mess">Your message</label>
                                        <div class="col">
                                            <textarea class="form-control" id="mess" name="mess"
                                                placeholder="Please enter your message here..." rows="5"></textarea>
                                        </div>
                                    </div>

                                    <!-- Form actions -->
                                    <div class="form-group">
                                        <div class="col-md-12 text-right">
                                            <button type="submit" class="btn btn-primary btn-lg"
                                                onclick=contact()>Submit</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>


    </div>
    </div>
    <!-- Footer -->
    <footer class="text-center text-lg-start bg-light text-muted">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
                <span>Get connected with us on social networks:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-github"></i>
                </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>Company name
                        </h6>
                        <p>
                            Here you can use rows and columns to organize your footer content. Lorem ipsum
                            dolor sit amet, consectetur adipisicing elit.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Products
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Angular</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">React</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Vue</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Laravel</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Useful links
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Pricing</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Settings</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Orders</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Help</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Contact
                        </h6>
                        <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            info@example.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                        <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2021 Copyright:
            <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
</body>

</html>