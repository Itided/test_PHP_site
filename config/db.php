<?php //access to database

$dblocation = "localhost";
$dbname = "furniture";
$dbuser = "root";
$dbpasswd = "root";

$db = mysqli_connect($dblocation, $dbuser, $dbpasswd); //connect

if(!$db){
	echo "Error connecting to MySQL!";
	exit();
}

mysqli_set_charset($db, 'utf8');

if(!mysqli_select_db($db, $dbname)){
	echo "Error connecting to DataBase: {$dbname}!";
	exit();
}

