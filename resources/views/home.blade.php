<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ink Store</title>
    @vite('resources/css/app.css')
    <style>
        /* Garante que a imagem de fundo se repita */
        body {
            position: relative;
            margin: 0;
            height: 100vh;
            overflow-x: hidden; /* Impede rolagem horizontal */
            overflow-y: auto; /* Permite rolagem vertical quando necessário */
            background-image: url('{{ asset('images/3173322.jpg') }}'); /* Caminho para a sua imagem */
            background-repeat: repeat; /* Faz a imagem se repetir */
            background-size: auto; /* Mantém o tamanho original da imagem */
            background-position: center; /* Centraliza a imagem */
        }

        /* Estilo para o rodapé transparente */
        footer {
            position: relative;
            z-index: 1;
            background-color: rgba(0, 0, 0, 0.3); /* Transparência no fundo do rodapé */
            backdrop-filter: blur(5px); /* Adiciona um leve desfoque */
        }
    </style>
</head>
<body class="bg-preto-fosco text-branco">
    <!-- Cabeçalho -->
    <header class="bg-preto-fosco text-branco py-6 px-4 shadow-md">
        <nav class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-2xl font-bold">Ink Store</a>
            <ul class="flex space-x-6">
                <li><a href="#" class="hover:text-dourado-brilhante">Home</a></li>
                <li><a href="#" class="hover:text-dourado-brilhante">Sobre</a></li>
                <li><a href="#" class="hover:text-dourado-brilhante">Contato</a></li>
            </ul>
        </nav>
    </header>

    <!-- Seção Principal -->
    <main class="container mx-auto py-12 px-4">
        <section class="text-center mb-12">
            <h1 class="text-4xl font-extrabold mb-4">Bem-vindo ao Ink Store</h1>
            <p class="text-xl mb-8">Explore nossas artes de tatuagem e encontre a perfeita para você.</p>
            <a href="#" class="bg-dourado-brilhante text-preto-profundo px-6 py-3 rounded-lg text-lg font-semibold hover:bg-dourado-escuro transition duration-300">Ver Todas as Artes</a>
        </section>

        <!-- Cards de Artes -->
        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($arts as $art)
                <x-art-card
                    :title="$art->title"
                    :image="$art->image_url"
                    :description="$art->description"
                />
            @endforeach
        </section>
    </main>

    <!-- Rodapé -->
    <footer class="bg-preto-fosco text-branco py-6 px-4 border-t border-cinza-escuro">
        <div class="container mx-auto text-center relative">
            <p>&copy; 2024 Ink Store. Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>
