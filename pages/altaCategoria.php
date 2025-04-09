<!DOCTYPE html>
<html lang="ca">

<?php include ('../includes/head.html'); ?>

<body class="flex flex-col min-h-screen bg-gray-50 font-sans">
    <?php include ('../includes/header.php'); ?>

    <main class="flex-grow flex items-center justify-center p-6">
        <form action="altaCategoria.proc.php" method="POST" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
            <h1 class="text-2xl font-bold text-center mb-6">Afegir una nova categoria</h1>

            <div class="mb-4">
                <label for="nom" class="block text-gray-700 font-bold mb-2">Nom de la categoria</label>
                <input type="text" id="nom" name="nom" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="descripcio" class="block text-gray-700 font-bold mb-2">Descripció</label>
                <textarea id="descripcio" name="descripcio" rows="4" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>

            <div class="mb-4">
                <label for="imatge" class="block text-gray-700 font-bold mb-2">URL de la Imatge</label>
                <input type="url" id="imatge" name="imatge" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <p class="text-sm text-gray-500 mt-1">Opcional: pots deixar-ho buit si no vols afegir imatge.</p>
            </div>

            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition duration-300">
                Afegir categoria
            </button>

            <div class="text-center mt-6">
                <a href="gestioCategories.php" class="text-blue-500 hover:underline">Tornar a categories</a>
            </div>
        </form>
    </main>

    <?php include ('../includes/footer.html'); ?>
</body>
</html>
