<?php if($this->session->flashdata('message')): ?>
	<?= $this->session->flashdata('message') ?>
<?php endif ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cube"></i> Kriteria</h1>

	<a href="<?= base_url('kriteria'); ?>" class="btn btn-secondary btn-icon-split">
    <span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>

</div>

<div class="card shadow mb-4">
		<div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-edit"></i> Edit Kriteria</h6>
    </div>

		<?php echo form_open('Kriteria/update/'.$kriteria->id); ?>
		<div class="card-body">
			<div class="row">
				<?php echo form_hidden('id_kriteria', $kriteria->id) ?>
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Kode Kriteria</label>
					<input autocomplete="off" type="text" name="kode_kriteria" value="<?php echo $kriteria->kode_kriteria ?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Nama Kriteria</label>
					<input autocomplete="off" type="text" name="nama_kriteria" value="<?php echo $kriteria->nama_kriteria ?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Bobot Kriteria</label>
					<input autocomplete="off" type="number" name="bobot" step="1" min='1' max='100' value="<?php echo $kriteria->bobot ?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Jenis Kriteria</label>
					<select name="jenis" class="form-control" required>
						<option value="Benefit" <?php if($kriteria->jenis == "Benefit"){ echo 'selected'; } ?>>Benefit</option>
						<option value="Cost" <?php if($kriteria->jenis == "Cost"){ echo 'selected'; } ?>>Cost</option>						
					</select>
				</div>
			</div>
		</div>
		<div class="card-footer text-right">
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
    </div>
	<?php echo form_close() ?>
</div>
