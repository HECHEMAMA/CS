<?php
    require_once "./db.php";
    require_once "./utils.php";
    $cn = DB::getInstance();
    //$cn->execute("INSERT INTO nomames (name, description) VALUES (?,?)",["hola","subnormal"]);
    $cn->execute("SELECT * FROM nomames");
    var_dump($cn->rowCount());
    $result = $cn->fetch();
    var_dump($result);
?>