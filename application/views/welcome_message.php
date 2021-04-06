<?php $this->load->view('template/header'); ?>



<section class="header9 cid-stFrjeqny2 mbr-fullscreen mbr-parallax-background" id="header9-1">

	<div class="container">
		<div class="row justify-content-center align-items-center">
			<div class="col-12 col-md-6 image-wrapper">
			<?php if($this->db->query("SELECT * FROM segmen WHERE status = '1'")->num_rows() > 0) : ?>
				<img src="<?= base_url('assets/gambar/segmen/').$this->db->query("SELECT * FROM segmen WHERE status = '1'")->row()->jadwal; ?>" alt="Sinarmed Group">
			<?php endif ?>
			</div>
			<div class="col-12 col-md">
				<div class="text-wrapper">
					<h1 class="mbr-section-title mbr-fonts-style mb-3 display-2"><strong>WEBINAR</strong><br>INSTALASI GAS DAN VAKUM MEDIS</h1>
					<p class="mbr-text mbr-fonts-style display-7">Implementasi Prosedur Sistem Suplai Gas dan Penanganan Gas Medis dengan Aman di Era COVID-19</p>
					<div class="mbr-section-btn mt-3"><a class="btn btn-primary display-4" href="<?= site_url("login/pendaftaran") ?>">Daftar Sekarang</a>
						<a class="btn btn-primary-outline display-4" href="<?= site_url("login/") ?>">Login</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="content1 cid-stFLRBe0BS" id="content1-6">

	<div class="container">
		<div class="row justify-content-center">
			<div class="title col-md-12 col-lg-10">
				<h3 class="mbr-section-title mbr-fonts-style align-center mb-4 display-2">
					<strong>Webinar Instalasi Gas dan Vakum Medis</strong>
				</h3>
				<h4 class="mbr-section-subtitle align-center mbr-fonts-style mb-4 display-7">Di era Covid 19 ini, Permintaan gas dan vakum medis terus meningkat seiring dengan jumlah pasien positif covid yang naik. Sehingga pasien covid 19 harus mendapatkan perawatan yang ekstra. Semua kalangan harus mengetahui akan pentingnya penggunaan dan penanganan sistem gas medis pada fasilitas kesehatan dan di Rumah.</h4>

			</div>
		</div>
	</div>
</section>

<section class="countdown1 cid-stFKSVJcui" id="countdown1-5">


	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<h3 class="mbr-section-title mb-5 align-center mbr-fonts-style display-2">
					<strong>Segera Dilaksanakan</strong>
				</h3>
				<h4 class="mbr-section-subtitle mb-5 align-center mbr-fonts-style display-7">
					Webinar Instalasi Gas dan Vakum Medis akan segera dilaksanakan pada :</h4>
				<div class="countdown-cont align-center mb-5">
					<div class="daysCountdown col-xs-3 col-sm-3 col-md-3" title="Days"></div>
					<div class="hoursCountdown col-xs-3 col-sm-3 col-md-3" title="Hours"></div>
					<div class="minutesCountdown col-xs-3 col-sm-3 col-md-3" title="Minutes"></div>
					<div class="secondsCountdown col-xs-3 col-sm-3 col-md-3" title="Seconds"></div>
					<div class="countdown" data-due-date="2021/04/27"></div>
				</div>
				<p class="mbr-text mb-5 align-center mbr-fonts-style display-7">
					27 April 2021<br>Pukul 14.00 - 17.00 WIB</p>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 mx-auto mbr-form" data-form-type="formoid">
				<form action="" method="POST" class="mbr-form form-with-styler" data-form-title="Form Name"><input type="hidden" name="email" data-form-email="true" value="vqYx+VV45keDonpUMczmkL5bJDkMidKhy/EVUKM7XNC3G9rm5n4kzCS/DFjqxNw9TBtjT7BZwtRmnDzl3FS8bv5m4XatFS8DkbcnG6ZDT3ShReSjNPJrzJhISWyId24u">
					<div class="">
						<div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Terima Kasih telah berlangganan Email kami. Nantikan info-info menarik dari kami.</div>
						<div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">Oops...! some problem!</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</section>

<section class="content3 cid-stFMiYW22X" id="content3-7">

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12 col-lg-10">
				<hr class="line">
				<p class="mbr-text align-center mbr-fonts-style my-4 display-5">Segera daftarkan diri anda dan dapatkan E-Sertifikat dan Banyak Ilmu. So, Let's Go!!</p>
				<hr class="line">
			</div>
		</div>
	</div>
</section>

<section class="info3 cid-stFMUaKwOj mbr-parallax-background" id="info3-8">



	<div class="mbr-overlay" style="opacity: 0.7; background-color: rgb(251, 38, 38);">
	</div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="card col-12 col-lg-10">
				<div class="card-wrapper">
					<div class="card-box align-center">
						<h4 class="card-title mbr-fonts-style align-center mb-4 display-1">
							<strong>Download E-Sertifikat</strong>
						</h4>
						<p class="mbr-text mbr-fonts-style mb-4 display-7">
							Setelah mengikuti webinar, anda dapat mendownload E-Sertifikat anda melalui tombol di bawah ini</p>
						<div class="mbr-section-btn mt-3"><a class="btn btn-white display-4" href="<?= site_url("login") ?>">Download</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php $this->load->view('template/footer'); ?>