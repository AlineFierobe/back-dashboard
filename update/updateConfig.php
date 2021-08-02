<?php
    header("Access-Control-Allow-Origin: *");

    require_once('../cnx.php');    
    
    if(isset($_POST['id'])){
        // update config
        $sql = "UPDATE config SET SITENAME_config = ?, DEVNAME_config = ?, DEVSITE_config = ?, ABOUT_config = ? WHERE ID_config = ?";
        // prepare the request
        $requete = $pdo->prepare($sql);
        // parameters : from config
        $requete->bindValue(1, $_POST['siteName']);
        $requete->bindValue(2, $_POST['devName']);
        $requete->bindValue(3, $_POST['devSite']);
        $requete->bindValue(4, $_POST['about']);
        $requete->bindValue(5, $_POST['id']);

        echo $requete->execute();
    }else{
        echo -1;
    }
    ?>