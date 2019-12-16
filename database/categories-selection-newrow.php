<?php
    require 'database-connection.php';
    $connection = databaseConnection();

    $categories=pg_query($connection, "SELECT * FROM web.Categories");

    echo '<select class="selectpicker" name="category">';

    while($category=pg_fetch_assoc($categories)){
        echo '<option value='.$category['categoryid'].'>'.$category['categoryname'].'</option><br>';
    }

    echo '</select><br>';

    pg_close($connection);

?>
