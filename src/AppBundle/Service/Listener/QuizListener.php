<?php

namespace AppBundle\Service\Listener;

use AppBundle\Entity\Quiz;
use AppBundle\Service\Util\AbstractContainerAware;
use Doctrine\ORM\Event\LifecycleEventArgs;

class QuizListener extends AbstractContainerAware
{
    /**
     * @param Quiz $quiz
     * @param LifecycleEventArgs $args
     */
    public function prePersist(Quiz $quiz, LifecycleEventArgs $args)
    {
        $quiz->setLastUpdate(new \DateTime());
    }
}
