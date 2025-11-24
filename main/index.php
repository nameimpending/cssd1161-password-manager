<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Document</title>

</head>

<body>

<?php
echo $_SESSION["mysession"];
?>
    <a href="login.php">Link to test login page</a> <br>
    <a href="main_page.php">Link to test main page</a> <br>
    <a href="upload-form.php"> Link to test upload page</a> <br>
</body>
