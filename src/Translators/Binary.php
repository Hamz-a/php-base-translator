<?php

namespace BaseTranslator\Translators;

class Binary implements Translator {
    public function encode($input, $delimiter = ' ') {
        $hex = bin2hex($input);
        $bin = base_convert($hex, 16, 2);
        $bin_arr = str_split($bin, 8);
        return implode($delimiter, $bin_arr);
    }

    public function decode($input, $delimiter = ' ') {
        $bin = str_replace($delimiter, '', $input);
        $hex = base_convert($bin, 2, 16);
        $hex = (strlen($hex) % 2 == 0) ? $hex : '0' . $hex;
        return hex2bin($hex);
    }
}