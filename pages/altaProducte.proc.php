<?php

$db = new SQLite3('../Base_datos/mobiliari.db');

$nom = $_GET['nom'];
$preu = $_GET['preu'];
$descripcio = $_GET['descripcio'];
$imatge = $_GET['imatge'];
$id = $_GET['cat_id'];

$existe = $db->querySingle("SELECT COUNT(*) FROM productes WHERE prod_nom = '$nom'");

if ($existe > 0) {
    $mensaje = "Error: Ya existe un producto con este nombre.";
    header("Refresh: 2; url=altaProducte.php");
} else {
    $resultados = $db->query("INSERT INTO productes (prod_nom, prod_preu,prod_descripcio, prod_imatge, cat_id) VALUES ('$nom', '$preu','$descripcio', '$imatge', '$id')");
    
    if ($resultados) {
        $mensaje = "Producte insertat correctamente.";
        header("Refresh: 2; url=gestioCategories.php");
    } else {
        $mensaje = "Error al insertar el producte.";
        header("Refresh: 2; url=altaProducte.php");
    }
}

$db->close();
echo $mensaje;

?>
