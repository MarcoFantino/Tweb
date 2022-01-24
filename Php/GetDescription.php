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

    $rows= $db->query("SELECT Title,SubTitle,Img,Revs,Publication,Price,Id,longDesc FROM products WHERE Id=$book");

    $db->close();

    $num_rows = $rows->num_rows;

    $arr = [];

    $elem = (array('elem' => $num_rows ));

    $arr[0]= $elem;

    if($num_rows > 0){

        $inc=1;

        while($row = $rows->fetch_assoc()){
            $jsonArrayObject = (array('title' => $row["Title"], 'subt' => $row["SubTitle"], 'img' => $row["Img"],
                'rev' => $row["Revs"], 'pub' => $row["Publication"], 'price'=>$row["Price"], 'id' =>$row["Id"], 'desc' =>$row["longDesc"]));
            $arr[$inc] = $jsonArrayObject;
            $inc++;
        }
    }

    $json_array = json_encode($arr);

    echo $json_array;

}catch(PDOException $ex){
    die('Database error: ' . $ex->getMessage());
}

?>
