<?php

namespace AppBundle\DataFixtures\ORM\DataQuizFixtures;


use AppBundle\DataFixtures\ORM\FixturesTools;
use AppBundle\Entity\Question;
use AppBundle\Entity\Quiz;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Entity\File;

class Data3WEBFixturesQuiz extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
        $category = $this->getReference('category 3web');
        $questions = array();


        $question = (new Question())
            ->setTitle('Lien complet barre d\'addresse 3web')
            ->setText('Qu\'elle est le nom exact de l\'addresse compléte, pour accéder à une ressource?')
            ->setResponses(array(
                'Uniform Resource Locator',
                'Uniform Resource Identifier',
                'Uniform Resource Name',
            ))
            ->setSolution(array(
                1=> true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Signification REST 3web ')
            ->setText('Que signifie REST ?')
            ->setResponses(array(
                'Resource State Transfer',
                'Representational State Transfer',
                'Resource Service Transfer',
                'Representational Service Transfer',
            ))
            ->setSolution(array(
                1 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Code 1xx 3web')
            ->setText('Le code  1xx en web indique une redirection :')
            ->setResponses(array(
                'Vrai',
                'Faux',
            ))
            ->setSolution(array(
                1 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('widget 3web')
            ->setText('Qu\'est - ce qu\'un widget ')
            ->setResponses(array(
                'Un widget est un morceau de code permettant de modifier la page via des controls utilisateur. ',
                'Un widget est un morceau de code apportant des controls plus complex combinant du HTML et des scripts.',
                'Un widget est un morceau de code permettant d\'afficher plus d\'information à l\'utilisateur.',
                'Un widget est un morceau de code permettant d\'améliorer l\'epérience utilisateur sur un site web.',
            ))
            ->setSolution(array(
                1 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Sigle ARIA 3web')
            ->setText('Que signifie ARIA ? :')
            ->setResponses(array(
                'Accessible Rich Internet Application',
                'Accessible Resource Internet Application',
                'Applicable Rich Intent Application',
                'Applicable Resource Internet Application',
            ))
            ->setSolution(array(
                1 => true,
            ))
            ->setQuiz($quiz);


        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Microdata 3web')
            ->setText('A quoi servent les Microdata :')
            ->setResponses(array(
                'Les Microdatas permettent d\'allerger la page web afficher.',
                'Les Microdatas permettent de recupérer des données sur la navigation.',
                'Les Microdatas sont des morceau de ocdes visant à améliorer la navigation.',
                'Les mMcrodatas sont des morceau de code utilisé pour apporter des informations sur une page qui est interprété par les navigateurs, les moteurs de recherche, les bot etc.',
            ))
            ->setSolution(array(
                3 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;


        $question = (new Question())
            ->setTitle('drag & drop 3web')
            ->setText('Le drag & drop est une fonctionnalité des sites web, permettant de modifier la position d’un élément avec son curseur. :')
            ->setResponses(array(
                'Vrai',
                'Faux',
            ))
            ->setSolution(array(
                0 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;


        $question = (new Question())
            ->setTitle('Code 3xx 3web')
            ->setText('Le code 3xx en web indique une information :')
            ->setResponses(array(
                'Vrai',
                'Faux',
            ))
            ->setSolution(array(
                1 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;



        $question = (new Question())
            ->setTitle('Sigle API 3web')
            ->setText('Que signifie API ? :')
            ->setResponses(array(
                'Application Programming Interface.',
                'Accessible Programming Interface.',
                'Accessible Program Internet.',
                'Application Program Internet.',
            ))
            ->setSolution(array(
                0 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Selector 3web')
            ->setText('Qu\'elle est la syntax exact d\'un selecteur ?')
            ->setResponses(array(
                '{&=}.',
                '(&=)',
                '[&=]',
                '<&=>',

            ))
            ->setSolution(array(
                2 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;


        $name = FixturesTools::saveFileFromLink(
            'https://www.hostpapa.com/blog/wp-content/uploads/2013/08/pqzvkdbe_HTML5-Present-Past-and-Future.jpg',
            'jpg',
            $this->container->getParameter('vich_upload_images_folder'
            )
        );

        $quiz
            ->setTitle('QCM 3MSA révision de 3éme année')
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

        $this->addReference('quiz 3web', $quiz);
        $manager->persist($quiz);

        $manager->flush();
    }

    public function getOrder()
    {
        return 200;
    }
}