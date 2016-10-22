<?php

namespace BaseTranslator\Translators;

class Octal implements Translator {
    public function encode($input, $delimiter = ' ') {
        $hex = bin2hex($input);
        $hex_arr = str_split($hex, 2);
        $bin_arr = array_map(function($h) {
            $bin = base_convert($h, 16, 8);
            return str_pad($bin, 3, '0', STR_PAD_LEFT);
        }, $hex_arr);

        return implode($delimiter, $bin_arr);
    }

    public function decode($input, $delimiter = ' ') {
        $oct_arr = explode($delimiter, $input);
        $hex_arr = array_map(function($o) {
            return base_convert($o, 8, 16);
        }, $oct_arr);
        $hex = implode($hex_arr);
        $hex = (strlen($hex) % 2 == 0) ? $hex : '0' . $hex;
        return hex2bin($hex);
    }
}