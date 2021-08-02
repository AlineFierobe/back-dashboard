<?php
header("Access-Control-Allow-Origin: *");

require_once('../cnx.php');
require_once('../classes/class.Config.php');


if (isset($_POST['id'])) {
    $_GET['id'] = $_POST['id'];
} else if (isset($_GET['id'])) {
    $_POST['id'] = $_GET['id'];
}

if( isset($_POST['id']) ){

    // get config ID in database
    $sql = "SELECT * 
            FROM config
            WHERE ID_config = ?";

    // prepare sql request
    $request = $pdo->prepare($sql);

    // parameter : config's id
    $request->bindValue(1, $_POST['id']);

    // create a config of null
    $config = null;

    if ($request->execute()) {
        // get result
        if ($mydata = $request->fetch()) {
            $config = new Config (
                $mydata['ID_config'],
                $mydata['SITENAME_config'],
                $mydata['DEVNAME_config'],
                $mydata['DEVSITE_config'],
                $mydata['ABOUT_config'],
            );
        };
    };

echo json_encode($config);

} else {
    echo -1;
}
?>