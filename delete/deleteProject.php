<?php
    header("Access-Control-Allow-Origin: *");

    require_once('../cnx.php');    
    
    if(isset($_POST['id'])){
        // delete the project
        $sql = "DELETE FROM project WHERE ID_project = ?";
        // prepare the request
        $requete = $pdo->prepare($sql);
        // parameters : id project
        $requete->bindValue(1, $_POST['id']);
        echo $requete->execute();

        // delete all task related to this project
        $sql = "DELETE FROM task WHERE PROJECT_task = ?";
        // prepare the request
        $requete2 = $pdo->prepare($sql);
        // parameters : id project
        $requete2->bindValue(1, $_POST['id']);
        echo $requete2->execute();

        // delete all meeting related to this project
        $sql = "DELETE FROM meeting WHERE PROJECT_meeting = ?";
        // prepare the request
        $requete3 = $pdo->prepare($sql);
        // parameters : id project
        $requete3->bindValue(1, $_POST['id']);
        echo $requete3->execute();
        
    }else{
        echo -1;
    }
    
?>