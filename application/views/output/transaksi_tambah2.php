<?php $this->load->view("header") ?>
<div class="row">
	<div class="col-md-12">
	<?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-info" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                            <?php endif; ?>


		<!-- START DEFAULT DATATABLE -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Tambah Transaksi Pembelian</h3>
				<ul class="panel-controls">
				
				</ul>
			</div>
			<div class="panel-body">
				<!-- <a href="/kategori/tambah" style='margin-bottom:10px' class="btn btn-info">Tambah Data</a> -->
				<form method='POST' action="<?php echo site_url('HomeCtr/detail_save') ?>">

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">No Transaksi</label>
								<?php if($dt_id->id_transaksi){  ?>
								<input type="text" name="id_tran" class="form-control" style="color:#000;" readonly
									value="<?php echo $dt_id->id_transaksi ?>">
								<?php }else{
                                    redirect(site_url('HomeCtr/transaksi_tambah_view'));
                                } ?>
							</div>
						</div>

						<div class="col-md-6">
						<div class="form-group" style="color:#000;"> 
								<label for="">Harga</label>
								<input type="text" class="form-control" id="harga" name="harga" readonly style="color:#000">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Brand Mesin</label>
								<select name="id_brand" id="pilih-brand" onChange="pilih_barang();" class="form-control">
									<option value="">-Pilih Brand Mesin-</option>
									<?php foreach($dt_mesin as $d) : ?>
									<option value="<?= $d->id_brand ?>"><?= $d->nama_brand ?></option>

									<?php endforeach ; ?>
								</select>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label for="">Jumlah Beli</label>
								<input type="text" class="form-control" id="jumlah" onKeyup="tampil_total();" name="jumlah">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Nama Barang</label>
								<select name="id_barang" id="pilih-barang"  onChange="tampil_harga();" class="form-control">
									
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group" > 
								<label for="">Total</label>
								<input type="text"  class="form-control black" id="total" name="total" readonly style="color:#000;">
							</div>
						</div>
						<?php echo form_error('total', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>


					<div class="row" style="margin-top:10px;">
						<div class="col-md-6">
							<div class="form-group">
								<button class="btn btn-info">Tambah</button>
							</div>
						</div>


					</div>

				</form>
			</div>
		</div>
		<!-- END DEFAULT DATATABLE -->


	</div>
</div>
<div class="row">
	<div class="col-md-12">

		<!-- START DEFAULT DATATABLE -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Detail Transaksi Pembelian</h3>
				<ul class="panel-controls">

			</div>
			<div class="panel-body">
				<!-- <a href="/kategori/tambah" style='margin-bottom:10px' class="btn btn-info">Tambah Data</a> -->
				<table class="table ">
					<thead>
						<tr>
							<th>No</th>
							<th>id_transaksi</th>
							<th>Nama Barang</th>
							<th>Jumlah Beli</th>
							<th>Harga</th>
							<th>Total</th>
							<th>Aksi</th>

						</tr>
					</thead>
					<tbody>
						<?php
					 $totalSub = 0; 
					 $jumlahJb = 0;
					 foreach($dt_detail as $no => $d) :
						$totalSub = $totalSub += $d->subtotal ;
						$jumlahJb = $jumlahJb += $d->jumlah ;
					  ?>

						<tr>
							<td><?php echo $no+1 ?></td>
							<td><?php echo $d->id_transaksi?></td>
							<td><?php echo $d->nama_barang ?></td>
							<td><?php echo $d->jumlah ?></td>
							<td>Rp. <?php echo $d->harga ?></td>
							<td>Rp. <?php echo $d->subtotal ?></td>
							<td>
								<a onclick="return confirm('Are you sure you want to delete this item?');"
									href="<?php echo site_url('HomeCtr/detail_del/'.$d->id_detail."/".$d->id_transaksi ) ?>"
									class="btn btn-small text-danger"><i class="fa fa-trash-o"></i> Hapus</a>

							</td>

						</tr>
						<?php endforeach ; ?>

						<tr>
							<td colspan="5">Total Pembelian</td>
							<td>Rp. <?= $totalSub ?></td>
							<td></td>
						</tr>
					</tbody>
				</table>
				<form action="<?php echo site_url('HomeCtr/transaksi_selesai/').$dt_id->id_transaksi ?>" method="POST">
					<div class="row" style="margin-top:50px;">
						<div class="col-md-8">
							<label for="">Masukan Nama Pembeli</label>
							<input type="" name="nama_pembeli" class="form-control" required>
							<input type="hidden" name="jumlahJb" value="<?= $jumlahJb ?>">
							<input type="hidden" name="totalSub" value="<?= $totalSub ?>">
						</div>
						<div class="col-md-4">
							<label for="" class="pull-right">Klilk Selesai, jika tidak ada yang barang
								ditambahkan</label>
							<button href=""
								class="btn btn-danger btn-lg pull-right"> <span class="fa fa-sign-out"></span>
								Selesai</button>
						</div>
					</div>

				</form>
			</div>
		</div>
		<!-- END DEFAULT DATATABLE -->


	</div>
</div>
<?php $this->load->view("footer") ?>
