<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Create Account</title>
</head>
<body>
    <?php include 'navbar.php' ?>
    <form id="customer-register" action="/ecommerce/database/customer-insert.php" method="post">
         <h1>Create Account</h1>
         <input type="text" name="customerEmail" placeholder="Email" autofocus><br>
         <input type="password" name="customerPassword" placeholder="Password"><br>
         <input type="text" name="customerFirstName" placeholder="First Name"><br>
         <input type="text" name="customerLastName" placeholder="Last Name"><br>
         <input type="text" name="customerCPF" placeholder="CPF"><br>
         <input type="date" name="customerBirthDate" placeholder="Birth Date"><br>
         <input type="text" name="customerAdress" placeholder="Adress"><br>
         <input type="number" min="0" name="customerCEP" placeholder="CEP"><br>
 
         <input type="submit" value="Register">
     </form>

</body>
</html>
