<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    try {
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        // Error handling
        $errors = [];

        if (is_input_empty($username, $pwd, $email)) {
            $errors["empty_input"] = 'All fields must be filled in!';
        }
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = 'Must be a valid email address!';
        }
        if (is_username_taken($pdo, $username)) {
            $errors["username_taken"] = 'Username taken!';
        }
        if (is_email_registered($pdo, $email)) {
            $errors["email_used"] = 'Email already in use!';
        }

        require_once 'config.inc.php';

        if ($errors) {
            $_SESSION['errors_signup'] = $errors;

            $signupData = [
                "username" => $username,
                "email"=> $email,
            ];
            $_SESSION["signup_data"] = $signupData;

            header("Location: ../login.php");
            die();
        }

        create_user($pdo, $pwd, $username, $email);
        header("Location: ../login.php?signup=success");

        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

} else {
    header("Location: ../login.php");
    die();
}