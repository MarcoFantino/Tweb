<?php

if (!isset($_SERVER["REQUEST_METHOD"]) || $_SERVER["REQUEST_METHOD"] != "GET") {
    header("HTTP/1.1 400 Invalid Request");
    die("ERROR 400: Invalid request - This service accepts only GET requests.");
}

if(!isset($_SESSION)) {
    session_start();
}

try{
    if(isset($_SESSION["filter"])){
        $flt = $_SESSION["filter"];
    }else{
        $flt = "Title ASC";
    }

    $db = new mysqli("localhost:3306" , "root" , "" , "test");

    $rows= $db->query("SELECT Title,SubTitle,Img,Revs,Publication,Price,Id FROM products ORDER BY $flt");

    $db->close();

    $num_rows = $rows->num_rows;

    if($num_rows > 0){
        $arr = [];
        $elem = (array('elem' => $num_rows ));

        //check if filter is set
        if(isset($_SESSION["cnum"])){
            $cnum = (array('num' => $_SESSION["cnum"] , 'isset' =>["true"]));
        }else{
            $cnum = (array('isset' =>["false"]));
        }

        $inc=2;
        $arr[0]= $elem;
        $arr[1]=$cnum;
        while($row = $rows->fetch_assoc()){
            $jsonArrayObject = (array('title' => $row["Title"], 'subt' => $row["SubTitle"], 'img' => $row["Img"],
                'rev' => $row["Revs"], 'pub' => $row["Publication"], 'price'=>$row["Price"], 'id' =>$row["Id"]));
            $arr[$inc] = $jsonArrayObject;
            $inc++;
        }
        $json_array = json_encode($arr);

        unset($_SESSION["filter"]);
        unset($_SESSION["cnum"]);
        echo $json_array;
    }else{
        echo "0 results";
    }
}catch(PDOException $ex){
    die('Database error: ' . $ex->getMessage());
}

?>
