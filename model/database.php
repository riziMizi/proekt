<?php
$dsn = 'mysql:host=localhost;dbname=web_proekt;charset=utf8';
$usernameDb = 'root';
$passwordDb = 'root';

try {
    $db = new PDO($dsn, $usernameDb, $passwordDb);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('../errors/database_error.php');
    exit();
}
?>