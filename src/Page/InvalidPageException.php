<?php
/**
 * Created by PhpStorm.
 * User: Hamza
 * Date: 20-10-2016
 * Time: 23:37
 */

namespace BaseTranslator\Page;

use Exception;

class InvalidPageException extends Exception {
    public function __construct($slug, $code = 0, Exception $previous = null) {
        $message = 'No page with the slug "' . $slug . '" was found.';
        parent::__construct($message, $code, $previous);
    }
}