<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Pendukung Keputusan Metode SAW</title>
	<link rel="icon" href="<?= base_url()?>assets/img/favicon.svg" type="image/x-icon">

    <?php $this->load->view('partials/links'); ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php $this->load->view('partials/sidebar'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
			<!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600"><?= $this->session->userdata('username') ?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?= base_url()?>assets\img\account-admin.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Main Content -->
                <div class="container-fluid">
					<?php 
					
						switch ($page) {
							case 'kriteria':
								if(isset($mode) && $mode == 'edit'){
									$this->load->view('kriteria/edit');
								} else{
									$this->load->view('kriteria/index');
								}
								break;

							case 'alternatif':
								if(isset($mode) && $mode == 'create'){
									$this->load->view('alternatif/create');
								} else if(isset($mode) && $mode == 'edit'){
									$this->load->view('alternatif/edit');
								} else{
									$this->load->view('alternatif/index');
								}
								break;
								
							case 'penilaian':
								if(isset($mode) && $mode == 'create'){
									$this->load->view('penilaian/create');
								} else if(isset($mode) && $mode == 'edit'){
									$this->load->view('penilaian/edit');
								} else{
									$this->load->view('penilaian/index');
								}
								break;

							case 'perhitungan':
								$this->load->view('perhitungan/index');
								break;
							case 'perangkingan':
								$this->load->view('perangkingan/index');
								break;
							case 'users':
								if(isset($mode) && $mode == 'create'){
									$this->load->view('users/create');
								} else if(isset($mode) && $mode == 'edit'){
									$this->load->view('users/edit');
								} else{
									$this->load->view('users/index');
								}
								break;
							default:
								$this->load->view('dashboard_admin');
								break;
						}

					?>

				</div>

        
			</div>
            <!-- End of Main Content -->
			<?php $this->load->view('partials/footer'); ?>
		</div>
	</div>

	<!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

	<!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= site_url('auth/logout') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('partials/scripts'); ?>

</body>

</html>
