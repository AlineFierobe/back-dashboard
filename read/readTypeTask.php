<?php
header("Access-Control-Allow-Origin: *");

require_once('../cnx.php');
require_once('../classes/class.TypeTask.php');

// List of config
$sql = "SELECT *
        FROM type_task";

// Prepare SQL request
$request = $pdo->prepare($sql);

// create array to store the list
$list = array();

// if SQL request get data 
if ($request->execute()) {
    // check result
    while ($mydata = $request->fetch()) {
        // create type object
        $type = new TypeTask (
            $mydata['ID_type_task'],
            $mydata['NAME_type_task'],
        );

        // add config to the list
        $list[] = $type;
    }
}

// send JSON flux
echo json_encode($list);
exit();

?>