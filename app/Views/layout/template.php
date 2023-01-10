<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>RDA - Rumah Dakwah Abu</title>
    <meta content="Admin" name="Sistem Informasi Yayasan" />
    <meta content="Web Base Application" name="Semangka Media" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="<?= base_url() ?>/assets/images/default/logo.png">

    <!-- Main CSS File  -->
    <link href="<?= base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/assets/css/style.css" rel="stylesheet" type="text/css">

    <!-- Sweet-Alert  -->
    <link href="<?= base_url() ?>/assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/assets/plugins/morris/morris.css" rel="stylesheet">
    <script src="<?= base_url() ?>/assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/jquery.min.js"></script>

    <!-- Plugins  -->
    <script src="<?= base_url() ?>/assets/plugins/skycons/skycons.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/raphael/raphael-min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/morris/morris.min.js"></script>
</head>


<body class="fixed-left">

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                <i class="ion-close"></i>
            </button>

            <!-- LOGO -->
            <div class="topbar-left">
                <div class="text-center">
                    <a href="/" class="logo"><i class="mdi mdi-brightness-7"></i> RDA</a>
                </div>
            </div>

            <div class="sidebar-inner slimscrollleft">

                <div id="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>

                        <li>
                            <a href="/" class="waves-effect">
                                <i class="mdi mdi-airplay"></i>
                                <span> Beranda </span>
                            </a>
                        </li>

                        <li>
                            <a href="/pengurus" class="waves-effect">
                                <i class="mdi mdi-account-location"></i>
                                <span> Pengurus </span>
                            </a>
                        </li>

                        <li>
                            <a href="/kompetensi" class="waves-effect">
                                <i class="mdi mdi-calendar-clock"></i>
                                <span> Kompetensi </span>
                            </a>
                        </li>

                        <li>
                            <a href="/absensi/<?= date('M-Y', strtotime('-1 month')) ?>" class="waves-effect">
                                <i class="mdi mdi-clipboard-check"></i>
                                <span> Absensi </span>
                            </a>
                        </li>

                        <li class="menu-title">Remunerasi</li>

                        <li>
                            <a href="/skim" class="waves-effect">
                                <i class="mdi mdi-clipboard-outline"></i>
                                <span> Skim </span>
                            </a>
                        </li>

                        <li>
                            <a href="/tunjangan" class="waves-effect">
                                <i class="mdi mdi mdi-battery-positive"></i>
                                <span> Tunjangan </span>
                            </a>
                        </li>

                        <li>
                            <a href="/potongan" class="waves-effect">
                                <i class="mdi mdi mdi-battery-negative"></i>
                                <span> Potongan </span>
                            </a>
                        </li>

                        <li>
                            <a href="/proses/<?= date('M-Y', strtotime('-1 month')) ?>" class="waves-effect">
                                <i class="mdi mdi-access-point"></i>
                                <span> Proses </span>
                            </a>
                        </li>

                        <li>
                            <a href="/reset" class="waves-effect d-none">
                                <i class="mdi mdi-recycle"></i>
                                <span> Reset </span>
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="clearfix"></div>
            </div> <!-- end sidebarinner -->
        </div>
        <!-- Left Sidebar End -->

        <!-- Start right Content here -->

        <div class="content-page">
            <!-- Start content -->
            <div class="content">

                <!-- Top Bar Start -->
                <div class="topbar">

                    <nav class="navbar-custom">

                        <ul class="list-inline float-right mb-0">
                            <li class="list-inline-item dropdown notification-list d-none">
                                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="ti-bell noti-icon"></i>
                                    <span class="badge badge-success noti-icon-badge">23</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h5><span class="badge badge-danger float-right">87</span>Notifikasi</h5>
                                    </div>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-primary"><i class="mdi mdi-account"></i></div>
                                        <p class="notify-details"><b>5 Data Belum terisi</b><small class="text-muted">Isi data Kompetensi dan Absensi.</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-success"><i class="mdi mdi-calendar-clock"></i></div>
                                        <p class="notify-details"><b>Sekarang 25 Oktober</b><small class="text-muted">Segera persiapkan data untuk Remunerasi.</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-warning"><i class="mdi mdi-check"></i></div>
                                        <p class="notify-details"><b>10 Data belum ACC</b><small class="text-muted">Segera lakukan akseptasi.</small></p>
                                    </a>

                                    <!-- All-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    </a>

                                </div>
                            </li>

                            <li class="list-inline-item dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="<?= uploaded(session()->get('uname') . '.png', '/assets/images/pengurus') ?>" class="img-fluid rounded-circle mb-2" id="imgPreview" width="128" height="128" />
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h5>Pengguna</h5>
                                    </div>
                                    <a class="dropdown-item" href="/users"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Users</a>
                                    <a class="dropdown-item" href="/users?pass"><i class="mdi mdi-wallet m-r-5 text-muted"></i> Password</a>
                                    <!-- <a class="dropdown-item" href="#"><i class="mdi mdi-settings m-r-5 text-muted"></i> Settings</a> -->
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/logout"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                                </div>
                            </li>

                        </ul>

                        <ul class="list-inline menu-left mb-0">
                            <li class="float-left">
                                <button class="button-menu-mobile open-left waves-light waves-effect">
                                    <i class="mdi mdi-menu"></i>
                                </button>
                            </li>
                            <li class="hide-phone app-search">
                                <form role="search" class="">
                                    <input type="text" placeholder="Search..." class="form-control">
                                    <a href=""><i class="fa fa-search"></i></a>
                                </form>
                            </li>
                        </ul>

                        <div class="clearfix"></div>

                    </nav>

                </div>
                <!-- Top Bar End -->

                <div class="page-content-wrapper ">

                    <div class="container-fluid">

                        <?= $this->renderSection('content'); ?>

                    </div><!-- container -->


                </div> <!-- Page content Wrapper -->

            </div> <!-- content -->

            <footer class="footer">
                <a href="http://semangkamedia.epizy.com/" class="text-muted"><small>© 2022 Yayasan Generasi Gemilang.</small></a>
            </footer>

        </div>
        <!-- End Right content here -->

    </div>
    <!-- END wrapper -->


    <!-- jQuery  -->
    <script src="<?= base_url() ?>/assets/js/popper.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/modernizr.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/detect.js"></script>
    <script src="<?= base_url() ?>/assets/js/fastclick.js"></script>
    <script src="<?= base_url() ?>/assets/js/jquery.slimscroll.js"></script>
    <script src="<?= base_url() ?>/assets/js/jquery.blockUI.js"></script>
    <script src="<?= base_url() ?>/assets/js/waves.js"></script>
    <script src="<?= base_url() ?>/assets/js/jquery.nicescroll.js"></script>
    <script src="<?= base_url() ?>/assets/js/jquery.scrollTo.min.js"></script>

    <!-- App js -->
    <script src="<?= base_url() ?>/assets/js/app.js"></script>
    <script>
        /* BEGIN SVG WEATHER ICON */
        if (typeof Skycons !== 'undefined') {
            var icons = new Skycons({
                    "color": "#fff"
                }, {
                    "resizeClear": true
                }),
                list = [
                    "clear-day", "clear-night", "partly-cloudy-day",
                    "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                    "fog"
                ],
                i;

            for (i = list.length; i--;)
                icons.set(list[i], list[i]);
            icons.play();
        };

        // scroll

        $(document).ready(function() {

            $("#boxscroll").niceScroll({
                cursorborder: "",
                cursorcolor: "#cecece",
                boxzoom: true
            });
            $("#boxscroll2").niceScroll({
                cursorborder: "",
                cursorcolor: "#cecece",
                boxzoom: true
            });

        });
    </script>

</body>

</html>