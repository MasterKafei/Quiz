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

class Data3MGTFixturesQuiz extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
        $category = $this->getReference('category 3mgt');
        $questions = array();

        $question = (new Question())
            ->setTitle('CIO')
            ->setText('Qu\'est ce que signifie CIO ?')
            ->setResponses(array(
                'Chief Information Officer',
                'Chief Information Operation',
                'Certificate Information Officer',
                'Certificate Information Operation',
            ))
            ->setSolution(array(
                0 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle(' Service IT')
            ->setText('Le service IT Operation et infrastructure est responsable de la maintenance du parc informatique, l\'application développement et support garde les applications à jour.')
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
            ->setTitle('Champs services IT')
            ->setText('Quels sont les champs d’applications du service IT  ?')
            ->setResponses(array(
                'La sécurité',
                'La messagerie',
                'La mise à jour des applications',
                'Contrôler le changement',
                'Le monitoring du système',
                'La gestion des utilisateur',
                'Régler les problèmes',
            ))
            ->setSolution(array(
                0=> true,
                1=> true,
                3=> true,
                4=> true,
                6=> true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Operations et gestion de projets')
            ->setText('Quelle est la différence entre la gestion d\'opérations et la gestion de projet ?')
            ->setResponses(array(
                ' Les projet sont uniques, possèdent une date de début et de fin  alors que les opérations sont des actions répétitives qui peuvent être industrialisée. ',
                ' Les opérations sont uniques, possèdent une date de début et de fin  alors que les opérations sont des actions projet qui peuvent être industrialisée. ',
            ))
            ->setSolution(array(
                0 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Definition projet')
            ->setText('Un projet est la réalisation d’un contenu de maniére répétitive sans définition des moyens et des ressources nécessaire à sa réalisation.')
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
            ->setTitle('but d\'un projet')
            ->setText('Quelle est le but d’un projet ?')
            ->setResponses(array(
                'Un projet doit être obligatoirement réaliser au sein de l\'entreprise.',
                'un projet doit forcément rapporter de l\'argent à l\'entreprise.',
                'Un projet doit apporter un avantage à l\'entreprise, créer un nouveau produit ou un service, modifier un processus ou résoudre un problème.',
                'Un projet doit permettre à l\'entreprise de se diversifier et d\'évoluer dans son domaine.',
            ))
            ->setSolution(array(
                2 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Signification PMI')
            ->setText('Que signifie le PMI ?')
            ->setResponses(array(
                'Project Management Institute.',
                'Program Management Information.',
                'Project Management Information.',
                'Program Management Institute.',
            ))
            ->setSolution(array(
                0 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;


        $question = (new Question())
            ->setTitle('Liste des faits')
            ->setText('Le PMI c\'est l\'application des connaissances, des techniques outils pour la réalisations d’activités.')
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
            ->setTitle('PMI')
            ->setText('Les 5 phases du PMI sont constitué de :')
            ->setResponses(array(
                'Conception et initialisation du projet',
                'Définition et planification du projet',
                'Réalisation du projet',
                'Fermeture du projet',
                'Lancement et exécution du projet',
                'Test du projet',
                'Performance et control du projet',
                'Livraison du projet',
            ))
            ->setSolution(array(
                0 => true,
                1 => true,
                3 => true,
                4 => true,
                6 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;



        $name = FixturesTools::saveFileFromLink(
            'http://img.over-blog-kiwi.com/1/66/06/90/20160213/ob_a93879_management-participatif.png',
            'jpg',
            $this->container->getParameter('vich_upload_images_folder'
            )
        );

        $quiz
            ->setTitle('QCM MGT révision de 3éme année')
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

        $this->addReference('quiz MGT', $quiz);
        $manager->persist($quiz);

        $manager->flush();
    }

    public function getOrder()
    {
        return 200;
    }
}