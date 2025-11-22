<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" href="main.css">
        <title>Password Main-ager Login</title>
    </head>

    <body>

    <div class="titleBlock">
        <h1 id ="mainTitle">Password Main-ager</h1>
    </div>
    
    <form action="formhandler.php" method="POST" id="login_box" >
        <h1 style="color:red">DO NOT ENTER REAL LOGIN INFO HERE YET, THIS IS A TEST FORM</h1>
        <label for="user_entry">Username:</label> <br>
        <input type="text" id="user_entry" name="user_entry"> <br>
        <label for="pass_entry">Password:</label> <br>
        <input type="text" id="pass_entry" name="pass_entry"> <br>     
        <input type ="submit">
    </form>
    Welcome <?php echo $_POST["user_entry"]; ?><br>
    Your password is: <?php echo $_POST["pass_entry"]; ?>
    
    </body>
</html>