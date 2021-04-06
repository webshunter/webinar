<?php
$this->load->view("template/header");
$this->load->view("template/navbar");
?>


<main id="main" class="mt-5">



    <!-- ======= Services Section ======= -->
    <section class="services section-bg">
        <div class="container">

            <div class="section-title">
                <h2><?= $data->judul; ?></h2>

            </div>

            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="icon-box">
                        <div class="text-center mb-3">
                            <img width="100%" src="<?= base_url('assets/gambar/tbl_artikel/'.$data->foto) ?>" alt="" sizes="" srcset="" class="mx-auto">
                        </div>
                        <?= html_entity_decode($data->content) ?>
                    </div>

                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="icon-box">
                        <!-- <div class="icon"><i class="las la-book" style="color: #e9bf06;"></i></div>
                        <h4 class="title"><a href="">Dolor Sitema</a></h4>
                        <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p> -->
                        <ul class="list-group">
                            <?php foreach ($this->db->query("SELECT * FROM martikel")->result() as $key => $value) : ?>
                                
                                <?php if(generate_session('donaldart') != "") : ?>
                                    <?php if ($value->id == generate_session('donaldart')) : ?>
                                        <a href="<?= site_url('artikel/kategori/'.$value->id); ?>">
                                            <li class="list-group-item active"><?= $value->artikel ?></li>
                                        </a>
                                    <?php else : ?>
                                        <a href="<?= site_url('artikel/kategori/'.$value->id); ?>">
                                            <li class="list-group-item"><?= $value->artikel ?></li>
                                        </a>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <?php if ($key == 0) : ?>
                                        <a href="<?= site_url('artikel/kategori/'.$value->id); ?>">
                                            <li class="list-group-item active"><?= $value->artikel ?></li>
                                        </a>
                                    <?php else : ?>
                                        <a href="<?= site_url('artikel/kategori/'.$value->id); ?>">
                                            <li class="list-group-item"><?= $value->artikel ?></li>
                                        </a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>


            </div>

        </div>
    </section><!-- End Services Section -->


</main><!-- End #main -->
<?php
$this->load->view("template/footer.php")
?>