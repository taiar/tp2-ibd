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
}
