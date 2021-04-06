<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	private $table1 = 'user';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/user/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","Nama Lengkap","Instansi","Email","No Handphone","Password","Daftar Pada","Update Pada", "action"]);
        $this->Createtable->order_set('0, 8');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/user/view', $data);
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
                    'where' => [
                        ['status', '=', '1']
                    ],
                    'limit' => [
                        'start' => post('start'),
                        'end' => post('length')
                    ],
                    'search' => [
                        'value' => $this->Datatable_gugus->search(),
                        'row' => ["nama","instansi","email","nohp","password","created_at","updated_at"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["nama","instansi","email","nohp","password","created_at","updated_at"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"nama", "2"=>"instansi", "3"=>"email", "4"=>"nohp", "5"=>"password", "6"=>"created_at", "7"=>"updated_at"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/user/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/user/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $nama = post("nama");
        $instansi = post("instansi");
        $email = post("email");
        $nohp = post("nohp");
        $password = md5(md5(post("password")));
        $simpan = $this->db->query("
            INSERT INTO user
            (nama,instansi,email,nohp,password) VALUES ('$nama','$instansi','$email','$nohp','$password')
        ");
        if($simpan){
            redirect('admin/user');
        }
    }
    public function update(){
          $key = post('id'); $nama = post("nama");
            $instansi = post("instansi");
            $email = post("email");
            $nohp = post("nohp");
            $password = md5(md5(post("password")));

        $simpan = $this->db->query("
            UPDATE user SET  nama = '$nama', instansi = '$instansi', email = '$email', nohp = '$nohp', password = '$password' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/user');
        }
    }
    
}
