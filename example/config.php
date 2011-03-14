<?php
if (!defined('CONFIG_LOADED'))
	define("CONFIG_LOADED", "PLEASE, DO NOT REMOVE THIS LINE.");

//Meta tags
$copyright='2011 Sliday';
$language='English';
$description='Example flashSEO Test page';
$keywords='flash, SEO, Sliday, flashSEO';
$author='Dmitry Filimonov';

//Page title. Leave it blank if you define it on the page
$title='';

//Paths to the text data files. Use comma as a delimeter
$text_files='xml/about.xml:xsl/about.xsl';

//Paths to the image data files. Use comma as a delimeter

$img_files='xml/img.xml:xsl/img.xsl';


$img_prefix='';

$default_text_xls='<?xml version="1.0" encoding="UTF-8" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/*">
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
$default_img_xls='<?xml version="1.0" encoding="UTF-8" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:template match="/">
		<h1>Images</h1>
		<xsl:apply-templates select="albums"/>
	</xsl:template>
	<xsl:template match="albums">
		<xsl:apply-templates select="album"/>
	</xsl:template>	
	<xsl:template match="album">
		<p>
			<h2><xsl:value-of select="@alb_title"/></h2>
			<xsl:value-of select="@alb_description"/>
			<xsl:apply-templates select="image"/>
		</p>
	</xsl:template>
	<xsl:template match="image">
		<p>
			<h3><xsl:value-of select="@img_title"/></h3>
			<a href="{@img_src}">
			<img src="{@img_thumbnail}" alt="{@img_title}" title="{@img_description}" />
			<xsl:value-of select="@img_description"/>
			</a>
		</p>
	</xsl:template>
</xsl:stylesheet>';
?>