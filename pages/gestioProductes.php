<!DOCTYPE html>
<html lang="ca">

<?php include ('../includes/head.html'); ?>

<body class="flex flex-col min-h-screen bg-gray-50 font-sans">
    
    <?php include ('../includes/header.php'); ?>

    <main class="flex-grow container mx-auto px-4 py-8 flex flex-col items-center">
        <h1 class="text-2xl font-bold text-center mb-6">Productes</h1>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 max-w-6xl">
        <?php
            if (!isset($_GET['id'])) {
                echo '<h3>Error: No se especificó ningún tipo de Libro.</h3>';
                exit;
            }

            $id = intval($_GET['id']); // Obtenemos el ID del tipo

            $url = " https://api101.up.railway.app/book/{$id}";
            $response = file_get_contents($url);
            if ($response === FALSE) {
                echo '<h3>Error al cargar los datos del libro.</h3>';
                exit;
            }

            $data = json_decode($response, true);
            $books = $data['Libro'];


            if (empty($books)) {
                echo '<h3>No hay Libros aqui.</h3>';
                exit;
            }

            foreach ($books as $entry) {
                $nom = $entry['Libro']['name'];
                echo "<li><strong>{$nom}</strong></li>";

            }
        ?>
        </div>

        <div class="text-center mt-6">
            <a href="gestioCategories.php" class="text-blue-500 hover:underline">Página categories</a>
        </div>
    </main>

    <?php include ('../includes/footer.html'); ?>

</body>
</html>
