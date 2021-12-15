<?php
function prettyfoldersize($dir)
{
    $siz = 0;
$siz = 0;
    $path = realpath($path);
    if($path!==false && $path!='' && file_exists($path)){
        foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS)) as $object){
            $siz += $object->getSize();
			
        }
    }
  
		 	if ($siz < 1024) {
      $size=$siz . ' Byte';
    } elseif ($siz < 1048576) {
      $size=round($siz / 1024, 2) . ' KB';
    } elseif ($siz < 1073741824) {
      $size=round($siz / 1048576, 2) . ' MB';
    } elseif ($siz < 1099511627776) {
     $size=round($siz/ 1073741824, 2) . ' GB';
    } else {
		$size=round($siz / 1099511627776, 2) . ' TB';
    }
	
	return $size;
}
function prettyfilesize($file){
	$siz=filesize($file);
	if ($siz < 1024) {
      $size=$siz . ' Byte';
    } elseif ($siz < 1048576) {
      $size=round($siz / 1024, 2) . ' KB';
    } elseif ($siz < 1073741824) {
      $size=round($siz / 1048576, 2) . ' MB';
    } elseif ($siz < 1099511627776) {
     $size=round($siz/ 1073741824, 2) . ' GB';
    } else {
		$size=round($siz / 1099511627776, 2) . ' TB';
    }
	
	return $size;
}
function pfs($siz){
	
	if ($siz < 1024) {
      $size=$siz . ' Byte';
    } elseif ($siz < 1048576) {
      $size=round($siz / 1024, 2) . ' KB';
    } elseif ($siz < 1073741824) {
      $size=round($siz / 1048576, 2) . ' MB';
    } elseif ($siz < 1099511627776) {
     $size=round($siz/ 1073741824, 2) . ' GB';
    } else {
		$size=round($siz / 1099511627776, 2) . ' TB';
    }
	
	return $size;
}
?>