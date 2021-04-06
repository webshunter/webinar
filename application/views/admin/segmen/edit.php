<br>
<div class="form-element-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-element-list">
          <h1 class="m-0 text-dark">Ubah Segmen</h1>
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

          <form action="<?= site_url('admin/segmen/update') ?>" method="post" enctype="multipart/form-data">
              
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id",
                "value" => $form_data->id,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "Webinar",
                        "type" => "text",
                        "fc" => "segmen",
                        "placeholder" => "tambahkan segmen",
                        "value" => $form_data->segmen,
                    ])
                ?>
                
                <?=
                    form::editor([
                        "title" => "Link Zoom",
                        "type" => "text",
                        "fc" => "link_zoom",
                        "placeholder" => "tambahkan link zoom",
                        "value" => $form_data->link_zoom,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "Jadwal",
                        "type" => "file",
                        "fc" => "jadwal",
                        "placeholder" => "tambahkan jadwal",
                        "value" => $form_data->jadwal,
                    ])
                ?>
            
                <?=
                    form::select_db([
                        "title" => "status",
                        "type" => "password",
                        "fc" => "status",
                        "placeholder" => "tambahkan status",
                        "db" => "status",
                        "data" => "id",
                        "name" => "status",
                        "selected" => $form_data->status,
                    ])
                ?>
            
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-default" href="<?= site_url('admin/segmen'); ?>">Back</a>
              </div>
          </form>

				</div>
			</div>
		</div>
	</div>
</div>
</section>