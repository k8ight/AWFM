<?php 
/*ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);*/
session_start();
$_SESSION['auth']="admin";
/*unset($_SESSION['auth']);*/
$auth=$_SESSION['auth'];
if(!empty($_SESSION["auth"])){/*auth system*/
/*if (is_dir($auth)){echo "";}else{ mkdir("./cdn/".$auth);};*/
	
include("iconloader.php"); 
$db="./WWW";
	chdir($db);
include("engine.php");
include("size.php"); 	


?>
<!doctype html>
<html>
<head>
   <meta charset="UTF-8">
   <link rel="shortcut icon" href="favicon.ico">
   <title>AWFM</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />

   <link rel="stylesheet" href="./style.css">
   <link rel="stylesheet" href="./ux.css">
   <link rel="stylesheet" href="mobile.css">
   
   <script src="./jquery.min.js"></script>
<script src="./ux.js"></script>
<script src="./makedrag.js"></script>
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
$_SESSION['curdir']=$db.'/';
		}
		else{
			$directory=$db1.'/';
			$_SESSION['dir']=$directory;
			$_SESSION['curdir']=$db.'/'.$db1.'/';
	}}
	
			$db1=urldecode($_REQUEST["o"]);
			$tokens = explode('/', $db1);      // split string on :
		array_pop($tokens);                   // get rid of last element
$ns = implode('/', $tokens);
$ccnx=$ns;
if($db1==""){
 $bck="";
		}else{
  $bck= "<a href='./?o=".$ns."'><button id='bxc' ><img src='data:image/png;base64,".$back."' hright='32' width='32'></button></a><br>"; 
  $bckx='<a href="./?o='.$ns.'"><li class="menu-option">Back</li></a>';
		}
		
	
?>
<form action='post'>	
</form>	



<table class="tab">
  <tr >
    <th>Icons</th>
    <th>Folder/File Name
	        <button onclick="onup()" id='upbx'><img src='data:image/png;base64,<?php echo $cloud;?>' height='32' width='32'></button>
			<button onclick="onf()" id='addfol'><img src='data:image/png;base64,<?php echo $nFol;?>' height='32' width='32'></button>
			<button onclick="onx()" id='addf'><img src='data:image/png;base64,<?php echo $nfil;?>' height='32' width='32'></button> 
			<?php echo  $bck;?></th>
	<th>Type</th>
	<th>Actions</th>
	<th>Size</th>
	<th>Date modified</th>
  </tr>


	  

	<?php
	chdir($db);
$files = glob($directory."*");
 foreach($files as $file)
{
 if(is_dir($file))
 {   
          $time=filemtime($file);
	$modtime= date("d/M/Y",$time);
	$siet=prettyfoldersize($file);
	date_default_timezone_set('Asia/Kolkata'); 
   $folnam=array_pop(explode('/', $file));
      $key=md5(date("h:i"));
	  echo "<tr class='ctn'>
		    <td><center><a href='./?o=$file'><img src='data:image/png;base64,$flder' hright='32' width='32'></a></center></td>
			<td >$folnam</td>
			<td></a>File Folder</td>
			<td><a href='./?o=$file'><button><img src='data:image/png;base64,".$open."' height='32' width='32'></button></a>
            <a href='./?del=$file' onclick='delc();'><button><img src='data:image/png;base64,".$del."' height='32' width='32'></button></a>
			<a href='./?key=$key&cdl=$file'><button ><img src='data:image/png;base64,".$compx."' height='32' width='32' title='Compress this Folder'></button></a>
			</td>
			<td>$siet</td>
			<td>$modtime</td>
			</tr> ";/**/
			
 }
 else{
	 $ftyp= end(explode(".", $file));
	 $a = getimagesize($file);

	 include("f2i.h");
		
		$time=filemtime($file);
	$modtime= date("d/M/Y",$time);
	date_default_timezone_set('Asia/Kolkata'); 
    $filenam=array_pop(explode('/', $file));
      $key=md5(date("h:i"));
		$siz=pfs(filesize($file));
     $cms="return confirm('Are you sure you want to Delete the File,which cannot be recovered?');";
	 echo "<tr class='status' ><p style='display:none' id='avx'>$file</p>
		    <td><center>$fig</center></td>
			<td >$filenam</td>
			<td>$ftyp File</td>
			<td>
			$cfx
            <a href='./?del=$file' onclick='delc();'><button><img src='data:image/png;base64,".$del."' height='32' width='32'></button></a>
			<a href='./?key=$key&dl=$file'><button ><img src='data:image/png;base64,".$down."' height='32' width='32' title='Dowload File'></button> 
			</td>
			<td>$siz</div>
			<td>$modtime</td>
			</tr> ";
 }
}

	?>

</table><br />
	<center>
	<h4>If No files or folder theres nothing added<br>&copy;<a href="https://github.com/sounakkar">Sounak Kar;</a></h4></center>


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
	

  
<div id="editA" class="box">
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
	<div class="boxh"><span id="editAh" class="boxht">File Editor:-&nbsp;&nbsp;<?php echo $db5;?> <button class="svb" type="submit" form="editf" name="sp" value="SAVE">SAVE</button></span>
  <a href="./?o=<?php echo $nx;?>"><button class="closemw" onclick="clse()">X</button></div></a>
 <div class="boxht">

<form action="" method="post" name="editf" id="editf" >

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

<!--<input type="submit" name="sp"   value="SAVE" />-->
</form>

</div>

