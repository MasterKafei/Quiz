<?php

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\User;
use AppBundle\Entity\UserGroup;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class DataGroupFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $group = new UserGroup();

        /** @var User[] $users */
        $users = array();
        $users[] = $this->getReference('user masterluiges');

        foreach($users as $user)
        {
            $groups = $user->getGroups();
            $groups[] = $group;
            $user->setGroups($groups);
            $manager->persist($user);
        }

        $group
            ->setName('A.Sc1')
            ->setDescription('Première année de l\'école Supinfo')
            ->setUsers($users);

        $manager->persist($group);

        $group = new UserGroup();

        /** @var User[] $users */
        $users = array();

        foreach($users as $user)
        {
            $groups = $user->getGroups();
            $groups[] = $group;
            $user->setGroups($groups);
            $manager->persist($user);
        }

        $group
            ->setName('A.Sc2')
            ->setDescription('Deuxième année de l\'école Supinfo')
            ->setUsers($users);

        $manager->persist($group);

        $group = new UserGroup();

        /** @var User[] $users */
        $users = array();
        $users[] = $this->getReference('user masterkafei');
        $users[] = $this->getReference('user nunutte');
        $users[] = $this->getReference('user craaftx');
        $users[] = $this->getReference('user hundil');
        $users[] = $this->getReference('user nerva');

        foreach($users as $user)
        {
            $groups = $user->getGroups();
            $groups[] = $group;
            $user->setGroups($groups);
            $manager->persist($user);
        }

        $group
            ->setName('B.Sc')
            ->setDescription('Troisième année de l\'école Supinfo')
            ->setUsers($users);

        $manager->persist($group);

        $group = new UserGroup();

        /** @var User[] $users */
        $users = array();

        foreach($users as $user)
        {
            $groups = $user->getGroups();
            $groups[] = $group;
            $user->setGroups($groups);
            $manager->persist($user);
        }

        $group
            ->setName('M.Sc1')
            ->setDescription('Quatrième année de l\'école Supinfo')
            ->setUsers($users);

        $manager->persist($group);

        $group = new UserGroup();

        /** @var User[] $users */
        $users = array();

        foreach($users as $user)
        {
            $groups = $user->getGroups();
            $groups[] = $group;
            $user->setGroups($groups);
            $manager->persist($user);
        }

        $group
            ->setName('M.Sc2')
            ->setDescription('Cinquième année de l\'école Supinfo')
            ->setUsers($users);

        $manager->persist($group);
        $manager->flush();
    }

    public function getOrder()
    {
        return 300;
    }
}
