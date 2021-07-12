<?php
require_once "modal/connect.php";
$dt = new database();
$dt->connect();
// if (array_key_exists('add-to-cart', $_POST)) {
//     $id = $_POST["add-to-cart"];
//     header("location:add-cart.php?id=" . $id);
// }
session_start();
$is_authenticated = isset($_SESSION['isAuthenticated']) ? $_SESSION['isAuthenticated'] : false;
if ($is_authenticated) {
    $user = $_SESSION['user'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">

    <!-- Site Metas -->
    <title>Restaurant</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/style-index.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link id="changeable-colors" rel="stylesheet" href="css/colors/orange.css" />
    <script src="js/modernizer.js"></script>
    <!-- axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- <script src="js/bootstrap.min.js"></script> -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
</head>

<style>
    .fake {
        margin-left: 100px;
    }

    .ftco-section-reservation {
        clear: both;
    }
</style>

<body>
    <div id="site-header">
        <header id="header" class="header-block-top">
            <div class="container">
                <div class="row">
                    <div class="main-menu">
                        <!-- navbar -->
                        <nav class="navbar navbar-default" id="mainNav">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <span class="sr-only"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <!-- logo -->
                                <div class="logo">
                                    <a class="navbar-brand js-scroll-trigger logo-header" href="#">
                                        <img src="" alt="">
                                    </a>
                                </div>
                            </div>
                            <div id="navbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="active"><a href="#banner">Home</a></li>
                                    <li><a href="#about">About us</a></li>
                                    <li><a href="#menu">Menu</a></li>
                                    <li><a href="#our_team">Team</a></li>
                                    <li><a href="#product">Product</a></li>
                                    <li><a href="">Book Table</a></li>
                                    <li><a href="#footer">Contact us</a></li>

                                  
                                    <?php
                                    if ($is_authenticated) {
                                        echo '
                                        <li></li>
                                        <li><a href="modal/logout.php">' . $user["user_name"] . '</a></li>                                     
                                        ';
                                    } else {
                                        echo '
                                        <li><a data-toggle="modal" data-target="#login" >Login</a></li>
                                        <li><a data-toggle="modal" data-target="#register" >Register</a></li>
                                        ';
                                    }
                                    ?>

                                    <li> <a href="view-cart.php" class="btn wishlist"><i class="fa fa-shopping-cart"></i><span>(0)</span></a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <!-- div ảnh bìa -->
    <div id="banner" class="banner full-screen-mode parallax">
        <div class="container pr">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="banner-static">
                    <div class="banner-text">
                        <div class="banner-cell">
                            <!-- <h1>Enjoy with <span class="typer" id="some-id" data-delay="200" data-delim=":" data-words="Our Restaurant:Family:" data-colors="red"></span><span class="cursor" data-cursorDisplay="_" data-owner="some-id"></span></h1> -->
                            <h1>Restaurant </h1>
                            <p>Hãy tin tưởng lựa chọn điểm đến mỗi ngày để có một bữa ăn ấm áp nhé</p>
                            <div class="book-btn">
                                <a class="table-btn hvr-underline-from-center" type="submit" name="submit" data-toggle="modal" data-target="#modal_booking">BOOK MY TABLE </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Registeration Modal -->
    <div class="modal fade" id="register">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content form-wrapper">
                <div class="close-box" data-dismiss="modal">
                    <i class="fa fa-times fa-2x"></i>
                </div>
                <div class="container-fluid mt-5">
                    <form id="sign-up-form" enctype="multipart/form-data" action="Email/sendMail.php">
                        <div class="form-group text-center pb-2 ">
                            <h4>Registration Form</h4>
                        </div>
                        <div class="form-group col">
                            <label for="fullname"> Full Name</label>
                            <input type="text" name="fullname" class="form-control" placeholder="Thai Tran Hung Vuong" required>
                        </div>
                        <div class="form-group col">
                            <label for="username"> User name</label>
                            <input type="text" name="username" class="form-control" placeholder="Your username" required>
                        </div>
                        <div class="form-row mb-1">
                            <div class="form-group col">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Your password" autocomplete="new-password" required>
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="confirmpassword">Confirm Password</label>
                            <input type="password" name="confirmpassword" class="form-control" placeholder="Confirmpassword" autocomplete="new-password" required>
                        </div>
                        <div class="form-group col">
                            <label for="gender">Gender</label>
                            <select name="gender">
                                <option value="Male">Nam</option>
                                <option value="Female">Nữ</option>
                            </select>
                        </div>
                        <div class="form-group" style="position:relative;">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control mb-1" placeholder="Youremail@gmail.com" required>
                            <a href="#" data-toggle="modal" data-target="#login" style="display:none; position: absolute; right: 0; font-size: 12px;">That's you? Login</a>
                        </div>
                        <div class="form-group col">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="Your phonenumber" required>
                        </div>
                        <div class="form-group col">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" placeholder="Your address" required>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-info form-control" name="sendmailSignup" type="submit">Register</button>
                        </div>
                </div>
                <h6>OR Continue with</h6>
                <a href="#" onclick="switchAuthModal()">Login</a>
                </form>
            </div>
        </div>
    </div>

    <!-- Login Modal -->
    <div class="modal fade" id="login">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content form-wrapper">
                <div class="close-box" data-dismiss="modal">
                    <i class="fa fa-times fa-2x"></i>
                </div>
                <div class="container-fluid mt-5">
                    <form id="login-form" enctype="multipart/form-data">
                        <div class="form-group text-center">
                            <h4>Login Form</h4>
                            <h6>Enter your credentials</h6>
                        </div>
                        <div class="form-group" style="position: relative;">
                            <label for="user_name">Username</label>
                            <input type="text" name="username" class="form-control mb-1" placeholder="Your username" required>
                        </div>
                        <div class="form-group pb-3" style="position: relative;">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control mb-1" placeholder="Your password" required>
                            <a href="#forgotPassword" style="display:block; position: absolute; right: 0;" title="Fill Email Field and Click it">
                                Forgot Password?
                            </a>
                        </div>
                        <div class="form-group pt-2">
                            <button class="btn btn-info form-control">Login</button>
                        </div>
                        <h6>OR Continue with</h6>
                        <a href="#" onclick="switchAuthModal()">Sign up</a>
                        <div class="form-group text-center pt-2 social-login">
                            <a href="#" class="google"> <i class="fa fa-google-plus fa-lg"></i> </a>
                            <a href="#" class="facebook"> <i class="fa fa-facebook fa-lg"></i> </a>
                            <a href="#" class="twitter"> <i class="fa fa-twitter fa-lg"></i> </a>
                            <a href="#" class="github"> <i class="fa fa-github fa-lg"></i> </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

    <script>
        $(document).ready(function() {
            $('#login-form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: 'modal/login.php',
                    data: $(this).serialize(),
                    success: function(res) {
                        console.log(res)
                        if (res) {
                            const data = JSON.parse(res)
                            if (!data.isError) {
                                window.location.href = ""
                            } else {
                                alert(data.message);
                            }
                        } else {
                            alert('Something went wrong!')
                        }
                    }
                });
            });
            $('#sign-up-form').submit(function(e) {
                e.preventDefault();
                const formData = new FormData(this)
                console.log(formData)
                $.ajax({
                    type: "POST",
                    url: 'modal/signup.php',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        if (res) {
                            const data = JSON.parse(res)
                            if (!data.isError) {
                                window.location.href = ""
                            } else {
                                alert(data.message);
                            }
                        } else {
                            alert('Something went wrong sign up !')
                        }
                    }
                });
            });
        });
    </script>

    <script>
        function switchAuthModal() {
            var modalLogin = $('#login');
            var modalSignUp = document.getElementById("#register");
            $('#login').modal("toggle");
            $('#register').modal("toggle");
        }
    </script>

  
</body>

</html>