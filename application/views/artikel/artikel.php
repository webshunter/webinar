<?php
$this->load->view("template/header");
$this->load->view("template/navbar");
?>


<main id="main" class="mt-5">



    <!-- ======= Services Section ======= -->
    <section class="services section-bg">
        <div class="container">

            <div class="section-title">
                <h2>Artikel</h2>
            </div>

            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <?php foreach($data as $key => $val) : ?>
                    <div class="icon-box">
                        <!-- <div class="icon"><i class="las la-basketball-ball" style="color: #ff689b;"></i></div>
                        <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                        <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p> -->
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="<?= base_url('assets/gambar/tbl_artikel/'.$val->foto) ?>" alt="" class="img-thumbnail">
                                    </div>
                                    <div class="col-8">
                                        <h5 class="card-title"><?= $val->judul; ?></h5>
                                        <p class="card-text"><?= $val->deskripsi; ?></p>
                                        <a href="<?= base_url('') ?>artikel/detail/<?= $val->slug; ?>" class="btn btn-primary">Lihat Selengkapnya</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                    <div class="row justify-content-center">
                        <?= $pagin; ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="icon-box">
                        <!-- <div class="icon"><i class="las la-book" style="color: #e9bf06;"></i></div>
                        <h4 class="title"><a href="">Dolor Sitema</a></h4>
                        <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p> -->
                        <ul class="list-group">
                          <?php if (isset($idartikel)): ?>
                              <a href="<?= site_url('artikel/'); ?>">
                                <li class="list-group-item">All</li>
                              </a>
                            <?php else: ?>
                              <a href="<?= site_url('artikel/'); ?>">
                                <li class="list-group-item active">All</li>
                              </a>
                          <?php endif; ?>
                            <?php foreach ($this->db->query("SELECT * FROM martikel")->result() as $key => $value) : ?>

                                <?php if(isset($idartikel)) : ?>
                                    <?php if ($value->id == $idartikel) : ?>
                                        <a href="<?= site_url('artikel/kategori/'.$value->id); ?>">
                                            <li class="list-group-item active"><?= $value->artikel ?></li>
                                        </a>
                                    <?php else : ?>
                                        <a href="<?= site_url('artikel/kategori/'.$value->id); ?>">
                                            <li class="list-group-item"><?= $value->artikel ?></li>
                                        </a>
                                    <?php endif; ?>
                                <?php else : ?>
                                        <a href="<?= site_url('artikel/kategori/'.$value->id); ?>">
                                            <li class="list-group-item"><?= $value->artikel ?></li>
                                        </a>
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
