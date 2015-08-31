<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posisi_penahanan extends CI_Controller {
	function __construct() {
		parent::__construct();
	}
	
	
	public function proses_penahanan() {
		$a['page']	= "posisi_penahanan/l_posisi_penahanan";
		$this->load->view('admin/index', $a);
	} 
	
		
	
}
