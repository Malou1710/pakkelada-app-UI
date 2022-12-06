<?php
require "settings/init.php";

if (!empty($_POST ["data"])){
    $data = $_POST ["data"];

    $sql = "INSERT INTO produkter (prodNavn, prodBeskrivelse, prodPris) VALUES (:prodNavn, :prodBeskrivelse, :prodPris)";
    $bind = [":prodNavn" => $data["prodNavn"], ":prodBeskrivelse" => $data["prodBeskrivelse"], ":prodPris" => $data["prodPris"]];

    $db->sql($sql, $bind, false);


    echo "Produktet er nu indsat. <a href='insert.php'>Indsæt et produkt mere</a>";
    exit();
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
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.tiny.cloud/1/bpmvvjjsg56di8tqwy5ltbdzo0v191lccrlxro1wzbiasabg/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Sikrer den vises korrekt på mobil, tablet mv. ved at tage ift. skærmstørrelse - bliver brugt til responsive websider -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<!-- i <body> har man alt indhold på siden som brugeren kan se -->
<body>

    <div class="container-fluid bg-dark text-light">
        <form method="post" action="insert.php">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="prodNavn" class="">Filmtitel</label>
                        <input class="form-control" type="text" name="data[prodNavn]" id="prodNavn" placeholder="Produkt navn" value="">
                    </div>
                </div>
                <div class="col-2 col-md-6">
                    <div class="form-group">
                        <label for="prodPris">Produkt pris</label>
                        <input class="form-control" type="number" step="0.1" name="data[prodPris]" id="prodPris" placeholder="Produkt pris" value="">
                    </div>
                </div>
<!--                filmBeskrivelse-->
                <div class="col-2 col-md-6">
                    <div class="form-group">
                        <label for="prodBeskrivelse">Produkt beskrivelse</label>
                        <textarea class="form-control" name="data[prodBeskrivelse]" id="prodBeskrivelse"></textarea>
                    </div>
                </div>
<!--                Opret knap-->
                <div class="col-12 col-md-6 offset-md-4 p-2">
                    <button class="form-control btn btn-danger" type="submit" id="btnSubmit">Opret</button>
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














</body>
</html>
