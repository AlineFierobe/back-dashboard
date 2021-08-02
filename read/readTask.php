<?php
header("Access-Control-Allow-Origin: *");

require_once('../cnx.php');
require_once('../classes/class.Task.php');
require_once('../classes/class.Status.php');
require_once('../classes/class.TypeTask.php');
require_once('../classes/class.Project.php');

// List of Project
$sql = "SELECT *
        FROM task, project, status, type_task
        WHERE STATUS_task = ID_status
        AND TYPE_task = ID_type_task
        AND PROJECT_task = ID_project";

// Prepare SQL request
$request = $pdo->prepare($sql);

// create array to store the list
$list = array();

// if SQL request get data 
if ($request->execute()) {
    // check result
    while ($mydata = $request->fetch()) {
        // create Task object
        $task = new Task (
            $mydata['ID_task'],
            $mydata['NAME_task'],
            $mydata['DEADLINE_task'],
            $mydata['DESCRIPTION_task'],
            $mydata['TYPE_task'],
            $mydata['PROJECT_task'],
            $mydata['STATUS_task'],
        );

        // create type object
        $type = new TypeTask (
            $mydata['ID_type_task'],
            $mydata['NAME_type_task']
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

        // set element to task
        $task->setProject($project);
        $task->setStatus($status);
        $task->setType($type);


        // add task to the list
        $list[] = $task;
    }
}

// send JSON flux
echo json_encode($list);
exit();

?>