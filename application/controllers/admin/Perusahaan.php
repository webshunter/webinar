<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan extends CI_Controller {

	private $table1 = 'perusahaan';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/perusahaan/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","nama","alamat","email","telephone","handphone","instagram","facebook","twitter", "action"]);
        $this->Createtable->order_set('0, 9');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/perusahaan/view', $data);
        $this->load->view('templateadmin/footer');
	}

	public function table_show($action = 'show', $keyword = '')
	{
		if ($action == "show") {
        
            if (isset($_POST['order'])): $setorder = $_POST['order']; else: $setorder = ''; endif;

            $this->Datatable_gugus->datatable(
                [
                    "table" => $this->table1,
                    "select" => [
						"*"
					],
                    'limit' => [
                        'start' => post('start'),
                        'end' => post('length')
                    ],
                    'search' => [
                        'value' => $this->Datatable_gugus->search(),
                        'row' => ["nama","alamat","email","tlpn","hp","ig","fb","tw"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["nama","alamat","email","tlpn","hp","ig","fb","tw"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"nama", "2"=>"alamat", "3"=>"email", "4"=>"tlpn", "5"=>"hp", "6"=>"ig", "7"=>"fb", "8"=>"tw"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/perusahaan/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/perusahaan/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $nama = post("nama");
$alamat = post("alamat");
$email = post("email");
$tlpn = post("tlpn");
$hp = post("hp");
$ig = post("ig");
$fb = post("fb");
$tw = post("tw");

        

        $simpan = $this->db->query("
            INSERT INTO perusahaan
            (nama,alamat,email,tlpn,hp,ig,fb,tw) VALUES ('$nama','$alamat','$email','$tlpn','$hp','$ig','$fb','$tw')
        ");
    

        if($simpan){
            redirect('admin/perusahaan');
        }
    }

    public function update(){
          $key = post('id'); $nama = post("nama");
$alamat = post("alamat");
$email = post("email");
$tlpn = post("tlpn");
$hp = post("hp");
$ig = post("ig");
$fb = post("fb");
$tw = post("tw");

        $simpan = $this->db->query("
            UPDATE perusahaan SET  nama = '$nama', alamat = '$alamat', email = '$email', tlpn = '$tlpn', hp = '$hp', ig = '$ig', fb = '$fb', tw = '$tw' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/perusahaan');
        }
    }
    
}
