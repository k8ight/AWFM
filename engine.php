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
    
	 $objects = scandir($db6);
     foreach ($objects as $object) { 
       if ($object != "." && $object != "..") { 
         if (is_dir($db6. DIRECTORY_SEPARATOR .$object) && !is_link($db6."/".$object))
           rrmdir($db6. DIRECTORY_SEPARATOR .$object);
         else
           unlink($db6. DIRECTORY_SEPARATOR .$object); 
       } 
     }
	rmdir($db6);							
        } else {
            unlink($db6);
        }
		
	header("LOCATION: ./?o=$nsx");
	}elseif(isset($_REQUEST["dl"])){
		date_default_timezone_set('Asia/Kolkata'); 
        $ukey=md5(date("h:i"));
		$dlf=urldecode($_REQUEST["dl"]);
		$kex=urldecode($_REQUEST["key"]);
		if($ukey==$kex){
			if (str_contains($dlf, '/')) {
				$file="./".$dlf;
            }else{
				 $file=$dlf;
			}
			
			if (file_exists($file)) {
				echo basename($file).filesize($file);
				
	header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate,post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
	/*ob_clean();
    flush();*/
	 exit;
			}else{header("Location: ./404");}
		}else{header("Location: ./");}
	}elseif(isset($_REQUEST["cdl"])){
		date_default_timezone_set('Asia/Kolkata'); 
        $ukey=md5(date("h:i"));
		$cdlf=urldecode($_REQUEST["cdl"]);
		$kex=urldecode($_REQUEST["key"]);
		if($ukey==$kex){
    $zip = new ZipArchive;
    $download = $cdlf.'-backup.zip';
    $zip->open($download, ZipArchive::CREATE);
    foreach (glob("$cdlf/*.*") as $file) { /* Add appropriate path to read content of zip */
        $zip->addFile($file);
    }
    $zip->close();
    $lbac=explode( "/", $cdlf );
	array_splice( $lbac, -1 );
	$rtrnx=implode( "/", $lbac );
    header("Location: ./?o=$rtrnx");
	
      }else{header("Location: ./");}
	}
	else{
		
	}
	
	
	
?>