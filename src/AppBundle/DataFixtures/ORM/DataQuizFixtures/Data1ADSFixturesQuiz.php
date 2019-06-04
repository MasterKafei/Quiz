<?php
/**
 * Created by PhpStorm.
 * User: Paul
 * Date: 07/08/2018
 * Time: 12:23
 */

namespace AppBundle\DataFixtures\ORM\DataQuizFixtures;


use AppBundle\DataFixtures\ORM\FixturesTools;
use AppBundle\Entity\Question;
use AppBundle\Entity\Quiz;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Data1ADSFixturesQuiz extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @param ContainerInterface|null $container
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $quiz = new Quiz();
        $category = $this->getReference('category 1ads');
        $questions = array();

        $question = (new Question())
            ->setTitle('L\'algorithme')
            ->setText('Parmis ces affirmations les qu\'elles sont correctes ?')
            ->setResponses(array(
                'Un algorithme est un schéma de calcul',
                'Un algorithme est une suite d\'instructions',
                'Un algorithme permet de faire des calculs',
            ))
            ->setSolution(array(
                1 => true, 2 =>true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Python')
            ->setText('Python est un langage : ')
            ->setResponses(array(
                'Compilé',
                'Interprété',
                'De bas niveau',
                'De haut niveau'
            ))
            ->setSolution(array(
                1 => true, 3 =>true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Python')
            ->setText('Quelles sont les branches principales de Python ?')
            ->setResponses(array(
                '1.x',
                '2.x',
                '3.x',
                '4.x'
            ))
            ->setSolution(array(
                1 => true, 2 =>true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Python')
            ->setText('Dans la norme de l\'encodage des caractères en Python 3 "unicode" est une séquence : ')
            ->setResponses(array(
                'De 1 à 4 bits',
                'De 1 à 8 bits',
                'De 1 à 4 octets',
                'De 1 à 8 octets'
            ))
            ->setSolution(array(
                2 => true
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Python')
            ->setText('La norme de l\'encodage des caractères en Python 3 est : ')
            ->setResponses(array(
                'UTC-4',
                'UTC-8',
                'UTF-4',
                'UTF-8'
            ))
            ->setSolution(array(
                3 =>true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $name = FixturesTools::saveFileFromLink(
            'https://www.devapp.it/wordpress/wp-content/uploads/2017/01/Python-642x336.png',
            'jpg',
            $this->container->getParameter('vich_upload_images_folder'
            )
        );

        $quiz
            ->setTitle('QCM ADS révision de 1ère année')
            ->setDescription('Questionnaire révision')
            ->setCategory($category)
            ->setQuestions($questions)
            ->setMarks(array())
            ->setValidationDate(new \DateTime())
            ->setValidate(true)
            ->setSubmitted(true)
            ->setResettable(true)
            ->setImagePath($name)
        ;

        $this->addReference('quiz ADS', $quiz);
        $manager->persist($quiz);

        $manager->flush();
    }

    public function getOrder()
    {
        return 200;
    }
}
