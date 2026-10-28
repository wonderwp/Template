<?php

declare(strict_types=1);

namespace WonderWp\Component\Template\Tests\Unit;

use PHPUnit\Framework\TestCase;
use WonderWp\Component\Template\Views\VueFrag;

final class VueFragTest extends TestCase
{
    public function testRenderIncludesTemplateValues(): void
    {
        $file = sys_get_temp_dir() . '/wwp-vue-frag-' . uniqid('', true) . '.php';
        file_put_contents($file, '<?php echo $greeting;');
        try {
            $frag = new VueFrag($file, ['greeting' => 'hi']);
            ob_start();
            $frag->render();
            $this->assertSame('hi', ob_get_clean());
        } finally {
            @unlink($file);
        }
    }
}
