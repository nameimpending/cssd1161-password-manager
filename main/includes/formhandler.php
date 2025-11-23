<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    
    $username = htmlspecialchars($_POST["user_entry"]);
    $pass = htmlspecialchars($_POST["pass_entry"]);
    if (empty($username) || empty($pass)) {
        exit();
        header("Location: ../login.php")
    }
    echo "Welcome $username";
    echo "Your password is: $pass";

    header("Location: ../main_page.php")
} else {
    header("Location: ../login.php")
}
 