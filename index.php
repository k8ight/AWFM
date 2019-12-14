<?php 
include("iconloader.php"); 
$db="www";
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
	chdir($db);
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
  $bckx='<a href="./?o='.$ns.'"><li class="menu-option">Back</li></a>';
		}
?>


<div id='container2' class='ctn'>
 <div id='tbh'>     
            <div id='ha'>Icon</div>
			<div id='hb'>File/Folder name<button onclick="onf()" id='addfol'><img src='data:image/png;base64,<?php echo $nFol;?>' hright='32' width='32'></button><button onclick="onx()" id='addf'><img src='data:image/png;base64,<?php echo $nfil;?>' hright='32' width='32'></button></div>
			<div id='hc'>Type</div>
			<div id='hf'>Actions<?php echo  $bck;?></div>
			<div id='hd'>File Size</div>
			<div id='he'>File date</div>
		</div>
		</div>
	  
		
	<div id='container4'> 
<form action='post'>	
</form>	
	<?php
	chdir($db);
$files = glob($directory . "*");
 foreach($files as $file)
{
 if(is_dir($file))
 {
	  echo "<div id='tb' >
		    <div id='ba'><center><a href='./?o=$file'><img src='data:image/png;base64,$flder' hright='32' width='32'></a></center></div>
			<div id='bb' class='statusf'>$file</div>
			<div id='bc'></a>File Folder</div>
			<div id='bf' ><a href='./?o=$file'><button id='a'>Open</button></a><a href='./?del=$file'><button id='del'>Delete</button></a>$bck</div>
			<div id='fs'>N.A</div>
			<div id='fd'></div>
			</div> ";/**/
			
 }
 else{
	 $ftyp= end(explode(".", $file));
	 $a = getimagesize($file);
	$image_type = $a[2];
	if(in_array($image_type , array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG , IMAGETYPE_BMP)))
	{
		$cfx='./?iv';		
	}
	else{
		$cfx='./?e';
	}
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
		
		$time=filemtime($file);
	$modtime= date("F d Y",$time);
	$size=filesize($file);
		if ($size < 1024) {
      $siz=$size . ' Byte';
    } elseif ($size < 1048576) {
      $siz=round($size / 1024, 2) . ' KB';
    } elseif ($size < 1073741824) {
      $siz=round($size / 1048576, 2) . ' MB';
    } elseif ($size < 1099511627776) {
     $siz=round($size/ 1073741824, 2) . ' GB';
    } else {
		$siz=round($size / 1099511627776, 2) . ' TB';
    } 
	 echo "<div id='tb' >
		    <div id='ba'><center><a  href='./?e=$file'><img  src='data:image/png;base64,$fig' hright='32' width='32'></a></center></div>
			<div id='bb'  class='status'>$file</div>
			<div id='bc'>$ftyp</div>
			<div id='bf' ><a href='$cfx=$file'><button onclick='ef()' id='a'>Edit/View</button></a><a href='./?del=$file'><button id='del'>Delete</button></a></div>
			<div id='bd'>$siz</div>
			<div id='be'>$modtime</div>
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
	<button id="c" onclick="ofx()">X</button>
	</div>
<div id='cf'>
	<form method='post'>
	<input type="text" id="fol" name="n" placeholder="New Folder Name" required />
	<input type="hidden"  name="dir" value="<?php echo $_SESSION['dir'];?>" required />
	<input type="submit" formaction="./?n=&&?dir="  value="Create" /><br>
	</form>
	<button id="c" onclick="ofx()">X</button>
	</div>
	

<div id='editA'>
<?php 
if(isset($_REQUEST["e"])){
	chdir($db);
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
header("LOCATION ./?e=$db5");
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

<input type="submit" name="sp"   value="SAVE" />
</form>

<a href="./?o=<?php echo $nx;?>"><button id="bx" onclick="ef()">X</button></a>

</div>


<div id='ImgA'>
<?php 
if(isset($_REQUEST["iv"])){
	chdir($db);
		$db7=urldecode($_REQUEST["iv"]);
		
		if(!$db7==""){	
		echo "<center><img src='$db7' id='imxx'></center>";
	$cgx='<script>document.getElementById("ImgA").style="display:inline-block;"; 
	
	</script>';}
		
	$tokenx = explode('/', $db7);      // split string on :
		array_pop($tokenx);                   // get rid of last element
$nx = implode('/', $tokenx);

}
?>

<a href="./?o=<?php echo $nx;?>"><button id="bxx" onclick="ef()">EXIT</button></a>
</div>

<?php echo $cgx;	?>
<div id="menu">
<ul class="menu-options">
    <li class="menu-option" onclick="onf()">New Folder</li>
    <li class="menu-option" onclick="onx()">New File</li>
    <li class="menu-option"><?php echo $bckx;?></li>
    <li class="menu-option" onclick="ofx()">Exit</li>
  </ul>
</div>
	
	<script>
	
	document.getElementById("editA").innerHTML.reload;
	function onf(){
		document.getElementById("nf").style="display:none;";
		document.getElementById("cf").style="display:flex;";
		document.getElementById("menu").style="display:none;";
	}
	function onx(){
		document.getElementById("cf").style="display:none;";
		document.getElementById("nf").style="display:flex;";
		document.getElementById("menu").style="display:none;";
	}
	function ofx(){
		document.getElementById("cf").style="display:none;";
		document.getElementById("nf").style="display:none;";
		document.getElementById("menu").style="display:none;";
	}
	
			function ef(){
		document.getElementById("editA").style="display:inline-block;";
		document.getElementById("ImgA").style="display:inline-block;";
					}
	</script>
<script src="jquery.min.js"></script>
	<script>
	
  $(".status").bind('contextmenu', $.proxy(function(event) {
	  var status = $(event.target).text();
	 
	  	  event.preventDefault();
	var num = Math.floor((Math.random()*10)+1);
	 var validExtensions = ['jpg','gif','png','bmp','ico','tiff','svg','webp','heif','xcf']; //array of valid extensions
        var fileName = status;
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
        if ($.inArray(fileNameExt, validExtensions) == -1){
          var foi="e";
            var fix="Edit";      
		}
		else {var foi="iv"; var fix="View";}
    var img = $('<div><ul class="menu-options">    <li class="menu-option" onclick="onf()">New Folder</li>    <li class="menu-option" onclick="onx()">New File</li>     <a href="./?'+foi+'='+status+'"><li class="menu-option">'+fix+'</li></a> <a href="./?del='+status+'"><li class="menu-option">Delete</li></a> <?php echo $bckx;?>   <li class="menu-option" onclick="ofx()">Exit</li>  </ul></div>');
    $("#menu").html(img).offset({ top: event.pageY, left: event.pageX});
    $("#menu").css('display', 'inline-block');
	
  }, this));
  $(".status").bind('click', $.proxy(function(event) {
	  
    var img = $('');
    $("#menu").html(img).offset({ top: 0, left: 0});
    $("#menu").css('display', 'none');
  }, this));
  
  
     $(".statusf").bind('contextmenu', $.proxy(function(event) {
	  var statusf = $(event.target).text();
	  	  event.preventDefault();
	var num = Math.floor((Math.random()*10)+1);
	
    var img = $('<div><ul class="menu-options">    <li class="menu-option" onclick="onf()">New Folder</li>    <li class="menu-option" onclick="onx()">New File</li>     <a href="./?o='+statusf+'"><li class="menu-option">Open</li></a><a href="./?del='+statusf+'"> <li class="menu-option">Delete</li></a> <?php echo $bckx;?>   <li class="menu-option" onclick="ofx()">Exit</li>  </ul></div>');
    $("#menu").html(img).offset({ top: event.pageY, left: event.pageX});
    $("#menu").css('display', 'inline-block');
	
  }, this));
  
  $(".statusf").bind('click', $.proxy(function(event) {
	  
    var img = $('');
    $("#menu").html(img).offset({ top: 0, left: 0});
    $("#menu").css('display', 'none');
  }, this));
  
    $(".ctn").bind('contextmenu', $.proxy(function(event) {
	  var statusf = $(event.target).text();
	  	  event.preventDefault();
	var num = Math.floor((Math.random()*10)+1);
	
    var img = $('<div><ul class="menu-options">    <li class="menu-option" onclick="onf()">New Folder</li>    <li class="menu-option" onclick="onx()">New File</li>  <?php echo $bckx;?>   <li class="menu-option" onclick="ofx()">Exit</li>  </ul></div>');
    $("#menu").html(img).offset({ top: event.pageY, left: event.pageX});
    $("#menu").css('display', 'inline-block');
	
  }, this));
  
  $(".ctn").bind('click', $.proxy(function(event) {
	  
    var img = $('');
    $("#menu").html(img).offset({ top: 0, left: 0});
    $("#menu").css('display', 'none');
  }, this));

	</script>
	
	
</body>
</html>
