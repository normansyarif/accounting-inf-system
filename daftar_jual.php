<?php
/**
 * Description of daftar_jual
 *
 * @author Norman Syarif
 */
require_once 'top.php';
if(isset($_GET['bulan'])) {
    $periode = $_GET['bulan'].$_GET['tahun'];
    $date = date_format(date_create("20".$_GET['tahun']."-".$_GET['bulan']."-01 00:00:00"), "F Y");
}else{
    $periode = $_SESSION['periode'];
    $date = $_SESSION['periode_tgl'];
}

?>

<div class="menu-list">
    <ul>
        <span><li class="inaktif"><a href="penjualan.php">Nota Penjualan</a></li></span>
        <span><li class="aktif"><a href="daftar_jual.php">Penjualan</a></li></span>
        <span><li class="inaktif"><a href="daftar_beli.php">Pembelian</a></li></span>
        <span><li class="inaktif"><a href="beban.php">Beban</a></li></span>
        <span><li class="inaktif"><a href="stok.php">Stok Barang</a></li></span>
        <span><li class="inaktif"><a href="pilih_periode.php">Laporan Laba-rugi</a></li></span>
    </ul>
</div>
</div>

<div id="content" class="container col-md-9setengah">

    <p style="text-align: center; margin-top: 50px; font-weight: bold; font-size: 120%">Penjualan</p>
    <p style="text-align: center; margin-top:0; font-weight: bold; font-size: 110%">Periode <?php echo $date ?> <a title="Pilih periode" href="per_jual.php" style="padding: 1px; width: 25px; position: absolute; left: 66%; font-size: 60%" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-edit"></span></a></p>

    <div class="row col-md-offset-1">

        <div class="anggota-div" style="width: 90%">
            <input class="form-control" type="text" placeholder="Nomor transaksi..." id="no_trans" style="margin-bottom: 10px">
            <input type="hidden" id="periode" value="<?php echo $periode ?>">
            <div id="tabel"></div>

        </div>
    </div>
</div>
</div>
</div>

<?php include 'bottom.php' ?>

<script type="text/javascript">

    get_data();

    function get_data() {
        var search = $("#no_trans").val();
        var periode = $("#periode").val();
        $.ajax({
            method: "GET",
            url: "php/tabel_transaksi.php?s=" + search + "&periode=" + periode,
            success: function (data) {
                $("#tabel").html(data);
            }
        });
        setTimeout('get_data()', 3000);
    }





</script>

</body>
</html>