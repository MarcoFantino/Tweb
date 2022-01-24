<?php
if(!isset($_SESSION)) {session_start();}

function isLogged() {
    if (!isset($_SESSION["name"])) {
        if (!isset($_SESSION["flash"])) {
            $_SESSION["flash"] = "Please, login if you want to use this website.";
        }
        return false;
    }
    else {
        return true;
    }
}

function dbconnect() {
    $db = new PDO('mysql:dbname=test;host=localhost:3306', "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}

// verifica se l'utente e la password sono corretti
function pwdVerify($username, $pwd) {
    try {
        $db = dbconnect();
        $q = "SELECT Password,Type FROM userslist WHERE (Email= :eml)";
        $sth = $db->prepare($q);
        $sth->bindParam(':eml', $username);
        $sth->execute();
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $sth->fetch();
        //$userN = $db->quote($username);
        //$rows = $db->query("SELECT Password FROM userslist WHERE Email = $userN");
    } catch (PDOException $ex) {
        die('Database error: ' . $ex->getMessage());
    }
    if ($rows) { // controlla la corrispondenza utente / password
        if(password_verify($pwd , $rows['Password'])){
            $_SESSION["count"] = 0;
            $_SESSION["uType"] = $rows['Type'];
            return true;
        }
        return false;
    } else {
        return false; // user not found
    }
}

function isUserExist($username , $pwd , $email, $type){
    try{
        //connetto al db
        $db = dbconnect();

        //quoto le stringhe
       // $usr = $db->quote($username);
       // $pass = $db->quote($pwd);
        //$eml = $db->quote($email);

        $q = "SELECT UName,Email FROM userslist WHERE (Email= :eml OR UName = :usr)";
        $sth = $db->prepare($q);
        $sth->bindParam(':eml', $email);
        $sth->bindParam(':usr', $username);
        $sth->execute();
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $sth->rowCount();

        //$rows= $db->query("SELECT UName,Email FROM userslist WHERE (Email=$eml OR UName = $usr)");
        //$num_rows = $rows->rowCount();
        if($rows > 0){
            $db = null;
            return true;
        }else{
            $post = "INSERT INTO userslist (UName , Email, Password, Type) VALUES (:usr, :eml , :passw, :tp)";
            $query = $db->prepare($post);
            $query->bindParam(':eml', $email);
            $query->bindParam(':usr', $username);
            $query->bindParam(':tp', $type);
            $password_hash = password_hash($pwd, PASSWORD_BCRYPT);
            $query->bindParam(':passw', $password_hash);
            $query->execute();
            //$db->query("INSERT INTO userslist (UName , Email, Password) VALUES ($usr , $eml , $pass)");
            $db = null;
            return false;
        }
    }catch(PDOException $ex){
        die('Database error: ' . $ex->getMessage());
    }
}

function isBookExist($title , $subtitle , $price, $date, $description, $cover){
    try{
        //connetto al db
        $db = dbconnect();

        $q = "SELECT Title,SubTitle FROM products WHERE (Title= :ttl OR SubTitle = :sbttl)";
        $sth = $db->prepare($q);
        $sth->bindParam(':ttl', $title);
        $sth->bindParam(':sbttl', $subtitle);
        $sth->execute();
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $sth->rowCount();

        if($rows > 0){
            $db = null;
            return true;
        }else{
            $post = "INSERT INTO products (Title , Author, SubTitle, longDesc, Img, Publication, Price) VALUES (:ttl, :thr, :sbttl , :dsc, :mg, :pblctn, :prc)";
            $query = $db->prepare($post);
            $query->bindParam(':ttl', $title);
            $query->bindParam(':thr', $_SESSION["name"]);
            $query->bindParam(':sbttl', $subtitle);
            $query->bindParam(':dsc', $description);
            $query->bindParam(':mg', $cover);
            $query->bindParam(':pblctn', $date);
            $query->bindParam(':prc', $price);
            $query->execute();

            $db = null;
            return false;
        }
    }catch(PDOException $ex){
        die('Database error: ' . $ex->getMessage());
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
