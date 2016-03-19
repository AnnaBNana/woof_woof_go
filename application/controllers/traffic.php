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
		if ($this->session->userdata('login_status') == true ) {
			$reg = $this->Query->get_user_by_id($id);
			$pets = $this->Query->get_all_user_pets($id);
			$reg['pets'] = $pets;
			$users = $this->Query->get_user_imgs_rand($id);
			$reg['imgs'] = $users;
			$this->load->view('welcome', $reg);
		} else {
			$this->session->set_flashdata('login_error', "<p>you have been logged out due to inactivity");
			$this->load->view('login');
		}

	}
	public function login() {
		$this->load->view('login');
	}
	public function end() {
		$this->session->sess_destroy();
		redirect('/');
	}
	public function edit($id) {
		if ($this->session->userdata('login_status') == true ) {
			$reg = $this->Query->get_user_by_id($id);
			$reg['msg'] = '';
			$pets = $this->Query->get_all_user_pets($id);
			$reg['pets'] = $pets;
			$this->load->view('edit', $reg);
		} else {
			$this->session->set_flashdata('login_error', "<p>you have been logged out due to inactivity");
			$this->load->view('login');
		}
	}
	public function browse($id) {
		if ($this->session->userdata('login_status') == true ) {
			$reg = $this->Query->get_user_by_id($id);
			$reg['user_profiles'] = $this->Query->get_user_imgs_by_date($id);
			$this->load->view('browse', $reg);
		} else {
			$this->session->set_flashdata('login_error', "<p>you have been logged out due to inactivity");
			$this->load->view('login');
		}
	}
	public function messages($id) {
		if ($this->session->userdata('login_status') == true ) {
			$reg = $this->Query->get_user_by_id($id);
			$reg['sent_messages'] = $this->Query->get_all_sent_messages($id);
			$reg['messages'] = $this->Query->get_all_users_messages($id);
			$this->load->view('messages', $reg);
		} else {
			$this->session->set_flashdata('login_error', "<p>you have been logged out due to inactivity");
			$this->load->view('login');
		}
	}
	public function profile($id) {
		if ($this->session->userdata('login_status') == true ) {
			$reg = $this->Query->get_user_by_id($id);
			$pets = $this->Query->get_all_user_pets($id);
			$reg['pets'] = $pets;
			$this->load->view('profile', $reg);
		} else {
			$this->session->set_flashdata('login_error', "<p>you have been logged out due to inactivity");
			$this->load->view('login');
		}
	}
	public function map() {
		$this->load->view('map');
	}
	public function tester() {
		$this->load->view('testmain');
	}
}

 ?>