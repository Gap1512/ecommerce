<?php

    $connection = databaseConnection();

    $result=pg_query($connection, "SELECT * FROM web.Categories");

    echo '<select multiple name="Categories[]">';

    while($category=pg_fetch_assoc($result)){
        echo '<option value='.$category['categoryid'].'>'.$category['categoryname'].'</option><br>';
    }

    echo '</select><br>';

    pg_close($connection);

?>
