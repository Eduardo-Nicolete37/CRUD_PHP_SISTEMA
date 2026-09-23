# Projeto para Gestão de Alunos
## Mini sistema com CRUD no HTML + CSS + PHP + Postgresql
Este projeto tem como objetivo criar um sistema que seja capaz de:
```
- Registrar novos alunos
- Gerar um relatório geral
- Gerar um relatório específico (orientado pelo ID)
- Deletar registros selecionados (Também orientados por ID)
- Atualizar um registro já existente
```
## Como rodar localmente
É necessário ter o PHP instalado e acesso a um banco de dados PostgreSQL <br>
### Pré requisitos
 - PHP 7.4 ou superior (Com a extensão `pdo_pgsql`)
 - PostgreSQL instalado e rodando na porta padrão (`5432`)
 - GIT instalado em sua máquina
### Passo 1. Clonar o repositório
Abra o git bash e execute: 
```bash
git clone https://github.com/Eduardo-Nicolete37/CRUD_PHP_SISTEMA.git
# Abra a pasta do projeto
cd CRUD_PHP_SISTEMA
```
### Passo 2. Configurar a Conexão no PHP
Na raiz da pasta CRUD_PHP_SISTEMA, abra a pasta database, e no arquivo connect.php, atualize seus dados:
```php
$host = 'localhost';
$port = '5432';
$dbname = '[nome_bd]'; // O nome da sua database
$user = 'postgres'; // O seu usuário do PostgreSQL
$password = 'sua_senha_aqui'; // A sua senha do PostgreSQL
```
### Passo 3. Acessar a Aplicação
Com o seu BCD configurado, abra sua pasta no terminal do seu computador, e execute:
```bash
php -S localhost:8000
```
Por fim, acesse o localhost:8000 no navegador de sua preferência

## Especificação de Requisitos de Software
Especificação dos Requisistos de Software (SRE)  
Estrutura Baseada na ISO/IEC/IEEE 29148:2018

## 1. Conceitos
### 1.1 O que é CRUD
    É uma sigla que engloba as funções:
    - Create (Função 2.2)
    - Read (Função 2.1 & 2.3)
    - Update (Função 2.4)
    - Delete (Função 2.5)
    Essas são as funções básicas de um sitema em conexão a um Banco de Dados ultilizavel
### 1.2 O que é helpers.php
    É um arquivo em que está todas as funções php do projeto, faclitando a correção de bugs do projeto, ademais, aumenta a organização de projeto. Esta localizado na pasta ./includes
## 2. Objetivos
### 2.1. Relatório sobre os alunos cadastrados

- Arquivo responsável: read.php
- Função: Realiza a consulta e exibição de todos os alunos cadastrados no banco de dados, sem a aplicação de filtros ou parâmetros específicos.

O arquivo read.php é responsável por iniciar o processo de consulta dos registros armazenados na tabela de alunos. Para isso, o arquivo utiliza as funções disponibilizadas pelos helpers, que, por sua vez, fazem uso da conexão previamente estabelecida pelo arquivo connect.

Após a execução da consulta SQL, os resultados retornados pelo banco de dados são processados por meio de um fetch, permitindo que cada registro seja recuperado individualmente e armazenado em uma estrutura de dados, como uma matriz.

Com os registros organizados, é utilizado um loop de iteração para percorrer os elementos retornados pela consulta. Dessa forma, cada aluno pode ser acessado individualmente e suas respectivas informações, como ID, nome, turma, e-mail, data de nascimento e status de atividade, podem ser apresentadas ao usuário.

Como não são enviados parâmetros de filtragem para a consulta, o comportamento padrão do arquivo consiste em retornar todos os registros disponíveis na tabela.

### 2.2. Cadastrar novo aluno

 - Arquivo responsável: create.php
 - Função: Realiza a inserção de um novo aluno no banco de dados.

