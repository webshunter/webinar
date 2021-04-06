<br>
<div class="notika-email-post-area">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="email-statis-inner notika-shadow">
                    <h1 class="m-0 text-dark">Profile Anda</h1>
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

                        $id = iduser();

                        $prop = $this->db->query("SELECT * FROM user WHERE id = '$id'")->row(); ?>
                  
                        <table>
                            <tr>
                                <td>Nama Lengkap</td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td><td><?= $prop->nama; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td><td><?= $prop->email; ?></td>
                            </tr>
                            <tr>
                                <td>Instansi</td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td><td><?= $prop->instansi; ?></td>
                            </tr>
                            <tr>
                                <td>Jabatan/ Jurusan</td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td><td><?= $prop->jabatan; ?></td>
                            </tr>
                            <tr>
                                <td>No Handphone</td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td><td><?= $prop->nohp; ?></td>
                            </tr>
                        </table>
                        <br>
                        <a class="btn btn-primary" href="<?= site_url('admin/user/table_show/update/'.$id) ?>">Ubah Profile</a>
                  </div>
              </div>
          </div>
      </div>
  </div>