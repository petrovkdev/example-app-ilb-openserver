<?php

/**
 * Конфигурация приложения
 * @filesource classes/Config.php
 */
class Config
{
    /**
     * Экземпляр класса
     *
     * @var Config
     */
    private static $instance;

    /**
     * Каталог приложения
     * @var string
     */
    public $BasePath;

    /**
     * Режим отладки
     * @var boolean
     */
    public $Debug = FALSE;


    /**
     * Инициализация конфигурации
     */
    private function __construct()
    {
        $this->BasePath = dirname(__DIR__);
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Config();
        }
        return self::$instance;
    }
}