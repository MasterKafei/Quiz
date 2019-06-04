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

class Data3MSAFixturesQuiz extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
        $category = $this->getReference('category 3msa');
        $questions = array();

        $question = (new Question())
            ->setTitle('Signification ADCS')
            ->setText('Qu\'est-ce que signifie ADCS ?')
            ->setResponses(array(
                'Active Directory Communication Services,',
                'Active Directory Certificate Services',
                'Active Directory Certificate Server',
                'Active Directory Certifications Server'
            ))
            ->setSolution(array(
                1 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Utilités de l\'ADCS')
            ->setText('L\'ADCS permet de gérer une public key infrastructure, gérer les certificats ?')
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
            ->setTitle('Signification ADFS ')
            ->setText('Que signifie ADFS ?')
            ->setResponses(array(
                'Active Directory Foundation Service',
                'Active Directory Federation Server',
                'Active Directory Foundation Server',
                'Active Directory Federation Service',
            ))
            ->setSolution(array(
                3 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Utilité ADFS')
            ->setText('L\' ADFS permet de : ')
            ->setResponses(array(
                'Il autorise l\'accès à des systèmes et des applications à des organisations externes',
                'Il permet aux utilisateurs de Windows d\'exploiter une fonction de Single Sign-On ',
                'Il permet de mieux sécuriser les connections Windows',
            ))
            ->setSolution(array(
                0 => true, 1 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Signification de ADRMS')
            ->setText('Quse signifie ADRMS ?')
            ->setResponses(array(
                'Active Directory Rights Management Services ',
                'Active Directory Rôles Management Services ',
                'Active Directory Rôles Management Server ',
                'Active Directory Rôles Management Services ',
            ))
            ->setSolution(array(
                0 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Utilité de ADRMS')
            ->setText('L\'ADRMS Permet de :')
            ->setResponses(array(
                'Permets de gérer les droits sur les serveurs ',
                'Optimise la sécurité serveur',
                'Optimise la protection des documents',
                'Permets d\'améliorer le temps de réponses serveur',
            ))
            ->setSolution(array(
                0 => true,
            ))
            ->setQuiz($quiz);


        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Gestions des informations dans l\'AD')
            ->setText('Comment sont gérées les informations dans l\'Active Directory :')
            ->setResponses(array(
                'Avec des noms ',
                'Avec leurs propriétés',
                'Avec leurs ID',
            ))
            ->setSolution(array(
                2 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;


        $question = (new Question())
            ->setTitle('Utilité de l\'AD')
            ->setText('L\'Active Directory permet de :')
            ->setResponses(array(
                'Permets la gestion des mots de passe, de manières à centraliser les mots de passes',
                'Permets de centraliser les informations utilisateurs pour éviter la redondance de stockage de données',
                'Permets de faire un rapport de toutes les applications installées par machine sur le réseau',
                'Permets le déploiements d\'applications sur les machines depuis le réseau',
            ))
            ->setSolution(array(
                1 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;


        $question = (new Question())
            ->setTitle('Utilité de l\'AD')
            ->setText('L\'Active Directory permet de :')
            ->setResponses(array(
                'Permets la gestion des mots de passe, de manières à centraliser les mots de passes',
                'Permets de centraliser les informations utilisateurs pour éviter la redondance de stockage de données',
                'Permets de faire un rapporte de toutes les applications installées par machine sur le réseau',
                'Permets le déploiement d\'applications sur les machines depuis le réseau',
            ))
            ->setSolution(array(
                1 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;

        $question = (new Question())
            ->setTitle('Les Forêts')
            ->setText('Qu\'est ce que les Forêts :')
            ->setResponses(array(
                'Les Forêts (ou Forest) sont des collections de domaines.',
                'Les Forêts (ou Forest) sont des collections de machines dans le réseau',
                'Les Forêts (ou Forest) sont des collections d\'applications',
            ))
            ->setSolution(array(
                0 => true,
            ))
            ->setQuiz($quiz);

        $manager->persist($question);
        $questions[] = $question;


        $name = FixturesTools::saveFileFromLink(
            'http://www.alma.fr/var/ezwebin_site/storage/images/systemes-et-reseaux/actualites/windows-server-2012/logo-windows-server-2012/48683-1-fre-FR/logo-Windows-Server-2012.jpg',
            'jpg',
            $this->container->getParameter('vich_upload_images_folder'
            )
        );

        $quiz
            ->setTitle('QCM 3MSA révision de 3ème année')
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

        $this->addReference('quiz 3msa', $quiz);
        $manager->persist($quiz);

        $manager->flush();
    }

    public function getOrder()
    {
        return 200;
    }
}