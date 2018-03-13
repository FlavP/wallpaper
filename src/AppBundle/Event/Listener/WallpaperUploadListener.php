<?php

namespace AppBundle\Event\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

class WallpaperUploadListener{
    public function prePersist(LifecycleEventArgs $eventArgs){

    }

    public function preUpdate(PreUpdateEventArgs $eventArgs){

    }
}
