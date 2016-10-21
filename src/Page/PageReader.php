<?php

namespace BaseTranslator\Page;

interface PageReader
{
    public function readBySlug($slug);
}