<?php if($this->session->flashdata('message')): ?>
	<?= $this->session->flashdata('message') ?>
<?php endif ?>


<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-table"></i> <?= ucfirst($page) ?></h1>
  <a href="<?= base_url('alternatif/create')?>" class="btn btn-success btn-icon-split">
		<span class="icon"><i class="fas fa-fw fa-plus"></i></span>
		 <span class="text">Tambah Data</span>
	</a>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Daftar <?= ucfirst($page) ?></h6>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="bg-primary text-white">
						<tr align="center">
						<th width="5%">No</th>
						<th>Alternatif</th>
						<th width="20%">Status Input Nilai</th>
						<th width="15%">Aksi</th>
						</tr>
          </thead>
          <tbody>
					<?php $no = 0 ?>
					<?php foreach($rows as $data): ?>
						<tr align="center">
							<td><?= ++$no ?></td>
							<td align="left"><?= $data->alternatif ?></td>
							<td>
								<?php if($data->input_penilaian == '0'): ?>
									<span><i class="fas fa-fw fa-times text-danger"></i></span>
								<?php else: ?>
									<span><i class="fas fa-fw fa-check text-success"></i></span>
								<?php endif ?>
							</td>
							<td>
								<div class="btn-group" role="group" aria-label="Basic example">
									<a href="<?= base_url("$page/" .'edit/' . $data->id) ?>" class="btn btn-warning">Edit</a>
									<a href="<?= base_url("$page/" . 'destroy/' . $data->id) ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger">Hapus</a>
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
          </tbody>
        </table>
      </div>
	</div>

</div>
