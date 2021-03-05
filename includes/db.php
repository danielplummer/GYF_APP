<?php
// Database connection

// Array with DB values
$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "root";
$db['db_name'] = "gyf-app";

// Loop through array and uppercase values
foreach ($db as $key => $value) {
	define(strtoupper($key), $value);
}

// Database Connection
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($connection){
	echo "successfully connected to the database";
}

?>