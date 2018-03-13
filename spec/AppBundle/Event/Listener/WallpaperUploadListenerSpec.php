<?php

namespace spec\AppBundle\Event\Listener;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WallpaperUploadListenerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('AppBundle\Event\Listener\WallpaperUploadListener');
    }
}
