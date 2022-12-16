<?php
require "classes/classDB.php";

define("CONFIG_LIVE", "1"); // 0: Test enviroment || 1: Live enviroment

if(CONFIG_LIVE == 0){
    $DB_SERVER = "localhost:8889";
    $DB_NAME = "pakkelada";
    $DB_USER = "root";
    $DB_PASS = "root";
}else{
    $DB_SERVER = "mysql68.unoeuro.com";
    $DB_NAME = "m_lmultimedie_dk_db";
    $DB_USER = "m_lmultimedie_dk";
    $DB_PASS = "r9E3RDh5tA6z";
}

$db = new db($DB_SERVER, $DB_NAME, $DB_USER, $DB_PASS);