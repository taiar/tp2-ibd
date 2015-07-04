<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paginas extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper(array('url', 'layout'));
  }

  public function index()
  {
    redirect(base_url('paginas/sobre'));
  }

  public function er()
  {
    page_start();
    $this->load->view('paginas/er');
    page_end();
  }

  public function sobre()
  {
    page_start();
    $this->load->view('paginas/dados');
    page_end();
  }

  public function grupo()
  {
    page_start();
    $this->load->view('paginas/grupo');
    page_end();
  }

}
