<?php

    require 'database/database-connection.php';

    $connection=databaseConnection();

    pg_prepare($connection, "details", 'SELECT * FROM web.Customers WHERE customerid=$1'); //Security breach, password is being retrieved as well
    pg_prepare($connection, "delete", 'DELETE FROM web.Customers WHERE customerid=$1');

    include 'database/init-customers-fields.php';

    if ($_POST['customerModify'] == 'Delete'){
        
        foreach($_POST['Customers'] as $customer) {
            $result=pg_execute($connection, "delete", array($customer));
            if ($result !== FALSE) echo "Customer $customer deleted from database";
            else echo "An error ocurred, it was not possible to delete";
        }
    
    }

    if ($_POST['customerModify'] == 'Details'){

        echo '<table>
                  <thead>
                  <tr>
                      <th>ID </th>
                      <th>Email </th>
                      <th>First Name </th>
                      <th>Last Name </th>
                      <th>CPF </th>
                      <th>Birth Date </th>
                      <th>Adress </th>
                      <th>CEP </th>
                  </tr>
                 <tbody>';
        
        foreach($_POST['Customers'] as $customer) {
            $details=pg_fetch_assoc(pg_execute($connection, "details", array($customer)));
            echo '<tr><td>'.$details['customerid'].'</td>';
            echo '<td>'.$details['email'].'</td>';
            echo '<td>'.$details['firstname'].'</td>';  
            echo '<td>'.$details['lastname'].'</td>';
            echo '<td>'.$details['cpf'].'</td>';
            echo '<td>'.$details['birthdate'].'</td>';  
            echo '<td>'.$details['adress'].'</td>';  
            echo '<td>'.$details['cep'].'</td>';            
            echo '</tr>';
        }

        echo '</table><br>';
    
    }

    pg_close($connection);

?>
