<?php

    $connection = databaseConnection();

    $result=pg_query($connection, "SELECT * FROM web.Categories");

    echo '<select multiple name="productCategories[]">';

    while($category=pg_fetch_assoc($result)){
        echo '<option value='.$category['categoryid'].'>'.$category['categoryname'].'</option><br>';
    }

    echo '</select>';
    echo '<a href="/ecommerce/categories-register.html" target="_blank">New Category</a><br>';

    pg_close($connection);

?>
