<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<?php
	if (!@include_once('../config.php')){ 
		exit('Can\'t find file "config.php" <br>Be sure, that you placed it in the same folder with "flashSEO.php"<br>For further information please read "README" ');
	}
?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"> 
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
		<title>flashSEO setup</title> 	 	
		<style>
			body{
				font-family:Arial;
				padding:0;
				margin:0;
			}
			h1,h2{
				font-weight:normal;
			}
			h2{
				margin-top:0px;
				margin-bottom:0px;
			}
			.left_panel a{
				font-size:20px;
			}
			.left_panel{
				display:block;
				margin:10px;	
				text-align:center;
			}
			img {
				border:0;
			}
			
			.meta-table{
				padding:-10px;
				background-color:#f7fbff;
				border:2px solid #c2dcf5;
			}
		
			
			.meta{
				padding:10px;
				//margin-left:8px;
				margin-bottom:8px;
				
				border-top:1px solid #c2dcf5;
			}
			.meta-red{
				padding:10px;
				margin-bottom:8px;
				//background-color:#ffdbdb;
				border-top:1px solid #c2dcf5;
			}
			.meta-borderless{
				padding:10px;
				margin-bottom:8px;			
			}
			
			
			.settings {
			
				width:99%;
				
			}
			.links {
				width:100%;
				//position:absolute;
				//bottom:20px;
				padding-top:20px;
				//border-top:1px solid #cfcfcf;
				
				padding-left:8px;
				//margin-top:30px;
				font-size:12px;
			}
			.links div {
				margin-left:-4px;
			}
			.meta_title{
				//padding-top:4px;
				margin-bottom:-4px;
				
			}
			.meta_description{
				font-size:11px;
				font-style:italic;
				color:#999999;
				width:600px;
				margin-right:-600px;
				padding-top:5px;				
			}
			
		</style>
	</head> 
	<body> 
		<table style="padding-bottom:20px;width:100%;">
			<tr><td style="vertical-align:top;width:200px">
					<div class="left_panel">
						<a href="index.php" ><img src="flashSEO_logo.png" width="200px" height="51px" ></a>
						<div style="text-align:right;margin-right:10px;margin-top:-10px;margin-bottom:-8px"><i>by Sliday</i></div><!--margin-bottom:-29px-->
						<br><br>
						<a href="index.php?basic" >Basic settings</a><br><br>
						<a href="index.php?patterns" >Patterns</a>
					</div>
			</td>
			
			<td style="min-width:400px;width:75%;display: block;margin-top:-2px;margin-bottom:-2px;padding-bottom:30px;padding-left:15px;padding-top:2px;border-left:1px solid #cccccc">
			<div >
					<h1>Meta-information</h1>
					
					<div style="padding-left:20px;">
								<div style="width:100%;text-align:left;padding-bottom:20px;">
								<h2></h2>
								</div>
								<table width="100%" class="meta-table" cellspacing="0">
							<?php
								$titles=array("Title","Copyright","Language","Description","Keywords","Author");
								$descriptions=array("The title of your page. Leave it blank if you already defined it on the page.","A copyright statement.","The main language of your site.","A short description of the page.","Words that identify what the page is about","The author's name and possibly email address.");
								$values=array(&$title,&$copyright,&$language,&$description,&$keywords,&$author);
								for($i=0;$i<count($titles);$i++){
								if($i==0)echo "<tr><td class='meta-borderless'>";
								else echo "<tr><td class='meta'>";
								echo "<div ><div class='meta_title'>".$titles[$i]."</div><div class='meta_description'>".$descriptions[$i]."</div>";
								echo "<input class='settings' type='text' value='".$values[$i]."'/></div>";
								echo "</tr></td>";
								}
								
							?>
							<tr><td class='meta-red'>
							<div class='save_settings'>
								<input value="Download config file" type="submit"  />
								<input value="Save settings" type="submit"  />
							</td></tr>
							</table>
							
							</div>
						
						
						
					</div>		
					
				
					
					
						
			</div>
			</td>
			</tr>		
			<!--
			
			<tr><td colspan="2" style=" ">
			<div class="links">
								<center>
									<table><tr><td >
									<a href="http://sliday.com/flashseo-download">flashSEO home page</a>&nbsp;|&nbsp;<a href="https://github.com/sliday/flashSEO">flashSEO on github.com</a>&nbsp;|&nbsp;</td><td><div><a href="http://sliday.com/flashseo-download"><img style="border:0;align:bottom;" src="sliday_logo.png" width="57px" height="17px"></img ></div></a>
									</td></tr></table>
								</center>
						</div>
			
			</td></tr>
			-->
		</table>
		
		
		
		
	</body>
</html>


<?php




?>