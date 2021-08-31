<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navigation">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="../pages/about.php">O Nama</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/books.php">Pretraži knjige</a>
                </li>
                <?php
                session_start();
                if(isset($_SESSION["admin"]))
                {
                    require_once('adminTrue.php');
                }
                else{
                    require_once ("adminFalse.php");
                }
                ?>

            </ul>
        </div>
    </div>
</nav>