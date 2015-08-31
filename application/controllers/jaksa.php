<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jaksa extends CI_Controller {
	function __construct() {
		parent::__construct();
	}

	public function olah_jaksa() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			$this->session->set_flashdata("k", "<div id=\"alert\" class=\"alert alert-error\">Maaf Anda belum login. Silakan login terlebih dahulu</div>");
			redirect("logins/login");
		}
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM jaksa")->num_rows();
		$per_page		= 15000;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."jaksa/olah_jaksa/p");
		
		//ambil variabel URL
		$act					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$id_jaksa			= addslashes($this->input->post('id_jaksa'));
		$nip				= addslashes($this->input->post('nip'));
		$nama_jaksa			= addslashes($this->input->post('nama_jaksa'));
		
		$cari					= addslashes($this->input->post('q'));

		if ($act == "del") {
			$this->db->query("DELETE FROM jaksa WHERE id_jaksa = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data berhasil dihapus </div>");
			redirect('jaksa/olah_jaksa'); //redirect ke nama controller / nama fungsi
		} else if ($act == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM jaksa WHERE nip LIKE '%$cari%' OR nama_jaksa LIKE '%$cari%' ORDER BY id DESC")->result();
			$a['page']		= "jaksa/l_jaksa"; //halaman nya berisi namafolder/namafilephp
		} else if ($act == "add") {
			$a['page']		= "jaksa/f_jaksa";
		} else if ($act == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM jaksa WHERE id_jaksa = '$idu'")->row();	
			$a['page']		= "jaksa/f_jaksa";
		} else if ($act == "act_add") {	
			$this->db->query("INSERT INTO jaksa VALUES (NULL, '$nip', '$nama_jaksa')");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id_surat_masuk=\"alert\">Data berhasil ditambahkan. ".$this->upload->display_errors()."</div>");
			redirect('jaksa/olah_jaksa');
		} else if ($act == "act_edt") {
			$this->db->query("UPDATE jaksa SET nip = '$nip', nama_jaksa = '$nama_jaksa' WHERE id_jaksa = '$id_jaksa'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id_surat_masuk=\"alert\">Data berhasil diubah. ".$this->upload->display_errors()."</div>");			
			redirect('jaksa/olah_jaksa');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM jaksa order by nip DESC  LIMIT $awal, $akhir ")->result();
			$a['page']		= "jaksa/l_jaksa";
		}
		
		$this->load->view('admin/index', $a);
	}
}
