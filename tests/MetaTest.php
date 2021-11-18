<?php

namespace Beebmx\OgReader\Test;

use Beebmx\OgReader\ContentReader;
use PHPUnit\Framework\TestCase;

class MetaTest extends TestCase
{
    /** @test */
    public function it_returns_if_has_open_graph_tags()
    {
        $path = __DIR__ . '/stubs/with_tags.html';
        $meta = ContentReader::load($path)->meta();
        $this->assertTrue($meta->hasOg());

        $path = __DIR__ . '/stubs/without_tags.html';
        $meta = ContentReader::load($path)->meta();
        $this->assertFalse($meta->hasOg());
    }

    /** @test */
    public function it_returns_if_not_has_open_graph_tags()
    {
        $path = __DIR__ . '/stubs/with_tags.html';
        $meta = ContentReader::load($path)->meta();
        $this->assertFalse($meta->notHasOg());

        $path = __DIR__ . '/stubs/without_tags.html';
        $meta = ContentReader::load($path)->meta();
        $this->assertTrue($meta->notHasOg());
    }
}
