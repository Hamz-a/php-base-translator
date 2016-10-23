<?php

namespace BaseTranslator\Translators;

class Translate implements Translator {
    private $translators = [];

    public function __construct(array $translators) {
        foreach($translators as $translator) {
            $path = explode('\\', strtolower($translator));
            $name =  array_pop($path);
            $this->translators[$name] = new $translator;
        }
    }

    public function encode($value = '') {
        $result = [];

        foreach($this->translators as $name => $translator) {
            $result[$name] = $this->removeNastyBytes($translator->encode($value));
        }

        return $result;
    }

    public function decode($value, $method = '') {
        $result = [];
        $method = strtolower($method);

        if(isset($this->translators[$method])) {
            $decoded = $this->translators[$method]->decode($value);
            foreach ($this->translators as $name => $translator) {
                $result[$name] = $this->removeNastyBytes($translator->encode($decoded));
            }
        }

        return $result;
    }

    public function getAvailableTranslators(): array {
        return array_keys($this->translators);
    }

    public function removeNastyBytes($input) {
        return preg_replace('~[^\x20-\x7e]~', ' ', $input);
    }
}