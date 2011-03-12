<?php
//Meta tags
$copyright='2011 Sliday';
$language='English';
$description='flash SEO Test page';
$keywords='flash, SEO, Sliday';
$author='Dmitry Filimonov';

//Page title. Leave it blank if you define it on the page
//Заголовок страницы - если вы указываете его непосредственно на странице сайта, оставьте поле пустым
$title='';

//Paths to the text data files. Use comma as a delimeter
//Пути к xml-файлам с текстовым содержимым. Для разделения используйте запятую
$text_files='data.xml';

//Paths to the image data files. Use comma as a delimeter
//Пути к xml-файлам с графическим содержимым. Для разделения используйте запятую

$img_files='';
//$img_files='img.xml';


//
//Префикс используется, если пути к картинкам в xml-файле прописаны не от того места где лежит файл flashSEO.php
$img_prefix='';

$default_xls='<?xml version="1.0" encoding="UTF-8" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="data/*">
		<xsl:choose>
			<xsl:when test="count(node())=1">
				<h2>
					<xsl:value-of select="local-name(.)"/>
				</h2>
				<p>
					<xsl:value-of select="text()" />
				</p>
			</xsl:when>
		</xsl:choose>
	</xsl:template> 
</xsl:stylesheet>';

?>