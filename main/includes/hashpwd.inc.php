<?php
require_once 'config.inc.php';

$pwdSignup = "TestPass"; // Replace with POST statement later

$options = [
    'cost' => 12 // Set the processing cost for a hasehd password
];

$hashedPwd = password_hash($pwdSignup, PASSWORD_BCRYPT, $options);

$pwdLogin = "TestPass"; // Replace with POST statement later
password_verify($pwdLogin, $hashedPwd);

if (password_verify($pwdLogin, $hashedPwd)) {
    echo "Hashes are the same.";
} else {
    echo "Hashes are not the same.";
}
    