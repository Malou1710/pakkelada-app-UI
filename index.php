<?php
require "settings/init.php";

$pakkeafhentning = $db->sql("SELECT * FROM pakkeafhentning");

foreach ($pakkeafhentning as $pakkeafhent){
    echo $pakkeafhent->pakkeNummer . " - " . $pakkeafhent->pakkeAfhentningskode . "<br>";
}
?>