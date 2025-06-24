

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

		<div class="card-body">
			<?php echo form_open($page . '/store'); ?>
			<div class="form-group">
				<label for="nama">Nama</label>
				<input required autocomplete="off" type="text" class="form-control form-control-user" name="nama" id="nama"/>
			</div>
			<div class="form-group">
				<label for="username">Username</label>
				<input required autocomplete="off" type="text" class="form-control form-control-user" name="username" id="username"/>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input required autocomplete="off" type="password" class="form-control form-control-user" name="password" id="password"/>
			</div>
			<div class="form-group">
				<label for="exampleFormControlSelect1">Role</label>
				<select class="form-control" id="exampleFormControlSelect1" name="role">
					<option value="admin">Admin</option>
					<option value="user">User</option>
				</select>
			</div>
			<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
			<?php echo form_close() ?>
		</div>
		
</div>
