<!DOCTYPE html>
<html lang="ca">

<?php include ('../includes/head.html'); ?>

<body class="flex flex-col min-h-screen bg-gray-50 font-sans">
    
    <?php include ('../includes/header.php'); ?>

    <main class="flex-grow flex items-center justify-center px-4 py-8">
        <div class="w-full max-w-md">
            <?php
                $db = new SQLite3('../Base_datos/mobiliari.db');

                // Asegúrate de obtener el ID de la categoría
                $id = isset($_GET['cat_id']) ? intval($_GET['cat_id']) : 0;

                // Si no se pasa un ID válido, mostrar un mensaje de error
                if ($id <= 0) {
                    echo '<p class="text-red-500 text-center">ID de categoria invàlid o no especificat.</p>';
                } else {
                    // Filtrar los productes per la categoria seleccionada
                    $stmt = $db->prepare("SELECT * FROM productes WHERE cat_id = :cat_id");
                    $stmt->bindValue(':cat_id', $id, SQLITE3_INTEGER);
                    $resultats = $stmt->execute();

                    if ($resultats->numColumns() == 0) {
                        echo '<p class="text-center">No s\'han trobat productes en aquesta categoria.</p>';
                    } else {
                        // Mostrar els productes de la categoria
                        while ($fila = $resultats->fetchArray(SQLITE3_ASSOC)) {
                            $rutaImatge = htmlspecialchars($fila['prod_imatge']);
            
                            echo '
                            <div class="bg-white shadow-md rounded-lg overflow-hidden mb-6">
                                <img src="' . $rutaImatge . '" alt="' . htmlspecialchars($fila['prod_nom']) . '" class="w-full h-64 object-cover">
                                <div class="p-6 text-center">
                                    <h2 class="font-bold text-2xl mb-4">' . htmlspecialchars($fila['prod_nom']) . '</h2>
                                    <div class="space-y-3">
                                        <p class="text-gray-700 text-lg"><strong>Preu:</strong> ' . number_format($fila['prod_preu'], 2) . '€</p>
                                        <p class="text-gray-700 text-base"><strong>Descripció:</strong> ' . htmlspecialchars($fila['prod_descripcio']) . '</p>
                                    </div>
                                </div>
                                <div class="p-4 text-center">
                                    <a href="gestioCategories.php" class="text-blue-500 hover:underline">Página categories</a>
                                </div>
                            </div>';
                        }
                    }
                }
                $db->close();
            ?>
        </div>
    </main>

    <?php include ('../includes/footer.html'); ?>

</body>
</html>
