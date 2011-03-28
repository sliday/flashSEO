<?xml version="1.0" encoding="UTF-8" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
		<h1>About</h1>
		<xsl:apply-templates select="data"/>
	</xsl:template>
	<xsl:template match="data">
		<xsl:apply-templates select="section"/>
	</xsl:template>
	<xsl:template match="section">
		<p>
			<h2>
				<xsl:value-of select="name"/>
			</h2>
			<xsl:value-of select="body"/>
		</p>
	</xsl:template>	
</xsl:stylesheet>