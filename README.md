
# Task Manager

## Sobre o Projeto

O **Task Manager** é uma aplicação web de gerenciamento de tarefas desenvolvida como parte de um desafio técnico. O objetivo principal deste projeto é demonstrar proficiência em tecnologias como Laravel, Livewire, Tailwind CSS, além de boas práticas em desenvolvimento de software e arquitetura de aplicações.

Este sistema permite que os usuários criem, editem, excluam e organizem tarefas em diferentes categorias. A interface foi projetada para ser intuitiva e responsiva, proporcionando uma experiência agradável ao usuário.

## Funcionalidades Principais

- **CRUD de Tarefas**: Criação, Leitura, Atualização e Exclusão de tarefas.
- **Gerenciamento de Categorias**: Criação de novas categorias ou uso de categorias existentes.
- **Filtro de Tarefas por Categoria**: Filtragem de tarefas com base em suas categorias para melhor organização.
- **Status das Tarefas**: Marcação de tarefas como Concluída ou Pendente.
- **Interface Responsiva**: Design responsivo utilizando Tailwind CSS, garantindo compatibilidade em diversos dispositivos.

## Tecnologias Utilizadas

- **Laravel 10**: Framework PHP utilizado para construir o backend da aplicação.
- **Livewire**: Framework para criação de interfaces dinâmicas e reativas sem sair do ecossistema do Laravel.
- **Tailwind CSS**: Framework de CSS utilitário para estilização da interface de usuário.
- **MySQL**: Banco de dados relacional usado para armazenar informações sobre tarefas e categorias.
- **PHP 8.2**: Linguagem de programação utilizada para o desenvolvimento da lógica do backend.
- **Composer**: Gerenciador de dependências do PHP.
- **NPM**: Gerenciador de pacotes utilizado para gerenciar as dependências do frontend.

## Estrutura do Projeto

- **Models**: Contêm as definições das tabelas e relacionamentos do banco de dados.
- **Controllers**: Gerenciam as requisições HTTP e processam a lógica da aplicação.
- **Views**: Definem o layout e os componentes da interface do usuário.
- **Migrations**: Gerenciam as versões do banco de dados.
- **Components**: Componentes do Livewire para criar interfaces dinâmicas.

## Instalação e Configuração

### Pré-requisitos

Antes de iniciar, você precisará ter as seguintes ferramentas instaladas em sua máquina:

- [Git](https://git-scm.com)
- [PHP](https://www.php.net)
- [Composer](https://getcomposer.org)
- [Node.js](https://nodejs.org)
- [MySQL](https://www.mysql.com)

### Passo a Passo

1. **Clonando o Repositório**

   Clone este repositório em sua máquina local:

   ```bash
   git clone https://github.com/deivisonpimentel/task_manager.git
   cd task_manager
   ```

2. **Instalando Dependências**

   Instale as dependências do PHP e do Node.js:

   ```bash
   composer install
   npm install
   ```

3. **Configuração do Ambiente**

   - Copie o arquivo `.env.example` para `.env`:

     ```bash
     cp .env.example .env
     ```

   - Configure as variáveis de ambiente no arquivo `.env`:

     - Configuração do banco de dados (DB_DATABASE, DB_USERNAME, DB_PASSWORD).
     - Configuração do servidor (APP_URL, APP_ENV).

4. **Geração da Chave da Aplicação**

   Gere uma nova chave para a aplicação Laravel:

   ```bash
   php artisan key:generate
   ```

5. **Migrações do Banco de Dados**

   Execute as migrações para criar as tabelas necessárias no banco de dados:

   ```bash
   php artisan migrate
   ```

6. **Rodando a Aplicação**

   Inicie o servidor de desenvolvimento e o compilador de CSS/JavaScript:

   ```bash
   php artisan serve
   npm run dev
   ```

   Acesse a aplicação através de `http://localhost:8000`.

## Uso da Aplicação

### Criando Tarefas

1. Clique no botão "Nova Tarefa".
2. No modal que aparecer, preencha o título, a descrição e selecione uma categoria ou crie uma nova.
3. Escolha o status da tarefa (Concluída ou Pendente).
4. Clique em "Adicionar Tarefa" para salvar.

### Editando Tarefas

1. Para editar uma tarefa, clique no ícone de lápis ao lado da tarefa desejada.
2. Faça as modificações no modal que aparecer.
3. Clique em "Atualizar Tarefa" para salvar as alterações.

### Excluindo Tarefas

1. Para excluir uma tarefa, clique no ícone de lixeira ao lado da tarefa que deseja remover.
2. Confirme a exclusão, se necessário.

### Filtrando Tarefas por Categoria

1. Utilize o filtro de categorias na interface para visualizar apenas as tarefas pertencentes a uma determinada categoria.

## Estrutura do Código

### Modelo `Task`

- **Relação**: Cada tarefa pertence a uma categoria.
- **Campos**: `title`, `description`, `category_id`, `completed`.

### Modelo `Category`

- **Relação**: Cada categoria pode ter várias tarefas.
- **Campos**: `name`.

### Componentes Livewire

- **TaskManager**: Gerencia as ações de criação, edição, exclusão e filtragem de tarefas.

## Contribuição

Contribuições são sempre bem-vindas! Se você tiver sugestões para melhorar este projeto, sinta-se à vontade para abrir uma issue ou enviar um pull request.

## Licença

Este projeto está licenciado sob a [Licença MIT](LICENSE).

