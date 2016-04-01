<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once (dirname(__FILE__) . "/yelp.php");

class Parks extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('Query');
    $this->load->helper('globals');
  }
  public function index($park_id) {
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
