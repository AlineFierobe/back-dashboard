<?php
header("Access-Control-Allow-Origin: *");

require_once('../cnx.php');
require_once('../classes/class.Project.php');
require_once('../classes/class.Status.php');
require_once('../classes/class.TypeProject.php');

// List of Project
$sql = "SELECT *
        FROM project, status, type_project
        WHERE STATUS_project = ID_status
        AND TYPE_project = ID_type_project";

// Prepare SQL request
$request = $pdo->prepare($sql);

// create array to store the list
$list = array();

// if SQL request get data 
if ($request->execute()) {
    // check result
    while ($mydata = $request->fetch()) {
        // create Project object
        $project = new Project (
            $mydata['ID_project'],
            $mydata['NAME_project'],
            $mydata['DESCRIPTION_project'],
            $mydata['DEADLINE_project'],
            $mydata['TYPE_project'],
            $mydata['STATUS_project']
        );

        // create Type object
        $type = new TypeProject (
            $mydata['ID_type_project'],
            $mydata['NAME_type_project']
        );

        // create Status object
        $status = new Status (
            $mydata['ID_status'],
            $mydata['NAME_status']
        );

        // set Status to Project
        $project->setStatus($status);
        $project->setType($type);


        // add Project to the list
        $list[] = $project;
    }
}

// send JSON flux
echo json_encode($list);
exit();

?>