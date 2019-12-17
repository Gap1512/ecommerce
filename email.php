<head>
<link rel="stylesheet" href="css/fontawesome/css/all.css">
<link rel="stylesheet" href="css/email.css">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php include 'bootstrap_include.php'?>
</head>

<body>
    <?php include 'navbar.php' ?>
    <?php validadeUser(TRUE); ?>
    <div class="container">
        <div class="row">
            <h2>Sistema de Mala Direta</h2>
        </div>
        <form id="emailform">
            <div class="row">
                <textarea class="input" id="subject"></textarea>
            </div>
            <div class="row">
                <textarea class="input" id="body"></textarea>
            </div>
            <div class="row">
                <input type="submit" class="btn btn-default" value="Enviar E-mail Para Todos os Usuários">
            </div>
        </form>
    </div>

</body>

<script type="text/javascript" src="js/email.js"></script>