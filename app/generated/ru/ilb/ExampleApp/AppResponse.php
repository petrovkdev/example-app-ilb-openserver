<?php

namespace ru\ilb\ExampleApp;

class AppResponse extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {

    const NS = "urn:ru:ilb:ExampleApp:AppResponse";
    const ROOT = "AppResponse";
    const PREF = NULL;

    /**
     * @maxOccurs 1 .
     * @var \String
     */
    protected $Phpversion = null;

    /**
     * @maxOccurs 1 .
     * @var \Boolean
     */
    protected $Dbconnect = null;

    /**
     * @maxOccurs 1 .
     * @var \Integer
     */
    protected $Foo = null;

    /**
     * @maxOccurs 1 .
     * @var \String
     */
    protected $Result = null;

    /**
     * @maxOccurs 1 .
     * @var \String
     */
    protected $WaitText = null;

    public function __construct() {
        parent::__construct();
        $this->_properties["phpversion"] = array(
            "prop" => "Phpversion",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->Phpversion
        );
        $this->_properties["dbconnect"] = array(
            "prop" => "Dbconnect",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->Dbconnect
        );
        $this->_properties["foo"] = array(
            "prop" => "Foo",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->Foo
        );
        $this->_properties["result"] = array(
            "prop" => "Result",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->Result
        );
        $this->_properties["waitText"] = array(
            "prop" => "WaitText",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->WaitText
        );
    }

    /**
     * @param \String $val
     */
    public function setPhpversion($val) {
        $this->Phpversion = $val;
        $this->_properties["phpversion"]["text"] = $val;
        return $this;
    }

    /**
     * @param \Boolean $val
     */
    public function setDbconnect($val) {
        $this->Dbconnect = $val;
        $this->_properties["dbconnect"]["text"] = $val;
        return $this;
    }

    /**
     * @param \Integer $val
     */
    public function setFoo($val) {
        $this->Foo = $val;
        $this->_properties["foo"]["text"] = $val;
        return $this;
    }

    /**
     * @param \String $val
     */
    public function setResult($val) {
        $this->Result = $val;
        $this->_properties["result"]["text"] = $val;
        return $this;
    }

    /**
     * @param \String $val
     */
    public function setWaitText($val) {
        $this->WaitText = $val;
        $this->_properties["waitText"]["text"] = $val;
        return $this;
    }

    /**
     * @return \String
     */
    public function getPhpversion() {
        return $this->Phpversion;
    }

    /**
     * @return \Boolean
     */
    public function getDbconnect() {
        return $this->Dbconnect;
    }

    /**
     * @return \Integer
     */
    public function getFoo() {
        return $this->Foo;
    }

    /**
     * @return \String
     */
    public function getResult() {
        return $this->Result;
    }

    /**
     * @return \String
     */
    public function getWaitText() {
        return $this->WaitText;
    }

    public function toXmlStr($xmlns = self::NS, $xmlname = self::ROOT) {
        return parent::toXmlStr($xmlns, $xmlname);
    }

    /**
     * Вывод в XMLWriter
     * @param XMLWriter $xw
     * @param string $xmlname Имя корневого узла
     * @param string $xmlns Пространство имен
     * @param int $mode
     */
    public function toXmlWriter(\XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS, $mode = \Adaptor_XML::ELEMENT) {
        if ($mode & \Adaptor_XML::STARTELEMENT) {
            $xw->startElementNS(NULL, $xmlname, $xmlns);
        }
        $this->attributesToXmlWriter($xw, $xmlname, $xmlns);
        $this->elementsToXmlWriter($xw, $xmlname, $xmlns);
        if ($mode & \Adaptor_XML::ENDELEMENT) {
            $xw->endElement();
        }
    }

    /**
     * Вывод атрибутов в \XMLWriter
     * @param \XMLWriter $xw
     * @param string $xmlname Имя корневого узла
     * @param string $xmlns Пространство имен
     */
    protected function attributesToXmlWriter(\XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS) {
        parent::attributesToXmlWriter($xw, $xmlname, $xmlns);
    }

    /**
     * Вывод элементов в \XMLWriter
     * @param \XMLWriter $xw
     * @param string $xmlname Имя корневого узла
     * @param string $xmlns Пространство имен
     */
    protected function elementsToXmlWriter(\XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS) {
        parent::elementsToXmlWriter($xw, $xmlname, $xmlns);
        $prop = $this->getPhpversion();
        if ($prop !== NULL) {
            $xw->writeElement('phpversion', $prop);
        }
        $prop = $this->getDbconnect();
        if ($prop !== NULL) {
            $xw->writeElement('dbconnect', $prop);
        }
        $prop = $this->getFoo();
        if ($prop !== NULL) {
            $xw->writeElement('foo', $prop);
        }
        $prop = $this->getResult();
        if ($prop !== NULL) {
            $xw->writeElement('result', $prop);
        }
        $prop = $this->getWaitText();
        if ($prop !== NULL) {
            $xw->writeElement('waitText', $prop);
        }
    }

    /**
     * Чтение атрибутов из \XMLReader
     * @param \XMLReader $xr
     */
    public function attributesFromXmlReader(\XMLReader &$xr) {
        parent::attributesFromXmlReader($xr);
    }

    /**
     * Чтение элементов из \XMLReader
     * @param \XMLReader $xr
     */
    public function elementsFromXmlReader(\XMLReader &$xr) {
        switch ($xr->localName) {
            case "phpversion":
                $this->setPhpversion($xr->readString());
                break;
            case "dbconnect":
                $this->setDbconnect($xr->readString());
                break;
            case "foo":
                $this->setFoo($xr->readString());
                break;
            case "result":
                $this->setResult($xr->readString());
                break;
            case "waitText":
                $this->setWaitText($xr->readString());
                break;
            default:
                parent::elementsFromXmlReader($xr);
        }
    }

    /**
     * Чтение данных JSON объекта, результата работы json_decode,
     * в объект
     * @param mixed array | stdObject
     *
     */
    public function fromJSON($arg) {
        parent::fromJSON($arg);
        $props = [];
        if (is_array($arg)) {
            $props = $arg;
        } elseif (is_object($arg)) {
            foreach ($arg as $k => $v) {
                $props[$k] = $v;
            }
        }
        if (isset($props["phpversion"])) {
            $this->setPhpversion($props["phpversion"]);
        }
        if (isset($props["dbconnect"])) {
            $this->setDbconnect($props["dbconnect"]);
        }
        if (isset($props["foo"])) {
            $this->setFoo($props["foo"]);
        }
        if (isset($props["result"])) {
            $this->setResult($props["result"]);
        }
        if (isset($props["waitText"])) {
            $this->setWaitText($props["waitText"]);
        }
    }

    /**
     * Чтение данных массива
     * в объект
     * @param Array $row
     *
     */
    public function fromArray($row) {
        if (isset($row["phpversion"])) {
            $this->setPhpversion($row["phpversion"]);
        }
        if (isset($row["dbconnect"])) {
            $this->setDbconnect($row["dbconnect"]);
        }
        if (isset($row["foo"])) {
            $this->setFoo($row["foo"]);
        }
        if (isset($row["result"])) {
            $this->setResult($row["result"]);
        }
        if (isset($row["waitText"])) {
            $this->setWaitText($row["waitText"]);
        }
    }

}
