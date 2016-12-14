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
$query = "SELECT * FROM tb_beban WHERE periode='$periode' ORDER BY tanggal DESC";

if(isset($_GET['jenis']) && isset($_GET['bayar'])) {
    $tanggal = date("Y-m-d");
    $jenis = $_GET['jenis'];
    $bayar = $_GET['bayar'];
    $periode_skrg = $_SESSION['periode'];
    $mysqli->query("INSERT INTO `tb_beban`(`tanggal`, `keterangan`, `jumlah`, `periode`) VALUES ('$tanggal','$jenis',$bayar,'$periode_skrg')");
}

?>

<div class="menu-list">
    <ul>
        <span><li class="inaktif"><a href="penjualan.php">Nota Penjualan</a></li></span>
        <span><li class="inaktif"><a href="daftar_jual.php">Penjualan</a></li></span>
        <span><li class="inaktif"><a href="daftar_beli.php">Pembelian</a></li></span>
        <span><li class="aktif"><a href="beban.php">Beban</a></li></span>
        <span><li class="inaktif"><a href="stok.php">Stok Barang</a></li></span>
        <span><li class="inaktif"><a href="pilih_periode.php">Laporan Laba-rugi</a></li></span>
    </ul>
</div>
</div>

<div id="content" class="container col-md-9setengah">

    <p style="text-align: center; margin-top: 50px; font-weight: bold; font-size: 120%">Beban Operasional</p>
    <p style="text-align: center; margin-top:0; font-weight: bold; font-size: 110%">Periode <?php echo $date ?> <a title="Pilih periode" href="per_beban.php" style="padding: 1px; width: 25px; position: absolute; left: 66%; font-size: 60%" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-edit"></span></a></p>


    <div class="row col-md-offset-3">

        <div class="anggota-div" style="width: 66%">
            <div id="tabel">
                <?php
                if($periode == $_SESSION['periode']) {
                    echo '<form class="form-inline" style="margin-bottom: 10px">
                    <input name="jenis" placeholder="Beban" type="text" class="form-control input-sm">
                    <input name="bayar" placeholder="Jumlah" type="number" class="form-control input-sm">
                    <input type="submit" value="Add" class="btn btn-primary btn-sm">
                </form>';
                }
                ?>
                <table class="table table-hover table-striped">
                    <tr>
                        <th style="width: 200px">Tanggal</th>
                        <th style="width: 300px">Beban</th>
                        <th style="width: 300px">Jumlah</th>
                    </tr>
                    <?php
                    $result = $mysqli->query($query);
                    if ($result->num_rows != 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>"
                            . "<td>" . date_format(date_create($row['tanggal']), "d-m-Y") . "</td>"
                            . "<td>" . $row['keterangan'] . "</td>"
                            . "<td>Rp. " . number_format($row['jumlah']) . ",-</td>";
                        }
                    } else {
                        echo "<tr><th style='text-align: center; color: red' colspan='3'>Tidak ada data!</th></tr>";
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
