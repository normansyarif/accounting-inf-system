<body onLoad="javascript:print()">
<html>
    <head>
        <title>Nota Penjualan</title>
        <style>
            table {
                border-collapse: collapse;
                font-size: 80%;
                margin: 0 auto;
                text-align: center;
            }
            table, th, td {
                border: 1px solid black;
                padding: 5px 1px;
            }
            
        </style>
    </head>
    <body>

        <div style="font-family: arial, sans-serif; margin: 10px; border: 1px solid black; height: 600px; width: 500px">
            <div id="judul">
                <h3 style="text-align: center">Nota Penjualan</h3>
                <p style="font-weight: bold; font-size: 90%; text-align: center">Toko Komputer "Serba KW"</p>
                <p style="font-size: 80%; text-align: center">Jln. Berlubang, RT 1, RW 5, Amsterdam, Spanyol.</p>
                <p style="font-size: 80%; text-align: center">Telp: 0852 xxxx xxxx</p>
                <p style="margin-top: 30px; margin-left: 10px; font-size: 74%">Nomor : <?php echo $_GET['no_kwitansi'] ?></p>
                <table>
                    <tr>
                        <th style="width: 10px">No.</th>
                        <th style="width: 190px">Nama Barang</th>
                        <th style="width: 100px">Harga Satuan</th>
                        <th style="width: 50px">Kuantitas</th>
                        <th style="width: 100px">Total</th>
                    </tr>

                        <?php
                        /**
                         * Description of nota
                         *
                         * @author Norman Syarif
                         */
                        session_start();
                        require_once 'php/connect.php';
                        
                        $nomor = $_GET['no_kwitansi'];
                        $pembeli = $_GET['pembeli'];
                        $tanggal = date("Y-m-d");
                        $periode = $_SESSION['periode'];
                        
                        if ($_GET['kode_1'] != '' 
                                && $_GET['kode_2'] == '' 
                                && $_GET['kode_3'] == '' 
                                && $_GET['kode_4'] == '' 
                                && $_GET['kode_5'] == '') {
                            $kode_1 = $_GET['kode_1'];
                            $kuantitas_1 = $_GET['kuantitas_1'];
                            $query_1 = "SELECT * FROM tb_barang WHERE kode_barang='$kode_1'";
                            $result_1 = $mysqli->query($query_1);
                            $row_1 = $result_1->fetch_assoc();
                            $total_1 = $row_1['harga_satuan']*$kuantitas_1;
                            echo "<tr><td>1</td>";
                            echo "<td>".$row_1['nama_barang']."</td>";
                            echo "<td>Rp. ".number_format($row_1['harga_satuan']).",-</td>";
                            echo "<td>".$kuantitas_1."</td>";
                            echo "<td>Rp. ".number_format($total_1).",-</td></tr>";
                            
                            $total_bayar = $total_1;
                            echo "<tr><th colspan='4'>Total Bayar</th>";
                            echo "<th>Rp. ". number_format($total_1).",-</th></tr>";
                            
                            $stok_baru_1 = $row_1['stok'] - $kuantitas_1;
                            $mysqli->query("UPDATE `tb_barang` SET `stok`=$stok_baru_1 WHERE kode_barang='$kode_1'");
                            
                            $harga_satuan_1 = $row_1['harga_satuan'];
                            $mysqli->query("INSERT INTO `tb_detail_transaksi`(`nomor`, `kode_barang`, `harga`, `kuantitas`) VALUES ('$nomor','$kode_1',$harga_satuan_1,$kuantitas_1)");
                            
                        } elseif ($_GET['kode_1'] != '' 
                                && $_GET['kode_2'] != '' 
                                && $_GET['kode_3'] == '' 
                                && $_GET['kode_4'] == '' 
                                && $_GET['kode_5'] == '') {
                            $kode_1 = $_GET['kode_1'];
                            $kuantitas_1 = $_GET['kuantitas_1'];
                            $query_1 = "SELECT * FROM tb_barang WHERE kode_barang='$kode_1'";
                            $result_1 = $mysqli->query($query_1);
                            $row_1 = $result_1->fetch_assoc();
                            $total_1 = $row_1['harga_satuan']*$kuantitas_1;
                            echo "<tr><td>1</td>";
                            echo "<td>".$row_1['nama_barang']."</td>";
                            echo "<td>Rp. ".number_format($row_1['harga_satuan']).",-</td>";
                            echo "<td>".$kuantitas_1."</td>";
                            echo "<td>Rp. ".number_format($total_1).",-</td></tr>";
                            
                            $kode_2 = $_GET['kode_2'];
                            $kuantitas_2 = $_GET['kuantitas_2'];
                            $query_2 = "SELECT * FROM tb_barang WHERE kode_barang='$kode_2'";
                            $result_2 = $mysqli->query($query_2);
                            $row_2 = $result_2->fetch_assoc();
                            $total_2 = $row_2['harga_satuan']*$kuantitas_2;
                            echo "<tr><td>2</td>";
                            echo "<td>".$row_2['nama_barang']."</td>";
                            echo "<td>Rp. ".number_format($row_2['harga_satuan']).",-</td>";
                            echo "<td>".$kuantitas_2."</td>";
                            echo "<td>Rp. ".number_format($total_2).",-</td></tr>";
                            
                            $total_bayar = $total_1 + $total_2;
                            echo "<tr><th colspan='4'>Total Bayar</th>";
                            echo "<th>Rp. ". number_format($total_bayar).",-</th></tr>";
                            
                            $stok_baru_1 = $row_1['stok'] - $kuantitas_1;
                            $mysqli->query("UPDATE `tb_barang` SET `stok`=$stok_baru_1 WHERE kode_barang='$kode_1'");
                            $stok_baru_2 = $row_2['stok'] - $kuantitas_2;
                            $mysqli->query("UPDATE `tb_barang` SET `stok`=$stok_baru_2 WHERE kode_barang='$kode_2'");
                            
                            $harga_satuan_1 = $row_1['harga_satuan'];
                            $mysqli->query("INSERT INTO `tb_detail_transaksi`(`nomor`, `kode_barang`, `harga`, `kuantitas`) VALUES ('$nomor','$kode_1',$harga_satuan_1,$kuantitas_1)");
                            $harga_satuan_2 = $row_2['harga_satuan'];
                            $mysqli->query("INSERT INTO `tb_detail_transaksi`(`nomor`, `kode_barang`, `harga`, `kuantitas`) VALUES ('$nomor','$kode_2',$harga_satuan_2,$kuantitas_2)");
                            
                        } elseif ($_GET['kode_1'] != '' 
                                && $_GET['kode_2'] != '' 
                                && $_GET['kode_3'] != '' 
                                && $_GET['kode_4'] == '' 
                                && $_GET['kode_5'] == '') {
                            $kode_1 = $_GET['kode_1'];
                            $kuantitas_1 = $_GET['kuantitas_1'];
                            $query_1 = "SELECT * FROM tb_barang WHERE kode_barang='$kode_1'";
                            $result_1 = $mysqli->query($query_1);
                            $row_1 = $result_1->fetch_assoc();
                            $total_1 = $row_1['harga_satuan']*$kuantitas_1;
                            echo "<tr><td>1</td>";
                            echo "<td>".$row_1['nama_barang']."</td>";
                            echo "<td>Rp. ".number_format($row_1['harga_satuan']).",-</td>";
                            echo "<td>".$kuantitas_1."</td>";
                            echo "<td>Rp. ".number_format($total_1).",-</td></tr>";
                            
                            $kode_2 = $_GET['kode_2'];
                            $kuantitas_2 = $_GET['kuantitas_2'];
                            $query_2 = "SELECT * FROM tb_barang WHERE kode_barang='$kode_2'";
                            $result_2 = $mysqli->query($query_2);
                            $row_2 = $result_2->fetch_assoc();
                            $total_2 = $row_2['harga_satuan']*$kuantitas_2;
                            echo "<tr><td>2</td>";
                            echo "<td>".$row_2['nama_barang']."</td>";
                            echo "<td>Rp. ".number_format($row_2['harga_satuan']).",-</td>";
                            echo "<td>".$kuantitas_2."</td>";
                            echo "<td>Rp. ".number_format($total_2).",-</td></tr>";
                            
                            $kode_3 = $_GET['kode_3'];
                            $kuantitas_3 = $_GET['kuantitas_3'];
                            $query_3 = "SELECT * FROM tb_barang WHERE kode_barang='$kode_3'";
                            $result_3 = $mysqli->query($query_3);
                            $row_3 = $result_3->fetch_assoc();
                            $total_3 = $row_3['harga_satuan']*$kuantitas_3;
                            echo "<tr><td>3</td>";
                            echo "<td>".$row_3['nama_barang']."</td>";
                            echo "<td>Rp. ".number_format($row_3['harga_satuan']).",-</td>";
                            echo "<td>".$kuantitas_3."</td>";
                            echo "<td>Rp. ".number_format($total_3).",-</td></tr>";
                            
                            $total_bayar = $total_1 + $total_2 + $total_3;
                            echo "<tr><th colspan='4'>Total Bayar</th>";
                            echo "<th>Rp. ". number_format($total_bayar).",-</th></tr>";
                            
                            $stok_baru_1 = $row_1['stok'] - $kuantitas_1;
                            $mysqli->query("UPDATE `tb_barang` SET `stok`=$stok_baru_1 WHERE kode_barang='$kode_1'");
                            $stok_baru_2 = $row_2['stok'] - $kuantitas_2;
                            $mysqli->query("UPDATE `tb_barang` SET `stok`=$stok_baru_2 WHERE kode_barang='$kode_2'");
                            $stok_baru_3 = $row_3['stok'] - $kuantitas_3;
                            $mysqli->query("UPDATE `tb_barang` SET `stok`=$stok_baru_3 WHERE kode_barang='$kode_3'");
                            
                            $harga_satuan_1 = $row_1['harga_satuan'];
                            $mysqli->query("INSERT INTO `tb_detail_transaksi`(`nomor`, `kode_barang`, `harga`, `kuantitas`) VALUES ('$nomor','$kode_1',$harga_satuan_1,$kuantitas_1)");
                            $harga_satuan_2 = $row_2['harga_satuan'];
                            $mysqli->query("INSERT INTO `tb_detail_transaksi`(`nomor`, `kode_barang`, `harga`, `kuantitas`) VALUES ('$nomor','$kode_2',$harga_satuan_2,$kuantitas_2)");
                            $harga_satuan_3 = $row_3['harga_satuan'];
                            $mysqli->query("INSERT INTO `tb_detail_transaksi`(`nomor`, `kode_barang`, `harga`, `kuantitas`) VALUES ('$nomor','$kode_3',$harga_satuan_3,$kuantitas_3)");
                            
                        } elseif ($_GET['kode_1'] != '' 
                                && $_GET['kode_2'] != '' 
                                && $_GET['kode_3'] != '' 
                                && $_GET['kode_4'] != '' 
                                && $_GET['kode_5'] == '') {
                            $kode_1 = $_GET['kode_1'];
                            $kuantitas_1 = $_GET['kuantitas_1'];
                            $query_1 = "SELECT * FROM tb_barang WHERE kode_barang='$kode_1'";
                            $result_1 = $mysqli->query($query_1);
                            $row_1 = $result_1->fetch_assoc();
                            $total_1 = $row_1['harga_satuan']*$kuantitas_1;
                            echo "<tr><td>1</td>";
                            echo "<td>".$row_1['nama_barang']."</td>";
                            echo "<td>Rp. ".number_format($row_1['harga_satuan']).",-</td>";
                            echo "<td>".$kuantitas_1."</td>";
                            echo "<td>Rp. ".number_format($total_1).",-</td></tr>";
                            
                            $kode_2 = $_GET['kode_2'];
                            $kuantitas_2 = $_GET['kuantitas_2'];
                            $query_2 = "SELECT * FROM tb_barang WHERE kode_barang='$kode_2'";
                            $result_2 = $mysqli->query($query_2);
                            $row_2 = $result_2->fetch_assoc();
                            $total_2 = $row_2['harga_satuan']*$kuantitas_2;
                            echo "<tr><td>2</td>";
                            echo "<td>".$row_2['nama_barang']."</td>";
                            echo "<td>Rp. ".number_format($row_2['harga_satuan']).",-</td>";
                            echo "<td>".$kuantitas_2."</td>";
                            echo "<td>Rp. ".number_format($total_2).",-</td></tr>";
                            
                            $kode_3 = $_GET['kode_3'];
                            $kuantitas_3 = $_GET['kuantitas_3'];
                            $query_3 = "SELECT * FROM tb_barang WHERE kode_barang='$kode_3'";
                            $result_3 = $mysqli->query($query_3);
                            $row_3 = $result_3->fetch_assoc();
                            $total_3 = $row_3['harga_satuan']*$kuantitas_3;
                            echo "<tr><td>3</td>";
                            echo "<td>".$row_3['nama_barang']."</td>";
                            echo "<td>Rp. ".number_format($row_3['harga_satuan']).",-</td>";
                            echo "<td>".$kuantitas_3."</td>";
                            echo "<td>Rp. ".number_format($total_3).",-</td></tr>";
                            
                            $kode_4 = $_GET['kode_4'];
                            $kuantitas_4 = $_GET['kuantitas_4'];
                            $query_4 = "SELECT * FROM tb_barang WHERE kode_barang='$kode_4'";
                            $result_4 = $mysqli->query($query_4);
                            $row_4 = $result_4->fetch_assoc();
                            $total_4 = $row_4['harga_satuan']*$kuantitas_4;
                            echo "<tr><td>4</td>";
                            echo "<td>".$row_4['nama_barang']."</td>";
                            echo "<td>Rp. ".number_format($row_4['harga_satuan']).",-</td>";
                            echo "<td>".$kuantitas_4."</td>";
                            echo "<td>Rp. ".number_format($total_4).",-</td></tr>";
                            
                            $total_bayar = $total_1 + $total_2 + $total_3 + $total_4;
                            echo "<tr><th colspan='4'>Total Bayar</th>";
                            echo "<th>Rp. ". number_format($total_bayar).",-</th></tr>";
                            
                            $stok_baru_1 = $row_1['stok'] - $kuantitas_1;
                            $mysqli->query("UPDATE `tb_barang` SET `stok`=$stok_baru_1 WHERE kode_barang='$kode_1'");
                            $stok_baru_2 = $row_2['stok'] - $kuantitas_2;
                            $mysqli->query("UPDATE `tb_barang` SET `stok`=$stok_baru_2 WHERE kode_barang='$kode_2'");
                            $stok_baru_3 = $row_3['stok'] - $kuantitas_3;
                            $mysqli->query("UPDATE `tb_barang` SET `stok`=$stok_baru_3 WHERE kode_barang='$kode_3'");
                            $stok_baru_4 = $row_4['stok'] - $kuantitas_4;
                            $mysqli->query("UPDATE `tb_barang` SET `stok`=$stok_baru_4 WHERE kode_barang='$kode_4'");
                            
                            $harga_satuan_1 = $row_1['harga_satuan'];
                            $mysqli->query("INSERT INTO `tb_detail_transaksi`(`nomor`, `kode_barang`, `harga`, `kuantitas`) VALUES ('$nomor','$kode_1',$harga_satuan_1,$kuantitas_1)");
                            $harga_satuan_2 = $row_2['harga_satuan'];
                            $mysqli->query("INSERT INTO `tb_detail_transaksi`(`nomor`, `kode_barang`, `harga`, `kuantitas`) VALUES ('$nomor','$kode_2',$harga_satuan_2,$kuantitas_2)");
                            $harga_satuan_3 = $row_3['harga_satuan'];
                            $mysqli->query("INSERT INTO `tb_detail_transaksi`(`nomor`, `kode_barang`, `harga`, `kuantitas`) VALUES ('$nomor','$kode_3',$harga_satuan_3,$kuantitas_3)");
                            $harga_satuan_4 = $row_4['harga_satuan'];
                            $mysqli->query("INSERT INTO `tb_detail_transaksi`(`nomor`, `kode_barang`, `harga`, `kuantitas`) VALUES ('$nomor','$kode_4',$harga_satuan_4,$kuantitas_4)");
                        } else {
                            $kode_1 = $_GET['kode_1'];
                            $kuantitas_1 = $_GET['kuantitas_1'];
                            $query_1 = "SELECT * FROM tb_barang WHERE kode_barang='$kode_1'";
                            $result_1 = $mysqli->query($query_1);
                            $row_1 = $result_1->fetch_assoc();
                            $total_1 = $row_1['harga_satuan']*$kuantitas_1;
                            echo "<tr><td>1</td>";
                            echo "<td>".$row_1['nama_barang']."</td>";
                            echo "<td>Rp. ".number_format($row_1['harga_satuan']).",-</td>";
                            echo "<td>".$kuantitas_1."</td>";
                            echo "<td>Rp. ".number_format($total_1).",-</td></tr>";
                            
                            $kode_2 = $_GET['kode_2'];
                            $kuantitas_2 = $_GET['kuantitas_2'];
                            $query_2 = "SELECT * FROM tb_barang WHERE kode_barang='$kode_2'";
                            $result_2 = $mysqli->query($query_2);
                            $row_2 = $result_2->fetch_assoc();
                            $total_2 = $row_2['harga_satuan']*$kuantitas_2;
                            echo "<tr><td>2</td>";
                            echo "<td>".$row_2['nama_barang']."</td>";
                            echo "<td>Rp. ".number_format($row_2['harga_satuan']).",-</td>";
                            echo "<td>".$kuantitas_2."</td>";
                            echo "<td>Rp. ".number_format($total_2).",-</td></tr>";
                            
                            $kode_3 = $_GET['kode_3'];
                            $kuantitas_3 = $_GET['kuantitas_3'];
                            $query_3 = "SELECT * FROM tb_barang WHERE kode_barang='$kode_3'";
                            $result_3 = $mysqli->query($query_3);
                            $row_3 = $result_3->fetch_assoc();
                            $total_3 = $row_3['harga_satuan']*$kuantitas_3;
                            echo "<tr><td>3</td>";
                            echo "<td>".$row_3['nama_barang']."</td>";
                            echo "<td>Rp. ".number_format($row_3['harga_satuan']).",-</td>";
                            echo "<td>".$kuantitas_3."</td>";
                            echo "<td>Rp. ".number_format($total_3).",-</td></tr>";
                            
                            $kode_4 = $_GET['kode_4'];
                            $kuantitas_4 = $_GET['kuantitas_4'];
                            $query_4 = "SELECT * FROM tb_barang WHERE kode_barang='$kode_4'";
                            $result_4 = $mysqli->query($query_4);
                            $row_4 = $result_4->fetch_assoc();
                            $total_4 = $row_4['harga_satuan']*$kuantitas_4;
                            echo "<tr><td>4</td>";
                            echo "<td>".$row_4['nama_barang']."</td>";
                            echo "<td>Rp. ".number_format($row_4['harga_satuan']).",-</td>";
                            echo "<td>".$kuantitas_4."</td>";
                            echo "<td>Rp. ".number_format($total_4).",-</td></tr>";
                            
                            $kode_5 = $_GET['kode_5'];
                            $kuantitas_5 = $_GET['kuantitas_5'];
                            $query_5 = "SELECT * FROM tb_barang WHERE kode_barang='$kode_5'";
                            $result_5 = $mysqli->query($query_5);
                            $row_5 = $result_5->fetch_assoc();
                            $total_5 = $row_5['harga_satuan']*$kuantitas_5;
                            echo "<tr><td>5</td>";
                            echo "<td>".$row_5['nama_barang']."</td>";
                            echo "<td>Rp. ".number_format($row_5['harga_satuan']).",-</td>";
                            echo "<td>".$kuantitas_5."</td>";
                            echo "<td>Rp. ".number_format($total_5).",-</td></tr>";
                            
                            $total_bayar = $total_1 + $total_2 + $total_3 + $total_4 + $total_5;
                            echo "<tr><th colspan='4'>Total Bayar</th>";
                            echo "<th>Rp. ". number_format($total_bayar).",-</th></tr>";
                            
                            $stok_baru_1 = $row_1['stok'] - $kuantitas_1;
                            $mysqli->query("UPDATE `tb_barang` SET `stok`=$stok_baru_1 WHERE kode_barang='$kode_1'");
                            $stok_baru_2 = $row_2['stok'] - $kuantitas_2;
                            $mysqli->query("UPDATE `tb_barang` SET `stok`=$stok_baru_2 WHERE kode_barang='$kode_2'");
                            $stok_baru_3 = $row_3['stok'] - $kuantitas_3;
                            $mysqli->query("UPDATE `tb_barang` SET `stok`=$stok_baru_3 WHERE kode_barang='$kode_3'");
                            $stok_baru_4 = $row_4['stok'] - $kuantitas_4;
                            $mysqli->query("UPDATE `tb_barang` SET `stok`=$stok_baru_4 WHERE kode_barang='$kode_4'");
                            $stok_baru_5 = $row_5['stok'] - $kuantitas_5;
                            $mysqli->query("UPDATE `tb_barang` SET `stok`=$stok_baru_5 WHERE kode_barang='$kode_5'");
                            
                            $harga_satuan_1 = $row_1['harga_satuan'];
                            $mysqli->query("INSERT INTO `tb_detail_transaksi`(`nomor`, `kode_barang`, `harga`, `kuantitas`) VALUES ('$nomor','$kode_1',$harga_satuan_1,$kuantitas_1)");
                            $harga_satuan_2 = $row_2['harga_satuan'];
                            $mysqli->query("INSERT INTO `tb_detail_transaksi`(`nomor`, `kode_barang`, `harga`, `kuantitas`) VALUES ('$nomor','$kode_2',$harga_satuan_2,$kuantitas_2)");
                            $harga_satuan_3 = $row_3['harga_satuan'];
                            $mysqli->query("INSERT INTO `tb_detail_transaksi`(`nomor`, `kode_barang`, `harga`, `kuantitas`) VALUES ('$nomor','$kode_3',$harga_satuan_3,$kuantitas_3)");
                            $harga_satuan_4 = $row_4['harga_satuan'];
                            $mysqli->query("INSERT INTO `tb_detail_transaksi`(`nomor`, `kode_barang`, `harga`, `kuantitas`) VALUES ('$nomor','$kode_4',$harga_satuan_4,$kuantitas_4)");
                            $harga_satuan_5 = $row_5['harga_satuan'];
                            $mysqli->query("INSERT INTO `tb_detail_transaksi`(`nomor`, `kode_barang`, `harga`, `kuantitas`) VALUES ('$nomor','$kode_5',$harga_satuan_5,$kuantitas_5)");
                        }
                        $mysqli->query("INSERT INTO `tb_transaksi`(`nomor`, `pembeli`, `bayar`, `tanggal`, `periode`) VALUES ('$nomor','$pembeli',$total_bayar,'$tanggal','$periode')");

                        ?>


                </table>
                
                <div style="font-size: 75%; width: 200px; text-align: center;">
                    <p style="margin-top: 30px">Owner,</p>
                    <p>Toko Komputer "Serba KW"</p>
                    <p style="margin-top: 60px">(___________)</p>
                </div>
            </div>
        </div>

    </body>
</html>
