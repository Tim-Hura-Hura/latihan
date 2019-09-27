<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bengkel Lancar Jaya</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{csrf_token()}}">
    <!-- favicon
    ============================================ -->

    <!-- Google Fonts
    ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <link href="{{asset('assets/css/sweetalert.css')}}" rel="stylesheet">
    <link rel="stylesheet"  href="{{asset('assets/css/select2/select2.min.css')}}">
    <!-- Bootstrap CSS
    ============================================ -->
    <link rel="stylesheet"  href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet"  href="{{asset('assets/css/ilmudetil.css')}}">

    <link rel="stylesheet"  href="{{asset('assets/css/chosen/bootstrap-chosen.css')}}">
    <!-- Bootstrap CSS
    ============================================ -->
    <link rel="stylesheet"  href="{{asset('assets/css/font-awesome.min.css')}}">
    <!-- owl.carousel CSS
    ============================================ -->
    <link rel="stylesheet"  href="{{asset('assets/css/owl.carousel.css')}}">
    <link rel="stylesheet"  href="{{asset('assets/css/owl.theme.css')}}">
    <link rel="stylesheet"  href="{{asset('assets/css/owl.transitions.css')}}">
       <!-- touchspin CSS
        ============================================ -->
    <link rel="stylesheet" href="{{asset('assets/css/touchspin/jquery.bootstrap-touchspin.min.css')}}">
    <!-- animate CSS
    ============================================ -->
    <link rel="stylesheet"  href="{{asset('assets/css/animate.css')}}">
    <!-- normalize CSS
    ============================================ -->
    <link rel="stylesheet"  href="{{asset('assets/css/normalize.css')}}">
    <!-- meanmenu icon CSS
    ============================================ -->
    <link rel="stylesheet"  href="{{asset('assets/css/meanmenu.min.css')}}">
    <!-- main CSS
    ============================================ -->
    <link rel="stylesheet"  href="{{asset('assets/css/main.css')}}">
    <!-- morrisjs CSS
    ============================================ -->
    <link rel="stylesheet"  href="{{asset('assets/css/morrisjs/morris.css')}}">
    <!-- mCustomScrollbar CSS
    ============================================ -->
    <link rel="stylesheet"  href="{{asset('assets/css/scrollbar/jquery.mCustomScrollbar.min.css')}}">
    <!-- metisMenu CSS
    ============================================ -->
    <link rel="stylesheet"  href="{{asset('assets/css/metisMenu/metisMenu.min.css')}}">
    <link rel="stylesheet"  href="{{asset('assets/css/metisMenu/metisMenu-vertical.css')}}">
    <!-- calendar CSS
    ============================================ -->
    <link rel="stylesheet"  href="{{asset('assets/css/calendar/fullcalendar.min.css')}}">
    <link rel="stylesheet"  href="{{asset('assets/css/calendar/fullcalendar.print.min.css')}}">
        <!-- modals CSS
        ============================================ -->
    <link rel="stylesheet" href="{{asset('assets/css/modals.css')}}">
    <!-- style CSS
    ============================================ -->
    <link rel="stylesheet"  href="{{asset('assets/css/style.css')}}">
    <!-- responsive CSS
    ============================================ -->
    <link rel="stylesheet"  href="{{asset('assets/css/responsive.css')}}">
     <!-- notifications CSS
        ============================================ -->
    <link rel="stylesheet" href="{{asset('assets/css/notifications/Lobibox.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/notifications/notifications.css')}}">
      <!-- x-editor CSS
        ============================================ -->
