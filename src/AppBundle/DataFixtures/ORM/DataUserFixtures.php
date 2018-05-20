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
        $users = array();
        $user = new User();

        $user
            ->setIdBooster(227073)
            ->setPlainPassword('toto')
            ->setRoles(array('ROLE_ADMIN'))
            ->setEmail('227073@supinfo.com')
            ->setEnabled(true);

        $this->userBusiness->hashPassword($user);
        $this->userBusiness->generateToken($user, false);

        $this->addReference('user masterkafei', $user);
        array_push($users, $user);
        $manager->persist($user);

        $user = new User();

        $user
            ->setIdBooster(281679)
            ->setPlainPassword('toto')
            ->setRoles(array('ROLE_ADMIN'))
            ->setEmail('281679@supinfo.com')
            ->setEnabled(true);

        $this->userBusiness->hashPassword($user);
        $this->userBusiness->generateToken($user, false);

        $this->addReference('user nunutte', $user);
        array_push($users, $user);
        $manager->persist($user);

        $user = new User();

        $user
            ->setIdBooster(285500)
            ->setPlainPassword('toto')
            ->setRoles(array('ROLE_ADMIN'))
            ->setEmail('285500@supinfo.com')
            ->setEnabled(true);

        $this->userBusiness->hashPassword($user);
        $this->userBusiness->generateToken($user, false);

        $this->addReference('user craaftx', $user);
        array_push($users, $user);
        $manager->persist($user);

        $user = new User();

        $user
            ->setIdBooster(219508)
            ->setPlainPassword('toto')
            ->setRoles(array('ROLE_ADMIN'))
            ->setEmail('219508@supinfo.com')
            ->setEnabled(true);

        $this->userBusiness->hashPassword($user);
        $this->userBusiness->generateToken($user, false);

        $this->addReference('user hundil', $user);
        array_push($users, $user);
        $manager->persist($user);

        $user = new User();

        $user
            ->setIdBooster(281008)
            ->setPlainPassword('toto')
            ->setRoles(array('ROLE_ADMIN'))
            ->setEmail('281008@supinfo.com')
            ->setEnabled(true);

        $this->userBusiness->hashPassword($user);
        $this->userBusiness->generateToken($user, false);

        $this->addReference('user nerva', $user);
        array_push($users, $user);
        $manager->persist($user);

        $user = new User();

        $user
            ->setIdBooster(285541)
            ->setPlainPassword('toto')
            ->setRoles(array('ROLE_USER'))
            ->setEmail('285541@supinfo.com')
            ->setEnabled(true);

        $this->userBusiness->hashPassword($user);
        $this->userBusiness->generateToken($user, false);

        $this->addReference('user masterluiges', $user);
        $manager->persist($user);
        array_push($users, $user);

        $manager->flush();
    }

    public function getOrder()
    {
        return 0;
    }
}
