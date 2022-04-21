<!-- Author:    Chiam Yee Hang -->

<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
    <html>
        <head>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
        </head>
        <body>
            <h1 class="text-center m-5">Artistique: Customers</h1>
            <div class="m-5 row row-cols-8">
                <xsl:for-each select="artistique/customers/customer">
                    <div class="card col ms-5 p-0 mt-4">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title"><xsl:value-of select="full_name" /></h5>
                                <p class="card-text text-muted"><xsl:value-of select="email" /></p>
                            </div>
                        </div>
                    </div>
                </xsl:for-each>
            </div>
        </body>
    </html>
</xsl:template>

</xsl:stylesheet>