<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Migration_LocalizacaoReclamacao extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
            "idLocal" => array(
                    "type" => "INT",
                    "auto_increment" => TRUE
            ),
            "Cidade" => array(
                    "type" => "VARCHAR",
                    "constraint" => 200,
                    "null" => TRUE,
            ),
            "Regiao" => array(
                    "type" => "VARCHAR",
                    "constraint" => "50",
                    "null" => TRUE,
            ),
            "UF" => array(
                    "type" => "VARCHAR",
                    "constraint" => "50",
                    "null" => TRUE,
            ),
    ));
    $this->dbforge->add_key("idLocal", TRUE);
    $this->dbforge->create_table("LocalizacaoReclamacao");
  }

  public function down()
  {
    $this->dbforge->drop_table("LocalizacaoReclamacao");
  }
}
