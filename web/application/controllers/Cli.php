<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cli extends CI_Controller{

  public function __construct() {
    parent::__construct();
  }

  function index() {
    echo "Interface de linha de comando" . PHP_EOL;
  }

}
