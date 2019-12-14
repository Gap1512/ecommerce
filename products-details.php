<?php

    require 'database/database-connection.php';

    $connection=databaseConnection();

    pg_prepare($connection, "details", 'SELECT * FROM web.Products WHERE productid=$1');

    include 'database/init-products-fields.php';
        
    $details=pg_fetch_assoc(pg_execute($connection, "details", array($_GET['productID'])));

if($details !== FALSE){

        echo '<h1>'.$details['productname'].'</h1>';
        echo '<div>R$'.$details['productprice'].'</div>'; 
        echo '<div>Rating: '.$details['productrating'].'</div>'; 
        echo '<div>Buy now, there are only '.$details['productstock'].' in stock</div>';
        echo '<form  action="/ecommerce/add-to-cart.php" method="post">
                  <input type="text" name="productQuantity" placeholder="Quantity" autofocus>
                  <input type="hidden" name="productID" value='.$_GET['productID'].'>
                  <input type="submit" value="Add to cart">
              </form>';
        echo '<h2>Details</h2>';
        echo '<div>Weight: '.$details['productweight'].'</div>';  
        echo '<div>Volume: '.$details['productvolume'].'</div>';
        echo '<div>More Information: '.$details['productdescription'].'</div>';
        
} else echo "Product not found";

    pg_close($connection);

?>
