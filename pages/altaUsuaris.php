<!DOCTYPE html>
<html lang="ca">

<?php include ('../includes/head.html'); ?>

<body class="flex flex-col min-h-screen bg-gray-50 font-sans">
    <?php include ('../includes/header.php'); ?>

    <main class="flex-grow flex items-center justify-center p-6">
        <form action="altaUsuaris.proc.php" method="POST" class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Iniciar Sessió</h2>

            <div class="mb-4">
                <label for="username" class="block text-gray-700 font-bold mb-2">Nom d'usuari</label>
                <input type="text" id="username" name="username" required 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    placeholder="Introdueix el teu nom d'usuari">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-bold mb-2">Contrasenya</label>
                <input type="password" id="password" name="password" required 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    placeholder="Introdueix la teva contrasenya">
            </div>

            <button type="submit" 
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                Iniciar Sessió
            </button>
            <div class="text-center mt-6">
                <a href="../index.php" class="text-blue-500 hover:underline">Página principal</a>
            </div>
        </form>
        
    </main>

    <?php include ('../includes/footer.html'); ?>
</body>
</html>