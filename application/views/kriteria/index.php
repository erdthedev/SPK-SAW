<?php if($this->session->flashdata('message')): ?>
	<?= $this->session->flashdata('message') ?>
<?php endif ?>
	
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cube"></i> Kriteria</h1>
  <button class="btn btn-success btn-icon-split"  data-toggle="modal" data-target="#modalInsertKriteria">
		<span class="icon"><i class="fas fa-fw fa-plus"></i></span>
		 <span class="text">Tambah Data</span>
	</button>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Daftar Kriteria</h6>
    </div>

    <div class="card-body">
      <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-primary text-white">
                    <tr align="center">
                    <th width="5%">No</th>
                    <th>Kode Kriteria</th>
                    <th>Nama Kriteria</th>
                    <th>Bobot</th>
                    <th>Jenis</th>
                    <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
					<?php $no = 0 ?>
					<?php foreach($rows as $data): ?>
						<tr align="center">
							<td><?= ++$no ?></td>
							<td><?= $data->kode_kriteria ?></td>
							<td><?= $data->nama_kriteria ?></td>
							<td><?= $data->bobot ?></td>
							<td><?= $data->jenis ?></td>
							<td>
								<div class="btn-group" role="group" aria-label="Basic example">
									<a href="<?= base_url('kriteria/edit/' . $data->id) ?>" class="btn btn-warning">Edit</a>
									<a href="<?= base_url('kriteria/destroy/' . $data->id) ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger">Hapus</a>
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
                </tbody>
            </table>
      </div>
		</div>
</div>

<!-- Modal Insert Kriteria-->
<div class="modal fade" id="modalInsertKriteria" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Kriteria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <?= form_open('kriteria/create') ?>
            <div class="form-group">
                <label for="">Kode Kriteria</label>
                <input type="text" class="form-control" required name="kode_kriteria" autocomplete="off">
                <small class="form-text text-info">cth. C1</small>
            </div>
            <div class="form-group">
                <label for="">Nama Kriteria</label>
                <input type="text" class="form-control" required name="nama_kriteria" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Bobot</label>
                <input type="number" class="form-control" required name="bobot" min=1 max=100>
                <small class="form-text text-info">range: 1 - 100</small>
            </div>

			      <label for="">Jenis</label>
            <div class="form-group">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="jenis" id="inlineRadio1" value="Benefit" selected>
              <label class="form-check-label" for="inlineRadio1">Benefit</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="jenis" id="inlineRadio2" value="Cost">
              <label class="form-check-label" for="inlineRadio2">Cost</label>
            </div>
                </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </div>
        <?= form_close() ?>

	    </div>

    </div>
  </div>
</div>
