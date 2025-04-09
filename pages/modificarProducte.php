<!DOCTYPE html>
<html lang="ca">

<?php include ('../includes/head.html'); ?>

<body class="flex flex-col min-h-screen bg-gray-50 font-sans">
    <?php include ('../includes/header.php'); ?>

    <main class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-center mb-6">Modificar Producte</h1>
        <?php
        $db = new SQLite3('../Base_datos/mobiliari.db');

        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $producte = $db->querySingle("SELECT * FROM productes WHERE prod_id = $id", true);

        if (!$producte) {
            echo "<p class='text-red-500 text-center'>Producte no trobat.</p>";
        } else {
        ?>
            <form action="modificarProducte.proc.php" method="POST" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($producte['prod_id']); ?>">

                <div class="mb-4">
                    <label for="nom" class="block text-gray-700 font-bold mb-2">Nom del producte</label>
                    <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($producte['prod_nom']); ?>" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label for="descripcio" class="block text-gray-700 font-bold mb-2">Descripció</label>
                    <textarea id="descripcio" name="descripcio" rows="4" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"><?php echo htmlspecialchars($producte['prod_descripcio']); ?></textarea>
                </div>

                <div class="mb-4">
                    <label for="preu" class="block text-gray-700 font-bold mb-2">Preu (€)</label>
                    <input type="number" id="preu" name="preu" value="<?php echo htmlspecialchars($producte['prod_preu']); ?>" step="0.01" min="0" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label for="imatge" class="block text-gray-700 font-bold mb-2">URL de la Imatge</label>
                    <input type="url" id="imatge" name="imatge" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="https://exemple.com/imatge.jpg">
                    <p class="text-sm text-gray-500 mt-1">Deixa aquest camp buit si no vols canviar la imatge.</p>
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                    Guardar canvis
                </button>
            </form>
        <?php } ?>
    </main>

    <?php include ('../includes/footer.html'); ?>
</body>

</html>
