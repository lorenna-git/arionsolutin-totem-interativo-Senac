<?php
$titulo="Lista de espera";
require_once "includes/header.php";
$cursoId=(int)($_GET['curso']??0);
$curso=null;
if($cursoId){$s=$pdo->prepare("SELECT id,nome,area_id FROM cursos WHERE id=? AND ativo=1");$s->execute([$cursoId]);$curso=$s->fetch();}
$areas=$pdo->query("SELECT id,nome FROM areas WHERE ativo=1 ORDER BY nome")->fetchAll();
?>
<div class="container"><div class="card form-card">
<h1>Não encontrou o curso que procura?</h1><p>Informe seus dados e entraremos em contato quando houver informação.</p>
<form action="actions/salvar-lista-espera.php" method="post">
<div class="form-grid">
<div class="form-group full"><label>Nome completo *</label><input class="form-control" name="nome" required maxlength="120"></div>
<div class="form-group"><label>CPF *</label><input class="form-control" name="cpf" data-cpf required maxlength="14"></div>
<div class="form-group"><label>Telefone *</label><input class="form-control" name="telefone" data-telefone required maxlength="15"></div>
<div class="form-group"><label>Área *</label><select class="form-control" name="area_id" required><option value="">Selecione</option><?php foreach($areas as $a): ?><option value="<?= $a['id'] ?>" <?= $curso&&$curso['area_id']==$a['id']?'selected':'' ?>><?= e($a['nome']) ?></option><?php endforeach; ?></select></div>
<div class="form-group"><label>Curso disponível</label><select class="form-control" name="curso_id"><option value="">Nenhum</option><?php
$all=$pdo->query("SELECT id,nome FROM cursos WHERE ativo=1 ORDER BY nome")->fetchAll();
foreach($all as $c): ?><option value="<?= $c['id'] ?>" <?= $cursoId==$c['id']?'selected':'' ?>><?= e($c['nome']) ?></option><?php endforeach; ?></select></div>
<div class="form-group full"><label>Curso desejado *</label><input class="form-control" name="curso_desejado" value="<?= e($curso['nome']??'') ?>" required maxlength="150"></div>
</div>
<div class="actions"><button class="btn btn-primary">Entrar na lista de espera</button><a class="btn btn-secondary" href="index.php">Cancelar</a></div>
</form></div></div>
<?php require_once "includes/footer.php"; ?>