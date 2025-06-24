<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-user-secret"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SPK-SAW</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= ($page == 'dashboard') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('dashboard') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        MASTER DATA
    </div>

	<?php if($this->session->userdata('role') == 'admin'): ?>
		
		<li class="nav-item <?= ($page == 'kriteria') ? 'active' : '' ?>">
			<a class="nav-link " href="<?= base_url('kriteria')?>">
				<i class="fas fa-fw fa-cube"></i>
				<span>Kriteria</span>
			</a>
		</li>
	
		<li class="nav-item <?= ($page == 'alternatif') ? 'active' : '' ?>">
			<a class="nav-link " href="<?= base_url('alternatif')?>">
				<i class="fas fa-fw fa-table"></i>
				<span>Alternatif</span>
			</a>
		</li>
		
		<li class="nav-item <?= ($page == 'penilaian') ? 'active' : '' ?>">
			<a class="nav-link " href="<?= base_url('penilaian')?>">
				<i class="fas fa-fw fa-clipboard-check"></i>
				<span>Penilaian</span>
			</a>
		</li>
		
		<!-- Heading -->
		<div class="sidebar-heading">
			ANALISIS
		</div>
		
		<li class="nav-item <?= ($page == 'perhitungan') ? 'active' : '' ?>">
			<a class="nav-link " href="<?= base_url('perhitungan')?>">
				<i class="fas fa-fw fa-calculator"></i>
				<span>Perhitungan</span>
			</a>
		</li>

	<?php endif ?>
		
		<li class="nav-item <?= ($page == 'perangkingan') ? 'active' : '' ?>">
			<a class="nav-link " href="<?= base_url('perangkingan')?>">
				<i class="fas fa-fw fa-chart-area"></i>
				<span>Perangkingan</span>
			</a>
		</li>
		
		<!-- Divider -->
		<hr class="sidebar-divider">
		
		<!-- Heading -->
		<div class="sidebar-heading">
			Master User
		</div>
		
		<?php if($this->session->userdata('role') == 'admin'): ?>
			<li class="nav-item <?= ($page == 'users') ? 'active' : '' ?>">
			<a class="nav-link " href="<?= base_url('users')?>">
					<i class="fas fa-fw fa-users"></i>
					<span>Users</span>
				</a>
			</li>
		<?php endif ?>
	
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
