<head>
<link rel="stylesheet" href="css/fontawesome/css/all.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="css/produtos.css">

</head>
<div class="table-content">
    <table class="table table-borded table-responsive table-striped " id="table-list">
        <thead class="table-dark">
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>Preço</td>
                <td>Descrição</td>
                <td>Estoque</td>
                <td>Peso</td>
                <td>Volume</td>
                <td>Avaliação</td>
                <td>Endereço</td>
                <td>CEP</td>
            </tr>
        </thead>
        <tbody>
        
            <?php
                require 'database/database-connection.php';
                include 'database/products-selection.php';
            ?>

        </tbody>
    </table>
    <button class="btn btn-info" id="add"><span class="fas fa-plus-circle"></span> Add New Members</button>
</div>

    <script type="text/javascript" src="js/bootstrap/jquery.min.js"></script>
    <script type="text/javascript" src="js/editable-table.js"></script>
    <script type="text/javascript" src="js/bootstrap/bootstrap.min.js"></script>