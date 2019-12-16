<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>
<body>
    <?php include 'navbar.php' ?>
    <form id="login" action="/ecommerce/database/login.php" method="post">
         <h1>Login</h1>
              
         <input type="text" name="customerEmail" placeholder="Email" autofocus><br>
         <input type="password" name="customerPassword" placeholder="Password"><br>
	 
         <input type="submit" value="Login">
	 <a href="/ecommerce/create-account.php" target="_blank">Create an Account</a>
     </form>

</body>
</html>
