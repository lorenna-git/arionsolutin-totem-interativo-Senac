<?php
$titulo = "Início";
require_once "includes/header.php";
?>
<section class="container totem-home">
    <div class="welcome">
        <div class="hero">
            <span>ARIONSOLUTTION</span>
            <h1>Olá! 👋</h1>
            <p>Encontre o curso ideal para você de forma rápida, simples e acessível.</p>
            <div class="hero-actions">
                <a class="btn btn-primary" href="cursos.php"><i class="bi bi-search"></i> Consultar cursos</a>
                <a class="btn btn-secondary" href="cursos.php"><i class="bi bi-funnel"></i> Pesquisar curso</a>
            </div>
        </div>
        <div class="quick-grid">
            <a class="quick-card" href="cursos.php"><i class="bi bi-mortarboard"></i><strong>Consultar cursos</strong><span>Veja áreas e turmas disponíveis.</span></a>
            <a class="quick-card" href="lista-espera.php"><i class="bi bi-hourglass-split"></i><strong>Lista de espera</strong><span>Informe o curso que procura.</span></a>
            <a class="quick-card" href="cursos.php?filtro=gratuitos"><i class="bi bi-gift"></i><strong>Cursos gratuitos</strong><span>Confira opções PSG.</span></a>
            <a class="quick-card" href="atendimento.php?tipo=INFORMACAO"><i class="bi bi-person-raised-hand"></i><strong>Preciso de ajuda</strong><span>Registre um atendimento.</span></a>
        </div>
    </div>
    <div class="card" style="margin-top:25px;text-align:center">
        <strong>Autoatendimento</strong><br>
        Use a tela para navegar. Seus dados são enviados ao banco de dados somente quando você confirmar um atendimento.
    </div>
</section>
<?php require_once "includes/footer.php"; ?>