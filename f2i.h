<?php

if($ftyp=='txt'|$ftyp=='text'){
		  $fig="<a href='./?e=".$file."'><img  src='data:image/png;base64,".$txt."' hright='32' width='32'></a>";
		 $cfx=" <a href='./?e=".$file."'><button onclick='ef()'><img src='data:image/png;base64,".$edit."' height='32' width='32'></button></a>";
	 }elseif($ftyp=='php'){
		 $fig="<a href='./?e=".$file."'><img  src='data:image/png;base64,".$php."' hright='32' width='32'></a>";
		 $cfx=" <a href='./?e=".$file."'><button onclick='ef()'><img src='data:image/png;base64,".$edit."' height='32' width='32'></button></a>";
	 }elseif($ftyp=='html'){
		  $fig="<a href='./?e=".$file."'><img  src='data:image/png;base64,".$html."' hright='32' width='32'></a>";
		$cfx=" <a href='./?e=".$file."'><button onclick='ef()'><img src='data:image/png;base64,".$edit."' height='32' width='32'></button></a>";
	 }elseif($ftyp=='css'){
		 $fig="<a href='./?e=".$file."'><img  src='data:image/png;base64,".$css."' hright='32' width='32'></a>";
		$cfx=" <a href='./?e=".$file."'><button onclick='ef()'><img src='data:image/png;base64,".$edit."' height='32' width='32'></button></a>";
	 }elseif($ftyp=='sql'){
		 $fig="<a href='./?e=".$file."'><img  src='data:image/png;base64,".$sql."' hright='32' width='32'></a>";
		$cfx=" <a href='./?e=".$file."'><button onclick='ef()'><img src='data:image/png;base64,".$edit."' height='32' width='32'></button></a>";
	 }elseif($ftyp=='c'|$ftyp=='cpp'){
		 $fig="<a href='./?e=".$file."'><img  src='data:image/png;base64,".$c."' hright='32' width='32'></a>";
		 $cfx=" <a href='./?e=".$file."'><button onclick='ef()'><img src='data:image/png;base64,".$edit."' height='32' width='32'></button></a>";
	 }elseif($ftyp=='h'){
		 $fig="<a href='./?e=".$file."'><img  src='data:image/png;base64,".$h."' hright='32' width='32'></a>";
		$cfx=" <a href='./?e=".$file."'><button onclick='ef()'><img src='data:image/png;base64,".$edit."' height='32' width='32'></button></a>";
	 }elseif($ftyp=='js'){
		  $fig="<a href='./?e=".$file."'><img  src='data:image/png;base64,".$js."' hright='32' width='32'></a>";
		 $cfx=" <a href='./?e=".$file."'><button onclick='ef()'><img src='data:image/png;base64,".$edit."' height='32' width='32'></button></a>";
	 }
	 elseif($ftyp=='pdf'){
		  $fig="<a href='./?e=".$file."'><img  src='data:image/png;base64,".$pdf."' hright='32' width='32'></a>";
		 $cfx=" <a href='./?e=".$file."'><button onclick='ef()'><img src='data:image/png;base64,".$edit."' height='32' width='32'></button></a>";
	 }
	 elseif($ftyp=='pptx'|$ftyp=='doc'|$ftyp=='docx'|$ftyp=='xls'|$ftyp=='xps'|$ftyp=='xlsx'){
		  $fig="<a href='./?e=".$file."'><img  src='data:image/png;base64,".$office."' hright='32' width='32'></a>";
		 $cfx=" <a href='./?e=".$file."'><button onclick='oof()'><img src='data:image/png;base64,".$edit."' height='32' width='32'></button></a>";
	 }elseif($ftyp=='xml'){
		  $fig="<a href='./?e=".$file."'><img  src='data:image/png;base64,".$xml."' hright='32' width='32'></a>";
		 $cfx=" <a href='./?e=".$file."'><button onclick='ef()'><img src='data:image/png;base64,".$edit."' height='32' width='32'></button></a>";
	 }
	 elseif($ftyp=='jpg'|$ftyp=='png'|$ftyp=='bmp'|$ftyp=='jpeg'|$ftyp=='gif'|$ftyp=='ico'){
		 $pmr='vf("'.$file.'")';
		 $fig="<img  src='data:image/png;base64,".$img."' hright='32' width='32' onclick='$pmr'>";
		 $cfx=" <button onclick='$pmr'><img src='data:image/png;base64,".$view."' height='32' width='32'></button>";
	 }
	 elseif($ftyp=='rar'|$ftyp=='zip'|$ftyp=='7z'|$ftyp=='tar'|$ftyp=='gz'|$ftyp=='ico'){
		 $fig="<a href='./?e=".$file."'><img  src='data:image/png;base64,".$archive."' hright='32' width='32'></a>";
		 $cfx="";
	 }
	 else{
		 $fig="<a href='./?e=".$file."'><img  src='data:image/png;base64,".$other."' hright='32' width='32'></a>";
		$cfx="<a href='./?e=".$file."'><button onclick='ef()'><img src='data:image/png;base64,".$edit."' height='32' width='32'></button></a>";
		
	 	}
?>