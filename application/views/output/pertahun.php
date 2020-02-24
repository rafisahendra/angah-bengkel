<?php
include('koneksi.php');
@ $tahun = $_POST['tahun'];
?>
<!DOCTYPE html>

<head>
    <title>Kafka Kids</title>
    <link rel="shortcut icon" type="image/x-icon" href="/assets/foto_produk/logo.png">
    <?php include('components/head.php'); ?>
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
        <h3 class="col-sm-12" align="center">Laporan Data Penjualan</h3>
        <h3 class="col-sm-12" align="center">Tahun <?php echo $tahun  ?></h3>
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
                                <th width="30px">No</th>
                                <th>Bulan</th>
                                <th>Jumlah Transaksi</th>
                                <th>Total </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                           @ $tahun = $_POST['tahun'];
                           $ambil = $koneksi->query("SELECT *,sum(pembelian_jml) as pj, sum(pembelian_total) as pt , MONTH(pembelian_tgl) as bln FROM tb_pembelian WHERE  YEAR(pembelian_tgl)='$tahun' Group BY MONTH(pembelian_tgl)");     
                           while ($pecah = $ambil->fetch_array()) {
                               

                           $bl = $pecah['bln'];
                               if($bl == 1){
                                   $b = 'Januari' ;
                               }elseif($bl == 2){
                                   $b = 'Februari';
                               }elseif($bl == 3){
                                   $b = 'Maret'   ;
                               }elseif($bl == 4){
                                   $b = 'April' ;
                               }elseif($bl == 5){
                                   $b = 'Mei'   ;
                               }elseif($bl == 6){
                                   $b = 'Juni'  ;
                               }elseif($bl == 7){
                                   $b = 'juli'  ;
                               }elseif($bl == 8){
                                   $b = 'Agustus'; 
                               }elseif($bl == 9){
                                   $b = 'September'; 
                               }elseif($bl == 10){
                                   $b = 'Oktober' ;
                               }elseif($bl == 11){
                                   $b = 'November'; 
                               }else{
                                   $b = 'Desember' ;
                               }


                           $total += $pecah['pt'];
                               ?>
                                   <tr>
                                     <td><?php echo $no++ ?></td>
                                     <td><?= $b ?></td>
                                     <td><?= $pecah['pj'] ?></td>
                                   <td>Rp. <?= number_format($pecah['pt'] )?></td>
                                   </tr>
                                   
                                   <?php }?>
                                         
                        <tfoot>
                            <tr>
                                <td colspan="3">Total</td>
                                <td>Rp. <?php echo number_format(@ $total) ?></td>
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