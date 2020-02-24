<?php $this->load->view("header") ?>
<div class="row">
	<div class="col-md-12">

		<!-- START DEFAULT DATATABLE -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Tambah Transaksi Pembelian</h3>
				<ul class="panel-controls">
					
				</ul>
			</div>
			<div class="panel-body">
				<!-- <a href="/kategori/tambah" style='margin-bottom:10px' class="btn btn-info">Tambah Data</a> -->
				<form  method='POST' action="<?php echo site_url('HomeCtr/detail_save') ?>" >
				
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">No Transaksi</label>
								<input type="text" name="id_tran" class="form-control" style="color:#000;" readonly value="TR-<?php echo uniqid() ?>">
							</div>  
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label for="">Harga</label>
								<input type="text" class="form-control" id="harga" readonly name="harga" style="color:#000;">
							</div>
						</div>
					</div>

                    <div class="row">
						<div class="col-md-6">
							<div class="form-group text-white">
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
								<input type="text" class="form-control" id="jumlah" onKeyup="tampil_total();" name="jumlah" >
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
							<div class="form-group">
								<label for="">Total</label>
								<input type="text" class="form-control" id="total" name="total" readonly style="color:#000;">
							</div>
						</div>
						
					</div>


					<div class="row" style="margin-top:10px;">
					<div class="col-md-6">
							<div class="form-group">
							<button class="btn btn-info">Simpan</button>
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
					
				</ul>
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
                 
                </table>
			</div>
		</div>
		<!-- END DEFAULT DATATABLE -->


	</div>
</div>
<?php $this->load->view("footer") ?>
