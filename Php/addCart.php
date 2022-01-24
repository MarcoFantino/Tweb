<?php

if(!isset($_SESSION)) {
    session_start();
}
$tot=$_SESSION["count"];

$item = $_POST["item"];


if($tot > 0){
    $dup = false;
    //controlla se l'elemento che viene aggiunto e' gia presente nel carello tramite l'id
    for($i=0; $i<$tot ; $i++){
        if($item == $_SESSION["itemList"][$i]['id']){
            //viene aggiornato la quantita di elementi con id = $item
            $_SESSION["itemList"][$i]['quant']++;
            $arr = [];
            $arr[0] = $_SESSION["itemList"][$i];
            $json_array = json_encode($arr);
            echo $json_array;
            $dup = true;
        }
    }
    //vuol dire che i dati dell'elemento non sono ancora presenti dal carrello quindi si contatta il db
    if(!$dup){
        try{
            $db = new mysqli("localhost:3306" , "root" , "" , "test");

            $rows= $db->query("SELECT Title,SubTitle,Img,Price,Id FROM products WHERE Id=''+$item+''");

            $db->close();

            $num_rows = $rows->num_rows;

            if($num_rows > 0){
                $inc = 0;
                $arr = [];
                while($row = $rows->fetch_assoc()){
                    $jsonArrayObject = (array('title' => $row["Title"], 'subt' => $row["SubTitle"], 'img' => $row["Img"],
                        'price'=>$row["Price"], 'id' =>$row["Id"], 'quant' => 1));
                    $arr[$inc] = $jsonArrayObject;
                    $inc++;
                    $_SESSION["itemList"][$tot] = $jsonArrayObject;
                    $_SESSION["count"]++;
                }
                $json_array = json_encode($arr);
                echo $json_array;
            }else{
                echo "0 results";
            }
        }catch(PDOException $ex){
            die('Database error: ' . $ex->getMessage());
        }
    }
}else{
    try{
        $db = new mysqli("localhost:3306" , "root" , "" , "test");

        $rows= $db->query("SELECT Title,SubTitle,Img,Price,Id FROM products WHERE Id=''+$item+''");

        $db->close();

        $num_rows = $rows->num_rows;

        if($num_rows > 0){
            $inc = 0;
            $arr = [];
            while($row = $rows->fetch_assoc()){
                $jsonArrayObject = (array('title' => $row["Title"], 'subt' => $row["SubTitle"], 'img' => $row["Img"],
                    'price'=>$row["Price"], 'id' =>$row["Id"], 'quant' => 1));
                $arr[$inc] = $jsonArrayObject;
                $inc++;
                $_SESSION["itemList"][$tot] = $jsonArrayObject;
                $_SESSION["count"]++;
            }
            $json_array = json_encode($arr);
            echo $json_array;
        }else{
            echo "0 results";
        }
    }catch(PDOException $ex){
        die('Database error: ' . $ex->getMessage());
    }
}

?>
