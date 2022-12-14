<?php
require "settings/init.php";

if (!empty($_POST["data"])){
    $data = $_POST["data"];

    $sql = "INSERT INTO users (userFornavn, userEfternavn, userTelefon, userEmail, userPass) VALUES (:userFornavn, :userEfternavn, :userTelefon, :userEmail, :userPass)";
    $bind = [":userFornavn" => $data["userFornavn"], ":userEfternavn" => $data["userEfternavn"], ":userTelefon" => $data["userTelefon"], ":userEmail" => $data["userEmail"], ":userPass" => $data["userPass"]];

    $db->sql($sql, $bind, false);

    echo "Pakken er tilføjet. <a href='insert.php'><Indsæt en pakke mere</a>";
    exit;
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

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.tiny.cloud/1/bpmvvjjsg56di8tqwy5ltbdzo0v191lccrlxro1wzbiasabg/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>

<form method="post" action="insert.php">
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
            <label for="userEmail">E-mail</label>
            <input class="form-control" type="text" name="data[userEmail]" id="userEmail" placeholder="E-mail" value="">

        </div>
        <div class="col-12 col-md-6">
            <label for="userPass">Adgangskode</label>
            <input class="form-control" type="text" name="data[userPass]" id="userPass" placeholder="Adgangskode" value="">

        </div>
        <div class="col-12 col-md-6 offset-md-6">
            <button class="form-control btn btn-primary" type="submit" id="btnSubmit">Opret pakke</button>
        </div>

    </div>
</form>

<!-- filter funktion -->
<!-- Control buttons -->
<div id="myBtnContainer">
    <button class="btn active" onclick="filterSelection('alle')"> Vis alle</button>
    <button class="btn" onclick="filterSelection('sendt')"> Sendt</button>
    <button class="btn" onclick="filterSelection('hentet')"> Hentet</button>
    <button class="btn" onclick="filterSelection('afhentet')"> Afhentet</button>
</div>

<!-- The filterable elements. Note that some have multiple class names (this can be used if they belong to multiple categories) -->
<!--<div class="container-fluid justify-content-center d-flex">-->
<!--    <div class="filterDiv alle sendt text-primary p-3">-->
<!--        <form method="post">-->
<!--            <div class="form-group">-->
<!--                <label for="pakkeNummer">Pakkenummer</label>-->
<!--                <input class="form-control" type="text" name="data [pakkeNummer]" id="pakkeNummer" placeholder="Pakkenummer" value="">-->
<!---->
<!--            </div>-->
<!---->
<!--            <div class="form-group">-->
<!--                <label for="pakkeNummer">Afhentningskode</label>-->
<!--                <input class="form-control" type="number" name="data [pakkeAfhentningskode]" id="pakkeAfhentningskode" placeholder="Afhentningskode" value="">-->
<!---->
<!--            </div>-->
<!---->
<!--            <div class="form-group">-->
<!--                <label for="pakkeNummer">Vægt</label>-->
<!--                <input class="form-control" type="number" name="data [pakkeVaegt]" id="pakkeVaegt" placeholder="Vægt" value="">-->
<!---->
<!--            </div>-->
<!---->
<!--            <div class="form-group">-->
<!--                <label for="pakkeNummer">Adresse</label>-->
<!--                <input class="form-control" type="text" name="data [pakkeAdresse]" id="pakkeAdresse" placeholder="Adresse" value="">-->
<!---->
<!--            </div>-->
<!---->
<!--            <div class="form-group">-->
<!--                <label for="pakkeNummer">Postnummer</label>-->
<!--                <input class="form-control" type="number" name="data [postNummer]" id="postNummer" placeholder="Postnummer" value="">-->
<!---->
<!--            </div>-->
<!--            <div class="form-group">-->
<!--                <label for="pakkeNummer">By</label>-->
<!--                <input class="form-control" type="text" name="data [pakkeBynavn]" id="pakkeBynavn" placeholder="By" value="">-->
<!---->
<!--            </div>-->
<!---->
<!--            <div class="form-group">-->
<!--                <label for="pakkeNummer">Beskrivelse af pakke</label>-->
<!--                <input class="form-control" type="text" name="data [pakkeBeskrivelse]" id="pakkeBeskrivelse" placeholder="pakkeBeskrivelse" value="">-->
<!---->
<!--            </div>-->
<!--            <div class="col-12 col-md-6 offset-md-6">-->
<!--                <button class="form-control btn btn-primary" type="submit" id="btnSubmit">Opret pakke</button>-->
<!--            </div>-->
<!--        </form>-->
<!---->
<!--    </div>-->
<!--    <div class="filterDiv alle hentet text-info">-->
<!--        <form method="post">-->
<!---->
<!--        </form>-->
<!---->
<!--    </div>-->
<!---->
<!--    <div class="filterDiv alle afhentet text-dark">-->
<!--        <form method="post">-->
<!---->
<!--        </form>-->
<!---->
<!--    </div>-->
<!--</div>-->

<script>
    filterSelection("all")
    function filterSelection(c) {
        var x, i;
        x = document.getElementsByClassName("filterDiv");
        if (c == "all") c = "";
        // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
        for (i = 0; i < x.length; i++) {
            w3RemoveClass(x[i], "show");
            if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
        }
    }

    // Show filtered elements
    function w3AddClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) == -1) {
                element.className += " " + arr2[i];
            }
        }
    }

    // Hide elements that are not selected
    function w3RemoveClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            while (arr1.indexOf(arr2[i]) > -1) {
                arr1.splice(arr1.indexOf(arr2[i]), 1);
            }
        }
        element.className = arr1.join(" ");
    }

    // Add active class to the current control button (highlight it)
    var btnContainer = document.getElementById("myBtnContainer");
    var btns = btnContainer.getElementsByClassName("btn");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }
</script>
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
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
