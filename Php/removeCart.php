<?php
if(!isset($_SESSION)) {
    session_start();
}

$item = $_POST["item"];

$tot=$_SESSION["count"];
$arr = [];
for($i=0; $i<$_SESSION["count"] ; $i++){
    if($item == $_SESSION["itemList"][$i]['id']){
        $_SESSION["count"]--;
        array_splice($_SESSION["itemList"] , $i , 1);
        //unset($_SESSION["itemList"][$i]);
        echo $item;
        break;
    }
}

for($i=0; $i<$_SESSION["count"];$i++){
    $arr[$i]=$_SESSION["itemList"][$i];
}
$json_array = json_encode($arr);
echo $json_array;

?>
