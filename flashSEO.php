<?php 
/*-----------------------------
SEO for flash - © Sliday 2011
Read README.txt file for help
version 1.00	24.02.2011
-----------------------------*/

//Проверка на бота
$bot=false;
$test_mode=false;
$bot_aliases=array('googlebot','YandexBot','MSNBot','Mail.Ru');
if(isset($_SERVER['HTTP_USER_AGENT'])){
	for($i=0;$i<count($bot_aliases);$i++)
	$bot = $bot||(false!==strripos ($_SERVER['HTTP_USER_AGENT'],$bot_aliases[$i]));	
}

//Проверка на тестовый режим
if(isset($_GET['getmeta'])||isset($_GET['getcontent'])||isset($_GET['testseo']))$test_mode=true;

//Объявление переменных
$copyright='';
$language='';
$description='';
$keywords='';
$author='';
$title='';
$text_files='';
$img_files='';
$img_prefix='';

//Проверка наличия кофигурационного файла, его загрузка
if (!@include_once('config.php')){ 
	exit('Can\'t find file "config.php" <br>Be sure, that you placed it in the same folder with "flashSEO.php"<br>For further information please read "README.txt" ');
}

//генерирование мета тэгов
$meta_str=
'<meta name="robots" content="ALL" /> 
<meta name="revisit-after" content="10 days" /> 
<meta name="document-class" content="Living Document" /> 
<meta name="document-rights" content="Copyrighted Work" /> 
<meta name="document-type" content="Public" /> 
<meta name="document-rating" content="General" /> 
<meta name="document-distribution" content="Global" /> 
<meta name="document-state" content="Static" />
';
addMeta('copyright',$copyright);
addMeta('language',$language);
addMeta('description',$description);
addMeta('keywords',$keywords);
addMeta('author',$author);
if($title!='')$meta_str.="\n<title>$title</title>";

//генерирование основного текста
$content_str='';
if($title!='')$content_str.="<h1>$title</h1>\n";

if($bot||$test_mode){
	if($text_files!=''){
		$text_files_arr=explode(',',$text_files);
		for($i=0;$i<count($text_files_arr);$i++){
			$file_name=trim($text_files_arr[$i]);
			if($file_name!=''){
			if(!file_exists($file_name))
				exit('Can\'t find file "'.$file_name.'" <br>Be sure, that it exists and that you edited your config.php right <br>For further information please read "README.txt" ');
			if(!$xml = simplexml_load_file($file_name,NULL,LIBXML_NOCDATA|LIBXML_NOBLANKS))
				exit("simplexml error\nBe sure, that your xml files are written in UTF-8");
			$str='';
			parseTillText($xml,$str);
			$GLOBALS["content_str"].=$str;
			}
		}
	}
	if($img_files!=''){
		$img_files_arr=explode(',',$img_files);
		for($i=0;$i<count($img_files_arr);$i++){
			$file_name=trim($img_files_arr[$i]);
			if($file_name!=''){
			if(!file_exists($file_name))
				exit('Can\'t find file "'.$file_name.'" <br>Be sure, that it exists and that you edited your config.php right <br>For further information please read "README.txt" ');
			if(!$xml = simplexml_load_file($file_name,NULL,LIBXML_NOCDATA|LIBXML_NOBLANKS))
				exit("simplexml error\nBe sure, that your xml files are written in UTF-8");
			$str='';
			parseImg($xml,$str);
			$GLOBALS["content_str"].=$str;
			}
		}
	}
}else{
	$GLOBALS["content_str"]="\n\n\n<!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!\nATTENTION\nTEXT AND IMAGES WILL ONLY BE SHOWN FOR SEARCH BOTS\nIF YOU WANT TO SEE IT LIKE A SEARCH BOT, ADD ?testseo TO YOUR URL\nLIKE THIS: http://www.example.com/index.php?testseo\n!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->\n\n\n";
}


//функция прохождения по дереву
function parseTillText($xml,&$str){
	$tmp;
	foreach($xml->children() as $tmp){
		if($tmp!=''){
		$str.= "<h2>".$tmp->getName()."</h2>\n";
		$str.= ("<p>".$tmp."</p>\n\n");
		}
		parseTillText($tmp,$str);
	}
}

//функция парсинга файлов с картинками
function parseImg($xml,&$str){
	$tmp;
	foreach($xml->children() as $tmp){
		$arr=$tmp->attributes();
		if(isset($arr['alb_title'])&&isset($arr['alb_description'])){
			$str.= "<h2>".$arr['alb_title']."</h2>\n";
			$str.= ("<p>".$arr['alb_description']."</p>\n\n");
		}
		foreach($tmp->children() as $tmp2){
			$arr2=$tmp2->attributes();
			if(isset($arr2['img_title'])&&isset($arr2['img_description'])&&isset($arr2['img_src'])){
				$str.= "<p><img src='".$GLOBALS['img_prefix'].$arr2['img_src']."' alt='".$arr2['img_title']."'>\n";
				$str.= ("".$arr2['img_description']."</p>\n\n");
				
			}
		}
	}
}

$html_head="<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\" lang=\"en\">\n<head>\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n</head>";

if(isset($_GET['getmeta']))
	exit( $GLOBALS["html_head"].str_replace(">","&gt;<br>",str_replace("<","&lt;",$GLOBALS["meta_str"]))."</html>");
if(isset($_GET['getcontent']))
	exit( $GLOBALS["html_head"].$GLOBALS["content_str"]."</html>");

//вспомогательные функции
function addMeta($key,$value){
	if($value!='')$GLOBALS["meta_str"].="\n<meta name=\"$key\" content=\"$value\" />";
}
function getMeta(){
	echo $GLOBALS["meta_str"];
	
}
function getContent(){
	echo $GLOBALS["content_str"];
	
}


?>