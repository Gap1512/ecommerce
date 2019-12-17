<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Product</title>
    <?php include 'database-util.php' ?>
</head>
<body>
    <?php include 'navbar.php' ?>
    <div style="margin: 10px 20px">
        <?php

            include 'freight.php';

            $productID = $_GET["product_id"];
            $products = loadValuesFromDB("select * from web.Products where ProductID =" . $productID);
            $product = $products[0];
            echo '<img src="'.$product["productimage"].'"></img><br>';
            echo '<strong>Nome do Produto: </strong>'.$product["productname"].'<br>';
            echo '<strong>Preço: </strong>'.$product["productprice"].'<br>';
            echo '<strong>Descrição do Produto: </strong>'.$product["productdescription"].'<br>';
            echo '<strong>Produtos no Estoque: </strong>'.$product["productstock"].'<br>';
            echo '<strong>Peso: </strong>'.$product["productweight"].'<br>';
            echo '<strong>Volume: </strong>'.$product["productvolume"].'<br>';
            echo '<strong>Avaliações: </strong>'.$product["productrating"].'<br>';
            echo '<strong>Endereço do produto: </strong>'.$product["productadress"].'<br>';
            echo '<strong>CEP: </strong>'.$product["productcep"].'<br>';
        
            echo '<form  action="/ecommerce/add-to-cart.php" method="post">
                  <input type="text" name="productQuantity" placeholder="Quantity" autofocus>
                  <input type="hidden" name="productID" value='.$productID.'>
                  <input type="submit" value="Add to cart">
                  </form>';
        
            echo '<form  method="post">
                  <input type="number" min="0" name="customerCEP" placeholder="CEP">
                  <input type="submit" value="Freight">
                  </form>';

        if(isset($_POST["customerCEP"]) && ($_POST["customerCEP"] != NULL)) 
            freightCalculation($product["productcep"], $_POST["customerCEP"],
                 $product["productweight"], $product["productvolume"], $product["productprice"]);

        ?>
    </div>
</body>
</html>
