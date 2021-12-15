<?php

// A list of permitted file extensions
$allowed = array('pdf', 'html','jpg','png','bmp','php','css','rar','7z','zip','svg','iso');

if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){
    session_start();
	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}

	if(move_uploaded_file($_FILES['upl']['tmp_name'], $_SESSION['curdir'].$_FILES['upl']['name'])){
		echo '{"status":"success"}';
		exit;
	}
}

echo '{"status":"error"}';
exit;
?>