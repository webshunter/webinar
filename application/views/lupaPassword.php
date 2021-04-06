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
                   <?php if (!empty($_SESSION['kesalahan'])): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>kesalahan !</strong> <?= $_SESSION['kesalahan'] ?>
                </div>
            <?php endif; ?>
                    <?php

                        $ur = site_url();

                        if ($admin == "user") {
                            $ur .= "login/lupa_proses";
                        }else{
                            $ur .= "login/lupa_proses";
                        }

                    ?>
                    <form action="<?= $ur ?>" method="post"  enctype="multipart/form-data" >
                        <div class="form-group">
                            <input type="text" class="form-control" name="data" id="data" placeholder="Email atau Kata Sandi" />
                            <div class="validate"></div>
                        </div>
                        <div class="mb-3">
                            <div class="small">Apa <a href="<?=  site_url('login/kelurga'); ?>">Sudah Ingat ?</a></div>
                        </div>
                        <div class="text-center"><button class="btn-sky-blue" type="submit">Lupa Password</button></div>
                    </form>

                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->
<?php
$this->load->view("template/footer.php")
?>
