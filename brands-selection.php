<?php

    $connection = databaseConnection();

    $result=pg_query($connection, "SELECT * FROM web.Brands");

    echo '<select multiple name="Brands[]">';

    while($brand=pg_fetch_assoc($result)){
        echo '<option value='.$brand['brandid'].'>'.$brand['brandname'].'</option><br>';
    }

    echo '</select><br>';

    pg_close($connection);

?>
