<?php
    require 'database-connection.php';
    $connection = databaseConnection();

    $brands=pg_query($connection, "SELECT * FROM web.Brands");

    echo '<select class="selectpicker" name="brand">';
    
    
    while($brand=pg_fetch_assoc($brands)){
        echo '<option value='.$brand['brandid'].'>'.$brand['brandname'].'</option><br>';
    }

    echo '</select><br>';

    pg_close($connection);

?>
