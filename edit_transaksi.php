<?php
$menu = 'transaksi';
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
                                    <a href="transaksi.php" title="Kembali"><button type=" button" class="btn btn-danger btn-sm"><i class="ik ik-arrow-left"></i>&nbsp; Kembali</button></a>
                                </div>

                                <br>
                                <form method="post" action="" class="was-validated" style="border: 4px">
                                    <div class="row">
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-8">

                                            <div class="card">
                                                <div class="card-body shadow p-3 rounded">
                                                    <?php
                                                    $sql = mysqli_query($konek, "SELECT * FROM transaksi INNER JOIN barang USING(id_barang) WHERE id_transaksi = '$_GET[id_transaksi]'");
                                                    $e = mysqli_fetch_array($sql);
                                                    ?>
                                                    <input type="hidden" class="form-control text-left" value="<?= $e['id_transaksi']; ?>" id="" name="id_transaksi" required readonly>
                                                    <?php
                                                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                                        $id_transaksi  = $_POST['id_transaksi'];

                                                        $id_b          = $_POST['id_barang'];
                                                        $ex_id         = explode("-", $id_b);
                                                        $idBarang      = $ex_id[1];

                                                        $tanggal       = $_POST['tanggal'];
                                                        $jumlah        = $_POST['jumlah'];
                                                        $total_jual    = $_POST['total_jual'];
                                                        $keterangan    = $_POST['keterangan'];



                                                        $simpan =  mysqli_query(
                                                            $konek,
                                                            "UPDATE transaksi SET
                                                                    id_barang = '$idBarang', 
                                                                    tanggal = '$tanggal', 
                                                                    jumlah = '$jumlah', 
                                                                    total_jual = '$total_jual', 
                                                                    keterangan = '$keterangan'
                                                                    WHERE id_transaksi = '$id_transaksi'"
                                                        );



                                                        if ($simpan) {
                                                            echo "<script>document.location.href = 'transaksi.php?edit=berhasil';</script>";
                                                        }
                                                    }

                                                    ?>
                                                    <br>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label text-left">Tanggal :</label>
                                                        <div class="col-sm-5">
                                                            <div class="md-form mt-0">

                                                                <input type="hidden" value="<?= $e['tanggal']; ?>" class="form-control" id="" name="tanggal" required readonly>
                                                                <input type="text" value="<?= date('d F Y'); ?>" class="form-control" id="" name="" required readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label text-left">Nama Barang :</label>
                                                        <div class="col-sm-5">
                                                            <div class="md-form mt-0">
                                                                <select name="id_barang" class="form-control" onchange="myFunction(event)">
                                                                    <?php
                                                                    $sql = mysqli_query($konek, "SELECT * FROM barang");
                                                                    while ($barang = mysqli_fetch_array($sql)) {

                                                                        if ($barang['id_barang'] == $e['id_barang']) {
                                                                            $selected = "selected";
                                                                        } else {
                                                                            $selected = "";
                                                                        }

                                                                    ?>
                                                                        <option value="<?= $barang['harga'] . "-" . $barang['id_barang']; ?>" <?= $selected; ?>><?= $barang['nama_barang']; ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label text-left">Jumlah :</label>
                                                        <div class="col-sm-5">
                                                            <div class="md-form mt-0">
                                                                <input type="number" class="form-control" id="jumlah" value="<?= $e['jumlah']; ?>" name="jumlah" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label text-left">Harga Satuan :</label>
                                                        <div class="col-sm-5">
                                                            <div class="md-form mt-0">
                                                                <input type="text" class="form-control" id="harga_satuan" value="<?= $e['harga']; ?>" name="" required readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label text-left">Total Jual :</label>
                                                        <div class="col-sm-5">
                                                            <div class="md-form mt-0">
                                                                <input type="text" class="form-control" id="total_jual" value="<?= $e['total_jual'] ?>" name="total_jual" required readonly>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label text-left">Keterangan :</label>
                                                        <div class="col-sm-5">
                                                            <div class="md-form mt-0">
                                                                <input type="text" class="form-control" id="" value="<?= $e['keterangan']; ?>" name="keterangan" required>
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

<script type="text/javascript">
    $(document).ready(function() {
        $('#nama_barang').change(function() {
            id_barang = $(this).val();
            console.log(id_barang);
            console.log("Berubah");
            <?php
            $sql = mysqli_query($konek, "SELECT * FROM barang");
            while ($hs = mysqli_fetch_array($sql)) {
            ?>
                if (id_barang == "<?= $hs['id_barang']; ?>") {
                    console.log(id_barang);
                    $('#harga_satuan').val(<?= $hs['harga']; ?>).attr("readonly", true)
                }
            <?php } ?>
        })

    })

    function myFunction(pj) {
        var nama_barang = pj.target.value
        var ex = nama_barang.split("-");
        document.getElementById("harga_satuan").value = ex[0];
    }

    $(document).ready(function() {
        function hitung() {
            var tJumlah = $('#jumlah').val();
            var harga_satuan = parseFloat($('#harga_satuan').val());
            tJumlah = parseFloat(tJumlah.replace(/[^,\d]/g, '').toString());
            harga_satuan = tJumlah * harga_satuan;
            console.log(harga_satuan)
            $('#total_jual').val(harga_satuan)
        }
        $('#jumlah').change(function() {
            hitung();
        });
    });
</script>