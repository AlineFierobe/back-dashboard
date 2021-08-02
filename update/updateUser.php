<?php
    header("Access-Control-Allow-Origin: *");

    require_once('../cnx.php');    
    
    if(isset($_POST['id'])){
        // update USER
        $sql = "UPDATE user SET FIRSTNAME_user = ?, LASTNAME_user = ?, MORE_user = ?, ICON_user = ? WHERE ID_user = ? ";
        // prepare the request
        $requete = $pdo->prepare($sql);
        // parameters : from USER
        $requete->bindValue(1, $_POST['firstName']);
        $requete->bindValue(2, $_POST['lastName']);
        $requete->bindValue(3, $_POST['more']);
        $requete->bindValue(4, $_POST['icon']);
        $requete->bindValue(5, $_POST['id']);

        echo $requete->execute();
    }else{
        echo -1;
    }
    ?>