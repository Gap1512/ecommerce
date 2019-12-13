<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Categories Register</title>
</head>
<body>
    <form id="categories-register" action="/ecommerce/category-insert.php" method="post">
         <h1>Register a new category</h1>
         <input type="text" name="categoryName" placeholder="Name" autofocus><br>
         <input type="submit" value="Register">
     </form>

     <form id="category-modify" action="/ecommerce/category-modify.php" method="post">
        <h1>Registered categories</h1>

        <?php
             require 'database/database-connection.php';
             include 'database/categories-selection.php';
        ?>

        <input type="submit" name="categoryModify" value="Details">
        <input type="submit" name="categoryModify" value="Delete">
    </form>
</body>
</html>
