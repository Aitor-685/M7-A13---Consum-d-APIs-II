<!DOCTYPE html>
<html lang="ca">

<?php include ('../includes/head.html'); ?>

<body class="flex flex-col min-h-screen bg-gray-50 font-sans">
    
    <?php include ('../includes/header.php'); ?>

    <main class="flex-grow container mx-auto px-4 py-8 flex flex-col items-center">
    <h1 class="text-3xl font-bold text-center mb-6">Llibres per categoria</h1>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 max-w-6xl">
        <?php
            $db = new SQLite3('../Base_datos/llibres.db');

            $id = $_GET['categoria'];

            // ⚠️ Canvi en la consulta: millorem seguretat i estructura
            $stmt = $db->prepare("SELECT * FROM llibres WHERE categoria_id = :id");
            $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
            $resultats = $stmt->execute();

            while ($fila = $resultats->fetchArray(SQLITE3_ASSOC)) {
                $portada = htmlspecialchars($fila['portada']);
                $titol = htmlspecialchars($fila['titol']);
                $autor = htmlspecialchars($fila['autor']);

                echo '
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="' . $portada . '" alt="' . $titol . '" class="w-full h-64 object-cover">
                    <div class="p-4 text-center">
                        <h2 class="text-lg font-semibold mb-1">' . $titol . '</h2>
                        <p class="text-sm text-gray-600 italic mb-3">' . $autor . '</p>
                        <a href="veureLlibre.php?id=' . urlencode($fila['id']) . '" class="inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition duration-300">
                            Veure llibre
                        </a>';

                if ($estatSesio) {
                    echo '
                    <div class="flex justify-center space-x-2 mt-3 text-sm">
                        <a href="modificarLlibre.php?id=' . urlencode($fila['id']) . '" class="text-yellow-600 hover:underline">Modificar</a>
                        <span class="text-gray-400">·</span>
                        <a href="baixaLlibre.proc.php?id=' . urlencode($fila['id']) . '" class="text-red-600 hover:underline">Eliminar</a>
                    </div>';
                }

                echo '</div></div>';
            }
        ?>

        <?php if ($estatSesio): ?>
        <div class="bg-white shadow-md rounded-lg overflow-hidden flex items-center justify-center">
            <a href="altaLlibre.php" class="flex items-center justify-center w-full h-full hover:opacity-75 transition duration-300">
                <img src="https://img.icons8.com/ios11/512/40C057/plus.png" alt="Afegir llibre" class="w-16 h-16 object-contain">
            </a>
        </div>
        <?php endif; ?>
    </div>

    <div class="text-center mt-6">
        <a href="gestioCategories.php" class="text-blue-500 hover:underline">Tornar a categories</a>
    </div>
</main>


    <?php include ('../includes/footer.html'); ?>

</body>
</html>
