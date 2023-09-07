<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{

    /*
     * @Route('/')
     */
    public function index()
    {
        $sputniks = ['1', '2', '3'];
        return $this->render('saturn/index.html.twig', [
            'sputniks' => $sputniks
        ]);

    }
}