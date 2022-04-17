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
                <title>PHP+XSLT</title>
                <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
                <link href="styles/app.css" rel="stylesheet" />
            </head>
            <body>
                <div class="container mx-auto py-5">
                    <h1 class="text-3xl mb-5">PHP+XSLT сгенерированная страница</h1>
                    <table class="min-w-full divide-y divide-gray-200">
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="bg-gray-100">
                                <td class="px-6 py-4 whitespace-nowrap w-16">
                                    <xsl:text>Версия PHP</xsl:text>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        <xsl:value-of select="x:phpversion"/>
                                    </div>
                                </td>
                                <td>
                                    <xsl:comment/>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-top px-6 py-4 whitespace-nowrap w-16">
                                    <xsl:text>Подключение к базе mysql</xsl:text>
                                </td>
                                <td class="align-top px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">dbname=openserver</div>
                                    <div class="text-sm text-gray-900">host=db</div>
                                    <div class="text-sm text-gray-900">username=root</div>
                                    <div class="text-sm text-gray-900">password=123456</div>
                                    <div class="text-sm text-gray-900">
                                        <a href="http://localhost:8081" target="_blank" class="text-green-600 underline" title="Администрирование MySql">Перейти в Adminer Editor</a>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <xsl:choose>
                                        <xsl:when test="x:dbconnect">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                <xsl:text>ОК</xsl:text>
                                            </span>
                                        </xsl:when>
                                        <xsl:otherwise>
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                <xsl:text>!</xsl:text>
                                            </span>
                                        </xsl:otherwise>
                                    </xsl:choose>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
