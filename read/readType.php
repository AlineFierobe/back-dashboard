<?php
header("Access-Control-Allow-Origin: *");

require_once('../cnx.php');
require_once('../classes/class.Type.php');

// List of config
$sql = "SELECT *
        FROM type_meeting";

// Prepare SQL request
$request = $pdo->prepare($sql);

// create array to store the list
$list = array();

// if SQL request get data 
if ($request->execute()) {
    // check result
    while ($mydata = $request->fetch()) {
        // create type object
        $type = new Type (
            $mydata['ID_type_meeting'],
            $mydata['NAME_type_meeting'],
        );

        // add config to the list
        $list[] = $type;
    }
}

// send JSON flux
echo json_encode($list);
exit();

?>