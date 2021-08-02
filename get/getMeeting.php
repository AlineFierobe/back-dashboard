<?php
header("Access-Control-Allow-Origin: *");

require_once('../cnx.php');
require_once('../classes/class.Meeting.php');
require_once('../classes/class.Project.php');
require_once('../classes/class.Type.php');
require_once('../classes/class.Status.php');


if (isset($_POST['id'])) {
    $_GET['id'] = $_POST['id'];
} else if (isset($_GET['id'])) {
    $_POST['id'] = $_GET['id'];
}

if( isset($_POST['id']) ){

    // get meeting ID in database
    $sql = "SELECT * 
            FROM meeting, project, status, type_meeting 
            WHERE STATUS_meeting = ID_status
            AND PROJECT_meeting = ID_project
            AND TYPE_meeting = ID_type_meeting
            AND ID_meeting = ?";

    // prepare sql request
    $request = $pdo->prepare($sql);

    // parameter : meeting's id
    $request->bindValue(1, $_POST['id']);

    // create a meeting of null
    $meeting = null;

    if ($request->execute()) {
        // get result
        if ($mydata = $request->fetch()) {
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

            // create Type object
            $type = new Type (
                $mydata['ID_type_meeting'],
                $mydata['NAME_type_meeting']
            );

            // set data to meeting
            $meeting->setStatus($status);
            $meeting->setType($type);
            $meeting->setProject($project);
        };
    };

echo json_encode($meeting);

} else {
    echo -1;
}
?>