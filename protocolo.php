<?php
$titulo="Protocolo";
require_once "includes/header.php";
$protocolo=$_SESSION['protocolo']??'';
unset($_SESSION['protocolo']);
?>
<div class="container">
<div class="card" style="max-width:700px;margin:auto;text-align:center">
<i class="bi bi-check-circle big-icon" style="color:var(--cor-sucesso)"></i>
<h1>Atendimento realizado!</h1>
<p>Seu protocolo:</p>
<div class="protocol"><?= e($protocolo ?: 'Consulte o atendimento com a equipe') ?></div>
<p>Guarde este número para acompanhamento.</p>
<a class="btn btn-primary" href="index.php">Voltar ao início</a>
</div></div>
<?php require_once "includes/footer.php"; ?>