<!--     <link rel="stylesheet" href="{{asset('assets/css/editor/select2.css')}}">
 -->    <link rel="stylesheet" href="{{asset('assets/css/editor/datetimepicker.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/editor/bootstrap-editable.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/editor/x-editor-style.css')}}">
     <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="{{asset('assets/css/data-table/bootstrap-table.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/data-table/bootstrap-editable.css')}}">
    <!-- modernizr JS
    ============================================ -->
        <script src="{{asset('assets/js/Chart.js')}}"></script>

    <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

 <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a><img class="main-logo" src="{{asset('assets/img/logo/logo.png')}}" alt="" /></a>
                <strong><img src="{{asset('assets/img/logo/logo1.png')}}" alt="" /></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        
                        
                        <li>
                            <a class="has-arrow" href="{{url('kasir_pelanggan')}}">
                                   <i class="fa big-icon fa-users icon-wrap"></i>
                                   <span class="mini-click-non">Data Pelanggan</span>
                                </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Landing Page" href="{{url('kasir_pelanggan')}}" aria-expanded="false"><i class="fa fa-plus icon-wrap sub-icon-mg" aria-hidden="true"></i> <span class="mini-click-non">Pelanggan & Kendaraan</span></a>
                                </li> 
                                 <li><a title="View Mail" href="{{url('kasir_detail_pelanggan')}}"><i class="fa fa-user sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Detail Pelanggan</span></a></li>
                                 <li><a title="View Mail" href="{{url('kasir_kendaraan')}}"><i class="fa fa-motorcycle sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Detail Kendaraan</span></a></li>
                            
                            </ul>
                        </li>    
                        <li>
                            <a class="has-arrow" href="{{url('kasir_penjualan')}}">
                                   <i class="fa big-icon fa-list-alt icon-wrap"></i>
                                   <span class="mini-click-non">Data Transaksi</span>
                                </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                 <li><a title="Inbox" href="{{url('kasir_penjualan')}}"><i class="fa fa-shopping-cart sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Penjualan</span></a></li>
                                 <li><a title="View Mail" href="{{url('kasir_detail')}}"><i class="fa fa-list-ol sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Detail Penjualan</span></a></li>
                                 <li><a title="View Mail" href="{{url('kasir_kendaraan_histori')}}"><i class="fa fa-motorcycle sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Histori Kendaraan</span></a></li>
                            
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="{{url('kasir_jasa')}}">
                                   <i class="fa big-icon fa-th-list icon-wrap"></i>
                                   <span class="mini-click-non">Data Jasa</span>
                                </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                 <li><a title="Inbox" href="{{url('kasir_jasa')}}"><i class="fa fa-wrench sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Master Jasa</span></a></li>
                                 <li><a title="View Mail" href="{{url('kasir_tempat_servis')}}"><i class="fa fa-align-justify   sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Tempat Servis</span></a></li>
                            
                            </ul>
                        </li>
                         <li><a title="Landing Page" href="{{url('kasir_lane')}}" aria-expanded="false"><i class="fa fa-bars  icon-wrap sub-icon-mg" aria-hidden="true"></i> <span class="mini-click-non">Lane Aktif</span></a></li>
                       
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                      
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                                    <i class="fa fa-bars"></i>
                                                </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                       
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                
                                             
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                            <i class="fa fa-user adminpro-user-rounded header-riht-inf" aria-hidden="true"></i> 
                                                            <span class="admin-name">Akun</span> 
                                                            <i class="fa fa-angle-down adminpro-icon adminpro-down-arrow"></i>
                                                        </a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a><input type="hidden" style="width: 0px; height: 0px;"></input></a></li>

                                                         <li><a href="{{url('logout')}}"><span class="fa fa-home author-log-ic"></span>Keluar</a>
                                                        </li>
                                                
                                                    </ul>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                      
                                        <li>
                                            <a class="has-arrow" href="{{url('kasir_pelanggan')}}">
                                                   <i class="fa big-icon fa-users icon-wrap"></i>
                                                   <span class="mini-click-non">Data Pelanggan</span>
                                                </a>
                                            <ul class="submenu-angle" aria-expanded="true">
                                                <li><a title="Landing Page" href="{{url('kasir_pelanggan')}}" aria-expanded="false"><i class="fa fa-plus icon-wrap sub-icon-mg" aria-hidden="true"></i> <span class="mini-click-non">Pelanggan & Kendaraan</span></a>
                                                </li> 
                                                 <li><a title="View Mail" href="{{url('kasir_detail_pelanggan')}}"><i class="fa fa-user sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Detail Pelanggan</span></a></li>
                                                 <li><a title="View Mail" href="{{url('kasir_kendaraan')}}"><i class="fa fa-motorcycle sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Detail Kendaraan</span></a></li>
                                            
                                            </ul>
                                        </li>    
                                        <li>
                                            <a class="has-arrow" href="{{url('kasir_penjualan')}}">
                                                   <i class="fa big-icon fa-list-alt icon-wrap"></i>
                                                   <span class="mini-click-non">Data Transaksi</span>
                                                </a>
                                            <ul class="submenu-angle" aria-expanded="true">
                                                 <li><a title="Inbox" href="{{url('kasir_penjualan')}}"><i class="fa fa-shopping-cart sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Penjualan</span></a></li>
                                                 <li><a title="View Mail" href="{{url('kasir/detail')}}"><i class="fa fa-list-ol sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Detail Penjualan</span></a></li>
                                            
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="has-arrow" href="{{url('kasir_jasa')}}">
                                                   <i class="fa big-icon fa-th-list icon-wrap"></i>
                                                   <span class="mini-click-non">Data Jasa</span>
                                                </a>
                                            <ul class="submenu-angle" aria-expanded="true">
                                                 <li><a title="Inbox" href="{{url('kasir_jasa')}}"><i class="fa fa-wrench sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Master Jasa</span></a></li>
                                                 <li><a title="View Mail" href="{{url('kasir_tempat_servis')}}"><i class="fa fa-align-justify   sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Tempat Servis</span></a></li>
                                            
                                            </ul>
                                        </li>
                                      
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                <div class="row">
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
          @yield('content')
       
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright &copy; 2019 <a>Bengkel Motor</a> Lancar Jaya</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    

     <!-- <script src="{{asset('assets/js/highcharts.js')}}"></script> -->
     <script src="{{asset('assets/js/jquery-1.10.1.min.js')}}"></script>
    
       <script src="{{asset('assets/js/sweetalert.js')}}"></script>
        @include('sweet::alert')
     <!-- jquery
        ============================================ -->
    <script src="{{asset('assets/js/vendor/jquery-1.11.3.min.js')}}"></script>
    <!-- bootstrap JS
        ============================================ -->
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <!-- wow JS
        ============================================ -->
    <script src="{{asset('assets/js/wow.min.js')}}"></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="{{asset('assets/js/jquery-price-slider.js')}}"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="{{asset('assets/js/jquery.meanmenu.js')}}"></script>
    <!-- owl.carousel JS
        ============================================ -->
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <!-- sticky JS
        ============================================ -->
    <script src="{{asset('assets/js/jquery.sticky.js')}}"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="{{asset('assets/js/jquery.scrollUp.min.js')}}"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="{{asset('assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('assets/js/scrollbar/mCustomScrollbar-active.js')}}"></script>
    <script src="{{asset('assets/js/rangle-slider/jquery-ui-touch-punch.min.js')}}"></script>
    <!-- touchspin JS
        ============================================ -->
    <script src="{{asset('assets/js/touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
    <script src="{{asset('assets/js/touchspin/touchspin-active.js')}}"></script>
    <!-- metisMenu JS
        ============================================ -->
    <script src="{{asset('assets/js/metisMenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('assets/js/metisMenu/metisMenu-active.js')}}"></script>
      <!-- data table JS
        ============================================ -->
    <script src="{{asset('assets/js/data-table/bootstrap-table.js')}}"></script>
    <script src="{{asset('assets/js/data-table/tableExport.js')}}"></script>
    <script src="{{asset('assets/js/data-table/data-table-active.js')}}"></script>
    <script src="{{asset('assets/js/data-table/bootstrap-table-editable.js')}}"></script>
    <script src="{{asset('assets/js/data-table/bootstrap-editable.js')}}"></script>
    <script src="{{asset('assets/js/data-table/bootstrap-table-resizable.js')}}"></script>
    <script src="{{asset('assets/js/data-table/colResizable-1.5.source.js')}}"></script>
    <script src="{{asset('assets/js/data-table/bootstrap-table-export.js')}}"></script>
    <!--  editable JS
        ============================================ -->
    <script src="{{asset('assets/js/editable/jquery.mockjax.js')}}"></script>
    <script src="{{asset('assets/js/editable/mock-active.js')}}"></script>
