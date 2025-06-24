<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-table"></i> <?= ucfirst($page) ?></h1>

	<a href="<?= base_url($page . '/index')?>" class="btn btn-secondary btn-icon-split">
    <span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>

</div>

<div class="card shadow mb-4">
		<div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-edit"></i> Edit <?= ucfirst($page) ?></h6>
    </div>

		<div class="card-body">
			<?php echo form_open($page . '/update'); ?>
			<?= form_hidden('id_user', $row->id) ?>
			<div class="form-group">
				<label for="nama">Nama</label>
				<input required autocomplete="off" type="text" class="form-control form-control-user" name="nama" id="nama" value="<?= $row->nama ?>"/>
			</div>
			<div class="form-group">
				<label for="username">Username</label>
				<input required autocomplete="off" type="text" class="form-control form-control-user" name="username" id="username" value="<?= $row->username ?>"/>
			</div>
			<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
			<?php echo form_close() ?>
		</div>
		
</div>
