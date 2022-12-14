<?php
require "settings/init.php";

if (!empty($_POST["data"])){
    $data = $_POST["data"];

    $sql = "INSERT INTO users (userFornavn, userEfternavn, userTelefon, userEmail, userPass) VALUES (:userFornavn, :userEfternavn, :userTelefon, :userEmail, :userPass)";
    $bind = [":userFornavn" => $data["userFornavn"], ":userEfternavn" => $data["userEfternavn"], ":userTelefon" => $data["userTelefon"], ":userEmail" => $data["userEmail"], ":userPass" => $data["userPass"]];

    $db->sql($sql, $bind, false);

}

?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Indsæt til database</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/b7f7f27b49.js" crossorigin="anonymous"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.tiny.cloud/1/bpmvvjjsg56di8tqwy5ltbdzo0v191lccrlxro1wzbiasabg/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>


<nav class="mobile-nav">
    <a href="#" class="bloc-icon package-navbar">
        <div class="callplusmail-navbar">
            <i class="fa-solid fa-plus text-white"></i>
        </div>
    </a>
    <a href="#" class="bloc-icon settings-navbar">
        <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" fill="currentColor" class="bi bi-hexagon-fill text-white" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8.5.134a1 1 0 0 0-1 0l-6 3.577a1 1 0 0 0-.5.866v6.846a1 1 0 0 0 .5.866l6 3.577a1 1 0 0 0 1 0l6-3.577a1 1 0 0 0 .5-.866V4.577a1 1 0 0 0-.5-.866L8.5.134z"/>
        </svg>
        <i class="fa-solid fa-box-open text-dark"></i>
        </div>
    </a>
    <a href="#" class="bloc-icon plus-navbar">
        <div class="callplusmail-navbar">
            <i class="fa-solid fa-gear text-white"></i>
        </div>
    </a>
</nav>

<div class="container-fluid">
    <div class="row mt-5 mb-3">
        <div class="col-2 backbtn text-white">
            <a href="settings.html">
                <a href="index.html">
                    <div class="backbtn">
                        <i class="fa-solid fa-arrow-left"></i>
                    </div>
                </a>
            </a>
        </div>
        <div class="col-10 forgotten-pass text-white text-start">
            Opret bruger
        </div>
    </div>
    <div class="row">
        <div class="little-usertext text-white text-start">
            Brug venligst den samme e-mail eller telefonnummer<br>, som du har brugt til bestilling af pakker
        </div>
    </div>

</div>

<div class="container-fluid justify-content-between d-flex">
    <form class="make-user" method="post" action="insert.php">
        <div class="row">
            <div class="col-12 col-md-6">
                <label for="userFornavn">Fornavn</label>
                <input class="form-control" type="text" name="data[userFornavn]" id="userFornavn" placeholder="Fornavn" value="">
            </div>
            <div class="col-12 col-md-6">
                <label for="pakkeAfhentningskode">Efternavn</label>
                <input class="form-control" type="text" name="data[userEfternavn]" id="userEfternavn" placeholder="Efternavn" value="">

            </div>
            <div class="col-12 col-md-6">
                <label for="userTelefon">Telefon</label>
                <input class="form-control" type="number" name="data[userTelefon]" id="userTelefon" placeholder="Telefonnummer" value="">

            </div>
            <div class="col-12 col-md-6">
                <label for="userPass">Adgangskode</label>
                <input class="form-control" type="password" name="data[userPass]" id="userPass" placeholder="Adgangskode" value="">


            </div>
            <div class="col-12 col-md-6">
                <label>Adgangskode</label>
                <input class="form-control" type="password" placeholder="Gentag adgangskode" value="">


            </div>
            <div class="col-12 col-md-6">
                <label for="userEmail">E-mail</label>
                <input class="form-control" type="text" name="data[userEmail]" id="userEmail" placeholder="E-mail" value="">

            </div>
            <div class="col-12 col-md-6">
                <label>E-mail</label>
                <input class="form-control" type="text"id="userEmail" placeholder="Gentag e-mail" value="">

            </div>


            <div class="col-12">
                <input class="user-check border-1 border-dark" type="checkbox">
            </div>

            <div class="col-12 col-md-6 offset-md-6 mt-5">
                <button class="form-control btn btn-turquiose text-white" type="submit" id="btnSubmit">Opret bruger</button>
            </div>

        </div>
    </form>
</div>


<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea',
    });
</script>


<script>
    tinymce.init({
        selector: 'textarea',
    });
</script>
<script src="js/user.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>