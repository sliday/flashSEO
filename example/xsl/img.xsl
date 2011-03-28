<?xml version="1.0" encoding="UTF-8" ?> 
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
</xsl:stylesheet>