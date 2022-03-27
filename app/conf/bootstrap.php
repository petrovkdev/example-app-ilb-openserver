<?php
set_include_path(
    __DIR__ . "/../classes" . PATH_SEPARATOR .
    __DIR__ . "/../generated" . PATH_SEPARATOR .
    get_include_path() . PATH_SEPARATOR .
    "happymeal-1"
);

require_once "phplib-1/__autoload.php";
