<?php
$parametres = parse_ini_file('param/param.ini');

// connect to database using param.ini file
$pdo = new PDO(
    $parametres['dsn'],
    $parametres['user'],
    $parametres['psw']
);

// connect all to the website address
$host = $parametres['host'];
?>