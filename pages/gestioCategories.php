<!DOCTYPE html>
<html lang="ca">

<?php include ('../includes/head.html'); ?>

<body class="flex flex-col min-h-screen bg-gray-50 font-sans">
    
    <?php include ('../includes/header.php'); ?>

    <main class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-6">Catàleg de Llibres</h1>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php
                $db = new SQLite3('../Base_datos/llibres.db'); // Asumiendo un nou fitxer

                $resultats = $db->query("SELECT * FROM llibres");

                while ($fila = $resultats->fetchArray(SQLITE3_ASSOC)) {
                    $portada = htmlspecialchars($fila['portada']);
                    $titol = htmlspecialchars($fila['titol']);
                    $autor = htmlspecialchars($fila['autor']);

                    echo '
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden flex flex-col">
                        <div class="h-64 w-full flex items-center justify-center overflow-hidden bg-gray-100">
                            <img src="' . $portada . '" alt="' . $titol . '" class="w-full h-full object-cover">
                        </div>
                        <div class="p-4 flex-grow flex flex-col text-center">
                            <h2 class="text-lg font-semibold mb-1">' . $titol . '</h2>
                            <p class="text-sm text-gray-600 italic mb-3">' . $autor . '</p>
                            <a href="fitxaLlibre.php?id=' . urlencode($fila['id']) . '" class="bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
                                Veure detall
                            </a>';
                    if ($estatSesio) {
                        echo '
                        <div class="flex justify-center space-x-2 mt-2 text-sm">
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
                    <img src="https://img.icons8.com/ios11/512/40C057/plus.png" alt="Afegir Llibre" class="w-16 h-16 object-contain">
                </a>
            </div>
            <?php endif; ?>
        </div>

        <div class="text-center mt-8">
            <a href="../index.php" class="text-blue-500 hover:underline">Tornar a l'inici</a>
        </div>
    </main>

    <?php include ('../includes/footer.html'); ?>

</body>
</html>
