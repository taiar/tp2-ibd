<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $this->load->view('layout/header');
    $this->load->view('layout/footer');
  }

  function praticando()
  {
    $this->load->view('praticando/praticando');
  }

}