<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Products Register</title>
</head>
<body>
    <form id="product-register" action="/ecommerce/product-insert.php" method="post">
         <h1>Register a new product</h1>
         <input type="text" name="productName" placeholder="Name" autofocus><br>
         <input type="number" min="0" step="0.01" name="productPrice" placeholder="Price"><br>
         <input type="number" min="0" name="productStock" placeholder="Stock"><br>
         <input type="number" min="0" step="0.01" name="productWeight" placeholder="Weight"><br>
         <input type="number" min="0" step="0.01" name="productVolume" placeholder="Volume"><br>
         <input type="number" min="0" max="5" step="0.1" name="productRating" placeholder="Rating"><br>
         <input type="text" name="productAdress" placeholder="Adress"><br>
         <input type="number" min="0" name="productCEP" placeholder="CEP"><br>
         <textarea name="productDescription" placeholder="Description"></textarea><br>

         <?php
             require 'database-connection.php';
             include 'brands-selection.php';
             echo '<a href="/ecommerce/brands-register.php" target="_blank">New Brand</a><br>';
             include 'categories-selection.php';
             echo '<a href="/ecommerce/categories-register.php" target="_blank">New Category</a><br>';
         ?>
 
         <input type="submit" value="New">
     </form>
</body>
</html>
