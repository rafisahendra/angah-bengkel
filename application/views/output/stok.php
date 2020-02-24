<?php $this->load->view('header')?>
<div class="row">
	<div class="col-md-12">

		<!-- START DEFAULT DATATABLE -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Entry Data Barang Suku Cadang</h3>
				<ul class="panel-controls">
				<li><a href="<?php echo site_url('HomeCtr/barang_view') ?>" ><span class="fa fa-times"></span></a></li>

				</ul>
			</div>
			<?php if ($this->session->flashdata('success')): ?>
			<div class="alert alert-info" role="alert">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span
						class="sr-only">Close</span></button>
				<?php echo $this->session->flashdata('success'); ?>
			</div>
			<?php endif; ?>
			<div class="panel-body">
			


				<table class="table datatable">
					<thead>
						<tr>
							<th>No</th>
							<th>Kode Suku Cadang</th>
							<th>Nama Brand</th>
							<th>Nama Suku Cadang</th>
							<th>Harga</th>
							<th>Jumlah</th>

						</tr>
					</thead>
					<tbody>

						<?php foreach($dt_stok as $no => $d): ?>
						<tr>
							<td><?= $no+1; ?></td>
							<td><?= $d->kode_barang ?></td>
							<td><?= $d->nama_brand ?></td>
							<td><?= $d->nama_barang ?></td>
							<td>Rp. <?= $d->harga ?></td>
							<td style="color:red">( <?= $d->jumlah ?> )
								<button type="button" class="badge badge-danger" data-toggle="modal"
									data-target="#exampleModal<?= $d->id_barang ?>"><i class="fa fa-plus"></i> Tambah
									Stok</button>
							</td>

						</tr>


						<div class="modal fade" id="exampleModal<?= $d->id_barang ?>" tabindex="-1" role="dialog"
							aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Tambah Stok</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">

										</button>
									</div>
									<div class="modal-body">
										<form action="<?php echo base_url('HomeCtr/stok_save') ?>" method="post">
											<div class="form-group">
                                                <Label>Stok Lama</Label>
                                                <input type="hidden" name="id" value="<?= $d->id_barang ?>"  class="form-control">
												<input style="color:#000" type="text" name="stok_lama" value="<?= $d->jumlah ?>" readonly class="form-control">
											</div>
											<div class="form-group">
												<Label>Tambah Stok</Label>
												<input type="number" name="stok_baru" class="form-control">
											</div>
										
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                    </form>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		<!-- END DEFAULT DATATABLE -->


	</div>
</div>





<?php $this->load->view('footer') ?>
