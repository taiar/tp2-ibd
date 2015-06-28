<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cli extends CI_Controller{

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    echo "Interface de linha de comando" . PHP_EOL;
  }

  public function add_migration($name) {
    echo "Adicionando nova migration" . PHP_EOL;

    $nome_arquivo = date('YmdHis') . "_" . $name . ".php";

    $f = fopen(APPPATH . "migrations/" . $nome_arquivo, "w");

    fwrite($f, '<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Migration_ extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
            "blog_id" => array(
                    "type" => "INT",
                    "constraint" => 5,
                    "unsigned" => TRUE,
                    "auto_increment" => TRUE
            ),
            "blog_title" => array(
                    "type" => "VARCHAR",
                    "constraint" => "100",
            ),
            "blog_description" => array(
                    "type" => "TEXT",
                    "null" => TRUE,
            ),
    ));
    $this->dbforge->add_key("blog_id", TRUE);
    $this->dbforge->create_table("blog");
  }

  public function down()
  {
    $this->dbforge->drop_table("blog");
  }
}');
    fclose($f);

    echo "Arquivo " . $nome_arquivo . " criado." . PHP_EOL;
  }

  public function migrate()
  {
    $this->load->library('migration');
    $this->migration->current();
  }

  public function importar_dados() {
    $arquivos = array(
      "2014-05.csv",
      "2014-06.csv",
      "2014-07.csv",
      "2014-08.csv",
      "2014-09.csv",
      "2014-10.csv",
      "2014-11.csv",
      "2014-12.csv",
      "2015-01.csv",
    );

    $this->load->database();

    $LocalizacaoReclamacao = array();
    $Problema = array();
    $Empresa = array();
    $Segmento = array();
    $EmpresaSegmento = array();

    foreach ($arquivos as $arquivo) {
      $linhas = file(dirname(dirname(dirname(dirname(__FILE__)))) . "/dados/" . $arquivo);
      foreach ($linhas as $linha) {
        $linha = utf8_encode($linha);
        $d = explode(";", $linha);

        $id_LocalizacaoReclamacao = 0;
        $id_Problema = 0;
        $id_Empresa = 0;
        $id_Segmento = 0;
        $id_Usuario = 0;

        // Localização da reclamação
        $chave = $d[0].$d[1].$d[2];
        if(isset($LocalizacaoReclamacao[$chave])) {
          $id_LocalizacaoReclamacao = $LocalizacaoReclamacao[$chave];
        } else {
          $this->db->insert('LocalizacaoReclamacao', array(
            "Cidade" => $d[2],
            "Regiao" => $d[0],
            "UF"     => $d[1],
          ));
          $id_LocalizacaoReclamacao = $this->db->insert_id();
          $LocalizacaoReclamacao[$chave] = $id_LocalizacaoReclamacao;
        }

        // Problema
        $chave = $d[15].$d[16];
        if(isset($Problema[$chave])) {
          $id_Problema = $Problema[$chave];
        } else {
          $this->db->insert('Problema', array(
            "GrupoProblema" => $d[15],
            "Problema"      => $d[16]
          ));
          $id_Problema = $this->db->insert_id();
          $Problema[$chave] = $id_Problema;
        }

        // Empresa
        $chave = $d[11];
        if(isset($Empresa[$chave])) {
          $id_Empresa = $Empresa[$chave];
        } else {
          $this->db->insert('Problema', array(
            "NomeFantasia" => $d[11],
          ));
          $id_Empresa = $this->db->insert_id();
          $Empresa[$chave] = $id_Empresa;
        }

        // Segmento
        $chave = $d[12].$d[13];
        if(isset($Segmento[$chave])) {
          $id_Segmento = $Segmento[$chave];
        } else {
          $this->db->insert('Segmento', array(
            "SegmentoDeMercado" => $d[12],
            "Area"              => $d[13]
          ));
          $id_Segmento = $this->db->insert_id();
          $Segmento[$chave] = $id_Segmento;
        }

        // EmpresaSegmento
        $chave = $id_Empresa . $id_Segmento;
        if(!$EmpresaSegmento[$chave]) {
          $this->db->insert('EmpresaSegmento', array(
            "idEmpresa"   => $id_Empresa,
            "CodSegmento" => $id_Segmento,
          ));
          $EmpresaSegmento[$chave] = true;
        }

        // Usuario
        $this->db->insert('Usuario', array(
          "Sexo" => $d[3],
          "FaixaEtaria" => $d[4]
        ));
        $id_Usuario = $this->db->insert_id();

        $DataAbertura = date_create_from_format("d/m/Y", $d[7]);
        $DataResposta = date_create_from_format("d/m/Y", $d[8]);
        $DataFInalizado = date_create_from_format("d/m/Y", $d[9]);

        // Reclamacao
        $this->db->insert('Reclamacao', array(
          "idUsuario"              => $id_Usuario,
          "idEmpresa"              => $id_Empresa,
          "idLocal"                => $id_LocalizacaoReclamacao,
          "idProblema"             => $id_Problema,
          "AnoAbertura"            => $d[5],
          "MesAbertura"            => $d[6],
          "DataAbertura"           => $DataAbertura->format("Y-m-d"),
          "DataResposta"           => $DataResposta->format("Y-m-d"),
          "DataFinalizado"         => $DataFinalizado->format("Y-m-d"),
          "TempoResposta"          => $d[10],
          "Assunto"                => $d[14],
          "ComoComprouContratou"   => $d[17],
          "ProcurouEmpresa"        => $d[18],
          "Respondida"             => $d[19],
          "Situacao"               => $d[20],
          "AvalicaoReclamacao"     => $d[21],
          "NotaDoConsumidor"       => $d[22],
        ));
      }
    }
  }
}
