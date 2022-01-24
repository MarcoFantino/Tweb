<?php

include("common.php");

try{
    $db = new mysqli("localhost:3306" , "root" , "" , "test");

    $rows= $db->query("SELECT * FROM news ORDER BY NewsDate ASC LIMIT 4 ");

    $num_rows = $rows->num_rows;
    if($num_rows > 0){
        $arr = [];
        $inc = 1;
        $elem = (array('elem' => $num_rows ));
        $arr[0]= $elem;
        while($row = $rows->fetch_assoc()){
            $jsonArrayObject = (array('title' => $row["Title"], 'sub' => $row["SubTitle"], 'img' => $row["Img"], 'date' => $row["NewsDate"]));
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
