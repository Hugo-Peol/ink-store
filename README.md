# Documentação do Projeto Ink Store

## Introdução

**Ink Store** é um e-commerce de tatuagem onde tatuadores podem exibir suas artes e clientes podem escolher o tatuador ideal com base nas artes disponíveis. Este projeto foi desenvolvido utilizando Laravel 11, Tailwind CSS, e Vite.

## Estrutura do Projeto

### Diretórios e Arquivos Principais

- **`app/`**: Contém a lógica do aplicativo, incluindo Controllers, Models e Repositories.
  - **`View/Components/`**: Contém componentes Blade personalizados, como `ArtCard`.
- **`resources/`**: Contém os arquivos de recursos como views e assets.
  - **`views/`**: Contém as views Blade do Laravel.
    - **`components/`**: Contém a view do componente `ArtCard`.
  - **`css/`**: Contém os arquivos de estilos CSS.
- **`routes/`**: Contém os arquivos de rotas do Laravel.
- **`database/`**: Contém as migrations e seeds do banco de dados.
- **`public/`**: Contém arquivos acessíveis publicamente, como imagens e scripts compilados.

### Arquitetura do Banco de Dados

O banco de dados inclui as seguintes tabelas:

- **`users`**: Armazena informações sobre os usuários.
- **`categories`**: Armazena categorias de produtos.
- **`products`**: Armazena informações sobre os produtos de tatuagem.
- **`orders`**: Armazena informações sobre pedidos.
- **`order_items`**: Armazena itens de cada pedido.
- **`addresses`**: Armazena endereços de entrega.
- **`reviews`**: Armazena avaliações dos produtos.

## Configuração

### Pré-requisitos

- PHP 8.2+
- Laravel 11
- Node.js e npm
- Composer

### Instalação

1. Clone o repositório:

    ```bash
    git clone https://github.com/seu-usuario/ink-store.git
    cd ink-store
    ```

2. Instale as dependências do PHP e Node.js:

    ```bash
    composer install
    npm install
    ```

3. Configure o ambiente:

    Copie o arquivo `.env.example` para `.env` e configure as variáveis de ambiente conforme necessário.

    ```bash
    cp .env.example .env
    ```

4. Gere a chave de aplicação do Laravel:

    ```bash
    php artisan key:generate
    ```

5. Execute as migrations para criar as tabelas do banco de dados:

    ```bash
    php artisan migrate
    ```

6. Compile os assets com Vite:

    ```bash
    npm run dev
    ```

### Configuração do Tailwind CSS

O Tailwind CSS está configurado em `tailwind.config.js` e é utilizado para estilizar o projeto. Certifique-se de que o arquivo CSS está sendo carregado corretamente.

## Uso

### Navegação

- **Home**: Exibe as artes disponíveis em cartões e permite explorar mais.
- **Sobre**: Informações sobre o projeto e a equipe.
- **Contato**: Formulário de contato para dúvidas e suporte.

### Componente ArtCard

O componente `ArtCard` exibe as artes em cartões. Pode ser utilizado na view `home.blade.php` para mostrar uma lista de artes disponíveis.

**Uso na view:**

```blade
<x-art-card
    title="Arte 1"
    image="https://via.placeholder.com/300"
    description="Descrição da arte 1"
/>
