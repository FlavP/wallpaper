<?php

namespace spec\AppBundle\Service;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Filesystem\Filesystem;

class FileMoverSpec extends ObjectBehavior
{
    private $filesystem;

    function let(Filesystem $fs){
        $this->filesystem = $fs;
        $this->beConstructedWith($fs);
    }

    function it_is_initializable(){

        $this->shouldHaveType('AppBundle\Service\FileMover');
    }

    function it_can_move_from_temporary_to_permanent_directory(){
        $source = "/some/fake/old/path";
        $destination = "/some/fake/new/path";

        $this->move($source, $destination)->shouldReturn(true);

        $this->filesystem->rename($source, $destination)->shouldHaveBeenCalled();
    }
}
