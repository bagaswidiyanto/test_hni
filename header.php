<?php
include_once('koneksi.php');
session_start();
if (!isset($_SESSION['login'])) {
    header('location:login.php');
}

function tgl($tanggal)
{
    $bulan_arr    = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    // $hari_arr     = ['', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

    $ex           = explode('-', $tanggal);
    $hari         = date('N', strtotime($tanggal));
    $tanggal_indo = $ex[2] . ' ' . $bulan_arr[(int)$ex[1]] . ' ' . $ex[0];

    return $tanggal_indo;
}

//membuat format rupiah dengan PHP
//tutorial www.malasngoding.com

function rupiah($angka)
{

    $hasil_rupiah = "" . number_format($angka, 0, '', '.');
    return $hasil_rupiah;
}

function rp($angka)
{

    $hasil_rupiah = "Rp. " . number_format($angka, 0, '', '.');
    return $hasil_rupiah;
}

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ThemeKit - Admin Template</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="favicon.ico" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/icon-kit/dist/css/iconkit.min.css">
    <link rel="stylesheet" href="plugins/ionicons/dist/css/ionicons.min.css">
    <link rel="stylesheet" href="plugins/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="plugins/weather-icons/css/weather-icons.min.css">
    <link rel="stylesheet" href="plugins/c3/c3.min.css">
    <link rel="stylesheet" href="plugins/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="plugins/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="dist/css/theme.min.css">
    <script src="src/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="js/Chart.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="wrapper">
        <div class="page-wrap">
            <div class="app-sidebar colored">
                <div class="sidebar-header">
                    <h4 style="color: white;"><?= $_SESSION['nama']; ?></h4>
                </div>

                <div class="sidebar-content">
                    <div class="nav-container">
                        <nav id="main-menu-navigation" class="navigation-main">
                            <?php
                            if ($menu == 'barang') {
                                $barang       = 'active';
                                $text_barang  = 'text-danger';
                            } elseif ($menu == 'transaksi') {
                                $transaksi      = 'active';
                                $text_transaksi = 'text-danger';
                            } elseif ($menu == 'logout') {
                                $logout      = 'active';
                                $text_logout = 'text-danger';
                            }
                            ?>
                            <div class="nav-item <?= $barang; ?>">
                                <a href="barang.php" class="<?= $text_barang; ?>"><i class="ik ik-bar-chart-2 <?= $text_barang; ?>"></i><span>Barang</span></a>
                            </div>
                            <div class="nav-item <?= $transaksi; ?>">
                                <a href="transaksi.php" class="<?= $text_transaksi; ?>"><i class="ik ik-bar-chart-2 <?= $text_transaksi; ?>"></i><span>Transaksi</span></a>
                            </div>

                            <div class="nav-item <?= $logout; ?>">
                                <a href="logout.php" class="<?= $text_logout; ?>" onclick="return confirm('Apakah anda ingin logout ?');"><i class="ik ik-menu <?= $text_logout; ?>"></i><span>Logout</span> </a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>