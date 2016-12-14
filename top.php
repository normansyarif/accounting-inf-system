<?php
/**
 * Description of top
 *
 * @author Norman Syarif
 */
session_start();

date_default_timezone_set("Asia/Jakarta");

if (!isset($_SESSION['username'])) {
  header("Location: index.php?login");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sistem Keuangan Toko Komputer "Serba KW"</title>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
        <script type="text/javascript" src="assets/jquery.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="assets/style.css">
    </head>
    <body>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 atas">
                    <span id="text-header">
                        Sistem Keuangan<br/>
                        Toko Komputer "Serba KW"
                    </span>
                    <div class="logout-dan-notif">
                        <a href="javascript:void(0)" id="logout" data-toggle="modal" data-target="#logout-modal" class="pull-right"><span class="glyphicon glyphicon-log-out"></span> Keluar</a>

                        <div class="modal fade" id="logout-modal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close pull left" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Logout</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Kamu yakin ingin logout?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Gak jadi</button>
                                        <a href="php/proses_logout.php" class="btn btn-success modal-button">Ya</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row row-eq-height">
                <div id="menu" class="col-md-2setengah">
