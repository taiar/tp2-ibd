<h2>Estrutura das tabelas</h2>
<pre>
  LocalizacaoReclamacao(idlocal, Cidade, Região, UF)

  Usuario(idUsuario, Sexo, FaixaEtaria)

  Reclamacao(idUsuario, idEmpresa, idlocal, CodReclamacao, AnoAbertura, MesAbertura, DataAbertura, DataResposta, DataFInalizado, TempoResposta, Assunto, idProblema, ComoComprouContratou, ProcurouEmpresa, Respondida, Situacao, AvalicaoReclamacao, NotaDoConsumidor)

  Problema(idProblema, GrupoProblema, Problema)

  Empresa(idEmpresa, NomeFantasia)

  EmpresaSegmento(idEmpresa, CodSegmento)

  Segmento(CodSegmento, SegmentoDeMercado, Area)
</pre>

<h3>Executar consulta:</h3>
<textarea name="consulta" rows="12" cols="80"></textarea>
<br>
<input type="submit" name="name" value="Executar consulta">

<h4>Resultado:</h4>
