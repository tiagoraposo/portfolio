<?php
@session_start();
$errormessage = "MySql Error: ";
mysql_connect("fdb6.awardspace.net","1658648_teste","algoritmo123") or die($errormessage . mysql_result());
mysql_select_db("1658648_teste") or die($errormessage . mysql_result());

function retorna_campo($q)
{
	$result = mysql_query(utf8_decode($q . " limit 1")) or die($errormessage . mysql_error());
	$array_de_registos = mysql_fetch_row($result);
	return utf8_encode($array_de_registos[0]);
}

function slideshow($id,$ss_folder,$vel,$height,$width)
{
$result = "<a target='_blank' id='".$id."_href' href='#'>
			<img border='0' id='".$id."_src' onmouseout='this.style.opacity=1;this.filters.alpha.opacity=100' onmouseover='this.style.opacity=0.6;this.filters.alpha.opacity=60' style='opacity:1;border-radius:20px;' src='' width='".$width."px' height='".$height."px'>
		</a>
		<script>
			var srcs_".$id." = new Array();";
			$dir = $ss_folder;
			$imgs = scandir($dir,1);
			$i = 0;
			foreach($imgs as $img) 
			{
				if (($img != ".") and ($img != "..") and (substr_count($img, ".") > 0)) 
				{
					++$i;
					$result .= "srcs_".$id."[" . $i . "] = '" . $dir . "/" . utf8_encode($img) . "';";
				}
			}
			
	$result .= "
			var nr_".$id." = 1;
			function change_destaques_".$id."()
			{
				document.getElementById('".$id."_href').href = srcs_".$id."[nr_".$id."];
				document.getElementById('".$id."_src').src = srcs_".$id."[nr_".$id."];
				nr_".$id."++;
				
				if(nr_".$id." >= srcs_".$id.".length) {nr_".$id."=1;}
				var timer_".$id." = setTimeout('change_destaques_".$id."()',".$vel.");
			}
			change_destaques_".$id."();
		</script>";
		return $result;
}
?>