<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Localisation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LocalisationController extends Controller
{
    public function showAction(Localisation $localisation)
    {
        return $this->render('localisation/show.html.twig', array(
            'localisation' => $localisation
        ));
    }

}
