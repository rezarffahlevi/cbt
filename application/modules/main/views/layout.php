<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?=$identity->School?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?=base_url('assets/plugins/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link href="<?=base_url('assets/plugins/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="<?=base_url('assets/css/ionicons.min.css')?>" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?=base_url('assets/css/AdminLTE.min.css');?>" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?=base_url('assets/css/skins/_all-skins.min.css')?>" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="<?=base_url('assets/plugins/datatables/dataTables.bootstrap.css')?>" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="<?=base_url('assets/plugins/iCheck/all.css')?>" rel="stylesheet" type="text/css" />
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<body class="skin-blue fixed" onkeydown="return c()">
    <!-- Site wrapper -->
    <div class="wrapper">
      
      <header class="main-header">
        <a href="<?=site_url('main/admin/')?>" class="logo"><b><?=$identity->School?></b> 0.1</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="<?=base_url('assets/img/'.$identity->Logo)?>" class="img-circle" alt="User Image"/>
                          </div>
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li><!-- end message -->
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 9 tasks</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?=base_url('assets/img/'.$identity->Logo)?>" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?=$this->session->userdata('Name')?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?=base_url('assets/img/'.$identity->Logo)?>" class="img-circle" alt="User Image" />
                    <p>
                      <?=$this->session->userdata('Name')." - "; echo ($this->session->userdata('Level') == 1) ? "Admin" : "Guru"; ?>
                      <small><?=$this->session->userdata('Username')?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!-- <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li> -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profil</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?=site_url('main/login/logout/')?>" class="btn btn-default btn-flat">Keluar</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?=base_url('assets/img/'.$identity->Logo)?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?=$this->session->userdata('Name')?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Aktif</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Cari..."/>
              <span class="input-group-btn">
                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENU UTAMA</li>
            <li>
              <a href="<?=site_url('main/admin/')?>">
                <i class="fa fa-dashboard"></i> <span>Beranda</span> <small class="label pull-right bg-green"></small>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i> <span>Data Induk</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?=site_url('main/master/student/')?>"><i class="fa fa-circle-o"></i> Siswa</a></li>
                <li><a href="<?=site_url('main/master/subject/')?>"><i class="fa fa-circle-o"></i> Mata Pelajaran</a></li>
                <li><a href="<?=site_url('main/master/class/')?>"><i class="fa fa-circle-o"></i> Kelas</a></li>
                <li><a href="<?=site_url('main/master/major/')?>"><i class="fa fa-circle-o"></i> Jurusan</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Multilevel</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                    <li>
                      <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                      <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-book"></i> Dokumentasi</a></li>
            <li class="header">Tambahan</li>
            <li><a href="#"><i class="fa fa-circle-o text-danger"></i> Penting</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-warning"></i> Peringatan</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-info"></i> Informasi</a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

    <!-- =============================================== -->

    <!-- jQuery 2.1.3 -->
    <script src="<?=base_url('assets/plugins/jquery/jquery.min.js')?>"></script>
    
    <?=$this->load->view($content)?>


    <!-- ============================================== -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2018 <a href="http://isgone.hol.es/cv/">Our Solution</a>.</strong> All rights reserved.
      </footer>
    </div>
<!-- ./wrapper -->

    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?=base_url('assets/plugins/bootstrap/js/bootstrap.min.js')?>" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="<?=base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js')?>" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="<?=base_url('assets/plugins/fastclick/fastclick.min.js')?>" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url('assets/js/app.min.js')?>" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?=base_url('assets/js/demo.js')?>" type="text/javascript"></script>

    <script type="text/javascript">
    function c(){
        var pressedKey = String.fromCharCode(event.keyCode).toLowerCase();
        if(event.ctrlKey && (pressedKey == "s" || pressedKey == "d" || pressedKey == "t")){
           window.close();
           event.returnValue = false;
        }
    }
    </script>
  </body>
</html>


    <!-- Page Loader -->
<!--     <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Sabar...</p>
        </div>
    </div>
 -->