O arquivo create.php é responsável por receber os dados fornecidos pelo usuário e utilizá-los para construir um novo registro na tabela de alunos. Para que o cadastro seja realizado corretamente, são solicitadas as seguintes informações:

- Name: nome do aluno;
- Turma: turma à qual o aluno pertence;
- Email: endereço de e-mail do aluno;
- Data de Nascimento: data de nascimento do aluno;
- Ativo: indica se o aluno está atualmente ativo no sistema.

Após o recebimento dessas informações, os dados são encaminhados para a camada responsável pela comunicação com o banco de dados, utilizando a conexão estabelecida previamente pelo arquivo connect.

Durante a inserção, o banco de dados é responsável por gerar automaticamente um ID único para o novo registro. Esse identificador funciona como a chave de referência do aluno e será utilizado posteriormente para localizar, atualizar ou excluir especificamente esse registro.

Dessa forma, o ID não precisa ser informado manualmente durante o cadastro, pois sua geração ocorre de maneira automática no processo de inserção.

### 2.3. Consulta de aluno específico

- Arquivo responsável: readWithWhere.php
- Função: Realiza a consulta de um único aluno a partir de seu identificador.

Diferentemente do processo descrito na seção 2.1, o arquivo readWithWhere.php não realiza uma consulta abrangente de todos os registros. Nesse caso, é necessário fornecer um ID específico, que será utilizado como condição para localizar o aluno correspondente.

O ID recebido é utilizado como parâmetro de filtragem na consulta ao banco de dados, restringindo o resultado ao registro que possui aquele identificador.

Após a execução da consulta, os dados encontrados são recuperados e apresentados ao usuário. Embora apenas o ID seja utilizado como entrada para realizar a busca, o resultado da consulta contém as demais informações associadas ao registro, como nome, turma, e-mail, data de nascimento e status de atividade.

Esse mecanismo permite acessar individualmente um aluno sem a necessidade de carregar ou processar todos os registros existentes na tabela.

### 2.4. Atualizar o registro do aluno

- Arquivo responsável: update.php
- Função: Modifica as informações de um aluno previamente cadastrado.

O arquivo update.php é utilizado quando existe a necessidade de alterar informações pertencentes a um registro já existente. Para identificar qual registro deverá ser modificado, o sistema recebe o ID do aluno juntamente com os novos dados que substituirão as informações atuais.

O ID atua como o elemento responsável por estabelecer a relação entre a requisição recebida e o registro armazenado no banco de dados. Dessa maneira, a atualização é direcionada exclusivamente ao aluno correspondente ao identificador informado.

Após a identificação do registro, os novos valores fornecidos pelo usuário são enviados para a operação de atualização no banco de dados. Os campos alterados passam, então, a armazenar as novas informações, mantendo o mesmo ID associado ao aluno.

Esse processo evita a criação de um novo registro durante uma alteração, garantindo que as informações sejam modificadas dentro do registro original.

### 2.5. Excluir o registro do aluno
- Arquivo responsável: delete.php
- Função: Remove permanentemente um aluno do banco de dados.

O arquivo delete.php é responsável pela exclusão de um registro existente. Para determinar qual aluno deverá ser removido, o sistema recebe apenas o ID correspondente ao registro.

Esse identificador é utilizado como condição da operação de exclusão, fazendo com que o banco de dados localize o registro associado e o remova da tabela.

Como a operação é baseada no ID, somente o registro correspondente ao identificador informado será afetado. Após a execução da exclusão, os dados relacionados àquele aluno deixam de estar disponíveis na tabela e, consequentemente, não serão mais retornados pelas consultas realizadas posteriormente.

### 2.6. Extra
Vale ressaltar que a maioria dos inputs de ID, foram tratados não somente no frontend, mas também no backend, evitando que:
- O limite do INT seja quebrado;
- Seja digitado strings, sendo possivel ao alterar o frontend;
- Seja feito um input vazio.