<?php
header("Access-Control-Allow-Origin: *");

require_once('../cnx.php');
require_once('../classes/class.User.php');

// List of user
$sql = "SELECT *
        FROM user";

// Prepare SQL request
$request = $pdo->prepare($sql);

// create array to store the list
$list = array();

// if SQL request get data 
if ($request->execute()) {
    // check result
    while ($mydata = $request->fetch()) {
        // create user object
        $user = new User (
            $mydata['ID_user'],
            $mydata['FIRSTNAME_user'],
            $mydata['LASTNAME_user'],
            $mydata['MORE_user'],
            $mydata['ICON_user'],
            $mydata['PASSWORD_user'],
        );

        // add user to the list
        $list[] = $user;
    }
}

// send JSON flux
echo json_encode($list);
exit();

?>