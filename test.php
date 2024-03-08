<?php
    require_once "./db.php";
    //require_once "./utils.php";
    $cn = DB::getInstance();
    //$cn->execute("INSERT INTO tabla (name, description) VALUES (?,?)",["hola","xd"]);
    $cn->execute("SELECT * FROM tabla");
    var_dump($cn->rowCount());
    $result = $cn->fetch();
    var_dump($result);
?>