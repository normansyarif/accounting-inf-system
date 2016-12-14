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

if (isset($_GET['submit']) && $_GET['submit'] == "Update") {

    $in_kode = $_GET['kode'];
    $in_nama = $_GET['nama'];
    $in_harga = $_GET['harga'];

    $hasil = $mysqli->query("UPDATE tb_barang SET kode_barang='$in_kode', nama_barang='$in_nama', harga_satuan=$in_harga WHERE kode_barang='$in_kode'");
    if ($hasil) {
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

    <p style="text-align: center; margin-top: 50px; font-weight: bold; font-size: 120%">Update Harga Barang</p>

    <div class="row col-md-offset-4">
        <form method="get">

            <div class="anggota-div" style="width: 50%">

                <table>
                    <tr>
                        <th>Kode Barang</th>
                        <td><?php echo $kode_barang ?></td>
                    </tr>
                    <tr>
                        <th>Nama Barang</th>
                        <td><input name="nama" class="form-control input-sm" type="text" value="<?php echo $nama_barang ?>"></td>
                    </tr>
                    <tr>
                        <th>Harga Jual</th>
                        <td><input name="harga" class="form-control input-sm" type="number" value="<?php echo $harga_barang ?>"></td>
                    </tr>
                </table>

            </div>
            <input type="hidden" name="kode" value="<?php echo $kode_barang ?>">
            <input type="submit" name="submit" value="Update" class="btn btn-primary" style="position: relative; left: 22%">
        </form>
    </div>
</div>
</div>
</div>

<?php include 'bottom.php' ?>

<script type="text/javascript" src="assets/script.js"></script>

</body>
</html>