<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-table"></i> <?= ucfirst($page) ?></h1>

	<a href="<?= base_url($page . '/index')?>" class="btn btn-secondary btn-icon-split">
    <span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>

</div>

<div class="card shadow mb-4">
		<div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-plus"></i> Tambah <?= ucfirst($page) ?></h6>
    </div>

		<?php echo form_open($page . '/update'); ?>
		<div class="card-body">
			<?= form_hidden('id', $row->id) ?>
			<div class="row">
				<div class="form-group col">
					<label class="font-weight-bold">Nama Alternatif</label>
					<input autocomplete="off" type="text" name="alternatif" required class="form-control" value="<?= $row->alternatif ?>"/>
				</div>
			</div>
		</div>
		<div class="card-footer text-right">
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
    </div>
	<?php echo form_close() ?>
</div>
