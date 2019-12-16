<?php
    $connection = databaseConnection();

    $categories=pg_query($connection, "SELECT * FROM web.Categories");
    $selected = pg_query($connection, "SELECT brandid FROM web.productbrands WHERE productid =".$product['productid']);

    echo '<select class="selectpicker" name="category">';

    while($category=pg_fetch_assoc($categories)){
        if($brand['brandid'] == $selected){
            echo "<option selected='true' value=".$category['categoryid'].">".$category['categoryname']."</option><br>";
        }
            
        else{
            echo '<option value='.$category['categoryid'].'>'.$category['categoryname'].'</option><br>';
        }
        
    }

    echo '</select><br>';

    pg_close($connection);

?>
