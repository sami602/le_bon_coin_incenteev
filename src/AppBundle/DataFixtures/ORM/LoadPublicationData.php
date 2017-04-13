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
        $pub1->setPrice(100000);
        $pub1->setToken('emploi_incentive');
        $pub1->setUpdatedAtValue();


        $em->persist($pub1);

        $em->flush();


    }

    public function getOrder()
    {
        return 3; // the order in which fixtures will be loaded
    }
}