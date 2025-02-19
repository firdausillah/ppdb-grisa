<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand text-center" href="<?= base_url() ?>assets/index.html">
            <span class="align-middle">ADMIN PPDB</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link dashboard" href="<?= site_url('admin/dashboard') ?>">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a data-bs-target="#master" data-bs-toggle="collapse" class="sidebar-link" aria-expanded="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle align-middle">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg> <span class="align-middle">Master</span>
                </a>
                <ul id="master" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>admin/jurusan">Jurusan</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>admin/gelombang">Gelombang Pendaftaran</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>admin/syarat">Syarat Pendaftaran</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>admin/marketing">Marketing</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>admin/tempattinggal">Tempat Tinggal</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>admin/transportasi">Moda Transportasi</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>admin/pendidikan">Pendidikan</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>admin/pekerjaan">Pekerjaan</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>admin/penghasilan">Penghasilan Orang Tua</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>admin/asalsekolah">Asal Sekolah</a></li>
                </ul>
            </li>

            <!-- <li class="sidebar-item">
                <a data-target="#siswa" data-toggle="collapse" class="sidebar-link">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Siswa</span>
                </a>
                <ul id="siswa" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?= base_url('admin/siswa') ?>">Semua Siswa</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?= base_url('admin/siswa/sudahverifikasi') ?>">Siswa Diverifikasi</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?= base_url('admin/siswa/belumverifikasi') ?>">Siswa Belum Verifikasi</a></li>
                </ul>
            </li> -->

            <li class="sidebar-item">
                <a data-bs-target="#siswa" data-bs-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-right-down align-middle">
                        <polyline points="10 15 15 20 20 15"></polyline>
                        <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                    </svg> <span class="align-middle">Siswa</span>
                </a>
                <ul id="siswa" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar" style="">
                    <li class="sidebar-item">
                        <a data-bs-target="#ppdb" data-bs-toggle="collapse" class="sidebar-link" aria-expanded="true">PPDB</a>
                        <ul id="ppdb" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
                            <li class="sidebar-item"><a class="sidebar-link" href="<?= base_url('admin/siswa') ?>">Semua Siswa</a></li>
                            <li class="sidebar-item"><a class="sidebar-link" href="<?= base_url('admin/siswa/sudahverifikasi') ?>">Siswa Diverifikasi</a></li>
                            <li class="sidebar-item"><a class="sidebar-link" href="<?= base_url('admin/siswa/belumverifikasi') ?>">Siswa Belum Verifikasi</a></li>
                        </ul>
                        <!-- <ul id="ppdb" class="sidebar-dropdown list-unstyled collapse show" style="">
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="#">Item 1</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="#">Item 2</a>
                            </li>
                        </ul> -->
                    </li>
                    <li class="sidebar-item">
                        <a data-bs-target="#multi-3" data-bs-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">Three Levels</a>
                        <ul id="multi-3" class="sidebar-dropdown list-unstyled collapse">
                            <li class="sidebar-item">
                                <a data-bs-target="#multi-3-1" data-bs-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">Item 1</a>
                                <ul id="multi-3-1" class="sidebar-dropdown list-unstyled collapse">
                                    <li class="sidebar-item">
                                        <a class="sidebar-link" href="#">Item 1</a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a class="sidebar-link" href="#">Item 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="#">Item 2</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link user" href="<?= site_url('admin/user') ?>">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">User</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link profile" href="<?= site_url('admin/profile') ?>">
                    <i class="align-middle" data-feather="file"></i> <span class="align-middle">Profile</span>
                </a>
            </li>

        </ul>

    </div>
</nav>