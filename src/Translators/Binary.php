<?php

namespace BaseTranslator\Translators;

class Binary implements Translator {
    public function encode($input, $delimiter = ' ') {
        $hex = bin2hex($input);
        $hex_arr = str_split($hex, 2);
        $bin_arr = array_map(function($h) {
            $bin = base_convert($h, 16, 2);
            return str_pad($bin, 8, '0', STR_PAD_LEFT);
        }, $hex_arr);

        return implode($delimiter, $bin_arr);
    }

    public function decode($input, $delimiter = ' ') {
        $bin = str_replace($delimiter, '', $input);
        $hex = base_convert($bin, 2, 16);
        $hex = (strlen($hex) % 2 == 0) ? $hex : '0' . $hex;
        return hex2bin($hex);
    }
}