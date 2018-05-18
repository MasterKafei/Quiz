<?php
/**
 * Created by PhpStorm.
 * User: belot
 * Date: 03/04/2018
 * Time: 10:16
 */

namespace AppBundle\DataFixtures\ORM;
use AppBundle\Entity\Answer;
use AppBundle\Entity\Quiz;
use AppBundle\Entity\User;
use AppBundle\Entity\Question;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class DataAnswerFixtures extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        /** @var Quiz $quiz */
        $quiz = $this->getReference('quiz ITIL');

        $users = array();
        $users[] = $this->getReference('user masterkafei');
        $users[] = $this->getReference('user nunutte');
        $users[] = $this->getReference('user hundil');
        $users[] = $this->getReference('user craaftx');
        $users[] = $this->getReference('user nerva');
        $users[] = $this->getReference('user masterluiges');

        $questions = $quiz->getQuestions();

        foreach ($users as $user) {
            foreach ($questions as $question) {
                $responses = $question->getResponses();
                $numAns = count($responses);
                $choice = rand(1, $numAns);
                $answer = new Answer($question);
                $answer->setUser($user);
                $values = array();
                for($i = 0; $i < $choice; ++$i) {
                    $pickValue = array_rand($responses);
                    array_push($values, $pickValue);
                    unset($responses[$pickValue]);

                }
                $answer->setValue($values);
                $manager->persist($answer);
            }
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 300;
    }
}