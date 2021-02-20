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
        $data["gejala"] = $this->model_home->getallgejala();
        $this->load->view('header',$data);
        $this->load->view('sidebar');
		$this->load->view('home/gejala');
        $this->load->view('footer');
	}

    public function rule($username)
	{
        if(!isset($_SESSION["login"])){
            redirect(base_url());
        }
        $data["username"]=str_replace("%20"," ",$username);
        $data["rule"] = $this->model_home->getallrule();
        $data["gejala"] = $this->model_home->getallgejala();
        $data["penyakit"] = $this->model_home->getallpenyakit();
        $this->load->view('header',$data);
        $this->load->view('sidebar');
		$this->load->view('home/rule');
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

    public function detailrule(){
        $rule_id = $this->input->get('id');
        $data = $this->model_home->getrulebyid($rule_id);
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

    public function update_rule($username){
        $data=[
            "rule_id" => $this->input->post("rule-id-edit"),
            "gejala_id" => $this->input->post("gejala-nama-edit"),
            "penyakit_id" => $this->input->post("penyakit-nama-edit"),
            "belief" => $this->input->post("belief-edit"),
            "disbelief" => $this->input->post("disbelief-edit"),
        ];
        $this->model_home->update_rule($data);
        // echo print_r($data);
        redirect(base_url("index.php/home/rule/".$username));
    }

    public function hapusrule(){
        $rule_id = $this->input->get("id");
        $this->model_home->delete_rule($rule_id);
        return $rule_id;
    }

    public function hapusgejala(){
        $gejala_id = $this->input->get("id");
        $this->model_home->delete_gejala($gejala_id);
        return $gejala_id;
    }

    public function insert_rule($username){
        $data=[
            "gejala_id" => $this->input->post("gejala-nama-insert"),
            "penyakit_id" => $this->input->post("penyakit-nama-insert"),
            "belief" => $this->input->post("belief-insert"),
            "disbelief" => $this->input->post("disbelief-insert"),
        ];
        $this->model_home->insert_rule($data);
        // echo print_r($data);
        redirect(base_url("index.php/home/rule/".$username));
    }

    public function insert_penyakit($username){
        $data=[
            "penyakit_nama" => $this->input->post("penyakit-nama-insert"),
            "penyakit_penyebab" => $this->input->post("penyakit-penyebab-insert"),
            "penyakit_solusi" => $this->input->post("penyakit-solusi-insert"),
        ];
        $this->model_home->insert_penyakit($data);
        // echo print_r($data);
        redirect(base_url("index.php/home/penyakit/".$username));
    }

    public function insert_gejala($username){
        $data=[
            "gejala_name" => $this->input->post("gejala-nama-insert")
        ];
        $this->model_home->insert_gejala($data);
        // echo print_r($data);
        redirect(base_url("index.php/home/gejala/".$username));
    }
}
