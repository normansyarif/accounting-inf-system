<?php
/**
 * Description of tabel_barang
 *
 * @author Norman Syarif
 */
require_once 'connect.php';
$search = $_GET['s'];
if ($search == '') {
    $query = "SELECT * FROM tb_barang ORDER BY kode_barang ASC";
} else {
    $query = "SELECT * FROM tb_barang WHERE nama_barang LIKE '%$search%' ORDER BY nama_barang ASC";
}
$result = $mysqli->query($query);
?>

<table class="table table-hover table-striped">
    <tr>
        <th style="width: 100px">Kode Barang</th>
        <th>Nama barang</th>
        <th style="width: 150px">Harga Beli</th>
        <th style="width: 150px">Harga Jual</th>
        <th style="width: 100px">Stok</th>
        <th style="width: 100px">Aksi</th>
    </tr>

    <?php
    if ($result->num_rows != 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>"
            . "<td>" . $row['kode_barang'] . "</td>"
            . "<td>" . $row['nama_barang'] . "</td>"
            . "<td>Rp. " . number_format($row['harga_beli']) . ",-</td>"
            . "<td>Rp. " . number_format($row['harga_satuan']) . ",-</td>"
            . "<td>" . $row['stok'] . "</td>"
            . "<td>"
            . "<div class='btn-group'>"
            . "<a title='Tambah stok barang' href='process_tambah_stok.php?kode=" . $row['kode_barang'] . "' class='btn btn-xs btn-success'><span class='glyphicon glyphicon-plus'></span></a>"
            . "<a title='Update harga barang' href='process_edit_barang.php?kode=" . $row['kode_barang'] . "' class='btn btn-xs btn-info'><span class='glyphicon glyphicon-edit'></span></a>"
            . "<a title='Hapus barang' href='php/process_hapus_barang.php?kode=" . $row['kode_barang'] . "' class='btn btn-xs btn-danger'><span class='glyphicon glyphicon-remove'></span></a></div>"
            . "</td>"
            . "</tr>";
        }
    }
    ?>

</table>
