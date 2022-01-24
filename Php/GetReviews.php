<?php

if (!isset($_SERVER["REQUEST_METHOD"]) || $_SERVER["REQUEST_METHOD"] != "GET") {
    header("HTTP/1.1 400 Invalid Request");
    die("ERROR 400: Invalid request - This service accepts only GET requests.");
}

if(!isset($_SESSION)) {
    session_start();
}

$book = $_GET["value"];

try{

    $db = new mysqli("localhost:3306" , "root" , "" , "test");

    $rows= $db->query("SELECT Email,Rev FROM reviews WHERE Book = '$book'");

    $db->close();

    $num_rows = $rows->num_rows;

    if($num_rows > 0){
        $arr = [];
        $elem = (array('elem' => $num_rows ));
        $inc=1;
        $arr[0]= $elem;

        while($row = $rows->fetch_assoc()){
            $jsonArrayObject = (array('user' => $row["Email"], 'rev' => $row["Rev"]));
            $arr[$inc] = $jsonArrayObject;
            $inc++;
        }

        $json_array = json_encode($arr);

        echo $json_array;
    }else{
        echo "0 results";
    }
}catch(PDOException $ex){
    die('Database error: ' . $ex->getMessage());
}

?>
