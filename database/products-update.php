<?php

    require 'database-connection.php';

    $connection=databaseConnection();

    pg_prepare($connection, "update",
        'UPDATE web.products
        SET productname=$1, productprice=$2, productdescription=$3, productstock=$4, productweight=$5, productvolume=$6, productrating=$7, productadress=$8, productcep=$9
        WHERE productid=$10');
    pg_prepare($connection, "brands", 'UPDATE web.ProductBrands SET brandid = $2 WHERE productid = $1');
    pg_prepare($connection, "categories", 'UPDATE web.ProductCategories SET CategoryID = $2 WHERE productid = $1');


    include 'init-products-fields.php';

    $result = pg_execute($connection, "update",
              array($_POST['name'],
                    $_POST['price'],
                    $_POST['description'],
                    $_POST['stock'],
                    $_POST['weight'],
                    $_POST['volume'],
                    $_POST['rating'],
                    $_POST['adress'],
                    $_POST['cep'],
                    $_POST['id']));

    
    if ($result !== FALSE){
        pg_execute($connection, "brands", array($_POST['id'], $_POST['brand']));
            
        pg_execute($connection, "categories", array($_POST['id'], $_POST['category']));
    }

    pg_close($connection);

?>
