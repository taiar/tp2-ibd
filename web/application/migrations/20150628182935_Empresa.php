<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Migration_Empresa extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
            "idEmpresa" => array(
                    "type" => "INT",
                    "auto_increment" => TRUE
            ),
            "NomeFantasia" => array(
                    "type" => "VARCHAR",
                    "constraint" => "100",
            ),
    ));
    $this->dbforge->add_key("idEmpresa", TRUE);
    $this->dbforge->create_table("Empresa");
  }

  public function down()
  {
    $this->dbforge->drop_table("Empresa");
  }
}
