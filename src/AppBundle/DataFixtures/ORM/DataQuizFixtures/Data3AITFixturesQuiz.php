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