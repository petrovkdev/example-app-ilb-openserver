<?php

namespace App\AsyncSend;

class ExampleSend extends \Async_Runnable {
    public function run($args) {

        sleep(30);

        $data = $args['a'] + $args['b'];

        $this->setResult($data);

    }
}