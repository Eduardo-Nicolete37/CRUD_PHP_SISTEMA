# Gestão de Alunos
## Mini sistema com CRUD no HTML + CSS + PHP + Postgresql
### 1. Conceitos
#### 1.1 O que é CRUD
    É uma sigla que engloba as funções:
    - Create (Função 2.2)
    - Read (Função 2.1 & 2.3)
    - Update (Função 2.4)
    - Delete (Função 2.5)
    São as funções básicas de um sitema ultilizavel
### 2. Objetivos
#### 2.1. Relatório sobre os alunos cadastrados
- Arquivo Responsável - read.php
- Mostra todos os alunos registrados na database, sem filtros/paramêtros

#### 2.2. Cadastrar novo aluno
- Arquivo Responsável - create.php
- Pede os segunintes dados do User para fazer o registro:
    - Name
    - Turme
    - Email
    - Data de Nascimento
    - Se está ativo
- A database cria um ID automáticamente para o registro. Este ID será necessário para usar as outras informações

#### 2.3. Consulta de Alunos Especifico
- Arquivo Responsável - readWithWhere.php
- Diferentemente do 2.1, este requere um ID especifico, mostrando o dados apenas desse registro
- Pede apenas o ID, printando os outros dados

#### 2.4. Atualizar o registro do Aluno(s)
- Arquivo Responsável - update.php

#### 2.5. Excluir o registro do Aluno(s)
- Arquivo Responsável - delete.php

