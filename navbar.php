<?php include_once 'bootstrap_include.php'?>
<?php include_once 'user-validation.php'?>
<script type="text/javascript">
    $(document).ready(function() {
        $('li.active').removeClass('active');
        $('a[href="' + location.pathname + '"]').closest('li').addClass('active'); 
    });
</script>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/ecommerce/index.php"><strong>Ecommerce</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="/ecommerce/index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/ecommerce/products.php">Products</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/ecommerce/customers.php">Users</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/ecommerce/managers.php">Managers</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/ecommerce/brands-register.php">Brands</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/ecommerce/categories-register.php">Categories</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/ecommerce/cart.php">Cart</a>
        </li>
        </ul>
        <ul class="navbar-nav" id="navbarNavUser" <?php echo setStyleVisibility('isLoggedIn',true)?>>
        <li class="nav-item">
            <a class="nav-link" href="/ecommerce/create-account.php">Create an account</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/ecommerce/login.php">Login</a>
        </li>
        </ul>
        <ul class="navbar-nav" id="navbarNavUserLogged" <?php echo setStyleVisibility('isLoggedIn',false)?>>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo getUserCompleteName(); ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="/ecommerce/logout.php">Logout</a>
            </div>
        </li>
        </ul>
    </div>
</nav>
