<?php
header("Access-Control-Allow-Origin: *");

require_once('../cnx.php');
require_once('../classes/class.Config.php');

// List of config
$sql = "SELECT *
        FROM config";

// Prepare SQL request
$request = $pdo->prepare($sql);

// create array to store the list
$list = array();

// if SQL request get data 
if ($request->execute()) {
    // check result
    while ($mydata = $request->fetch()) {
        // create config object
        $config = new Config (
            $mydata['ID_config'],
            $mydata['SITENAME_config'],
            $mydata['DEVNAME_config'],
            $mydata['DEVSITE_config'],
            $mydata['ABOUT_config'],
        );

        // add config to the list
        $list[] = $config;
    }
}

// send JSON flux
echo json_encode($list);
exit();

?>