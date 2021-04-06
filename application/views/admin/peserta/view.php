<br>
<div class="notika-email-post-area">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="email-statis-inner notika-shadow">
                    <h1 class="m-0 text-dark">Data User</h1>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <br>
<div class="notika-email-post-area">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="email-statis-inner notika-shadow">
                  <?php
                    link_button([
                      "link" => "admin/peserta/tambah_data",
                      "class" => "btn btn-success",
                      "text" => "Tambah Data",
                    ]);
                  ?>
                  <a class='btn btn-primary' href='<?= site_url('admin/peserta/export') ?>'>Export CSV</a>
                  <hr>
                      <?= $datatable ?>
                  </div>
              </div>
          </div>
      </div>
  </div>