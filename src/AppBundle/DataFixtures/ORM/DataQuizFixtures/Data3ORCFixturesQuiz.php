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

class Data3ORCFixturesQuiz extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
        $category = $this->getReference('category 3orc');
        $questions = array();


        $question = (new Question())
            ->setTitle('Que fait un DBA')
            ->setText('Un administrateur de base de données installe, crée, configure, crée et installe des archives, gère les base de données et garde les logiciels à jour')
            ->setResponses(array(
                'Vrai',
                'Faux',
            ))
            ->setSolution(array(
                0=> true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Signification SQL ')
            ->setText('Que signifie SQL ?')
            ->setResponses(array(
                'Strict Query Language',
                'Structured Query Language',
                'Simple Query Language',
            ))
            ->setSolution(array(
                1 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('SQL')
            ->setText('Qu’est ce que SQL ?')
            ->setResponses(array(
                'Un langage de programmation',
                'Un langage relationnel de programmation',
                'Un langage de développemment',
                'Un langage informatique de base de données',
            ))
            ->setSolution(array(
                0 => true,
                3 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Systéme de stockage')
            ->setText('Comment est composé le système de stockage')
            ->setResponses(array(
                'De disque de stockage.',
                'Fichier de contrôles.',
                'Fichier de données.',
                'Serveur de stockage.',
                'Fichier de logs des modifications.',
                'Fichier de configuration.',
                'Fichier de mot de passe.',
                'Fichier d\'archives.',
                'Fichier de log des archives.',
            ))
            ->setSolution(array(
                1 => true,
                2 => true,
                4 => true,
                5 => true,
                6 => true,
                8 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Composant de gestion framework Oracle Database 10g')
            ->setText('Quels sont les composants de gestion du framework Oracle Database 10g ?')
            ->setResponses(array(
                'La base de données',
                'Les listeners',
                'L\'infrastructure',
                'L\'interface de gestion',
            ))
            ->setSolution(array(
                0 => true,
                1 => true,
                3 => true,
            ))
            ->setQuiz($quiz);


        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Types de shutdown')
            ->setText('Quels sont les différents types de shutdown ?')
            ->setResponses(array(
                'Abort',
                'Immediate',
                'Fast',
                'Transactional.',
                'Shutdown.',
                'Normal',
            ))
            ->setSolution(array(
                0 => true,
                1 => true,
                3 => true,
                5 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;


        $question = (new Question())
            ->setTitle('TableSpace')
            ->setText('Qu’est ce qu’un tablespace ?')
            ->setResponses(array(
                'Les tablespaces permettent de stocker logiquement les informations',
                'Les tablespaces permettent de stocker logiquement les tables',
                'Les tablespaces permettent de stocker logiquement les base de données',
                'Les tablespaces permettent de stocker logiquement les vues',
            ))
            ->setSolution(array(
                0 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;


        $question = (new Question())
            ->setTitle('Rôles')
            ->setText('Un rôle est un ensemble de permissions possédant un nom qu’on attribue à un utilisateur.')
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
            ->setTitle('Vue')
            ->setText('Qu’est ce qu’une vue?')
            ->setResponses(array(
                'C\'est une représentation d\'une table pour gérer les droits d\'accés aux données.',
                'C\'est une table pour gérer les utilisateurs.',
                'C\'est une représentation d\'une table pour gérer les utilisateurs.',
                'C\'est une table pour gérer les droits d\'accès aux données.',
            ))
            ->setSolution(array(
                0 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Flashback')
            ->setText('Le FlashBack est une technologie de transaction')
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


        $name = FixturesTools::saveFileFromLink(
            'http://www.goodmorningcrowdfunding.com/wp-content/uploads/2017/07/Oracle-logo.png',
            'jpg',
            $this->container->getParameter('vich_upload_images_folder'
            )
        );

        $quiz
            ->setTitle('QCM 3WEB révision de 3éme année')
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

        $this->addReference('quiz 3orc', $quiz);
        $manager->persist($quiz);

        $manager->flush();
    }

    public function getOrder()
    {
        return 200;
    }
}