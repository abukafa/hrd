<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>RDA - Login</title>
    <meta content="Admin" name="Sistem Informasi Yayasan" />
    <meta content="Web Base Application" name="Semangka Media" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="<?= base_url() ?>/assets/images/default/logo.png">

    <!-- Main CSS File  -->
    <link href="<?= base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/assets/css/style.css" rel="stylesheet" type="text/css">
</head>


<body class="fixed-left">

    <!-- Begin page -->
    <div class="accountbg"></div>
    <div class="wrapper-page">

        <div class="card">
            <div class="card-body">

                <div class="alert alert-warning text-center <?= (session()->getFlashdata('error')) ?: 'd-none' ?>" role="alert">
                    <strong>Warning! </strong> <?= (session()->getFlashdata('error')) ?: '' ?>
                </div>

                <h3 class="text-center">
                    <div class="mb-2">APLIKASI HRD RDA</div>
                    <a href="http://semangkamedia.epizy.com/" class="logo logo-admin"><img src="<?= base_url() ?>/assets/images/default/logo.png" height="200" alt="logo"></a>
                </h3>

                <div class="p-3">
                    <form class="form-horizontal mt-2" action="/login" method="post">

                        <div class="form-group row">
                            <div class="col-12">
                                <input class="form-control" type="text" required="" placeholder="Username" name="uname">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <input class="form-control" type="password" required="" placeholder="Password" name="pass">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Remember me</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center row m-t-20">
                            <div class="col-12">
                                <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>

                        <div class="mt-4 mb-0 text-center">
                            <a href="http://semangkamedia.epizy.com/" class="text-muted"><small>© 2022 Yayasan Generasi Gemilang.</small></a><br>
                            <a href="http://semangkamedia.epizy.com/" class="text-muted"><small> Code by Semangkamedia</small></a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

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
</body>

</html>