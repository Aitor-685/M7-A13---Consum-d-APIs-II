<?php

$db = new SQLite3('../Base_datos/mobiliari.db');

$nom = $_GET['nom'];
$descripcio = $_GET['descripcio'];
$imatge = $_GET['imatge'];

$existe = $db->querySingle("SELECT COUNT(*) FROM categories WHERE cat_nom = '$nom'");

if ($existe > 0) {
    $mensaje = "Error: Ya existe una categoría con este nombre.";
    header("Refresh: 2; url=altaCategoria.php");
} else {
    $resultados = $db->query("INSERT INTO categories (cat_nom, cat_descripcio, cat_imatge) VALUES ('$nom', '$descripcio', '$imatge')");
    
    if ($resultados) {
        $mensaje = "Categoría insertada correctamente.";
        header("Refresh: 2; url=gestioCategories.php");
    } else {
        $mensaje = "Error al insertar la categoría.";
        header("Refresh: 2; url=altaCategoria.php");
    }
}

$db->close();
echo $mensaje;

?>