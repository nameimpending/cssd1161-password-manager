<?php
require_once 'includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try {
        require_once("dbh.inc.php");
        
        // Prepare SQL query 
        $query = "DELETE FROM users WHERE username = :username AND pwd = :pwd;";
        //$stmt = statement
        $stmt = $pdo -> prepare($query);

        $stmt -> bindParam(":username", $username);
        $stmt -> bindParam(":pwd", $pwd);

        $stmt -> execute();
        
        //Close the connection
        $pdo = null;
        $stmt = null;
        header("Location: ../main_page.php");

        die();
    } catch (Exception $e) {
        die("Query failed: " . $e->getMessage());
    }

    
} else {
    header("Location: ../login.php");
}
 