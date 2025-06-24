<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-chart-area"></i> <?= ucfirst($page) ?></h1>
	<a href="<?= base_url('pdfcontroller/generate')?>" class="btn btn-success btn-icon-split" target="_blank">
		<span class="icon"><i class="fas fa-fw fa-download"></i></span>
		 <span class="text">Download Hasil</span>
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
						<th width="10%">Peringkat</th>
						<th>Alternatif</th>
						<th width="20%">Nilai</th>
						</tr>
          </thead>
          <tbody>
						<?php $i = 1; ?>
						<?php foreach($rows as $row): ?>
							<tr>
								<td align="center"><?= $i++ ?></td>
								<td><?= $row->nama_alternatif ?></td>
								<td align="center"><?= $row->nilai ?></td>
							</tr>
						<?php endforeach ?>
						</tbody>
        </table>
      </div>
	</div>
</div>
