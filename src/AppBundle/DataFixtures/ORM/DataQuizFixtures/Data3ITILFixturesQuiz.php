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

class Data3ITILFixturesQuiz extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
            ->setTitle('Modèles de fournitures d’internalisation et d’Externalisation')
            ->setText('Laquelle des propositions suivantes définit CORRECTEMENT les possibilités de modèles de fournitures d’internalisation et d’Externalisation ?')
            ->setResponses(array(
                'L’internalisation repose sur des ressources internes; l’Externalisation repose sur des ressources d’organisation(s) externes',
                'L’internalisation repose sur des ressources d’organisation(s) externes; l’Externalisation repose sur les ressources internes',
                'L’internalisation repose sur du co-sourcing; l’Externalisation repose sur des partenariats',
                'L’internalisation repose sur l’externalisation du processus de connaissances; l’Externalisation repose sur l’acquisition de service d’application'
            ))
            ->setSolution(array(
                0 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Cycle de vie des services')
            ->setText('Apprendre et s’améliorer est la préoccupation PRINCIPALE de quelles phrases du Cycle de vie des services ?')
            ->setResponses(array(
                'Stratégie de services, Conception de services, Transition de services, Exploitation de services et Amélioration continue de services',
                'Stratégie de services, Transition de services et Exploitation des services',
                'Exploitation des services et Amélioration continue des services',
                'Amélioration continue de services',
            ))
            ->setSolution(array(
                3 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Catalogue des services')
            ->setText('Un catalogue des services devrait contenir lequel des suivants ?')
            ->setResponses(array(
                'Evaluer la situation actuelle du business',
                'Procéder à une première évaluation pour comprendre la situation actuelle',
                'S’accorder sur les priorités pour l’amélioration',
                'Créer et vérifier un plan',
            ))
            ->setSolution(array(
                0 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Amélioration Continue des Services')
            ->setText('Quelle est la première activité du modèle de l’Amélioration Continue des Services (CSI) ?')
            ->setResponses(array(
                'Les informations sur les versions de tous les logiciels',
                'La structure organisationnelle de l’entreprise',
                'Les informations sur les actifs',
                'Les détails de tous les services opérationnels',
            ))
            ->setSolution(array(
                3 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Processus d\'Exécution')
            ->setText('Quel est le but du Processus d’Exécution des requêtes ?')
            ->setResponses(array(
                'Se charger des demandes de services en provenance des utilisateurs',
                'S’assurer que toutes les demandes au sein d’une organisation TI soient remplis',
                'S’assurer que les demandes de changements soient accomplies',
                'S’assurer que l’Accord sur les niveaux de service (SLA) soit tenu',
            ))
            ->setSolution(array(
                0 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $name = FixturesTools::saveFileFromLink(
            'http://www.hlpdeveloppement.fr/wp-content/uploads/2016/05/itil.jpg',
            'jpg',
            $this->container->getParameter('vich_upload_images_folder'
            )
        );

        $quiz
            ->setTitle('Certification ITIL - année 2015')
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

        $this->addReference('quiz ITIL', $quiz);
        $manager->persist($quiz);

        $manager->flush();
    }

    public function getOrder()
    {
        return 200;
    }
}