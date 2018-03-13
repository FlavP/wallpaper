<?php
/**
 * Created by PhpStorm.
 * User: flavius
 * Date: 08.03.2018
 * Time: 14:14
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller{

    /**
     * @Route("/", name="home")
     */

    public function indexAction(){
        $scifi = ["scifi1.jpg",
            "scifi2.jpg",
            "scifi3.jpg",
            "scifi4.jpeg",
            "scifi5.jpg",
            "scifi6.jpg",
            "scifi7.jpeg",
            "scifi8.jpeg",
            ];
        $summer = ["summer1.jpg",
            "summer2.jpg",
            "summer3.jpg",
            "summer4.jpeg",
            "summer5.jpeg",
            "summer6.jpg",
            "summer7.jpg",
            "summer8.jpeg",
            ];
        $winter = ["winter1.jpeg",
            "winter2.jpeg",
            "winter3.jpg",
            "winter4.jpeg",
            "winter5.jpg",
            "winter6.jpg",
            "winter7.jpg",
            "winter8.jpg",
            ];

        $images = array_merge($scifi, $summer, $winter);
         shuffle($images);
         $randImg = array_slice($images, 0, 8);
        return $this->render("home/index.html.twig",
            array(
           'rand_images' => $randImg,
           'scifi'  => array_slice($scifi, 0, 2),
           'winter' => array_slice($winter, 0, 2),
           'summer' => array_slice($summer, 0, 2),
        ));
    }
}