<?php
require "settings/init.php";

if (!empty($_POST ["data"])) {
    $data = $_POST["data"];

    $sql = "INSERT INTO pakkehentning (pakkeNummer, pakkeAfhentningskode, pakkeVaegt, pakkeAdresse, pakkePostnummer, pakkeBynavn, pakkeBeskrivelse) VALUES (:pakkeNummer, :pakkeAfhentningskode, :pakkeVaegt, :pakkeAdresse, :pakkePostnummer, :pakkeBynavn, :pakkeBeskrivelse)";
    $bind = [":pakkeNummer" => $data ["pakkeNummer"], ":pakkeAfhentningskode" => $data["pakkeAfhentningskode"], ":pakkeVaegt" => $data ["pakkeVaegt"], ":pakkeAdresse" => $data["pakkeAdresse"], ":pakkePostnummer" => $data["pakkePostnummer"], ":pakkeBynavn" => $data["pakkeBynavn"], ":pakkeBeskrivelse" => $data["pakkeBeskrivelse"]];

    $db->sql($sql, $bind, false);

    echo "Pakken er nu tilføjet.";
}

?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Til database</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.tiny.cloud/1/c53e6j0kzofuzfu2k0awppdan9dvflx4p9s01gtdwk14f85p/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>



<form method="post" action="insert.php">
    <div class="row p-5 justify-content-sm-center d-sm-flex">

        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="pakkeNummer">Pakkenummer</label>
                <input class="form-control" type="text" name="data [pakkeNummer]" id="pakkeNummer" placeholder="Pakkenummer" value="">
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="pakkeAfhentningskode">Afhentningskode</label>
                <input class="form-control" type="text" name="data [pakkeAfhentningskode]" id="pakkeAfhentningskode" placeholder="Pakkeafhentningskode" value="">
            </div>

        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="pakkeVaegt">Vægt</label>
                <input class="form-control" type="text" step="0.1" name="data [pakkeVaegt]" id="pakkeVaegt" placeholder="Vægt" value="">
            </div>

        </div>

        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="pakkeAdresse">Modtageradresse</label>
                <input class="form-control" type="text" name="data [pakkeAdresse]" id="pakkeAdresse" placeholder="Adresse" value="">
            </div>

        </div>

        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="pakkePostnummer">Postnummer</label>
                <input class="form-control" type="number" name="data [pakkePostnummer]" id="pakkePostnummer" placeholder="Postnummer" value="">
            </div>

        </div>

        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="pakkeBynavn">By</label>
                <input class="form-control" type="text" name="data [pakkeBynavn]" id="pakkeBynavn" placeholder="By" value="">
            </div>

        </div>

        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="pakkeBeskrivelse">Beskrivelse af pakke</label>
                <textarea class="form-control" type="text" name="data [pakkeBeskrivelse]" id="pakkeBeskrivelse" placeholder="Pakkebeskrivelse" value=""></textarea>
            </div>

        </div>

        <div class="col-12 col-md-6 offset-md-6 mt-4">
            <button class="form-control btn btn-primary" type="submit" id="btnSubmit">Opret pakke</button>
        </div>


    </div>
</form>





<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<script>
    tinymce.init({
        selector: 'textarea'
    });
</script>
</body>
</html>