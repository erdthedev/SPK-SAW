<?php if($this->session->flashdata('message')): ?>
	<?= $this->session->flashdata('message') ?>
<?php endif ?>
	
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-clipboard-check"></i> <?= ucfirst($page) ?></h1>
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
						<th width="15%">Aksi</th>
						</tr>
          </thead>
          <tbody>
					<?php $no = 0 ?>
					<?php foreach($alternatifs as $alternatif): ?>
						<tr align="center">
							<td><?= ++$no ?></td>
							<td align="left"><?= $alternatif->alternatif ?></td>
							<td>
								<div class="btn-group" role="group">
									<?php if($alternatif->input_penilaian == '1'): ?>
										<a href="<?= base_url('penilaian/edit/'.$alternatif->id)?>" type="button" class="btn btn-warning">Edit</a>
									<?php else: ?>
										<a href="<?= base_url('penilaian/create/'.$alternatif->id)?>" type="button" class="btn btn-success">Input</a>
									<?php endif ?>
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
          </tbody>
        </table>
      </div>
	</div>

</div>
