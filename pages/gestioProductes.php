<!DOCTYPE html>
<html lang="ca">

<?php include ('../includes/head.html'); ?>

<body class="flex flex-col min-h-screen bg-gray-50 font-sans">
    
    <?php include ('../includes/header.php'); ?>

    <main class="flex-grow container mx-auto px-4 py-8 flex flex-col items-center">
        <h1 class="text-2xl font-bold text-center mb-6">Productes</h1>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 max-w-6xl">
            <?php
                $db = new SQLite3('../Base_datos/mobiliari.db');

                $id = $_GET['categoria'];

                $resultats = $db->query("SELECT * FROM productes WHERE $id = cat_id");

                while ($fila = $resultats->fetchArray(SQLITE3_ASSOC)) {
                    $rutaImatge = htmlspecialchars($fila['prod_imatge']);

                    echo '
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <img src="' . $rutaImatge . '" alt="' . htmlspecialchars($fila['prod_nom']) . '" class="w-full h-48 object-cover">
                        <div class="p-4 text-center">
                            <h2 class="font-semibold mb-2">' . htmlspecialchars($fila['prod_nom']) . '</h2>
                            <a href="veureProducte.php?prod_id=' . urlencode($fila['prod_id']) . '" class="w-full inline-block bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition duration-300 mb-2">
                                Veure producte
                            </a>';
                    if ($estatSesio) {
                        echo '
                        <div class="flex justify-center space-x-2 mt-2">
                            <a href="modificarProducte.php?id=' . urlencode($fila['prod_id']) . '" class="text-yellow-600 hover:text-yellow-800 hover:underline">
                                Modificar ·
                            </a>
                            
                            <a href="baixaProducte.proc.php?id=' . urlencode($fila['prod_id']) . '" class="text-red-600 hover:text-red-800 hover:underline">
                                Eliminar
                            </a>
                        </div>';
                    }

                    echo '</div></div>';
                }
            ?>

            <?php if ($estatSesio): ?>
            <div class="bg-white shadow-md rounded-lg overflow-hidden flex items-center justify-center">
                <a href="altaProducte.php" class="flex items-center justify-center w-full h-full hover:opacity-75 transition duration-300">
                    <img src="https://img.icons8.com/ios11/512/40C057/plus.png" alt="Añadir Producto" class="w-16 h-16 object-contain">
                </a>
            </div>
            <?php endif; ?>
        </div>

        <div class="text-center mt-6">
            <a href="gestioCategories.php" class="text-blue-500 hover:underline">Página categories</a>
        </div>
    </main>

    <?php include ('../includes/footer.html'); ?>

</body>
</html>
