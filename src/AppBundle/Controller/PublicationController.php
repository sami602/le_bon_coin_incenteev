<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Publication;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

/**
 * Publication controller.
 *
 */
class PublicationController extends Controller
{
    /**
     * Lists all publication entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $publications = $em->getRepository('AppBundle:Publication')->findAll();

        return $this->render('publication/index.html.twig', array(
            'publications' => $publications,
        ));
    }

    /**
     * Creates a new publication entity.
     *
     */
    public function newAction(Request $request)
    {
        $publication = new Publication();
        $form = $this->createForm('AppBundle\Form\PublicationType', $publication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($publication);
            $em->flush();
            $this->addFlash(
                'notice',
                'Merci ! Votre annonce est publié.'
            );
            return $this->redirectToRoute('publication_show', array('id' => $publication->getId()));
        }

        return $this->render('publication/new.html.twig', array(
            'publication' => $publication,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a publication entity.
     *
     */
    public function showAction(Publication $publication)
    {

        return $this->render('publication/show.html.twig', array(
            'publication' => $publication
        ));
    }


    /**
     * Creates a form to answer a publication
     * @param Request $request
     * @param Publication $publication
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function contactAction(Request $request, Publication $publication)
    {

        $form = $this->createContactForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $data = $form->getData();
            $senderName = $data['Nom'];
            $senderEmail = $data['Email'];
            $senderPhone = $data['Telephone'];
            $senderMessage = $data['Message'];
            $receiverEmail = $publication->getEmail();
            $publicationTitle = $publication->getTitle();
            $messageBody = $this->generateTextOfTheMessage($senderName,$senderEmail,$senderPhone,$publicationTitle,$senderMessage);
            $this->sendEmail($receiverEmail,$senderName,$senderEmail,$publicationTitle,$messageBody);
            $this->addFlash(
                'notice',
                'Votre message a bien été envoyé!'
            );
            return $this->redirectToRoute('publication_index');
        }

        return $this->render('publication/contact.html.twig', array(
            'publication' => $publication,
            'form' => $form->createView()
        ));
    }

    /**
     * @return mixed
     */
    private function createContactForm(){
        $defaultData = array('message' => 'Tapez votre message ici');
        return $this->createFormBuilder($defaultData)
            ->add('Nom', TextType::class , array('constraints' => new NotBlank()))
            ->add('Email', EmailType::class,array(
                'constraints' => array(
                    new Email(),
                    new NotBlank()
                )))
            ->add('Telephone', TextType::class, array('constraints' => array(
                new NotBlank(),
                new Length(array('max' => 20,'maxMessage' => 'Votre numero de telephone ne peut contenir plus de 20 caractères.')))))
            ->add('Message', TextareaType::class,  array('constraints' => new NotBlank()))
            ->add('Envoyez', SubmitType::class)
            ->getForm();

    }
    private function sendEmail($receiverEmail,$senderName,$senderEmail,$publicationTitle,$messageBody){

        $message = \Swift_Message::newInstance()
            ->setSubject($senderName.' a répondu à votre annonce : '.$publicationTitle)
            ->setFrom($senderEmail)
            ->setTo($receiverEmail)
            ->setBody(
                $messageBody
               ,
                'text/plain'
            );
        $this->get('mailer')->send($message);
    }

    /**
     * Generate the body of the email-answer of a publication.
     * @param $senderName
     * @param $senderEmail
     * @param $publicationTitle
     * @param $senderMessage
     * @return string
     */
    private function generateTextOfTheMessage($senderName, $senderEmail,$senderPhone, $publicationTitle,$senderMessage){
        $textOfTheMessage = 'Félicicitation ! ';
        $textOfTheMessage .= $senderName.' ( '.$senderEmail.' - '.$senderPhone.' ) ';
        $textOfTheMessage .= 'a répondu à votre annonce '.$publicationTitle;
        $textOfTheMessage .= "
        
";
        $textOfTheMessage .= $senderMessage;
        return $textOfTheMessage;
    }

    /**
     * Displays a form to edit an existing publication entity.
     *
     */
    /*
        public function editAction(Request $request, Publication $publication)
        {
            $deleteForm = $this->createDeleteForm($publication);
            $editForm = $this->createForm('AppBundle\Form\PublicationType', $publication);
            $editForm->handleRequest($request);

            if ($editForm->isSubmitted() && $editForm->isValid()) {
                $this->getDoctrine()->getManager()->flush();

                return $this->redirectToRoute('publication_edit', array('id' => $publication->getId()));
            }

            return $this->render('publication/edit.html.twig', array(
                'publication' => $publication,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            ));
        }
    */
    /**
     * Deletes a publication entity.
     *
     */
    /*    public function deleteAction(Request $request, Publication $publication)
        {
            $form = $this->createDeleteForm($publication);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->remove($publication);
                $em->flush();
            }

            return $this->redirectToRoute('publication_index');
        }
    */
    /**
     * Creates a form to delete a publication entity.
     *
     * @param Publication $publication The publication entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    /*
        private function createDeleteForm(Publication $publication)
        {
            return $this->createFormBuilder()
                ->setAction($this->generateUrl('publication_delete', array('id' => $publication->getId())))
                ->setMethod('DELETE')
                ->getForm()
            ;
        }
    */
}
