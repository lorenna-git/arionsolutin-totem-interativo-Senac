# arionsolutin-totem-interativo-Senac
🖥️ **ArionSoluttion — Totem Interativo Senac Maringá**  Sistema web desenvolvido em **PHP, MySQL e PDO** para um totem interativo de autoatendimento, permitindo consultar cursos do **Senac Maringá**, visualizar informações como carga horária, valores, datas e horários, além de registrar o interesse dos usuários nos cursos.
# 🖥️ ArionSoluttion — Totem Interativo Senac Maringá

Sistema web desenvolvido para funcionar como um **Totem Interativo de Autoatendimento**, permitindo que usuários consultem cursos disponíveis no **Senac Maringá**, visualizem informações das turmas e demonstrem interesse em um curso.

O projeto foi desenvolvido utilizando **PHP, MySQL e PDO**, com interface responsiva e estrutura preparada para execução através do XAMPP.

---

## 📚 Sobre o Projeto

O **ArionSoluttion** tem como objetivo facilitar o acesso às informações dos cursos oferecidos pelo Senac Maringá através de uma interface simples e intuitiva.

O usuário pode navegar pelas áreas de atuação, consultar os cursos e visualizar informações como:

* 📚 Nome do curso
* 📝 Descrição
* ⏱️ Carga horária
* 💰 Valor
* 📅 Data de início
* 📅 Data de término
* 🕐 Horário
* 📆 Dias da semana
* 📍 Unidade/cidade
* 💻 Modalidade
* 💳 Formas de pagamento
* 🎓 Indicação de curso gratuito/PSG

Quando uma informação de uma turma não está disponível, o sistema pode apresentar **"Consultar Senac PR"** ou **"Turma a confirmar no Senac PR"**, evitando o cadastro de informações não confirmadas.

---

# 🚀 Funcionalidades

## 👤 Área do Usuário

### Página inicial

* Apresentação do sistema
* Logo do Senac
* Navegação pelas áreas de cursos
* Interface adaptada para utilização em totem

### Áreas de cursos

O usuário pode selecionar uma área e visualizar os cursos relacionados.

Exemplos:

* Artes
* Beleza
* Comércio
* Comunicação
* Gastronomia
* Gestão
* Saúde
* Tecnologia da Informação
* Outras áreas cadastradas no banco

### Consulta de cursos

Cada curso pode apresentar:

```text
Nome
Descrição
Carga horária
Valor
Data de início
Data de término
Horário
Dias da semana
Modalidade
Cidade
Forma de pagamento
```

### Interesse em curso

O usuário pode demonstrar interesse em um curso informando:

* Nome
* CPF
* Telefone
* Área
* Curso desejado

Após o cadastro, o sistema gera um **protocolo de atendimento**.

---

# 🛠️ Tecnologias utilizadas

## Backend

* PHP
* PDO
* MySQL

## Frontend

* HTML5
* CSS3
* JavaScript

## Banco de dados

* MySQL
* MySQL Workbench

## Ambiente

* XAMPP
* Apache

---

# 🗄️ Banco de Dados

O projeto utiliza o banco:

```text
arionsoluttion_totem
```

Principais tabelas:

```text
areas
cursos
atendimentos
```

### Tabela `areas`

Armazena as áreas de atuação dos cursos.

Principais campos:

```text
id
nome
descricao
ativo
```

### Tabela `cursos`

Armazena os cursos e informações das respectivas turmas.

Principais campos:

```text
id
area_id
nome
descricao
carga_horaria
valor
gratuito
data_inicio
data_fim
horario
dias_semana
modalidade
cidade
forma_pagamento
ativo
```

### Tabela `atendimentos`

Armazena os interesses registrados pelos usuários.

Principais campos:

```text
id
protocolo
nome
cpf
telefone
area_id
curso_id
curso_desejado
tipo_atendimento
created_at
```

---

# 🔌 Configuração do Banco

Neste projeto, o **MySQL Server utilizado pelo MySQL Workbench está configurado na porta 3307**.

Portanto, a conexão PDO utiliza:

```text
Host: localhost
Porta: 3307
Banco: arionsoluttion_totem
Usuário: root
```

No arquivo:

```text
config/conexao.php
```

a conexão deve estar configurada de acordo com o seu MySQL Server.

Exemplo:

```php
<?php

$host = "localhost";
$porta = "3307";
$banco = "arionsoluttion_totem";
$usuario = "root";
$senha = "";

try {

    $pdo = new PDO(
        "mysql:host=$host;port=$porta;dbname=$banco;charset=utf8mb4",
        $usuario,
        $senha
    );

    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

    $pdo->setAttribute(
        PDO::ATTR_DEFAULT_FETCH_MODE,
        PDO::FETCH_ASSOC
    );

    $pdo->setAttribute(
        PDO::ATTR_EMULATE_PREPARES,
        false
    );

} catch (PDOException $e) {

    die("Não foi possível conectar ao banco de dados.");

}
```

