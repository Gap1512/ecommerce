<?php

    $connection = databaseConnection();

    $result=pg_query($connection, "SELECT c.customerid, c.email, c.firstname, c.lastname, c.cpf, c.birthdate, c.adress, c.cep, p.relname as usertype
                                   FROM web.Customers c, pg_class p 
                                   WHERE c.tableoid = p.oid");

    while($details=pg_fetch_assoc($result)){
        echo '<tr><td>'.$details['customerid'].'</td>';
        echo '<td>'.$details['email'].'</td>';
        echo '<td>'.$details['firstname'].'</td>';  
        echo '<td>'.$details['lastname'].'</td>';
        echo '<td>'.$details['cpf'].'</td>';
        echo '<td>'.$details['birthdate'].'</td>';  
        echo '<td>'.$details['adress'].'</td>';  
        echo '<td>'.$details['cep'].'</td>';     
        echo '<td>'.$details['usertype'].'</td>';            
        echo '</tr>';
    }

    pg_close($connection);

?>
