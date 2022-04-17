<?php

require_once("../conf/config.php");

$hReq = new HTTP_Request2Xml('schemas/ExampleApp/AppRequest.xsd');
$req = new ru\ilb\ExampleApp\AppRequest();

if (!$hReq->isEmpty()) {
    $req->fromXmlStr($hReq->getAsXML());
}

$AppResponse = new ru\ilb\ExampleApp\AppResponse();

if ($req->getExecute() == 'send') {
    if (!isset($_REQUEST["run"]) && !isset($_REQUEST["wait"])) {
        $args = [
            "a" => 88,
            "b" => 10,
        ];

        $ExampleSend = new App\AsyncSend\ExampleSend();
        $ExampleSend->setBootstrap("../conf/config.php");
        $longLongId = $ExampleSend->fork($args);

        header("Location: " . $_SERVER["SCRIPT_NAME"] . "?execute-0=send&wait=1&longLongId=" . $longLongId . "&i=0");
        exit;
    }

    if (isset($_REQUEST["wait"])) {
        $ExampleSend = new App\AsyncSend\ExampleSend($_REQUEST["longLongId"]);
        if ($ExampleSend->isDone()) {
            $data = $ExampleSend->getResult();
            $AppResponse->setResult($data);
        } else {
            $timeout = 2;
            $url = $_SERVER["SCRIPT_NAME"] . "?execute-0=send&wait=1&longLongId=" . $_REQUEST["longLongId"] . "&i=" . ($_REQUEST["i"] + 1);

            header("Status: 202 Accepted");
            header("Refresh: " . $timeout . ";" . $url);
            header("Content-type: text/html; charset=UTF-8");

            $AppResponse->setWaitText('Отправка, пожалуйста подождите...');
        }
    }
}


$xw = new XMLWriter();
$xw->openMemory();
$xw->startDocument("1.0", "UTF-8");

//для красоты онли
$xw->setIndent(TRUE);
$xw->setIndentString(" ");

//прицепляем стилшит
$xw->writePi("xml-stylesheet", 'type="text/xsl" href="stylesheets/example.async.xsl"');

//$xw->startElementNs(NULL, "AppResponse", "urn:ru:ilb:ExampleApp:AppResponse");
$xw->writeAttribute("xmlns:xsi", "http://www.w3.org/2001/XMLSchema-instance");
$xw->writeAttribute("xsi:schemaLocation", "urn:ru:ilb:ExampleApp:AppResponse schemas/ExampleApp/AppResponse.xsd");

$AppResponse->toXmlWriter($xw);

$xw->endDocument();
//
//echo $xw->flush();
//exit;

XML_Output::tryHTML($xw->flush(), true);