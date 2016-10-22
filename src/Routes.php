<?php

return [
    ['GET', '/', ['BaseTranslator\Controllers\HomeController', 'show']],
    ['GET', '/encode/', ['BaseTranslator\Controllers\TranslateController', 'encode']],
    ['GET', '/decode/{method}', ['BaseTranslator\Controllers\TranslateController', 'decode']],
];