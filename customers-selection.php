<?php

    $connection = databaseConnection();

    $result=pg_query($connection, "SELECT * FROM web.Customers");

    echo '<select multiple name="Customers[]">';

    while($customer=pg_fetch_assoc($result)){
        echo '<option value='.$customer['customerid'].'>'.$customer['firstname'].' '.$customer['lastname'].'</option><br>';
    }

    echo '</select><br>';

    pg_close($connection);

?>
