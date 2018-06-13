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

class Data3AITFixturesQuiz extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
        $category = $this->getReference('category 3met');
        $questions = array();

        $question = (new Question())
            ->setTitle(' Types de programmation utilisé dans le domaine de l\'Intelligence Artificielle ')
            ->setText('Parmis ces affirmation les qu\'elles sont correct ?')
            ->setResponses(array(
                'La programmation par action est utilisé dans la plupart des programmes,',
                'La programmation par action n\'est pas utilisé dans la plupart des programmes ',
                'La programmation par relations est utilisé dans les bases de données',
                'La programmation par relations n\'est pas utilisé dans les bases de données'
            ))
            ->setSolution(array(
                0 => true, 2 =>true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Les trois modèles d’expressions utilisé en programmation fonctionnelle')
            ->setText('Quelles sont les trois modèles d’expressions utilisé en programmation fonctionnelle ?')
            ->setResponses(array(
                'L\'expression fonctionnelle',
                'Conditionnelle ',
                'Itérative ',
                'Récursive',
            ))
            ->setSolution(array(
                0=> true, 1=>true, 3 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Significations de O et O (remplie de noir) en Intellignece Artificielle ')
            ->setText('Que signifie O et O (remplie de noir)  ?')
            ->setResponses(array(
                'Le O signifie que l\'on ajoute un élément au début de la list qu\'il prend en paramètre, et le noir ajoute un élément à la fin de la list.b ',
                'Le O signifie que l\'on enléve  un élément au début de la list qu\'il prend en paramètre, et le noir enléve un élément à la fin de la list.b ',
                'Le O signifie que l\'on ajoute un élément au début de la list qu\'il prend en paramètre, et le noir enléve un élément à la fin de la list.b ',
                'Le O signifie que l\'on enléve un élément au début de la list qu\'il prend en paramètre, et le noir ajoute un élément à la fin de la list.b ',
            ))
            ->setSolution(array(
                0 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Fonction premier 3AIT')
            ->setText('La fonction "premier" permet de : ')
            ->setResponses(array(
                'Retourner le premier élément d\'une scéquence',
                'Retourner le premier élément d\'une scéquence en l\'enlevant',
                'Retourner la scéquence sans son dernier élément',
            ))
            ->setSolution(array(
                0 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Fonction Debut 3AIT')
            ->setText('La fonction Début permet de :')
            ->setResponses(array(
                'récupérer seulement le premier élémente de la séquence ',
                'récupérer la scéquence sans le dernier élément',
            ))
            ->setSolution(array(
                1 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;


        $question = (new Question())
            ->setTitle('Analyse par cas 3AIT')
            ->setText(' Qu\'est-ce aue l\'analyse par cas  :')
            ->setResponses(array(
                'L’analyse par cas est une soustraction du problème en sous problème plus simple à résoudre',
                'L’analyse par cas est une division du problème en sous problème plus simple à résoudre',
            ))
            ->setSolution(array(
                1 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Modéles d\'écriture 3AIT')
            ->setText(' Quel sont les 2 modéles d\'écritures possible visant à faciliter l\'apprentissage du programme ? ')
            ->setResponses(array(
                'Ecriture au sens de constructeur et  écriture au sens de selecteur',
                'Ecriture au sens de séquence et  écriture au sens de selecteur',
                'Ecriture au sens de constructeur et  écriture au sens de séquence',
            ))
            ->setSolution(array(
                0 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Garbage collector 3AIT')
            ->setText(' Le langage Lisp posséde t\'il un garbage collector ? ')
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
            ->setTitle('Systéme expert 3AIT')
            ->setText(' Qu\'est-ce qu\'un systéme expert ? ')
            ->setResponses(array(
                'Le système expert est le coeur du programme, il se compose des régles "metier" permettant le bon fonctionnement du programme',
                'Le système expert est un logiciel permettant de définir toute les possibilité d\'un programme',
                'Le système expert est un logiciel expert dans son domaine, il se compose de faits, de règles et du moteur d’inférence',
            ))
            ->setSolution(array(
                2 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;



        $question = (new Question())
            ->setTitle('Liste des faits 3AIT')
            ->setText(' Qu\'est-ce que la liste des faits ? ')
            ->setResponses(array(
                'La liste de toute les possiblité du programme',
                'Un historique de tout le fonctionnement du programme',
                'Des Logs',
                'La liste des situations type dont on connaît l’issue',
            ))
            ->setSolution(array(
                3 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;


        $question = (new Question())
            ->setTitle('Liste des faits 3AIT')
            ->setText(' Qu\'est ce que le moteur d’inférence ?')
            ->setResponses(array(
                'Un raisonnement se basant sur des réponses antérieur pour en déduire un résultat ',
                'Un raisonnement de notre algorithme, nous exploitons notre base de connaissances en liant nos faits et nos régles',
                'Un raisonnement permettant ce basant uniquement sur la déduction',
            ))
            ->setSolution(array(
                1 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;


        $question = (new Question())
            ->setTitle('Liste des régles 3AIT')
            ->setText(' Qu\'est ce que la liste des régles ?')
            ->setResponses(array(
                'Une liste de contrainte, permettant de construire notre programme ',
                'Une liste de régles que notre programme doit respecter pour être utilisé',
                'Une liste de régles qui va permettre au programme de déduire un résultat',
                'Une liste de règles, sont des lois à respecter par l\'algorithme pour déduire de nouveaux faits',
            ))
            ->setSolution(array(
                3 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;


        $question = (new Question())
            ->setTitle('Chainage avant 3AIT')
            ->setText(' Qu\'est ce que le chainage avant ?')
            ->setResponses(array(
                'Le chaînage avant correspond à un raisonnement qui part de fait pour en déduire une règle grâce à une conclusion',
                'Le chaînage avant correspond à un parcours des possibilités de haut en bas pour arriver à une conclusion',
                'Le chaînage avant correspond à une déduction d\'une conclusion par la liste des faits',
            ))
            ->setSolution(array(
                0 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Chainage arrière 3AIT')
            ->setText(' Qu\'est ce que le chainage avant ?')
            ->setResponses(array(
                'Le chaînage arrière correspond à un raisonnement qui part de la conclusion pour en déduire une règle grâce à un fait inconnu',
                'Le chaînage arrière correspond à un raisonnement qui part de la conclusion pour en déduire une règle grâce à un fait connu',
                'Le chaînage arrière correspond à un parcours des possibilités de bas en haut pour arriver à une conclusion',
            ))
            ->setSolution(array(
                1 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;


        $name = FixturesTools::saveFileFromLink(
            'http://www.gettingsmart.com/wp-content/uploads/2017/09/artificial-intelligence-education.jpg',
            'jpg',
            $this->container->getParameter('vich_upload_images_folder'
            )
        );

        $quiz
            ->setTitle('QCM AIT révision de 3éme année')
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

        $this->addReference('quiz AIT', $quiz);
        $manager->persist($quiz);

        $manager->flush();
    }

    public function getOrder()
    {
        return 200;
    }
}