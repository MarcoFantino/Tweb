<?php
if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_POST["value"])){
    $_POST["value"]= 5;
}
$_SESSION["cnum"] = $_POST["value"];

switch ($_POST["value"]){
    case 0:
        $_SESSION["filter"] = "Price DESC";
        break;
    case 1:
        $_SESSION["filter"] = "Price ASC";
        break;
    case 2:
        $_SESSION["filter"] = "Publication DESC";
        break;
    case 3:
        $_SESSION["filter"] = "Revs DESC";
        break;
    case 4:
        $_SESSION["filter"] = "Revs ASC";
        break;
    default:
        $_SESSION["filter"] = "Title ASC";
}

print "{\n";
print " \"cnum\": \"".$_SESSION["cnum"]."\" , \n";
print "  \"flag\": \"".$_SESSION["filter"]."\"";
print "\n}";

?>