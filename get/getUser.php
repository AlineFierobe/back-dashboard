<?php
header("Access-Control-Allow-Origin: *");

require_once('../cnx.php');
require_once('../classes/class.User.php');


if (isset($_POST['id'])) {
    $_GET['id'] = $_POST['id'];
} else if (isset($_GET['id'])) {
    $_POST['id'] = $_GET['id'];
}

if( isset($_POST['id']) ){

    // get user ID in database
    $sql = "SELECT * 
            FROM user
            WHERE ID_user = ?";

    // prepare sql request
    $request = $pdo->prepare($sql);

    // parameter : user's id
    $request->bindValue(1, $_POST['id']);

    // create a user of null
    $user = null;

    if ($request->execute()) {
        // get result
        if ($mydata = $request->fetch()) {
            $user = new User (
                $mydata['ID_user'],
                $mydata['FIRSTNAME_user'],
                $mydata['LASTNAME_user'],
                $mydata['MORE_user'],
                $mydata['ICON_user'],
                $mydata['PASSWORD_user'],
            );
        };
    };

echo json_encode($user);

} else {
    echo -1;
}
?>