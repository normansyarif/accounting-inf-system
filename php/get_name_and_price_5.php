<?php
/**
 * Description of get_name_and_price
 *
 * @author Norman Syarif
 */
require_once 'connect.php';
$kode = $_GET['kode'];
$query = "SELECT * FROM tb_barang WHERE kode_barang='$kode'";
$result = $mysqli->query($query);
if($result->num_rows != 0) {
    while($row = $result->fetch_assoc()) {
        $nama_barang = $row['nama_barang'];
        $harga_barang = $row['harga_satuan'];
        $stok_barang = $row['stok'];
    }
}else{
    $nama_barang = "<span style='color: red; font-weight: bold'>Barang tidak ditemukan!</span>";
    $harga_barang = 0;
    $stok_barang = 0;
}
?>

<html>
    <body>
        <div id="nama_5">
            <?php echo $nama_barang ?>
        </div>
        <div id="harga_5">
            <?php echo $harga_barang ?>
        </div>
        <div id="stok_5">
            <?php echo $stok_barang ?>
        </div>
    </body>
</html>

