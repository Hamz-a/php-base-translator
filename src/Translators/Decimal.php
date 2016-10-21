<?php

namespace BaseTranslator\Translators;

class Decimal implements Translator {
    public function encode($input, $delimiter = ' ') {
        $chr_arr = str_split($input);
        $dec_arr = array_map('ord', $chr_arr);
        return implode($delimiter, $dec_arr);
    }

    public function decode($input, $delimiter = ' ') {
        $dec_arr = explode($delimiter, $input);
        $chr_arr = array_map('chr', $dec_arr);
        return implode('', $chr_arr);
    }
}