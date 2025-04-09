<!DOCTYPE html>
<html lang="ca">

<?php include ('../includes/head.html'); ?>

<body class="flex flex-col min-h-screen bg-gray-50 font-sans">
    
    <?php include ('../includes/header.php'); ?>

    <main class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-center mb-6">Categories</h1>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <?php
               function carregartot() {
                $url = ' https://api101.up.railway.app/book';
                $response = file_get_contents($url);
                if ($response === FALSE) {
                    echo '<h3>Error en carregar els llibres.</h3>';
                    return;
                }

                $data = json_decode($response, true);
                $pokemons = $data['results'];

                if (empty($pokemons)) {
                    echo '<h3>No hi ha pokemons per mostrar.</h3>';
                    return;
                }

                foreach ($pokemons as $entry) {
                    $nom = $entry['name'];
                    $id = end(explode('/', rtrim($entry['url'], '/'))); // ID del Pokémon

                    echo "<li>
                        <p><a href='include/detalles.php?id={$id}'><strong>{$nom}</strong></a></p>
                        <hr/>
                </li>";
                }
            }

            carregartot();
            ?>
        </div>

        <div class="text-center mt-6">
            <a href="../index.php" class="text-blue-500 hover:underline">Página principal</a>
        </div>
    </main>

    <?php include ('../includes/footer.html'); ?>

</body>
</html>
