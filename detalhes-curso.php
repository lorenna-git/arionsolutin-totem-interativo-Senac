<?php
$titulo="Detalhes do curso";
require_once "includes/header.php";
$id=(int)($_GET['id']??0);
$stmt=$pdo->prepare("SELECT c.*,a.nome area_nome FROM cursos c JOIN areas a ON a.id=c.area_id WHERE c.id=? AND c.ativo=1");
$stmt->execute([$id]);$curso=$stmt->fetch();
?>
<div class="container">
<?php if(!$curso): ?>
<div class="card"><h1>Curso não encontrado</h1><a class="btn btn-primary" href="cursos.php">Voltar aos cursos</a></div>
<?php else: ?>
<div class="details">
<section class="card">
<span class="badge"><?= e($curso['area_nome']) ?></span>
<h1><?= e($curso['nome']) ?></h1>
<p><?= nl2br(e($curso['descricao'] ?: 'Consultar Senac PR')) ?></p>
<div class="detail-list">
<div class="detail-item"><strong>Carga horária</strong><?= e($curso['carga_horaria'] ?: 'Consultar Senac PR') ?><?= $curso['carga_horaria']?' horas':'' ?></div>
<div class="detail-item"><strong>Valor</strong><?= moeda($curso['valor'],$curso['gratuito']) ?></div>
<div class="detail-item"><strong>Início</strong><?= dataBR($curso['data_inicio']) ?></div>
<div class="detail-item"><strong>Término</strong><?= dataBR($curso['data_fim']) ?></div>
<div class="detail-item"><strong>Horário</strong><?= e($curso['horario'] ?: 'Consultar Senac PR') ?></div>
<div class="detail-item"><strong>Dias</strong><?= e($curso['dias_semana'] ?: 'Consultar Senac PR') ?></div>
<div class="detail-item"><strong>Modalidade</strong><?= e($curso['modalidade'] ?: 'Consultar Senac PR') ?></div>
<div class="detail-item"><strong>Cidade</strong><?= e($curso['cidade'] ?: 'Consultar Senac PR') ?></div>
<div class="detail-item"><strong>Pagamento</strong><?= e($curso['forma_pagamento'] ?: 'Consultar Senac PR') ?></div>
</div>
<div class="actions">
<a class="btn btn-primary" href="atendimento.php?curso=<?= $curso['id'] ?>&tipo=INTERESSE">Tenho interesse</a>
<a class="btn btn-secondary" href="lista-espera.php?curso=<?= $curso['id'] ?>">Entrar na lista de espera</a>
<a class="btn btn-secondary" href="cursos.php">Voltar</a>
</div>
</section>
<aside class="card"><h2>Precisa de ajuda?</h2><p>Registre seu interesse ou informe um curso desejado para a lista de espera.</p><a class="btn btn-success" href="atendimento.php?tipo=INFORMACAO">Preciso de ajuda</a></aside>
</div>
<?php endif; ?>
</div>
<?php require_once "includes/footer.php"; ?>