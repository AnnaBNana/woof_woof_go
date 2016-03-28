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
		$this->load->library('image_lib');
		//limit upload types, size, etc.  config errs displayed on edit view
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '2048';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			//set failed to upload message if upload fails
			$this->session->set_flashdata('updated', 'Unable to upload photo.');
			redirect('/traffic/edit/' . $id);
		}
		else
		{
			$image_data = $this->upload->data();

			// var_dump($image_data);
			// die();
			//resize image to as close as possible to 200 x 200, maintaining aspect ratio
			$image['source_image']	= $image_data['full_path'];
			$image['maintain_ratio'] = TRUE;
			$image['width']	= 200;
			$image['height']	= 200;
			$image['master_dim'] = 'height';

			$this->image_lib->initialize($image);

			if (! $this->image_lib->resize()) {
				$this->session->set_flashdata('updated', 'Unable to resize photo');
			}

			//create thumb, save to file
			$thumb['source_image'] = $image_data['full_path'];
			$thumb['new_image'] = $image_data['file_path'] . 'thumbs/' . $image_data['file_name'];
			$thumb['maintain_ratio'] = TRUE;
			$thumb['width'] = 100;
			$thumb['height'] = 100;

			$this->image_lib->initialize($thumb);

			if (! $this->image_lib->resize()) {
				$this->session->set_flashdata('updated', 'Unable to resize photo');
			}

			$insert_data = array(
	            'image' => $image_data['file_name'],
							'thumb' => "thumbs/" . $image_data['file_name']
            );
			//save image urls to db
			$this->Query->add_user_image($insert_data, $id);
			// var_dump($insert_data['name']);
			// die();
			//success message
			$this->session->set_flashdata('updated', 'Profile Photo Uploaded Successfully!');
			redirect('/traffic/edit/' . $id);
		}
	}

	function do_pet_upload($pet_id, $id)
	{
		$this->load->library('image_lib');
		//limit upload types, size, etc.  config errs displayed on edit view
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '2048';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			//set failed to upload message if upload fails
			$this->session->set_flashdata('updated', 'Unable to upload photo.');
			redirect('/traffic/edit_pet/' . $id);
		}
		else
		{
			$image_data = $this->upload->data();

			// var_dump($image_data);
			// die();
			//resize image to as close as possible to 200 x 200, maintaining aspect ratio
			$image['source_image']	= $image_data['full_path'];
			$image['maintain_ratio'] = TRUE;
			$image['width']	= 200;
			$image['height']	= 200;
			$image['master_dim'] = 'height';

			$this->image_lib->initialize($image);

			if (! $this->image_lib->resize()) {
				$this->session->set_flashdata('updated', 'Unable to resize photo');
			}

			//create thumb, save to file
			$thumb['source_image'] = $image_data['full_path'];
			$thumb['new_image'] = $image_data['file_path'] . 'thumbs/' . $image_data['file_name'];
			$thumb['maintain_ratio'] = TRUE;
			$thumb['width'] = 100;
			$thumb['height'] = 100;

			$this->image_lib->initialize($thumb);

			if (! $this->image_lib->resize()) {
				$this->session->set_flashdata('updated', 'Unable to resize photo');
			}

			$insert_data = array(
	            'image' => $image_data['file_name'],
							'thumb' => "thumbs/" . $image_data['file_name']
            );
			//save image urls to db
			$this->Query->add_pet_image($insert_data, $pet_id);
			// var_dump($insert_data['name']);
			// die();
			//success message
			$this->session->set_flashdata('updated', 'Pet Photo Uploaded Successfully!');
			redirect('/traffic/edit_pet/' . $id);
		}
	}
}
?>
