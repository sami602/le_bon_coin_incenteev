<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 13/04/2017
 * Time: 17:06
 */
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\Localisation;

class LoadLocalisationData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $em)
    {
        $rennes = new Localisation();
        $rennes->setCity('Rennes');

        $paris = new Localisation();
        $paris->setCity('Paris');


        $em->persist($paris);
        $em->persist($rennes);


        $em->flush();

        $this->addReference('localisation-rennes', $rennes);
        $this->addReference('localisation-paris', $paris);
    }

    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}