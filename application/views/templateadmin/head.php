<?php
        $statususer = generate_session('login');
        $active = explode("/",$_SERVER['PATH_INFO']);
        if (!isset($active[2])) {
          $active = $active[1];
        }else{
          $active = $active[2];
        }

        $menu = [
          "Jadwal Webinar" => "home",
          "Link Webinar" => "webinar",
          "Admin" => "useradmin",
          "Sertifikat" => "sertifikat",
          "Peserta" => "peserta",
          "Data Webinar" => "segmen",
          "Instansi" => "instansi",
          "Sertifikat" => "downloadsertifikat",
          "Profile" => "user",
          "Status" => "status",
        ];

        $icon = [
          "Jadwal Webinar" => "fa fa-home",
          "Link Webinar" => "fa fa-tag",
          "Admin" => "fa fa-user",
          "Sertifikat" => "fa fa-file",
          "Peserta" => "fa fa-users",
          "Data Webinar" => "fa fa-tag",
          "Instansi" => "fa fa-tag",
          "Sertifikat" => "fa fa-file",
          "Profile" => "fa fa-user",
          "Status" => "fa fa-tag",
        ];
        
        $auth = [
          "Jadwal Webinar" => "user",
          "Link Webinar" => "user",
          "Admin" => "admin",
          "Sertifikat" => "admin",
          "Peserta" => "admin",
          "Data Webinar" => "admin",
          "Instansi" => "admin",
          "Sertifikat" => "user",
          "Profile" => "user",
          "Status" => "admin",
        ];

        $menuactive = NULL;
        // cek active menu
        foreach(array_keys($menu) as $cc => $val){
            // cek if array
            if (is_array($menu[$val])) {
                $ccc = $val;
                foreach(array_keys($menu[$val]) as $ccs => $vals){
                    if ($menu[$val][$vals] == $active) {
                        $menuactive = $ccc;
                    }
                }
            }else{
                if ($active == $menu[$val]) {
                    $menuactive = $val;
                }
            }
        }

        // autenticarion if admin login first load path 0 from array with condition active menu

        function cekarraylistcontainactivekey($active = null, $data = [], $auth)
        {
            $obj1 = array_keys($data);

            $cc = null;

            foreach ($obj1 as $key => $value) {
                if (is_array($data[$value])) {
                    foreach(array_keys($data[$value]) as $key => $datas ) {
                        if ($data[$value][$datas] == $active) {
                            $cc = $auth[$value][$datas];
                        }
                    }
                }else{
                    if ($data[$value] == $active) {
                        $cc = $auth[$value];
                    }
                }

            }
            return $cc;
        }

        function callbacktoadmin($active = null, $data = [], $auth)
        {
            $obj1 = array_keys($data);

            $cc = null;

            if ($active == 'home') {
              return redirect('home');
            }else{
              foreach ($obj1 as $key => $value) {
                if (is_array($data[$value])) {
                  foreach(array_keys($data[$value]) as $key => $datas ) {
                    if ($auth[$value][$datas] == $active) {
                      return redirect('admin/'.$data[$value][$datas]);
                    }
                  }
                }else{
                  if ($auth[$value] == $active) {
                    return redirect('admin/'.$data[$value]);
                  }
                }

              }
            }
            return $cc;

        }

        $cek = cekarraylistcontainactivekey($active, $menu, $auth);

        if (generate_session('login') != $cek) {
          if ($active == 'home' || $active == 'sertifikat'|| $active == 'webinar') {

          }else{
            callbacktoadmin(generate_session('login'), $menu, $auth);
          }
        }


        // lihat nilai active

    ?>


