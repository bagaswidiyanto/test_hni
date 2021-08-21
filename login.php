<?php
session_start();
if (isset($_SESSION['login'])) {
    header('Location: barang.php');
}
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username  = $_POST['username'];
    $password  = $_POST['password'];
    $p         = md5($password);

    if ($username == "" || $p == "") {
        $error = true;
    } else {
        $data   = mysqli_query($konek, "SELECT * FROM user WHERE username ='" . $username . "' AND password = '" . $p . "'");
        $dt     = mysqli_num_rows($data);
        $dta    = mysqli_fetch_assoc($data);



        $_SESSION['login']          =    true;
        $_SESSION['username']       =    $dta['username'];
        $_SESSION['password']       =    $dta['password'];
        $_SESSION['nama']           =    $dta['nama'];

        echo "
          <script>
          document.location.href = 'barang.php';
          </script>
          ";
    }
}

?>





<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login KSP Cibinong</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="favicon.ico" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/ionicons/dist/css/ionicons.min.css">
    <link rel="stylesheet" href="plugins/icon-kit/dist/css/iconkit.min.css">
    <link rel="stylesheet" href="plugins/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="dist/css/theme.min.css">
    <script src="src/js/vendor/modernizr-2.8.3.min.js"></script>
    <style>
        #mybutton {
            position: relative;
            z-index: 1;
            left: 92%;
            top: -27px;
            cursor: pointer;
        }

        .myinput {
            width: 100%;
            padding: 5px;
        }
    </style>
</head>

<body>


    <div class="auth-wrapper">
        <div class="container-fluid h-100">
            <div class="row flex-row h-100 bg-white">
                <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                    <div class="lavalite-bg" style="background-image: url('img/auth/login-bg.jpg')">
                        <div class="lavalite-overlay"></div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-7 p-0" style="margin-top: 150px;">
                    <div class="authentication-form mx-auto mt-50">
                        <div class="text-center mt-50">
                            <!-- <a href="index.html"><img src="src/img/brand.svg" alt=""></a> -->
                        </div> <!-- <p>Happy to see you again!</p> -->
                        <form class="form" method="post" action="">
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" placeholder="Username" required="">
                                <i class="ik ik-user"></i>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" name="password" placeholder="Password" id="password" required="">
                                <i class="ik ik-lock"></i>
                            </div>
                            <?php if (isset($error)) : ?>
                                <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                    <strong class="text-red">username / password salah</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="ik ik-x"></i>
                                    </button>
                                </div>
                            <?php endif; ?>
                            <div class="sign-btn text-center">
                                <button class="btn btn-theme btn-lg" name="login">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="src/js/vendor/jquery-3.3.1.min.js"><\/script>')
    </script>
    <script src="plugins/popper.js/dist/umd/popper.min.js"></script>
    <script src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
    <script src="plugins/screenfull/dist/screenfull.js"></script>
    <script src="dist/js/theme.js"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        (function(b, o, i, l, e, r) {
            b.GoogleAnalyticsObject = l;
            b[l] || (b[l] =
                function() {
                    (b[l].q = b[l].q || []).push(arguments)
                });
            b[l].l = +new Date;
            e = o.createElement(i);
            r = o.getElementsByTagName(i)[0];
            e.src = 'https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e, r)
        }(window, document, 'script', 'ga'));
        ga('create', 'UA-XXXXX-X', 'auto');
        ga('send', 'pageview');
    </script>
</body>

</html>