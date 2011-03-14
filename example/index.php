<?php require_once('config.php'); ?>
<?php require_once('../src/flashSEO.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"> 
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
		<title>flashSEO example page</title> 	 
		<script type="text/javascript" src="js/swfobject.js"></script>
		
		<?php getMeta(); ?>
	</head> 
	<body> 
	<center><table style="height:100%;">
		<tr><td>
			<div id="content"> 
				<?php getContent(); ?>
			</div> 
			<script type="text/javascript"> 
				var swfobject= new SWFObject("example.swf", "swfobj", "400 px", "400 px", "10", "#ffffff");
				swfobject.write("content");
			</script> 
		</td></tr>
	</table></center>
	</body>
</html>