<?php
$menu = 'transaksi';
include 'header.php';
?>
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dt-responsive p-4">
                            <?php

                            if (isset($_GET['tambah'])) {
                                if ($_GET['tambah'] == "berhasil") {
                                    echo "<div class='alert alert-primary fade show alert-dismissible mt-2' role='alert' style='color: black; font-weight: bold;border-radius: 50px;'>
                                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                            Tambah Data Berhasil !
                                        </div>";
                                }
                            } elseif (isset($_GET['edit'])) {
                                if ($_GET['edit'] == "berhasil") {
                                    echo "<div class='alert alert-primary fade show alert-dismissible mt-2' role='alert' style='color: black; font-weight: bold;border-radius: 50px;'>
                                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                            Edit Data Berhasil !
                                        </div>";
                                }
                            } elseif (isset($_GET['hapus'])) {
                                if ($_GET['hapus'] == "berhasil") {
                                    echo "<div class='alert alert-primary fade show alert-dismissible mt-2' role='alert' style='color: black; font-weight: bold;border-radius: 50px;'>
                                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                            Hapus Data Berhasil !
                                        </div>";
                                }
                            }
                            ?>
                            <a href="tambah_transaksi.php" class="btn btn-primary btn-sm" style="margin-bottom: 10px"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</a>
                            <a href="excel_transaksi.php" target="_blank" class="btn btn-success btn-sm" style="margin-bottom: 10px"><i class="fa fa-file" aria-hidden="true"></i> Export ke Excel</a>

                            <table id="alt-pg-dt" class="table nowrap table-bordered" style="font-size: 18px">
                                <thead>
                                    <tr>
                                        <th width="30px">No</th>
                                        <th>Tanggal</th>
                                        <th>Nama transaksi</th>
                                        <th>Jumlah</th>
                                        <th>Harga Satuan</th>
                                        <th>Jumlah Jual</th>
                                        <th>Keterangan</th>
                                        <th width="250px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $sql = mysqli_query($konek, "SELECT * FROM transaksi INNER JOIN barang USING(id_barang)");
                                    while ($transaksi = mysqli_fetch_array($sql)) {
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= tgl($transaksi['tanggal']); ?></td>
                                            <td><?= $transaksi['nama_barang']; ?></td>
                                            <td><?= $transaksi['jumlah']; ?></td>
                                            <td><?= rp($transaksi['harga']); ?></td>
                                            <td><?= rp($transaksi['total_jual']); ?></td>
                                            <td><?= $transaksi['keterangan']; ?></td>
                                            <td align="center">
                                                <a class="btn btn-warning btn-sm" href="edit_transaksi.php?id_transaksi=<?= $transaksi['id_transaksi'] ?>"><i class='fas fa-edit'></i> Edit</a> |
                                                <a href="#" type="button" class="btn-sm" data-toggle="modal" data-target="#myModal1<?= $transaksi['id_transaksi']; ?>" title="Hapus"><button class="btn btn-danger btn-sm"><i class='fa fa-trash'></i> Hapus</button></a>

                                                <div class="modal fade" id="myModal1<?= $transaksi['id_transaksi']; ?>" role="dialog">
                                                    <div class="modal-dialog modal-lg">
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Hapus Data transaksi </h4>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <h3>Apakah Anda Ingin Menghapus Transaksi</h3>
                                                                <h4 class="text-red"><b><?= $transaksi['nama_barang']; ?></b></h4>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger pull-left btn-flet" data-dismiss="modal">Tidak</button>
                                                                <a href="hapus_transaksi.php?id_transaksi=<?= $transaksi['id_transaksi']; ?>" class="btn btn-success btn-flat">Ya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>