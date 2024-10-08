# maga-backend

# Projeto de Sistema de Contatos

Este é um projeto simples desenvolvido em PHP com PostgreSQL e o padrão de arquitetura MVC. O projeto é um sistema de cadastro de contatos com CRUD (Create, Read, Update, Delete), onde os contatos são associados a pessoas.

## Pré-requisitos

Para rodar o projeto localmente, você precisará ter as seguintes ferramentas instaladas:

- XAMPP (ou outra plataforma de desenvolvimento para PHP)
- PostgreSQL (como banco de dados)
- Composer (para gerenciar dependências PHP)
- Git (para clonar o repositório)

## Passos para executar o projeto

1. **Clonar o repositório**

   Primeiro, clone o repositório do projeto para a sua máquina local:

   ```bash
   git clone https://github.com/RodrigoTanchela/maga-backend.git
   cd nome-do-repositorio

### 2. Configurar o ambiente

No diretório raiz do projeto, renomeie o arquivo `.env.example` para `.env` e configure as variáveis de ambiente, especialmente as credenciais de conexão com o banco de dados PostgreSQL.

Exemplo de configuração do arquivo `.env`:

```makefile
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=seu_banco_de_dados
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

### 3. Instalar dependências

Instale as dependências do projeto usando o Composer. Isso incluirá bibliotecas como o Doctrine ORM, que é utilizado no projeto.

```
composer install
```

### 4. Configurar o banco de dados

Após ter configurado o arquivo `.env`, você deve garantir que o banco de dados PostgreSQL esteja rodando. Em seguida, crie manualmente as tabelas necessárias no banco de dados, conforme o esquema do projeto.
crie as tabelas utilizando os comandos SQL apropriados ou através de uma ferramenta de administração de banco de dados como o pgAdmin. Certifique-se de que as entidades no código estão refletidas corretamente no banco de dados.

### 5. Executar o XAMPP
1. Inicie o XAMPP e certifique-se de que o Apache e o PostgreSQL estão rodando.
2. Coloque o projeto dentro do diretório `htdocs` do XAMPP.

### 6. Acessar o projeto
Abra seu navegador e acesse:

```
http://localhost/maga-backend/pessoas

```

### Estrutura do Projeto
A estrutura do projeto segue o padrão MVC:

- **app/**: Contém os arquivos de aplicação, como controladores, modelos e visualizações.
- **public/**: Diretório público que contém o ponto de entrada da aplicação (index.php).
- **app/models/**: Modelos e entidades que representam as tabelas do banco de dados.
- **app/controllers/**: Controladores responsáveis por tratar as requisições HTTP.
- **app/views/**: Arquivos de visualização (HTML/CSS) que são renderizados no navegador.


Tecnologias Utilizadas
•	PHP: Linguagem de programação backend.
•	PostgreSQL: Banco de dados relacional.
•	Composer: Gerenciador de dependências PHP.
•	Doctrine ORM: Mapeamento objeto-relacional para PHP.
•	XAMPP: Servidor de desenvolvimento local (Apache, PHP).

### Endpoints da Aplicação

#### Pessoas
- `/pessoas`: Gerencia a lista de pessoas.
- `/pessoas/{id}`: Obtém os detalhes de uma pessoa específica.
- `/pessoas/create`: Exibe o formulário para criar uma nova pessoa.
- `/pessoas/store`: Salva uma nova pessoa no banco de dados.
- `/pessoas/{id}/edit`: Exibe o formulário para editar uma pessoa existente.
- `/pessoas/{id}/update`: Atualiza os dados de uma pessoa no banco de dados.
- `/pessoas/{id}/delete`: Remove uma pessoa do banco de dados.

#### Contatos
- `/contatos`: Gerencia a lista de contatos.
- `/contatos/{id}`: Obtém os detalhes de um contato específico.
- `/contatos/create`: Exibe o formulário para criar um novo contato.
- `/contatos/store`: Salva um novo contato no banco de dados.
- `/contatos/{id}/edit`: Exibe o formulário para editar um contato existente.
- `/contatos/{id}/update`: Atualiza os dados de um contato no banco de dados.
- `/contatos/{id}/delete`: Remove um contato do banco de dados.
