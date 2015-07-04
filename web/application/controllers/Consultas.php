<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consultas extends CI_Controller{

  private $consultas = array(
    array(
      'nome_curto' => "Áreas",
      'nome_longo' => "Listar todas as áreas",
      'sql'        => "SELECT DISTINCT Area FROM Segmento ORDER BY Area",
      'view'       => "areas"
    ),
    array(
      'nome_curto' => "Usuários por sexo",
      'nome_longo' => "Número de usuários por sexo",
      'sql'        => "SELECT Sexo, Count(*) AS num_reclamacoes FROM Usuario
        GROUP BY Sexo",
      'view'       => "sexo"
    ),
    array(
      'nome_curto' => "Usuários por faixa etária",
      'nome_longo' => "Número de usuários por faixa etária",
      'sql'        => "SELECT FaixaEtaria, Count(*) AS num_reclamacoes FROM
        Usuario BY FaixaEtaria  BY num_reclamacoes DESC",
      'view'       => "usuarios_etaria"
    ),
  );

  public function __construct()
  {
    parent::__construct();
    $this->load->helper(array('url', 'layout'));
    $this->load->database();
  }

  public function exec($id)
  {
    page_start();
    if(!isset($this->consultas[$id]))
      $this->load->view('notnot');
    else
    {
      $this->load->view("consultas/" . $this->consultas[$id]['view'], array(
        'resultado' => $this->db->query($this->consultas[$id]['sql'])->result_array(),
        'dados' => $this->consultas[$id]
      ));
    }
    page_end();
  }

}
