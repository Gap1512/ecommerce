<head>
<link rel="stylesheet" href="css/fontawesome/css/all.css">
<link rel="stylesheet" href="css/produtos.css">
<?php include 'bootstrap_include.php'?>
<script type="text/javascript" src="js/editable-table.js"></script>


</head>
<body>
<?php include 'navbar.php' ?>
<div class="table-content">
    <table class="table table-borded table-responsive table-striped " id="table-list">
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
            </tr>
        </thead>
        <tbody>
        
            <?php
                require 'database/database-connection.php';
                include 'database/products-selection.php';
            ?>

        </tbody>
    </table>
    <a href="/ecommerce/products-register.php">
        <button class="btn btn-info" id="add"><span class="fas fa-plus-circle"></span> Add New Products</button>
    </a>
</div>
</body>
    
