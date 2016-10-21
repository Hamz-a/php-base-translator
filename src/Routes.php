<?php

return [
    ['GET', '/', ['BaseTranslator\Controllers\Home', 'show']],
    ['GET', '/{slug}', ['BaseTranslator\Controllers\Page', 'show']],
];