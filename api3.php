<?php
require "settings/init.php";
$data = json_decode(file_get_contents('php://input'), true);

$data['password']= 4700;


/*
password: ["skal udfyldes og være 4700"];
nameSearch: ["valgfri"];
*/

/*
$header = "HTTP/1.1 400 Bad Request"; // Sending malformed data results in a 400 Bad Request response.
$header = "HTTP/1.1 401 Unauthorized"; // Trying to access to the API without authentication results in a 401 Unauthorized response.
$header = "HTTP/1.1 404 Not Found"; // Not Found
$header = "HTTP/1.1 405 Method Not Allowed"; // Trying to use a method on a route for which it is not implemented results in a 405 Method Not Allowed.
$header = "HTTP/1.1 422 Unprocessable Entity"; // Sending invalid data results in a 422 Unprocessable Entity response.

$header = "HTTP/1.1 200 OK"; // Getting a resource or a collection resources results in a 200 OK response
$header = "HTTP/1.1 200 Created"; // Creating a resource results in a 201 Created response.
$header = "HTTP/1.1 200 No Content"; // Updating or deleting a resource results in a 204 No Content response.
*/

if($data["password"]== "4700"){

    $sql= "SELECT * FROM pakkesendt WHERE 1=1 ";
    $bind=[];


    if (!empty($data["nameSearch"])) {
        $sql ="AND pakkeNummer =:pakkeNummer";
        $bind[":pakkeNummer"] = $data["nameSearch"];
    }

    $pakkesendt = $db->sql($sql, $bind);
    header("HTTP/1.1 200 ok");
    echo json_encode($pakkesendt);

} else {
    header('content-Type: application/json; charset=utf-8');
    header("HTTP/1.1 401 Unauthorized");
    $error["errorMassage"] = "Din kodeord var forket";
    echo json_encode($error);
}

?>