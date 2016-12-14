<?php
/**
 * Description of daftar_beli
 *
 * @author Norman Syarif
 */
require_once 'top.php';
require_once 'php/connect.php';
$periode = $_GET['bulan'] . $_GET['tahun'];
$date = date_format(date_create("20" . $_GET['tahun'] . "-" . $_GET['bulan'] . "-01 00:00:00"), "F Y");
$query = "SELECT * FROM tb_persediaan WHERE periode='$periode'";
$result = $mysqli->query($query);
if ($result->num_rows != 0) {
    $row = $result->fetch_assoc();
    $ambil_penjualan = $mysqli->query("SELECT bayar FROM tb_transaksi WHERE periode='$periode'");
    $penjualan = 0;
    if ($ambil_penjualan->num_rows != 0) {
        while ($row = $ambil_penjualan->fetch_assoc()) {
            $penjualan += $row['bayar'];
        }
    }
    $ambil_pembelian = $mysqli->query("SELECT total_harga FROM tb_beli WHERE periode='$periode'");
    $pembelian = 0;
    if ($ambil_pembelian->num_rows != 0) {
        while ($row = $ambil_pembelian->fetch_assoc()) {
            $pembelian += $row['total_harga'];
        }
    }
    $ambil_beban = $mysqli->query("SELECT jumlah FROM tb_beban WHERE periode='$periode'");
    $beban = 0;
    if ($ambil_beban->num_rows != 0) {
        while ($row = $ambil_beban->fetch_assoc()) {
            $beban += $row['jumlah'];
        }
    }
    $ambil_barang = $mysqli->query("SELECT harga_beli, stok FROM tb_barang");
    $persediaan_akhir = 0;
    if ($periode == $_SESSION['periode']) {
        if ($ambil_barang->num_rows != 0) {
            while ($row = $ambil_barang->fetch_assoc()) {
                $harga_per_item = $row['harga_beli'] * $row['stok'];
                $persediaan_akhir += $harga_per_item;
            }
            $mysqli->query("UPDATE `tb_persediaan` SET `persediaan_akhir`=$persediaan_akhir WHERE periode='$periode'");
        }
    }else{
        $akhir = $mysqli->query("SELECT persediaan_akhir FROM tb_persediaan WHERE periode='$periode'");
        $row_akhir = $akhir->fetch_assoc();
        $persediaan_akhir = $row_akhir['persediaan_akhir'];
    }
    $awal = $mysqli->query("SELECT persediaan_awal FROM tb_persediaan WHERE periode='$periode'");
    $row_persediaan = $awal->fetch_assoc();
    $persediaan_awal = $row_persediaan['persediaan_awal'];
    $barang_tersedia_untuk_dijual = $persediaan_awal + $pembelian;
    $harga_pokok_penjualan = $barang_tersedia_untuk_dijual - $persediaan_akhir;
    $laba_kotor = $penjualan - $harga_pokok_penjualan;
    $laba_bersih = $laba_kotor - $beban;
} else {
    if ($periode == $_SESSION['periode']) {
        $month = substr($periode, 0, 2) - 1;
        $year = substr($periode, 2, 2);
        $prev_periode = $month . $year;
        $select_prev = $mysqli->query("SELECT persediaan_akhir FROM tb_persediaan WHERE periode='$prev_periode'");
        $p_awal = 0;
        if ($select_prev->num_rows != 0) {
            $row = $select_prev->fetch_assoc();
            $p_awal = $row['persediaan_akhir'];
        }
        $baru = $mysqli->query("INSERT INTO `tb_persediaan`(`periode`,`persediaan_awal`) VALUES ('$periode',$p_awal)");
        $select_baru = $mysqli->query("SELECT * FROM tb_persediaan WHERE periode='$periode'");
        $row_apolah = $select_baru->fetch_assoc();
        $ambil_penjualan = $mysqli->query("SELECT bayar FROM tb_transaksi WHERE periode='$periode'");
        $penjualan = 0;
        if ($ambil_penjualan->num_rows != 0) {
            while ($row = $ambil_penjualan->fetch_assoc()) {
                $penjualan += $row['bayar'];
            }
        }
        $pembelian = 0;
        $ambil_pembelian = $mysqli->query("SELECT total_harga FROM tb_beli WHERE periode='$periode'");
        if ($ambil_pembelian->num_rows != 0) {
            while ($row = $ambil_pembelian->fetch_assoc()) {
                $pembelian += $row['total_harga'];
            }
        }
        $ambil_beban = $mysqli->query("SELECT jumlah FROM tb_beban WHERE periode='$periode'");
        $beban = 0;
        if ($ambil_beban->num_rows != 0) {
            while ($row = $ambil_beban->fetch_assoc()) {
                $beban += $row['jumlah'];
            }
        }
        $ambil_barang = $mysqli->query("SELECT harga_beli, stok FROM tb_barang");
        $persediaan_akhir = 0;
        if ($ambil_barang->num_rows != 0) {
            while ($row = $ambil_barang->fetch_assoc()) {
                $harga_per_item = $row['harga_beli'] * $row['stok'];
                $persediaan_akhir += $harga_per_item;
            }
            $mysqli->query("UPDATE `tb_persediaan` SET `persediaan_akhir`=$persediaan_akhir WHERE periode='$periode'");
        }
        $persediaan_awal = $row_apolah['persediaan_awal'];
        $barang_tersedia_untuk_dijual = $persediaan_awal + $pembelian;
        $harga_pokok_penjualan = $barang_tersedia_untuk_dijual - $persediaan_akhir;
        $laba_kotor = $penjualan - $harga_pokok_penjualan;
        $laba_bersih = $laba_kotor - $beban;
    } else {
        header("Location: pilih_periode.php?notfound");
    }
}
?>

