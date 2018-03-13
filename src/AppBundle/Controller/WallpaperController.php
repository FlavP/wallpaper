<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class WallpaperController extends Controller
{
    /**
     * @Route("/wallpaper", name="wallpaper")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        $images = [
            'summer1.jpg',
            'summer2.jpg',
            'summer3.jpg',
            'summer4.jpeg',
            'summer5.jpeg',
            'summer6.jpg',
            'summer7.jpg',
            'summer8.jpeg'
        ];

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $images,
            $request->query->getInt('other_page', 1)/*page number*/,
            4/*limit per page*/
        );
        return $this->render('wallpapers/index.html.twig',
            array(
                'images' => $pagination,
            ));
    }
}
