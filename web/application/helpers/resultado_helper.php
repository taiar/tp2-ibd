<?php

  function print_resultado($array) {
    $n = count($array);

    $cabecalho = array();
    foreach ($array[0] as $chave => $value)
      $cabecalho[] = $chave;

    echo '<table class="table table-striped">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>';
    echo implode("</th><th>", $cabecalho);
    echo '</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($array as $linha) {
      echo '<tr>';
      foreach ($linha as $coluna => $valor) {
        echo '<td>';
        echo $valor;
        echo '</td>';
      }
      echo '</tr>';
    }
    echo '</tbody>';
    echo '';
    echo '';
  }