<div class="menu-list">
    <ul>
        <span><li class="inaktif"><a href="penjualan.php">Nota Penjualan</a></li></span>
        <span><li class="inaktif"><a href="daftar_jual.php">Penjualan</a></li></span>
        <span><li class="inaktif"><a href="daftar_beli.php">Pembelian</a></li></span>
        <span><li class="inaktif"><a href="beban.php">Beban</a></li></span>
        <span><li class="inaktif"><a href="stok.php">Stok Barang</a></li></span>
        <span><li class="aktif"><a href="pilih_periode.php">Laporan Laba-rugi</a></li></span>
    </ul>
</div>
</div>

<div id="content" class="container col-md-9setengah">

    <p style="text-align: center; margin-top: 50px; font-weight: bold; font-size: 120%">Laporan Laba/Rugi</p>
    <p style="text-align: center; margin-top:0; font-weight: bold; font-size: 120%">Periode <?php echo $date ?></p>

    <div class="row col-md-offset-3">

        <div class="anggota-div" style="width: 65%">
            <div id="tabel">
                <table class="table table-hover">
                    <tr>
                        <td style="width: 200px">Penjualan</td>
                        <td style="width: 100px"></td>
                        <td style="width: 100px">Rp. <?php echo number_format($penjualan) ?>,-</td>
                    </tr>
                    <tr>
                        <th colspan="3" style="width: 200px">Harga Pokok Penjualan:</th>
                    </tr>
                    <tr>
                        <td style="width: 200px">Persediaan awal</td>
                        <td style="width: 100px">Rp. <?php echo number_format($persediaan_awal) ?>,-</td>
                        <td style="width: 100px"></td>
                    </tr>
                    <tr>
                        <td style="width: 200px">Pembelian</td>
                        <td style="width: 100px; border-bottom: 1px solid black">Rp. <?php echo number_format($pembelian) ?>,-</td>
                        <td style="width: 100px"></td>
                    </tr>
                    <tr>
                        <td style="width: 200px">Barang tersedia untuk dijual</td>
                        <td style="width: 100px">Rp. <?php echo number_format($barang_tersedia_untuk_dijual) ?>,-</td>
                        <td style="width: 100px"></td>
                    </tr>
                    <tr>
                        <td style="width: 200px">Persediaan akhir</td>
                        <td style="width: 100px; border-bottom: 1px solid black">(Rp. <?php echo number_format($persediaan_akhir) ?>,-)</td>
                        <td style="width: 100px"></td>
                    </tr>
                    <tr>
                        <td style="width: 200px">Harga pokok penjualan</td>
                        <td style="width: 100px"></td>
                        <td style="width: 100px; border-bottom: 1px solid black">(Rp. <?php echo number_format($harga_pokok_penjualan) ?>,-)</td>
                    </tr>
                    <tr>
                        <td style="width: 200px">Laba kotor</td>
                        <td style="width: 100px"></td>
                        <td style="width: 100px">Rp. <?php echo number_format($laba_kotor) ?>,-</td>
                    </tr>
                    <tr>
                        <th colspan="3" style="width: 200px">Beban Operasional:</th>
                    </tr>
                    <tr>
                        <td style="width: 200px">Beban-beban</td>
                        <td style="width: 100px"></td>
                        <td style="width: 100px; border-bottom: 1px solid black">(Rp. <?php echo number_format($beban) ?>,-)</td>
                    </tr>
                    <tr>
                        <th style="width: 200px">Laba bersih</th>
                        <td style="width: 100px"></td>
                        <th style="width: 100px">Rp. <?php echo number_format($laba_bersih) ?>,-</th>
                    </tr>

                </table>
                <button onclick="frames['cetak'].print()" href='javascript:void(0)' class="btn btn-primary btn-sm" type="button"><span class="glyphicon glyphicon-print"></span> Cetak</button>
            </div>

        </div>
    </div>
</div>
</div>
</div>

<iframe src='cetak_laporan.php?bulan=<?php echo $_GET['bulan'] ?>&tahun=<?php echo $_GET['tahun'] ?>' name='cetak' style='display: none'></iframe>

<?php include 'bottom.php' ?>

</body>
</html>