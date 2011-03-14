<?php 
/*-----------------------------
SEO for flash - © Sliday 2011
Read README file for help

Author - Filimonov Dmitry
version 1.1    13.03.2011
-----------------------------*/


$bot=false;
$test_mode=false;

//Bot checking
$bot_aliases=array('googlebot','YandexBot','MSNBot','Mail.Ru');
if(isset($_SERVER['HTTP_USER_AGENT'])){
	for($i=0;$i<count($bot_aliases);$i++)
	$bot = $bot||(false!==strripos ($_SERVER['HTTP_USER_AGENT'],$bot_aliases[$i])); 
}

if(isset($_GET['getmeta'])||isset($_GET['getcontent'])||isset($_GET['testseo']))$test_mode=true;

$copyright='';
$language='';
$description='';
$keywords='';
$author='';
$title='';
$text_files='';
$img_files='';
$img_prefix='';

//Config loading
if (!@include_once('config.php')){ 
	exit('Can\'t find file "config.php" <br>Be sure, that you placed it in the same folder with "flashSEO.php"<br>For further information please read "README" ');
}

//Generating meta-tags
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
function addMeta($key,$value){
	if($value!='')$GLOBALS["meta_str"].="\n<meta name=\"$key\" content=\"$value\" />";
}
addMeta('copyright',$copyright);
addMeta('language',$language);
addMeta('description',$description);
addMeta('keywords',$keywords);
addMeta('author',$author);
if($title!='')$meta_str.="\n<title>$title</title>";

$content_str='';

if(!($bot||$test_mode)){
	$content_str="\n\n\n<!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!\nATTENTION\nTEXT AND IMAGES WILL ONLY BE SHOWN FOR SEARCH BOTS\nIF YOU WANT TO SEE IT LIKE A SEARCH BOT, ADD ?testseo TO YOUR URL\nLIKE THIS: http://www.example.com/index.php?testseo\n!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->\n\n\n";
}

//main parsing function
function parseXML($files_str,$img_flag=0){
	if($files_str!=''){
		$text_files_arr=explode(',',$files_str);
		for($i=0;$i<count($text_files_arr);$i++){
			$doubledot_pos=strrpos($text_files_arr[$i],":");
			$file_name='';
			$xsl_name='';
			if($doubledot_pos===false){
				$file_name=trim($text_files_arr[$i]);
			}else{
				$filenames_arr=explode(':',$text_files_arr[$i]);
				$file_name=trim($filenames_arr[0]);
				$xsl_name=trim($filenames_arr[1]);
			}
			if($file_name!=''){
			
				$xml = new DOMDocument;
				if(!file_exists($file_name))
				exit('Can\'t find file "'.$file_name.'" <br>Be sure, that it exists and that you edited your config.php right <br>For further information please read "README" ');
				$xml->load($file_name);
				$xsl = new DOMDocument;
				if($xsl_name!=''){
					if(!file_exists($xsl_name))
					exit('Can\'t find file "'.$xsl_name.'" <br>Be sure, that it exists and that you edited your config.php right <br>For further information please read "README" ');
					$xsl->load($xsl_name);
					$proc = new XSLTProcessor;
					$proc->importStyleSheet($xsl); 
					$GLOBALS["content_str"].=str_replace("&gt;",">",str_replace("&lt;","<",$proc->transformToXML($xml)));
				}else{
					$xsl->loadXML($img_flag==1?$GLOBALS['default_img_xls']:$GLOBALS['default_text_xls']);                                        
					$proc = new XSLTProcessor;
					$proc->importStyleSheet($xsl); 
					$GLOBALS["content_str"].=str_replace("&gt;",">",str_replace("&lt;","<",$proc->transformToXML($xml)));
				}
			}
		}
	}	
}

if(isset($_GET['getmeta'])){
	exit($meta_str);
}
if(isset($_GET['getcontent'])){
	parseXML($text_files);
	parseXML($img_files,1);
	exit($content_str);
}

function getMeta(){
	echo $GLOBALS["meta_str"];	
}
function getContent(){
	echo $GLOBALS["content_str"];	
}

?>