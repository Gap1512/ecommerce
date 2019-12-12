<?php

    $connection = databaseConnection();

    $result=pg_query($connection, "SELECT * FROM web.Products");

    echo '<select multiple name="Products[]">';

    while($product=pg_fetch_assoc($result)){
        echo '<option value='.$product['productid'].'>'.$product['productname'].'</option><br>';
    }

    echo '</select><br>';

    pg_close($connection);

?>
