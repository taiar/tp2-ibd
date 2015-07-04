<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper(array('url'));
  }

  function index()
  {
    $this->load->view('layout/template');
  }

  function praticando() {
    include_once(APPPATH . "libraries/Encoding.php");
    $dados = array();
    $this->load->view('layout/header');
    $this->load->view('layout/menu_superior');
    $this->load->view('layout/init_body');
    $this->load->view('layout/menu_lateral');
    $this->load->view('layout/init_yield');

    if($this->input->post('consulta')) {
      $this->load->database();
      $this->load->helper(array('resultado'));
      $q = $this->db->query($this->input->post('consulta'))->result_array();

      foreach ($q as $key => $value) {
        foreach ($value as $chave => $valor) {
          $q[$key][$chave] = \ForceUTF8\Encoding::fixUTF8($valor);
        }
      }

      $dados['resultado'] = $q;
      $dados['consulta'] = $this->input->post('consulta');
    }
    $this->load->view('praticando/praticando', $dados);
    $this->load->view('layout/end_yield');
    $this->load->view('layout/end_body');
    $this->load->view('layout/footer');
  }

}
