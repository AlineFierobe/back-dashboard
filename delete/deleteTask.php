<?php
    header("Access-Control-Allow-Origin: *");

    require_once('../cnx.php');    
    
    if(isset($_POST['id'])){
        // delete the task
        $sql = "DELETE FROM task WHERE ID_task = ? ";
        // prepare the request
        $requete = $pdo->prepare($sql);
        // parameters : id task
        $requete->bindValue(1, $_POST['id']);
        echo $requete->execute();
        
    }else{
        echo -1;
    }
    
?>