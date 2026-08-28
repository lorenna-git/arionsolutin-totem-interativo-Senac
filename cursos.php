<?php
$titulo="Cursos";
require_once "includes/header.php";
$areaId=(int)($_GET['area']??0);
$filtro=$_GET['filtro']??'todos';
$busca=trim($_GET['busca']??'');
$areas=$pdo->query("SELECT id,nome FROM areas WHERE ativo=1 ORDER BY nome")->fetchAll();

$sql="SELECT c.*,a.nome area_nome FROM cursos c JOIN areas a ON a.id=c.area_id WHERE c.ativo=1";
$params=[];
if($areaId){$sql.=" AND c.area_id=?";$params[]=$areaId;}
if($filtro==='gratuitos')$sql.=" AND c.gratuito=1";
if($filtro==='pagos')$sql.=" AND c.gratuito=0";
if($busca!==''){$sql.=" AND c.nome LIKE ?";$params[]="%{$busca}%";}
$sql.=" ORDER BY c.nome";
$stmt=$pdo->prepare($sql);$stmt->execute($params);$cursos=$stmt->fetchAll();
?>
<div class="container">
<h1 class="section-title">Encontre seu curso</h1>
<div class="toolbar">
    <form method="get" style="display:flex;gap:10px;flex:1;min-width:280px">
        <?php if($areaId): ?><input type="hidden" name="area" value="<?= $areaId ?>"><?php endif; ?>
        <input class="form-control" name="busca" value="<?= e($busca) ?>" placeholder="🔎 Digite o nome do curso" aria-label="Pesquisar curso">
        <button class="btn btn-primary">Pesquisar</button>
    </form>
    <a class="btn <?= $filtro==='todos'?'btn-primary':'btn-secondary' ?>" href="cursos.php<?= $areaId?'?area='.$areaId:'' ?>">Todos</a>
    <a class="btn <?= $filtro==='gratuitos'?'btn-primary':'btn-secondary' ?>" href="cursos.php?filtro=gratuitos<?= $areaId?'&area='.$areaId:'' ?>">Gratuitos</a>
    <a class="btn <?= $filtro==='pagos'?'btn-primary':'btn-secondary' ?>" href="cursos.php?filtro=pagos<?= $areaId?'&area='.$areaId:'' ?>">Pagos</a>
</div>
<div class="toolbar">
<?php foreach($areas as $area): ?><a class="badge" href="cursos.php?area=<?= $area['id'] ?>"><?= e($area['nome']) ?></a><?php endforeach; ?>
</div>
<div class="grid">
<?php foreach($cursos as $curso): ?>
<article class="card course-card">
    <span class="badge"><?= e($curso['area_nome']) ?></span>
    <h2><?= e($curso['nome']) ?></h2>
    <div class="meta">
        <span class="badge"><?= e($curso['carga_horaria'] ?: 'Consultar Senac PR') ?><?= $curso['carga_horaria']?' horas':'' ?></span>
        <span class="badge <?= $curso['gratuito']?'free':'' ?>"><?= moeda($curso['valor'],$curso['gratuito']) ?></span>
    </div>
    <p><strong>Modalidade:</strong> <?= e($curso['modalidade'] ?: 'Consultar Senac PR') ?></p>
    <p><strong>Cidade:</strong> <?= e($curso['cidade'] ?: 'Consultar Senac PR') ?></p>
    <p><strong>Início:</strong> <?= dataBR($curso['data_inicio']) ?></p>
    <div class="card-footer"><a class="btn btn-primary" href="detalhes-curso.php?id=<?= $curso['id'] ?>">Ver detalhes</a></div>
</article>
<?php endforeach; ?>
</div>
<?php if(!$cursos): ?><div class="card" style="margin-top:20px">Nenhum curso encontrado com os filtros informados.</div><?php endif; ?>
</div>
<?php require_once "includes/footer.php"; ?>