<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Migration_EmpresaSegmento extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
            "idEmpresa" => array(
                    "type" => "INT",
            ),
            "CodSegmento" => array(
                    "type" => "INT",
            ),
    ));
    $this->dbforge->add_key(array("idEmpresa", "CodSegmento"), TRUE);
    $this->dbforge->create_table("EmpresaSegmento");
  }

  public function down()
  {
    $this->dbforge->drop_table("EmpresaSegmento");
  }
}
