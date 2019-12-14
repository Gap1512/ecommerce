<?php require 'user-validation.php'; validadeUser(TRUE); ?>

<head>
<link rel="stylesheet" href="css/fontawesome/css/all.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="css/produtos.css">

</head>
<div class="table-content">
    <table class="table table-borded table-responsive table-striped " id="table-list">
        <thead class="table-dark">
            <tr>
                <th>ID </th>
                <th>Email </th>
                <th>First Name </th>
                <th>Last Name </th>
                <th>CPF </th>
                <th>Birth Date </th>
                <th>Adress </th>
                <th>CEP </th>
                <th>User Type </th>
            </tr>
        </thead>
        <tbody>
        
            <?php
                require 'database/database-connection.php';
                include 'database/customers-selection.php';
            ?>

        </tbody>
    </table>
    <button class="btn btn-info" id="add"><span class="fas fa-plus-circle"></span> Add New Members</button>
</div>

    <script type="text/javascript" src="js/bootstrap/jquery.min.js"></script>
    <script type="text/javascript" src="js/editable-table.js"></script>
    <script type="text/javascript" src="js/bootstrap/bootstrap.min.js"></script>
