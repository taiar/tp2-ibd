<h2>Estrutura das tabelas</h2>
<pre>
  LocalizacaoReclamacao(idlocal, Cidade, Região, UF)

  Usuario(idUsuario, Sexo, FaixaEtaria)

  Reclamacao(idUsuario, idEmpresa, idlocal, CodReclamacao, AnoAbertura, MesAbertura, DataAbertura, DataResposta, DataFinalizado, TempoResposta, Assunto, idProblema, ComoComprouContratou, ProcurouEmpresa, Respondida, Situacao, AvalicaoReclamacao, NotaDoConsumidor)

  Problema(idProblema, GrupoProblema, Problema)

  Empresa(idEmpresa, NomeFantasia)

  EmpresaSegmento(idEmpresa, CodSegmento)

  Segmento(CodSegmento, SegmentoDeMercado, Area)
</pre>

<h3>Executar consulta:</h3>
<form method="post">
  <textarea name="consulta" rows="12" cols="80"><?php echo (isset($consulta)) ? $this->input->post('consulta') : "" ?></textarea>
  <?php if (isset($resultado)): ?>
    <p><?php echo $this->benchmark->elapsed_time();?></p>
  <?php endif; ?>
  <br>
  <input type="submit" name="botao" value="Executar consulta">
</form>
<br>
<h4>Resultado:</h4>
<?php if (isset($resultado)): ?>
<?php echo print_resultado($resultado); ?>
<?php endif; ?>
