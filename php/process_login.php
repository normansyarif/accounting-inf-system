<?php

/**
 * Description of process_login
 *
 * @author Norman Syarif
 */
session_start();

require_once 'connect.php';

$user = $_POST['username'];
$pass = $_POST['password'];

$query = "SELECT * FROM tb_login WHERE username='$user'";
$result = $mysqli->query($query);

if ($result->num_rows != 0) {
    while ($row = $result->fetch_assoc()) {
        if ($user == $row['username'] && md5($pass) == $row['password']) {
            $_SESSION['username'] = $row['username'];
            header("Location: ../penjualan.php");
            $_SESSION['periode'] = date("my");
            $bulan = substr($_SESSION['periode'], 0, 2);
            $tahun = substr($_SESSION['periode'], 2, 2);
            $_SESSION['periode_tgl'] = date_format(date_create("20".$tahun."-".$bulan."-01 00:00:00"), "F Y");
        } else {
            header("Location: ../index.php?salah");
        }
    }
} else {
    header("Location: ../index.php?notfound");
}
