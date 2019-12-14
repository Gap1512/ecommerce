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
            $productID = $_GET["product_id"];
            $products = loadValuesFromDB("select * from web.Products where ProductID =" . $productID);
            $product = $products[0];
            echo "<img src='images/iphoneX.jpg'></img><br>";
            echo '<strong>Nome do Produto: </strong>'.$product["productname"].'<br>';
            echo '<strong>Preço: </strong>'.$product["productprice"].'<br>';
            echo '<strong>Descrição do Produto: </strong>'.$product["productdescription"].'<br>';
            echo '<strong>Produtos no Estoque: </strong>'.$product["productstock"].'<br>';
            echo '<strong>Peso: </strong>'.$product["productweight"].'<br>';
            echo '<strong>Volume: </strong>'.$product["productvolume"].'<br>';
            echo '<strong>Avaliações: </strong>'.$product["productrating"].'<br>';
            echo '<strong>Endereço do produto: </strong>'.$product["productadress"].'<br>';
            echo '<strong>CEP: </strong>'.$product["productcep"].'<br>';
        ?>
        <form action="adicionar_ao_carrinho.php" method="GET" style="margin:10px">
            <input type="submit" value="Adicionar ao Carrinho"></input>
        </form>
    </div>
</body>
</html>