</div>
<div id="vi" class="box"><div class="boxh">
<script>
function vf(p1){
		document.getElementById("editA").style="display:none;";
		document.getElementById("vi").style="display:inline-block;";
		
		function toDataURL(url, callback) {
  var xhr = new XMLHttpRequest();
  xhr.onload = function() {
    var reader = new FileReader();
    reader.onloadend = function() {
      callback(reader.result);
    }
    reader.readAsDataURL(xhr.response);
  };
  xhr.open('GET', url);
  xhr.responseType = 'blob';
  xhr.send();
}

toDataURL('./storage/'+p1, function(dataUrl) {
	document.getElementById("vib").innerHTML="<img src='"+dataUrl+"' style='max-width:800px;width:auto;max-height:558px;height:auto;' />";
})
}
</script>
 <?php /* FOR FUTURE USE IF JS not SUPPORTED
if(isset($_REQUEST["v"])){
	chdir($db);
		$db7=urldecode($_REQUEST["v"]);
		
		if(!$db7==""){	
		
	$cgy='<script>document.getElementById("vi").style="display:inline-block;"; 
	
	</script>';
	$imgdx = $db.'/'.$db7;
  
// Encode the image string data into base64
$oui= "<img src='$imgdx' style='max-width:800px;width:auto;max-height:558px;height:auto;' />";
  
	}
		
	$tokenx1 = explode('/', $db7);      // split string on :
		array_pop($tokenx1);                   // get rid of last element
$nx1 = implode('/', $tokenx1);


}*/
	?>	
<span id="vih" class="boxht">Image Viewer&nbsp;&nbsp;<?php echo $db7;?> </span>
 <button class="closemw" onclick="clse()">X</button></div> <a href="./?o=<?php echo $nx1;?>"></a>	
  <div class="boxht" id="vib" style="text-align:center; vertical-align:middle;">

</div>
</div>
<div id="uplod" class="box"><div class="boxh">
<span id="uplodh" class="boxht">Image Viewer&nbsp;&nbsp;<?php echo $db7;?> </span>
 <button class="closemw" onclick="clse()">X</button></div> <a href="./?o=<?php echo $nx1;?>"></a>	
  <div class="boxht" id="vib" style="text-align:center; vertical-align:middle;">
<div id="mulitplefileuploader">Upload</div>
 
<div id="status"></div>
<script>
 
$(document).ready(function()
{
 
var settings = {
    url: "./upload.php",
    method: "POST",
    fileName: "upl",
    multiple: true,
    onSuccess:function(files,data,xhr)
    {
        $("#status").html("<font color='green'>Upload is successful</font>");
        location.reload();
    },
    onError: function(files,status,errMsg)
    {       
        $("#status").html("<font color='red'>Upload is Failed</font>");
		location.reload();
    }
}
$("#mulitplefileuploader").uploadFile(settings);
 
});
</script>

</div>
</div>
<?php 

echo $cgx;
echo $cgy;
?>
<div id="menu">
<ul class="menu-options">
    <li class="menu-option" onclick="onf()">New Folder</li>
    <li class="menu-option" onclick="onx()">New File</li>
    <li class="menu-option"><?php echo $bckx;?></li>
    <li class="menu-option" onclick="ofx()">Exit</li>
  </ul>
</div>
	
	<script>
	makeDragable('#editAh','#editA');
	makeDragable('#vih','#vi');
	makeDragable('#uplodh','#uplod');
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
	function onup(){
		document.getElementById("uplod").style.display="inline-block";
	}
	function ofx(){
		document.getElementById("cf").style="display:none;";
		document.getElementById("nf").style="display:none;";
		document.getElementById("menu").style="display:none;";
	}
	
			function ef(){
		document.getElementById("editA").style="display:inline-block;";
		document.getElementById("ImgA").style="display:none;";
					}
					
	function delc(){
		/*return confirm('Are you sure you want to delete this item?');*/
		if (confirm('Are you sure you want to delete this item , Which cannot be recovered?')){return true;}else{event.stopPropagation(); event.preventDefault();};
	}
	</script>
<!--<script src="jquery.min.js"></script>-->
	<script>
	
  $(".status").bind('contextmenu', $.proxy(function(event,ttx) {
	  var status = $(event.target).text();
	  
	 function getval(a){
	 };
	  	  event.preventDefault();
	var num = Math.floor((Math.random()*10)+1);
	 var validExtensions = ['jpg','gif','png','bmp','ico','tiff','svg','webp','heif','xcf']; //array of valid extensions
        var fileName = status;
		var cms ="return confirm('Are you sure you want to delete this item , Which cannot be recovered?');";
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
        if ($.inArray(fileNameExt, validExtensions) == -1){
          var foi="<a '+tgx+' href='./?e="+status+"'><li class='menu-option'>Edit</li></a>";                  
            var fix="Edit";  
              var tgx="";			
		}
		else {var foi="storage/"+status; var fix="View"; var tgx='target="_blank";'}
    var img = $('<div><ul class="menu-options">    <li class="menu-option" onclick="onf()">New Folder</li>    <li class="menu-option" onclick="onx()">New File</li> <?php echo $bckx;?>   <li class="menu-option" onclick="ofx()">Exit</li>  </ul></div>');
    $("#menu").html(img).offset({ top: event.pageY, left: event.pageX});
    $("#menu").css('display', 'inline-block');
	
  }, this));
  $(".status").bind('click', $.proxy(function(event) {
	  
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
<?php } 
else {
	echo "LOGIN REQUIRED";
	header("Location: ../");
}



?>
