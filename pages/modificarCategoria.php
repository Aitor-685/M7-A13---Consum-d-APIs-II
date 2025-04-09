<!DOCTYPE html>
<html lang="ca">

<?php include ('../includes/head.html'); ?>

<body class="flex flex-col min-h-screen bg-gray-50 font-sans">
    <?php include ('../includes/header.php'); ?>

    <main class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-center mb-6">Modificar Categoria</h1>
        <?php
        
        $db = new SQLite3('../Base_datos/mobiliari.db');

        $id = $_GET['id'];
        
        $categoria = $db->querySingle("SELECT * FROM categories WHERE cat_id = $id", true);

        ?>
        <form action="modificarCategoria.proc.php" method="POST" enctype="multipart/form-data" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($categoria['cat_id']); ?>">

            <div class="mb-4">
                <label for="nom" class="block text-gray-700 font-bold mb-2">Nom de la categoria</label>
                <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($categoria['cat_nom']); ?>" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="descripcio" class="block text-gray-700 font-bold mb-2">Descripció</label>
                <textarea id="descripcio" name="descripcio" rows="4" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"><?php echo htmlspecialchars($categoria['cat_descripcio']); ?></textarea>
            </div>

            <div class="mb-4">
                <label for="imatge" class="block text-gray-700 font-bold mb-2">URL de la Imatge</label>
                <input type="url" id="imatge" name="imatge" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <p class="text-sm text-gray-500 mt-1">Deixa aquest camp buit si no vols canviar la imatge.</p>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300">Guardar canvis</button>
        </form>
    </main>

    <?php include ('../includes/footer.html'); ?>
</body>

</html>