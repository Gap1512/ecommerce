<?php
    $connection = databaseConnection();

    $brands=pg_query($connection, "SELECT * FROM web.Brands");
    $selected = pg_query($connection, "SELECT brandid FROM web.productbrands WHERE productid =".$product['productid']);

    echo '<select class="selectpicker" name="brand">';
    
    
    while($brand=pg_fetch_assoc($brands)){
        if($brand['brandid'] == pg_fetch_result($selected,0,0)){
            echo "<option selected='true' value=".$brand['brandid'].">".$brand['brandname']."</option><br>";
        }
            
        else{
            echo '<option value='.$brand['brandid'].'>'.$brand['brandname'].'</option><br>';
        }

    }

    echo '</select><br>';

    pg_close($connection);

?>
