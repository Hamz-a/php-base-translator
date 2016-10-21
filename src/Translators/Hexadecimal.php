<?php

namespace BaseTranslator\Translators;

class Hexadecimal implements Translator {
    public function encode($input, $delimiter = ' ') {
        $hex = bin2hex($input);
        $hex_arr = str_split($hex, 2);
        return implode(' ', $hex_arr);
    }

    public function decode($input, $delimiter = ' ') {
        $hex = str_replace($delimiter, '', $input);
        return hex2bin($hex);
    }
}