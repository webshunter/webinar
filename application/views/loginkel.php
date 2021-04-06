<?php
$this->load->view("template/header");
$this->load->view("template/navbar");


?>

<main id="main" class="mt-5">

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact ">
        <div class="container">

            <div class="section-title">
                <h2><?= $title ?></h2>
            </div>
            <div class="row mt-5 justify-content-md-center ">
                <div class="col-lg-5 mt-5 mt-lg-0 ">
                    <?php

                            $ur = site_url("login/prosseskel");

                    ?>
                    <form action="<?= $ur ?>" method="post"  enctype="multipart/form-data" >
                        <div class="form-group">
                            <input type="username" class="form-control" name="username" id="username" placeholder="Username" />
                            <div class="validate"></div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
                            <div class="validate"></div>
                        </div>
                        <div class="mb-3">
                            <div class="small">Login <a href="<?=  site_url('login'); ?>">Sebagai Client</a></div>
                        </div>
                        <div class="text-center"><button class="btn-sky-blue" type="submit">Login</button></div>
                    </form>

                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->
<?php
$this->load->view("template/footer.php")
?>
