<?php

namespace AppBundle\Form\Model\UserGroup;

use AppBundle\Entity\User;

class AddUserModel
{

    /**
     * @var User
     */
    private $user;

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     *
     * @return AddUserModel
     */
    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }
}
