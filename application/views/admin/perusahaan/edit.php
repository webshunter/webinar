<br>
<div class="form-element-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-element-list">
          <h1 class="m-0 text-dark">Ubah Perusahaan</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<br>

<div class="form-element-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-element-list">

          <form action="<?= site_url('admin/perusahaan/update') ?>" method="post" enctype="multipart/form-data">
              
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id",
                "value" => $form_data->id,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "nama",
                        "type" => "text",
                        "fc" => "nama",
                        "placeholder" => "tambahkan nama",
                        "value" => $form_data->nama,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "alamat",
                        "type" => "text",
                        "fc" => "alamat",
                        "placeholder" => "tambahkan alamat",
                        "value" => $form_data->alamat,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "email",
                        "type" => "email",
                        "fc" => "email",
                        "placeholder" => "tambahkan email",
                        "value" => $form_data->email,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "telephone",
                        "type" => "text",
                        "fc" => "tlpn",
                        "placeholder" => "tambahkan tlpn",
                        "value" => $form_data->tlpn,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "handphone",
                        "type" => "text",
                        "fc" => "hp",
                        "placeholder" => "tambahkan hp",
                        "value" => $form_data->hp,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "instagram",
                        "type" => "text",
                        "fc" => "ig",
                        "placeholder" => "tambahkan ig",
                        "value" => $form_data->ig,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "facebook",
                        "type" => "text",
                        "fc" => "fb",
                        "placeholder" => "tambahkan fb",
                        "value" => $form_data->fb,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "twitter",
                        "type" => "text",
                        "fc" => "tw",
                        "placeholder" => "tambahkan tw",
                        "value" => $form_data->tw,
                    ])
                ?>
            
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-default" href="<?= site_url('admin/perusahaan'); ?>">Back</a>
              </div>
          </form>

				</div>
			</div>
		</div>
	</div>
</div>
</section>