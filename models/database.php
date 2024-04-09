<?php

$_hostname = 'localhost';
$_username = 'root';
$_password = 'mysql';
$_database = 'php1_dbv2';
$_port = 3306;


    $connection = new mysqli(
        $_hostname,
        $_username,
        $_password,
        $_database,
        $_port
    );
