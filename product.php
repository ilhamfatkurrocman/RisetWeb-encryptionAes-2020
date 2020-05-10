<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<?php
// error_reporting(0);
// session_start();
include 'dbConnect.php'
?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">

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
                            <li class="active">Product</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <a href="add-product.php">
                            <button type="button" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp; New Product</button>
                        </a>
                        <br><br>
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Product Ready</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>


                                            <th>
                                                <center>Judul</center>
                                            </th>
                                            <th>
                                                <center>Pengarang</center>
                                            </th>
                                            <th>
                                                <center>Jumlah</center>
                                            </th>
                                            <th>
                                                <center>Harga</center>
                                            </th>
                                            <th>
                                                <center>Images</center>
                                            </th>
                                            <th>
                                                <center>Barcode</center>
                                            </th>
                                            <th>
                                                <center>Action</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $tampil = "select id_produk,judul_produk,pengarang_produk,jumlah_produk,harga_produk,GAMBAR,barcode from produk";
                                        $hasil = mysqli_query($connect, $tampil);
                                        // $jumlah = mysqli_num_rows($hasil);
                                        $no = 1;
                                        while ($data = mysqli_fetch_array($hasil)) {
                                        ?>
                                            <tr>
                                                <td scope="col" hidden>
                                                    <center>
                                                        <?php echo $data['id_produk']; ?>
                                                    </center>
                                                </td>
                                                <td scope="col">
                                                    <center>
                                                        <?php echo $data['judul_produk']; ?>
                                                    </center>
                                                </td>
                                                <td scope="col">
                                                    <center>
                                                        <?php echo $data['pengarang_produk']; ?>
                                                    </center>
                                                </td>
                                                <td scope="col">
                                                    <center>
                                                        <?php echo $data['jumlah_produk']; ?>
                                                    </center>
                                                </td>
                                                <td scope="col">
                                                    <center>
                                                        <?php echo $data['harga_produk']; ?>
                                                    </center>
                                                </td>
                                                <td scope="col">
                                                    <center>
                                                        <a href="" onclick="myFunction('<?php echo $data['GAMBAR']; ?>')">
                                                            <img width='100' src=" <?php echo $data['GAMBAR']; ?>">
                                                        </a>
                                                    </center>
                                                </td>

                                                <td scope="col">
                                                    <center>
                                                        <a href="" onclick="myFunction('https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?php echo $data['ID_PRODUK']; ?>')">
                                                            <img src="https://chart.googleapis.com/chart?chs=95x95&cht=qr&chl=<?php echo $data['ID_PRODUK']; ?>&choe=UTF-8">
                                                        </a>
                                                    </center>
                                                </td>
                                                <td>
                                                    <center>
                                                        <a href="#">
                                                            <button type="submit" class="btn btn-warning btn-sm" name="aksi">
                                                                <i class="fa fa-dot-circle-o"></i> EDIT
                                                            </button>
                                                        </a>
                                                        <a href="deleteProduct.php?id=<?php echo $data['id_produk']; ?>">
                                                            <button type="submit" class="btn btn-danger btn-sm" name="aksi">
                                                                <i class="fa fa-dot-circle-o"></i> Delete
                                                            </button>
                                                        </a>
                                                    </center>
                                                </td>
                                            </tr>
                                        <?php $no++;
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="assets/js/init-scripts/data-table/datatables-init.js"></script>
    <script>
        function myFunction(linkGambar) {
            window.open(linkGambar);
        }
    </script>


</body>

</html>