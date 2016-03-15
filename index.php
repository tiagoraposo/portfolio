<?php
include('functions.php');

$leftsocialnetwork = 415;
$estudos_top = 1500;




$css = "<style type='text/css'>

body{ 
	background:url('img/back.jpg') ;
	height:". (retorna_campo("select max(top) from seccoes") + 1000) . "px;
}

#logo{
	width:900px;
	height:400px;
	float:center;
	opacity:1;
	background:url('img/logo.png') no-repeat center;
}	


.facebook{
	position:absolute;
	left:1%;
	top: 36%;
	width:72px;
	height:72px;
	background:url('img/fb.png') no-repeat ;
	opacity: 0.6;
}

.facebook:hover{
	opacity:1;
}

.vimeo{
	position:absolute;
	left:1%;
	top: 48%;
	width:72px;
	height:72px;
	background:url('img/vimeo.png') no-repeat ;
	opacity: 0.6;
}

.vimeo:hover{
	opacity:1;
}

.youtube{
	position:absolute;
	left:1%;
	top: 60%;
	width:72px;
	height:72px;
	background:url('img/youtube.png') no-repeat ;
	opacity: 0.6;
}
	
	
.youtube:hover{
	opacity:1;
}	

.twitter{
	position:absolute;
	left:1%;
	top: 72%;
	width:72px;
	height:72px;
	background:url('img/twitter.png') no-repeat ;
	opacity: 0.6;
}

.twitter:hover{
	opacity:1;
}	


.wordpress{
	position:absolute;
	left:1%;
	top: 84%;
	width:72px;
	height:72px;
	background:url('img/word.png') no-repeat ;
	opacity: 0.6;
}
	
.wordpress:hover{
	opacity:1;
}	

.footer{
	position:fixed;
	top:97%;
	left:35%;
	
}



.graduation{
	position:fixed;
	top:52%;
	left:93%;
	width:72px;
	height:72px;
	opacity:0.6;
	background:url('img/grad.png') no-repeat;
}

.graduation:hover{
	opacity:1;
}

.images{
	position:fixed;
	top:64%;
	left:93%;
	width:72px;
	height:72px;
	opacity:0.6;
	background:url('img/images.png') no-repeat;
}

.images:hover{
	opacity:1;
}

.design{
	position:fixed;
	top:76%;
	left:93%;
	width:72px;
	height:72px;
	opacity:0.6;
	background:url('img/design.png') no-repeat;
}

.design:hover{
	opacity:1;
}

.video{
	position:fixed;
	top:88%;
	left:93%;
	width:72px;
	height:72px;
	opacity:0.6;
	background:url('img/video.png') no-repeat;
}

    
.video:hover{
	opacity:1;
}
	
</style>"; 

$head = "<!DOCTYPE html>

<html>
	<head>
			
		<title> Tiago Raposo Design </title>
		<script type='text/javascript' src='js/jquery2.js'></script>";
	$head .= $css . "</head>";

	
	
$body = "