<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>  <?= Perusahaans::get()->nama; ?></title>
    <link rel="shortcut icon" href="<?= base_url('assets/front/') ?>images/logo1-png.png" type="image/x-icon">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- favicon

		============================================ -->
    <!-- Google Fonts
		============================================ -->
    <link href="<?= base_url('');?>assets/notika/https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900"
        rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->

    <!-- replay css -->

    <link rel="stylesheet" href="<?= base_url('');?>assets/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('');?>assets/notika/css/bootstrap.min.css">
    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('');?>assets/notika/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('');?>assets/notika/css/owl.carousel.css">
    <link rel="stylesheet" href="<?= base_url('');?>assets/notika/css/owl.theme.css">
    <link rel="stylesheet" href="<?= base_url('');?>assets/notika/css/owl.transitions.css">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('');?>assets/notika/css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('');?>assets/notika/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('');?>assets/notika/css/normalize.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('');?>assets/notika/css/wave/waves.min.css">
    <link rel="stylesheet" href="<?= base_url('');?>assets/notika/css/wave/button.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('');?>assets/notika/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('');?>assets/notika/css/notika-custom-icon.css">
    <!-- Data Table JS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('');?>assets/notika/css/jquery.dataTables.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('');?>assets/notika/css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('');?>assets/notika/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('');?>assets/notika/css/responsive.css">


    <link rel="stylesheet" href="<?= base_url('');?>assets/summernote.min.css">

    <link rel="stylesheet" href="<?= base_url('');?>mc_sweetalert/sweetalert.css">


    <!-- modernizr JS
		============================================ -->
    <script src="<?= base_url('')?>assets/notika/js/vendor/modernizr-2.8.3.min.js"></script>

    <!-- from notika -->
    <!-- datatable area -->

    <!-- Data Table JS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/notika/css/jquery.dataTables.min.css">
    <!-- main CSS
		============================================ -->
    <!-- style CSS
		============================================ -->
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('')?>assets/notika/css/responsive.css">

    <link rel="stylesheet" href="<?= base_url('')?>assets/tree/Treant.css" />

    <!-- from notika -->

    <!-- End Footer area-->
    <link rel="stylesheet" href="<?= base_url('')?>assets/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('')?>assets/responsive.bootstrap4.min.css">
    <!-- jquery

		============================================ -->
    <script src="<?= base_url('')?>assets/notika/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?= base_url('')?>assets/notika/js/data-table/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('')?>assets/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('')?>assets/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('')?>assets/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url('')?>assets/summernote.min.js"></script>

    <script src="<?= base_url('')?>assets/notika/js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
   
	<!-- tawk chat JS
		============================================ -->



    <script src="<?= base_url('');?>mc_sweetalert/sweetalert.js"></script>
    <script src="<?= base_url('')?>assets/tree/vendor/raphael.js"></script>
    <script src="<?= base_url('')?>assets/tree/Treant.js"></script>

    <!-- bootstrap JS
		============================================ -->

        <style>
            .paginate_button a{
            padding: 0 !important;
            background-color: rgba(0,0,0,0.0) !important;
            color: #000000 !important;
            outline: none !important;;
            border: none !important;;
            }

            .paginate_button.active a{
            color: #9ca8eb !important;
            }


            .footer-copyright-area{
              background-color: #007bff !important;
            }

            .header-top-area{
              background-color: #007bff !important;
            }


        </style>



</head>

