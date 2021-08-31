<!doctype html>
<html lang="en">
<head>
    <?php  require_once("../containers/header.php");?>
    <title>Admin prijava</title>
    <link href="../style/general.css"  rel="stylesheet" type="text/css">
</head>
<body>
<?php  require_once("../containers/navigation.php");?>
<form id="form_admin" action="../functionality/adminLogin.php" method="post">
    <h2>Admin sajta</h2>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Admin</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="pass1">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Lozinka</label>
        <input type="password" class="form-control" id="exampleInputPassword2" name="pass2">
    </div>
   <?php if(isset($_GET['fail'])){echo "<p id='fail'>Pristup odbijen</p>";} ?>
    <button type="submit" class="btn btn-primary">Pristupi</button>
</form>
</body>
</html>
