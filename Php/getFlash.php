<?php
# main program
if (!isset($_SERVER["REQUEST_METHOD"]) || $_SERVER["REQUEST_METHOD"] != "GET") {
    header("HTTP/1.1 400 Invalid Request");
    die("ERROR 400: Invalid request - This service accepts only GET requests.");
}

if(!isset($_SESSION)) {
    session_start();
}

header("Content-type: application/json");
print "{\n";

// return flash message if set
if (isset($_SESSION["flash"])) {
    if(isset($_SESSION["color"])){
        print "\"isColor\": true, \n";
    }
    print "\"isSet\": true, \n";
    print "  \"flash\": \"".$_SESSION["flash"]."\" \n}\n";
    unset($_SESSION["flash"]);
    unset($_SESSION["color"]);
    session_unset();
    session_destroy();
} else {
    print "\"isSet\": false \n}\n";
    session_unset();
    session_destroy();
}

?>

