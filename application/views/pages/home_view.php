<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>Sistem Pendukung Keputusan Metode SAW</title>
		<link rel="icon" href="<?= base_url()?>assets/img/favicon.svg" type="image/x-icon">


				<!-- Include links -->
        <?php $this->load->view('partials/links'); ?> 
    </head>

    <body class="bg-white">
        <nav class="navbar navbar-expand-lg navbar-dark bg-white shadow pb-3 pt-3 font-weight-bold">
            <div class="container">
                    <div class="col col-md-6">
                        <a class="navbar-brand text-primary" style="font-weight: 900; " href="#">SPK-SAW</a>
                    </div>
                </div>

            </div>
        </nav>

        <div class="container">
            <!-- Outer Row -->
            <div class="row d-plex justify-content-between mt-1">
                <div class="col-xl-6 col-lg-6 col-md-6 mt-5">
                    <div class="card bg-none o-hidden border-0 my-5 text-primary" style="background: none;">
                        <h1 class="mb-3">SISTEM PENDUKUNG KEPUTUSAN BERBASIS SAW DENGAN VISUALISASI DASHBOARD INTERAKTIF UNTUK PENILAIAN KINERJA PEGAWAI DI PT. LINGKAR ORGANIK INDONESIA</h1>
						<!-- <h4 class="mb-3">Tanpa Sub-Kriteria</h4>
                        <p class="mb-3">Sistem Pendukung Keputusan (SPK) berbasis metode SAW (Simple Additive Weighting) adalah alat yang membantu memilih alternatif terbaik dari berbagai pilihan dengan cara menilai setiap alternatif berdasarkan kriteria tertentu yang memiliki bobot prioritas. Melalui website ini, pengguna dapat memasukkan data dan kriteria untuk mendapatkan rekomendasi secara cepat dan akurat dalam bentuk peringkat, memudahkan pengambilan keputusan yang objektif di berbagai bidang.</p> -->
                    </div>
                </div>

				<div class="col-xl-5 col-lg-5 col-md-5 mt-5">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
										<!-- Login Page Start -->
										<?php if(!isset($register)): ?>
											<div class="text-center">
											    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                            </div>
											<?php if ($this->session->flashdata('success')): ?>
												<p class="text-success"><?php echo $this->session->flashdata('success'); ?></p>
											<?php endif; ?>
											<?php if ($this->session->flashdata('error')): ?>
												<p class="text-primary"><?php echo $this->session->flashdata('error'); ?></p>
											<?php endif; ?>
                                            <?= form_open('auth/login') ?>
                                                <div class="form-group">
                                                    <input required autocomplete="off" type="text" class="form-control form-control-user" id="exampleInputUser" placeholder="Username" name="username"/>
                                                </div>
                                                <div class="form-group">
                                                    <input required autocomplete="off" type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Password" />
                                                </div>
                                                <button name="submit" type="submit" class="btn btn-primary btn-user btn-block"><i class="fas fa-fw fa-sign-in-alt mr-1"></i> Masuk</button>
												<a href="<?= base_url()?>auth">Register</a>
                                            <?= form_close() ?>
										<!-- Login Page End -->
                                        <?php else: ?>
										<!-- Register Page Start -->
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4">Register</h1>
                                            </div>
											<?php if ($this->session->flashdata('error')): ?>
												<p class="text-primary"><?php echo $this->session->flashdata('error'); ?></p>
											<?php endif; ?>
                                            
                                            <?= form_open('auth/register') ?>
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
                                                <button name="submit" type="submit" class="btn btn-primary btn-user btn-block"><i class="fas fa-fw fa-sign-in-alt mr-1"></i> Daftar</button>
												<a href="<?= base_url()?>">Login</a>
                                            <?= form_close() ?>
                                        <?php endif ?>
										<!-- Register Page End -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       <!-- Include scripts -->
			 <?php $this->load->view('partials/scripts'); ?> 
    </body>
</html>


