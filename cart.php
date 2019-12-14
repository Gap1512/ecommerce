<head>
<link rel="stylesheet" href="css/fontawesome/css/all.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="css/produtos.css">

</head>
<div class="table-content">
    <table class="table table-borded table-responsive table-striped " id="table-list">
        <thead class="table-dark">
            <tr>
                <th>Name </th>
                <th>Price </th>
                <th>Quantity </th>
                <th>Total Price </th>
            </tr>
        </thead>
        <tbody>
        
            <?php
                require 'database/database-connection.php';
                include 'database/cart-selection.php';
            ?>

        </tbody>
    </table>
</div>

    <script type="text/javascript" src="js/bootstrap/jquery.min.js"></script>
    <script type="text/javascript" src="js/editable-table.js"></script>
    <script type="text/javascript" src="js/bootstrap/bootstrap.min.js"></script>
