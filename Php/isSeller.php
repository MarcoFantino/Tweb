<?php
# main program
if (!isset($_SERVER["REQUEST_METHOD"]) || $_SERVER["REQUEST_METHOD"] != "GET") {
    header("HTTP/1.1 400 Invalid Request");
    die("ERROR 400: Invalid request - This service accepts only POST requests.");
}

include("common.php");

print "{\n";

if (isset($_SESSION["uType"]) && $_SESSION["uType"]==1) {
    print "\"isSeller\": true \n}";
} else {
    print "\"isSeller\": false \n}";
}

?>
