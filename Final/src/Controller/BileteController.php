<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Calatori;
use App\Entity\Bilete;
use App\Form\BileteType;

class BileteController extends AbstractController
{
    /**
     * @Route("/bilete", name="bilete")
     */
    public function index(): Response
    {
        $calator = new Calatori();
        $calator ->setNume('Igor');
        $calator ->setPrenume('Paduraru');
        $calator ->setVarsta(23);
        $calator ->setCodPersonal("2009005002233");
        $calator ->setAdresa('Grigore Vieru 21/3');

        $bilet = new Bilete();
        $bilet ->setLocPlecare('Chisinau');
        $bilet ->setDataPlecare(new \DateTime('2020-01-16'));
        $bilet ->setOraPlecare(new \DateTime('16:20:15'));
        $bilet ->setDestinatia('Iasi');
        $bilet ->setDataSosire(new \DateTime('2020-01-16'));
        $bilet ->setOraSosire(new \DateTime('20:20:15'));
        $bilet ->setCalator($calator);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($calator);
        $entityManager->persist($bilet);
        $entityManager->flush();

        return $this->render('bilete\index.html.twig',[
            'calator' => $calator,
            'bilet' => $bilet,
        ]);
    }

     /**
     * @Route("create/bilete", name="create_bilete")
     */
    public function create(Request $request): Response
    {
       // just setup a fresh $task object (remove the example data)
       $bilet = new Bilete();

       $form = $this->createForm(BileteType::class, $bilet);

       $form->handleRequest($request);
       if ($form->isSubmitted() && $form->isValid()) {

          $em = $this->getDoctrine()->getManager();
          $em->persist($bilet);
          $em->flush();

          $this->addFlash('created','Biletul a fost creat');

          return $this->redirect($this->generateUrl('bilete'));

       }

       return $this->render('bilete/create.html.twig', [
           'form' => $form->createView(),
       ]);
    }

     /**
     * @Route("edit/bilete/{id}", name="edit_bilete")
     */
    public function edit(Request $request, $id): Response
    {
       $bilet = new Bilete();

       $bilet = $this->getDoctrine()->getRepository(Bilete::class)->find($id);

       $form = $this->createForm(BileteType::class, $bilet);

       $form->handleRequest($request);
       if ($form->isSubmitted() && $form->isValid()) {

          $em = $this->getDoctrine()->getManager();
          $em->flush();

          $this->addFlash('created','Biletul a fost modificat');

          return $this->redirect($this->generateUrl('bilete'));

       }
       return $this->render('bilete/edit.html.twig', [
        'form' => $form->createView(),
    ]);
    }

    /**
     * @Route("show/bilete", name="bilete")
     */
    public function show(): Response
    {
        $bilete = $this -> getDoctrine() -> getRepository(Bilete::class) ->findAll();
        return $this->render('bilete/show.html.twig', [
            'bilete' => $bilete,
        ]);
    }

    /**
     * @Route("bilete/delete/{id}", name="delete_bilete")
     */
    public function delete($id){
        $bilet = $this->getDoctrine()->getRepository(Bilete::class)->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager -> remove($bilet);
        $entityManager -> flush();

        $this->addFlash('success','Biletul a fost sters');

        return $this->redirect($this->generateUrl('bilete'));
    }

    /**
     * @Route("bilete/search/{id}", name="search_bilete")
     */
    public function byId($id) : Response{
        $bilet = $this->getDoctrine()->getRepository(Bilete::class)->find($id);
        if($bilet){
        return $this->render('bilete/search.html.twig', [
            'bilet' => $bilet,
        ]);
    } else return new Response('<h1>Bilet cu ID: '.$id.' nu exista!</h1>');
    }
}