<body>
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <h3 style="color: white;"><img src="<?= base_url('assets/logo.png');  ?>" style="height: 30px; width: auto;">&nbsp;&nbsp;&nbsp;</h3>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">
                            <li class="nav-item dropdown">
                                <a href="<?= site_url('login/out') ?>" role="button" aria-expanded="false"
                                    class="nav-link dropdown-toggle"><span><i
                                    class="fas fa-sign-out-alt"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area -->
    <!-- Mobile Menu start -->

        <!-- mobile -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <?php foreach(array_keys($menu) as $key => $val) : ?>
                                <?php if(is_array($menu[$val])) : ?>
                                <li><a data-toggle="collapse" data-target="#Charts" href="#"><?= $val ?></a>
                                    <ul class="collapse dropdown-header-top">
                                        <?php foreach(array_keys($menu[$val]) as $keyd => $vald) : ?>
                                            <li><a href="<?= site_url('admin/'.$menu[$val][$vald]);?>"><?= $vald; ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                                <?php else: ?>
                                    <?php if($statususer == $auth[$val]) : ?>
                                      <?php if ($val == "Jadwal Webinar"): ?>
                                          <li>
                                            <a href="<?= site_url('/').$menu[$val]; ?>"><i class="<?= $icon[$val] ?>"></i>
                                              <?= $val ?>
                                            </a>
                                          </li>
                                        <?php else: ?>
                                          <li>
                                            <a href="<?= site_url('admin/').$menu[$val]; ?>"><i class="<?= $icon[$val] ?>"></i>
                                              <?= $val ?>
                                            </a>
                                          </li>
                                      <?php endif; ?>
                                    <?php endif ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->
    <!-- desktop area -->
    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">

                        <?php foreach(array_keys($menu) as $key => $val) : ?>
                            <?php if($val == $menuactive) : ?>
                                    <?php if(is_array($menu[$val])) : ?>
                                            <?php
                                                $cekstat = null;
                                                foreach(array_keys($menu[$val]) as $elm => $ecw){
                                                    if ($auth[$val][$ecw] == $statususer) {
                                                        $cekstat = $statususer;
                                                    }
                                                }

                                            ?>
                                            <?php if($statususer == $cekstat) : ?>
                                                <li class="active">
                                                    <a data-toggle="tab" href="#<?= str_replace(" ","-",$val); ?>"><i class="<?= $icon[$val] ?>"></i>
                                                        <?= $val ?>
                                                    </a>
                                                </li>
                                            <?php endif ?>
                                        <?php else : ?>
                                            <?php if($statususer == $auth[$val]) : ?>
                                              <?php if ($val == "Home"): ?>
                                                  <li class="active">
                                                    <a href="<?= site_url('/').$menu[$val]; ?>"><i class="<?= $icon[$val] ?>"></i>
                                                      <?= $val ?>
                                                    </a>
                                                  </li>
                                                <?php else: ?>
                                                  <li class="active">
                                                    <a href="<?= site_url('admin/').$menu[$val]; ?>"><i class="<?= $icon[$val] ?>"></i>
                                                      <?= $val ?>
                                                    </a>
                                                  </li>
                                              <?php endif; ?>
                                            <?php endif ?>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <?php if(is_array($menu[$val])) : ?>
                                            <?php
                                                $cekstat = null;
                                                foreach(array_keys($menu[$val]) as $elm => $ecw){
                                                    if ($auth[$val][$ecw] == $statususer) {
                                                        $cekstat = $statususer;
                                                    }
                                                }

                                            ?>
                                            <?php if($statususer == $cekstat) : ?>
                                            <li>
                                                <a data-toggle="tab" href="#<?= str_replace(" ","-",$val); ?>"><i class="<?= $icon[$val] ?>"></i>
                                                    <?= $val ?>
                                                </a>
                                            </li>
                                            <?php endif ?>
                                        <?php else : ?>
                                            <?php if($statususer == $auth[$val]) : ?>
                                              <?php if ($val == "Jadwal Webinar"): ?>
                                                  <li>
                                                    <a href="<?= site_url('/').$menu[$val]; ?>"><i class="<?= $icon[$val] ?>"></i>
                                                      <?= $val ?>
                                                    </a>
                                                  </li>
                                                <?php else: ?>
                                                  <li>
                                                    <a href="<?= site_url('admin/').$menu[$val]; ?>"><i class="<?= $icon[$val] ?>"></i>
                                                      <?= $val ?>
                                                    </a>
                                                  </li>
                                              <?php endif; ?>
                                            <?php endif ?>
                                    <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <?php foreach(array_keys($menu) as $key => $val) : ?>
                            <?php if($val == $menuactive) : ?>
                                    <?php if(is_array($menu[$val])) : ?>
                                        <!--  -->
                                        <div id="<?= str_replace(" ","-",$val); ?>" class="tab-pane in active notika-tab-menu-bg animated flipInX">
                                            <ul class="notika-main-menu-dropdown">
                                                <!--  -->
                                                <?php foreach(array_keys($menu[$val]) as $keyd => $vald) : ?>
                                                    <?php if($statususer == $auth[$val][$vald]) : ?>
                                                        <li><a href="<?= site_url('admin/'.$menu[$val][$vald]);?>"><?= $vald; ?></a></li>
                                                    <?php endif ?>
                                                <?php endforeach; ?>
                                                <!--  -->
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <?php if(is_array($menu[$val])) : ?>
                                        <!--  -->
                                        <div id="<?= str_replace(" ","-",$val); ?>" class="tab-pane in notika-tab-menu-bg animated flipInX">
                                            <ul class="notika-main-menu-dropdown">
                                                <?php foreach(array_keys($menu[$val]) as $keyd => $vald) : ?>
                                                    <?php if($statususer == $auth[$val][$vald]) : ?>
                                                        <li><a href="<?= site_url('admin/'.$menu[$val][$vald]);?>"><?= $vald; ?></a></li>
                                                    <?php endif ?>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
