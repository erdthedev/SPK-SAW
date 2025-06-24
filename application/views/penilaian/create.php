<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-clipboard-check"></i> <?= ucfirst($page) ?></h1>

	<a href="<?= base_url('penilaian'); ?>" class="btn btn-secondary btn-icon-split">
    <span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>
</div>


<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-clipboard-check"></i> Input <?= ucfirst($page) . ": " . $alternatif->alternatif?></h6>
    </div>

    <div class="card-body">
		<?= form_open('penilaian/store') ?>
			<?= form_hidden('id_alternatif', $alternatif->id) ?>
			<div class="form-row">
				<?php foreach($kriteria as $data): ?>
				<div class="form-group col-md-4">
					<label for="" class="text-dark"><?=  $data->kode_kriteria . ' - ' . $data->nama_kriteria ?></label>
					<input type="number" class="form-control" id="" placeholder="" autocomplete="off" required name="<?= $data->kode_kriteria ?>">
				</div>
				<?php endforeach; ?>
			</div>
			<button type="submit" class="btn btn-success">Simpan</button>
		<?= form_close() ?>
		</div>

</div>

