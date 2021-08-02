<?php
    header("Access-Control-Allow-Origin: *");

    require_once('../cnx.php');    
    
    if(isset($_POST['id'])){
        // delete the meeting
        $sql = "DELETE FROM meeting WHERE ID_meeting = ? ";
        // prepare the request
        $requete = $pdo->prepare($sql);
        // parameters : id meeting
        $requete->bindValue(1, $_POST['id']);
        echo $requete->execute();
        
    }else{
        echo -1;
    }
    
?>