<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Migration_Reclamacao extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
            "CodReclamacao" => array(
                    "type" => "INT",
            ),
            "idUsuario" => array(
                    "type" => "INT",
                    "null" => TRUE,
            ),
            "idEmpresa" => array(
                    "type" => "INT",
                    "null" => TRUE,
            ),
            "idLocal" => array(
                    "type" => "INT",
                    "null" => TRUE,
            ),
            "idProblema" => array(
                    "type" => "INT",
                    "null" => TRUE,
            ),
            "AnoAbertura" => array(
                    "type" => "INT",
                    "null" => TRUE,
            ),
            "MesAbertura" => array(
                    "type" => "INT",
                    "null" => TRUE,
            ),
            "DataAbertura" => array(
                    "type" => "date",
                    "null" => TRUE,
            ),
            "DataResposta" => array(
                    "type" => "date",
                    "null" => TRUE,
            ),
            "DataFInalizado" => array(
                    "type" => "date",
                    "null" => TRUE,
            ),
            "TempoResposta" => array(
                    "type" => "INT",
                    "null" => TRUE,
            ),
            "Assunto" => array(
                    "type" => "VARCHAR",
                    "constraint" => "255",
                    "null" => TRUE,
            ),
            "ComoComprouContratou" => array(
                    "type" => "VARCHAR",
                    "constraint" => "255",
                    "null" => TRUE,
            ),
            "ProcurouEmpresa" => array(
                    "type" => "VARCHAR",
                    "constraint" => "5",
                    "null" => TRUE,
            ),
            "Respondida" => array(
                    "type" => "VARCHAR",
                    "constraint" => "5",
                    "null" => TRUE,
            ),
            "Situacao" => array(
                    "type" => "VARCHAR",
                    "constraint" => "255",
                    "null" => TRUE,
            ),
            "AvalicaoReclamacao" => array(
                    "type" => "VARCHAR",
                    "constraint" => "255",
                    "null" => TRUE,
            ),
            "NotaDoConsumidor" => array(
                    "type" => "INT",
                    "null" => TRUE,
            ),
    ));
    $this->dbforge->add_key("CodReclamacao", TRUE);
    $this->dbforge->create_table("Reclamacao");
  }

  public function down()
  {
    $this->dbforge->drop_table("Reclamacao");
  }
}
