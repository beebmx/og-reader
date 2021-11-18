<?php

namespace Beebmx\OgReader;

use DOMDocument;
use DOMElement;

class Tag
{
    protected DOMElement $element;

    public function __construct(DOMElement $element)
    {
        $this->element = $element;
    }

    public function asHtml(): string
    {
        $dom = new DOMDocument();
        $dom->appendChild(
            $dom->importNode($this->element)
        );

        return trim($dom->saveHTML());
    }

    public function __get(string $key)
    {
        return $this->element->getAttribute($key) ?: null;
    }
}
