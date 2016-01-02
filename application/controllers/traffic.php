<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Traffic extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Query');
		$this->load->helper(array('form', 'url'));
		// $this->output->enable_profiler(TRUE);
	}

	public function index() {
		$this->load->view('main');
	}
	
	public function success($id) {
		$reg = $this->Query->get_user_by_id($id);
		$pets = $this->Query->get_all_user_pets($id);
		$reg['pets'] = $pets;
		$users = $this->Query->get_all_user_img();
		$reg['imgs'] = $users;
		$this->load->view('welcome', $reg);
	}
	public function login() {
		$this->load->view('login');
	}
	public function end() {
		$this->session->sess_destroy();
		redirect('/');
	}
	public function edit($id) {
		$reg = $this->Query->get_user_by_id($id);
		$reg['msg'] = '';
		$pets = $this->Query->get_all_user_pets($id);
		$reg['pets'] = $pets;
		$this->load->view('edit', $reg);
	}
	public function browse($id) {
		$reg = $this->Query->get_user_by_id($id);
		$this->load->view('browse', $reg);
	}
	public function messages($id) {
		$reg = $this->Query->get_user_by_id($id);
		$this->load->view('messages', $reg);
	}
	public function profile($id) {
		$reg = $this->Query->get_user_by_id($id);
		$pets = $this->Query->get_all_user_pets($id);
		$reg['pets'] = $pets;
		$this->load->view('profile', $reg);
	}
	public function map() {
		$this->load->view('map');
	}
}

 ?>