<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->model('model_home');
    }

    public function index()
	{

        $this->load->view('header');
		$this->load->view('home/index');
	}

    public function logout(){
        session_destroy(); //menghapus sessions
        redirect(base_url());
    }
    public function login()
	{
        $username=$this->input->post("username");
        $password=$this->input->post("password");

		// $user = $this->model_home->getuser($username);
		if ($username=="aldi indrawan") { //jika data user ada
			// $saved_password = password_hash($user['user_password'], PASSWORD_DEFAULT);
			if ($password == "123456") {
				$_SESSION["login"] = true;
				// $this->session->set_flashdata('status-login', 'Berhasil');
				redirect(base_url('index.php/home/diagnosa/').$username);
			} else {
				redirect(base_url());
			}
		} else {
			redirect(base_url());
		}
	
	}

	public function diagnosa($username)
	{
        if(!isset($_SESSION["login"])){
            redirect(base_url());
        }
        $data["username"]=str_replace("%20"," ",$username);
        $this->load->view('header',$data);
        $this->load->view('sidebar');
		$this->load->view('home/diagnosa');
        $this->load->view('footer');
	}

    public function penyakit($username)
	{
        if(!isset($_SESSION["login"])){
            redirect(base_url());
        }
        $data["penyakit"] = $this->model_home->getallpenyakit();
        $data["username"]=str_replace("%20"," ",$username);
        $this->load->view('header',$data);
        $this->load->view('sidebar');
		$this->load->view('home/penyakit');
        $this->load->view('footer');
	}

    public function gejala($username)
	{
        if(!isset($_SESSION["login"])){
            redirect(base_url());
        }
        $data["username"]=str_replace("%20"," ",$username);
        $this->load->view('header',$data);
        $this->load->view('sidebar');
		$this->load->view('home/gejala');
        $this->load->view('footer');
	}

    public function riwayat($username)
	{
        if(!isset($_SESSION["login"])){
            redirect(base_url());
        }
        $data["username"]=str_replace("%20"," ",$username);
        $this->load->view('header',$data);
        $this->load->view('sidebar');
		$this->load->view('home/riwayat');
        $this->load->view('footer');
	}

    public function detailpenyakit(){
        $penyakit_id = $this->input->get('id');
        $data = $this->model_home->getpenyakitbyid($penyakit_id);
        echo json_encode($data);
    }

    public function hapuspenyakit(){
        $penyakit_id = $this->input->get('id');
        $data = $this->model_home->hapuspenyakit($penyakit_id);
        echo $penyakit_id;
    }

    public function update_penyakit($username){
        $data=[
            "penyakit_id" => $this->input->post("penyakit-id-edit"),
            "penyakit_nama" => $this->input->post("penyakit-nama-edit"),
            "penyakit_penyebab" => $this->input->post("penyakit-penyebab-edit"),
            "penyakit_solusi" => $this->input->post("penyakit-solusi-edit"),
        ];
        $this->model_home->update_penyakit($data);
        redirect(base_url("index.php/home/penyakit/".$username));
    }
}
