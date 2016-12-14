<?php
/**
 * Description of tabel_transaksi
 *
 * @author Norman Syarif
 */
session_start();
require_once 'connect.php';
$search = $_GET['s'];
if($_GET['periode'] != '') {
    $periode = $_GET['periode'];
}else{
    $periode = $_SESSION['periode'];
}
if ($search == '') {
    $query = "SELECT * FROM tb_transaksi WHERE periode='$periode' ORDER BY nomor DESC";
} else {
    $query = "SELECT * FROM tb_transaksi WHERE periode='$periode' AND nomor LIKE '%$search%' ORDER BY nomor DESC";
}
$result = $mysqli->query($query);
?>

<table class="table table-hover table-striped">
    <tr>
        <th style="width: 150px">No. Transaksi</th>
        <th>Nama Pembeli</th>
        <th style="width: 170px">Tanggal</th>
        <th style="width: 150px">Total Bayar</th>
        <th style="width: 50px">Detail Transaksi</th>
    </tr>

    <?php
    if ($result->num_rows != 0) {
        $akhir = 0;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>"
            . "<td>" . $row['nomor'] . "</td>"
            . "<td>" . $row['pembeli'] . "</td>"
            . "<td>" . date_format(date_create($row['tanggal']), "d-m-Y")  . "</td>"
            . "<td>Rp " . number_format($row['bayar']) . ",-</td>"
            . "<td>"
            . "<a title='Detail Transaksi' href='detail.php?nomor=".$row['nomor']."' class='btn btn-xs btn-success'>Detail</a>"
            . "</td>"
            . "</tr>";
            $akhir += $row['bayar'];
        }
        echo "<tr><th></th><th></th><th></th><th>Rp. ".number_format($akhir).",-</th><th></th></td>";
    }else{
        echo "<tr><th style='text-align: center; color: red' colspan='5'>Tidak ada data!</th></tr>";
    }
    ?>

</table>
