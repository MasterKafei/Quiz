<?php
/**
 * Created by PhpStorm.
 * User: Paul
 * Date: 07/08/2018
 * Time: 10:23
 */

namespace AppBundle\DataFixtures\ORM\Chapter\ASc1;


use AppBundle\Entity\Chapter;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class DataChapterFixtures1ADS extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $chapter = new Chapter();

        $course = $this->getReference("1ADS_course");
        $chapter
            ->setValidate(true)
            ->setTitle('Chapitre 1 Premiers pas')
            ->setCourse($course)

            ->setText('Un algorithme est une suite d’instructions permettant la résolution d\'un problème en un nombre fini d’étapes.
            Les instructions d\' un algorithme sont écrites dans un langage de programmation.
            Il est traduit par un compilateur ou éxécuté par un interpréteur.
            À partir de données, les entrées de l\'algorithme, on va donc parvenir à un résultat, la sortie.
            Il est important de noter que les instructions d\'un algorithme doivent être indépendantes des données sur lesquelles il va s\'appliquer.
            Python est un langage interprété open source de haut niveau.
            Il possède des structures de données évoluées (listes, ensembles...).
            Il existe 2 branches principales de Python, la 2.x et la 3.x (ce cours portera sur la 3.x).
            Les variables élémentaires : int = entier ; float = décimal ; complex = complexe ; bool = booléen (vrai ou faux) ; str = string (chaîne de caractères).
            Les opérations de conversion : int(x) convertit x en entier ; int(x, base) convertit x de base "base" en entier (base 10) ; float(x) convertit x en décimal ; complex(x, y) convertit x et y en complexe ; bool(x) convertit x en booléen ; str(x) convertit x en string ; eval(x) évalue une expression Python (exemple : calcul).
            Les opérations arithmétiques : x+y additionne ; x-y soustrait ; x*y multiplie ; x**y donne x puissance y ; x/y divise; x//y donne le quotient de x par y ; x%y donne le reste du quotient de x par y.
            Les raccourcis : x+=y => x=x+y ; x-=y => x=x-y ; x**=y => x=x**y ; etc.
            "str" est une constante.
            Les éléments ("slicing") : s[i] => donne le i-ème élément de s ; s[i:j] => donne un string du i-ème jusqu\'au j-ème élément ; s[i:j:k] => comme s[i:j] avec un pas de k.
            En Python 3, l\'encodage des caractères se fait suivant la norme UTF-8, codés sur une séquence de 1 à 4 octets nommée unicode.
            ord(x) donne le code du caractère x ; chr(x) donne le caractère du code x.
            Les opérations de traitement : x in s => teste si x est dansle tableau s ; x not in s => teste si x n\'est pas dans s ; s + t => concacténe s et t ; s*n  ou  n*s => concaténe de n copies de s ; len(s) => donne la taille de s ; min(s) => donne le plus petit de s ; max(s) => donne le plus grand de s ; s.count(x) => compte le nombre d\'occurences de x dans s ; s.index(x) => donne l\'indice de x dans s.
            Les opérations de conversion en minuscules et majuscules : s.lower() => convertit le string s en minuscules ; s.upper() => convertit s en majuscules.');

        $manager->persist($chapter);

#        $chapter = new Chapter();
#
#        $course = $this->getReference("1ADS_course");
#        $chapter
#            ->setValidate(true)
#            ->setTitle('Chapitre 2 Structures conditionnelles et itératives')
#            ->setCourse($course)
#
#            ->setText('Un programme n\'est pas nécessairement qu’une succession d’instructions exécutées les unes à la suite des autres.​
#            On peut avoir besoin de choisir telle ou telle instruction pour s’adapter à telle ou telle situation.​
#            Ou encore devoir répéter plusieurs fois le même type d’instructions.');
#
#        $manager->persist($chapter);
#
#        $chapter = new Chapter();
#
#        $course = $this->getReference("1ADS_course");
#        $chapter
#            ->setValidate(true)
#            ->setTitle('Chapitre 3 Sous-programmes')
#            ->setCourse($course)
#
#            ->setText('Un sous-programme est un bloc d\'instructions réalisant une certaine tâche.
#            Il possède un nom et est exécuté lorsqu’on l\'appelle.
#            Un script bien structuré contiendra un programme dit "principal", et plusieurs sous-programmes dédiés à des fonctionnalités spécifiques.');
#
#        $manager->persist($chapter);
#
#        $chapter = new Chapter();
#
#        $course = $this->getReference("1ADS_course");
#        $chapter
#            ->setValidate(true)
#            ->setTitle('Chapitre 4 Structures séquentielles de données')
#            ->setCourse($course)
#
#            ->setText('Réunir au sein d\'une même variable plusieurs valeurs différentes.​
#            L\'objectif étant d\'optimiser certaines opérations comme la recherche d\'un élément, le tri de ces valeurs, le calcul de leur maximum, etc.​');
#
#        $manager->persist($chapter);
#
#        $chapter = new Chapter();
#
#        $course = $this->getReference("1ADS_course");
#        $chapter
#            ->setValidate(true)
#            ->setTitle('Chapitre 5 Récursivité. Paradigme diviser pour régner')
#            ->setCourse($course)
#
#            ->setText('Définition : un sous–programme (procédure ou fonction) est dit récursif s’il s\'appelle lui même.
#            Idée : pour effectuer une tâche ou un calcul, on se ramène à la réalisation d’une tâche similaire mais de complexité moindre. On recommence jusqu\'à obtenir une tâche élémentaire.');
#
#        $manager->persist($chapter);
#
#        $chapter = new Chapter();
#
#        $course = $this->getReference("1ADS_course");
#        $chapter
#            ->setValidate(true)
#            ->setTitle('Chapitre 6 Algorithmes de tri')
#            ->setCourse($course)
#
#            ->setText('À partir d’une liste de données numériques, réordonner  ces valeurs par ordre croissant.
#            La liste en question sera donc un paramètre lu et modifié par ces procédures de tri.
#            Pour ce faire on n\'utilisera pas de listes intermédiaires, les tris se feront "sur place".');
#
#        $manager->persist($chapter);
#
#        $chapter = new Chapter();
#
#        $course = $this->getReference("1ADS_course");
#        $chapter
#            ->setValidate(true)
#            ->setTitle('Chapitre 7 Autres structures de données')
#            ->setCourse($course)
#
#            ->setText('Python possède des structures de données implémentant la notion d’ensemble mathématique.
#            Par "ensemble" on entend ici une collection d’éléments distincts.
#            On aura deux types pour ce faire :
#            - "set" qui sera une structure muable.
#            - "frozenset" qui elle sera immuable.');
#
#        $manager->persist($chapter);
#
#        $chapter = new Chapter();
#
#        $course = $this->getReference("1ADS_course");
#        $chapter
#            ->setValidate(true)
#            ->setTitle('Chapitre 8 Interfaces graphiques')
#            ->setCourse($course)
#
#            ->setText('Définition : un sous–programme (procédure ou fonction) est dit récursif s’il s\'appelle lui même.
#            Idée : pour effectuer une tâche ou un calcul, on se ramène à la réalisation d’une tâche similaire mais de complexité moindre. On recommence jusqu\'à obtenir une tâche élémentaire.');
#
#        $manager->persist($chapter);

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 300;
    }
}
