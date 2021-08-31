<!doctype html>
<html lang="en">
<head>
    <?php  require_once("containers/header.php");?>
    <title>Pocetna stranica</title>
    <link href="style/general.css"  rel="stylesheet" type="text/css">
</head>
<body >
<!--Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navigation">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="pages/about.php">O Sajtu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/books.php">Pretraži knjige</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/admin.php">Admin prijava</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="title_container">
    <h1 id="index_title">Pretrazite bilo koju knjigu na našem sajtu!</h1>
    <a href="pages/books.php"><button id="button1">Pretraži</button></a>
</div>
</body>
</html>
