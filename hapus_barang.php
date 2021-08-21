<?php
// get id anggota untuk proses hapus
include "koneksi.php";
$hapus = mysqli_query($konek, "DELETE FROM barang WHERE id_barang='$_GET[id_barang]'");

header('location:barang.php?hapus=berhasil');
