# ArionSoluttion — Totem Interativo

Projeto acadêmico de Totem Interativo para Central de Matrículas, desenvolvido por Rodrigo Schebeleski e Lorena do Nascimento.

## Tecnologias
- PHP 8+
- MySQL
- PDO
- HTML5
- CSS3
- JavaScript puro
- XAMPP / Apache / phpMyAdmin

## Instalação

1. Instale e abra o XAMPP.
2. Inicie Apache e MySQL.
3. Copie esta pasta para `C:\xampp\htdocs\arionsoluttion`.
4. Acesse `http://localhost/phpmyadmin`.
5. Importe `banco/arionsoluttion.sql`.
6. Abra `http://localhost/arionsoluttion/`.

## Banco
O projeto usa:
- banco: `arionsoluttion_totem`
- usuário padrão XAMPP: `root`
- senha: vazia

Se o seu MySQL possuir senha, altere somente `config/conexao.php`.

## Logo
O projeto não cria nem modifica o logotipo oficial do Senac. O cabeçalho usa um marcador `S` como espaço reservado. Para apresentação, substitua por uma imagem oficial autorizada.

## Dados dos cursos
O arquivo enviado para desenvolvimento lista os nomes dos cursos e identifica os cursos PSG. Como não foram fornecidos valores, datas, horários, modalidades e cidades no material recebido, esses campos ficam como `Consultar Senac PR`, conforme solicitado.

## Funcionalidades
- Tela inicial para Totem
- Áreas vindas do MySQL
- Pesquisa e filtros de cursos
- Detalhes de cursos
- Registro de interesse
- Lista de espera
- Protocolo gerado no PHP
- Dashboard administrativo
- CRUD de cursos
- Cadastro/edição de áreas
- Consulta de atendimentos
- Acessibilidade
- Relógio
- Timeout de inatividade
- Máscaras de CPF e telefone
- PDO e prepared statements
