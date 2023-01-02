<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>APP-SERVICES</title>
	<!-- Bootstrap Styles-->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="<?php echo base_url() ?>assets/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->
     <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/select2/css/select2.min.css">
   
        <!-- Custom Styles-->
    <link href="<?php echo base_url() ?>assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <script src="<?php echo base_url()?>assets/plugins/jquery/jQuery-2.1.4.min.js"></script>
     <!-- TABLE STYLES-->
    <link href="<?php echo base_url() ?>assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- Load file library jQuery melalui CDN -->
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url() ?>">APP-SERVICES</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="<?php echo base_url().'auth/logout'?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <?php 
                if($this->session->userdata('level')=='admin'){?>
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> Master <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url().'kategori'?>"><i class="fa fa-list"></i> Kategori Barang</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'jenis'?>"><i class="fa fa-list"></i> Jenis</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'merk'?>"><i class="fa fa-list"></i> Merk</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'jenis_obat'?>"><i class="fa fa-list"></i> Jenis Obat</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'konektor'?>"><i class="fa fa-list"></i> Konektor</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'supplier'?>"><i class="fa fa-list"></i> Data Supplier</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'customer'?>"><i class="fa fa-list"></i> Data Customer</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'barang'?>"><i class="fa fa-list"></i> Data Barang</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'profile'?>"><i class="fa fa-list"></i> Profile Perusahaan</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'user'?>"><i class="fa fa-list"></i> User Sistem</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="#"><i class="fa fa-edit"></i> Transaksi <span class="fa arrow"></span></a>

                        <ul class="nav nav-second-level">
                        <li>
                                <a href="<?php echo base_url().'transaksi_masuk'?>"><i class="fa fa-desktop"></i> Transaksi Masuk</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'transaksi_services'?>"><i class="fa fa-desktop"></i> Transaksi Services</a>
                            </li>
                           <li>
                                <a href="<?php echo base_url().'transaksi_keluar'?>"><i class="fa fa-desktop"></i> Transaksi Keluar</a>
                            </li>
                            
                        </ul>
                    </li>
                    
                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> Laporan<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                        <li>
                                <a href="<?php echo base_url().'laporan/transaksimasuk'?>"> => Laporan Transaksi Masuk</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'laporan/transaksikeluar'?>"> => Laporan Transaksi Keluar</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'laporan/transaksiservices'?>"> => Laporan Transaksi Services</a>
                            </li>
                           
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'auth/logout'?>"><i class="fa fa-fw fa-file"></i> Keluar</a>
                    </li>
                </ul>
                <?php
                    }
                    else{?>
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> Master <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                        <li>
                                <a href="<?php echo base_url().'kategori'?>"><i class="fa fa-list"></i> Kategori Barang</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'jenis'?>"><i class="fa fa-list"></i> Jenis</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'merk'?>"><i class="fa fa-list"></i> Merk</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'jenis_obat'?>"><i class="fa fa-list"></i> Jenis Obat</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'konektor'?>"><i class="fa fa-list"></i> Konektor</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'supplier'?>"><i class="fa fa-list"></i> Data Supplier</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'customer'?>"><i class="fa fa-list"></i> Data Customer</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'barang'?>"><i class="fa fa-list"></i> Data Barang</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'profile'?>"><i class="fa fa-list"></i> Profile Perusahaan</a>
                            </li>
                            
                        </ul>
                    </li>
                    
                    <li>
                        <a href="#"><i class="fa fa-edit"></i> Transaksi <span class="fa arrow"></span></a>

                        <ul class="nav nav-second-level">
                        <li>
                                <a href="<?php echo base_url().'transaksi_masuk'?>"><i class="fa fa-desktop"></i> Transaksi Masuk</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'transaksi_services'?>"><i class="fa fa-desktop"></i> Transaksi Services</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'transaksi_keluar'?>"><i class="fa fa-desktop"></i> Transaksi Keluar</a>
                            </li>
                            
                        </ul>
                    </li>
                    
                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> Laporan<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url().'laporan/transaksimasuk'?>"> => Laporan Transaksi Masuk</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'laporan/transaksikeluar'?>"> => Laporan Transaksi Keluar</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'laporan/transaksiservices'?>"> => Laporan Transaksi Services</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'auth/logout'?>"><i class="fa fa-fw fa-file"></i> Keluar</a>
                    </li>
                </ul>
                <?php
                    }
                    ?>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                    <?php echo $contents; ?>
            </div>
            <!-- /. PAGE INNER  -->
            <!-- <footer><p>Website : <a href="http://akbardesign.org" target="_blank">www.akbardesign.org</a></p></footer> -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    
    <script src="<?php echo base_url() ?>assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="<?php echo base_url() ?>assets/js/jquery.metisMenu.js"></script>
    
    <!-- Select2 -->
    <script src="<?php echo base_url() ?>assets/plugins/select2/js/select2.full.min.js"></script>
    <script>
             $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
                });
    </script>
     <!-- DATA TABLE SCRIPTS -->
     <script src="<?php echo base_url() ?>assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url() ?>assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
                $('#dataTables1-example').dataTable();
                $('#dataTables2-example').dataTable();
            });
    </script>
    <!-- Morris Chart Js -->
    <script src="<?php echo base_url() ?>assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="<?php echo base_url() ?>assets/js/custom-scripts.js"></script>
    
    <link href="<?php echo base_url()?>assets/plugins/datepicker/css/datepicker.css" rel="stylesheet">
                <!-- <script src="<?php echo base_url()?>assets/plugins/datepicker/js/jquery.js"></script> -->
                <script src="<?php echo base_url()?>assets/plugins/datepicker/js/bootstrap-datepicker.js"></script>

                
 
</body>
</html>
