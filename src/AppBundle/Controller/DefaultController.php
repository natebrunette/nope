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
        return new Response(file_get_contents($this->getImage()), 200, ['Content-Type' => 'image/gif']);
    }

    /**
     * @Route("/.gif")
     */
    public function imageAction()
    {
        return $this->redirect($this->getImage());
    }

    /**
     * Get a random image
     *
     * @return string
     */
    private function getImage(): string
    {
        $root = $this->getParameter('kernel.root_dir');
        $images = array_filter(explode(PHP_EOL, file_get_contents($root . '/../images.txt')));

        return $images[array_rand($images)];
    }
}
