<?php
require_once 'config.inc.php';

$host = 'localhost'; // Must be changed on a live server
$dbname = 'main_database';
$dbusername = "root";
$dbpassword = "";

try {
    // Login
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    // Error handling
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

