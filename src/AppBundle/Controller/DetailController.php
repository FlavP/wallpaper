<?php
/**
 * Created by PhpStorm.
 * User: flavius
 * Date: 07.03.2018
 * Time: 13:08
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DetailController extends Controller{
    /**
    * @Route("/view", name="view")
     */
    public function indexAction(){
        $image = 'summer1.jpg';
        return $this->render('details/index.html.twig',
            array(
                'image' => $image,
            ));
    }
}