<?php
$titulo = "Demonstrar interesse";
require_once "includes/header.php";
$cursoId = (int)($_GET['curso'] ?? 0);
$tipo = $_GET['tipo'] ?? 'INTERESSE';
$curso = null;
if ($cursoId) {
    $s = $pdo->prepare("SELECT id,nome,area_id FROM cursos WHERE id=? AND ativo=1");
    $s->execute([$cursoId]);
    $curso = $s->fetch();
}
$areas = $pdo->query("SELECT id,nome FROM areas WHERE ativo=1 ORDER BY nome")->fetchAll();
?>
<div class="container">
    <div class="card form-card">
        <h1><?= $tipo === 'INFORMACAO' ? 'Preciso de ajuda' : 'Tenho interesse em um curso' ?></h1>
        <p>Preencha seus dados para registrar o atendimento e gerar seu protocolo.</p>
        <form action="actions/salvar-atendimento.php" method="post" novalidate>
            <input type="hidden" name="tipo_atendimento" value="<?= e($tipo) ?>">
            <div class="form-grid">
                <div class="form-group full"><label for="nome">Nome completo *</label><input class="form-control" id="nome" name="nome" required maxlength="120"></div>
                <div class="form-group"><label for="cpf">CPF *</label><input class="form-control" id="cpf" name="cpf" data-cpf required maxlength="14" inputmode="numeric"></div>
                <div class="form-group"><label for="telefone">Telefone *</label><input class="form-control" id="telefone" name="telefone" data-telefone required maxlength="15" inputmode="tel"></div>
                <div class="form-group"><label for="area_id">Área *</label><select class="form-control" id="area_id" name="area_id" required>
                        <option value="">Selecione</option><?php foreach ($areas as $a): ?><option value="<?= $a['id'] ?>" <?= ($curso && $curso['area_id'] == $a['id']) ? 'selected' : '' ?>><?= e($a['nome']) ?></option><?php endforeach; ?>
                    </select></div>
                <div class="form-group"><label for="curso_id">Curso</label><select class="form-control" id="curso_id" name="curso_id">
                        <option value="">Selecione</option><?php
                                                            $all = $pdo->query("SELECT id,nome,area_id FROM cursos WHERE ativo=1 ORDER BY nome")->fetchAll();
                                                            foreach ($all as $c): ?><option value="<?= $c['id'] ?>" data-area="<?= $c['area_id'] ?>" <?= $cursoId == $c['id'] ? 'selected' : '' ?>><?= e($c['nome']) ?></option><?php endforeach; ?>
                    </select></div>
                <div class="form-group full"><label for="curso_desejado">Curso desejado (se não encontrou)</label><input class="form-control" id="curso_desejado" name="curso_desejado" maxlength="150"></div>
            </div>
            <div class="actions"><button class="btn btn-primary" type="submit">Confirmar atendimento</button><a class="btn btn-secondary" href="cursos.php">Cancelar</a></div>
        </form>
    </div>
</div>
<?php require_once "includes/footer.php"; ?>