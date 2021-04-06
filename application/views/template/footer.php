<!-- <section><a href="https://mobirise.site/f"></a>

</section> -->


<?php
    if($_SERVER['REQUEST_URI'] == '/'){
?>
<section class="mx-auto mt-5 mb-3">
    <div class="container ">
        <div class="row ">
            <div class="col-4">
            <h3><?= cek(Perusahaans::get(), 'nama'); ?></h3>
            <h4>Alamat</h4>
            <p><?= cek(Perusahaans::get(), 'alamat'); ?></p>
            </div>
            <div class="col-4">
                <h4>Kontak</h4>
                <p>Telepon: <?= cek(Perusahaans::get(), 'tlpn'); ?></p>
                <p>WA: <?= cek(Perusahaans::get(), 'hp'); ?></p>
                <p>Email: <?= cek(Perusahaans::get(), 'email'); ?></p>
            </div>
            <div class="col-4">
                <h4>Sosial Media</h4>
                <p><a href="https://www.facebook.com/sinarmed.jaya?_rdc=2&_rdr" target="_blank" rel="noopener noreferrer">Facebook</a></p>
                <p><a href="https://www.instagram.com/pt_sinarmedjaya/" target="_blank" rel="noopener noreferrer">Instagram</a></p>
                <p><a href="https://www.youtube.com/channel/UCwlvBU1w44b3CbZ2nk4gRsg" target="_blank" rel="noopener noreferrer">Youtube</a></p>
            </div>
        </div>
    </div>
</section>
<?php
    }else{
?>
<section class="mx-auto mt-5 mb-3" style="opacity: 0.7; background-color: rgb(251, 38, 38); color: white;">
    <div class="container " style="padding: 35px 0;">
        <div class="row ">
            <div class="col-4">
            <h3><?= cek(Perusahaans::get(), 'nama'); ?></h3>
            <h4>Alamat</h4>
            <p><?= cek(Perusahaans::get(), 'alamat'); ?></p>
            </div>
            <div class="col-4">
                <h4>Kontak</h4>
                <p>Telepon: <?= cek(Perusahaans::get(), 'tlpn'); ?></p>
                <p>WA: <?= cek(Perusahaans::get(), 'hp'); ?></p>
                <p>Email: <?= cek(Perusahaans::get(), 'email'); ?></p>
            </div>
            <div class="col-4">
                <h4>Sosial Media</h4>
                <p><a href="https://www.facebook.com/sinarmed.jaya?_rdc=2&_rdr" target="_blank" rel="noopener noreferrer">Facebook</a></p>
                <p><a href="https://www.instagram.com/pt_sinarmedjaya/" target="_blank" rel="noopener noreferrer">Instagram</a></p>
                <p><a href="https://www.youtube.com/channel/UCwlvBU1w44b3CbZ2nk4gRsg" target="_blank" rel="noopener noreferrer">Youtube</a></p>
            </div>
        </div>
    </div>
</section>
<?php
    }
?>

<script src="<?= base_url('assets/front/') ?>web/assets/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/front/') ?>popper/popper.min.js"></script>
<script src="<?= base_url('assets/front/') ?>tether/tether.min.js"></script>
<script src="<?= base_url('assets/front/') ?>bootstrap/js/bootstrap.min.js"></script>
<script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5"></script>
<script src="https://apis.google.com/js/plusone.js"></script>
<script src="<?= base_url('assets/front/') ?>facebook-plugin/facebook-script.js"></script>
<script src="<?= base_url('assets/front/') ?>smoothscroll/smooth-scroll.js"></script>
<script src="<?= base_url('assets/front/') ?>dropdown/js/nav-dropdown.js"></script>
<script src="<?= base_url('assets/front/') ?>dropdown/js/navbar-dropdown.js"></script>
<script src="<?= base_url('assets/front/') ?>touchswipe/jquery.touch-swipe.min.js"></script>
<script src="<?= base_url('assets/front/') ?>parallax/jarallax.min.js"></script>
<script src="<?= base_url('assets/front/') ?>countdown/jquery.countdown.min.js"></script>
<script src="<?= base_url('assets/front/') ?>theme/js/script.js"></script>
<script src="<?= base_url('assets/front/') ?>formoid/formoid.min.js"></script>


</body>

</html>