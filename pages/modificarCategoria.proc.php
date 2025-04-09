<?php

$db = new SQLite3('../Base_datos/mobiliari.db');

$id = $_POST['id'];
$nom = $_POST['nom'];
$descripcio = $_POST['descripcio'];
$imatge = $_POST['imatge'];

$existe = $db->querySingle("SELECT COUNT(*) FROM categories WHERE cat_nom = '$nom' AND cat_id != $id");

if ($existe > 0) {
    $mensaje = "Error: Ya existe una categoría con este nombre.";
    header("Refresh: 2; url=modificarCategoria.php?id=$id");
    echo $mensaje;
    exit;
}

if (empty($imatge)) {
    $categoria = $db->querySingle("SELECT cat_imatge FROM categories WHERE cat_id = $id", true);
    $imatge = $categoria['cat_imatge'];
}

$actualizar = $db->exec("UPDATE categories SET cat_nom = '$nom', cat_descripcio = '$descripcio', cat_imatge = '$imatge' WHERE cat_id = $id");

if ($actualizar) {
    $mensaje = "Categoría actualizada correctamente.";
    header("Refresh: 2; url=gestioCategories.php");
    echo $mensaje;
} else {
    $mensaje = "Error al actualizar la categoría.";
    header("Refresh: 2; url=modificarCategoria.php?id=$id");
    echo $mensaje;
}

$db->close();
?>