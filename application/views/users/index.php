<?php if($this->session->flashdata('message')): ?>
	<?= $this->session->flashdata('message') ?>
<?php endif ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users"></i> <?= ucfirst($page) ?></h1>
	<a href="<?= base_url('users/create')?>" class="btn btn-success btn-icon-split">
		<span class="icon"><i class="fas fa-fw fa-plus"></i></span>
		 <span class="text">Tambah User</span>
	</a>
</div>

<div class="card shadow mb-4">
		<div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> <?= ucfirst($page) ?></h6>
    </div>

		<div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="bg-primary text-white">
						<tr align="center">
						<th width="10%">No</th>
						<th>Nama</th>
						<th>Username</th>
						<th>Role</th>
						<th width="15%">Aksi</th>
						</tr>
          </thead>
          <tbody>
						<?php $i = 1; ?>
						<?php foreach($rows as $row): ?>
							<tr>
								<td align="center"><?= $i++ ?></td>
								<td><?= $row->nama ?></td>
								<td><?= $row->username ?></td>
								<td><?= $row->role ?></td>
								<td class="text-center">
									<div class="btn-group" role="group" aria-label="Basic example">
										<a href="<?= base_url("$page/" .'edit/' . $row->id) ?>" class="btn btn-warning">Edit</a>
										<?php if($row->role != 'admin'): ?>
											<a href="<?= base_url("$page/" . 'destroy/' . $row->id) ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger">Hapus</a>
										<?php endif ?>
									</div>
								</td>
							</tr>
						<?php endforeach ?>
						</tbody>
        </table>
      </div>
	</div>
</div>
