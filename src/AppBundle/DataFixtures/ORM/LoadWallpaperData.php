<?php

namespace AppBundle\DataFixtures\ORM;

;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Wallpaper;

class LoadWallpaperData extends AbstractFixture implements OrderedFixtureInterface {
    public function load(ObjectManager $manager){
        for($i = 1; $i < 9; $i++) {
            $wallpaper = (new Wallpaper())
                ->setFilename('scifi' . $i . '.jpg')
                ->setSlug('scifi' . $i)
                ->setHeight(1920)
                ->setWidth(1080)
                ->setCategory(
                    $this->getReference('category.scifi')
                );
            $manager->persist($wallpaper);
        }
         for($i = 1; $i < 9; $i++) {
            $wallpaper = (new Wallpaper())
                ->setFilename('winter' . $i . '.jpg')
                ->setSlug('winter' . $i)
                ->setHeight(1920)
                ->setWidth(1080)
                ->setCategory(
                    $this->getReference('category.winter')
                );
            $manager->persist($wallpaper);
        }
         for($i = 1; $i < 9; $i++) {
            $wallpaper = (new Wallpaper())
                ->setFilename('summer' . $i . '.jpg')
                ->setSlug('summer' . $i)
                ->setHeight(1920)
                ->setWidth(1080)
                ->setCategory(
                    $this->getReference('category.summer')
                );
            $manager->persist($wallpaper);
        }
        $manager->flush();
    }

    public function getOrder(){
        return 200;
    }
}