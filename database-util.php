<?php
    require_once 'database/database-connection.php';
    function loadValuesFromDB($expression) //"SELECT * FROM web.Products"
    {
        $connection = databaseConnection();

        $result=pg_query($connection, $expression);

        $array = [];

        while($value=pg_fetch_assoc($result)){
            $array[] = $value;
        }

        pg_close($connection);
    
        return $array;
    }
?>