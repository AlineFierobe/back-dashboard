<?php
header("Access-Control-Allow-Origin: *");

require_once('../cnx.php');
require_once('../classes/class.TypeProject.php');

// List of config
$sql = "SELECT *
        FROM type_project";

// Prepare SQL request
$request = $pdo->prepare($sql);

// create array to store the list
$list = array();

// if SQL request get data 
if ($request->execute()) {
    // check result
    while ($mydata = $request->fetch()) {
        // create type object
        $type = new TypeProject(
            $mydata['ID_type_project'],
            $mydata['NAME_type_project'],
        );

        // add config to the list
        $list[] = $type;
    }
}

// send JSON flux
echo json_encode($list);
exit();

?>