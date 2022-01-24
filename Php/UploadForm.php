<?php
include("common.php");

$target_dir = "D:/xamp/htdocs/Progetto/Img/";

if(isset($_POST["BookTitle"]) && isset($_POST["BookSubtitle"]) && isset($_POST["BookPrice"]) && isset($_POST["BookDate"])) {

    //ricavo i dati inviati dalla richiesta post jquery
    $target_file = $target_dir . basename($_FILES["BookCover"]["name"]);

    if(move_uploaded_file($_FILES["BookCover"]["tmp_name"], $target_file)){
        echo "The file ". htmlspecialchars( basename( $_FILES["BookCover"]["name"])). " has been uploaded.";
    }else{
        echo "Sorry, there was an error uploading your file.";
    }

    $cover = "../Img/" . basename($_FILES["BookCover"]["name"]);
    $title = test_input($_POST["BookTitle"]);
    $subtitle = test_input($_POST["BookSubtitle"]);
    $price = test_input($_POST["BookPrice"]);
    $date = test_input($_POST["BookDate"]);
    $description = test_input($_POST["BookDescription"]);

    if($_POST["BookTitle"] == " " || $_POST["BookTitle"] == null || $_POST["BookSubtitle"] == " " || $_POST["BookSubtitle"] == null ||  $_POST["BookPrice"] == " " || $_POST["BookPrice"] == null ||  $_POST["BookDate"] == " " || $_POST["BookDate"] == null){
        $_SESSION["flash"] = "Compile all the fields";
   }else{
        if(isBookExist($title,$subtitle,$price, $date,$description, $cover)){
            $_SESSION["flash"] = "Book already exists";
            header("Location: ../Html/BookUploadedFailed.php");
        }else{
            header("Location: ../Html/BookUploadedSuccess.php");
            $_SESSION["flash"] = "Your Book has been posted";
            $_SESSION["color"] = "green";
        }
    }
}else{
    $_SESSION["flash"] = "Compile all the fields";
}

?>

