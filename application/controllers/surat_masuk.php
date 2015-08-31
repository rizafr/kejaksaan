<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Surat_masuk extends CI_Controller {
	function __construct() {
		parent::__construct();
	}
	
	public function index() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			$this->session->set_flashdata("k", "<div id=\"alert\" class=\"alert alert-error\">Maaf Anda belum login. Silakan login terlebih dahulu</div>");
			redirect("logins/login");
		}
		
		$a['page']	= "beranda";
		
		$this->load->view('admin/index', $a);
	}

	
	public function masuk() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			$this->session->set_flashdata("k", "<div id=\"alert\" class=\"alert alert-error\">Maaf Anda belum login. Silakan login terlebih dahulu</div>");
			redirect("logins/login");
		}
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM surat_masuk")->num_rows();
		$per_page		= 15000;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."surat_masuk/masuk/p");
		
		//ambil variabel URL
		$act					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$id_surat_masuk			= addslashes($this->input->post('id_surat_masuk'));
		$no_agenda				= addslashes($this->input->post('no_agenda'));
		$index_surat_masuk		= addslashes($this->input->post('index_surat_masuk'));
		$kode_surat_masuk		= addslashes($this->input->post('kode_surat_masuk'));
		$asal_surat_masuk		= addslashes($this->input->post('asal_surat_masuk'));
		$no_surat_masuk			= addslashes($this->input->post('no_surat_masuk'));
		$status_surat_masuk		= addslashes($this->input->post('status_surat_masuk'));
		$tgl_surat_masuk		= addslashes($this->input->post('tgl_surat_masuk'));
		$perihal_surat_masuk	= addslashes($this->input->post('perihal_surat_masuk'));
		$keterangan				= addslashes($this->input->post('keterangan'));
		$status_disposisi		= addslashes($this->input->post('status_disposisi'));
		
		$cari					= addslashes($this->input->post('q'));

		//upload config 
		$config['upload_path'] 		= './upload/surat_masuk';
		$config['allowed_types'] 	= 'gif|jpg|png|pdf|doc|docx';
		$config['max_size']			= '2000';
		$config['max_width']  		= '3000';
		$config['max_height'] 		= '3000';

		$this->load->library('upload', $config);
		
		if ($act == "del") {
			$this->db->query("DELETE FROM surat_masuk WHERE id_surat_masuk = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data berhasil dihapus </div>");
			redirect('surat_masuk/masuk');
		} else if ($act == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM surat_masuk WHERE perihal_surat_masuk LIKE '%$cari%' OR index_surat_masuk LIKE '%$cari%' OR asal_surat_masuk LIKE '%$cari%' OR no_surat_masuk LIKE '%$cari%' ORDER BY id DESC")->result();
			$a['page']		= "surat_masuk/l_surat_masuk";
		} else if ($act == "add") {
			$a['page']		= "surat_masuk/f_surat_masuk";
		} else if ($act == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM surat_masuk WHERE id_surat_masuk = '$idu'")->row();	
			$a['page']		= "surat_masuk/f_surat_masuk";
		} else if ($act == "act_add") {	
			if ($this->upload->do_upload('lampiran')) {
				$up_data	 	= $this->upload->data();
				
				$this->db->query("INSERT INTO surat_masuk VALUES (NULL, '$kode_surat_masuk', '$no_surat_masuk', '$asal_surat_masuk', '$tgl_surat_masuk', '$status_surat_masuk', '$perihal_surat_masuk', '$index_surat_masuk', '$no_agenda', '".$up_data['file_name']."', NOW(), '".$this->session->userdata('admin_id')."', '$keterangan','1' )");
			} else {
				$this->db->query("INSERT INTO surat_masuk VALUES (NULL, '$kode_surat_masuk', '$no_surat_masuk', '$asal_surat_masuk', '$tgl_surat_masuk', '$status_surat_masuk', '$perihal_surat_masuk', '$index_surat_masuk', '$no_agenda', '', NOW(), '".$this->session->userdata('admin_id')."', '$keterangan','1')");
			}	
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id_surat_masuk=\"alert\">Data berhasil ditambahkan. ".$this->upload->display_errors()."</div>");
			redirect('surat_masuk/masuk');
		} else if ($act == "act_edt") {
			if ($this->upload->do_upload('lampiran')) {
				$up_data	 	= $this->upload->data();
							
				$this->db->query("UPDATE surat_masuk SET kode_surat_masuk = '$kode_surat_masuk', no_surat_masuk = '$no_surat_masuk', asal_surat_masuk = '$asal_surat_masuk', tgl_surat_masuk = '$tgl_surat_masuk', status_surat_masuk = '$status_surat_masuk', perihal_surat_masuk = '$perihal_surat_masuk', index_surat_masuk = '$index_surat_masuk', no_agenda = '$no_agenda', keterangan = '$keterangan', lampiran = '".$up_data['file_name']."' WHERE id_surat_masuk = '$id_surat_masuk'");
			} else {
				$this->db->query("UPDATE surat_masuk SET kode_surat_masuk = '$kode_surat_masuk', no_surat_masuk = '$no_surat_masuk', asal_surat_masuk = '$asal_surat_masuk', tgl_surat_masuk = '$tgl_surat_masuk', status_surat_masuk = '$status_surat_masuk', perihal_surat_masuk = '$perihal_surat_masuk', index_surat_masuk = '$index_surat_masuk', no_agenda = '$no_agenda', keterangan = '$keterangan' WHERE id_surat_masuk = '$id_surat_masuk'");
			}	
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id_surat_masuk=\"alert\">Data berhasil diubah. ".$this->upload->display_errors()."</div>");			
			redirect('surat_masuk/masuk');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM surat_masuk order by tgl_surat_masuk DESC  LIMIT $awal, $akhir ")->result();
			$a['page']		= "surat_masuk/l_surat_masuk";
		}
		
		$this->load->view('admin/index', $a);
	}
}
