<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan_transaksi.xls");
include 'koneksi.php';
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

<div align="center">
    <h3>LAPORAN TRANSAKSI</h3>
</div>
<hr>
<table width="100%" border="1" cellspacing="0" cellpadding="4">
    <tr>
        <th width="100px">No</th>
        <th>Tanggal</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Harga Satuan</th>
        <th>Jumlah Jual</th>
        <th>Keterangan</th>
    </tr>
    <?php
    $no = 1;
    $sql = mysqli_query($konek, "SELECT * FROM transaksi INNER JOIN barang USING(id_barang)");
    while ($d = mysqli_fetch_array($sql)) {
    ?>
        <tr>
            <td align='center' width="30px"><?= $no++; ?></td>
            <td align='center' width="100px"><?= tgl($d['tanggal']); ?></td>
            <td><?= $d['nama_barang']; ?></td>
            <td align='center'><?= $d['jumlah']; ?></td>
            <td align='right'><?= rp($d['harga']); ?></td>
            <td align='right'><?= rp($d['total_jual']); ?></td>
            <td align='center'><?= $d['keterangan']; ?></td>
        </tr>
    <?php } ?>
</table>