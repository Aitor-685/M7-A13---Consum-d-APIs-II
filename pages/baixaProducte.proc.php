<?php
$db = new SQLite3('../Base_datos/mobiliari.db');

$id = $_GET['id'];

$resultados = $db->query("DELETE FROM productes WHERE prod_id = $id");

if ($resultados) {
    $mensaje = "Producte eliminat correctament.";
} else {
    $mensaje = "Error al eliminar el producte.";
}

$db->close();
?>

<!DOCTYPE html>
<html lang="ca">

<?php include ('../includes/head.html'); ?>

<body class="flex flex-col min-h-screen bg-gray-50 font-sans">
    <?php include ('../includes/header.html'); ?>

    <main class="flex-grow flex items-center justify-center p-4">
        <div class="w-full max-w-md bg-white shadow-md rounded-lg p-8">
            <h2 class="text-2xl font-bold text-center mb-6 text-green-800"><?php echo $mensaje; ?></h2>
            <div class="flex justify-center">
                <a href="gestioCategories.php" class="text-blue-500 hover:underline">Torna a la pàgina principal</a>
            </div>
        </div>
    </main>

    <?php include ('../includes/footer.html'); ?>
</body>
</html>