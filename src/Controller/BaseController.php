<?php

namespace App\Controller;

use App\Entity\Groups;
use App\Entity\User;
use App\Form\UserFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Dompdf\Dompdf;
use Dompdf\Options;

class BaseController extends AbstractController
{
    private const FLASH_INFO = 'info';

    /**
     * @param Request $request
     * @return Response
     */
    #[Route('/', name: 'index')]
    public function index(Request $request,EntityManagerInterface $em): Response
    {
        $listGroups = $em->getRepository(Groups::class)->GetGroups();

        return $this->render('index.html.twig', [
            'groups' => $listGroups,
        ]);
    }

    #[Route('/test', name: 'test')]
    public function test(Request $request,EntityManagerInterface $em, Session $session): Response
    {
        $students = $session->get('students');

        return $this->render('print.html.twig', [
            'students' => $students
        ]);
    }

    #[Route('/group/{id}', name: 'group')]
    public function group($id,Request $request,EntityManagerInterface $em): Response
    {
        $students = $em->getRepository(User::class)->GetUsers($id);
       // $session = $this->get('session');
       // $session->set('students',$students);


        //dd($students);
        return $this->render('group.html.twig', [
            'students' => $students,
        ]);
    }

    #[Route('/print/{id}', name: 'print')]
    public function kk($id,Request $request,EntityManagerInterface $em): Response
    {
        //$students = $session->get('students');
        $students = $em->getRepository(User::class)->GetPrint($id);
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'times');


        // Instantiate Dompdf with our options
        $dompdf = new Dompdf();

        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('print.html.twig',[ 'students' => $students]);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => true
        ]);

        return $this->render('print.html.twig', [
        ]);
    }

    /**
     * @param User $user
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return Response
     */
    #[Route('/group/edit/{id}', name: 'edit')]
    public function editUser(User $user, Request $request, EntityManagerInterface $em) :Response
    {
        $form = $this->createForm(UserFormType::class,$user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em->persist($user);
            $em->flush();

            $this->addFlash(self::FLASH_INFO, 'Данные изменены!');
            return $this->redirectToRoute('group',[
                'id' => $user->getId(),
            ]);
        }
        return $this->render('form.html.twig', ['form' => $form->createView()]);
    }
}
