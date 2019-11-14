<?php
$fp=fopen("../iconloader.php","a");
$fileList = glob('*.png');
fwrite($fp, "<?php".PHP_EOL);
foreach($fileList as $filename){
	$convrt =  base64_encode(file_get_contents($filename));
	$esp=explode(".",$filename);
	$xf='$'.$esp[0].'="'.$convrt.'";'.PHP_EOL;
	fwrite($fp, $xf); 
 }
 fwrite($fp, "?>");
fclose($fp);
echo "Flush complete";
?>