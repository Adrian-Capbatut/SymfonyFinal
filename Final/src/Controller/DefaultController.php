<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Calatori;
use App\Entity\Bilete;

class DefaultController extends AbstractController
{
     /**
     * @Route("/", name="tabele")
     */
    public function showAll()
    {
        $bilete  = $this->getDoctrine()->getRepository(Bilete::class)->findAll();
        $calatori  = $this->getDoctrine()->getRepository(Calatori::class)->findAll();
        $search = 0;

        return $this->render('index.html.twig',[
            'bilete' => $bilete,
            'calatori' => $calatori,
            'search' => $search,
        ]);
    }
}