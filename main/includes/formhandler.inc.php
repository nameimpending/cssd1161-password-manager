<?php
require_once 'config.inc.php';

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

        $options = [
            'cost' => 12 // Set the processing cost for a hasehd password
        ];
        
        $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);
        

        $stmt -> bindParam(":username", $username);
        $stmt -> bindParam(":pwd", $hashedPwd);
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
 