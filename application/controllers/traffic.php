<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Traffic extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Query');
		$this->load->helper(array('form', 'url'));
		// $this->output->enable_profiler(TRUE);
	}

	public function index() {
		$this->load->view('header');
		$this->load->view('main');
		$this->load->view('footer');
	}

	public function success($id) {
		if ($this->session->userdata('login_status') == true && $id == $this->session->userdata['id']) {
			$reg = $this->Query->get_user_by_id($id);
			$pets = $this->Query->get_all_user_pets($id);
			$reg['pets'] = $pets;
			$users = $this->Query->get_user_imgs_rand($id);
			$reg['imgs'] = $users;
			$this->load->view('header');
			$this->load->view('navbar', $reg);
			$this->load->view('welcome', $reg);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata('login_error', "<p>you have been logged out due to inactivity</p>");
			$this->load->view('header');
			$this->load->view('main');
			$this->load->view('footer');
		}

	}
	public function login() {
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}
	public function end() {
		$this->session->sess_destroy();
		redirect('/');
	}
	public function edit($id) {
		if ($this->session->userdata('login_status') == true && $id == $this->session->userdata['id']) {
			$reg = $this->Query->get_user_by_id($id);
			$reg['msg'] = '';
			$pets = $this->Query->get_all_user_pets($id);
			$reg['pets'] = $pets;
			$this->load->view('header');
			$this->load->view('navbar', $reg);
			$this->load->view('edit', $reg);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata('login_error', "<p>you have been logged out due to inactivity</p>");
			$this->load->view('header');
			$this->load->view('main');
			$this->load->view('footer');
		}
	}

	public function edit_pet($id) {
		if ($this->session->userdata('login_status') == true && $id == $this->session->userdata['id']) {
			$reg = $this->Query->get_user_by_id($id);
			$reg['msg'] = '';
			$pets = $this->Query->get_all_user_pets($id);
			$reg['pets'] = $pets;
			$this->load->view('header');
			$this->load->view('navbar', $reg);
			$this->load->view('editpet', $reg);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata('login_error', "<p>you have been logged out due to inactivity</p>");
			$this->load->view('header');
			$this->load->view('main');
			$this->load->view('footer');
		}
	}

	public function browse($id) {
		if ($this->session->userdata('login_status') == true  && $id == $this->session->userdata['id']) {
			$reg = $this->Query->get_user_by_id($id);
			$reg['user_profiles'] = $this->Query->get_user_imgs_by_date($id);
			$this->load->view('header');
			$this->load->view('navbar', $reg);
			$this->load->view('browse', $reg);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata('login_error', "<p>you have been logged out due to inactivity</p>");
			$this->load->view('header');
			$this->load->view('main');
			$this->load->view('footer');
		}
	}
	public function messages($id) {
		if ($this->session->userdata('login_status') == true  && $id == $this->session->userdata['id']) {
			$reg = $this->Query->get_user_by_id($id);
			$reg['sent_messages'] = $this->Query->get_all_sent_messages($id);
			$reg['messages'] = $this->Query->get_all_users_messages($id);
			$this->load->view('header');
			$this->load->view('navbar', $reg);
			$this->load->view('messages', $reg);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata('login_error', "<p>you have been logged out due to inactivity</p>");
			$this->load->view('header');
			$this->load->view('main');
			$this->load->view('footer');
		}
	}
	public function profile($id) {
		if ($this->session->userdata('login_status') == true) {
			$reg = $this->Query->get_user_by_id($id);
			$pets = $this->Query->get_all_user_pets($id);
			$reg['pets'] = $pets;
			$this->load->view('header');
			$this->load->view('navbar', $reg);
			$this->load->view('profile', $reg);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata('login_error', "<p>you have been logged out due to inactivity</p>");
			$this->load->view('header');
			$this->load->view('main');
			$this->load->view('footer');
		}
	}
	public function map($id) {
		if ($this->session->userdata('login_status') == true  && $id == $this->session->userdata['id']) {
			//variable enables us to know whether user is navigating from front page or from inside of profile.  if we use session logged in as indicator, sometimes a user will be logged in, but coming from front page, and buttons will display incorrectly
			$reg['loc'] = "private";
			$this->load->view('header');
			$this->load->view('navbar');
			$this->load->view('map', $reg);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata('login_error', "<p>you have been logged out due to inactivity</p>");
			$this->load->view('header');
			$this->load->view('main');
			$this->load->view('footer');
		}
	}
	public function logged_out_map() {
		$reg['loc'] = 'public';
		$this->load->view('header');
		$this->load->view('map', $reg);
		$this->load->view('footer');
	}
	public function park($park_id) {
		$reg['park_id'] = $park_id;
		if ($this->session->userdata('login_status') == true) {
			$reg['id'] = $this->session->userdata['id'];
			$this->load->view('header');
			$this->load->view('navbar');
			$this->load->view('park', $reg);
			$this->load->view('footer');
		} else {
			$this->load->view('header');
			$this->load->view('park', $reg);
			$this->load->view('footer');
		}
	}
}

 ?>
