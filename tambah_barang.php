<?php
$menu = 'barang';
include_once('header.php');
?>
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card bg-form-tambah-penarikan">
                            <div class="card-body">
                                <div class="row clearfix">
                                    <a href="barang.php" title="Kembali"><button type=" button" class="btn btn-danger btn-sm"><i class="ik ik-arrow-left"></i>&nbsp; Kembali</button></a>
                                </div>
                                <br>
                                <form method="post" action="" style="border: 4px">
                                    <div class="row">
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card">
                                                <div class="card-body shadow p-3 rounded">
                                                    <?php
                                                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                                                        $nama_barang    = $_POST['nama_barang'];
                                                        $harga          = $_POST['harga'];
                                                        $stok           = $_POST['stok'];


                                                        $simpan =  mysqli_query(
                                                            $konek,
                                                            "INSERT INTO `barang` (`nama_barang`, `harga`, `stok`)
                                                                VALUES ('$nama_barang', '$harga', '$stok')"
                                                        );


                                                        if ($simpan) {
                                                            echo "<script>document.location.href = 'barang.php?tambah=berhasil';</script>";
                                                        }
                                                    }

                                                    ?>
                                                    <br>

                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label text-left">Nama Barang :</label>
                                                        <div class="col-sm-5">
                                                            <div class="md-form mt-0">
                                                                <input type="text" class="form-control" id="" name="nama_barang" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label text-left">Harga :</label>
                                                        <div class="col-sm-5">
                                                            <div class="md-form mt-0">
                                                                <input type="number" class="form-control" id="" name="harga" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label text-left">Stok :</label>
                                                        <div class="col-sm-5">
                                                            <div class="md-form mt-0">
                                                                <input type="number" class="form-control" id="" name="stok" required>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-3 col-form-label text-left"></label>
                                                        <div class="col-sm-7">
                                                            <div class="md-form mt-0">
                                                                <input type="submit" value="Simpan" name="simpan" id="btn" title="Simpan" class="btn btn-success" />

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once('footer.php'); ?>