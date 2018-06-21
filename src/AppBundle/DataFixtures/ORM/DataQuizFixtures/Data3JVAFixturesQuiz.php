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

class Data3JVAFixturesQuiz extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
        $category = $this->getReference('category 3jva');
        $questions = array();

        $question = (new Question())
            ->setTitle('Servlet ')
            ->setText('Qu\'est ce qu\'une Servlet ?')
            ->setResponses(array(
                'Une classe permettant de gérer dynamiquement des requêtes et leurs réponses souvent utilisées pour un serveur web',
                'Une methode permettant de gérer dynamiquement des requêtes et leurs réponses souvent utilisées pour un serveur web',
                'Un attribut permettant de gérer dynamiquement des requêtes et leurs réponses souvent utilisées pour un serveur web',
                'Une interface permettant de gérer dynamiquement des requêtes et leurs réponses souvent utilisées pour un serveur web',
            ))
            ->setSolution(array(
                0 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Servlet')
            ->setText('Qu\'est ce qu\'une Servlet Container ?')
            ->setResponses(array(
                'C\'est un service implémentant les contraintes d’un composant web d’architecture JEE.',
                'C\'est une application implémentant les contraintes d’un composant web d’architecture JEE.',
                'C\'est un web Container implémentant les contraintes d’une application Java.',
                'C\'est un web Container implémentant les contraintes d’un composant web d’architecture JEE.',
            ))
            ->setSolution(array(
                3 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('JSP')
            ->setText('Que signifie JSP ?')
            ->setResponses(array(
                'Java Server Program',
                'Java Source Program',
                'Java Server Page',
                'Java Source Page',
            ))
            ->setSolution(array(
                2=> true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Significations EL')
            ->setText('Que signifie EL ?')
            ->setResponses(array(
                'Expression Language',
                'Expression List',
                'Expression Linear',
                'Enterprise Language',
            ))
            ->setSolution(array(
                0 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('JAVABean')
            ->setText('Qu\'est-ce qu\'une JavaBean ?')
            ->setResponses(array(
                'La classe mére des classes Java.',
                'L\'interface des classes Java',
                'Une classe possédant des attributs, les getteurs/setteurs associés et un constructeur par défaut.',
                'Un fichier de classe.',
            ))
            ->setSolution(array(
                2 => true, 3 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('MVC')
            ->setText('Qu\'est ce que MVC ? ')
            ->setResponses(array(
                'Un patron de conception',
                'Un patron d\'architecture',
                'Model View Controller',
                'Model View Conception',
            ))
            ->setSolution(array(
                1 => true,  2 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;


        $question = (new Question())
            ->setTitle('JPA')
            ->setText('Qu\'est-ce qu\'une JPA ?')
            ->setResponses(array(
                'Java Persistence API.',
                'Java Persistence Application.',
                'Un ORM',
                'Un fichier de configuration',
            ))
            ->setSolution(array(
                0 => true, 2 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Signification JPQL')
            ->setText('Que signifie le JPQL ?')
            ->setResponses(array(
                'Java Persistence Query List.',
                'Java Persistence Query Language.',
                'Java Partition Query Language.',
                'Java Partition Query List.',
            ))
            ->setSolution(array(
                0 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;


        $question = (new Question())
            ->setTitle('Signification JSF')
            ->setText('Que signifie le JSF ?')
            ->setResponses(array(
                'Java Server Files.',
                'Java Service Files.',
                'Java Server Faces.',
                'Java Services Faces.',
            ))
            ->setSolution(array(
                2 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;



        $question = (new Question())
            ->setTitle('Liste des faits 3jva')
            ->setText('Les ressources RESTful peuvent prendre plusieurs formes : JSON/XML/HTML. ')
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



        $name = FixturesTools::saveFileFromLink(
            'https://diit.cz/sites/default/files/javaee-logo.png',
            'jpg',
            $this->container->getParameter('vich_upload_images_folder'
            )
        );

        $quiz
            ->setTitle('QCM JVA révision de 3éme année')
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

        $this->addReference('quiz JVA', $quiz);
        $manager->persist($quiz);

        $manager->flush();
    }

    public function getOrder()
    {
        return 200;
    }
}