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

class Data3ASPFixturesQuiz extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
        $category = $this->getReference('category 3asp');
        $questions = array();


        $question = (new Question())
            ->setTitle('Signification ASP')
            ->setText('Que signifie ASP ?')
            ->setResponses(array(
                'Application Server Page',
                'Application Secure Page',
                'Active Secure Page',
                'Active Server Page',
            ))
            ->setSolution(array(
                3=> true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;


        $question = (new Question())
            ->setTitle('Fichier ASPX ')
            ->setText('Qu\'est ce qu\'un fichier ASPX ? ?')
            ->setResponses(array(
                'Un fichier de configuration d\'une page ASP',
                'Un fichier de construction de la vue d\'une page ASP',
                'Un fichier ce déclaration de namespace d\'une page ASP',
                'Un fichier d\'information de la vue. ' ,
            ))
            ->setSolution(array(
                1 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Différence entre ASPX et ASPX.cs')
            ->setText(' En WebForms quel est la différence entre un fichier .ASPX et un fichier .ASPX.CS ?')
            ->setResponses(array(
                'Un fichier ASPX permet de définir la namespace de la vue, tandis qu\'un fichier ASPX.cs permer de créé la vue grace à du XAML',
                'Un fichier ASPX permet de réaliser les règles métier de la vue, tandis qu\'un fichier ASPX.cs permer de créér la vue grace à du XAML',
                'Un fichier ASPX permet de défnir la vue, tandis qu\'un fichier ASP.cs permet de définir le code behind de la vue',
                'Un fichier ASPX permet de défnir la vue, tandis qu\'un fichier ASP.cs permet de configurer la vue, les dépendances, vue partielle etc.',
            ))
            ->setSolution(array(
                2 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('runat="server"')
            ->setText('A quoi sert le runat=”server” ')
            ->setResponses(array(
                'Permet de dire à la page d\'exécuter la balise coté serveur (codeBehind).',
                'Permet de forcer l\'exécution serveur.',
                'Permet de dire à la page que tel méthode doit être exécuter coté serveur .',
                'Permet de définir une page sur le serveur.',
            ))
            ->setSolution(array(
                0 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Cycle d\'événnement')
            ->setText('Quels sont les différents cycle d\'évènements ?')
            ->setResponses(array(
                'doInBackground et onPostExecute',
                'onCreate et onExecute',
                'PostBack et Callback',
                'onPostBack et onCallBack',
            ))
            ->setSolution(array(
                1 => true,
            ))
            ->setQuiz($quiz);


        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Fichier de Définitions des routes')
            ->setText('Dans quel fichier définit-on les routes ?')
            ->setResponses(array(
                'Routes.xml.',
                'Routes.cs.',
                'Global.asax.',
                'Global.cs.',
            ))
            ->setSolution(array(
                2 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;


        $question = (new Question())
            ->setTitle('Entity Framework')
            ->setText('Qu\'est ce que entity Framework :')
            ->setResponses(array(
                'La classe mère de toute les vues ASP',
                'Le nom du serveur pour les pages asp.net',
                'Un ORM (Onject Relational Mapping)',
                'Un le moteur d\'asp.net',
            ))
            ->setSolution(array(
                2 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;


        $question = (new Question())
            ->setTitle('CRUD')
            ->setText('Qu\'est ce que le CRUD ?')
            ->setResponses(array(
                'Un patron d\'architecture.',
                'Un ensembe de règles à respecter',
                'Ce sont les actions de base qui doivent être implémenter entre l\'application et les entitées.',
                'Ce sont les actions de base qui doivent être dans les entitées.',

            ))
            ->setSolution(array(
                2 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;



        $question = (new Question())
            ->setTitle('Vue partielle')
            ->setText('Les vues partielles sont des vues dans des vues, la vue parent appelle les vues enfant.')
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
            ->setTitle('Les layouts')
            ->setText(' Qu\'est ce que le principe des Layouts ?')
            ->setResponses(array(
                'C\'est le nom d\'une page asp.',
                'C\'est la fabrication d\'une page à partir de vue partiel.',
                'C\'est la relation entre la vue et le code behind.',
                'C\'est le nom du fonctionnement de chaque page cshtml.',
            ))
            ->setSolution(array(
                1 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;


        $name = FixturesTools::saveFileFromLink(
            'https://3.bp.blogspot.com/-K2PPRDLJGus/WWaKcHtQAZI/AAAAAAAABZQ/--rfcnAodIYkElKlPk1iTnms9A36A5mWQCLcBGAs/s1600/icon-aspnetmvc.png',
            'jpg',
            $this->container->getParameter('vich_upload_images_folder'
            )
        );

        $quiz
            ->setTitle('QCM 3ASP révision de 3éme année')
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

        $this->addReference('quiz 3asp', $quiz);
        $manager->persist($quiz);

        $manager->flush();
    }

    public function getOrder()
    {
        return 200;
    }
}