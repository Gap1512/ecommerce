<?php require 'user-validation.php'; validadeUser(TRUE); ?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Brands Register</title>
</head>
<body>
     
    <form id="brand-register" action="/ecommerce/database/brand-insert.php" method="post">
         <h1>Register a new brand</h1>
         <input type="text" name="brandName" placeholder="Name" autofocus><br>
         <input type="number" min="0" max="5" step="0.1" name="brandRating" placeholder="Rating"><br>
         <input type="submit" value="Register"><br>
    </form>

    <form id="brand-modify" action="/ecommerce/database/brand-modify.php" method="post">
        <h1>Registered brands</h1>

        <?php
             require 'database/database-connection.php';
             include 'database/brands-selection.php';
        ?>

        <input type="submit" name="brandModify" value="Details">
        <input type="submit" name="brandModify" value="Delete">
    </form>

</body>
</html>
