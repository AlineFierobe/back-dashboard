<?php
header("Access-Control-Allow-Origin: *");

require_once('../cnx.php');


if(isset($_POST["name"])){
    
    $sql = "INSERT INTO `task` (`NAME_task`, `DEADLINE_task`, `DESCRIPTION_task`, `TYPE_task`, `PROJECT_task`, `STATUS_task`) VALUES(? , ? , ? , ? , ? , ?)";
    $requete = $pdo->prepare($sql);
    $requete->bindParam(1, $_POST['name']);
    $requete->bindParam(2, $_POST['deadline']);
    $requete->bindParam(3, $_POST['description']);
    $requete->bindParam(4, $_POST['type']);
    $requete->bindParam(5, $_POST['project']);
    $requete->bindParam(6, $_POST['status']);
    echo $requete->execute();

}else{
    echo -1;
}