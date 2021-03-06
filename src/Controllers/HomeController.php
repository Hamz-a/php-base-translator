<?php

namespace BaseTranslator\Controllers;

use Http\Request;
use Http\Response;
use BaseTranslator\Template\FrontendRenderer;

class HomeController {
    private $request;
    private $response;
    private $renderer;

    public function __construct(Request $request, Response $response, FrontendRenderer $renderer) {
        $this->request = $request;
        $this->response = $response;
        $this->renderer = $renderer;
    }

    public function show() {
        $html = $this->renderer->render('Home');
        $this->response->setContent($html);
    }
}