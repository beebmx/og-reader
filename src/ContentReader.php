<?php

namespace Beebmx\OgReader;

use DOMDocument;

class ContentReader
{
    protected string $file;

    protected DOMDocument $document;

    public function __construct($file)
    {
        $this->file = $file;

        $this->document = new DOMDocument();
        $this->document->loadHTML($this->file, LIBXML_NOWARNING | LIBXML_NOERROR);
    }

    public static function load(string $path): static
    {
        return new static(file_get_contents($path));
    }

    public function meta(): Meta
    {
        return new Meta(array_map(
            fn ($element) => new Tag($element),
            $this->getElements('meta')
        ));
    }

    protected function getElements(string $tag): array
    {
        return iterator_to_array(
            $this->document->getElementsByTagName($tag)
        );
    }

    public function __toString(): string
    {
        return $this->file;
    }
}
