<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logins extends CI_Controller {
	function __construct() {
		parent::__construct();
	}	
		
	//login
	public function index() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			$this->session->set_flashdata("k", "<div id=\"alert\" class=\"alert alert-error\">Maaf Anda belum login. Silakan login terlebih dahulu</div>");
			redirect("logins/login");
		}
		
		$a['page']	= "beranda";
		
		$this->load->view('admin/index', $a);
	}
	
	public function login() {
		$this->load->view('admin/login');
	}
	
	public function do_login() {
		$u 		= $this->security->xss_clean($this->input->post('u'));
		$ta 	= $this->security->xss_clean($this->input->post('ta'));
        $p 		= md5($this->security->xss_clean($this->input->post('p')));
         
		$q_cek	= $this->db->query("SELECT p.*, l.* 
										FROM pengguna p, level l 
										WHERE p.username = '".$u."' 
											AND p.password = '".$p."' 
											AND p.id_level=l.id_level
									");
		$j_cek	= $q_cek->num_rows();
		$d_cek	= $q_cek->row();
		//echo $this->db->last_query();
		
        if($j_cek == 1) {
            $data = array(
                    'admin_id' => $d_cek->id_pengguna,
                    'admin_user' => $d_cek->username,
                    'admin_nama' => $d_cek->nama,
                    'admin_nip' => $d_cek->nip,
                    'admin_ta' => $ta,
                    'admin_level' => $d_cek->level,
                    'admin_id_level' => $d_cek->id_level,
					'admin_valid' => true
                    );
            $this->session->set_userdata($data);
            redirect('admin');
        } else {	
			$this->session->set_flashdata("k", "<div id=\"alert\" class=\"alert alert-error\">username or password is not valid</div>");
			redirect('logins/login');
		}
	}
	
	public function logout(){
        $this->session->sess_destroy();
		redirect('logins/login');
    }
}
