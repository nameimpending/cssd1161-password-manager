<?php
require_once 'includes/config.inc.php';
require_once 'includes/signup_view.inc.php';
require_once 'includes/login_view.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Password Main-ager Login</title>

</head>

<body>

    <div class="titleBlock">
        <h1 id ="mainTitle">Password Main-ager</h1>
    </div>
    
    <form action="includes/login.inc.php" method="POST" id="login_box" >
        <h1 style="color:red">DO NOT ENTER REAL LOGIN INFO HERE YET, THIS IS A TEST FORM</h1>
        <label for="user_entry">Username:</label> <br>
        <input type="text" id="user_entry" required name="username" placeholder="Username"> <br>

        <label for="pass_entry">Password:</label> <br>
        <input type="password" id="pass_entry" required name="pwd" placeholder="Password"> <br>   

        <input type ="submit">
    </form>

    <?php
    check_login_errors();
    ?>

    <h3>Sign up</h3>

    <form action="includes/signup.inc.php" method="post" id="login_box">
        <?php
        signup_inputs();
        ?>
        <button>Sign Up</button>
    </form>
    <?php
    check_signup_errors();
    ?>
</body>
</html>