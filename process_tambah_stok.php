<?php
/**
 * Description of penjualan
 *
 * @author Norman Syarif
 */
require_once 'php/connect.php';
require_once 'top.php';
$kode = $_GET['kode'];
$result = $mysqli->query("SELECT * FROM tb_barang WHERE kode_barang='$kode'");
$row = $result->fetch_assoc();
$kode_barang = $row['kode_barang'];
$nama_barang = $row['nama_barang'];
$harga_barang = $row['harga_satuan'];

if (isset($_GET['submit']) && $_GET['submit'] == "Simpan") {
    
    $in_kode = $_GET['kode'];
    $data = $mysqli->query("SELECT stok FROM tb_barang WHERE kode_barang='$in_kode'");
    $row = $data->fetch_assoc();
    $stok_baru = $row['stok'] + $_GET['stok_baru'];

    $hasil = $mysqli->query("UPDATE tb_barang SET stok=$stok_baru WHERE kode_barang='$in_kode'");
    if ($hasil) {
        $date = date("Y-m-d");
        $total_harga = $_GET['harga'];
        $jumlah = $_GET['stok_baru'];
        $harga_beli = $_GET['harga'] / $_GET['stok_baru'];
        $periode = $_SESSION['periode'];
        $mysqli->query("INSERT INTO `tb_beli`(`tanggal`, `kode_barang`, `total_harga`, `jumlah`, `periode`) VALUES ('$date','$in_kode',$total_harga,$jumlah,'$periode')");
        $mysqli->query("UPDATE `tb_barang` SET `harga_beli`=$harga_beli WHERE kode_barang='$in_kode'");
        header("Location: stok.php");
    } else {
        echo "gagal";
    }
}
?>

<div class="menu-list">
    <ul>
        <span><li class="inaktif"><a href="penjualan.php">Nota Penjualan</a></li></span>
        <span><li class="inaktif"><a href="daftar_jual.php">Penjualan</a></li></span>
        <span><li class="inaktif"><a href="daftar_beli.php">Pembelian</a></li></span>
        <span><li class="inaktif"><a href="beban.php">Beban</a></li></span>
        <span><li class="aktif"><a href="stok.php">Stok Barang</a></li></span>
        <span><li class="inaktif"><a href="pilih_periode.php">Laporan Laba-rugi</a></li></span>
    </ul>
</div>
</div>

<div id="content" class="container col-md-9setengah">

    <p style="text-align: center; margin-top: 50px; font-weight: bold; font-size: 120%">Tambah Stok Barang</p>

    <div class="row col-md-offset-3">
        <form method="get">

            <div class="anggota-div" style="width: 62%">

                <table>
                    <tr>
                        <th>Kode Barang</th>
                        <td><?php echo $kode_barang ?></td>
                    </tr>
                    <tr>
                        <th>Nama Barang</th>
                        <td><?php echo $nama_barang ?></td>
                    </tr>
                    <tr>
                        <th>Jumlah Barang</th>
                        <td><input name="stok_baru" type="number" class="form-control input-sm" value="0"></td>
                    </tr>
                    <tr>
                        <th>Total Harga Beli</th>
                        <td><input name="harga" class="form-control input-sm" type="number" value=0></td>
                    </tr>
                </table>

            </div>
            <input type="hidden" name="kode" value="<?php echo $kode_barang ?>">
            <input type="submit" name="submit" value="Simpan" class="btn btn-primary" style="position: relative; left: 29%">
        </form>
    </div>
</div>
</div>
</div>

<?php include 'bottom.php' ?>

<script type="text/javascript" src="assets/script.js"></script>

</body>
</html>