<?php
/**
 * Description of penjualan
 *
 * @author Norman Syarif
 */
require_once 'php/connect.php';
require_once 'top.php';
$id = date("dmyHis");
?>

<div class="menu-list">
    <ul>
        <span><li class="aktif"><a href="penjualan.php">Nota Penjualan</a></li></span>
        <span><li class="inaktif"><a href="daftar_jual.php">Penjualan</a></li></span>
        <span><li class="inaktif"><a href="daftar_beli.php">Pembelian</a></li></span>
        <span><li class="inaktif"><a href="beban.php">Beban</a></li></span>
        <span><li class="inaktif"><a href="stok.php">Stok Barang</a></li></span>
        <span><li class="inaktif"><a href="pilih_periode.php">Laporan Laba-rugi</a></li></span>
    </ul>
</div>
</div>

<div id="content" class="container col-md-9setengah">

    <p style="text-align: center; margin-top: 50px; font-weight: bold; font-size: 120%">Nota Penjualan</p>

    <div class="row col-md-offset-1">
        <form method="get" action="nota.php">
            <input name="pembeli" type="text" class="form-control input-sm" placeholder="Nama Pembeli" style="width: 20%; position: relative; left: 10px" required>
            <input name="no_kwitansi" type="hidden" class="form-control input-sm" placeholder="ID Transaksi" value="<?php echo $id ?>">

            <div class="anggota-div" style="width: 90%">

                <div style="font-weight: bold">
                    <p style="width: 13%; float: left">Kode Barang</p>
                    <p style="width: 40%; float: left">Nama Barang</p>
                    <p style="width: 20%; float: left">Harga Satuan</p>
                    <p style="width: 10%; float: left;">Kuantitas</p>
                    <p style="width: 17%; float: left;">Total</p>
                    <hr />
                    <div style="clear: both"></div>
                </div>

                <div class="input" id="item_1" style="display: block">
                    <p style="width: 13%; float: left"><input name="kode_1" id="kode_1" type="text" class="form-control input-sm" size="6"></p>
                    <p style="width: 40%; float: left"><span id="nama_1"></span></p>
                    <input id="in_harga_1" type="hidden">
                    <p style="width: 20%; float: left">Rp. <span id="formatted_1"></span></p>
                    <p style="width: 10%; float: left;"><input name="kuantitas_1" id="in_kuantitas_1" style="width: 60px" type="number" class="form-control input-sm" size="6" value="0"></p>
                    <input type="hidden" id="in_stok_1">
                    <input id="in_total_1" type="hidden">
                    <p style="width: 17%; float: left">Rp. <span id="total_1"></span>,-</p>
                    <br />
                    <div style="clear: both"></div>
                </div>

                <div class="no" id="item_2" style="display: none">
                    <p style="width: 13%; float: left"><input name="kode_2" id="kode_2" type="text" class="form-control input-sm" size="6"></p>
                    <p style="width: 40%; float: left"><span id="nama_2"></span></p>
                    <input id="in_harga_2" type="hidden">
                    <p style="width: 20%; float: left">Rp. <span id="formatted_2"></span></p>
                    <p style="width: 10%; float: left;"><input name="kuantitas_2" id="in_kuantitas_2" style="width: 60px" type="number" class="form-control input-sm" size="6" value="0"></p>
                    <input type="hidden" id="in_stok_2">
                    <input id="in_total_2" type="hidden">
                    <p style="width: 17%; float: left">Rp. <span id="total_2"></span>,-</p>
                    <br />
                    <div style="clear: both"></div>
                </div>

                <div class="no" id="item_3" style="display: none">
                    <p style="width: 13%; float: left"><input name="kode_3" id="kode_3" type="text" class="form-control input-sm" size="6"></p>
                    <p style="width: 40%; float: left"><span id="nama_3"></span></p>
                    <input id="in_harga_3" type="hidden">
                    <p style="width: 20%; float: left">Rp. <span id="formatted_3"></span></p>
                    <p style="width: 10%; float: left;"><input name="kuantitas_3" id="in_kuantitas_3" style="width: 60px" type="number" class="form-control input-sm" size="6" value="0"></p>
                    <input type="hidden" id="in_stok_3">
                    <input id="in_total_3" type="hidden">
                    <p style="width: 17%; float: left">Rp. <span id="total_3"></span>,-</p>
                    <br />
                    <div style="clear: both"></div>
                </div>
                
                <div class="no" id="item_4" style="display: none">
                    <p style="width: 13%; float: left"><input name="kode_4" id="kode_4" type="text" class="form-control input-sm" size="6"></p>
                    <p style="width: 40%; float: left"><span id="nama_4"></span></p>
                    <input id="in_harga_4" type="hidden">
                    <p style="width: 20%; float: left">Rp. <span id="formatted_4"></span></p>
                    <p style="width: 10%; float: left;"><input name="kuantitas_4" id="in_kuantitas_4" style="width: 60px" type="number" class="form-control input-sm" size="6" value="0"></p>
                    <input type="hidden" id="in_stok_4">
                    <input id="in_total_4" type="hidden">
                    <p style="width: 17%; float: left">Rp. <span id="total_4"></span>,-</p>
                    <br />
                    <div style="clear: both"></div>
                </div>
                
                <div class="no" id="item_5" style="display: none">
                    <p style="width: 13%; float: left"><input name="kode_5" id="kode_5" type="text" class="form-control input-sm" size="6"></p>
                    <p style="width: 40%; float: left"><span id="nama_5"></span></p>
                    <input id="in_harga_5" type="hidden">
                    <p style="width: 20%; float: left">Rp. <span id="formatted_5"></span></p>
                    <p style="width: 10%; float: left;"><input name="kuantitas_5" id="in_kuantitas_5" style="width: 60px" type="number" class="form-control input-sm" size="6" value="0"></p>
                    <input type="hidden" id="in_stok_5">
                    <input id="in_total_5" type="hidden">
                    <p style="width: 17%; float: left">Rp. <span id="total_5"></span>,-</p>
                    <br />
                    <div style="clear: both"></div>
                </div>



                <button type="button" onclick="tambah()" class="btn btn-primary btn-sm" style="position: relative; left: 0; float: left">Tambah barang</button>
                <p style="font-weight: bold; font-size: 130%; position: relative; left: 71%">Rp. <span id="total_bayar"></span>,-</p>
                <p style="font-size: 80%; position: relative; top: 10px; font-style: italic">* Kode barang bisa dilihat <a href="stok.php">disini</a></p>
            </div>
            <input type="submit" value="Cetak" class="btn btn-primary" style="position: relative; left: 43%">
        </form>
    </div>
