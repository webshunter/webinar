<br>
<div class="form-element-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-element-list">
          <h1 class="m-0 text-dark">Tambahkan Sertifikat</h1>
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
          
          <form action="<?= site_url('admin/sertifikat/simpan') ?>" method="post" enctype="multipart/form-data">
              
             
            
                <?=
                    form::select_db([
                        "title" => "Webinar",
                        "type" => "text",
                        "fc" => "segmend_id",
                        "db" => "segmen",
                        "data" => "id",
                        "name" => "segmen",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "sertifikat",
                        "type" => "file",
                        "fc" => "file",
                        "placeholder" => "tambahkan file",
                    ])
                ?>
            
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-default" href="<?= site_url('admin/sertifikat'); ?>">Back</a>
              </div>
          </form>

				</div>
			</div>
		</div>
	</div>
</div>
</section>