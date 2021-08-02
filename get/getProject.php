<?php
header("Access-Control-Allow-Origin: *");

require_once('../cnx.php');
require_once('../classes/class.Project.php');
require_once('../classes/class.Status.php');
require_once('../classes/class.TypeProject.php');


if (isset($_POST['id'])) {
    $_GET['id'] = $_POST['id'];
} else if (isset($_GET['id'])) {
    $_POST['id'] = $_GET['id'];
}

if( isset($_POST['id']) ){

    // get project ID in database
    $sql = "SELECT * 
            FROM project, status, type_project 
            WHERE STATUS_project = ID_status
            AND TYPE_project = ID_type_project
            AND ID_project = ?";

    // prepare sql request
    $request = $pdo->prepare($sql);

    // parameter : project's id
    $request->bindValue(1, $_POST['id']);

    // create a project of null
    $project = null;

    if ($request->execute()) {
        // get result
        if ($mydata = $request->fetch()) {
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
        };
    };

echo json_encode($project);

} else {
    echo -1;
}
?>