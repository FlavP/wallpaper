<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Category;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager){
        $category1 = (new Category())
            ->setName('scifi')
         ;
        //exit(\Doctrine\Common\Util\Debug::dump($category));
        $this->addReference('category.scifi', $category1);
        $manager->persist($category1);

        $category2 = (new Category())
            ->setName('winter')
        ;
        $this->addReference('category.winter', $category2);
        $manager->persist($category2);

        $category3 = (new Category())
            ->setName('summer')
        ;
        $this->addReference('category.summer', $category3);
        $manager->persist($category3);
        $manager->flush();
    }

    public function getOrder(){
        return 100;
    }

}