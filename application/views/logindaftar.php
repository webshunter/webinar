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
                    <form action="<?= site_url('login/prosessdaftar') ?>" method="post"  enctype="multipart/form-data" >
                    <?=
                        form::input([
                                "title" => "Nama Lengkap",
                                "type" => "text",
                                "fc" => "nama",
                                "required" => true
                            ])
                        ?>
                        <p>Pilih Instansi :</p>
                        <?php 
                            foreach($this->db->query("SELECT * FROM instansi")->result() as $kk => $val){
                        ?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" onclick="calalal(this.value)" name="instansiel" id="instansi<?= $kk ?>" value="<?= $val->instansi; ?>">
                            <label class="form-check-label" for="instansi<?= $kk ?>">
                                <?= $val->instansi; ?>
                            </label>
                        </div>
                        <?php 
                            }
                        ?>
                        <br>
                        <p style="margin:0;padding:0;">atau tulis instansi jika tidak ada pada pilihan</p>
                        <?=
                            form::input([
                                "type" => "text",
                                "fc" => "instansi",
                                "required" => true,
                                "attr" => "ondblclick=\"myFunction(this)\"",
                            ])
                        ?>
                        <p id='editable'  style="margin-top: -8px; color: lightblue;"><i></i></p>

                                <script>
                                
                                    function calalal(val){
                                        document.getElementById('instansi').value = val;
                                        document.getElementById('instansi').setAttribute('readonly', 'true');
                                        document.getElementById('editable').innerText = 'double click to edit';
                                    }

                                    function myFunction(el){
                                        el.removeAttribute('readonly');
                                    }

                                
                                </script>

                        <?=
                            form::input([
                                "title" => "Jabatan/ Jurusan",
                                "type" => "text",
                                "fc" => "jabatan",
                                "required" => true
                            ])
                        ?>

                        <?=
                            form::input([
                                "title" => "Email",
                                "type" => "email",
                                "fc" => "email",
                                "required" => true
                            ])
                        ?>
                        <?=
                            form::input([
                                "title" => "No Handphone",
                                "type" => "text",
                                "fc" => "nohp",
                                "required" => true
                            ])
                        ?>
                        <?=
                            form::input([
                                "title" => "Password",
                                "type" => "password",
                                "fc" => "password",
                                "required" => true
                            ])
                        ?>
                        <div class="mb-3">
                        </div>
                        <div class="text-center">
                            <center>
                                <button class="btn btn-primary display-4" type="submit">Daftar</button>
                            </center>
                        </div>
                        <br>
                        <center>
                            <p>jika sudah punya akun silakan klik <a href="<?= base_url('login') ?>">login</a></p>
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
