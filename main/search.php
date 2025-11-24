<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $usersearch = $_POST["usersearch"];

    try {
        require_once("includes/dbh.inc.php");
        
        // Prepare SQL query 
        $query = "SELECT * FROM comments WHERE username = :usersearch;";
        //$stmt = statement
        $stmt = $pdo -> prepare($query);

        $stmt -> bindParam(":usersearch", $usersearch);
        $stmt -> execute();
        
        $results = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        //Close the connection
        $pdo = null;
        $stmt = null;
        
    } catch (Exception $e) {
        die("Query failed: " . $e->getMessage());
    }

} else {
    header("Location: ../index.php");
}
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Search</title>

</head>

<body>
    
    <h3>Search results:</h3>
    <section>
    <?php
    if (empty($results)) {
        echo "<div>";
        echo "<p>No results found with this search!</p>";
        echo "<div>";
    }
    else {
        foreach ($results as $row) {
            echo "<div>";
            echo "<h4>" . htmlspecialchars($row["username"]) . "</h4>";
            echo "<p>" . htmlspecialchars($row["comment_text"]) . "</p>";
            echo "<p>" . htmlspecialchars($row["created_at"]) . "</p>";
            echo "</div>";
        }
    }
    ?>
    </section>
</body>

</html>