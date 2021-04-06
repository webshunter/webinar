<br>
<div class="form-element-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-element-list">
          <h1 class="m-0 text-dark">Tambahkan Segmen</h1>
        </div><!-- /.col -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<br>

<div class="form-element-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-element-list">
          
          <form action="<?= site_url('admin/segmen/simpan') ?>" method="post" enctype="multipart/form-data">
              
                <?=
                    form::input([
                        "title" => "Webinar",
                        "type" => "text",
                        "fc" => "segmen",
                        "placeholder" => "tambahkan segmen",
                    ])
                ?>
            
            
                <?=
                    form::editor([
                        "title" => "Link Zoom",
                        "type" => "text",
                        "fc" => "link_zoom",
                        "placeholder" => "tambahkan link zoom",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "Jadwal",
                        "type" => "file",
                        "fc" => "jadwal",
                        "placeholder" => "tambahkan jadwal",
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