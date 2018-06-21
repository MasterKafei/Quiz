<?php

namespace AppBundle\Form\Model\ForgotPassword;


class RequestNewPasswordModel
{
    /**
     * @var integer
     */
    private $idBooster;

    /**
     * Get idBooster.
     *
     * @return integer
     */
    public function getIdBooster()
    {
        return $this->idBooster;
    }

    /**
     * Set idBooster.
     *
     * @param integer $idBooster
     * @return RequestNewPasswordModel
     */
    public function setIdBooster($idBooster)
    {
        $this->idBooster = $idBooster;

        return $this;
    }

}
