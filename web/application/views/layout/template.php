
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Trabalho de IBD / DCC / UFMG">
    <meta name="author" content="André Taiar">

    <title>Trabalho de IBD - Reclamações do Consumidor</title>

    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/dashboard.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Menu Superior</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url() ?>">Trabalho de IBD - Reclamações do Consumidor</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo site_url('paginas/dados') ?>">Dados do trabalho</a></li>
            <li><a href="<?php echo site_url('paginas/er') ?>">Modelagem ER</a></li>
            <li><a href="<?php echo site_url('paginas/grupo') ?>">O Grupo</a></li>
          </ul>

          <!-- <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form> -->

        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <!-- Início do menu lateral -->
        <div class="col-sm-3 col-md-2 sidebar">
        <h4>Consultas</h4>
          <ul class="nav nav-sidebar">
            <!-- <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li> -->
            <li><a href="#">Listar todas as áreas</a></li>
            <li><a href="#">Usuários por sexo</a></li>
            <li><a href="#">Usuários por faixa etária</a></li>
            <li><a href="#">Compras pela internet</a></li>
            <li><a href="">Forma de compra</a></li>
            <li><a href="">Não resolvidas</a></li>
            <li><a href="">Média das notas</a></li>
            <li><a href="">Tempo de resposta</a></li>
            <li><a href="">Telecomunicações</a></li>
            <li><a href="">Área</a></li>
            <li><a href="">Reclamações de mulheres</a></li>
            <li><a href="">Locais</a></li>
            <li><a href="">Notas das empresas</a></li>
          </ul>
        </div>
        <!-- Fim do menu lateral -->

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
            </div>
          </div>

          <h2 class="sub-header">Section title</h2>
        </div>
      </div>
    </div>

    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
  </body>
</html>
