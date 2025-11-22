<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = htmlspecialchars($_POST["user_entry"]);
    $pass = htmlspecialchars($_POST["pass_entry"]);
    echo "Welcome $username";
    echo "Your password is: $pass";

    header("Location: ../main_page.php")
}

