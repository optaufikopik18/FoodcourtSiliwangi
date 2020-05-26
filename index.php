<?php
    
    
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

    session_start();

    $koneksi = new mysqli("localhost", "root", "", "sfm");

    $conn = new mysqli("localhost", "root", "", "sms");

    if ($_SESSION['Server'] || $_SESSION['Client']) {
        # code...
    

     
?>
<!DOCTYPE html>
<html>
<head>
    <title>Siliwangi Food Market</title>
    <link href="images/foodcourt.png" rel="shortcut icon">
</head>
<body>

</body>
</html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Blank Page | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">SILIWANGI FOOD MARKET</a>
            </div>
            
        </div>
    </nav>

<?php

    if ($_SESSION['Server']) {
        $user = $_SESSION['Server'];
    }elseif ($_SESSION['Client']) {
        $user = $_SESSION['Client'];
    }

    $sql = $koneksi->query("select * from tb_pengguna where id='$user' ");

    $data = $sql->fetch_assoc();


?>

    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/<?php echo $data['foto']; ?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $data['nama']; ?></div>
                    <div class="email">Anda Login di <?php echo $data['hak_akses'] ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            
                            <li><a href="logout.php"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                   

           

                    <?php  if ($_SESSION['Server']) {



                    ?>

                     <li class="active">
                        <a href="?page=home">
                            <i class="material-icons" >home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="?page=datapetugas">
                            <i class="material-icons" >account_circle</i>
                            <span>Petugas</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">list</i>
                            <span>Kios</span>
                        </a>
                    <ul class="ml-menu">
                    
                    <li>
                        <a href="?page=datakios">
                            <i class="material-icons" >restaurant</i>
                            <span>Data Kios</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=menumakanan">
                            <i class="material-icons" >restaurant_menu</i>
                            <span>Menu Makanan</span>
                        </a>
                    </li>
                    </ul>
                    </li>

                     <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">people</i>
                            <span>Pelanggan</span>
                        </a>
                    <ul class="ml-menu">
                    <li>
                        <a href="?page=datapelanggan">
                            <i class="material-icons" >accessibility</i>
                            <span>Data Pelanggan</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=transaksi">
                            <i class="material-icons" >credit_card</i>
                            <span>Data Saldo</span>
                        </a>
                    </ul>
                    </li>


                     <li>
                        <a href="?page=datapengguna">
                            <i class="material-icons" >person</i>
                            <span>Pengguna</span>
                        </a>
                    </li>

                    
                    <?php } ?>

                             <?php  if ($_SESSION['Client']) {



                    ?>

                     <li>
                        <a href="?page=profile">
                            <i class="material-icons" >home</i>
                            <span>Home</span>
                        </a>
                    </li>

                    <li class="active">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">list</i>
                            <span>Pemesanan Makanan Disini</span>
                        </a>
                    <ul class="ml-menu">
                    
                    <li>
                        <a href="?page=drinkbar">
                            <i class="material-icons" >local_bar</i>
                            <span>Drink Bar</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=fullhopper">
                            <i class="material-icons" >local_cafe</i>
                            <span>Full Hopper</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=asianfood">
                            <i class="material-icons" >local_dining</i>
                            <span>Asian Food</span>
                        </a>
                    </li>
                     <li>
                        <a href="?page=dapurcenghar">
                            <i class="material-icons" >local_dining</i>
                            <span>Dapur Cenghar</span>
                        </a>
                    </li>
                     <li>
                        <a href="?page=sarimanis">
                            <i class="material-icons" >local_dining</i>
                            <span>Sari Manis</span>
                        </a>
                    </li>
                     <li>
                        <a href="?page=baper">
                            <i class="material-icons" >local_dining</i>
                            <span>Baper</span>
                        </a>
                    </li>
                     <li>
                        <a href="?page=pawonjawa">
                            <i class="material-icons" >local_dining</i>
                            <span>Pawon Jawa</span>
                        </a>
                    </li>
                    </ul>
                    </li>

                     <li>
                        <a href="?page=pembelian">
                            <i class="material-icons" >print</i>
                            <span>Pembayaran Disini</span>
                        </a>
                    </li>
                    
                    <?php } ?>
                    <li class="active">
                        
                        <ul class="ml-menu">
                            
                        </ul>
                    </li>
                    <li>
                       
                        <ul class="ml-menu">
                    
                        </ul>
                    </li>
                    <li>
    
                        <ul class="ml-menu">

                        </ul>
                    </li>
             
                   
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2018 <a href="javascript:void(0);">Copyright - Tresa Iswara</a>.
                </div>
                
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <?php
                    $page = $_GET['page'];
                    $aksi = $_GET['aksi'];

                       if ($page == "home") {
                        if ($aksi == "") {
                            include "page/home.php";

                        }
                    }

                    if ($page == "datapetugas") {
                        if ($aksi == "") {
                            include "page/datapetugas/datapetugas.php";

                        }

                        if ($aksi == "tambah") {
                            include "page/datapetugas/tambah.php";
                        }

                        if ($aksi == "ubah") {
                            include "page/datapetugas/ubah.php";
                        }

                         if ($aksi == "hapus") {
                            include "page/datapetugas/hapus.php";
                        }
                    }

                    if ($page == "datapelanggan") {
                        if ($aksi == "") {
                            include "page/datapelanggan/datapelanggan.php";

                        }

                        if ($aksi == "tambah") {
                            include "page/datapelanggan/tambah.php";
                        }

                        if ($aksi == "ubah") {
                            include "page/datapelanggan/ubah.php";
                        }

                         if ($aksi == "hapus") {
                            include "page/datapelanggan/hapus.php";
                        }
                    }

                    if ($page == "transaksi") {
                        if ($aksi == "") {
                            include "page/transaksi/transaksi.php";

                        }

                        if ($aksi == "tambah") {
                            include "page/transaksi/tambah.php";
                        }

                        if ($aksi == "ubah") {
                            include "page/transaksi/ubah.php";
                        }

                         if ($aksi == "hapus") {
                            include "page/transaksi/hapus.php";
                        }
                    }

                    if ($page == "datakios") {
                        if ($aksi == "") {
                            include "page/kios/datakios.php";

                        }

                        if ($aksi == "tambah") {
                            include "page/kios/tambah.php";
                        }

                        if ($aksi == "ubah") {
                            include "page/kios/ubah.php";
                        }

                         if ($aksi == "hapus") {
                            include "page/kios/hapus.php";
                        }
                    }

                        if ($page == "menumakanan") {
                        if ($aksi == "") {
                            include "page/menumakanan/menumakanan.php";

                        }

                        if ($aksi == "tambah") {
                            include "page/menumakanan/tambah.php";
                        }

                        if ($aksi == "ubah") {
                            include "page/menumakanan/ubah.php";
                        }

                         if ($aksi == "hapus") {
                            include "page/menumakanan/hapus.php";
                        }
                    }

                    if ($page == "datapengguna") {
                        if ($aksi == "") {
                            include "page/datapengguna/datapengguna.php";

                        }

                        if ($aksi == "tambah") {
                            include "page/datapengguna/tambah.php";
                        }

                        if ($aksi == "ubah") {
                            include "page/datapengguna/ubah.php";
                        }

                         if ($aksi == "hapus") {
                            include "page/datapengguna/hapus.php";
                        }
                    }

                    if ($page == "profile") {
                        if ($aksi == "") {
                            include "client/home.php";

                        }
                    }
                    if ($page == "drinkbar") {
                        if ($aksi == "") {
                            include "client/drinkbar.php";

                        }
                    }

                     if ($page == "asianfood") {
                        if ($aksi == "") {
                            include "client/asianfood.php";

                        }
                    }

                     if ($page == "baper") {
                        if ($aksi == "") {
                            include "client/baper.php";

                        }
                    }

                     if ($page == "dapurcenghar") {
                        if ($aksi == "") {
                            include "client/dapurcenghar.php";

                        }
                    }

                     if ($page == "fullhopper") {
                        if ($aksi == "") {
                            include "client/fullhopper.php";

                        }
                    }

                     if ($page == "pawonjawa") {
                        if ($aksi == "") {
                            include "client/pawonjawa.php";

                        }
                    }

                     if ($page == "sarimanis") {
                        if ($aksi == "") {
                            include "client/sarimanis.php";

                        }
                    }

                     if ($page == "pembelian") {
                        if ($aksi == "") {
                            include "client/pembelian.php";

                        }
                    }
                ?>
            </div>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <script src="plugins/jquery-countto/jquery.countTo.js"></script>

      <!-- Morris Plugin Js -->
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="plugins/flot-charts/jquery.flot.js"></script>
    <script src="plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/tables/jquery-datatable.js"></script>
    <script src="js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>

</html>

<?php
    }else{

        header("location:login.php");
    }

?>