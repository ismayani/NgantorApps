<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $title; ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="../node_modules/summernote/dist/summernote-bs4.css">
    <link rel="stylesheet" href="../node_modules/selectric/public/selectric.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/components.css">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>
                    <div class="search-element">
                    </div>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?= base_url(); ?>/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, Ismayani</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- Sidebar -->
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a style="font-size: 15px;color:blue" href="/">
                            <i class="fas fa-briefcase"></i>NgantorApps
                        </a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a style="font-size: 15px;color:blue" href="/"><i class="fas fa-briefcase"></i>NA</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                        <li><a class="nav-link" href="/"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
                        <li class="menu-header">Pengolahan Pegawai</li>
                        <li><a class="nav-link" href="/kepegawaian"><i class="fas fa-user-tie"></i> <span>Pegawai</span></a></li>
                        <li><a class="nav-link" href="/jabatan"><i class="fas fa-suitcase"></i> <span>Jabatan</span></a></li>
                        <li><a class="nav-link" href="/divisi"><i class="fas fa-address-book"></i> <span>Divisi</span></a></li>
                        <li><a class="nav-link" href="/tunjangan"><i class="fas fa-child"></i> <span>Tunjangan</span></a></li>
                        <li><a class="nav-link" href="/gaji"><i class="fas fa-dollar-sign"></i> <span>Gaji</span></a></li>
                        <li class="menu-header">Pengolahan User</li>
                        <li><a class="nav-link" href="credits.html"><i class="fas fa-users"></i> <span>Users</span></a></li>
                    </ul>
                </aside>
            </div>

            <?= $this->renderSection('content'); ?>

            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; <?= date("Y"); ?> <div class="bullet"></div> Made By <a href="https://www.instagram.com/ismayaniis_/">Ismayani Setyaningrum</a>
                </div>
                <div class="footer-right">
                    0.0.1
                </div>
            </footer>
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="<?= base_url(); ?>/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="../node_modules/summernote/dist/summernote-bs4.js"></script>
    <script src="../node_modules/selectric/public/jquery.selectric.min.js"></script>
    <script src="../node_modules/jquery_upload_preview/assets/js/jquery.uploadPreview.min.js"></script>
    <script src="../node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>

    <!-- Template JS File -->
    <script src="<?= base_url(); ?>/js/scripts.js"></script>
    <script src="<?= base_url(); ?>/js/custom.js"></script>
    <!-- Page Specific JS File -->
    <script src="<?= base_url(); ?>/js/page/features-post-create.js"></script>
</body>

</html>