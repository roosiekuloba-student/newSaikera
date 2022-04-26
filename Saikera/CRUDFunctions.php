<?php 

require_once ("index.php");
require_once ("functions.php");

$con = Createdb();

//C
if (isset($_POST['create'])){
	createData();
}


function createData(){
	$book_title = textboxValue("book_title");
	$book_author = textboxValue("book_author");
	$book_genre = textboxValue("book_genre");

	if($book_title && $book_author && $book_genre){

		$sql = "INSERT INTO books (book_title, book_author,book_genre) VALUES ('$book_title', '$book_author', '$book_genre')";

		if (mysqli_query($GLOBALS['con'], $sql)){
		textNode("success", "Record Successfully Inserted...");
		}
		else {
			textNode("error", "Record Not Inserted...");
		}
	}
	else {
		textNode("error", "Provide Data in the Text Box...");
	}
}

function textboxValue($value){
	$textbox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
	if(empty($textbox)){
		return false;
	}
	else {
		return $textbox;
	}
}

function getData(){

	$sql = "SELECT * FROM books";

	$returns = mysqli_query($GLOBALS['con'], $sql);
	if(mysqli_num_rows($returns) > 0){
		return $returns;
	}
}

function textNode($className, $msg){
	$thing = "<h6 class = '$className'>$msg</h6>";
	echo $thing;
}

