<?php
session_start();
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
        $query1 = mysqli_query($connect, "select ID_CUSTOMER,NM_CUSTOMER,ALAMAT_CUSTOMER,TELP_CUSTOMER,EMAIL_CUSTOMER,SALDO,USERNAME_CUSTOMER, PASSWORD_CUSTOMER from CUSTOMER where ID_CUSTOMER = '" . $_GET['id'] . "';");
        $data = mysqli_fetch_array($query1);
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
                            <li class="active">Input Employees</li>
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
                            <div class="card-header"><strong>Form Update Customer</strong></div>
                            <form method="POST" action="registration-process.php?mode=updateSaldo">
                                <div class="card-body card-block">
                                    <div class="row form-group">
                                        <div class="col-2">
                                            <label for="example-text-input" class="col-form-label">ID Customer</label>
                                            <input style="text-align:center" type="text" class="form-control" id="ID_CUSTOMER" name="ID_CUSTOMER" value="<?php echo $data['ID_CUSTOMER'] ?>" readonly>
                                        </div>
                                        <div class="col-10">
                                            <label for="example-text-input" class="col-form-label">ID Customer</label>
                                            <input style="text-align:center" type="text" class="form-control" id="NM_CUSTOMER" name="NM_CUSTOMER" value="<?php echo $data['NM_CUSTOMER'] ?>" readonly>
                                        </div>

                                    </div>
                                    <div class="row form-group">
                                        <div class="col-4">
                                            <label for="example-text-input" class="col-form-label">Email</label>
                                            <input type="email" class="form-control" id="EMAIL_CUSTOMER" name="EMAIL_CUSTOMER" value="<?php echo $data['EMAIL_CUSTOMER'] ?>" readonly>
                                        </div>
                                        <div class="col-4">
                                            <label for="example-text-input" class="col-form-label">Saldo Awal</label>
                                            <input type="text" class="form-control" id="SALDO" name="SALDO" value="<?php echo $data['SALDO'] ?>" readonly>
                                        </div>
                                        <div class="col-4">
                                            <label for="example-text-input" class="col-form-label">TopUp</label>
                                            <input type="text" class="form-control" id="SALDO_TOP" name="SALDO_TOP" placeholder="Rp.">
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="updateSaldo" value="TOP UP">
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