<?php

    require 'database-connection.php';

    $connection=databaseConnection();

    pg_prepare($connection, "insert",
                      'INSERT INTO web.Products(ProductName, ProductPrice, ProductDescription, ProductStock, ProductWeight, ProductVolume, ProductRating, ProductAdress, ProductCEP) VALUES($1, $2, $3, $4, $5, $6, $7, $8, $9) RETURNING ProductID');
    pg_prepare($connection, "brands", 'INSERT INTO web.ProductBrands(ProductID, BrandID) VALUES($1, $2)');
    pg_prepare($connection, "categories", 'INSERT INTO web.ProductCategories(ProductID, CategoryID) VALUES($1, $2)');

    include 'init-products-fields.php';

    $result = pg_execute($connection, "insert",
              array($_POST['name'],
                    $_POST['price'],
                    $_POST['description'],
                    $_POST['stock'],
                    $_POST['weight'],
                    $_POST['volume'],
                    $_POST['rating'],
                    $_POST['adress'],
                    $_POST['cep']));

    $id=pg_fetch_result($result, 0, 0);

    if ($result !== FALSE){
            pg_execute($connection, "brands", array($id, $_POST['brand']));
                
            pg_execute($connection, "categories", array($id, $_POST['category']));
        
    }

    pg_close($connection);
    echo $id;

?>
