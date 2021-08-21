<?php
//variabel koneksi
$konek = mysqli_connect("localhost", "root", "", "hni");

if (!$konek) {
    echo "Koneksi Database Gagal...!!!";
}
