<?php
session_start();
$host = 'localhost';
$db = '1224036';
$user = '1224036';
$pass = 'world4me';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Password Hash Helper
function hashPassword($pass) {
    return password_hash($pass, PASSWORD_DEFAULT);
}

function verifyPassword($pass, $hash) {
    return password_verify($pass, $hash);
}
?>