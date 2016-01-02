<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Query');
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
		$this->load->view('upload_form', array('error' => ' ' ));
	}
	function do_upload($id)
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$this->session->set_flashdata('updated', 'Unable to upload photo.');
			redirect('/traffic/edit/' . $id);
		}
		else
		{
			$image_data = $this->upload->data(); 
			$insert_data = array(
	            'name' => $image_data['file_name'],
            );
            $this->Query->add_user_image($insert_data, $id);
			// var_dump($insert_data['name']);
			// die();
			$this->session->set_flashdata('updated', 'Profile Photo Uploaded Successfully!');
			redirect('/traffic/edit/' . $id);
		}
	}
	function do_pet_upload($pet_id, $id)
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$this->session->set_flashdata('updated', 'Unable to upload photo.');
			redirect('/traffic/edit/' . $id);
		}
		else
		{
			$image_data = $this->upload->data(); 
			$insert_data = array(
	            'name' => $image_data['file_name'],
            );
            $this->Query->add_pet_image($insert_data, $pet_id);
			// var_dump($insert_data['name']);
			// die();
			$this->session->set_flashdata('updated', 'Pet Photo Uploaded Successfully!');
			redirect('/traffic/edit/' . $id);
		}
	}
}
?>
