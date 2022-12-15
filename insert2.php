<?php
require "settings/init.php";

if (!empty($_POST["data"])){
    $data = $_POST["data"];

    $sql = "INSERT INTO pakkeafhentning (pakkeNummer, pakkeAfhentningskode, pakkeVaegt, pakkeAdresse, pakkePostnummer, pakkeBynavn, pakkeBeskrivelse) VALUES (:pakkeNummer, :pakkeAfhentningskode, :pakkeVaegt, :pakkeAdresse, :pakkePostnummer, :pakkeBynavn, :pakkeBeskrivelse)";
    $bind = [":pakkeNummer" => $data["pakkeNummer"], ":pakkeAfhentningskode" => $data["pakkeAfhentningskode"], ":pakkeVaegt" => $data["pakkeVaegt"], ":pakkeAdresse" => $data["pakkeAdresse"], ":pakkePostnummer" => $data["pakkePostnummer"], ":pakkeBynavn" => $data["pakkeBynavn"], ":pakkeBeskrivelse" => $data["pakkeBeskrivelse"]];

    $db->sql($sql, $bind, false);

    $sql = "INSERT INTO pakkehentet (pakkeNummer, pakkeAfhentningskode, pakkeVaegt, pakkeAdresse, pakkePostnummer, pakkeBynavn, pakkeBeskrivelse) VALUES (:pakkeNummer, :pakkeAfhentningskode, :pakkeVaegt, :pakkeAdresse, :pakkePostnummer, :pakkeBynavn, :pakkeBeskrivelse)";
    $bind = [":pakkeNummer" => $data["pakkeNummer"], ":pakkeAfhentningskode" => $data["pakkeAfhentningskode"], ":pakkeVaegt" => $data["pakkeVaegt"], ":pakkeAdresse" => $data["pakkeAdresse"], ":pakkePostnummer" => $data["pakkePostnummer"], ":pakkeBynavn" => $data["pakkeBynavn"], ":pakkeBeskrivelse" => $data["pakkeBeskrivelse"]];

    $db->sql($sql, $bind, false);

    $sql = "INSERT INTO pakkesendt (pakkeNummer, pakkeAfhentningskode, pakkeVaegt, pakkeAdresse, pakkePostnummer, pakkeBynavn, pakkeBeskrivelse) VALUES (:pakkeNummer, :pakkeAfhentningskode, :pakkeVaegt, :pakkeAdresse, :pakkePostnummer, :pakkeBynavn, :pakkeBeskrivelse)";
    $bind = [":pakkeNummer" => $data["pakkeNummer"], ":pakkeAfhentningskode" => $data["pakkeAfhentningskode"], ":pakkeVaegt" => $data["pakkeVaegt"], ":pakkeAdresse" => $data["pakkeAdresse"], ":pakkePostnummer" => $data["pakkePostnummer"], ":pakkeBynavn" => $data["pakkeBynavn"], ":pakkeBeskrivelse" => $data["pakkeBeskrivelse"]];

    $db->sql($sql, $bind, false);



    echo "Pakken er tilføjet. <a href='insert.php'><Indsæt en pakke mere</a>";
    exit;
}

?>
<!-- Instruktion til webbrowser om at vi kører HTML5 -->
<!DOCTYPE html>

<!-- html starter og slutter hele dokumentet / lang=da: Fortæller siden er på dansk -->
<html lang="da">

<!-- I <head> har man opsætning - det ser brugeren ikke, men det fortæller noget om siden -->
<head>
    <!-- Sætter tegnsætning til utf-8 som bl.a. tillader danske bogstaver -->
    <meta charset="utf-8">

    <!-- Titel som ses oppe i browserens tab mv. -->
    <title>Tilsæt til database</title>

    <!-- Metatags der fortæller at søgemaskiner er velkomne, hvem der udgiver siden og copyright information -->
    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <!-- Sikrer man kan benytte CSS ved at tilkoble en CSS fil -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/filter.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.tiny.cloud/1/bpmvvjjsg56di8tqwy5ltbdzo0v191lccrlxro1wzbiasabg/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Sikrer den vises korrekt på mobil, tablet mv. ved at tage ift. skærmstørrelse - bliver brugt til responsive websider -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<!-- i <body> har man alt indhold på siden som brugeren kan se -->
<body>

<!-- Control buttons -->
<div id="myBtnContainer">
    <button class="btn active" onclick="filterSelection('alle')"> Vis alle</button>
    <button class="btn" onclick="filterSelection('sendt')"> Sendt</button>
    <button class="btn" onclick="filterSelection('hentet')"> Hentet</button>
    <button class="btn" onclick="filterSelection('afhentet')"> Afhentet</button>
</div>

