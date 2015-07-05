<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consultas extends CI_Controller{

  private $consultas = array(
    // 0
    array(
      'nome_curto' => "Áreas",
      'nome_longo' => "Listar todas as áreas",
      'sql'        => "SELECT DISTINCT Area FROM Segmento ORDER BY Area",
      'view'       => "empty"
    ),
    // 1
    array(
      'nome_curto' => "Usuários por sexo",
      'nome_longo' => "Número de usuários por sexo",
      'sql'        => "SELECT
  Sexo,
  Count(*) AS num_reclamacoes
FROM Usuario
GROUP BY Sexo",
      'view'       => "empty"
    ),
    // 2
    array(
      'nome_curto' => "Usuários por faixa etária",
      'nome_longo' => "Número de usuários por faixa etária",
      'sql'        => "SELECT
  FaixaEtaria,
  Count(*) AS num_reclamacoes
FROM Usuario
GROUP BY FaixaEtaria
ORDER BY num_reclamacoes DESC",
      'view'       => "empty"
    ),
    // 3
    array(
      'nome_curto' => "Compras pela internet",
      'nome_longo' => "Número de reclamações de clientes que compraram pela internet",
      'sql'        => "SELECT Count(*)
FROM Reclamacao
WHERE ComoComprouContratou = \"Internet\"",
      'view'       => "empty"
    ),
    // 4
    array(
      'nome_curto' => "Forma de compra",
      'nome_longo' => "Número de reclamações por forma de compra",
      'sql'        => "SELECT
  ComoComprouContratou,
  Count(*)
FROM Reclamacao
GROUP BY ComoComprouContratou
ORDER BY Count(*) DESC",
      'view'       => "empty"
    ),
    // 5
    array(
      'nome_curto' => "Não resolvidas",
      'nome_longo' => "Listar nome das empresas com reclamações não resolvidas",
      'sql'        => "SELECT DISTINCT
  E.NomeFantasia AS NomeFantasia
FROM Reclamacao R
INNER JOIN Empresa E
  ON R.idEmpresa = E.idEmpresa
WHERE R.AvalicaoReclamacao like 'Não resolvida'",
      'view'       => "empty"
    ),
    // 6
    array(
      'nome_curto' => "Média das notas",
      'nome_longo' => "Média das notas por faixa etária",
      'sql'        => "SELECT
  U.FaixaEtaria,
  AVG(R.NotaDoConsumidor) as NotaMedia
FROM Usuario U
INNER JOIN Reclamacao R
  ON U.idUsuario = R.idUsuario
GROUP BY U.FaixaEtaria",
      'view'       => "empty"
    ),
    // 7
    array(
      'nome_curto' => "Tempo de resposta",
      'nome_longo' => "Tempo médio de resposta e nota média dos consumidores por empresa",
      'sql'        => "SELECT
  NomeFantasia,
  AVG(TempoResposta) AS tempo,
  AVG(NotaDoConsumidor) AS nota
FROM Reclamacao AS R
JOIN Empresa AS E
  ON R.idEmpresa = E.idEmpresa
GROUP BY NomeFantasia
ORDER BY tempo",
      'view'       => "empty"
    ),
    // 8
    array(
      'nome_curto' => "Telecomunicações",
      'nome_longo' => "Listar empresas de telecomunicações",
      'sql'        => "SELECT DISTINCT
  E.NomeFantasia AS NomeFantasia
FROM
  Empresa E,
  EmpresaSegmento ES,
  Segmento S
WHERE
  E.idEmpresa = ES.idEmpresa AND
  ES.CodSegmento = S.CodSegmento AND
  S.Area = 'Telecomunicações'",
      'view'       => "empty"
    ),
    // 9
    array(
      'nome_curto' => "Áreas",
      'nome_longo' => "Média das notas por área",
      'sql'        => "SELECT
  S.Area,
  AVG(R.NotaDoConsumidor) AS Nota
FROM
  Reclamacao R,
  EmpresaSegmento ES,
  Segmento S
WHERE
  R.idEmpresa = ES.idEmpresa AND
  ES.CodSegmento = S.CodSegmento
GROUP BY S.Area
ORDER BY Nota",
      'view'       => "empty"
    ),
    // 10
    array(
      'nome_curto' => "Mulheres",
      'nome_longo' => "Número de reclamações feitas por mulheres por grupo de problemas e por estado",
      'sql'        => "SELECT
  GrupoProblema,
  UF,
  Count(*)
FROM Reclamacao AS R
JOIN Problema AS P
  ON R.idProblema = P.idProblema
JOIN LocalizacaoReclamacao AS L
  ON R.idLocal = L.idLocal
JOIN Usuario AS U
  ON R.idUsuario = U.idUsuario
WHERE Sexo = 'F'
GROUP BY
  GrupoProblema,
  UF",
      'view'       => "empty"
    ),
    // 11
    array(
      'nome_curto' => "Locais",
      'nome_longo' => "Número de reclamações registradas por estado UF, Região e Cidade",
      'sql'        => "SELECT
  LR.UF AS UF,
  COUNT(*) AS num_reclamacoes
FROM
  LocalizacaoReclamacao LR,
  Reclamacao R
WHERE  R.idlocal = LR.idlocal
GROUP BY  LR.UF
ORDER BY num_reclamacoes DESC",
      'view' => "locais"
    ),
    // 12
    array(
      'nome_curto' => "Notas das empresas",
      'nome_longo' => "Média das notas por empresa",
      'sql'        => "SELECT
  E.NomeFantasia AS NomeFantasia,
  AVG(R.NotaDoConsumidor) AS Nota
FROM Reclamacao R
INNER JOIN Empresa E
  ON R.idEmpresa = E.idEmpresa
GROUP BY NomeFantasia
ORDER BY Nota DESC",
      'view'       => "empty"
    ),
  );

  public function __construct()
  {
    parent::__construct();
    $this->load->helper(array('url', 'layout', 'resultado'));
    $this->load->database();
  }

  public function exec($id)
  {
    page_start();
    if(!isset($this->consultas[$id]))
      $this->load->view('notnot');
    else
    {
      $res_data = array(
        'resultado' => $this->db->query($this->consultas[$id]['sql'])->result_array(),
        'dados' => $this->consultas[$id]
      );
      $this->load->view('consultas/exec', $res_data);

      if($id == 11) {
        $res_data['resultado_regiao'] = $this->db->query("SELECT LR.Regiao AS Regiao, COUNT(*)
          AS num_reclamacoes FROM LocalizacaoReclamacao LR, Reclamacao R
          WHERE R.idlocal = LR.idlocal GROUP BY LR.Regiao ORDER BY
          num_reclamacoes DESC")->result_array();
        $res_data['resultado_cidade'] = $this->db->query("SELECT LR.Cidade AS Cidade, COUNT(*) AS
          num_reclamacoes FROM LocalizacaoReclamacao LR, Reclamacao R WHERE
          R.idlocal = LR.idlocal GROUP BY  LR.Cidade ORDER BY num_reclamacoes
          DESC")->result_array();
      }
      $this->load->view("consultas/" . $this->consultas[$id]['view'], $res_data);
    }
    page_end();
  }

}
