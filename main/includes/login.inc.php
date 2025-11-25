<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    
    try {
        require_once "dbh.inc.php";
        require_once "login_model.inc.php";
        require_once "login_contr.inc.php";

        // Error handling
        $errors = [];

        if (is_input_empty($username, $pwd)) {
            $errors["empty_input"] = 'All fields must be filled in!';
        }

        $result = get_user($pdo, $username);

        if (is_username_wrong($result)) {
            $errors["login_incorrect"] = 'Username does not exist!';
        }
        if (!is_username_wrong($result) && is_password_wrong($pwd, $result['pwd'])) {
            $errors['login_incorrect'] = 'Wrong password!';
        }
        

        require_once 'config.inc.php';

        if ($errors) {
            $_SESSION['errors_login'] = $errors;

            header("Location: ../login.php");
            die();
        } 

        $newSessionId = session_create_id(); // Combine session id with user id
        $sessionId = $newSessionId . "_" . $result["id"];
        session_id($sessionId); //Set new id

        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_username"] = htmlspecialchars($result["username"]);
        $_SESSION['last_regeneration'] = time();

        header("Location: ../main_page.php?login=success");
        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        die("Login failed: " . $e->getMessage());
        
    }

    } 
else {
    header("Location: ../login.php");
    die();
}