<?php

namespace BaseTranslator\Template;

use BaseTranslator\Translators\Translate;

class FrontendTwigRenderer implements FrontendRenderer {
    private $renderer;
    private $translate;

    public function __construct(Renderer $renderer, Translate $translate) {
        $this->renderer = $renderer;
        $this->translate = $translate;
    }

    public function render($template, $data = []) {
        $translators = $this->translate->getAvailableTranslators();

        // We'll set the text field manually (full width)
        unset($translators[array_search('text', $translators)]);

        $data = array_merge(['translators' => $translators], $data);
        return $this->renderer->render($template, $data);
    }
}