<!-- Author:    Quah Khai Gene -->

<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
    <html>
        <head>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
        </head>
        <body>
            <h1 class="text-center m-5">Artistique: Artists</h1>
            <div class="m-5 row row-cols-4">
                <xsl:for-each select="artistique/artists/artist">
                    <div class="card col ms-5 p-0 mt-4" style="width: 21% !important;">
                        <img class="card-img-top" style="height: 250px;">
                            <xsl:attribute name="src">
                                <xsl:value-of select="image_url" />
                            </xsl:attribute>
                        </img>
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title"><xsl:value-of select="full_name" /></h5>
                                <p class="card-text text-muted"><xsl:value-of select="bio" /></p>
                            </div>
                            <div class="mt-5 d-flex justify-content-between">
                                <p class="fw-bold"><xsl:value-of select="email" /></p>
                            </div>
                        </div>
                    </div>
                </xsl:for-each>
            </div>
        </body>
    </html>
</xsl:template>

</xsl:stylesheet>