<head>
<link rel="stylesheet" href="css/fontawesome/css/all.css">
<link rel="stylesheet" href="css/customers.css">
<?php include 'bootstrap_include.php' ?>
<link rel="stylesheet" href="css/produtos.css">

</head>
<?php include 'navbar.php' ?>
<?php validadeUser(TRUE); ?>

<div class="table-content">
<h2 class="titulo">Managers:</h2>
    <table class="table table-borded table-responsive table-striped " id="table-list" tabela="managers" campo="managerid">
        <thead class="table-dark">
            <tr>
                <th>ID </th>
                <th>Email </th>
                <th>Password </th>
                <th>First Name </th>
                <th>Last Name </th>
                <th>CPF </th>
                <th>Birth Date </th>
                <th>Adress </th>
                <th>CEP </th>
                <th name="buttons" style="display:none"></th>
            </tr>
        </thead>
        <tbody>
        
            <?php
                require 'database/database-connection.php';
                include 'database/managers-selection.php';
            ?>

        </tbody>
    </table>
    <button class="btn btn-info" id="add"><span class="fas fa-plus-circle"></span> Add New Members</button>
</div>

    <script type="text/javascript" src="js/bootstrap/jquery.min.js"></script>
    <script type="text/javascript" src="js/editable-table.js"></script>
    <script type="text/javascript" src="js/bootstrap/bootstrap.min.js"></script>