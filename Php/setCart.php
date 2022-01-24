<?php

if(!isset($_SESSION)) {
    session_start();
}

$arr = [];

if(isset($_SESSION["count"])){
    $tot = $_SESSION["count"];
}else{
    $tot = 0;
}

$itemsNum = (array('num' => $tot));
$arr[0]= $itemsNum;
$cartTot = 0;
for($i = 1 ; $i<= $tot; $i++){
     $arr[$i]=$_SESSION["itemList"][$i-1];
     $cartTot = ($_SESSION["itemList"][$i-1]['price'] * $_SESSION["itemList"][$i-1]['quant']) + $cartTot;
}
$arr[$tot+1] = (array('cartTot' => $cartTot));
$json_array = json_encode($arr);



echo $json_array;

?>
