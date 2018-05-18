<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\User;
use AppBundle\Service\Business\UserBusiness;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class DataUserFixtures extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var UserBusiness
     */
    private $userBusiness;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->userBusiness = $container->get('app.business.user');
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();

        $user
            ->setUsername('MasterKafei')
            ->setFirstName('Jean')
            ->setLastName('Marius')
            ->setPlainPassword('toto')
            ->setRoles(array('ROLE_ADMIN'))
            ->setEmail('masterkafei@doctrina.com')
            ->setEnabled(true);

        $this->userBusiness->hashPassword($user);
        $this->userBusiness->generateToken($user, false);

        $this->addReference('user masterkafei', $user);
        $manager->persist($user);

        $user = new User();

        $user
            ->setUsername('Nunutte')
            ->setFirstName('Olivier')
            ->setLastName('Argentieri')
            ->setPlainPassword('toto')
            ->setRoles(array('ROLE_ADMIN'))
            ->setEmail('nunutte@doctrina.com')
            ->setEnabled(true);

        $this->userBusiness->hashPassword($user);
        $this->userBusiness->generateToken($user, false);

        $this->addReference('user nunutte', $user);
        $manager->persist($user);

        $user = new User();

        $user
            ->setUsername('Craaftx')
            ->setFirstName('Dorian')
            ->setLastName('Guilmain')
            ->setPlainPassword('toto')
            ->setRoles(array('ROLE_ADMIN'))
            ->setEmail('craaftx@doctrina.com')
            ->setEnabled(true);

        $this->userBusiness->hashPassword($user);
        $this->userBusiness->generateToken($user, false);

        $this->addReference('user craaftx', $user);
        $manager->persist($user);

        $user = new User();

        $user
            ->setUsername('Hundil')
            ->setFirstName('Romain')
            ->setLastName('Belot')
            ->setPlainPassword('toto')
            ->setRoles(array('ROLE_ADMIN'))
            ->setEmail('hundil@doctrina.com')
            ->setEnabled(true);

        $this->userBusiness->hashPassword($user);
        $this->userBusiness->generateToken($user, false);

        $this->addReference('user hundil', $user);
        $manager->persist($user);

        $user = new User();

        $user
            ->setUsername('Nerva')
            ->setFirstName('Oulian')
            ->setLastName('Semille')
            ->setPlainPassword('toto')
            ->setRoles(array('ROLE_ADMIN'))
            ->setEmail('nerva@doctrina.com')
            ->setEnabled(true);

        $this->userBusiness->hashPassword($user);
        $this->userBusiness->generateToken($user, false);

        $this->addReference('user nerva', $user);
        $manager->persist($user);

        $user = new User();

        $user
            ->setUsername('MasterLuiges')
            ->setFirstName('Paul')
            ->setLastName('Marius')
            ->setPlainPassword('toto')
            ->setRoles(array('ROLE_USER'))
            ->setEmail('masterluiges@doctrina.com')
            ->setEnabled(true);

        $this->userBusiness->hashPassword($user);
        $this->userBusiness->generateToken($user, false);

        $this->addReference('user masterluiges', $user);
        $manager->persist($user);
        $manager->flush();
    }

    public function getOrder()
    {
        return 0;
    }
}
