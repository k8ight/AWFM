<?php 
include("iconloader.php"); 
$db="database";
	chdir($db);
include("engine.php");	
?>
<!doctype html>
<html>
<head>
   <meta charset="UTF-8">
   <link rel="shortcut icon" href="favicon.ico">
   <title>Notepad++</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="mobile.css">
</head>

<body link="black">
<?php
if(isset($_REQUEST["o"])){
		$db1=urldecode($_REQUEST["o"]);
		$tokens = explode('/', $db1);      // split string on :
array_pop($tokens);                   // get rid of last element
$ns = implode('/', $tokens);
  $bck= "<a href='./?o=".$ns."'>Back</a><br>";    

		if($db1==""){
			
$directory = "";
$_SESSION['dir']="";
		}
		else{
			$directory=$db1.'/';
			$_SESSION['dir']=$directory;
	}}
	
			$db1=urldecode($_REQUEST["o"]);
			$tokens = explode('/', $db1);      // split string on :
		array_pop($tokens);                   // get rid of last element
$ns = implode('/', $tokens);
if($db1==""){
 $bck="";
		}else{
  $bck= "<a href='./?o=".$ns."'><button id='b' color='white'>Back</button></a><br>"; 
  $bckx="<a href='./?o=".$ns."'>Back</a>";
		}
?>


<div id='container2'>
 <div id='tbh'>     
            <div id='ha'>Icon</div>
			<div id='hb'>File/Folder name<button onclick="onf()" id='addfol'><img src='data:image/png;base64,<?php echo $nFol;?>' hright='32' width='32'></button><button onclick="onx()" id='addf'><img src='data:image/png;base64,<?php echo $nfil;?>' hright='32' width='32'></button></div>
			<div id='hc'>Type</div>
			<div id='hf'>Actions<?php echo  $bck;?></div>
		</div>
		</div>
	  
		
	<div id='container4'> <?php
	
$files = glob($directory . "*");
 foreach($files as $file)
{
 if(is_dir($file))
 {
	  echo "<div id='tb'>
		    <div id='ba'><center><a href='./?o=$file'><img src='data:image/png;base64,$flder' hright='32' width='32'></a></center></div>
			<div id='bb'><b>$file</b></div>
			<div id='bc'></a>File Folder</div>
			<div id='bf'><a href='./?o=$file'><button id='a'>Open</button></a><a href='./?del=$file'><button id='del'>Delete</button></a>$bck</div>
			</div> ";/**/
			
 }
 else{
	 $ftyp= end(explode(".", $file));
	 if($ftyp=='txt'){
		 $fig=$txt;
	 }elseif($ftyp=='php'){
		 $fig=$php;
	 }elseif($ftyp=='html'){
		 $fig=$html;
	 }elseif($ftyp=='css'){
		 $fig=$css;
	 }elseif($ftyp=='sql'){
		 $fig=$sql;
	 }elseif($ftyp=='c'){
		 $fig=$c;
	 }elseif($ftyp=='cpp'){
		 $fig=$c;
	 }elseif($ftyp=='js'){
		 $fig=$js;
	 }elseif($ftyp=='xml'){
		 $fig=$xml;
	 }
	 else{
		 $fig=$other;
	 }
	 echo "<div id='tb'>
		    <div id='ba'><center><a  href='./?e=$file'><img  src='data:image/png;base64,$fig' hright='32' width='32'></a></center></div>
			<div id='bb'><b>$file</b></div>
			<div id='bc'>$ftyp</div>
			<div id='bf'><a href='./?e=$file'><button onclick='ef()' id='a'>Edit</button></a><a href='./?del=$file'><button id='del'>Delete</button></a></div>
			</div> ";
 }
}

	?>

	    </tbody>
	</table>
	<center>
	<h4>&copy 2018-19 sounak kar;</h4></center>
</div>

<div id='nf'>
    <form method='post'>
	<input type="text" id="fil" name="nf" placeholder="New File Name"  pattern="[a-zA-Z0-9-]+\.[a-zA-Z0-9-]+" required />
	<input type="hidden"  name="dir" value="<?php echo $_SESSION['dir'];?>" required />
	<input type="submit" formaction="./?nf=&&?dir=" value="Create" /><br>
	</form>
	</div>
<div id='cf'>
	<form method='post'>
	<input type="text" id="fol" name="n" placeholder="New Folder Name" required />
	<input type="hidden"  name="dir" value="<?php echo $_SESSION['dir'];?>" required />
	<input type="submit" formaction="./?n=&&?dir="  value="Create" /><br>
	</form>
	</div>
<div class="menu">
  <ul class="menu-options">
    <li class="menu-option" onclick="onf()">New Folder</li>
    <li class="menu-option" onclick="onx()">New File</li>
    <li class="menu-option"><?php echo $bckx;?></li>
    <li class="menu-option" onclick="ofx()">Exit</li>
  </ul>
</div>
	
<div id='editA'>
<?php 
if(isset($_REQUEST["e"])){
		$db5=urldecode($_REQUEST["e"]);
		if(!$db5==""){	
	$cgx='<script>document.getElementById("editA").style="display:inline-block;"; 
	
	</script>';}
	$tokenx = explode('/', $db5);      // split string on :
		array_pop($tokenx);                   // get rid of last element
$nx = implode('/', $tokenx);
$ldr='<embed    id="runc"  src="database/'.$db5.'" />';
}

	?>	
<form action="" method="post" name="login">

<textarea id="t" name="t" placeholder="Do your work here" >
<?php 
if (isset($_POST['sp'])){
$t=$_POST['t'];
$edx = fopen($db5, "w+") ;
fwrite($edx, $t);
fclose($edx);
$ldr='<embed    id="runc"  src="database/'.$db5.'" />';
header("LOCATION ./");
}
if(!$db5==""){
$filex = fopen($db5,"r+");
while(! feof($filex))
  {
  echo fgets($filex);
  }
fclose($filex);
}

?>
</textarea>

<input type="submit" name="sp"   value="SAVE & RUN" />
</form>
<?php echo $ldr;?>

<a href="./?o=<?php echo $nx;?>"><button id="bx" onclick="ef()">X</button></a>

</div>
	<?php echo $cgx;	?>

	<script>
	document.getElementById("editA").innerHTML.reload;
	function onf(){
		document.getElementById("nf").style="display:none;";
		document.getElementById("cf").style="display:flex;";
	}
	function onx(){
		document.getElementById("cf").style="display:none;";
		document.getElementById("nf").style="display:flex;";
	}
	function ofx(){
		document.getElementById("cf").style="display:none;";
		document.getElementById("nf").style="display:none;";
	}
	
			function ef(){
		document.getElementById("editA").style="display:inline-block;";
		
					}
				
	</script>
	 <script  src="./script.js"></script>
</body>
</html>
