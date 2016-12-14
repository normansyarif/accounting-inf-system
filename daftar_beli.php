<?php
/**
 * Description of daftar_beli
 *
 * @author Norman Syarif
 */
require_once 'top.php';
if (isset($_GET['bulan'])) {
    $periode = $_GET['bulan'] . $_GET['tahun'];
    $date = date_format(date_create("20" . $_GET['tahun'] . "-" . $_GET['bulan'] . "-01 00:00:00"), "F Y");
} else {
    $periode = $_SESSION['periode'];
    $date = $_SESSION['periode_tgl'];
}
require_once 'php/connect.php';
$query = "SELECT * FROM tb_beli INNER JOIN tb_barang ON tb_beli.kode_barang=tb_barang.kode_barang WHERE tb_beli.periode='$periode' ORDER BY tb_beli.tanggal DESC"
?>

<div class="menu-list">
    <ul>
        <span><li class="inaktif"><a href="penjualan.php">Nota Penjualan</a></li></span>
        <span><li class="inaktif"><a href="daftar_jual.php">Penjualan</a></li></span>
        <span><li class="aktif"><a href="daftar_beli.php">Pembelian</a></li></span>
        <span><li class="inaktif"><a href="beban.php">Beban</a></li></span>
        <span><li class="inaktif"><a href="stok.php">Stok Barang</a></li></span>
        <span><li class="inaktif"><a href="pilih_periode.php">Laporan Laba-rugi</a></li></span>
    </ul>
</div>
</div>

<div id="content" class="container col-md-9setengah">

    <p style="text-align: center; margin-top: 50px; font-weight: bold; font-size: 120%">Pembelian</p>
    <p style="text-align: center; margin-top:0; font-weight: bold; font-size: 110%">Periode <?php echo $date ?> <a title="Pilih periode" href="per_beli.php" style="padding: 1px; width: 25px; position: absolute; left: 66%; font-size: 60%" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-edit"></span></a></p>


    <div class="row col-md-offset-1">

        <div class="anggota-div" style="width: 90%">
            <div id="tabel">
                <table class="table table-hover table-striped">
                    <tr>
                        <th style="width: 100px">Tanggal</th>
                        <th style="width: 100px">Kode Barang</th>
                        <th style="width: 300px">Nama Barang</th>
                        <th style="width: 50px">Jumlah</th>
                        <th style="width: 150px">Harga beli (per unit)</th>
                        <th style="width: 120px">Total</th>
                    </tr>
                    <?php
                    $result = $mysqli->query($query);
                    if ($result->num_rows != 0) {
                        $akhir = 0;
                        while ($row = $result->fetch_assoc()) {
                            $harga = $row['total_harga'] / $row['jumlah'];
                            echo "<tr>"
                            . "<td>" . date_format(date_create($row['tanggal']), "d-m-Y") . "</td>"
                            . "<td>" . $row['kode_barang'] . "</td>"
                            . "<td>" . $row['nama_barang'] . "</td>"
                            . "<td>" . $row['jumlah'] . "</td>"
                            . "<td>Rp. " . number_format($harga) . ",-</td>"
                            . "<td>Rp. " . number_format($row['total_harga']) . ",-</td>";
                            $akhir += $row['total_harga'];
                        }
                        echo "<tr><th></th><th></th><th></th><th></th><th></th><th>Rp. ".number_format($akhir).",-</th></td>";
                    }else{
                        echo "<tr><th style='text-align: center; color: red' colspan='6'>Tidak ada data!</th></tr>";
                    }
                    ?>
                </table>
            </div>

        </div>
    </div>
</div>
</div>
</div>

<?php include 'bottom.php' ?>

<script type="text/javascript" src="assets/script.js"></script>


</body>
</html>