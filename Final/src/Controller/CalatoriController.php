<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Calatori;
use App\Entity\Bilete;
use App\Form\CalatoriType;

class CalatoriController extends AbstractController
{
    /**
     * @Route("/show/calatori", name="calatori")
     */
    public function show(): Response
    {
        $calatori = $this -> getDoctrine() -> getRepository(Calatori::class) ->findAll();
        return $this->render('calatori/show.html.twig', [
            'calatori' => $calatori,
        ]);
    }

    /**
     * @Route("create/calatori", name="create_calatori")
     */
    public function create(Request $request): Response
    {
       // just setup a fresh $task object (remove the example data)
       $calator = new Calatori();

       $form = $this->createForm(CalatoriType::class, $calator);

       $form->handleRequest($request);
       if ($form->isSubmitted() && $form->isValid()) {

          $em = $this->getDoctrine()->getManager();
          $em->persist($calator);
          $em->flush();

          return $this->redirect($this->generateUrl('calatori'));

       }

       $this->addFlash('created','Calatorul a fost creat');

       return $this->render('calatori/create.html.twig', [
           'form' => $form->createView(),
       ]);
    }

    /**
     * @Route("edit/calatori/{id}", name="edit_calatori")
     */
    public function edit(Request $request, $id): Response
    {
       $calator = new Calatori();

       $calator= $this->getDoctrine()->getRepository(Calatori::class)->find($id);

       $form = $this->createForm(CalatoriType::class, $calator);

       $form->handleRequest($request);
       if ($form->isSubmitted() && $form->isValid()) {

          $em = $this->getDoctrine()->getManager();
          $em->flush();

          $this->addFlash('created','Calatorul a fost modificat');

          return $this->redirect($this->generateUrl('calatori'));

       }
       return $this->render('calatori/edit.html.twig', [
        'form' => $form->createView(),
    ]);
    }

    /**
     * @Route("calatori/delete/{id}", name="delete_calatori")
     */
    public function delete($id){
        $calator= $this->getDoctrine()->getRepository(Calatori::class)->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager -> remove($calator);
        $entityManager -> flush();

        $this->addFlash('success','Calatorul a fost sters');

        return $this->redirect($this->generateUrl('calatori'));
    }

     /**
     * @Route("calatori/search/{id}", name="search_calatori")
     */
    public function byId($id) : Response{
        $calator = $this->getDoctrine()->getRepository(Calatori::class)->find($id);
        if($calator){
        return $this->render('calatori/search.html.twig', [
            'calator' => $calator,
        ]);
    } else return new Response('<h1>Calator cu ID: '.$id.' nu exista!</h1>');
    }

}
