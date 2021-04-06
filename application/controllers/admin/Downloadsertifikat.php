<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Downloadsertifikat extends CI_Controller {

	private $table1 = 'sertifikat';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/downloadsertifikat/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","Nama Peserta","Webinar","sertifikat"]);
        $this->Createtable->order_set('0, 3');
		$show = $this->Createtable->create();
		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/downloadsertifikat/view', $data);
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
                    "where" => [
                        ['user_id', '=', iduser()]
                    ],
                    'limit' => [
                        'start' => post('start'),
                        'end' => post('length')
                    ],
                    'search' => [
                        'value' => $this->Datatable_gugus->search(),
                        'row' => ["user_id","segmend_id","file","created_at","updated_at"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["user_id","segmend_id","file","created_at","updated_at"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"user_id", "2"=>"segmend_id", "3"=>"file", "4"=>"created_at", "5"=>"updated_at"],
                    ],
                    "custome" => [
                        "file" => [
                            "key"=>["id", "file"],
                            "content" => "<a class='btn btn-primary' href='".base_url('')."assets/gambar/sertifikat/{{file}}'>download sertifikat</a>"
                        ],
                        "user_id" => [
                            "replacerow" => [
                                "table" => "user",
                                "condition" => ["id"],
                                "value" => ["user_id"],
                                "get" => "nama"
                            ]
                        ],
                        "segmend_id" => [
                            "replacerow" => [
                                "table" => "segmen",
                                "condition" => ["id"],
                                "value" => ["segmend_id"],
                                "get" => "segmen"
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
            $this->load->view('admin/downloadsertifikat/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/downloadsertifikat/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $user_id = post("user_id");
$segmend_id = post("segmend_id");
$file = Form::getfile("file", "assets/gambar/$this->table1/");

        

        $simpan = $this->db->query("
            INSERT INTO sertifikat
            (user_id,segmend_id,file) VALUES ('$user_id','$segmend_id','$file')
        ");
    

        if($simpan){
            redirect('admin/downloadsertifikat');
        }
    }

    public function update(){
          $key = post('id'); $user_id = post("user_id");
$segmend_id = post("segmend_id");
$file = Form::getfile("file", "assets/gambar/$this->table1/", $key, $this->table1);

        $simpan = $this->db->query("
            UPDATE sertifikat SET  user_id = '$user_id', segmend_id = '$segmend_id', file = '$file' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/downloadsertifikat');
        }
    }
    
}
