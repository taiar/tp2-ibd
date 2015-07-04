<?php

  function page_start() {
    $ci = &get_instance();
    $ci->load->view('layout/header');
    $ci->load->view('layout/menu_superior');
    $ci->load->view('layout/init_body');
    $ci->load->view('layout/menu_lateral');
    $ci->load->view('layout/init_yield');
  }

  function page_end() {
    $ci = &get_instance();
    $ci->load->view('layout/end_yield');
    $ci->load->view('layout/end_body');
    $ci->load->view('layout/footer');
  }