> ⚠️ Se o usuário `root` possuir senha, informe a senha correta na variável `$senha`.

---

# 💻 Como executar o projeto

## 1. Instalar o XAMPP

Instale o XAMPP e certifique-se de que o **Apache** esteja disponível.

## 2. Colocar o projeto no `htdocs`

Extraia o projeto para:

```text
C:\xampp\htdocs\
```

Exemplo:

```text
C:\xampp\htdocs\arionsoluttion\
```

---

## 3. Iniciar o Apache

Abra o XAMPP Control Panel e inicie:

```text
Apache
```

### ⚠️ Sobre o MySQL

O projeto utiliza o **MySQL Server na porta 3307**.

Portanto, se o seu MySQL Server estiver sendo executado separadamente do XAMPP, **não é necessário iniciar o MySQL do XAMPP na porta 3306**.

A estrutura fica:

```text
XAMPP
│
└── Apache
      │
      └── PHP
           │
           └── PDO
                │
                ↓
          MySQL Server :3307
                │
                └── arionsoluttion_totem
```

---

# 📥 Importando o Banco

O banco de dados está disponível na pasta:

```text
banco/
```

Procure pelo arquivo:

```text
arionsoluttion.sql
```

Abra o **MySQL Workbench**, conecte-se ao seu servidor na porta:

```text
3307
```

Depois execute o arquivo SQL.

O script cria:

```text
arionsoluttion_totem
```

e suas respectivas tabelas.

---

# 🌐 Abrindo o sistema

Depois de iniciar o Apache, abra no navegador:

```text
http://localhost/arionsoluttion/
```

Caso a pasta tenha outro nome, substitua pelo nome utilizado dentro do `htdocs`.

Exemplo:

```text
http://localhost/nome-do-projeto/
```

---

# 🎨 CSS

Os arquivos de estilo ficam na pasta:

```text
css/
```

Exemplo:

```text
css/
├── style.css
├── totem.css
└── admin.css
```

O projeto utiliza caminhos compatíveis com execução através do Apache/XAMPP.

Se o CSS não aparecer, teste diretamente:

```text
http://localhost/arionsoluttion/css/style.css
```

---

# 🖼️ Logo

A logo utilizada pelo projeto fica na pasta:

```text
img/
```

Exemplo:

```text
img/
└── logo-senac.svg
```

A logo é apresentada no cabeçalho do sistema.

---

# 📁 Estrutura do Projeto

```text
arionsoluttion/
│
├── admin/
│   ├── index.php
│   ├── cursos.php
│   └── ...
│
├── banco/
│   └── arionsoluttion.sql
│
├── config/
│   └── conexao.php
│
├── css/
│   ├── style.css
│   ├── totem.css
│   └── admin.css
│
├── img/
│   └── logo-senac.svg
│
├── js/
│   └── script.js
│
├── index.php
├── cursos.php
├── detalhes-curso.php
├── atendimento.php
├── protocolo.php
└── README.md
```

---

# 🔐 Segurança

O projeto utiliza **PDO com Prepared Statements** para operações com o banco de dados.

Exemplo:

```php
$stmt = $pdo->prepare(
    "SELECT * FROM cursos WHERE id = ?"
);

$stmt->execute([$id]);
```

Também são utilizados recursos como:

* `htmlspecialchars()`
* validação de dados
* prepared statements
* controle de sessão
* separação da configuração do banco

---

# 📅 Informações dos Cursos

As informações de cursos e turmas são organizadas para a unidade de **Maringá**.

Os campos de data, horário, dias e valores devem representar informações confirmadas pelo Senac Paraná.

Quando uma turma não possuir determinada informação confirmada, o sistema não deve inventar dados.

---

# 🎯 Objetivo Acadêmico

O projeto foi desenvolvido como uma aplicação prática envolvendo:

* Desenvolvimento Web
* PHP
* Banco de Dados
* MySQL
* PDO
* HTML
* CSS
* JavaScript
* CRUD
* Formulários
* Consultas SQL
* Responsividade
* Interface de autoatendimento

---

# 👨‍💻 Projeto

**ArionSoluttion — Totem Interativo Senac Maringá**

Sistema desenvolvido para consulta e demonstração de interesse em cursos do Senac Maringá.

---

## 📄 Licença

Este projeto foi desenvolvido para fins **acadêmicos e educacionais**.

As marcas e conteúdos institucionais do Senac pertencem aos seus respectivos titulares.
