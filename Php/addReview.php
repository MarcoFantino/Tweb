<?php
include("common.php");

if(!isset($_SESSION)) {
    session_start();
}

$revText = test_input($_POST["item1"]);

$book = test_input($_POST["item2"]);

$userName = $_SESSION["name"];


if(mb_strlen($revText)<1){
    echo "0";
}else{
    try{
        //$db = new mysqli("localhost:3306" , "root" , "" , "test");
        $db = dbconnect();
        $q = "SELECT Id , Revs FROM products WHERE (Id= :book)";
        $sth = $db->prepare($q);
        $sth->bindParam(':book', $book);
        $sth->execute();
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $sth->fetch();
        $n_rows = $sth->rowCount();
        //controllo se l'id corrisponde ad un libro esistente
        //$rows= $db->query("SELECT Id , Revs FROM products WHERE Id = '$book'");

        if($n_rows > 0){
            $revNumber = 0;
            //estraggo numero di reviews

           $revNumber = $rows["Revs"];

            $revNumber++;
            //aggiungo la review nuovo alla tabella
            $revId = uniqid();

            $ins = "INSERT INTO reviews (Id, Book, Rev, Email) VALUES (:revId , :book , :revText , :userName)";


            $query = $db->prepare($ins);

            $query->bindParam(':revId', $revId);

            $query->bindParam(':book', $book);

            $query->bindParam(':revText', $revText);

            $query->bindParam(':userName', $userName);

            $query->execute();

            //$sql = "INSERT INTO reviews (Id, Book, Rev, Email) VALUES ('$revId' , '$book' , '$revText' , '$userName') ;";
            //$db->query($sql);

            //aggiorno il numero di reviews
            $update = "UPDATE products SET Revs = '$revNumber' where (Id = :book)";
            $last = $db->prepare($update);
            $last->bindParam(':book', $book);
            $last->execute();
            //$update = "UPDATE products SET Revs = '$revNumber' where Id='$book';";
            //$db->query($update);

            $json_array = json_encode($ins);

            echo $json_array;
        }else{
            echo "1";
        }
    }catch(PDOException $ex){
        die('Database error: ' . $ex->getMessage());
    }
}

?>
