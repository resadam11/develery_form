<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\MessageType;
use App\Entity\Message;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\Translation\TranslatorInterface;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(Request $request, TranslatorInterface $translator)
    {
        $message = new Message();

        $form = $this->createForm(MessageType::class, $message);

        $form->handleRequest($request);

        if($form->isSubmitted()){
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($message);
                $em->flush();
    
                $this->addFlash(
                    'success',
                    $translator->trans('message.success')
                );
    
                return $this->redirectToRoute('home');
            }
            else{
                $this->addFlash(
                    'danger',
                    $translator->trans('message.danger')
                );
            }
        }
        
        return $this->render('home/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
