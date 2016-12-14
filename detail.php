<?php
require_once 'php/connect.php';
$nomor = $_GET['nomor'];
$query = "SELECT * FROM tb_transaksi INNER JOIN tb_detail_transaksi INNER JOIN tb_barang ON tb_transaksi.nomor=tb_detail_transaksi.nomor AND tb_detail_transaksi.kode_barang=tb_barang.kode_barang WHERE tb_detail_transaksi.nomor='$nomor'";
?>

<html>
    <head>
        <title>Kwitansi</title>
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
                <p style="margin-top: 30px; margin-left: 10px; font-size: 74%">Nomor : <?php echo $nomor ?></p>
                <table>
                    <tr>
                        <th style="width: 10px">No.</th>
                        <th style="width: 190px">Nama Barang</th>
                        <th style="width: 100px">Harga Satuan</th>
                        <th style="width: 50px">Kuantitas</th>
                        <th style="width: 100px">Total</th>
                    </tr>
                    
                    <?php
                    $result = $mysqli->query($query);
                    if($result->num_rows != 0) {
                        $no = 1;
                        while ($row=$result->fetch_assoc()) {
                            $total = $row['harga'] * $row['kuantitas'];
                            $bayar = $row['bayar'];
                            echo "<tr>"
                            . "<td>".$no."</td>"
                                    . "<td>".$row['nama_barang']."</td>"
                                    . "<td>Rp. ".number_format($row['harga']).",-</td>"
                                    . "<td>".$row['kuantitas']."</td>"
                                    . "<td>Rp. ".number_format($total).",-</td></tr>";
                        
                            $no++;
                        }
                        echo "<tr><th colspan='4'>Total Bayar</th><th>Rp. ".number_format($bayar).",-</th></tr>";
                    }
//                    ?>

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
