<?php

if (!isset($_SERVER["REQUEST_METHOD"]) || $_SERVER["REQUEST_METHOD"] != "GET") {
    header("HTTP/1.1 400 Invalid Request");
    die("ERROR 400: Invalid request - This service accepts only GET requests.");
}

if(!isset($_SESSION)) {
    session_start();
}

$user = $_SESSION["name"];
try{

    $db = new mysqli("localhost:3306" , "root" , "" , "test");

    $rows= $db->query("SELECT TranscationId,ItemId,qty,Title,SubTitle,Img,Price FROM buyedlist Join products on ItemId = Id WHERE buyedlist.Email = '$user' Order By TranscationId");

    $db->close();

    $num_rows = $rows->num_rows;

    if($num_rows > 0){
        $arr = [];
        $elem = (array('elem' => $num_rows ));
        $inc=1;
        $arr[0]= $elem;

        while($row = $rows->fetch_assoc()){
            $jsonArrayObject = (array('title' => $row["Title"], 'subt' => $row["SubTitle"], 'img' => $row["Img"],
                 'price'=>$row["Price"], 'qty' =>$row["qty"], 'transaction'=>$row["TranscationId"]));
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
