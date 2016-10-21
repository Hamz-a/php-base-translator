<?php

namespace BaseTranslator\Controllers;

use Http\Response;
use BaseTranslator\Template\FrontendRenderer;
use BaseTranslator\Page\PageReader;
use BaseTranslator\Page\InvalidPageException;

class Page {
    private $response;
    private $renderer;
    private $pageReader;

    public function __construct(Response $response, FrontendRenderer $renderer, PageReader $pageReader) {
        $this->response = $response;
        $this->renderer = $renderer;
        $this->pageReader = $pageReader;
    }

    public function show($params) {
        try {
            $data['content'] = $this->pageReader->readBySlug($params['slug']);
        } catch (InvalidPageException $e) {
            $this->response->setStatusCode(404);
            return $this->response->setContent('404 - Are you on the right track?');
        }
        $html = $this->renderer->render('Page', $data);
        $this->response->setContent($html);
    }
}