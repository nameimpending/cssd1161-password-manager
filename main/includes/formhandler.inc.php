<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    try {
        require_once("dbh.inc.php");
        
        // Prepare SQL query 
        $query = "INSERT INTO users (username, pwd, email) VALUES (:username, :pwd, :email);";
        //$stmt = statement
        $stmt = $pdo -> prepare($query);
        $stmt -> bindParam(":username", $username);
        $stmt -> bindParam(":pwd", $pwd);
        $stmt -> bindParam(":email", $email);
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
 