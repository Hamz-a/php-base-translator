<?php

namespace BaseTranslator\Translators;


class Text implements Translator {
    public function encode($input) {
        return $input;
    }

    public function decode($input) {
        return $input;
    }
}