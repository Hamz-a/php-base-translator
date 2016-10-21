<?php

namespace BaseTranslator\Template;

interface Renderer {
    public function render($template, $data = []);
}