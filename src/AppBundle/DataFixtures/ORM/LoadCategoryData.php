<?php
/**
 * Creations de quelques entités pour ltest
 * User: apple
 * Date: 13/04/2017
 * Time: 17:06
 */
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\Category;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $em)
    {
        $emploi = new Category();
        $emploi->setName('Emploi');

        $locationImmo = new Category();
        $locationImmo->setName('Location immobiliére');

        $venteImmo = new Category();
        $venteImmo->setName('Vente immobiliére');

        $voiture = new Category();
        $voiture->setName('Voiture');

        $em->persist($emploi);
        $em->persist($locationImmo);
        $em->persist($venteImmo);
        $em->persist($voiture);

        $em->flush();

        $this->addReference('category-emploi', $emploi);
        $this->addReference('category-locationImmo', $locationImmo);
        $this->addReference('category-venteImmo', $venteImmo);
        $this->addReference('category-voiture', $voiture);
    }

    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}