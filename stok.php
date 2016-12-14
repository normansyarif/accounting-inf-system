<?php
/**
 * Description of stok
 *
 * @author Norman Syarif
 */
require_once 'top.php';
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

    <p style="text-align: center; margin-top: 50px; font-weight: bold; font-size: 120%">Stok Barang</p>

    <div class="row col-md-offset-1">

        <div class="anggota-div" style="width: 90%">
            <a data-toggle="modal" data-target="#tambah-modal" class="btn btn-info" style="margin-bottom: 10px; float: left; margin-right: 10px"><span class="glyphicon glyphicon glyphicon-plus"></span> Entri barang baru</a>
            <input class="form-control" type="text" placeholder="Cari barang..." name="nama_barang" id="nama_barang">
            <div id="tabel"></div>

            <div class="modal fade" id="tambah-modal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close pull left" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Tambah Barang</h4>
                        </div>
                        <form action="php/process_tambah_barang.php">
                        <div class="modal-body">
                                <table>
                                    <tr>
                                        <th>Kode Barang</th>
                                        <td><input name="kode" type="text" class="form-control input-sm" required></td>
                                    </tr>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <td><input name="nama" type="text" class="form-control input-sm" required></td>
                                    </tr>
                                    <tr>
                                        <th>Harga Satuan (Rp.)</th>
                                        <td><input name="harga" type="text" class="form-control input-sm" required></td>
                                    </tr>
                                    <input name="stok" type="hidden" value="0">
                                </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success modal-button">OK</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
</div>

<?php include 'bottom.php' ?>

<script type="text/javascript" src="assets/script.js"></script>

<script type="text/javascript">

    get_data();

    function get_data() {
        var search = $("#nama_barang").val();
        $.ajax({
            method: "GET",
            url: "php/tabel_barang.php?s=" + search,
            success: function (data) {
                $("#tabel").html(data);
            }
        });
        setTimeout('get_data()', 3000);
    }





</script>

</body>
</html>