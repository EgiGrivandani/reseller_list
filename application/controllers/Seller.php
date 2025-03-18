<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Seller extends CI_Controller
{
	protected $arr = '';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_home');
	}

	public function profile($seller_name){
		$reserved_names = ['auth', 'admin'];
		if (in_array(strtolower($seller_name), $reserved_names)) {
			show_404();
			return;
		}
		$get = $this->M_home->resellerByUnique_name($seller_name);
		if($get){
			$data['title'] = $seller_name;
			$data['list']  = $get;
			$this->load->view('home/seller', $data);
		}else{
			echo "404 not found";
			exit();
		}
	}
}
