<?php
require "settings/init.php";
$bind =[":pakkeId"=> $_GET["pakkeId"]];
$pakkelada = $db->sql("SELECT * FROM pakkesendt WHERE  pakkeId =:pakkeId;", $bind);
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">
    <?php
    foreach ($pakkelada as $pakkelada){
    ?>

    <title>Pakke information: Zalando.com</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link href="css/rettelser.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/2430132205.js" crossorigin="anonymous"></script>
</head>

<body>

<nav class="mobile-nav">
    <a href="add.html" class="bloc-icon package-navbar">
        <div class="callplusmail-navbar">
            <i class="fa-solid fa-plus text-white"></i>
        </div>
    </a>
    <a href="pakkeoversigt.html" class="bloc-icon settings-navbar">
        <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" fill="currentColor" class="bi bi-hexagon-fill text-white" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8.5.134a1 1 0 0 0-1 0l-6 3.577a1 1 0 0 0-.5.866v6.846a1 1 0 0 0 .5.866l6 3.577a1 1 0 0 0 1 0l6-3.577a1 1 0 0 0 .5-.866V4.577a1 1 0 0 0-.5-.866L8.5.134z"/>
        </svg>
        <i class="fa-solid fa-box-open text-dark"></i>
    </a>
    <a href="settings.html" class="bloc-icon plus-navbar">
        <div class="callplusmail-navbar">
            <i class="fa-solid fa-gear text-white"></i>
        </div>
    </a>
</nav>

<div>
    <a class="text-decoration-none" href="pakkeoversigt.html">
        <h1 class="bg-white text-center p-2 fw-bold" style="color:#6F5C45 ">PAKKELADA</h1>
    </a>
</div>

<div class="text-white text-center bg-turquiose p-3">
    <a class="btn btn-primary bg-white border-0 text-dark rounded-4 knappertop" href="#" role="button">Alle</a>
    <a class="btn btn-primary bg-white border-0 text-dark rounded-4 knappertop" href="#" role="button">Sendt</a>
    <a class="btn btn-primary bg-white border-0 text-dark rounded-4 knappertop" href="#" role="button">Afhentning</a>
    <a class="btn btn-primary bg-white border-0 text-dark rounded-4 knappertop" href="#" role="button">Hentet</a>
</div>

<div class="bg-white text-center pt-4 pb-4">
    <a class="btn btn-primary bg-turquiose border-0 text-white rounded-2 filterknap fw-bold" href="#" role="button">Filtrere</a>
</div>

<div class="text-white container-fluid">
    <div class="row mt-5 mb-5">
        <div class="col-3 backbtn text-white">
            <div class="backbtn">
                <a href="pakkeoversigt.html">
                <i class="fa-solid fa-arrow-left"></i>
                </a>
            </div>
        </div>
        <div class="col-7 settings-text text-white text-center zaloverskrift">
            Zalando.com
        </div>
    </div>
    <div class="row bg-white text-dark p-1 m-2 rounded-5">
        <ul class="overskriftogpil">
            <li class="pil"><img src="images/postnord.png" class="pilleikon mt-3 w-100 h-100"></li>
            <li style="float: right"><img src="images/mail.png" class="mt-2"></li>
            <li style="float: right"><img src="images/phone.png" class="mt-2"></li>
        </ul>
        <p class="fw-bold mb-2 kodestr">PAKKE NUMMER:</p>
        <p class="mb-3">
            <?php
            echo $pakkelada->pakkeNummer
            ?>
        </p>
    </div>

    <div class="row">
        <div class="col-12 justify-content-center d-flex text-center">
            <div class="col-6 bg-white text-dark rounded-3 rightboks mt-3 p-2">
                <p class="fw-bold kodestr">Vægt (kg.)</p>
                <img class="mx-auto mt-1" src="images/greyweight.png">
                <p class="mt-1">
                    <?php
                    echo $pakkelada->pakkeVaegt
                    ?>
                </p>
            </div>

            <div class="col-6 bg-white text-dark rounded-3 leftboks mt-3 p-2">
                <p class="fw-bold kodestr">Mål (cm.)</p>
                <img class="mx-auto mt-1" src="images/pakkevaegt.png">
            </div>
        </div>
    </div>


    <div>
        <div class="row bg-white text-dark p-1 m-2 mt-4 rounded-5">
            <a href="live-tracking.html"><button type="button" class="btn btn-primary fw-bold p-3 rounded-4 bg-orange border-0 trackknap text-white position-absolute"><div class="strtrack">Track</div></button></a>
            <img class="w-25 h-25 gpsbillede" src="images/gps.png">

            <div class="levadresse">
                <p class="fw-bold">Leveringsaddresse</p>
                <p>
                    <?php
                    echo $pakkelada->pakkeAdresse
                    ?>
                </p>

                <p>
                    <?php
                    echo $pakkelada->pakkePostnummer
                    ?>
                    <?php
                    echo $pakkelada->pakkeBynavn
                    ?>
                </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 justify-content-center d-flex text-center">
            <div class="col-6 bg-white text-dark rounded-4 rightboks mt-3 p-3">
                <p class="fw-bold kodestr">Beskrivelse</p>
                <p class="mt-1">
                    <?php
                    echo $pakkelada->pakkeBeskrivelse
                    ?>
                </p>
            </div>

            <div class="col-6 bg-white text-dark rounded-4 leftboks mt-3 p-3">
                <p class="fw-bold kodestr">Kode</p>
                <p>
                    <?php
                    echo $pakkelada->pakkeAfhentningskode
                    ?>
                </p>
            </div>
        </div>
    </div>

    <div class="row bg-white text-dark rounded-3 justify-content-center m-2 mt-4 p-1 storknap">

        <a class="btn btn-primary mt-2 w-75 bg-turquiose fw-bold text-white rounded-5 border-0 pb-2" href="pakkeshop.html" role="button">Pakkeshop åbningstider</a>

        <a class="btn btn-primary mt-2 w-75 bg-orange fw-bold text-white rounded-5 border-0 mt-2 pt-2 pb-2 mb-2" href="return.html" role="button">Returnér</a>
    </div>
</div>




</body>
</html>

    <?php
    }
    ?>