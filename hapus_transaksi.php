<?php
// get id anggota untuk proses hapus
include "koneksi.php";
$hapus = mysqli_query($konek, "DELETE FROM transaksi WHERE id_transaksi='$_GET[id_transaksi]'");

header('location:transaksi.php?hapus=berhasil');
