<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<?php
include 'dbConnect.php';
?>
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="dashboard.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Administrator</h3><!-- /.menu-title -->
                    <li>
                        <a href="administrator-users.php" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-id-card-o"></i>Users</a>
                        <a href="product.php" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Product</a>
                        <a href="toko.php" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Toko</a>
                        <a href="#" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-pie-chart"></i>Report</a>
                    </li>
                    <h3 class="menu-title">Transaction</h3><!-- /.menu-title -->
                    <li>
                        <a href="customers-users.php" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-id-card-o"></i>Customers</a>
                        <!-- <a href="topUp.php" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Top up</a> -->
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <!-- <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>
                    </div> -->
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="index.php"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->
        <?php
        $sql_id = "select max(ID_CUSTOMER) as kode from customer WHERE ID_CUSTOMER like '%CR%'";
        $hasil_id = mysqli_query($connect, $sql_id);
        if (mysqli_num_rows($hasil_id) > 0) {
            $row = mysqli_fetch_array($hasil_id);
            $idmax = $row['kode'];
            $id_urut = (int) substr($idmax, 2, 4);
            $id_urut++;
            // sprintf = menambahkan (+)
            $kode = "CR" . sprintf("%04s", $id_urut);
        } else {
            $kode = "CR0001";
        }
        ?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <!-- <h1>Dashboard</h1> -->
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Input Customer</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header"><strong>Form Input Customer</strong></div>
                            <form method="POST" action="registration-process.php?mode=simpanCustomer">
                                <div class="card-body card-block">
                                    <div class="row form-group">
                                        <div class="col-4">
                                            <input style="text-align:center" type="text" class="form-control" id="id_customer" name="id_customer" value="<?= $kode ?>" readonly>
                                        </div>
                                        <div class="col-8">
                                            <input style="text-align:center" type="text" class="form-control" id="nm_customer" name="nm_customer" placeholder="Full Name" required="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class=" col-6"><input type="text" class="form-control" id="alamat_customer" name="alamat_customer" placeholder="Address" required=""></div>
                                        <div class="col-6"><input type="text" class="form-control" id="telp_customer" name="telp_customer" placeholder="Phone Number" required=""></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-6"><input type="email" class="form-control" id="email_customer" name="email_customer" placeholder="Email Address" required=""></div>
                                        <div class="col-6"><input type="text" class="form-control" id="saldo" name="saldo" placeholder="Saldo"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-6"><input type="text" class="form-control" id="username_customer" name="username_customer" placeholder="Username" required=""></div>
                                        <div class="col-6"><input type="password" class="form-control" id="password_customer" name="password_customer" placeholder="Password" required=""></div>
                                    </div>
                                    <input type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" name="simpanCustomer" value="Simpan">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->
    <!-- Right Panel -->


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>

    <script src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>
