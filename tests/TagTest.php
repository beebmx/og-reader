<?php

namespace Beebmx\OgReader\Test;

use Beebmx\OgReader\Tag;
use DOMDocument;
use DOMElement;
use PHPUnit\Framework\TestCase;

class TagTest extends TestCase
{
    protected DOMElement $element;

    protected function setUp(): void
    {
        $document = new DOMDocument();
        $this->element = $document->createElement('meta');
        $node = $document->appendChild($this->element);
        $node->setAttribute('property', 'og:url');
        $node->setAttribute('content', 'https://www.website.com');
    }

    /** @test */
    public function it_returns_attributes_as_properties()
    {
        $tag = new Tag($this->element);

        $this->assertEquals('og:url', $tag->property);
        $this->assertEquals('https://www.website.com', $tag->content);
    }

    /** @test */
    public function it_returns_null_if_property_does_not_exists()
    {
        $tag = new Tag($this->element);

        $this->assertNull($tag->name);
    }

    /** @test */
    public function it_returns_the_html_content_of_a_tag()
    {
        $tag = new Tag($this->element);

        $this->assertEquals('<meta property="og:url" content="https://www.website.com">', $tag->asHtml());
    }
}
