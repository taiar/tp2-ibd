<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Migration_Problema extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
      "idProblema" => array(
        "type" => "INT",
      ),
      "GrupoProblema" => array(
        "type" => "VARCHAR",
        "constraint" => "255",
        "null" => TRUE,
      ),
      "Problema" => array(
        "type" => "VARCHAR",
        "constraint" => "255",
        "null" => TRUE,
      ),
    ));
    $this->dbforge->add_key("idProblema", TRUE);
    $this->dbforge->create_table("Problema");
  }

  public function down()
  {
    $this->dbforge->drop_table("Problema");
  }
}
