<!doctype html>
<html lang="en">

<head>
    <?php require_once("../containers/header.php"); ?>
    <title>Izmena knjiga</title>
    <link href="../style/general.css" rel="stylesheet" type="text/css">
    <link href="../style/change-books.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php require_once("../containers/navigation.php"); ?>
    <?php
    if (!isset($_SESSION['admin'])) {
        header('Location:../index.php');
    }
    ?>
    <div class="change-books-page">
        <div class="change-books-navigation">
            <div class="change-books-list-item" id="addBookItemList">Dodaj Knjigu</div>
            <div class="change-books-list-item" id="editBOokItemList">Izmeni Knjigu</div>
        </div>

        <div class="add-book-block" id="add-book-block">
            <div class="add-book-form">

                <form id="add-book-form" action="">
                    <h2>Nova Knjiga</h2>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Naslov</label>
                        <input type="text" class="form-control" id="bookNameInput" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Autor</label>
                        <input type="text" class="form-control" id="bookAuthorInput">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Godina Izdanja</label>
                        <input type="number" class="form-control" id="yearBookAuthor">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Opis</label>
                        <textarea name="Text1" id="DesriptionBookAuthor" class="form-control" rows="5"></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">Dodaj</button>
                </form>

            </div>
        </div>

        <div class="edit-book-block hidden" id="edit-book-block">
            <div class="filter-block">
                <h2>Filteri za pretragu</h2>
                <form id="formFilter" action="">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Naziv knjige</label>
                        <input type="text" class="form-control" id="bookNameInput1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Autor</label>
                        <input type="text" class="form-control" id="bookAuthorInput1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Godina Izdanja</label>
                        <input type="number" class="form-control" id="yearBookAuthor1">
                    </div>
                    <button class="btn btn-primary" type="submit">Pretrazi</button>
                </form>
            </div>
            <div class="items-block">

            </div>
        </div>

        <div class="modal none" id="modal">
            <div class="add-book-form2">

                <p id="izlaz">X</p>
                <form id="add-book-form2" action="">
                    <h2>IZmeni knjigu</h2>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Naslov</label>
                        <input type="text" class="form-control" id="bookNameInput2" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Autor</label>
                        <input type="text" class="form-control" id="bookAuthorInput2">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Godina Izdanja</label>
                        <input type="number" class="form-control" id="yearBookAuthor2">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Opis</label>
                        <textarea name="Text1" id="DesriptionBookAuthor2" class="form-control" rows="5"></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">Dodaj</button>
                </form>

            </div>
        </div>
    </div>
</body>
<script src=" ../javascript/admin.js">
</script>

</html>