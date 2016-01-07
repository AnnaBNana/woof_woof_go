<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Queries extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Query');
		$this->load->library('form_validation');
		// $this->output->enable_profiler(TRUE);
	}

	public function index() {
		$this->load->view('main');
	}
	public function editMe($id) {
		$this->form_validation->set_rules('alias', 'Alias', 'required|trim|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('about', 'Description', 'trim|xxs_clean');

		if($this->form_validation->run() === TRUE){

			$info = array(
				'alias' => $this->input->post('alias'),
				'email' => $this->input->post('email'),
				'about' => $this->input->post('about'),
				'loc' => $this->input->post('loc'),
				'avail' => $this->input->post('avail')
				);
			
			$this->Query->edit_user($info, $id);
			$this->session->set_flashdata('updated', 'Profile Updated Successfully!');
		redirect("/traffic/edit/" . $id);
		}
		else{
			$this->session->set_flashdata('errors', validation_errors());
			redirect('/traffic/login');
		}
	}
	public function addPet($id) {
		
		$this->form_validation->set_rules('name', 'Pet Name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('species', 'Species', 'trim|required|xss_clean');
		$this->form_validation->set_rules('breed', 'Breed', 'required|trim|xxs_clean');

		if($this->form_validation->run() === TRUE){

			$info = array(
				'name' => $this->input->post('name'),
				'species' => $this->input->post('species'),
				'breed' => $this->input->post('breed')
				);
			
			$this->Query->add_pet($info, $id);
			$this->session->set_flashdata('updated', 'Pet added successfully!');
		redirect("/traffic/edit/" . $id);
		}
		else{
			$this->session->set_flashdata('errors', validation_errors());
			redirect("/traffic/edit/" . $id);
		}
	}
	public function editPet($pet_id, $id) {
		// var_dump($id);
		// die();
		$this->form_validation->set_rules('name', 'Name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('species', 'Species', 'trim|required|xss_clean');
		$this->form_validation->set_rules('breed', 'Breed', 'trim|required|xss_clean');
		$this->form_validation->set_rules('about', 'Description', 'trim|xxs_clean');

		if($this->form_validation->run() === TRUE){

			$info = array(
				'name' => $this->input->post('name'),
				'species' => $this->input->post('species'),
				'breed' => $this->input->post('breed'),
				'about' => $this->input->post('about')
				);
			
			$this->Query->edit_pet($info, $pet_id);

			$this->session->set_flashdata('updated', 'Pet Profile Updated Successfully!');
		redirect("/traffic/edit/" . $id);
		}
		else{
			$this->session->set_flashdata('errors', validation_errors());
			redirect("/traffic/edit/" . $id);
		}
	}
	public function deletePet($pet_id, $id) {
		$this->Query->delete_pet($pet_id);
		$this->session->set_flashdata('updated', 'Pet Profile Deleted.');
		redirect("/traffic/edit/" . $id);
	}
	public function deleteProfile() {

	}
	public function sendMail($id) {
		// var_dump('in queries controller', $id, $this->input->post());
		// die();
		$alias = $this->input->post('alias');
		$recip_check = $this->Query->get_user_by_alias($alias);
		if(!empty($recip_check)){
			$info = array(
				'subject' => $this->input->post('subject'),
				'text' => $this->input->post('text'),
				'recip_id' => $recip_check['id']
				);
			$this->Query->send_msg($info, $id);
			$recip_id = $recip_check['id'];
			$this->session->set_flashdata('msg_return', 'Message Sent!');
			redirect("/traffic/profile/" . $recip_id);
		} else {
			$this->session->set_flashdata('msg_return', 'this user does not exist');
			redirect("/traffic/profile/" . $recip_id);
		}
	}
	public function delete_msg($msg_id) {
		$this->Query->delete_msg($msg_id);
		$id = $this->session->userdata('id');
		redirect("/traffic/messages/" . $id);
	}
	public function msg_partial($msg_id) {
		$this->Query->mark_msg_read($msg_id);
		$data["msg"] = $this->Query->get_msg_by_id($msg_id);
		$this->load->view("/partials/open_message", $data);
	}
	public function reply_partial($msg_id) {
		$this->Query->mark_msg_read($msg_id);
		$data["msg"] = $this->Query->get_msg_by_id($msg_id);
		$this->load->view("/partials/reply_message", $data);
	}

}

 ?>