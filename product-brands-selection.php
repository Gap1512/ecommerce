<?php

    $connection = databaseConnection();

    $result=pg_query($connection, "SELECT * FROM web.Brands");

    echo '<select multiple name="productBrands[]">';

    while($brand=pg_fetch_assoc($result)){
        echo '<option value='.$brand['brandid'].'>'.$brand['brandname'].'</option><br>';
    }

    echo '</select>';
    echo '<a href="/ecommerce/brands-register.html" target="_blank">New Brand</a><br>';

    pg_close($connection);

?>
