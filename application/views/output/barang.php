
<?php $this->load->view('header')?>
<div class="row">
    <div class="col-md-12">

        <!-- START DEFAULT DATATABLE -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Entry Data Barang Suku Cadang</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                    
                </ul>
            </div>
            <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-info" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                            <?php endif; ?>
            <div class="panel-body">
                <a href="<?= site_url('HomeCtr/barang_add') ?>" style='margin-bottom:10px' class="btn btn-info">Tambah Data</a>
                <a href="<?= site_url('HomeCtr/stok_view') ?>" style='margin-bottom:10px' class="btn btn-default">Management Stock Barang <i class="fa fa-bookmark"></i><sup class="text-danger"><b><?= $dt_stok ?></b></sup></a>

                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Suku Cadang</th>
                            <th>Nama Brand</th>
                            <th>Nama Suku Cadang</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                    <?php foreach($dt_barang as $no => $d): ?>
                        <tr>
                          <td><?= $no+1; ?></td>
                          <td><?= $d->kode_barang ?></td>
                          <td><?= $d->nama_brand ?></td>
                          <td><?= $d->nama_barang ?></td>
                          <td>Rp. <?= $d->harga ?></td>
                          <td><?= $d->jumlah ?></td>
                          <td><?= $d->tgl_masuk ?></td>
                          <td class="text-center">
                            <a href="<?php echo base_url('HomeCtr/barang_edd/').$d->id_barang ?>" class="text-info"> <span class="fa fa-list"></span> Edit</a>
                            <a href="<?php echo base_url('HomeCtr/barang_del/').$d->id_barang  ?>" class="text-danger"><span class="fa fa-trash-o"></span> Hapus</a>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END DEFAULT DATATABLE -->


    </div>
</div>
<?php $this->load->view('footer') ?>