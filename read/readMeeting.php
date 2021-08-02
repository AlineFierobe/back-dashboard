<?php
header("Access-Control-Allow-Origin: *");

require_once('../cnx.php');
require_once('../classes/class.Meeting.php');
require_once('../classes/class.Status.php');
require_once('../classes/class.Type.php');
require_once('../classes/class.Project.php');

// List of Project
$sql = "SELECT *
        FROM meeting, project, status, type_meeting
        WHERE STATUS_meeting = ID_status
        AND PROJECT_meeting = ID_project
        AND TYPE_meeting = ID_type_meeting";

// Prepare SQL request
$request = $pdo->prepare($sql);

// create array to store the list
$list = array();

// if SQL request get data 
if ($request->execute()) {
    // check result
    while ($mydata = $request->fetch()) {
        // create Meeting object
        $meeting = new Meeting (
            $mydata['ID_meeting'],
            $mydata['NAME_meeting'],
            $mydata['DATE_meeting'],
            $mydata['TIME_meeting'],
            $mydata['DESCRIPTION_meeting'],
            $mydata['MORE_meeting'],
            $mydata['REPORT_meeting'],
            $mydata['TYPE_meeting'],
            $mydata['PROJECT_meeting'],
            $mydata['STATUS_meeting'],
        );

        // create Type object
        $type = new Type (
            $mydata['ID_type_meeting'],
            $mydata['NAME_type_meeting'],
        );

        // create status object
        $status = new Status (
            $mydata['ID_status'],
            $mydata['NAME_status']
        );

        // create Project object
        $project = new Project (
            $mydata['ID_project'],
            $mydata['NAME_project'],
            $mydata['DESCRIPTION_project'],
            $mydata['DEADLINE_project'],
            $mydata['STATUS_project']
        );

        // set element to Meeting
        $meeting->setProject($project);
        $meeting->setStatus($status);
        $meeting->setType($type);


        // add Meeting to the list
        $list[] = $meeting;
    }
}

// send JSON flux
echo json_encode($list);
exit();

?>