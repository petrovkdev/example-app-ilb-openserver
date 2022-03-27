<?php

namespace ru\ilb\ExampleApp\AppResponse;

class Car extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {

    const NS = "urn:ru:ilb:ExampleApp:AppResponse";
    const ROOT = "car";
    const PREF = NULL;

    /**
     * @maxOccurs 1 .
     * @var \String
     */
    protected $Marka = null;

    /**
     * @maxOccurs 1 .
     * @var \String
     */
    protected $Foo1 = null;

    /**
     * @maxOccurs 1 .
     * @var \String
     */
    protected $Foo2 = null;

    public function __construct() {
        parent::__construct();
        $this->_properties["marka"] = array(
            "prop" => "Marka",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->Marka
        );
        $this->_properties["foo1"] = array(
            "prop" => "Foo1",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->Foo1
        );
        $this->_properties["foo2"] = array(
            "prop" => "Foo2",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->Foo2
        );
    }

    /**
     * @param \String $val
     */
    public function setMarka($val) {
        $this->Marka = $val;
        $this->_properties["marka"]["text"] = $val;
        return $this;
    }

    /**
     * @param \String $val
     */
    public function setFoo1($val) {
        $this->Foo1 = $val;
        $this->_properties["foo1"]["text"] = $val;
        return $this;
    }

    /**
     * @param \String $val
     */
    public function setFoo2($val) {
        $this->Foo2 = $val;
        $this->_properties["foo2"]["text"] = $val;
        return $this;
    }

    /**
     * @return \String
     */
    public function getMarka() {
        return $this->Marka;
    }

    /**
     * @return \String
     */
    public function getFoo1() {
        return $this->Foo1;
    }

    /**
     * @return \String
     */
    public function getFoo2() {
        return $this->Foo2;
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
        $prop = $this->getMarka();
        if ($prop !== NULL) {
            $xw->writeElement('marka', $prop);
        }
        $prop = $this->getFoo1();
        if ($prop !== NULL) {
            $xw->writeElement('foo1', $prop);
        }
        $prop = $this->getFoo2();
        if ($prop !== NULL) {
            $xw->writeElement('foo2', $prop);
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
            case "marka":
                $this->setMarka($xr->readString());
                break;
            case "foo1":
                $this->setFoo1($xr->readString());
                break;
            case "foo2":
                $this->setFoo2($xr->readString());
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
        if (isset($props["marka"])) {
            $this->setMarka($props["marka"]);
        }
        if (isset($props["foo1"])) {
            $this->setFoo1($props["foo1"]);
        }
        if (isset($props["foo2"])) {
            $this->setFoo2($props["foo2"]);
        }
    }

    /**
     * Чтение данных массива
     * в объект
     * @param Array $row
     *
     */
    public function fromArray($row) {
        if (isset($row["marka"])) {
            $this->setMarka($row["marka"]);
        }
        if (isset($row["foo1"])) {
            $this->setFoo1($row["foo1"]);
        }
        if (isset($row["foo2"])) {
            $this->setFoo2($row["foo2"]);
        }
    }

}
