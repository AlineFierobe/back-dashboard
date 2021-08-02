<?php
header("Access-Control-Allow-Origin: *");

require_once('../cnx.php');


if(isset($_POST["name"])){
    
    $sql = "INSERT INTO `meeting` (`NAME_meeting`, `DATE_meeting`, `TIME_meeting`, `DESCRIPTION_meeting`, `MORE_meeting`, `REPORT_meeting`, `TYPE_meeting`, `PROJECT_meeting`, `STATUS_meeting`) VALUES(? , ? , ? , ? , ? , ? , ? , ? , ?)";
    $requete = $pdo->prepare($sql);
    $requete->bindParam(1, $_POST['name']);
    $requete->bindParam(2, $_POST['date']);
    $requete->bindParam(3, $_POST['time']);
    $requete->bindParam(4, $_POST['description']);
    $requete->bindParam(5, $_POST['more']);
    $requete->bindParam(6, $_POST['report']);
    $requete->bindParam(7, $_POST['type']);
    $requete->bindParam(8, $_POST['project']);
    $requete->bindParam(9, $_POST['status']);
    echo $requete->execute();

}else{
    echo -1;
}