<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->

<?php sleep(1);
error_reporting(0); ?>
<?php session_start(); ?>

<?php include "dbConnect.php"; ?>
<?php
if (isset($_GET['id'])) {
    $a = "SELECT id, judul,pengarang,harga,jumlah,gambar FROM product WHERE id = '$_GET[id]'";
    $b = mysqli_query($connect, $a);
    list($idedit, $juduledit, $pengarangedit, $hargaedit, $jumlahedit, $gambaredit) = mysqli_fetch_row($b);
}
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
                        <a href="#" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Top up</a>
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
        <?php
        $sql_id = "select max(ID_PRODUK) as kode from produk WHERE ID_PRODUK like '%PR%'";
        $hasil_id = mysqli_query($connect, $sql_id);
        if (mysqli_num_rows($hasil_id) > 0) {
            $row = mysqli_fetch_array($hasil_id);
            $idmax = $row['kode'];
            $id_urut = (int) substr($idmax, 2, 4);
            $id_urut++;
            // sprintf = menambahkan (+)
            $kode = "PR" . sprintf("%04s", $id_urut);
        } else {
            $kode = "PR0001";
        }
        ?>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header"><strong>Form Input Product</strong></div>
                            <form method="POST" action="product_proses.php" enctype="multipart/form-data">
                                <div class="card-body card-block">

                                    <?php
                                    if (isset($_GET['id'])) {
                                        echo "<input type='hidden' name='aksi' value='Update'>";
                                    } else {
                                        echo "<input type='hidden' name='aksi' value='Tambah'>";
                                    }
                                    ?>
                                    <div class="form-group">

                                        <div class="row form-group">
                                            <!--<div class="col-6"><input class="form-control" placeholder="Masukkan ID Menu" type="text" id="id" name="id" value="<?php //if (isset($_GET['id'])) {echo $id;} 
                                                                                                                                                                    ?>">-->
                                            <!--</div>-->
                                            <div class="col-sm-3">
                                                <input name="id" id="id" type="text" class="form-control form-control-center" value="<?= $kode ?>" readonly>
                                            </div>
                                            <div class="col-sm-3">
                                                <input name="id_admin" id="id_admin" type="text" class="form-control form-control-center" placeholder="Your ID">
                                            </div>

                                            <div class="col-6"><input type="text" name="txtjudul" id="judul" placeholder="Judul" class="form-control" value="<?php if (isset($_GET['id'])) {
                                                                                                                                                                    echo $juduledit;
                                                                                                                                                                } ?>" required="">
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class=" col-6"><input type="text" name="txtpengarang" id="pengarang" placeholder="Pengarang" class="form-control" value="<?php if (isset($_GET['id'])) {
                                                                                                                                                                                echo $pengarangedit;
                                                                                                                                                                            } ?>" required=""></div>
                                            <div class="col-6"><input type="text" name="txtjumlah" id="jumlah" placeholder="Jumlah" class="form-control" value="<?php if (isset($_GET['id'])) {
                                                                                                                                                                    echo $jumlahedit;
                                                                                                                                                                } ?>" required=""></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-6"><input type="text" name="txtharga" id="harga" placeholder="Harga" class="form-control" value="<?php if (isset($_GET['id'])) {
                                                                                                                                                                    echo $hargaedit;
                                                                                                                                                                } ?>" required=""></div>
                                            <div class="input-group col-6">
                                                <div class="custom-file">

                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                    <?php
                                                    if (isset($_GET['id'])) {
                                                        echo "<img src='$gambaredit' id='gambar' width='50'>";
                                                        echo "<input type='checkbox' name='cbcek' value='1' onclick=\"javascript: if(this.checked==true){document.getElementById('gambar').style.display='none';}else{document.getElementById('gambar').style.display='block';} \"/> Centang untuk ganti foto";
                                                    }
                                                    ?>
                                                    <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="filefoto" required="">
                                                    <!--<input type="file" name="filefoto">-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary" <?php if (isset($_GET['id'])) { ?> value="Update" <?php } else { ?> value="Simpan" <?php } ?> onclick="javascript: var a='';
            			if(this.form.txtid.value== '') a+='Isi Id dulu\n';
            		
            			if(a!='') alert(a);
            			else this.form.submit();
            			">
                                <input type="reset" class="btn btn-danger" value="Batal">

                            </form>
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