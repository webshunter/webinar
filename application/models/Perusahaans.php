<?php


class Perusahaans extends CI_Model
{
    public function mydbr($a){
        return $this->db->query($a)->result();
    }

    public static function get()
    {
        return (new self)->mydbr("select * from perusahaan where id = '1' ")[0];
    }

}
