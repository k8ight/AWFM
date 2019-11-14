<?php
session_start();
if(isset($_REQUEST["n"])){
		$db3=urldecode($_REQUEST["n"]);
		$dbx=urldecode($_REQUEST["dir"]);
		mkdir($dbx.$db3);
			$tokensx = explode('/', $dbx);      // split string on :
		array_pop($tokensx);                   // get rid of last element
$nsx = implode('/', $tokensx);
		 header("LOCATION: ./?o=$nsx");
	
	}
	
	elseif(isset($_REQUEST["nf"])){
		$db4=urldecode($_REQUEST["nf"]);
		$dbx=urldecode($_REQUEST["dir"]);
		$fpx = fopen($dbx.$db4, "a");
		fclose($fpx);
			$tokensx = explode('/', $dbx);      // split string on :
		array_pop($tokensx);                   // get rid of last element
$nsx = implode('/', $tokensx);
      header("LOCATION: ./?o=$nsx");
	}
	
	
	elseif(isset($_REQUEST["del"])){
		$db6=urldecode($_REQUEST["del"]);
		$tokensx = explode('/', $db6);      // split string on :
		array_pop($tokensx);                   // get rid of last element
$nsx = implode('/', $tokensx);

 if (is_dir($db6)) {
            rmdir($db6);
        } else {
            unlink($db6);
        }
		
	header("LOCATION: ./?o=$nsx");
	}
	else{
		
	}
	
?>