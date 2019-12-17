<?php

    require 'database-connection.php';

    $connection=databaseConnection();

    pg_prepare($connection, "details", 'SELECT * FROM web.Categories WHERE categoryid=$1');
    pg_prepare($connection, "delete", 'DELETE FROM web.Categories WHERE categoryid=$1');

    include 'init-categories-fields.php';

    if ($_POST['categoryModify'] == 'Delete'){
        
        $category=$_POST['category'];
        $result=pg_execute($connection, "delete", array($category));
        if ($result !== FALSE) echo "Category $category deleted from database";
        else echo "An error ocurred, it was not possible to delete, try deleting the products from category $category";
    
    }

    if ($_POST['categoryModify'] == 'Details'){

        echo '<table>
                  <thead>
                  <tr>
                      <th>ID </th>
                      <th>Name </th>
                  </tr>
                 <tbody>';
        
        $category=$_POST['category'];
        $details=pg_fetch_assoc(pg_execute($connection, "details", array($category)));
        echo '<tr>';
        echo '<td>'.$details['categoryid'].'</td>';    
        echo '<td>'.$details['categoryname'].'</td>';       
        echo '</tr>';

    echo '</table><br>';
    
    }

    pg_close($connection);

?>
