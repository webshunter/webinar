<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Controller {

	private $table1 = 'status';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/status/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","Status","Daftar Pada","Update Pada"]);
        $this->Createtable->order_set('0,3');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/status/view', $data);
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
                        'row' => ["status","created_at","updated_at"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["status","created_at","updated_at"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"status", "2"=>"created_at", "3"=>"updated_at"],
                    ],
                   
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/status/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/status/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $status = post("status");

        

        $simpan = $this->db->query("
            INSERT INTO status
            (status) VALUES ('$status')
        ");
    

        if($simpan){
            redirect('admin/status');
        }
    }

    public function update(){
          $key = post('id'); $status = post("status");

        $simpan = $this->db->query("
            UPDATE status SET  status = '$status' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/status');
        }
    }
    
}
