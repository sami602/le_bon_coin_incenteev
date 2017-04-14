<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 13/04/2017
 * Time: 17:07
 */
namespace AppBundle\DataFixtures\ORM;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use AppBundle\Entity\Publication;

class LoadPublicationData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $em)
    {
        $pub1 = new Publication();
        $pub1->setCategory($em->merge($this->getReference('category-emploi')));
        $pub1->setCreatedAtValue();
        $pub1->setTitle('Poste de developpeur junior à Incenteev');
        $pub1->setDescription("N'hésitez pas, rejoignez incenteev, une startup de rêve en pleine expansion, en tant que développeur web junior.");
        $pub1->setEmail('saminsa602@gmail.com');
        $pub1->setLocalisation($em->merge($this->getReference('localisation-paris')));
        $pub1->setExpiresAt(new \DateTime('now + 30days'));
        $pub1->setIsActivated(true);
        $pub1->setIsAnOffer(true);
        $pub1->setIsPublic(true);
        $pub1->setPrice(1000000);
        $pub1->setToken('emploi_incentive');
        $pub1->setUpdatedAtValue();

        $pub2 = new Publication();
        $pub2->setCategory($em->merge($this->getReference('category-locationImmo')));
        $pub2->setCreatedAtValue();
        $pub2->setTitle("Location de rêve juste à coté des bureaux d'Incenteev!");
        $pub2->setDescription("T3 de 50mcarré situé juste à coté de la startup Incenteev.");
        $pub2->setEmail('saminsa602@gmail.com');
        $pub2->setLocalisation($em->merge($this->getReference('localisation-paris')));
        $pub2->setExpiresAt(new \DateTime('now + 30days'));
        $pub2->setIsActivated(true);
        $pub2->setIsAnOffer(true);
        $pub2->setIsPublic(true);
        $pub2->setPrice(100);
        $pub2->setToken('location_incentive');
        $pub2->setUpdatedAtValue();

        $pub3 = new Publication();
        $pub3->setCategory($em->merge($this->getReference('category-voiture')));
        $pub3->setCreatedAtValue();
        $pub3->setTitle("Donne Tesla");
        $pub3->setDescription("Comme je me suis acheté le modèle de luxe, je donne ma tesla modèle S à celui qui la veut");
        $pub3->setEmail('saminsa602@gmail.com');
        $pub3->setLocalisation($em->merge($this->getReference('localisation-rennes')));
        $pub3->setExpiresAt(new \DateTime('now + 30days'));
        $pub3->setIsActivated(true);
        $pub3->setIsAnOffer(true);
        $pub3->setIsPublic(true);
        $pub3->setPrice(0);
        $pub3->setToken('tesla');
        $pub3->setUpdatedAtValue();


        $em->persist($pub1);
        $em->persist($pub2);
        $em->persist($pub3);

        $em->flush();


    }

    public function getOrder()
    {
        return 3; // the order in which fixtures will be loaded
    }
}