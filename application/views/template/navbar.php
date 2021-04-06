<style>

.btn-sky-blue:hover{
  background-color: #49a4d6;
}

.btn-sky-blue{
  background-color: #49b5e7;
  padding: 10px 24px;
  border: none;
  outline: none;
  border-radius: 10px;
  transition: 0.4s;
  color: #fff;
}

.sky-blue{
  background: #1da2e0 !important;
}

.sky-blue .logo a{
  color: white !important;
}

.sky-blue .nav-menu a{
  color: white;
}

#hero{
  background-image: url('assets/bg.png');
}

#hero h1, #hero h2 ,#hero h3{
  color: white !important;
}

</style>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top sky-blue">
    <div class="container d-flex align-items-center">

        <!-- <a href="index.html" class="logo mr-auto"><img src="<?= base_url('assets/front/') ?>assets/img/logo.png" alt="" class="img-fluid"></a> -->
        <!-- Uncomment below if you prefer to use text as a logo -->
        <h1 class="logo mr-auto"><a href="<?= base_url('') ?>"><img src="<?= base_url('assets/logo.png');  ?>" style="height: 80px; width: auto;">&nbsp;&nbsp;&nbsp;<?= Perusahaans::get()->nama; ?></a></h1>

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li><a href="<?= base_url('') ?>">Home</a></li>
                <li><a href="<?= base_url('artikel') ?>">Artikel</a></li>
                <li><a href="<?= base_url('login') ?>">Login</a></li>
                <!--<li><a href="#portfolio">Portfolio</a></li>
                <li><a href="#team">Team</a></li>
                <li class="drop-down"><a href="">Drop Down</a>
                    <ul>
                        <li><a href="#">Drop Down 1</a></li>
                        <li class="drop-down"><a href="#">Deep Drop Down</a>
                            <ul>
                                <li><a href="#">Deep Drop Down 1</a></li>
                                <li><a href="#">Deep Drop Down 2</a></li>
                                <li><a href="#">Deep Drop Down 3</a></li>
                                <li><a href="#">Deep Drop Down 4</a></li>
                                <li><a href="#">Deep Drop Down 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Drop Down 2</a></li>
                        <li><a href="#">Drop Down 3</a></li>
                        <li><a href="#">Drop Down 4</a></li>
                    </ul>
                </li>
                <li><a href="#contact">Contact</a></li> -->

            </ul>
        </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->
