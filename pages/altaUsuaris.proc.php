<?php
session_start();

$db = new SQLite3('../Base_datos/mobiliari.db');

$username = trim($_POST['username']);
$password = $_POST['password'];

$password = md5($password);

$stmt = $db->prepare("SELECT * FROM users WHERE nom = :username");
$stmt->bindValue(':username', $username, SQLITE3_TEXT);
$result = $stmt->execute();
$user = $result->fetchArray(SQLITE3_ASSOC);

if ($user) {
    if ($user['contrasenya'] === $password) {
        $_SESSION['username'] = $user['nom'];
        $_SESSION['user_id'] = $user['id'];
        echo "Benvingut, " . htmlspecialchars($user['nom']) . "!";
        header("Location: gestioCategories.php");
        exit;
    } else {
        echo "Error: Contrasenya incorrecta.";
        header("Location: altaUsuaris.php");
        exit;
    }
} else {
    echo "Error: Usuari no trobat.";
    header("Location: altaUsuaris.php");
    exit;
}

$db->close();
?>
