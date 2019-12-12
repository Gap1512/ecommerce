<?php

    require 'database-connection.php';

    $connection=databaseConnection();

    pg_prepare($connection, "insert",
                      'INSERT INTO web.Products(ProductName, ProductPrice, ProductDescription, ProductStock, ProductWeight, ProductVolume, ProductRating, ProductAdress, ProductCEP) VALUES($1, $2, $3, $4, $5, $6, $7, $8, $9) RETURNING ProductID');
    pg_prepare($connection, "brands", 'INSERT INTO web.ProductBrands(ProductID, BrandID) VALUES($1, $2)');
    pg_prepare($connection, "categories", 'INSERT INTO web.ProductCategories(ProductID, CategoryID) VALUES($1, $2)');

    include 'init-products-fields.php';

    $result = pg_fetch_result(pg_execute($connection, "insert",
                              array($_POST['productName'],
                                    $_POST['productPrice'],
                                    $_POST['productDescription'],
                                    $_POST['productStock'],
                                    $_POST['productWeight'],
                                    $_POST['productVolume'],
                                    $_POST['productRating'],
                                    $_POST['productAdress'],
                                    $_POST['productCEP'])), 0, 0); //ID is returned from query

    if ($result !== FALSE){
        
        foreach($_POST['productBrands'] as $brand) {
            pg_execute($connection, "brands", array($result, $brand));
        }
                
        foreach($_POST['productCategories'] as $category) {
            pg_execute($connection, "categories", array($result, $category));
        }

        echo 'Product inserted on database';
        
    } else {
        
        echo 'An error ocurred, it was not possible to insert the product';
    
    }

    pg_close($connection);

?>