</div>
</div>
</div>

<?php include 'bottom.php' ?>

<div style="display: none" class="hidden_div_1"></div>
<div style="display: none" class="hidden_div_2"></div>
<div style="display: none" class="hidden_div_3"></div>
<div style="display: none" class="hidden_div_4"></div>
<div style="display: none" class="hidden_div_5"></div>

<script type="text/javascript">

                    //KOLOM INPUT BARU
                    item_1();
                    function item_1() {
                        var stok = parseInt($("#in_stok_1").val());
                        var kuantitas = parseInt($("#in_kuantitas_1").val());
                        if(stok == 0) {
                            alert("BARANG TELAH HABIS!");
                            $("#in_kuantitas_1").val(stok);
                        }else if(kuantitas > stok) {
                            alert("STOK TIDAK CUKUP!");
                            $("#in_kuantitas_1").val(stok);
                        }
                        var total = $("#in_kuantitas_1").val() * $("#in_harga_1").val();
                        var formatted = total.toLocaleString();
                        $("#in_total_1").val(total);
                        $("#total_1").html(formatted);
                    }

                    $("#in_kuantitas_1,#kode_1").change(function () {
                        item_1();
                    });
                    
                    item_2();
                    function item_2() {
                        var stok = parseInt($("#in_stok_2").val());
                        var kuantitas = parseInt($("#in_kuantitas_2").val());
                        if(stok == 0) {
                            alert("BARANG TELAH HABIS!");
                            $("#in_kuantitas_2").val(stok);
                        }else if(kuantitas > stok) {
                            alert("STOK TIDAK CUKUP!");
                            $("#in_kuantitas_2").val(stok);
                        }
                        var total = $("#in_kuantitas_2").val() * $("#in_harga_2").val();
                        var formatted = total.toLocaleString();
                        $("#in_total_2").val(total);
                        $("#total_2").html(formatted);
                    }

                    $("#in_kuantitas_2,#kode_2").change(function () {
                        item_2();
                    });
                    
                    item_3();
                    function item_3() {
                        var stok = parseInt($("#in_stok_3").val());
                        var kuantitas = parseInt($("#in_kuantitas_3").val());
                        if(stok == 0) {
                            alert("BARANG TELAH HABIS!");
                            $("#in_kuantitas_3").val(stok);
                        }else if(kuantitas > stok) {
                            alert("STOK TIDAK CUKUP!");
                            $("#in_kuantitas_3").val(stok);
                        }
                        var total = $("#in_kuantitas_3").val() * $("#in_harga_3").val();
                        var formatted = total.toLocaleString();
                        $("#in_total_3").val(total);
                        $("#total_3").html(formatted);
                    }

                    $("#in_kuantitas_3,#kode_3").change(function () {
                        item_3();
                    });
                    
                    item_4();
                    function item_4() {
                        var stok = parseInt($("#in_stok_4").val());
                        var kuantitas = parseInt($("#in_kuantitas_4").val());
                        if(stok == 0) {
                            alert("BARANG TELAH HABIS!");
                            $("#in_kuantitas_4").val(stok);
                        }else if(kuantitas > stok) {
                            alert("STOK TIDAK CUKUP!");
                            $("#in_kuantitas_4").val(stok);
                        }
                        var total = $("#in_kuantitas_4").val() * $("#in_harga_4").val();
                        var formatted = total.toLocaleString();
                        $("#in_total_4").val(total);
                        $("#total_4").html(formatted);
                    }

                    $("#in_kuantitas_4,#kode_4").change(function () {
                        item_4();
                    });
                    
                    item_5();
                    function item_5() {
                        var stok = parseInt($("#in_stok_5").val());
                        var kuantitas = parseInt($("#in_kuantitas_5").val());
                        if(stok == 0) {
                            alert("BARANG TELAH HABIS!");
                            $("#in_kuantitas_5").val(stok);
                        }else if(kuantitas > stok) {
                            alert("STOK TIDAK CUKUP!");
                            $("#in_kuantitas_5").val(stok);
                        }
                        var total = $("#in_kuantitas_5").val() * $("#in_harga_5").val();
                        var formatted = total.toLocaleString();
                        $("#in_total_5").val(total);
                        $("#total_5").html(formatted);
                    }

                    $("#in_kuantitas_5,#kode_5").change(function () {
                        item_5();
                    });

                    //TOTAL BAYAR
                    total_bayar();
                    function total_bayar() {
                        var total_bayar = parseInt($("#in_total_1").val()) + parseInt($("#in_total_2").val()) + parseInt($("#in_total_3").val()) + parseInt($("#in_total_4").val()) + parseInt($("#in_total_5").val());
                        $("#total_bayar").html(total_bayar.toLocaleString());
                    }

                    $("#in_kuantitas_1,#in_kuantitas_2,#in_kuantitas_3,#in_kuantitas_4,#in_kuantitas_5").change(function () {
                        total_bayar();
                    });

                    //AJAX
                    $("#kode_1").change(function () {
                        var kode = $("#kode_1").val();
                        $.ajax({
                            method: "GET",
                            url: "php/get_name_and_price_1.php?kode=" + kode,
                            success: function (response) {
                                $(".hidden_div_1").html(response);
                                var nama_1 = $(".hidden_div_1").find("#nama_1").html();
                                $("#nama_1").html(nama_1);
                                var harga_1 = parseInt($(".hidden_div_1").find("#harga_1").html());
                                $("#in_harga_1").val(harga_1);
                                var harga_format_1 = harga_1.toLocaleString();
                                $("#formatted_1").html(harga_format_1);
                                var stok_1 = parseInt($(".hidden_div_1").find("#stok_1").html());
                                $("#in_stok_1").val(stok_1);
                            }
                        });

                    });
                    
                    $("#kode_2").change(function () {
                        var kode = $("#kode_2").val();
                        $.ajax({
                            method: "GET",
                            url: "php/get_name_and_price_2.php?kode=" + kode,
                            success: function (response) {
                                $(".hidden_div_2").html(response);
                                var nama_2 = $(".hidden_div_2").find("#nama_2").html();
                                $("#nama_2").html(nama_2);
                                var harga_2 = parseInt($(".hidden_div_2").find("#harga_2").html());
                                $("#in_harga_2").val(harga_2);
                                var harga_format_2 = harga_2.toLocaleString();
                                $("#formatted_2").html(harga_format_2);
                                var stok_2 = parseInt($(".hidden_div_2").find("#stok_2").html());
                                $("#in_stok_2").val(stok_2);
                            }
                        });

                    });
                    
                    $("#kode_3").change(function () {
                        var kode = $("#kode_3").val();
                        $.ajax({
                            method: "GET",
                            url: "php/get_name_and_price_3.php?kode=" + kode,
                            success: function (response) {
                                $(".hidden_div_3").html(response);
                                var nama_3 = $(".hidden_div_3").find("#nama_3").html();
                                $("#nama_3").html(nama_3);
                                var harga_3 = parseInt($(".hidden_div_3").find("#harga_3").html());
                                $("#in_harga_3").val(harga_3);
                                var harga_format_3 = harga_3.toLocaleString();
                                $("#formatted_3").html(harga_format_3);
                                var stok_3 = parseInt($(".hidden_div_3").find("#stok_3").html());
                                $("#in_stok_3").val(stok_3);
                            }
                        });

                    });
                    
                    $("#kode_4").change(function () {
                        var kode = $("#kode_4").val();
                        $.ajax({
                            method: "GET",
                            url: "php/get_name_and_price_4.php?kode=" + kode,
                            success: function (response) {
                                $(".hidden_div_4").html(response);
                                var nama_4 = $(".hidden_div_4").find("#nama_4").html();
                                $("#nama_4").html(nama_4);
                                var harga_4 = parseInt($(".hidden_div_4").find("#harga_4").html());
                                $("#in_harga_4").val(harga_4);
                                var harga_format_4 = harga_4.toLocaleString();
                                $("#formatted_4").html(harga_format_4);
                                var stok_4 = parseInt($(".hidden_div_4").find("#stok_4").html());
                                $("#in_stok_4").val(stok_4);
                            }
                        });

                    });
                    
                    $("#kode_5").change(function () {
                        var kode = $("#kode_5").val();
                        $.ajax({
                            method: "GET",
                            url: "php/get_name_and_price_5.php?kode=" + kode,
                            success: function (response) {
                                $(".hidden_div_5").html(response);
                                var nama_5 = $(".hidden_div_5").find("#nama_5").html();
                                $("#nama_5").html(nama_5);
                                var harga_5 = parseInt($(".hidden_div_5").find("#harga_5").html());
                                $("#in_harga_5").val(harga_5);
                                var harga_format_5 = harga_5.toLocaleString();
                                $("#formatted_5").html(harga_format_5);
                                var stok_5 = parseInt($(".hidden_div_5").find("#stok_5").html());
                                $("#in_stok_5").val(stok_5);
                            }
                        });

                    });


                    //TAMBAH FIELD
                    function tambah() {
                        var length = $(".input").length + 1;
                        $("#item_" + length).attr("class", "input");
                        $("#item_" + length).css("display", "block");
                    }


</script>

</body>
</html>