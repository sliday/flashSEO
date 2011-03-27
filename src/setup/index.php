<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
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
			//font-family:Georgia, "Times New Roman", Times, serif;
			font-weight:normal;
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
			.settings {
				width:400px;
			}
			.links {
				
				margin-top:30px;
				font-size:12px;
			}
			.links div {
				margin-left:-4px;
			}
			.meta_title{
				padding-top:4px;
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
		<table>
			<tr><td style="vertical-align:top;">
					<div class="left_panel">
						<a href="index.php" ><img src="flashSEO_logo.png" width="200px" height="51px" ></a>
						<div style="text-align:right;margin-right:10px;margin-top:-10px;margin-bottom:-29px"><i>by Sliday</i></div>
						<br><br>
						<a href="index.php?basic" >Basic settings</a><br><br>
						<a href="index.php?patterns" >Patterns</a>
					</div>
			</td>
			
			<td style="display: block;margin-top:-2px;padding-left:15px;padding-top:2px;border-left:1px solid #cccccc">
			<div >
					<h1>Basic settings</h1>
					
					<div style="padding-left:20px;">
					<table>
						<tr>
							<td width="50%" style="text-align:center">
								<h2>Meta-information</h2>
							</td>
							<td width="400px" style="text-align:center">
								<h2>XML-files</h2>
							</td>
						</tr>
						<tr><td>
							<?php
							$titles=array("Title","Copyright","Language","Description","Keywords","Author");
							$descriptions=array("The title of your page. Leave it blank if you already defined it on the page.","A copyright statement.","The main language of your site.","A short description of the page.","Words that identify what the page is about","The author's name and possibly email address.");
							for($i=0;$i<count($titles);$i++){
							$r='';
							if($i%2==1){
								$r="style='background-color:#ffcccc;'";
							}else{
								$r="style='background-color:#ccffcc;'";
							}
							$r='';
							echo "<div class='meta_title'>".$titles[$i]."</div><div class='meta_description'>".$descriptions[$i]."</div>";
							echo "<input class='settings' type='text' />";
							}
							?>
							
						</td>
							
							
						</tr>
					</table>
						
						<div class="links">
								<center>
									<table><tr><td >
									<a href="http://sliday.com/flashseo-download">flashSEO home page</a>&nbsp;|&nbsp;<a href="https://github.com/sliday/flashSEO">flashSEO on github.com</a>&nbsp;|&nbsp;</td><td><div><a href="http://sliday.com/flashseo-download"><img style="border:0;align:bottom;" src="sliday_logo.png" height="16px"></img ></div></a>
									</td></tr></table>
								</center>
							</div>
						
					</div>
					
				
			
			
			</div>
			</td>
			</tr>		
		</table>
	</body>
</html>


<?php




?>