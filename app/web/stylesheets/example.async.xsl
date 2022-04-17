<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet
        version="1.0"
        xmlns="http://www.w3.org/1999/xhtml"
        xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
        xmlns:xsd="http://www.w3.org/2001/XMLSchema"
        xmlns:x="urn:ru:ilb:ExampleApp:AppResponse"
        exclude-result-prefixes="x xsl xsd">

    <xsl:output
            media-type="application/xhtml+xml"
            method="xml"
            encoding="UTF-8"
            indent="no"
            omit-xml-declaration="yes"
            doctype-public="-//W3C//DTD XHTML 1.1//EN"
            doctype-system="http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"/>

    <xsl:template match="x:AppResponse">
        <html xml:lang="ru" lang="ru">
            <head>
                <meta charset="UTF-8"/>
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <title>Пример асинхронного запроса</title>
                <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
                <link href="styles/app.css" rel="stylesheet" />
            </head>
            <body>
                <div class="container mx-auto py-5">
                    <h1 class="text-3xl mb-5">Пример асинхронного запроса</h1>

                    <xsl:choose>
                        <xsl:when test="x:waitText">
                            <xsl:value-of select="x:waitText"/>
                        </xsl:when>
                        <xsl:when test="x:result">
                            <xsl:text>Подождали и получили ответ: </xsl:text>
                            <xsl:value-of select="x:result"/>

                            <p class="mt-5">
                                <a href="example.async.php" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">вернуться</a>
                            </p>
                        </xsl:when>
                        <xsl:otherwise>
                            <form method="POST">
                                <button type="submit" name="execute-0" value="send" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Отправить запрос</button>
                            </form>
                        </xsl:otherwise>
                    </xsl:choose>


                </div>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
