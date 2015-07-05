<h1 class="sub-header">Região</h1>

<pre><code class="sql">SELECT
  LR.Regiao AS Regiao,
  COUNT(*) AS num_reclamacoes
FROM
  LocalizacaoReclamacao LR,
  Reclamacao R
WHERE R.idlocal = LR.idlocal
GROUP BY LR.Regiao
ORDER BY num_reclamacoes DESC</code></pre>

<h2 class="sub-header">Resultado</h2>

<?php print_resultado($resultado_regiao); ?>

<h1 class="sub-header">Cidade</h1>

<pre><code class="sql">SELECT
  LR.Cidade AS Cidade,
  COUNT(*) AS num_reclamacoes
FROM
  LocalizacaoReclamacao LR,
  Reclamacao R
WHERE R.idlocal = LR.idlocal
GROUP BY  LR.Cidade
ORDER BY num_reclamacoes DESC</code></pre>

<h2 class="sub-header">Resultado</h2>

<?php print_resultado($resultado_cidade); ?>
