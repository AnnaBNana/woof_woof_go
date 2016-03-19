<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logins extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Query');
		$this->load->library('form_validation');
		// $this->output->enable_profiler(TRUE);
	}

	public function index() {
		$this->load->view('logins');
	}

	public function register(){
		// var_dump($this->input->post());
		// die();
		$this->form_validation->set_rules('name', 'Name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('alias', 'Alias', 'required|trim|is_unique[users.alias]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[confirm]|xss_clean|md5');
		$this->form_validation->set_rules('confirm', 'Password Confirmation', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]|xss_clean');

		if($this->form_validation->run() === TRUE){

			$info = array(
				'name' => $this->input->post('name'),
				'alias' => $this->input->post('alias'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password')
				);
			
			$this->Query->add_user($info);
			$user = $this->Query->get_user_by_email($info['email']);
			$id = $user['id'];
			$this->session->set_userdata('id', $id);
			$login_status = true;
			$this->session->set_userdata('login_status', $login_status);
		redirect("/traffic/success/" . $id);
		}
		else{
			$this->session->set_flashdata('errors', validation_errors());
			redirect('/traffic/login');
		}
	}
	public function sign_in(){
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$login_check = $this->Query->get_user_by_email($email);
		if(!empty($login_check) && $login_check['password'] == $password){

			$user = $this->Query->get_user_by_email($email);
			$id = $user['id'];
			$this->session->set_userdata('id', $id);
			$login_status = true;
			$this->session->set_userdata('login_status', $login_status);
			redirect('/traffic/success/' . $id);
		}
		else{
			$this->session->set_flashdata('login_error', '<p>Invalid email or password!</p>');
			redirect('/traffic/login');
		}
	}
	
	
}

 ?>