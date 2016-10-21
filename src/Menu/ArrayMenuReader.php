<?php

namespace BaseTranslator\Menu;

class ArrayMenuReader implements MenuReader {
    public function readMenu() {
        return [
            ['href' => '/', 'text' => 'Home'],
            ['href' => '/page-one', 'text' => 'one'],
            ['href' => '/page-two', 'text' => 'two'],
        ];
    }
}