<?php

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Contributor;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class DataContributorFixtures extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {

        $name = FixturesTools::saveFileFromLink('https://cdn.discordapp.com/attachments/242414823604879360/448222939658059817/unknown.png', 'jpg', $this->container->getParameter('vich_upload_images_folder'));

        $contributor = new Contributor();
        $contributor
            ->setEmail('jean.marius@supinfo.com')
            ->setFirstName('Jean')
            ->setLastName('Marius')
            ->setRole('Developer')
            ->setGithubLink('https://github.com/MasterKafei')
            ->setLinkedinLink('https://www.linkedin.com/in/jean-marius-732b91142/')
            ->setPhotoPath($name);

        $manager->persist($contributor);

        $name = FixturesTools::saveFileFromLink('https://www.campus-booster.net/actorpictures/285500.jpg', 'jpg', $this->container->getParameter('vich_upload_images_folder'));

        $contributor = new Contributor();
        $contributor
            ->setEmail('dorian.guilmain@supinfo.com')
            ->setFirstName('Dorian')
            ->setLastName('Guilmain')
            ->setRole('Integrator')
            ->setGithubLink('https://github.com/Craaftx/')
            ->setLinkedinLink('https://www.linkedin.com/in/dorian-guilmain/')
            ->setPhotoPath($name);

        $manager->persist($contributor);

        $name = FixturesTools::saveFileFromLink('https://www.campus-booster.net/actorpictures/219508.jpg', 'jpg', $this->container->getParameter('vich_upload_images_folder'));

        $contributor = new Contributor();
        $contributor
            ->setEmail('romain.belot@supinfo.com')
            ->setFirstName('Romain')
            ->setLastName('Belot')
            ->setRole('Developer')
            ->setGithubLink('https://github.com/Hundil/')
            ->setLinkedinLink('https://www.linkedin.com/in/romain-belot-b1718511a/')
            ->setPhotoPath($name);

        $manager->persist($contributor);

        $name = FixturesTools::saveFileFromLink('https://cdn.discordapp.com/attachments/427800901575639041/448217187002613791/Photo_didentite_II.jpg', 'jpg', $this->container->getParameter('vich_upload_images_folder'));

        $contributor = new Contributor();
        $contributor
            ->setEmail('oulian.semille@supinfo.com')
            ->setFirstName('Oulian')
            ->setLastName('Semille')
            ->setRole('Web Designer')
            ->setBehanceLink('https://www.behance.net/ouliansemi4522/')
            ->setLinkedinLink('https://www.linkedin.com/in/oulian-semille/')
            ->setPhotoPath($name);

        $manager->persist($contributor);

        $name = FixturesTools::saveFileFromLink('https://cdn.discordapp.com/attachments/427800901575639041/448190481352884244/0.jpg', 'jpg', $this->container->getParameter('vich_upload_images_folder'));

        $contributor = new Contributor();
        $contributor
            ->setEmail('olivier.argentieri@supinfo.com')
            ->setFirstName('Olivier')
            ->setLastName('Argentieri')
            ->setRole('Developer')
            ->setGithubLink('https://github.com/OlivierArgentieri')
            ->setLinkedinLink('https://www.linkedin.com/in/olivier-a-707ab9151/')
            ->setPhotoPath($name);

        $manager->persist($contributor);

        $manager->flush();
    }

    public function getOrder()
    {
        return 0;
    }
}
