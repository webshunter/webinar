<div class="notika-email-post-area">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="email-statis-inner notika-shadow">
                        
                        <?php
    

                            $jadwal = $this->db->query("SELECT * FROM segmen WHERE status = '1'")->row();
                            
                            echo htmlspecialchars_decode($jadwal->link_zoom);
                        
                        ?>
                   
                  </div>
              </div>
          </div>
      </div>
  </div>