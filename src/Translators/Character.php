<?php

namespace BaseTranslator\Translators;

class Character implements Translator {
    public function encode($input, $delimiter = ' ') {
        $chr_arr = str_split($input);
        $ord_arr = array_map('ord', $chr_arr);
        return implode($delimiter, $ord_arr);
    }

    public function decode($input, $delimiter = ' ') {
        $ord_arr = explode($delimiter, $input);
        $chr_arr = array_map('chr', $ord_arr);
        return implode('', $chr_arr);
    }
}