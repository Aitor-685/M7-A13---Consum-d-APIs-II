<?php

$db = new SQLite3('../Base_datos/mobiliari.db');

$id = $_POST['id'];
$nom = $_POST['nom'];
$preu = $_POST['preu'];
$descripcio = $_POST['descripcio'];
$imatge = $_POST['imatge'];

$existe = $db->querySingle("SELECT COUNT(*) FROM productes WHERE prod_nom = '$nom' AND prod_id != $id");

if ($existe > 0) {
    $mensaje = "Error: Ya existe un producto con este nombre.";
    header("Refresh: 2; url=modificarProducte.php?id=$id");
    echo $mensaje;
    exit;
}

if (empty($imatge)) {
    $imatge = $db->querySingle("SELECT prod_imatge FROM productes WHERE prod_id = $id");
}

$actualizar = $db->exec("UPDATE productes SET prod_nom = '$nom', prod_preu = '$preu', prod_descripcio = '$descripcio', prod_imatge = '$imatge' WHERE prod_id = $id");

if ($actualizar) {
    $mensaje = "Producte actualitzat correctamente.";
    header("Refresh: 2; url=gestioCategories.php");
    echo $mensaje;
} else {
    $mensaje = "Error al actualizar el producte.";
    header("Refresh: 2; url=modificarProducte.php?id=$id");
    echo $mensaje;
}

$db->close();
?>