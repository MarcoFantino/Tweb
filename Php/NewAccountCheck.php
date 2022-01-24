<?php
include("common.php");

header("Location: ../Html/NewAccount.php");

if(isset($_POST["UserName"]) && isset($_POST["Email"]) && isset($_POST["Password"])) {

    //ricavo i dati inviati dalla richiesta post jquery
    $username = test_input($_POST["UserName"]);
    $psw = test_input($_POST["Password"]);
    $email = test_input($_POST["Email"]);
    $type = test_input($_POST["Type"]);
    echo $username;

    if($_POST["UserName"] == " " || $_POST["UserName"] == null || $_POST["Password"] == " " || $_POST["Password"] == null ||  $_POST["Email"] == " " || $_POST["Email"] == null){
        $_SESSION["flash"] = "Compile all the fields";
    }else if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $username)){
        $_SESSION["flash"] = "Can't use special symbols in the Username";
    }else{
        if(isUserExist($username,$psw,$email, $type)){
            $_SESSION["flash"] = "user or email already exist";
        }else{
            $_SESSION["flash"] = "Your Account has been created";
            $_SESSION["color"] = "green";
        }
    }
}else{
    $_SESSION["flash"] = "Compile all the fields";
}

?>
