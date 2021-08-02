<?php
    header("Access-Control-Allow-Origin: *");

    require_once('../cnx.php');    
    
    if(isset($_POST['id'])){
        // update project
        $sql = "UPDATE project SET NAME_project = ?, DEADLINE_project = ?, DESCRIPTION_project = ?, TYPE_project = ?, STATUS_project = ? WHERE ID_project = ? ";
        // prepare the request
        $requete = $pdo->prepare($sql);
        // parameters : from project
        $requete = $pdo->prepare($sql);
        $requete->bindParam(1, $_POST['name']);
        $requete->bindParam(2, $_POST['deadline']);
        $requete->bindParam(3, $_POST['description']);
        $requete->bindParam(4, $_POST['type']);
        $requete->bindParam(5, $_POST['status']);
        $requete->bindValue(6, $_POST['id']);

        echo $requete->execute();
    }else{
        echo -1;
    }
    ?>