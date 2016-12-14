<?php
/**
 * Description of per_beli
 *
 * @author Norman Syarif
 */
require_once 'top.php';
require_once 'php/connect.php';
?>

<div class="menu-list">
    <ul>
        <span><li class="inaktif"><a href="penjualan.php">Nota Penjualan</a></li></span>
        <span><li class="inaktif"><a href="daftar_jual.php">Penjualan</a></li></span>
        <span><li class="aktif"><a href="daftar_beli.php">Pembelian</a></li></span>
        <span><li class="inaktif"><a href="beban.php">Beban</a></li></span>
        <span><li class="inaktif"><a href="stok.php">Stok Barang</a></li></span>
        <span><li class="inaktif"><a href="pilih_periode.php">Laporan Laba-rugi</a></li></span>
    </ul>
</div>
</div>

<div id="content" class="container col-md-9setengah">

    <p style="text-align: center; margin-top: 50px; font-weight: bold; font-size: 120%">Pilih periode:</p>

    <div class="row col-md-offset-4">

        <div class="anggota-div" style="width: 45%">
            
            <div id="tabel">
                
                <form method="get" action="daftar_beli.php" class="form-inline">
                    <select name="bulan" class="form-control">
                        <option value="00">-Pilih Bulan-</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                    <select name="tahun" class="form-control">
                        <option value="00">-Pilih Tahun-</option>
                        <option value="10">2010</option>
                        <option value="11">2011</option>
                        <option value="12">2012</option>
                        <option value="13">2013</option>
                        <option value="14">2014</option>
                        <option value="15">2015</option>
                        <option value="16">2016</option>
                        <option value="17">2017</option>
                        <option value="18">2018</option>
                        <option value="19">2019</option>
                        <option value="20">2020</option>
                    </select>
                    <button class="form-control btn btn-primary" type="submit">OK</button>
                </form>

            </div>
            
        </div>
        
    </div>
    <?php
    if(isset($_GET['notfound'])) {
        echo '<div style="width: 50%; margin: 0 auto; margin-top: 70px" class="alert alert-danger">Data tidak ditemukan!</div>';
    }
    ?>
    
</div>
</div>

<?php include 'bottom.php' ?>