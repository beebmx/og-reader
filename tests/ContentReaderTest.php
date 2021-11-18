<?php

namespace Beebmx\OgReader\Test;

use Beebmx\OgReader\Meta;
use Beebmx\OgReader\ContentReader;
use Beebmx\OgReader\Tag;
use PHPUnit\Framework\TestCase;

class ContentReaderTest extends TestCase
{
    /** @test */
    public function it_can_load_a_path()
    {
        $path = __DIR__ . '/stubs/with_tags.html';
        $this->assertNotNull(ContentReader::load($path));
        $this->assertStringContainsString('Testing website', ContentReader::load($path));
    }

    /** @test */
    public function it_returns_all_the_meta_tags()
    {
        $path = __DIR__ . '/stubs/with_tags.html';

        $reader = ContentReader::load($path);

        $this->assertCount(10, $reader->meta());
        $this->assertContainsOnlyInstancesOf(Tag::class, $reader->meta());
    }

    /** @test */
    public function it_returns_all_the_open_graph_tags()
    {
        $path = __DIR__ . '/stubs/with_tags.html';

        $reader = ContentReader::load($path);

        $this->assertInstanceOf(Meta::class, $reader->meta()->og());
        $this->assertCount(7, $reader->meta()->og());
    }
}
