<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Migration_Segmento extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
            "CodSegmento" => array(
                    "type" => "INT",
                    "auto_increment" => TRUE
            ),
            "SegmentoDeMercado" => array(
                    "type" => "VARCHAR",
                    "constraint" => "255",
            ),
            "Area" => array(
                    "type" => "VARCHAR",
                    "constraint" => "255",
            ),
    ));
    $this->dbforge->add_key("CodSegmento", TRUE);
    $this->dbforge->create_table("Segmento");
  }

  public function down()
  {
    $this->dbforge->drop_table("Segmento");
  }
}
