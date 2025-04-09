<?php
session_start();

$estatSesio = isset($_SESSION['username']);
?>

<header class="bg-white shadow-md">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <a href="../index.php">
                <img src="https://dca.cat/wp-content/uploads/2022/05/ITB_Logo_ITBdesc_800-Direccio-ITB-Alberto-Vila.png" 
                     alt="Logo" class="h-10">
            </a>
        </div>
        <div class="flex items-center space-x-4">
            <button class="text-gray-800 hover:text-blue-600">Cerca</button>
            <button class="text-gray-800 hover:text-blue-600">Compte</button>
            <button class="text-gray-800 hover:text-blue-600">Cistella</button>

            <?php if ($estatSesio): ?>
                <a href="../pages/logout.php">
                    <button class="text-gray-800 hover:text-red-600">Tancar sessió</button>
                </a>
            <?php else: ?>
                <a href="../pages/altaUsuaris.php">
                    <button class="text-gray-800 hover:text-blue-600">Iniciar sessió</button>
                </a>
            <?php endif; ?>
        </div>
    </div>
</header>
