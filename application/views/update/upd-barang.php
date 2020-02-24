
<?php $this->load->view("header") ?>
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal" method='POST' action="<?php echo site_url('HomeCtr/barang_update') ?>" >
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> Edit <strong>Barang</strong></h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <p>Edit Barang Untuk Menambahkan  Barang</p>
                </div>
                <div class="panel-body">
               
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Id Suku Cadang</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="hidden" class="form-control"  name="id_sc" value="<?php echo $up_barang->id_barang ?>" />
                                <input type="text" class="form-control"  name="kd_sc" value="<?php echo $up_barang->kode_barang ?>" />
                            </div>
                            
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Nama Mesin</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                               <select name="id_brand" id="" class="form-control">
                               <?php foreach($dt_mesin as $d) : ?>
                               <option <?php if($d->id_brand == $up_barang->id_brand) { echo "selected"; } ?> value="<?= $d->id_brand ?>"><?= $d->nama_brand ?></option>

                               <?php endforeach ; ?>
                               </select>
                            </div>
                            
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Nama Suku Cadang</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="form-control"  name="nm_sc" value="<?php echo $up_barang->nama_barang ?>" />
                                
                            </div>
                            <?php echo form_error('nm_sc', '<small class="text-danger pl-3">', '</small>'); ?>
                            
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Jumlah</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="number" class="form-control"  name="jumlah" value="<?php echo $up_barang->jumlah ?>" />
                            </div>
                            
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Harga</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="number" class="form-control"  name="harga" value="<?php echo $up_barang->harga ?>" />
                            </div>
                            
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Tanggal</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="date" class="form-control"  name="tanggal" value="<?php echo $up_barang->tgl_masuk ?>" />
                            </div>
                            
                        </div>
                    </div>

                </div>
                <div class="panel-footer">
                    <button class="btn btn-default">Clear Form</button>
                    <button class="btn btn-info">Update</button>
                </div>
            </div>
        </form>

    </div>
</div>

<?php $this->load->view("footer") ?>