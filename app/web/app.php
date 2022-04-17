<?php
require_once("../conf/config.php");
$hReq = new HTTP_Request2Xml('schemas/ExampleApp/AppRequest.xsd');

$config = Config::getInstance();

try {
    $db = new PDO ("mysql:dbname=openserver;host=db", "root", "123456", [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8",
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_ERRMODE => TRUE
    ]);
} catch (PDOException $e) {
    // что-то сделать
}

$data = [
    'phpversion' => phpversion(),
    'dbconnect' => isset($db)
];

$AppResponse = new ru\ilb\ExampleApp\AppResponse();

$AppResponse->fromArray($data);

$xw = new XMLWriter();
$xw->openMemory();
$xw->startDocument("1.0", "UTF-8");

//для красоты онли
$xw->setIndent(TRUE);
$xw->setIndentString(" ");

//прицепляем стилшит
$xw->writePi("xml-stylesheet", 'type="text/xsl" href="stylesheets/app.xsl"');

//$xw->startElementNs(NULL, "AppResponse", "urn:ru:ilb:ExampleApp:AppResponse");
$xw->writeAttribute("xmlns:xsi", "http://www.w3.org/2001/XMLSchema-instance");
$xw->writeAttribute("xsi:schemaLocation", "urn:ru:ilb:ExampleApp:AppResponse schemas/ExampleApp/AppResponse.xsd");

$AppResponse->toXmlWriter($xw);

$xw->endDocument();
//
//echo $xw->flush();
//exit;

XML_Output::tryHTML($xw->flush(), true);
