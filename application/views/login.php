<?php
$this->load->view("template/header");


?>

<main id="main" class="mt-5">

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact ">
        <div class="container" style="margin-top: 120px;margin-bottom: 120px;">

            <div class="section-title">
               <center>
               <h2><?= $title ?></h2>
               </center> 
            </div>
            <div class="row mt-5 justify-content-md-center ">
                <div class="col-lg-5 mt-5 mt-lg-0 ">
                    <?php

                        $ur = site_url();

                        if ($admin == "user") {
                            $ur .= "login/prosses";
                        }else{
                            $ur .= "login/adminprosses";
                        }

                    ?>
                    <form action="<?= $ur ?>" method="post"  enctype="multipart/form-data" >
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="email" />
                            <div class="validate"></div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
                            <div class="validate"></div>
                        </div>
                        <div class="mb-3">
                        </div>
                        <div class="text-center">
                            <center>
                                <button class="btn btn-primary display-4" type="submit">Login</button>
                            </center>
                        </div>
                        <br>
                        <center>
                            <p>jika anda belum punya akun silakan klik <a href="<?= base_url('login/pendaftaran') ?>">daftar</a></p>
                        </center>
                    </form>

                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->
<?php
$this->load->view("template/footer.php")
?>
