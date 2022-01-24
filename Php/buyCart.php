<?php

if(!isset($_SESSION)) {
    session_start();
}

$tot = $_SESSION["count"];
$userName = $_SESSION["name"];

try{
    $db = new mysqli("localhost:3306" , "root" , "" , "test");

    $buyId = uniqid();

    $arr = [];
    $query = "";
    $sqlInsert = "";

    for($i=0; $i<$tot; $i++){

        $itemId = $_SESSION["itemList"][$i]['id'];
        $itemQty = $_SESSION["itemList"][$i]['quant'];

        $arr[$i] = $buyId." ".$_SESSION["itemList"][$i]['id']." ".$_SESSION["itemList"][$i]['quant']; //test

        $sqlInsert .= "('{$buyId}', '{$itemId}' , '{$itemQty}' , '{$userName}'),";

    }
    $sqlInsert = rtrim($sqlInsert, ',');//remove the extra comma
    $sql = "INSERT INTO buyedlist (TranscationId, ItemId, qty, Email) VALUES {$sqlInsert} ;";

    $db->query($sql);
    $db->close();
    array_splice($_SESSION["itemList"] , 0);
    $_SESSION["count"]=0;
    $json_array = json_encode( $sql);
    echo $json_array;
}catch(PDOException $ex){
    die('Database error: ' . $ex->getMessage());
}

?>