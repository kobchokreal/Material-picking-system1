<?php
include_once("condb.php");

function ViewContent($Node=""){
	if($Node=="") {return "content_das.php";}
	else if($Node=="content") {return "content_das.php";}
	else if($Node=="login") {return "frmlogin.php";}
	else if($Node=="chk"){return "chklogin.php";}
	else if($Node=="lout"){return "logout.php";}

	else if($Node=="showmem"){return "showmember.php";}
	else if($Node=="addmem"){return "addmember.php";}

	else if($Node=="smat"){return "showmat.php";}
	else if($Node=="amat"){return "addmat.php";}
	else if($Node=="emat"){return "editmat.php";}
	else if($Node=="stmat"){return "showtotalmat.php";}


	else if($Node=="sdraw"){return "showdraw.php";}
	else if($Node=="drawmat"){return "draw_mat.php";}
	else if($Node=="dmat_his"){return "drawmat_his.php";}
	else if($Node=="dmat_manage"){return "manage_drawmat.php";}


	else {return "index.php";}
}

function isOnline(){
	if(isset($_SESSION['usr']) && isset($_SESSION['pwd'])){
		return true;
	}else{
		return false;
	}	
}

function isAdmin($usr=0,$pwd=0,$con=0){
	$sql="SELECT * FROM member WHERE mem_user='$usr' AND mem_pass='$pwd' ";
	$res=mysqli_query($con,$sql);
	if(mysqli_num_rows($res) < 1){
		return false;
	}else{
		$info = mysqli_fetch_assoc($res);
		return $info['mem_level'] == 1 ? true : false;

	}
}


function isUser($usr=0,$pwd=0,$con=0){
	$sql="SELECT * FROM member WHERE mem_user='$usr' AND mem_pass='$pwd' ";
	$res=mysqli_query($con,$sql);
	if(mysqli_num_rows($res) < 1){
		return false;
	}else{
		$info = mysqli_fetch_assoc($res);
		return $info['mem_level'] == 2 ? true : false;

	}
}




?>