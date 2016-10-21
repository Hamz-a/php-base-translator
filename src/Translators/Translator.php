<?php

namespace BaseTranslator\Translators;

interface Translator {
    public function encode($input);
    public function decode($input);
}