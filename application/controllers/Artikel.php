<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{
    public $paginbatas = 10;

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function index()
    {
        $el = $this->db->query("SELECT * FROM martikel")->row();
        $tot = $this->db->query("SELECT * FROM tbl_artikel")->num_rows();
        $data['pagin'] = $this->pagination($tot);
        $data['data'] = $this->db->query("SELECT * FROM tbl_artikel limit 0, $this->paginbatas ")->result();
        $this->load->view('artikel/artikel', $data);
    }

    public function kategori($id = '', $position = 0)
    {
        create_session('donaldart', $id);
        $data['idartikel'] = $id;
        $tot = $this->db->query("SELECT * FROM tbl_artikel WHERE artikel_id = '$id' ")->num_rows();
        $data['pagin'] = $this->pagination($tot);
        $data['data'] = $this->db->query("SELECT * FROM tbl_artikel WHERE artikel_id = '$id'  limit $position, $this->paginbatas ")->result();
        $this->load->view('artikel/artikel', $data);
    }

    public function pagination($tot)
    {
        $pepage = ceil($tot / $this->paginbatas);
        if ($pepage > 0) {
            $html = "
                <nav aria-label=\"Page navigation example\">
                    <ul class=\"pagination\">
                        <li class=\"page-item\"><a class=\"page-link\" href=\"#\">Previous</a></li>
                    ";
                    for ($i=0; $i < $pepage ; $i++) {
                        $idp = generate_session('donaldart');
                        $idpx = $i * $this->paginbatas;
                        $links = site_url('artikel/kategori/'.$idp.'/'.$idpx);
                        $c = $i + 1;
                        $html .= " <li class=\"page-item\"><a class=\"page-link\" href=\"$links\">$c</a></li>";
                    }
                    $html .= "
                        <li class=\"page-item\"><a class=\"page-link\" href=\"#\">Next</a></li>
                    </ul>
                </nav>
            ";
            return $html;
        }else{
            return "";
        }
    }

    public function detail($slug = '')
    {
        $data['data'] = $this->db->query("SELECT * FROM tbl_artikel WHERE slug = '$slug' ")->row();
        $this->load->view('artikel/detail', $data);
    }
}
