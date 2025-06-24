<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-calculator"></i> Perhitungan</h1>
  <button class="btn btn-success btn-icon-split"  data-toggle="modal" data-target="#modalInsertKriteria">
	</button>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Matriks Keputusan</h6>
    </div>

		<div class="card-body">
			<div class="table-responsive">
          <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="bg-primary text-white">
                    <tr align="center">
                    	<th width="5%">No</th>
                    	<th>Alternatif</th>
											<!-- Kriteria -->
											<?php foreach($kriteria as $kri_data): ?>
												<th><?= $kri_data->kode_kriteria ?></th>
											<?php endforeach ?>
                    </tr>
                </thead>
                <tbody>
									<?php $i = 0 ?>
									<?php foreach($alternatif as $alt_data): ?>
										<tr>
											<td align="center"><?= ++$i ?></td>
											<td><?= $alt_data->alternatif ?></td>
											<!-- Kriteria -->
											<?php foreach($perhitungan[$alt_data->alternatif] as $nilai): ?>
												<td align="center"><?= $nilai ?></td>
											<?php endforeach ?>
										</tr>
									<?php endforeach ?>
									<!-- Max Min -->
									 <tr align="center" class="bg-light">
										<th colspan="2">Max</th>
										<?php foreach($kriteria as $kri_data): ?>
												<th><?= $min_max[$kri_data->kode_kriteria]->max ?></th>
										<?php endforeach ?>
									 </tr>
									 <tr align="center" class="bg-light">
										<th colspan="2">Min</th>
										<?php foreach($kriteria as $kri_data): ?>
												<th><?= $min_max[$kri_data->kode_kriteria]->min ?></th>
										<?php endforeach ?>
									 </tr>
                </tbody>
            </table>
      </div>
		</div>

</div>

<div class="card shadow mb-4">
		<div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Bobot Kriteria</h6>
    </div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" width="100%" cellspacing="0">
					<thead class="bg-primary text-white">
						<tr align="center">
							<?php foreach($kriteria as $kri_data): ?>
								<th><?= $kri_data->kode_kriteria ?></th>
							<?php endforeach ?>
						</tr>
					</thead>
					<tbody>
						<tr>
						<?php foreach($kriteria as $kri_data): ?>
								<td align="center"><?= $kri_data->bobot ?></td>
							<?php endforeach ?>
							</tr>
					</tbody>
				</table>
			</div>
		</div>
</div>

<!-- Deklarasi bobot ternormalisasi -->
<?php 
$total_bobot = $this->Perhitungan_model->get_total_bobot()['total_bobot'] ;
$bobot_normalisasi = [];
?>


<div class="card shadow mb-4">
		<div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Normalisasi Bobot Kriteria</h6>
    </div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" width="100%" cellspacing="0">
					<thead class="bg-primary text-white">
						<tr align="center">
							<?php foreach($kriteria as $kri_data): ?>
								<th><?= $kri_data->kode_kriteria ?></th>
							<?php endforeach ?>
						</tr>
					</thead>
					<tbody>
						<!-- Total Kriteria -->
							<tr>
							<?php foreach($kriteria as $kri_data): ?>
								<td align="center"><?= $kri_data->bobot/$total_bobot ?></td>
								<?php array_push($bobot_normalisasi, $kri_data->bobot/$total_bobot) ?>
							<?php endforeach ?>
							</tr>
					</tbody>
				</table>
			</div>
		</div>
</div>

<div class="card shadow mb-4">
		<div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Matriks Ternormalisasi</h6>
    </div>

		<div class="card-body">
			<div class="table-responsive">
          <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="bg-primary text-white">
                    <tr align="center">
                    	<th width="5%">No</th>
                    	<th>Alternatif</th>
											<!-- Kriteria -->
											<?php foreach($kriteria as $kri_data): ?>
												<th><?= $kri_data->kode_kriteria ?></th>
											<?php endforeach ?>
                    </tr>
                </thead>
                <tbody>
									<?php $i = 0?>
									<?php foreach($alternatif as $alt_data): ?>
										<tr>
											<td align="center"><?= ++$i ?></td>
											<td><?= $alt_data->alternatif ?></td>
											<?php $j = 0 ?>
											<?php foreach($perhitungan[$alt_data->alternatif] as $nilai): ?>

												<?php
													$kode_kriteria = $kriteria[$j]->kode_kriteria; 

													try{
														if ($kriteria[$j]->jenis == 'Benefit') {
															$nilai_normalisasi = $nilai/$min_max[$kode_kriteria]->max;
														} else {
															$nilai_normalisasi = $min_max[$kode_kriteria]->min/$nilai;
														}
													} catch (DivisionByZeroError $e){
															$nilai_normalisasi = 0 ;
													}

													$nilai_normalisasi = round($nilai_normalisasi, 2);
													$j++;
												?>

												<td align="center"><?= $nilai_normalisasi ?></td>

											<?php endforeach ?>
										</tr>
									<?php endforeach ?>
                </tbody>
            </table>
      </div>
		</div>
</div>

<div class="card shadow mb-4">
		<div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Nilai Preferensi</h6>
    </div>
	
		<div class="card-body">
			<div class="table-responsive">
          <table class="table table-bordered" width="100%" cellspacing="0">
					<thead class="bg-primary text-white">
                    <tr align="center">
                    	<th width="5%">No</th>
                    	<th>Alternatif</th>
											<th width="20%">Total Nilai</th>
                    </tr>
                </thead>
                <tbody>
								<?php $i = 0?>
								<?php $this->Perhitungan_model->hapus_hasil() ?>
									<?php foreach($alternatif as $alt_data): ?>
										<tr>
											<td align="center"><?= ++$i ?></td>
											<td><?= $alt_data->alternatif ?></td>
											<?php 
												$j = 0; 
												$nilai_preferensi = 0;
											?>
											<?php foreach($perhitungan[$alt_data->alternatif] as $nilai): ?>

												<?php
													$kode_kriteria = $kriteria[$j]->kode_kriteria; 

													try{
														if ($kriteria[$j]->jenis == 'Benefit') {
															$nilai_normalisasi = $nilai/$min_max[$kode_kriteria]->max;
														} else {
															$nilai_normalisasi = $min_max[$kode_kriteria]->min/$nilai;
														}
													} catch (DivisionByZeroError $e){
															$nilai_normalisasi = 0 ;
													}

													$nilai_normalisasi = $nilai_normalisasi;
													$nilai_preferensi += $nilai_normalisasi * $bobot_normalisasi[$j];
													$j++;

													
												?>

											<?php endforeach ?>
											<?php 
											$data['id_alternatif'] = $alt_data->id;
											$data['nilai'] = $nilai_preferensi;

											$this->Perhitungan_model->insert_hasil($data);
											?>
											<td align="center"><?= round($nilai_preferensi, 4) ?></td>
										</tr>
									<?php endforeach ?>
                </tbody>
					</table>
			</div>
		</div>
</div>

