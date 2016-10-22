<?php

return [
    ['GET', '/', ['BaseTranslator\Controllers\HomeController', 'show']],
    ['POST', '/encode[/{method}]', ['BaseTranslator\Controllers\TranslateController', 'encode']],
    ['POST', '/decode/{method}', ['BaseTranslator\Controllers\TranslateController', 'decode']],
];