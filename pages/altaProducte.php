<!DOCTYPE html>
<html lang="ca">

<?php include ('../includes/head.html'); ?>

<body class="flex flex-col min-h-screen bg-gray-50 font-sans">
    <?php include ('../includes/header.php'); ?>

    <main class="flex-grow flex items-center justify-center p-6">
        <form action="altaProducte.proc.php" method="GET" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($categoria['cat_id']); ?>">

            <div class="mb-4">
                <label for="nom" class="block text-gray-700 font-bold mb-2">Nom del producte</label>
                <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($categoria['cat_nom']); ?>" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="preu" class="block text-gray-700 font-bold mb-2">Preu</label>
                <input type="number" id="preu" name="preu" value="<?php echo htmlspecialchars($categoria['cat_nom']); ?>" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="descripcio" class="block text-gray-700 font-bold mb-2">Descripció</label>
                <textarea id="descripcio" name="descripcio" rows="4" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required><?php echo htmlspecialchars($categoria['cat_descripcio']); ?></textarea>
            </div>

            <div class="mb-4">
                <label for="imatge" class="block text-gray-700 font-bold mb-2">URL de la Imatge</label>
                <input type="url" id="imatge" name="imatge" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <p class="text-sm text-gray-500 mt-1">Deixa aquest camp buit si no vols canviar la imatge.</p>
            </div>

            <div class="mb-4">
                <label for="cat_id" class="block text-gray-700 font-bold mb-2">Categoria</label>
                <select id="cat_id" name="cat_id" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                    <?php
                        $db = new SQLite3('../Base_datos/mobiliari.db');
                        $result = $db->query("SELECT * FROM categories");
                        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                            echo "<option value='{$row['cat_id']}'>{$row['cat_nom']}</option>";
                        }
                    ?>
                </select>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300">Guardar canvis</button>

            <div class="text-center mt-6">
            <a href="gestioCategories.php" class="text-blue-500 hover:underline">Página categories</a>
            </div>

        </form>
    </main>

    <?php include ('../includes/footer.html'); ?>
</body>

</html>
