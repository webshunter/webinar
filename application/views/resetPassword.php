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
                   <?php if (empty($_SESSION['info'])):
                        redirect('login/lupa_password');
                    endif; 
                   ?>
                    <?php

                        $ur = site_url();

                        if ($admin == "user") {
                            $ur .= "login/resetPassword";
                        }else{
                            $ur .= "login/resetPassword";
                        }
                    ?>
                    <form action="<?= $ur ?>" method="post"  enctype="multipart/form-data" >
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <input type="password" class="form-control" name="pass" id="pass" placeholder="Password Baru" />
                            <div class="validate"></div>
                        </div>
                        <div class="mb-3">
                            <div class="small">Apa <a href="<?=  site_url('login/kelurga'); ?>">Sudah Ingat ?</a></div>
                        </div>
                        <div class="text-center"><button class="btn-sky-blue" type="submit">Reset Password</button></div>
                    </form>

                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->
<?php
$this->load->view("template/footer.php")
?>
