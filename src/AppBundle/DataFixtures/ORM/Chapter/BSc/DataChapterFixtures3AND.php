<?php

namespace AppBundle\DataFixtures\ORM\Chapter\BSc;

use AppBundle\Entity\Chapter;
use AppBundle\Entity\Course;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
/**
 * Created by PhpStorm.
 * User: User
 * Date: 15/06/2018
 * Time: 20:52
 */

class DataChapterFixtures3AND extends AbstractFixture implements OrderedFixtureInterface
{


    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load(\Doctrine\Common\Persistence\ObjectManager $manager)
    {
        $chapter = new Chapter();

        $course = $this->getReference("3AND_course");
        $chapter
            ->setTitle('Chapitre 1 Android Preparation')
            ->setCourse($course)
            ->setText('Présent sur de nombreux  appareils du quotidien, Android est un systéme d\'exploitation basé sur le kernel linux.
            Tous les appareils qui existent sont unique et disposent de ressources limitées, c\'est donc une des limites à respecter quand nous développons sous Android.
            Android se présente aussi sous différentes versions, l\'application devra être compatible avec le maximum d\'appareils possible.
            Pour développer sous android vous aurez besoin d\'android studio, présent sur Windows, Mac et Linux.
            Android studio utilise Gradle pour build notre application.
            Gradle est un outils qui gére les dépendances automatiquement et est désigné pour le multiplateformes.');

        $manager->persist($chapter);


        $chapter = new Chapter();

        $course = $this->getReference("3AND_course");
        $chapter
            ->setTitle('Chapitre 2 Application Fundamentals')
            ->setCourse($course)
            ->setText('Une application Android est une collection d\'Activity, de service et d\'autre Componsat?
             L\'Application est build en .apk, c\'est une archive contenant tout les composants de l\'application.
             Tous les rôles et toutes les vues sont d\'écrite dans le fichier Manifest.
             Tous les projets Android doivent disposé d\'un manifest.
             Chaque nouvelles versions d\'android dispose de changement Majeur qu\'il faudra prendre en compte.
             
             Une Activity est un écran composé de plein d\'éléments graphiques.
             Composé de 2 parties, la partie Activity Logic (défini dans la classe android.app.activity.
             et composée de la User Interface (défini dans la classe de l\'activité ou dans le fichier XML de l\'activité.
             
             Le cycle de vie d\'une application : Active, Paused, Stopped.
             
             Pour utiliser les logs, il faut utiliser Log.d(Titre, Message);.
             
             Les ressources peuvent être des Images, des Strings etc, et sont disponibles dans le dossier RES.
             On y accéde grâce à la classe static R.
             
             Une bonne pratique nous incite à écrire tous nos string dans le fichier Strings.XML, de façon à regrouper toutes nos chaines de caractére présente dans l\'applicaiton.
             
             Une interface Utilisateur est composée d\'éléments utilisateurs, comme des bouttons, du Texte, etc, et chaque composant utilisateur dispose d\'un ID qui permettra de selectionner cet élément grâce à la classe R.
             ');

        $manager->persist($chapter);


        $chapter = new Chapter();
        $course = $this->getReference("3AND_course");
        $chapter
            ->setTitle('Chapitre 3 Advanced Development')
            ->setCourse($course)
            ->setText('Les Layouts sont des ViewGroup qui nous aident à positionner nos éléments graphique.
            Un layout est aussi une vue.
            Un layout peut contenir d\'autre Layout.
            Il existe aussi des layouts qui proviennent du SDK Android comme LinearLayout, RelativeLayout, FrameLayout, TableLayout.
            
            Le FrameLayout est un layout basique. Il permet de contenir des vues enfants et d\'en réaliser une vue compléte.
            Le TableLayout permet d\'afficher les informations sous forme de tables, ce layout peut être comparé au table HTML.
            Le RelativeLAyout permet de placer les éléments graphique par rapport aux autres.
            Le LinearLayout créé des colonnes et des lignes et de placer les éléments graphique dans ces lignes et ces colonnes, utiles pour la réalisation d\'interface rapide.
            
            L\'élément TextView permet d\'afficher une zone de texte, peut être comparé avec le label dans d\'autre langages.
            L\'EditText permet à l\'utilisateur de saisir du texte dans notre application.
            Les checkbox permettent à l\'utilisateur d\'effectuer des choix multiples.
            Les RadioButton permettent à l\'utilisateur d\'effectuer un choix unique.
            Le spinner est une liste déroulante qui donne à l\'utilisateur la possibilitée d\'avoir accès à beaucoup de réponses dans une petite zone.
            La RatingBar permet à l\'utilisateur de noté et de consulter la notation de quelque chose, grâce à un systéme d\'étoile.
            Un Button permet à l\'utilisateur d\'effectuer une action.
            L\'ImageButton permet d\'afficher une image sur un Button.
            La ListView permet d\'afficher à l\'utilisateur une liste d\'élément personnalisé grace au ListViewAdapter.
            Il existe bien d\'autre vues mais je ne détaille ici que les plus utilisées.
            
            Un événnement est une action qui va être effectuée à la suite d\'une action (un click sur un button par exemple)
            Un événnement click peut être défini dans le XML du Layout ou au niveau du code de la classe de la vue
            ');

        $manager->persist($chapter);

        $chapter = new Chapter();
        $course = $this->getReference("3AND_course");
        $chapter
            ->setTitle('Chapitre 4 Ergonomics')
            ->setCourse($course)
            ->setText('En Android il existe 2 types de menu, les Options Menu(afficher quand le boutton menu est pressé),
             les Context Menu (Affiché lors d\'un appuie continue sur un élément graphique, similaire au clique droit sur windows).
             Un Menu se défini dans le fichier /res/menu.
             Chaque élément doit être défini dans une balise <item>. 
             Un InflatingMenu est appelé quand il est temps d\'afficher le menu, le menu est charger en XML et est construit par les événements de l\'activity.
             Le paramétre MenuItem d\'un Handling Menu permet de selectionner un item par son ID.
             L\'action Bar Menu affciher les options disponibles du menu en haut de l\'écran.
               
             Les intents permettent de lancer des activitées et de passer à travers les vues des objets.
             Pour lancer une activitée avec un Intent on utilise la méthode StartActivity(intent);
             
             Pour inclure un objet dans l\'intent on utilise la méthode putExtra(\'Clés\', \'valeur\').
             Et pour récupérer un objet on utilise la méthode getExtrs(\'clés\').
             Il y\'a 2 types d\'intent : les Explicit Intents démarrés par l\'application et les Implicit Intents démarrés par le systéme.
             
             Les Fragments permettent d\'avoir de multiples briques d\'interface dans une seule interface, chaque brique étant indépendante les unes des autres.
             Un fragment peut être chargé directement grâce au FragmentManager.
             
             Un Adaptative Layouts permet d\'adapter les éléments graphique à la position de l\'écran (horizontal, vertical).
             
             Les Dialogs, permettent une interaction avec l\'utilisateur et s\'affiche comme des popups.
             Ils peuvent de plusieurs type, comme un simple message ou comme un datepicker par exemple.
             
             Les notifications s\'affichent dans la Status Bar de l\'application et peuvent être personnalisés en leur attribuant par exemple un icone, du texte, une couleur etc.
             Cliquer sur une notification lance son activité associée.
             Les notifications utilisent des PendingIntent pour rediriger l\'utilisateur sur l\'intent de la notification.
            ');

        $manager->persist($chapter);

        $chapter = new Chapter();
        $course = $this->getReference("3AND_course");
        $chapter
            ->setTitle('Chapitre 5 Datas')
            ->setCourse($course)
            ->setText('L\'instanceState va permettre de sauvegarder l\'état d\'une instance, les méthodes pour l\'utiliser sont le onSaveInstace State et le onRestoreInstanceState.
            Les SharedPréférences permettent de sauvergarder les préférences de l\'utilisateur sur l\'application.
            Les SharedPréférences sont supprimé une fois l\'application désinstallée et ne peuvent être composés que de clés et valeurs et type Boolean, Int, Long, Float et String.
            Ils ont 3 modes d\'accés MODE_PRIVATE (seulement l\'application peut accéder à ce fichier,
            MODE_WORD_READABLE, Les autres applications en lecture au paramétre,
            MODE_WORD_WRITABLE permet à toutes les applications à écrire et lire le fichier de paramétre.
            
            L\'internal Storage permet de stocker des fichiers, photos, textes etc directement dans la mémoire du téléphone.
            L\'external Storage permet de stocker des fichiers, photos, textes etc mais sur un périphérique externe comme une carte SD etc, ce qui peut être un probléme si l\'utilisateur démonte le périphérique, la ressource ne sera plus accessible.
            
            Pour stocker des données sous forme relationnelle, nous disposons sous android d\'une base de données SQLite,
            Cette base de donnée relationnelle s\'utilise en local sur le périphérique et permet la gestion compléte des données.
            Il est déconseillé de stocker des données binaires !
            SQLite ressemble à du MySQL, nous pouvons effectuer des requêtes pour accéder à nos données, et chaque table peut être liée avec des IDs.
            
            Le cursor permet la récupération de plusieurs lignes de données, nous pouvons donc traiter chaque résultat un par un, grâce à la fonction 
            moveToNext().
            
            Les applications Android ont la possibilitée d\'utiliser les WebServices SOAP et REST, les librairies nécessaire sont directement incluses dans le SDK Mais les librairies pour le SOAP ne le sont pas par contre.
             Android dispose de la libraire HttpClient d\'Apache Foundation.
             Il faut créer une instance de la classe HttpClient, puis créer une HttpRequest, configurer cette requète, l\'éxécuter et traiter son résultat. 
             Les verbes HTTP Get et Post sont aussi traités.
             Les données retournées devront être exploitées sous forme de données pour être correctement traitées.
             
            Une fois notre application terminée, nous pouvons la publier sur le Store Android mais aussi sur les stores non officiels.
            En effet, Android studio nous donne notre apk que nous pouvons ensuite distribuer n\'importe où.
            Pour publier notre application sur le store ils nous faut disposer d\'un compte développeur qui coute à peu près 20 euro.
            Quand notre compte à été créé et ouvert il nous faut publier des screens de notre application (minimum 2) et upload notre application sur le store.
            
            Aprés la publication nous avons accès à des statistiques sur le téléchargement et le retour des utilisateurs de notre application.
             ');


        $manager->persist($chapter);
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