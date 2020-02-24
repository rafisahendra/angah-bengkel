<?php $this->load->view("header") ?>
<div class="row">
    <div class="col-md-12">

        <!-- START DEFAULT DATATABLE -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Transaksi Pembelian</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                </ul>
            </div>

            <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-info" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                            <?php endif; ?>

                            <?php if ($this->session->flashdata('delete')): ?>
            <div class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <?php echo $this->session->flashdata('delete'); ?>
                            </div>
                            <?php endif; ?>

            <div class="panel-body">
                <a href="<?= base_url('HomeCtr/transaksi_tambah_view') ?>" style='margin-bottom:10px' class="btn btn-info">Tambah Data</a>
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>id_transaksi</th>
                            <th>Nama Pembeli</th>
                            <th>Qty</th>
                            <th>Tanggal Transaksi</th>
                            <th>Total</th>
                            <th>Aksi</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                      <?php foreach($dt_transaksi as $no => $d) :?>
                        <tr>
                          <td><?php echo $no+1 ?></td>
                          <td><?php echo $d->id_transaksi ?></td>
                          <td><?php echo $d->nama_pembeli ?></td>
                          <td><?php echo $d->qty ?></td>
                          <td><?php echo $d->tgl_transaksi ?></td>
                          <td><?php echo $d->total ?></td>
                          <td>
                          <a href="<?php echo base_url('HomeCtr/detail_view/'.$d->id_transaksi) ?>" class="text-info"><span class="fa fa-list"></span> Detail</a>
                            <a href="<?php echo base_url('HomeCtr/transaksi_del/'.$d->id_transaksi) ?>" class="text-danger"><span class="fa fa-trash-o"></span> Hapus</a>
                          </td>
                    
                        </tr>
                       <?php endforeach ; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END DEFAULT DATATABLE -->


    </div>
</div>


<?php $this->load->view("footer") ?>