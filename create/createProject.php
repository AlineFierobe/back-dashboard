<?php
header("Access-Control-Allow-Origin: *");

require_once('../cnx.php');


if(isset($_POST["name"])){
    
    $sql = "INSERT INTO `project` (`NAME_project`, `DESCRIPTION_project`, `DEADLINE_project`, `TYPE_project` , `STATUS_project`) VALUES(? , ? , ? , ? , ?)";
    $requete = $pdo->prepare($sql);
    $requete->bindParam(1, $_POST['name']);
    $requete->bindParam(2, $_POST['description']);
    $requete->bindParam(3, $_POST['deadline']);
    $requete->bindParam(4, $_POST['type']);
    $requete->bindParam(5, $_POST['status']);
    echo $requete->execute();

}else{
    echo -1;
}