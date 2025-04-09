<!DOCTYPE html>
<html lang="ca">

<?php include ('../includes/head.html'); ?>

<body class="flex flex-col min-h-screen bg-gray-50 font-sans">
    
    <?php include ('../includes/header.php'); ?>

    <main class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-center mb-6">Categories</h1>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <?php
                $db = new SQLite3('../Base_datos/mobiliari.db');

                $resultats = $db->query("SELECT * FROM categories");

                while ($fila = $resultats->fetchArray(SQLITE3_ASSOC)) {
                    $rutaImatge = htmlspecialchars($fila['cat_imatge']);

                    echo '
                    <div class="bg-white shadow-md rounded-lg overflow-hidden flex flex-col">
                        <div class="h-48 w-full flex items-center justify-center overflow-hidden">
                            <img src="' . $rutaImatge . '" alt="' . htmlspecialchars($fila['cat_nom']) . '" class="w-full h-full object-contain">
                        </div>
                        <div class="p-4 text-center flex-grow flex flex-col">
                            <h2 class="font-semibold mb-2">' . htmlspecialchars($fila['cat_nom']) . '</h2>
                            <a href="gestioProductes.php?categoria=' . urlencode($fila['cat_id']) . '" class="w-full inline-block bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition duration-300 mb-2">
                                Veure productes
                            </a>';
                    if ($estatSesio) {
                        echo '
                        <div class="flex justify-center space-x-2 mt-2">
                            <a href="modificarCategoria.php?id=' . urlencode($fila['cat_id']) . '" class="text-yellow-600 hover:text-yellow-800 hover:underline">
                                Modificar ·
                            </a>
                            
                            <a href="baixaCategoria.proc.php?id=' . urlencode($fila['cat_id']) . '" class="text-red-600 hover:text-red-800 hover:underline">
                                Eliminar
                            </a>
                        </div>';
                    }

                    echo '</div></div>';
                }
            ?>

            <?php if ($estatSesio): ?>
            <div class="bg-white shadow-md rounded-lg overflow-hidden flex items-center justify-center">
                <a href="altaCategoria.php" class="flex items-center justify-center w-full h-full hover:opacity-75 transition duration-300">
                    <img src="https://img.icons8.com/ios11/512/40C057/plus.png" alt="Añadir Categoría" class="w-16 h-16 object-contain">
                </a>
            </div>
            <?php endif; ?>
        </div>

        <div class="text-center mt-6">
            <a href="../index.php" class="text-blue-500 hover:underline">Página principal</a>
        </div>
    </main>

    <?php include ('../includes/footer.html'); ?>

</body>
</html>