<!-- The filterable elements. Note that some have multiple class names (this can be used if they belong to multiple categories) -->
<div class="container-fluid justify-content-center d-flex">
    <div class="filterDiv alle sendt text-primary p-3">
        <form method="post">
            <div class="form-group">
                <label for="pakkeNummer">Pakkenummer</label>
                <input class="form-control" type="text" name="data [pakkeNummer]" id="pakkeNummer" placeholder="Pakkenummer" value="">

            </div>

            <div class="form-group">
                <label for="pakkeNummer">Afhentningskode</label>
                <input class="form-control" type="number" name="data [pakkeAfhentningskode]" id="pakkeAfhentningskode" placeholder="Afhentningskode" value="">

            </div>

            <div class="form-group">
                <label for="pakkeNummer">Vægt</label>
                <input class="form-control" type="number" name="data [pakkeVaegt]" id="pakkeVaegt" placeholder="Vægt" value="">

            </div>

            <div class="form-group">
                <label for="pakkeNummer">Adresse</label>
                <input class="form-control" type="text" name="data [pakkeAdresse]" id="pakkeAdresse" placeholder="Adresse" value="">

            </div>

            <div class="form-group">
                <label for="pakkeNummer">Postnummer</label>
                <input class="form-control" type="number" name="data [postNummer]" id="postNummer" placeholder="Postnummer" value="">

            </div>
            <div class="form-group">
                <label for="pakkeNummer">By</label>
                <input class="form-control" type="text" name="data [pakkeBynavn]" id="pakkeBynavn" placeholder="By" value="">

            </div>

            <div class="form-group">
                <label for="pakkeNummer">Beskrivelse af pakke</label>
                <input class="form-control" type="text" name="data [pakkeBeskrivelse]" id="pakkeBeskrivelse" placeholder="pakkeBeskrivelse" value="">

            </div>
            <div class="col-12 col-md-6 offset-md-6">
                <button class="form-control btn btn-primary" type="submit" id="btnSubmit">Opret pakke</button>
            </div>
        </form>

    </div>
    <div class="filterDiv alle hentet text-info">
        <form method="post">
            <div class="form-group">
                <label for="pakkeNummer">Pakkenummer</label>
                <input class="form-control" type="text" name="data [pakkeNummer]" id="pakkeNummer" placeholder="Pakkenummer" value="">

            </div>

            <div class="form-group">
                <label for="pakkeNummer">Afhentningskode</label>
                <input class="form-control" type="number" name="data [pakkeAfhentningskode]" id="pakkeAfhentningskode" placeholder="Afhentningskode" value="">

            </div>

            <div class="form-group">
                <label for="pakkeNummer">Vægt</label>
                <input class="form-control" type="number" name="data [pakkeVaegt]" id="pakkeVaegt" placeholder="Vægt" value="">

            </div>

            <div class="form-group">
                <label for="pakkeNummer">Adresse</label>
                <input class="form-control" type="text" name="data [pakkeAdresse]" id="pakkeAdresse" placeholder="Adresse" value="">

            </div>

            <div class="form-group">
                <label for="pakkeNummer">Postnummer</label>
                <input class="form-control" type="number" name="data [postNummer]" id="postNummer" placeholder="Postnummer" value="">

            </div>
            <div class="form-group">
                <label for="pakkeNummer">By</label>
                <input class="form-control" type="text" name="data [pakkeBynavn]" id="pakkeBynavn" placeholder="By" value="">

            </div>

            <div class="form-group">
                <label for="pakkeNummer">Beskrivelse af pakke</label>
                <input class="form-control" type="text" name="data [pakkeBeskrivelse]" id="pakkeBeskrivelse" placeholder="pakkeBeskrivelse" value="">

            </div>
            <div class="col-12 col-md-6 offset-md-6">
                <button class="form-control btn btn-primary" type="submit" id="btnSubmit">Opret pakke</button>
            </div>
        </form>

    </div>

    <div class="filterDiv alle afhentet text-dark">
        <form method="post">
            <div class="form-group">
                <label for="pakkeNummer">Pakkenummer</label>
                <input class="form-control" type="text" name="data [pakkeNummer]" id="pakkeNummer" placeholder="Pakkenummer" value="">

            </div>

            <div class="form-group">
                <label for="pakkeNummer">Afhentningskode</label>
                <input class="form-control" type="number" name="data [pakkeAfhentningskode]" id="pakkeAfhentningskode" placeholder="Afhentningskode" value="">

            </div>

            <div class="form-group">
                <label for="pakkeNummer">Vægt</label>
                <input class="form-control" type="number" name="data [pakkeVaegt]" id="pakkeVaegt" placeholder="Vægt" value="">

            </div>

            <div class="form-group">
                <label for="pakkeNummer">Adresse</label>
                <input class="form-control" type="text" name="data [pakkeAdresse]" id="pakkeAdresse" placeholder="Adresse" value="">

            </div>

            <div class="form-group">
                <label for="pakkeNummer">Postnummer</label>
                <input class="form-control" type="number" name="data [postNummer]" id="postNummer" placeholder="Postnummer" value="">

            </div>
            <div class="form-group">
                <label for="pakkeNummer">By</label>
                <input class="form-control" type="text" name="data [pakkeBynavn]" id="pakkeBynavn" placeholder="By" value="">

            </div>

            <div class="form-group">
                <label for="pakkeNummer">Beskrivelse af pakke</label>
                <input class="form-control" type="text" name="data [pakkeBeskrivelse]" id="pakkeBeskrivelse" placeholder="pakkeBeskrivelse" value="">

            </div>
            <div class="col-12 col-md-6 offset-md-6">
                <button class="form-control btn btn-primary" type="submit" id="btnSubmit">Opret pakke</button>
            </div>
        </form>

    </div>
</div>

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