<body>
	

	<center> <div id='logo'></div></center>
	<a href='https://www.facebook.com/Tiago1Raposo'TARGET='parent'><div class='facebook'></div></a>
	<a href='https://vimeo.com/tiagoraposo'TARGET='parent'><div class='vimeo'></div></a>
	<a href='http://www.youtube.com/user/paintazores'TARGET='parent'><div class='youtube'></div></a>
	<a href='https://twitter.com/Tiago_Raposo'TARGET='parent'><div class='twitter'></div></a>
	<a href='http://portfoliotiagoraposo.wordpress.com/'TARGET='parent'><div class='wordpress'></div></a>
	<div class='footer'>".utf8_decode("Copyright © Tiago Raposo - All rights reserved 2016") ."</div>
	<div id='home' title='DblClique para efetuar Login/Logout' style='position:fixed;top:1%;left:93%;width:72px;height:72px;opacity:0.6;background:url(img/Home.png) no-repeat;z-index:2;'></div>
	<div id='home_titulo' style='position:fixed;top:1%;left:80%;border-radius:10px;width:144px; display:none; color:gray; background-color:transparent;height:72px;z-index:1; vertical-align:middle; opacity:0.8;'>";
	if(isset($_POST['login_submit']))
	{
		@$_SESSION['login_mail'] = $_POST['login_user'];
		@$_SESSION['login_pass'] = $_POST['login_pass'];
	}
	
	if(retorna_campo("select count(*) from users where email= '".@$_SESSION['login_mail']."' and pass='".@$_SESSION['login_pass']."'") > 0)
	{
		$body .= "</br><center><a href='logout.php'><input style='opacity:0.6;width:100%;' type='button' value='Logout'></a></center>";
	}
	else
	{
		$body .= "<form name='login_form' id='login_form' method='post' action='#'> <center>
			<input style='opacity:0.6;' type='text' placeholder='Username:' name='login_user' >
			<input style='opacity:0.6;' type='password' placeholder='Password:' name='login_pass' >
			<input style='opacity:0.6;' type='submit' value='Login' name='login_submit' >
			</center></form>";
	}
	$body .= "</div>";
	if(retorna_campo("select count(*) from users where email= '".@$_SESSION['login_mail']."' and pass='".@$_SESSION['login_pass']."'") > 0)
	{
		$body .= "<div id='new_section' style='position:fixed;top:13%;left:93%;width:72px;height:72px;opacity:0.3;background:url(img/add.png) no-repeat;z-index:2;'></div>
			<div id='new_section_titulo' title='Set link icon' style='position:fixed;top:60%;left:35%;border-radius:10px;width:30%; display:none; color:gray; background-color:transparent;height:72px;z-index:1; vertical-align:middle; opacity:0.8;'>
			<form name='new_section_form' id='new_section_form' method='post' action='submit_values.php'> <center>
			<input style='opacity:0.6;width:65%;' type='text' placeholder='New section:' name='new_section_name' >
			<input style='opacity:0.6;width:30%;' type='submit' value='Add' name='new_section_form_submit' >
			<input style='opacity:0.6;width:97%;' type='file' placeholder='Ficheiro...' name='new_section_file' >
			</center></form></div>
		";
	}
	
	
	$footer = "<script type='text/javascript'>
			$( '#home' ).dblclick(function() {
				$( '#home').fadeTo('slow',1);
				if($( '#home_titulo' ).is(':visible')) 
				{
					$( '#home_titulo' ).hide('drop');		
				}
				else
				{
					$( '#home_titulo' ).show('drop');
				}
			});
			
			$( '#home' ).mouseout(function(){
				$( '#home').fadeTo('slow',0.6);
			});
			
			$( '#home' ).mouseenter(function() {
				$( '#home').fadeTo('slow',1);
			});
		
			$( '#new_section' ).click(function() {
				$( '#new_section').fadeTo('slow',1);
				if($( '#new_section_titulo' ).is(':visible')) 
				{
					$( '#new_section_titulo' ).hide('drop');		
				}
				else
				{
					$( '#new_section_titulo' ).show('drop');
				}
			});
		
			$( '#new_section' ).mouseenter(function() {
				$( '#new_section').fadeTo('slow',0.8);
			});
			
			$( '#new_section' ).mouseout(function() {
				$( '#new_section').fadeTo('slow',0.3);
			});
	";
	
	$q = "select id, nome, top, button_top, button_img_src, info3 from seccoes";
	$result = mysql_query($q) or die($errormessage . mysql_error());
	#$top = 30;
	while($row = mysql_fetch_array($result))
	{
		if(retorna_campo("select count(*) from users where email= '".@$_SESSION['login_mail']."' and pass='".@$_SESSION['login_pass']."'") > 0)
		{
			$body .= "<a title='Remove section' href='submit_values.php?remove_section=1&id_section=".$row[0]."'>
			<div id='delete_section_".$row[0]."' style='position:fixed;top:".($row[3]-1)."%;left:97%;width:30px;height:30px;opacity:0.8;z-index:2; background:url(img/del.png) no-repeat;'></div>
			</a>";
		}
		
		$body .= "
		<div id='".$row[1]."' style='position:fixed;top:".$row[3]."%;left:93%;width:72px;height:72px;opacity:0.6;background:url(".$row[4].") no-repeat;'></div>
		<div id='".$row[1]."_titulo' style='position:fixed;top:".$row[3]."%;left:83%;border-radius:10px;width:144px; display:none; color:gray; background-color:#f0f0f0;height:72px;z-index:-1; vertical-align:middle; opacity:0.8;'><br>&nbsp <b><i>".$row[1]."</i></b></div>
		<div style='position:absolute;left:13%;width: 980px;height: auto;font-size:17px;top:".$row[2]."px;'>";
		if($row[5] != "") {$body .= "<center>" . slideshow($row[1] . "_ss",$row[5],2000,400,500) . "</center>";}
		$q_conteudos = "select id, type, value, info1, info2, info3 from conteudos where seccoes_id=" . $row[0];
		$result_conteudos = mysql_query($q_conteudos) or die($errormessage . mysql_error());
		#$top = 30;
		while($row_conteudos = mysql_fetch_array($result_conteudos))
		{
			if($row_conteudos[1]=="texto")
			{
				$body .= "<br><br> " . " " . $row_conteudos[2];
			}
			elseif($row_conteudos[1]=="imagem")
			{
				$body .= "<br><br><br><br> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
				<img height='800px' width='700px' src='" . $row_conteudos[2] . "'>";
			}
			elseif($row_conteudos[1]=="design")
			{
				$body .= "<br><br><br><br> " . $row_conteudos[2];
			}
			elseif($row_conteudos[1]=="video")
			{
				$body .= "<br><br> " . $row_conteudos[2];
			}
		}
		$body .= "</div>";
		
		$footer .= "
			$( '#".$row[1]."' ).click(function() {
				var dtop= $(document).scrollTop();
					dtop = parseFloat(dtop);
					
				if (dtop!=".$row[2].")
				{
					$('html, body').animate({scrollTop:'".($row[2]-66) ."'},2000);
				}
				else
				{
					top_zero(800);
				}
			});
			
			$( '#".$row[1]."' ).mouseenter(function() {
				$( '#".$row[1]."').fadeTo('slow',1);
				$( '#".$row[1]."_titulo' ).show('drop');
				
			});
			
			$( '#".$row[1]."' ).mouseout(function(){
				$( '#".$row[1]."').fadeTo('slow',0.6);
				$( '#".$row[1]."_titulo' ).hide();
				
			});
		";
	}

$body .= "</body>";
	
			
$footer .= "
			$( '#home' ).click(function() {
				 top_zero(2000);
			}); 
			
			
			function top_zero(vel) {
				$('html, body').animate({scrollTop:'0'},vel);
			}
</script>
		
</html>" ;

echo $head . $body . $footer;
?>