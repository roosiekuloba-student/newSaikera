<?php

function SL(){
	$text = "Sample";
	$file = "sampleEx.php";
	$title = "Download sample";
	$sampleLink = "<a href = '$file' title = '$title'>$text</a>";
	echo $sampleLink;
}

function createDb(){

$con = mysqli_connect("localhost", "root", "");
if (!$con){
	die ("Connection Failed ". mysqli_connect_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS saikeraDb";

//call the query (execute):
if (mysqli_query($con, $sql)) /* if connection works, create db */{
	$con = mysqli_connect("localhost", "root", "", "saikeraDb");

	$sql = "CREATE TABLE IF NOT EXISTS books (
		id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		book_title VARCHAR(50) NOT NULL,
		book_author VARCHAR(50) NOT NULL,
		book_genre VARCHAR(50) NOT NULL
		);";

	if (mysqli_query($con, $sql)){
		return $con;
	}
	else {
		echo "Cannot Create Table...";
	}
}
else {
	echo "Database Failed To Be Created... ". mysqli_error($con);
}

}

?>