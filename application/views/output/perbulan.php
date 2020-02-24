<?php


@ $bulan = $_POST['bulan'];
@ $bln = explode('-', $bulan);


if($bln[1] == 1){
    $b = 'Januari' ;
}elseif($bln[1] == 2){
    $b = 'Februari';
}elseif($bln[1] == 3){
    $b = 'Maret'   ;
}elseif($bln[1] == 4){
    $b = 'April' ;
}elseif($bln[1] == 5){
    $b = 'Mei'   ;
}elseif($bln[1] == 6){
    $b = 'Juni'  ;
}elseif($bln[1] == 7){
    $b = 'juli'  ;
}elseif($bln[1] == 8){
    $b = 'Agustus'; 
}elseif($bln[1] == 9){
    $b = 'September'; 
}elseif($bln[1] == 10){
    $b = 'Oktober' ;
}elseif($bln[1] == 11){
    $b = 'November'; 
}else{
    $b = 'Desember' ;
}

?>
<!DOCTYPE html>

<head>
    <title>Kafka Kids</title>
    <link rel="shortcut icon" type="image/x-icon" href="/assets/foto_produk/logo.png">
    <!-- <?php include('components/head.php'); ?> -->
</head>

<body>
    <div class="container">
        <br>
        <br>
        <div class="row">
        <div class="col-sm-3">
                    <img style="width:250px;"  height="170px" src="assets/foto_produk/logo.png">
                </div>
                <div class="col-sm-9" style='margin-top:10px'>
            <h1>KAFKA KIDS</h1>
                <h5>JALAN LINTAS SUMATERA SUNGAI RUMBAI KABUPATEN DHARMASRAYA</h5>
                <h5>WA : 081363967072b <b>/</b> 085383836108</h5>
              
                <hr style="display: block; height: 1px;border: 0; border-top: 1px solid #ccc;margin: 1em 0; padding: 0;">
            </div>
        </div>
        <br>
        <h3 class="col-sm-12" align="center">Laporan Data Penjualan </h3>
        <h3 class="col-sm-12" align="center">Bulan <?php echo  @ $b."&nbsp".$bln[0]  ?></h3>

        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-md-12 col-sm-12 margin-bottom-30">
                <div class="table-responsive">
                    <br>
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th width="10px">No</th>
                                <th>Nama Member</th>
                                <th>No Hp</th>
                                <th>Tanggal Pembelian</th>
                                <th>Tujuan Pengiriman</th>
                                <th>Jumlah Pembelian</th>
                                <th>Total Pembelian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            @ $bulan = $_POST['bulan'];
                            $ambil = $koneksi->query("SELECT
                            *,sum(pembelian_produk_jumlah) as pj
                            FROM
                            tb_pembelian INNER JOIN
                            tb_member ON tb_pembelian.member_id = tb_member.member_id INNER JOIN
                            tb_ongkir ON tb_pembelian.ongkir_id = tb_ongkir.ongkir_id INNER JOIN
                            tb_pembelian_produk ON tb_pembelian.pembelian_id = tb_pembelian_produk.pembelian_id  WHERE tb_pembelian.pembelian_tgl LIKE '$bulan%' group BY tb_pembelian_produk.pembelian_id ");
                            while ($pecah = $ambil->fetch_object()) {
                                @ $ttl += $pecah->pembelian_total;
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $pecah->member_nama ?></td>
                                    <td><?php echo $pecah->member_nohp ?></td>
                                    <td><?php echo tgl_indo($pecah->pembelian_tgl) ?></td>
                                    <td><?php echo $pecah->pembelian_kota ?></td>
                                     <td><?php echo number_format($pecah->pj) ?></td>
                                    <td>Rp. <?php echo number_format($pecah->pembelian_total) ?></td>
                                </tr>
                            <?php } ?>
                        <tfoot>
                            <tr>
                                <td colspan="6">Total</td>
                                <td>Rp. <?php echo number_format(@ $ttl) ?></td>
                            </tr>
                        </tfoot>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>
    <table width=80% align="center">
  <tr>
    <td colspan="2"></td>
    <td width="286"></td>
  </tr>
  <tr>
    <td width="230" align="center"> <br> 
   </td>
    <td width="530"></td>
    
    <td align="center"><?php  
      $bulan = array(
                '01' => 'JANUARI',
                '02' => 'FEBRUARI',
                '03' => 'MARET',
                '04' => 'APRIL',
                '05' => 'MEI',
                '06' => 'JUNI',
                '07' => 'JULI',
                '08' => 'AGUSTUS',
                '09' => 'SEPTEMBER',
                '10' => 'OKTOBER',
                '11' => 'NOVEMBER',
                '12' => 'DESEMBER',
        );
    ?>

    Sungai Rumbai, <?php echo date('d').' '.(strtolower($bulan[date('m')])).' '.date('Y') ?> <br><span>Diketahui Oleh</span></td>
  </tr>
  <tr>
    <td align="center"><br /><br /><br /><br /><br />
     <br /><br /><br /></td>
    <td>&nbsp;</td>
    <td align="center" valign="top"><br /><br /><br />
      ( Muhammad Ikhsan )<br />
    </td>
  </tr>
  
  
</table>
</body>

</html>