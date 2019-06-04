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

class Data3APLFixturesQuiz extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
        $category = $this->getReference('category 3apl');
        $questions = array();


        $question = (new Question())
            ->setTitle('Extension fichier Swift')
            ->setText('Quelle est l\'extension d\'un fichier Swift ?')
            ->setResponses(array(
                '.sft',
                '.swt',
                '.swft',
                '.swift',
            ))
            ->setSolution(array(
                3=> true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Fichier d\'entrer d\'un programme en Swift')
            ->setText('Quelle est le fichier d\'entrer d\'un programme en Swift')
            ->setResponses(array(
                'start.swift',
                'app.swift',
                'main.swift',
                'launch.swift',
            ))
            ->setSolution(array(
                2 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Swift typé')
            ->setText('Le Swift est-il typé ?')
            ->setResponses(array(
                'Oui',
                'Non',
            ))
            ->setSolution(array(
                0 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('constante')
            ->setText('Comment déclare-t-on une constante ?')
            ->setResponses(array(
                'const',
                'let',
                'var',
                'constant.',
            ))
            ->setSolution(array(
                1 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Playground')
            ->setText('Qu\'est ce que le Playground ?')
            ->setResponses(array(
                'Le fichier de configuration principal d\'un projet Swift.',
                'Le fichier des dépendance d\'un projet Swift.',
                'Une interface utilisateur pour éxécuter du code en direct.',
            ))
            ->setSolution(array(
                2=> true,
            ))
            ->setQuiz($quiz);


        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Térnaire')
            ->setText('Qu\'est-ce qu\'une opération térnaire ?')
            ->setResponses(array(
                'Un algorythme de récupération d\'information.',
                'Une ligne de code qui permets de tester une condition et d\'en récupérer le résultat.',
                'Une simple condition.',
                'Un test en temp réel dans le Playground.',
            ))
            ->setSolution(array(
                1 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;


        $question = (new Question())
            ->setTitle('Compound type')
            ->setText('Qu\'est-ce Qu\'un Compound type ?')
            ->setResponses(array(
                'Un type de données utilisé pour le persist en BDD.',
                'Un type permettant de créér des attributs.',
                'Un type composite qui ne possède pas de nom et est déclaré dans Swift.',
                'Un type particulier pour l\'héritage.',
            ))
            ->setSolution(array(
                2 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;


        $question = (new Question())
            ->setTitle('Signification ?')
            ->setText('Que signifie le ? dérriére une variable :')
            ->setResponses(array(
                'Pour pour réaliser une opération ternaire',
                'Pour indiquer qu\'une variable peut-être nullable (nil).',
                'Pour indiquer qu\'une variable ne peut pas êst nullable.',
                'Pour indiquer qu\'une variable à possède une valeur par défaut.',
            ))
            ->setSolution(array(
                1 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;



        $question = (new Question())
            ->setTitle('Signification !')
            ->setText('Que signifie ! dérriére une variable :')
            ->setResponses(array(
                'Le ! indique que la variable contient nil si elle n\'est pas initialisée mais lorsqu\'elle est utilisée on lui applique automatiquement une valeur.',
                'Le ! indique que la variable contient déja une valeur par défaut lorsqu\'elle est utilisé on lui applique la nouvelle valeur.',
                'Le ! indique que la variable contient nil si elle est initialisée mais lorsqu\'elle est utilisée on lui applique la nouvelle valeur.',
                'Le ! indique que la variable contient déja une valeur lorsqu\'elle est utilisée on ne lui applique pas la nouvelle valeur.',
            ))
            ->setSolution(array(
                0 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Selector')
            ->setText('Est-il possible de définir une valeur par défaut pour un paramètre de fonction ?')
            ->setResponses(array(
                'Oui.',
                'Non.',


            ))
            ->setSolution(array(
                0 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;


        $name = FixturesTools::saveFileFromLink(
            'http://images.frandroid.com/wp-content/uploads/2017/08/swift-logo.jpg',
            'jpg',
            $this->container->getParameter('vich_upload_images_folder')
        );

        $quiz
            ->setTitle('QCM 3APL révision de 3ème année')
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

        $this->addReference('quiz 3apl', $quiz);
        $manager->persist($quiz);

        $manager->flush();
    }

    public function getOrder()
    {
        return 200;
    }
}