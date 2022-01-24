<?php
# main program
if (!isset($_SERVER["REQUEST_METHOD"]) || $_SERVER["REQUEST_METHOD"] != "POST") {
    header("HTTP/1.1 400 Invalid Request");
    die("ERROR 400: Invalid request - This service accepts only POST requests.");
}

include("common.php");

// se è stata eseguita la procedura di login, verifica le credenziali
if (isset($_POST["username"]) && isset($_POST["pwd"])) {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    if (pwdVerify($username, $pwd) == true) {
        if (isset($_SESSION)) {
            session_regenerate_id(TRUE);
        }else{
            session_start();
        }
        $_SESSION["name"] = $username;
        if( $_SESSION["uType"] == 0){
            //buyer
            header('Location: ../Html/Index.php');
        }else{
            //seller
            header('Location: ../Html/IndexSeller.php');
        }
        exit;
    }else{
        $_SESSION["flash"] = "invalid username or password";
    }
}else{
    $_SESSION["flash"] = "Insert Username and Password";
}
header('Location: ../Html/Login.php');
exit;

?>

