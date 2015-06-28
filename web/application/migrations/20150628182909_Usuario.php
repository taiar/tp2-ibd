<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Migration_Usuario extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
            "idUsuario" => array(
                    "type" => "INT",
                    "unsigned" => TRUE,
            ),
            "Sexo" => array(
                    "type" => "VARCHAR",
                    "constraint" => "100",
                    "null" => TRUE,
            ),
            "FaixaEtaria" => array(
                    "type" => "VARCHAR",
                    "constraint" => "100",
                    "null" => TRUE,
            ),
    ));
    $this->dbforge->add_key("idUsuario", TRUE);
    $this->dbforge->create_table("Usuario");
  }

  public function down()
  {
    $this->dbforge->drop_table("Usuario");
  }
}
