<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

//Load Composer's autoloader
require 'vendor/autoload.php';

class Login extends CI_Controller
{

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
		$data['title'] = "Login";
		$data['admin'] = "user";
		$this->load->view('login', $data);
	}


	public function kelurga()
	{
		$data['title'] = "Login Keluarga";
		$data['admin'] = "user";
		$this->load->view('loginkel', $data);
	}


	public function lupa_password()
	{
		$data['title'] = "Lupa Password";
		$data['admin'] = "user";
		$this->load->view('lupaPassword', $data);
	}

	public function lupa_proses()
	{
		$value = post('data');
		$this->session->set_flashdata('info', "kosong");
		$cek = $this->db->query("SELECT * FROM user WHERE username <> '' and email = '$value' or username <> '' and hp = '$value' ")->num_rows();
		if ($cek > 0) {
			$data['title'] = "Reset Password";
			$data['admin'] = "user";
			$this->session->set_flashdata('info', "Ada");
			$data['id'] = $this->db->query("SELECT * FROM user WHERE email = '$value' or hp = '$value'")->row()->id;
			return $this->load->view('resetPassword', $data);
		}else{
			$this->session->set_flashdata('kesalahan', "$value Tidak Ditemukan");
			return redirect('login/lupa_password',$data);
		}
	}
	public function resetPassword()
	{
		$id = post('id');
		$passBaru = md5(md5(post('pass')));
		$email = $this->db->query("SELECT * FROM user WHERE id = '$id' ")->row()->email;
		$mailer = new PHPMailer(true);
		try {
			$mailer->SMTPDebug = SMTP::DEBUG_SERVER;
            $mailer->isSMTP();
            $mailer->Host       = 'kediamanku.com';
            $mailer->SMTPAuth   = true;
            $mailer->Username   = 'no_reply@kediamanku.com'; // silahkan ganti dengan alamat email Anda
            $mailer->Password   = 'silsilahkeluarga'; // silahkan ganti dengan password email Anda
            $mailer->SMTPSecure = 'ssl';
            $mailer->Port       = 465;

			$mailer->setFrom('no_reply@kediamanku.com', 'Admin Silsilah'); // silahkan ganti dengan alamat email Anda
            $mailer->addAddress($email);
            $mailer->addReplyTo('no_reply@kediamanku.com', 'Admin Silsilah'); // silahkan ganti dengan alamat email Anda
            // Content
            $mailer->isHTML(false);
            $mailer->Subject = "Info Pendaftaran";
            $mailer->Body    = "Selamat Password Telah diperbarui silahkan login kembali";

            $mailer->send();
			$exec = $this->db->query("UPDATE user SET password = '$passBaru' where id = '$id' ");

						if($exec){
							create_session('pesan', 'silahkan cek email');
							return redirect('/');
						}

		} catch (Exception $e) {
			echo $mailer->ErrorInfo;
		}
	}

	public function prosses()
	{
		// default password admin
		$username = $_POST['email'];
		$password = md5(md5($_POST['password']));
		$cek = $this->db->query("SELECT * FROM user WHERE email = '$username' AND password = '$password'  AND status = '1'")->num_rows();
		$cek2 = $this->db->query("SELECT * FROM user WHERE email = '$username' AND password = '$password'  AND status = '1' ")->row();
		if ($cek > 0) {
			create_session('loginid', $cek2->id);
			create_session('login', 'user');
			return redirect('home');
		}else{
			return redirect('login');
		}
	}

	public function adminprosses()
	{
		// default password admin
		$username = $_POST['email'];
		$password = md5(md5($_POST['password']));
		$cek = $this->db->query("SELECT * FROM user WHERE email = '$username' AND password = '$password' AND status = '0' ")->num_rows();
		$cek2 = $this->db->query("SELECT * FROM user WHERE email = '$username' AND password = '$password' AND status = '0' ")->row();
		if ($cek > 0) {
			create_session('loginid', $cek2->id);
			create_session('login', 'admin');
			return redirect('home');
		}else{
			return redirect('login');
		}
	}


	public function prosseskel()
	{
		// default password admin
		$username = $_POST['username'];
		$password = md5(md5($_POST['password']));
		$cek = $this->db->query("SELECT * FROM user_kel WHERE username = '$username' AND password = '$password' ")->num_rows();
		$cek2 = $this->db->query("SELECT * FROM user_kel WHERE username = '$username' AND password = '$password' ")->row();
		if ($cek > 0) {
			create_session('loginid', $cek2->user_id);
			create_session('loginkelid', $cek2->id);
			create_session('login', 'user');
			return redirect('home');
		}else{
			return redirect('login/kelurga');
		}
	}

	public function admin()
	{
		$data['title'] = "Login Admin";
		$data['admin'] = "admin";
		$this->load->view('login', $data);
	}

	public function pendaftaran()
	{
		$data['title'] = "Pendaftaran";
		$data['admin'] = "user";
		$this->load->view('logindaftar', $data);
	}



	public function prosessdaftar(Type $var = null)
	{
		$nama = post("nama");
        $instansi = post("instansi");
        $email = post("email");
        $nohp = post("nohp");
        $jabatan = post("jabatan");
        $password = md5(md5(post("password")));
        $simpan = $this->db->query("
            INSERT INTO user
            (nama,instansi,email,nohp,password, jabatan) VALUES ('$nama','$instansi','$email','$nohp','$password', '$jabatan')
        ");
        if($simpan){
			$id = $this->db->query("SELECT * FROM user ORDER BY id DESC")->row()->id;
			create_session('loginid', $id);
			create_session('login', 'user');
            redirect('home');
        }
	}

	public function daftar()
	{
		$username = post("username");
		$password = md5(md5(post("password")));
		$nama = post("nama");
		$hp = post("hp");
		$namaayah = post("namaayah");
		$namaibu = post("namaibu");
		$email = post("email");
		$status_id = post("status_id");

		$mailer = new PHPMailer(true);
		try {
			$mailer->SMTPDebug = SMTP::DEBUG_SERVER;
            $mailer->isSMTP();
            $mailer->Host       = 'kediamanku.com';
            $mailer->SMTPAuth   = true;
            $mailer->Username   = 'no_reply@kediamanku.com'; // silahkan ganti dengan alamat email Anda
            $mailer->Password   = 'silsilahkeluarga'; // silahkan ganti dengan password email Anda
            $mailer->SMTPSecure = 'ssl';
            $mailer->Port       = 465;

			$mailer->setFrom('no_reply@kediamanku.com', 'Admin Silsilah'); // silahkan ganti dengan alamat email Anda
            $mailer->addAddress($email);
            $mailer->addReplyTo('no_reply@kediamanku.com', 'Admin Silsilah'); // silahkan ganti dengan alamat email Anda
            // Content
            $mailer->isHTML(false);
            $mailer->Subject = "Info Pendaftaran";
            $mailer->Body    = "Selamat anda sudah terdaftar";

            $mailer->send();
			$simpan = $this->db->query("
				    INSERT INTO user
				    (username,password,nama,hp,namaayah,namaibu,email,status_id) VALUES ('$username','$password','$nama','$hp','$namaayah','$namaibu','$email','$status_id')
				");

						if($simpan){
							create_session('pesan', 'silahkan cek email');
							return redirect('/');
						}

		} catch (Exception $e) {
			echo $mailer->ErrorInfo;
		}
	}


	public function out()
	{
		destroy_session('loginid');
		destroy_session('login');
		return redirect('/');
	}

}
