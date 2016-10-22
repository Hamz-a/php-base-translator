<?php

namespace BaseTranslator\Template;

class FrontendTwigRenderer implements FrontendRenderer {
    private $renderer;

    public function __construct(Renderer $renderer) {
        $this->renderer = $renderer;
    }

    public function render($template, $data = []) {
        return $this->renderer->render($template, $data);
    }
}