<?php
require_once 'includes/config.inc.php';
?>

<head>
    <title>Signup</title>
</head>

<body>
    <h1>PHP Testing Zone</h1>
    <h2>User stuff</h2>
    <h3>Signup</h3>

    <form action="includes/formhandler.inc.php" method="post">
        <input type="text" name="username" placeholder ="Username">
        <input type="password" name="pwd" placeholder="Password">
        <input type="text" name="email" placeholder="E-Mail">
        <button>Signup</button>
    </form>

    <h3>Change account</h3>

    <form action="includes/userupdate.inc.php" method="post">
        <input type="text" name="username" placeholder ="Username">
        <input type="password" name="pwd" placeholder="Password">
        <input type="text" name="email" placeholder="E-Mail">
        <button>Update</button>
    </form>

    <h3>Delete account</h3>

    <form action="includes/userdelete.inc.php" method="post">
        <input type="text" name="username" placeholder ="Username">
        <input type="password" name="pwd" placeholder="Password">
        <button>Delete</button>
    </form>

    <h2> Searching </h2>
    <form class="searchform" action ="search.php" method="post">
        <label for="search">Search for user:</label>
        <input id="search" type="text" name="usersearch" placeholder="Search...">
        <button>Search</button>
    </form>
</body>