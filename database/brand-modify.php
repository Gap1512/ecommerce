<?php

    require 'database-connection.php';

    $connection=databaseConnection();

    pg_prepare($connection, "details", 'SELECT * FROM web.Brands WHERE brandid=$1');
    pg_prepare($connection, "delete", 'DELETE FROM web.Brands WHERE brandid=$1');

    include 'init-brands-fields.php';

    if ($_POST['brandModify'] == 'Delete'){
        
        foreach($_POST['Brands'] as $brand) {
            $result=pg_execute($connection, "delete", array($brand));
            if ($result !== FALSE) echo "Brand $brand deleted from database";
            else echo "An error ocurred, it was not possible to delete, try deleting the products from brand $brand";
        }
    
    }

    if ($_POST['brandModify'] == 'Details'){

        echo '<table>
                  <thead>
                  <tr>
                      <th>ID </th>
                      <th>Name </th>
                      <th>Rating </th>
                  </tr>
                 <tbody>';
        
        foreach($_POST['Brands'] as $brand) {
            $details=pg_fetch_assoc(pg_execute($connection, "details", array($brand)));
            echo '<tr>';
            echo '<td>'.$details['brandid'].'</td>';
            echo '<td>'.$details['brandname'].'</td>';
            echo '<td>'.$details['brandrating'].'</td>';            
            echo '</tr>';
        }

        echo '</table><br>';
    
    }

    pg_close($connection);

?>
