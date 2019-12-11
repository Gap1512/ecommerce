<?php
    function databaseConnection(){
        $connectionString = "host=localhost port=5432 dbname=ecommerce user=php password=twm1234";
        $connection = pg_connect($connectionString)
                    or die ("It was not possible to connect to the database, try again later");
        return $connection;
    }
?>
