<?php

namespace AppBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 */
class User implements UserInterface, \Serializable
{
    const ROLE_USER = "ROLE_USER";
    const ROLE_USER_SUBSCRIBER = "ROLE_USER_SUBSCRIBER";
    const ROLE_ADMIN = "ROLE_ADMIN";
    const ROLE_SUPER_ADMIN = "ROLE_SUPER_ADMIN";

    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $idBooster;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $email;

    /**
     * @var array
     */
    private $roles;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $plainPassword;

    /**
     * @var string
     */
    private $salt;

    /**
     * @var bool
     */
    private $enabled;

    /**
     * @var string
     */
    private $token;

    /**
     * @var string
     */
    private $forgotPasswordToken;

    /**
     * @var UserGroup[]
     */
    private $groups;

    /**
     * @var Answer[]
     */
    private $answers;

    /**
     * @var Contribution.
     */
    private $contributions;



    public function __construct()
    {
        $this->salt = $this->salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
        $this->roles = array();
        $this->enabled = false;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get idBooster
     *
     * @return int
     */
    public function getIdBooster()
    {
        return $this->idBooster;
    }

    /**
     * Set idBooster
     *
     * @param $idBooster
     * @return $this
     */
    public function setIdBooster($idBooster)
    {
        $this->idBooster = $idBooster;

        return $this;
    }

    public function getUsername()
    {
        return $this->getEmail();
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set roles
     *
     * @param array $roles
     *
     * @return User
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Get roles
     *
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set plainPassword
     *
     * @param $plainPassword
     * @return User
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
        return $this;
    }

    /**
     * Get plainPassword
     *
     * @return string
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * Erase credentials
     */
    public function eraseCredentials()
    {
        $this->plainPassword = null;
    }

    /**
     * Get salt
     *
     * @return null
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set salt
     *
     * @param $salt
     * @return $this
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
        return $this;
    }

    /**
     * Is enabled
     *
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set enabled
     *
     * @param $enabled
     * @return User
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set token
     *
     * @param string $token
     *
     * @return User
     */
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    /**
     * Get forgot password token
     *
     * @return string
     */
    public function getForgotPasswordToken()
    {
        return $this->forgotPasswordToken;
    }

    /**
     * Set forgot password token
     *
     * @param $token
     * @return $this
     */
    public function setForgotPasswordToken($token)
    {
        $this->forgotPasswordToken = $token;

        return $this;
    }

    /**
     * Get groups
     *
     * @return UserGroup[]
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * Set groups
     *
     * @param UserGroup[] $groups
     *
     * @return User
     */
    public function setGroups($groups)
    {
        $this->groups = $groups;
        return $this;
    }

    /**
     * Get answers
     *
     * @return Answer[]
     */
    public function getAnswers()
    {
        return $this->answers;
    }

    /**
     * Set answers
     *
     * @param Answer[] $answers
     * @return User
     */
    public function setAnswers($answers)
    {
        $this->answers = $answers;
        return $this;
    }

    /**
     * Set contributions
     *
     * @param Contribution[]
     *
     * @return User
     */
    public function setContributions($contributions)
    {
        $this->contributions = $contributions;

        return $this;
    }

    /**
     * Get contributions
     *
     * @return Contribution[]
     */
    public function getContributions()
    {
        return $this->contributions;
    }

    /**
     * @para Contribution[]
     *
     */
    public function addContributions($value)
    {
        $this->contributions[] = $value;
        return $this;
    }


    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->password,
            $this->salt,
            $this->email,
            $this->enabled,
        ));
    }

    /**
     * @param string $serialized
     * @see \Serializable::serialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->password,
            $this->salt,
            $this->email,
            $this->enabled,
            ) = unserialize($serialized);
    }
}

