<?php

/**
 * Description of process_hapus_barang
 *
 * @author Norman Syarif
 */

require_once 'connect.php';

$kode = $_GET['kode'];

$result = $mysqli->query("DELETE FROM tb_barang WHERE kode_barang='$kode'");

if($result) {
    header("Location: ../stok.php");
}else{
    echo "Gagal";
}