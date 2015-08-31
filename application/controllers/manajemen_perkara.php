<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manajemen_perkara extends CI_Controller {
	function __construct() {
		parent::__construct();
		 $this->load->model('web_model');
	}
	
	
	
	public function perkara() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			$this->session->set_flashdata("k", "<div id=\"alert\" class=\"alert alert-error\">Maaf Anda belum login. Silakan login terlebih dahulu</div>");
			redirect("logins/login");
		}
		
		
		//ambil variabel URL
		$act					= $this->uri->segment(3);
		$id_dispu				= $this->uri->segment(4);
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$id_perkara				= addslashes($this->input->post('id_perkara'));
		$no_agenda				= addslashes($this->input->post('no_agenda'));
		$tanggal_perkara		= addslashes($this->input->post('tanggal_perkara'));
		$nama_tersangka			= addslashes($this->input->post('nama_tersangka'));
		$id_jaksa				= addslashes($this->input->post('id_jaksa'));
		$perkara				= addslashes($this->input->post('perkara'));
		
		$cari				= addslashes($this->input->post('q'));
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM perkara p, jaksa j WHERE p.id_jaksa=j.id_jaksa")->num_rows();
		$per_page		= 150000;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."manajemen_perkara/perkara/".$id_dispu."/p");
		$a['jaksa_list'] = $this->web_model->get_dropdown_list();
		
		if ($act == "del") {
			$this->db->query("DELETE FROM perkara WHERE id_perkara = '$id_dispu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">No agenda : $no_agenda berhasil dihapus </div>");
			redirect('manajemen_perkara/perkara/');
		} else if ($act == "add") {
			$a['page']		= "manajemen_perkara/f_perkara";
		} else if ($act == "edt") {
			$a['data']	= $this->db->query("SELECT * FROM perkara WHERE id_perkara = '$id_dispu'")->row();				
			$a['page']		= "manajemen_perkara/f_perkara";
		} else if ($act == "act_add") {	
			$this->db->query("INSERT INTO perkara(	`id_perkara` ,
													`no_agenda` ,
													`tanggal_perkara` ,
													`nama_tersangka` ,
													`perkara` ,
													`id_jaksa`
													) 
						VALUES (NULL, '$no_agenda','$tanggal_perkara', '$nama_tersangka', '$perkara','$id_jaksa')");
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">No agenda : $no_agenda berhasil ditambahkan</div>");
			redirect('manajemen_perkara/perkara/');
		} else if ($act == "act_edt") {
			$this->db->query("UPDATE perkara SET no_agenda = '$no_agenda', tanggal_perkara = '$tanggal_perkara', nama_tersangka = '$nama_tersangka',perkara = '$perkara', id_jaksa = '$id_jaksa' WHERE id_perkara = '$id_perkara'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">No agenda : $no_agenda berhasil diubah</div>");			
			redirect('manajemen_perkara/perkara/');
		} else {
			$a['data']		= $this->db->query("SELECT p.*,j.* FROM perkara p, jaksa j WHERE p.id_jaksa=j.id_jaksa order by p.tanggal_perkara asc LIMIT $awal, $akhir ")->result();
			$a['page']		= "manajemen_perkara/l_perkara";
		}
		
		$this->load->view('admin/index', $a);	
	}
	
	
}
