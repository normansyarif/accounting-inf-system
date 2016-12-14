<?php

/**
 * Description of process_tambah_barang
 *
 * @author Norman Syarif
 */

require_once 'connect.php';

$kode = $_GET['kode'];
$nama = $_GET['nama'];
$harga = $_GET['harga'];
$stok = $_GET['stok'];

$result = $mysqli->query("INSERT INTO `tb_barang`(`kode_barang`, `nama_barang`, `harga_satuan`, `stok`) VALUES ('$kode','$nama',$harga,$stok)");

if($result) {
    header("Location: ../stok.php");
}else{
    echo "Gagal! Mungkin karena kode barang sudah digunakan";
}