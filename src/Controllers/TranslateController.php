<?php

namespace BaseTranslator\Controllers;

use Http\Response;
use Http\Request;

use BaseTranslator\Translators\Translate;

class TranslateController {
    private $response;
    private $request;
    private $translate;

    public function __construct(Response $response, Request $request, Translate $translate) {
        $this->response = $response;
        $this->request = $request;
        $this->translate = $translate;
    }

    public function encode() {
        $data = $this->translate->encode($this->request->getParameter('data'));
        $this->response->setHeader('Content-Type', 'application/json');
        $this->response->setContent(json_encode($data));
    }

    public function decode($params) {
        try {
            $data = $this->translate->decode($this->request->getParameter('data'), $params['method']);
        } catch (Exception $e) { // TODO: fine tuning
            $this->response->setStatusCode(500);
            return $this->response->setContent('Random error');
        }
        $this->response->setHeader('Content-Type', 'application/json');
        $this->response->setContent(json_encode($data));
    }

}