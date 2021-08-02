<?php
header("Access-Control-Allow-Origin: *");

require_once('../cnx.php');
require_once('../classes/class.Task.php');
require_once('../classes/class.Project.php');
require_once('../classes/class.Status.php');
require_once('../classes/class.TypeTask.php');


if (isset($_POST['id'])) {
    $_GET['id'] = $_POST['id'];
} else if (isset($_GET['id'])) {
    $_POST['id'] = $_GET['id'];
}

if( isset($_POST['id']) ){

    // get task ID in database
    $sql = "SELECT * 
            FROM task, project, status, type_task
            WHERE STATUS_task = ID_status
            AND PROJECT_task = ID_project
            AND TYPE_task = ID_type_task
            AND ID_task = ?";

    // prepare sql request
    $request = $pdo->prepare($sql);

    // parameter : task's id
    $request->bindValue(1, $_POST['id']);

    // create a task of null
    $task = null;

    if ($request->execute()) {
        // get result
        if ($mydata = $request->fetch()) {
            $task = new Task (
                $mydata['ID_task'],
                $mydata['NAME_task'],
                $mydata['DEADLINE_task'],
                $mydata['DESCRIPTION_task'],
                $mydata['TYPE_task'],
                $mydata['PROJECT_task'],
                $mydata['STATUS_task'],
            );

            // create Type object
            $type = new TypeTask (
                $mydata['ID_type_task'],
                $mydata['NAME_type_task']
            );

            // create Project object
            $project = new Project (
                $mydata['ID_project'],
                $mydata['NAME_project'],
                $mydata['DESCRIPTION_project'],
                $mydata['DEADLINE_project'],
                $mydata['STATUS_project']
            );

            // create Status object
            $status = new Status (
                $mydata['ID_status'],
                $mydata['NAME_status']
            );

            // set data to task
            $task->setStatus($status);
            $task->setType($type);
            $task->setProject($project);
        };
    };

echo json_encode($task);

} else {
    echo -1;
}
?>