<!--     <script src="{{asset('assets/js/editable/select2.js')}}"></script>
 -->    <script src="{{asset('assets/js/editable/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/editable/bootstrap-datetimepicker.js')}}"></script>
    <script src="{{asset('assets/js/editable/bootstrap-editable.js')}}"></script>
    <script src="{{asset('assets/js/editable/xediable-active.js')}}"></script>
    <!-- Chart JS
        ============================================ -->
    <script src="js/chart/jquery.peity.min.js')}}"></script>
    <script src="js/peity/peity-active.js')}}"></script>
    <!-- morrisjs JS
        ============================================ -->
    <script src="{{asset('assets/js/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('assets/js/sparkline/jquery.charts-sparkline.js')}}"></script>
    <script src="{{asset('assets/js/Chart.js')}}"></script>
     <!-- notification JS
        ============================================ -->
    <script src="{{asset('assets/js/notifications/Lobibox.js')}}"></script>
    <script src="{{asset('assets/js/notifications/notification-active.js')}}"></script>
    <!-- calendar JS
        ============================================ -->
    <script src="{{asset('assets/js/calendar/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/calendar/fullcalendar.min.js')}}"></script>
    <script src="{{asset('assets/js/calendar/fullcalendar-active.js')}}"></script>
    <!-- tab JS
        ============================================ -->
    <script src="{{asset('assets/js/tab.js')}}"></script>
    <!-- wizard JS
        ============================================ -->
    <script src="{{asset('assets/js/wizard/jquery.steps.js')}}"></script>
    <script src="{{asset('assets/js/wizard/steps-active.js')}}"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="{{asset('assets/js/plugins.js')}}"></script>
        <!-- chosen JS
        ============================================ -->
    <script src="{{asset('assets/js/chosen/chosen.jquery.js')}}"></script>
    <script src="{{asset('assets/js/chosen/chosen-active.js')}}"></script>
    <!-- main JS
        ============================================ -->
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('assets/js/datapicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('assets/js/datapicker/datepicker-active.js')}}"></script>

    <script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/js/select2/select2-active.js')}}"></script>
</body>

</html>