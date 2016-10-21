<?php

namespace BaseTranslator\Translators;

class Base64 implements Translator {
    public function encode($input) {
        return base64_encode($input);
    }

    public function decode($input) {
        return base64_decode($input);
    }
}