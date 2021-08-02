<?php
header("Access-Control-Allow-Origin: *");

require_once('../cnx.php');
require_once('../classes/class.Status.php');

// List of config
$sql = "SELECT *
        FROM status";

// Prepare SQL request
$request = $pdo->prepare($sql);

// create array to store the list
$list = array();

// if SQL request get data 
if ($request->execute()) {
    // check result
    while ($mydata = $request->fetch()) {
        // create status object
        $status = new Status (
            $mydata['ID_status'],
            $mydata['NAME_status'],
        );

        // add config to the list
        $list[] = $status;
    }
}

// send JSON flux
echo json_encode($list);
exit();

?>