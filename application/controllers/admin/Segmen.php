<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Segmen extends CI_Controller {

	private $table1 = 'segmen';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/segmen/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","Webinar","Jadwal","status", "Link Zoom","Daftar Pada","Update Pada", "action"]);
        $this->Createtable->order_set('0, 6');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/segmen/view', $data);
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
                        'row' => ["segmen","jadwal","status","link_zoom","created_at","updated_at"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["segmen","jadwal","status","link_zoom","created_at","updated_at"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"segmen", "2"=>"jadwal", "3"=>"status", "4"=>"created_at", "5"=>"updated_at"],
                    ],
                    "custome" => [
                        "status" => [
                            "replacerow" => [
                                "table" => "status",
                                "condition" => ["id"],
                                "value" => ["status"],
                                "get" => "status"
                            ]
                        ]
                    ]
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/segmen/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/segmen/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $segmen = post("segmen");
        $jadwal = Form::getfile("jadwal", "assets/gambar/$this->table1/");
        $status = post("status");
        $link = post("link_zoom");
        

        $simpan = $this->db->query("
            INSERT INTO segmen
            (segmen,jadwal,status, link_zoom) VALUES ('$segmen','$jadwal','$status', \"$link\")
        ");
    

        if($simpan){
            redirect('admin/segmen');
        }
    }

    public function update(){
          $key = post('id'); $segmen = post("segmen");
$jadwal = Form::getfile("jadwal", "assets/gambar/$this->table1/", $key, $this->table1);
$status = post("status");
$link = post("link_zoom");

        $simpan = $this->db->query("
            UPDATE segmen SET  segmen = '$segmen', jadwal = '$jadwal', status = '$status', link_zoom = \"$link\" WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/segmen');
        }
    }
    
}
