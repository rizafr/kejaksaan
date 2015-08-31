<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengaturan extends CI_Controller {
	function __construct() {
		parent::__construct();
		 $this->load->model('web_model');
	}
	
		
	public function pengguna() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			$this->session->set_flashdata("k", "<div id=\"alert\" class=\"alert alert-error\">Maaf Anda belum login. Silakan login terlebih dahulu</div>");
			redirect("logins/login");
		}	
		
		//ambil variabel URL
		$act					= mysql_real_escape_string($this->uri->segment(3));
		
		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
		$nama					= addslashes($this->input->post('nama'));
		$alamat					= addslashes($this->input->post('alamat'));
		$kepsek					= addslashes($this->input->post('kepsek'));
		$nip_kepsek				= addslashes($this->input->post('nip_kepsek'));
		
		$cari					= addslashes($this->input->post('q'));

		//upload config 
		$config['upload_path'] 		= './upload';
		$config['allowed_types'] 	= 'gif|jpg|png|pdf|doc|docx';
		$config['max_size']			= '2000';
		$config['max_width']  		= '3000';
		$config['max_height'] 		= '3000';

		$this->load->library('upload', $config);
		
		if ($act == "act_edt") {
			if ($this->upload->do_upload('logo')) {
				$up_data	 	= $this->upload->data();
				
				$this->db->query("UPDATE tr_instansi SET nama = '$nama', alamat = '$alamat', kepsek = '$kepsek', nip_kepsek = '$nip_kepsek', logo = '".$up_data['file_name']."' WHERE id = '$idp'");

			} else {
				$this->db->query("UPDATE tr_instansi SET nama = '$nama', alamat = '$alamat', kepsek = '$kepsek', nip_kepsek = '$nip_kepsek' WHERE id = '$idp'");
			}		

			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data berhasil diubah</div>");			
			redirect('pengaturan/pengguna');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM tr_instansi WHERE id = '1' LIMIT 1")->row();
			$a['page']		= "pengaturan/f_pengguna";
		}
		
		$this->load->view('admin/index', $a);	
	}
	
		
	public function manage_admin() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			$this->session->set_flashdata("k", "<div id=\"alert\" class=\"alert alert-error\">Maaf Anda belum login. Silakan login terlebih dahulu</div>");redirect("logins/login");
		}
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_admin")->num_rows();
		$per_page		= 15000;
		
		$awal	= mysql_real_escape_string($this->uri->segment(4)); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."pengaturan/manage_admin/p");
		
		//ambil variabel URL
		$act					= mysql_real_escape_string($this->uri->segment(3));
		$idu					= mysql_real_escape_string($this->uri->segment(4));
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
		$username				= addslashes($this->input->post('username'));
		$password				= md5(addslashes($this->input->post('password')));
		$nama					= addslashes($this->input->post('nama'));
		$jabatan				= addslashes($this->input->post('jabatan'));
		$nip					= addslashes($this->input->post('nip'));
		$level					= addslashes($this->input->post('id_level'));
		$a['level_list'] 		= $this->web_model->get_level_list();
		$cari					= addslashes($this->input->post('q'));

		
		if ($act == "del") {
			$this->db->query("DELETE FROM pengguna WHERE id_pengguna = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data berhasil diubah</div>");
			redirect('pengaturan/manage_admin');
		} else if ($act == "cari") {
			$a['data']		= $this->db->query("SELECT p.*, l.* FROM pengguna p, level l WHERE p.nama LIKE '%$cari%' AND p.id_level = l.id_level  ORDER BY id DESC")->result();
			$a['page']		= "pengaturan/l_manage_admin";
		} else if ($act == "add") {
			$a['page']		= "pengaturan/f_manage_admin";
		} else if ($act == "edt") {
			$a['datpil']	= $this->db->query("SELECT p.* , l.* FROM pengguna p, level l where p.id_level = l.id_level and  p.id_pengguna = '$idu'")->row();	
			$a['page']		= "pengaturan/f_manage_admin";
		} else if ($act == "act_add") {	
			$this->db->query("INSERT INTO pengguna VALUES (NULL, '$username', '$password', '$nama', '$nip','$jabatan', '$level')");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data berhasil ditambah</div>");
			redirect('pengaturan/manage_admin');
		} else if ($act == "act_edt") {
			if ($password = md5("-")) {
				$this->db->query("UPDATE pengguna SET username = '$username', nama = '$nama', nip = '$nip', id_level = '$level' WHERE id_pengguna = '$idp'");
			} else {
				$this->db->query("UPDATE pengguna SET username = '$username', password = '$password', nama = '$nama', nip = '$nip', id_level = '$level' WHERE id_pengguna = '$idp'");
			}
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data berhasil diubah </div>");			
			redirect('pengaturan/manage_admin');
		} else {
			$a['data']		= $this->db->query("SELECT p.* , l.* FROM pengguna p, level l where p.id_level = l.id_level LIMIT $awal, $akhir ")->result();
			$a['page']		= "pengaturan/l_manage_admin";
		}
		
		$this->load->view('admin/index', $a);	
	}

		
	public function passwod() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			$this->session->set_flashdata("k", "<div id=\"alert\" class=\"alert alert-error\">Maaf Anda belum login. Silakan login terlebih dahulu</div>");
			redirect("logins/login");
		}
		
		$ke				= mysql_real_escape_string($this->uri->segment(3));
		$id_user		= $this->session->userdata('admin_id');
		
		//var post
		$p1				= md5($this->input->post('p1'));
		$p2				= md5($this->input->post('p2'));
		$p3				= md5($this->input->post('p3'));
		
		if ($ke == "simpan") {
			$cek_password_lama	= $this->db->query("SELECT password FROM pengguna WHERE id_pengguna = $id_user")->row();
			//echo 
			
			if ($cek_password_lama->password != $p1) {
				$this->session->set_flashdata('k_passwod', '<div id="alert" class="alert alert-error">Password Lama tidak sama</div>');
				redirect('pengaturan/passwod');
			} else if ($p2 != $p3) {
				$this->session->set_flashdata('k_passwod', '<div id="alert" class="alert alert-error">Password Baru 1 dan 2 tidak cocok</div>');
				redirect('pengaturan/passwod');
			} else {
				$this->db->query("UPDATE pengguna SET password = '$p3' WHERE id_pengguna = '1'");
				$this->session->set_flashdata('k_passwod', '<div id="alert" class="alert alert-success">Password berhasil diperbaharui. <br /> Mulai sekarang Anda login dengan Password baru Anda.</div>');
				redirect('pengaturan/passwod');
			}
		} else {
			$a['page']	= "pengaturan/f_passwod";
		}
		
		$this->load->view('admin/index', $a);	
	}
	
	
}
