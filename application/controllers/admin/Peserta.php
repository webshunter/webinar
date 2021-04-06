<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends CI_Controller {

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
        $this->Createtable->location('admin/peserta/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","Nama Lengkap","Instansi","Jabatan / Jurusan","Email","No Handphone","Password","Daftar Pada","Update Pada", "setting"]);
        $this->Createtable->order_set('0, 9');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/peserta/view', $data);
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
                        ['status', '=', '1']
                    ],
                    'limit' => [
                        'start' => post('start'),
                        'end' => post('length')
                    ],
                    'search' => [
                        'value' => $this->Datatable_gugus->search(),
                        'row' => ["nama","instansi","jabatan","email","nohp","password","created_at","updated_at", "id"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["nama","instansi","jabatan","email","nohp","password","created_at","updated_at", "id"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"nama", "2"=>"instansi", "3"=>"jabatan", "4"=>"email", "5"=>"nohp", "6"=>"password", "7"=>"created_at", "8"=>"updated_at"],
                    ],
                    "custome" => [
                        "id" => [
                            "key" => ["id"],
                            "content" => "
                                    <div class=\"dropdown\">
                                        <button class=\"btn btn-primary dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\">Setting
                                        <span class=\"caret\"></span></button>
                                        <ul class=\"dropdown-menu\">
                                        <li><a href='".site_url('admin/peserta/sertifikat')."/{{id}}'>sertifikat</a></li>
                                        <li><a data-id='{{id}}' class=\"edit\" href=\"#\">ubah</a></li>
                                        <li><a data-id='{{id}}' class=\"delete\"  href=\"#\">hapus</a></li>
                                        </ul>
                                    </div>
                            "
                        ]
                    ]
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/peserta/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/peserta/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $nama = post("nama");
        $instansi = post("instansi");
        $jabatan = post("jabatan");
        $email = post("email");
        $nohp = post("nohp");
        $password = md5(md5(post("password")));
        $status = 1;

        $simpan = $this->db->query("
            INSERT INTO user
            (nama,instansi,jabatan,email,nohp,password, status) VALUES ('$nama','$instansi','$jabatan','$email','$nohp','$password', '$status')
        ");
    

        if($simpan){
            redirect('admin/peserta');
        }
    }

    public function update(){
          $key = post('id'); $nama = post("nama");
            $instansi = post("instansi");
            $jabatan = post("jabatan");
            $email = post("email");
            $nohp = post("nohp");
            $password = md5(md5(post("password")));

        $simpan = $this->db->query("
            UPDATE user SET  nama = '$nama', instansi = '$instansi', jabatan = '$jabatan', email = '$email', nohp = '$nohp', password = '$password' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/peserta');
        }
    }

    public function sertifikat($id)
    {
        create_session('userid', $id);
        redirect('admin/sertifikat');
    }
 
 
    public function export()
    {
        //echo 'eco';
           header('Content-Type: text/csv; charset=utf-8'); 

          header('Content-Disposition: attachment; filename=data.csv'); 
    
          $output = fopen("php://output", "w"); 
    
          fputcsv($output, array('id','nama', 'instansi', 'jabatan', 'email', 'nohp','created_at','updated_at')); 
    
          $query = "SELECT * from user WHERE status = '1' ORDER BY id DESC"; 
        
          foreach($this->db->query($query)->result() as $key => $val) 
          { 
    
                $val = (array) $val;
    
               fputcsv($output, $val); 
    
          } 
    
          fclose($output); 
    }
    
 
 
    public function csv()
    {
      header('Content-Type: text/csv; charset=utf-8'); 

      header('Content-Disposition: attachment; filename=data.csv'); 

      $output = fopen("php://output", "w"); 

      fputcsv($output, array('id','nama', 'instansi', 'jabatan', 'email', 'nohp','created_at','updated_at')); 

      $query = "SELECT * from user WHERE status = '1' ORDER BY id DESC"; 

      $result = mysqli_query($connect, $query); 
    
      foreach($this->db->query()->result() as $key => $val) 
      { 

           fputcsv($output, $val); 

      } 

      fclose($output); 
        
        
    }
 
    
}
