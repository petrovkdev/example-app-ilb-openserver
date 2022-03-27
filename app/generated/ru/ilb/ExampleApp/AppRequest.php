<?php

namespace ru\ilb\ExampleApp;

class AppRequest extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {

    const NS = "urn:ru:ilb:ExampleApp:AppRequest";
    const ROOT = "AppRequest";
    const PREF = NULL;

    /**
     * @maxOccurs 1 .
     * @var \String
     */
    protected $Foo = null;

    public function __construct() {
        parent::__construct();
        $this->_properties["foo"] = array(
            "prop" => "Foo",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->Foo
        );
    }

    /**
     * @param \String $val
     */
    public function setFoo($val) {
        $this->Foo = $val;
        $this->_properties["foo"]["text"] = $val;
        return $this;
    }

    /**
     * @return \String
     */
    public function getFoo() {
        return $this->Foo;
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
        $prop = $this->getFoo();
        if ($prop !== NULL) {
            $xw->writeElement('foo', $prop);
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
            case "foo":
                $this->setFoo($xr->readString());
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
        if (isset($props["foo"])) {
            $this->setFoo($props["foo"]);
        }
    }

    /**
     * Чтение данных массива
     * в объект
     * @param Array $row
     *
     */
    public function fromArray($row) {
        if (isset($row["foo"])) {
            $this->setFoo($row["foo"]);
        }
    }

}
