<?php

    $connection = databaseConnection();

    $result=pg_query($connection, "SELECT * FROM web.products");

    while($product=pg_fetch_assoc($result)){
        echo '<tr><td>'.$product['productid'].'</td>';
        echo '<td><a href="/ecommerce/products-details.php?productID='.$product['productid'].'">'.$product['productname'].'</a></td>';
        echo '<td>'.$product['productprice'].'</td>';
        echo '<td>'.$product['productdescription'].'</td>';
        echo '<td>'.$product['productstock'].'</td>';
        echo '<td>'.$product['productweight'].'</td>';
        echo '<td>'.$product['productvolume'].'</td>';
        echo '<td>'.$product['productrating'].'</td>';
        echo '<td>'.$product['productadress'].'</td>';
        echo '<td>'.$product['productcep'].'</td>';
        echo '</tr>';
    }

    pg_close($connection);

?>
