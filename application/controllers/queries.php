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
				'about' => $this->input->post('about')
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
}

 ?>