<?php
include("functions.php");
$refresh = '<meta http-equiv="refresh" content="2; url=index.php"/>';


if(isset($_POST['new_section_form_submit'])) {
	$section_name = $_POST['new_section_name'];
	if($section_name == ""){if(retorna_campo("select count(nome) from seccoes where nome='New'") > 0){die("Already exists, please change name." . $refresh);}else{$section_name = "New";}}
	$dir = "img/";
	if((count($_FILES['new_section_file']['name']) > 0) and (count($_FILES['new_section_file']['name']) != "") and ($_FILES['new_section_file']['name'] != ""))
	{
	
		$_FILES['new_section_file']['name'] = $section_name . "." . pathinfo($_FILES['new_section_file']['name'], PATHINFO_EXTENSION);
		if (file_exists($dir . $_FILES['new_section_file']['name']))			{
			die("<br><center>Mude o nome do ficheiro '".$_FILES['new_section_file']['name']."', porque já existe uma imagem com o mesmo nome, na pasta de destino.<br>".$refresh);
		}
		else
		{
			move_uploaded_file($_FILES['new_section_file']['tmp_name'], $dir . strtolower($_FILES['new_section_file']['name']));
		}
	} 
	else 
	{
		$button_top = (retorna_campo("select min(button_top) from seccoes") - 12);
		$section_top = (retorna_campo("select max(top) from seccoes") + 1333);
		$button_img_src = strtolower($_FILES['new_section_file']['name']);
		if($button_img_src == "") {$button_img_src = $dir . "na.jpg";} else {$button_img_src = $dir . $button_img_src;}
		mysql_query(utf8_decode("insert into seccoes (nome,top,button_top,button_img_src) values ('$section_name','$section_top','$button_top','$button_img_src')")) or die(mysql_error());
		echo "Add Section suceed" . $refresh;	
	}
} 

if(isset($_GET['remove_section'])) {
	if($_GET['remove_section'] == "1" and $_GET['id_section'] != "") {
		mysql_query(utf8_decode("delete from seccoes where id=" . $_GET['id_section'])) or die(mysql_error());
		echo "Remove Section suceed" . $refresh;
	}
}


?>