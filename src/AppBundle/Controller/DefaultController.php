<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $root = $this->getParameter('kernel.root_dir');
        $images = array_filter(explode(PHP_EOL, file_get_contents($root . '/../images.txt')));
        $image = $images[array_rand($images)];

        return new Response(file_get_contents($image), 200, ['Content-Type' => 'image/gif']);
    }
}
