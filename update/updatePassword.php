<?php
    header("Access-Control-Allow-Origin: *");

    require_once('../cnx.php');    
    
    if(isset($_POST['id'])){
        // update USER
        $sql = "UPDATE user SET PASSWORD_user = ? WHERE ID_user = ? ";
        // prepare the request
        $requete = $pdo->prepare($sql);
        // parameters : from USER
        $requete->bindValue(1, $_POST['password']);
        $requete->bindValue(2, $_POST['id']);

        echo $requete->execute();
    }else{
        echo -1;
    }
    ?>