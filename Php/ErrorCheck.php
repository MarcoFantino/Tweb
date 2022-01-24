<?php

if (!isset($_SERVER["REQUEST_METHOD"]) || $_SERVER["REQUEST_METHOD"] != "GET") {
    header("HTTP/1.1 400 Invalid Request");
    die("ERROR 400: Invalid request - This service accepts only GET requests.");
}

include("common.php");

header("Content-type: application/json");
print "{\n";

if(isLogged()){
    print " \"isLogged\": true, \n";
    print "  \"name\": \"".$_SESSION["name"]."\"";
} else {
    print " \"isLogged\": false \n";
}

print "\n}";

?>


