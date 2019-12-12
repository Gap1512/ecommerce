<?php

    require 'database-connection.php';

    $connection=databaseConnection();

    pg_prepare($connection, "details", 'SELECT * FROM web.Products WHERE productid=$1');
    pg_prepare($connection, "delete", 'DELETE FROM web.Products WHERE productid=$1');

    include 'init-products-fields.php';

    if ($_POST['productModify'] == 'Delete'){
        
        foreach($_POST['Products'] as $product) {
            $result=pg_execute($connection, "delete", array($product));
            if ($result !== FALSE) echo "Product $product deleted from database";
            else echo "An error ocurred, it was not possible to delete";
        }
    
    }

    if ($_POST['productModify'] == 'Details'){

        echo '<table>
                  <thead>
                  <tr>
                      <th>ID </th>
                      <th>Name </th>
                      <th>Price </th>
                      <th>Description </th>
                      <th>Stock </th>
                      <th>Weight </th>
                      <th>Volume </th>
                      <th>Rating </th>
                      <th>Adress </th>
                      <th>CEP </th>
                  </tr>
                 <tbody>';
        
        foreach($_POST['Products'] as $product) {
            $details=pg_fetch_assoc(pg_execute($connection, "details", array($product)));
            echo '<tr>';
            echo '<td>'.$details['productid'].'</td>';
            echo '<td>'.$details['productname'].'</td>';
            echo '<td>'.$details['productprice'].'</td>';  
            echo '<td>'.$details['productdescription'].'</td>';
            echo '<td>'.$details['productstock'].'</td>';
            echo '<td>'.$details['productweight'].'</td>';  
            echo '<td>'.$details['productvolume'].'</td>';
            echo '<td>'.$details['productrating'].'</td>';
            echo '<td>'.$details['productadress'].'</td>';  
            echo '<td>'.$details['productcep'].'</td>';            
            echo '</tr>';
        }

        echo '</table><br>';
    
    }

    pg_close($connection);

?>
