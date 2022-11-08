<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <!-- <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png"> -->
    <?php
    // echo link_tag('assets/css/style.css');   //styleku
    helper('html');
    echo link_tag('assets/img/apple-icon.png', 'shortcut icon', 'image/png');
    echo link_tag('assets/img/favicon.png', 'shortcut icon', 'image/png');



    ?>
    <!-- <link rel="icon" type="image/png" href="../assets/img/favicon.png"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Mapan Tailor
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <?php
    // Fonts and icons    
    echo link_tag('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons');
    echo link_tag('https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css');


    // CSS Files
    echo link_tag(base_url('assets/css/material-dashboard.css?v=2.1.2'));

    // Data Table

    echo link_tag(base_url('https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.css'));


    // CSS Just for demo purpose, don't include it in your project
    echo link_tag('assets/demo/demo.css');

    // jquery user inteface / tanggal

    echo link_tag('assets/js/jquery-ui/jquery-ui.css');

    // select2
    echo link_tag('https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css');

    ?>
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="white" data-image="<?= base_url('assets/img/sidebar-1.jpg'); ?>">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
                    Mapan Tailor
                </a></div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item <?= $aktif == 'home' ? 'active' : ''; ?>">
                        <a class="nav-link" href="home">
                            <i class="material-icons">dashboard</i>
                            <p>Home</p>
                        </a>
                    </li>
                    <li class="nav-item <?= $aktif == 'customer' ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?= base_url('pelanggan'); ?>">
                            <i class="material-icons">person</i>
                            <p>Customer</p>
                        </a>
                    </li>
                    <li class="nav-item <?= $aktif == 'produk' ? 'active' : ''; ?> ">
                        <a class="nav-link" href="<?= base_url('barang'); ?>">
                            <i class="material-icons">unarchive</i>
                            <!-- <i class="">unarchive</i> -->
                            <p>Produk</p>
                        </a>
                    </li>
                    <li class="nav-item <?= $aktif == 'transaksi' ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?= base_url('transaksi'); ?>">
                            <i class="material-icons">point_of_sale</i>
                            <p>Transaksi</p>
                        </a>
                    </li>
                    <li class="nav-item <?= $aktif == 'laporan' ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?= base_url('laporan');?>">
                            <i class="material-icons">content_paste</i>
                            <p>Laporan</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="javascript:;">Bukan <span class="text-warning"> Seragam </span>Pabrikan</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <form class="navbar-form">
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                    <i class="material-icons">search</i>
                                    <div class="ripple-container"></div>
                                </button>
                            </div>
                        </form>
                        <ul class="navbar-nav">


                            <li class="nav-item dropdown">
                                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">person</i>
                                    <p class="d-lg-none d-md-block">
                                        Account
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                    <a class="dropdown-item" href="#">Settings</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Log out</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->