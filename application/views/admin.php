<div class="container">

    <?php
    

        $jadwal = $this->db->query("SELECT * FROM segmen WHERE status = '1'")->row();
    
    ?>

    <img src="<?= base_url('assets/gambar/segmen/'.$jadwal->jadwal); ?>" width="100%" alt="">

</div>