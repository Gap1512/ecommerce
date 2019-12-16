<head>
<link rel="stylesheet" href="css/fontawesome/css/all.css">
<link rel="stylesheet" href="css/produtos.css">
<?php include 'bootstrap_include.php'?>
</head>

<body>
<?php include 'navbar.php' ?>
<div class="table-content">
    <table class="table table-borded table-responsive table-striped " id="table-list" tabela="products" campo="productid">
        <thead class="table-dark">
            <tr>
                <th>ID </td>
                <th>Name </td>
                <th>Price </td>
                <th>Description </td>
                <th>Stock </td>
                <th>Weight </td>
                <th>Volume</td>
                <th>Rating </td>
                <th>Adress </td>
                <th>CEP </td>
                <th tipo="select" selection="brands">Brand</th>
                <th tipo="select" selection="categories">Category</th>
                <th name="buttons"></th>
            </tr>
        </thead>
        <tbody>
        
            <?php
                include 'database/products-selection.php';
            ?>

        </tbody>
    </table>
    <button class="btn btn-info" id="add"><span class="fas fa-plus-circle"></span> Add New Products</button>
</div>

</body>
    
<script type="text/javascript" src="js/editable-table.js"></script>