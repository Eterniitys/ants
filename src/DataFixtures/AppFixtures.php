<?php

namespace App\DataFixtures;

use App\Entity\BreedingSheet;
use App\Entity\Gender;
use App\Entity\Species;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $default_description = "Il n'y a pas de description.";

        # genre Messor
        $gender = new Gender("Messor", "Messor est un genre de fourmis qu'on appelle communément les « fourmis moissonneuses ». Messor, du latin messis veut dire « moisson » . Principalement granivores, les espèces du genre Messor récoltent des graines. Elles appartiennent à la sous-famille des Myrmicinae. Ces espèces ont la particularité de ne pas avoir de jabot social et donc de ne pas pratiquer la trophallaxie. L'autre originalité de ces espèces est leur régime alimentaire, composé presque exclusivement de graines. Elles sont granivores, mais elles peuvent aussi bien chasser des insectes. L’absence de trophallaxie est compensée par un système communautaire d’approvisionnement et de prédigestion de la nourriture. Ce genre de fourmis est principalement monogyne, c'est-à-dire qu'une colonie n'a qu'une seule reine. ");
        $species = new Species("Barbarus",14, 16,3,12,1,0,1,"Octobre","Colonie_de_fourmis_Messor_barbarus.jpg", "Messor barbarus est une espèce de fourmis moissonneuses, au régime à dominance granivore. A l'image de toutes les Messor, un polymorphisme continu est présent chez les ouvrières, et le jabot social n'est pas développé. Sa grande taille, son polymorphisme, sa couleur et son régime alimentaire en font la Messor la plus répandue dans les élevages myrmécophiles. C'est une espèce abondante dans son milieu de prédilection. Les colonies sont très populeuses, les nids sont facilement repérables aux monticules d'immondices et de téguments s’amoncelant au pied des entrées. Cette espèce préfère les endroits dégagés et a besoin d'une présence importante de graminées dans son entourage. Leur source de nourriture est un des principaux facteurs limitant la distribution de l'espèce à certains types de biotopes. Les prairies herbeuses ainsi que les sous-bois clairsemés du bassin méditerranéen sont leurs lieux de nidification privilégiés.");
        $gender->addSpecies($species);
        $manager->persist($species);
        $species = new Species("Capitatus",13, 14,4, 12,1,0,1,"Automne","Capitatus.jpg", "Messor capitatus est une espèce de fourmi moissonneuse, au régime à dominante granivore et d'un noir uniforme luisant. A l'image de toutes les Messor, un polymorphisme continu est présent chez les ouvrières, et le jabot social n'est pas développé. Néanmoins, il s'agit de l'espèce de Messor présentant ce polymorphisme à son degré le plus haut. Pour une taille globalement similaire au niveau des ouvrières, les plus gros major dépassent ceux de Messor barbarus. C'est une espèce abondante dans son milieu de prédilection. Les colonies sont très populeuses. Les nids sont facilement repérables aux monticules d'immondices et de téguments s’amoncelant au pied des entrées. Cette espèce préfère les endroits dégagés et a besoin d'une présence importante de graminées dans son entourage. Leur source de nourriture est un des principaux facteurs limitant la distribution de l'espèce à certains types de biotopes. Les prairies herbeuses ainsi que les sous-bois clairsemés du bassin méditerranéen sont leurs lieux de nidification privilégiés.");
        $gender->addSpecies($species);
        $manager->persist($species);
        $manager->persist($gender);

        # genre Camponotus
        $gender = new Gender("Camponotus", "Le genre Camponotus a des relations de commensalisme et de mutualisme avec le fenouil commun et des pucerons. Le fenouil sauvage sert de plante hôte aux fourmis Camponotus et aux pucerons. Les fourmis se nourrissent du miellat produit par les pucerons à partir de la sève de cette plante, mais elles gèrent aussi la population de pucerons, en retirant les individus morts et en réduisant les populations de pucerons quand leur nombre met en danger la plante-hôte");
        $species = new Species("Herculeanus",16, 20,6, 15,0,1,1,"Juin - Juillet","Herculeanus.jpg", "Il s'agit d'une des plus grandes espèces françaises, la gyne pouvant atteindre jusqu'à 2 cm. Les ouvrières de 7 à 15 mm, présentent quant à elle un fort polymorphisme de caste avec des minors, des médias et des majors. Rouges et noires, elles peuvent être confondues avec leurs cousines Camponotus ligniperdus dont l'aire de répartition est chevauchante. On notera cependant une préférence pour les altitudes élevées chez Camponotus herculeanus. La gyne, par contre, est plus foncée, avec une coloration caractéristique des premiers segments du gastre en noir, contrairement à ligniperdus. ");
        $gender->addSpecies($species);
        $manager->persist($species);
        $species = new Species("Cruentatus",16, 18, 7.5,15, 0,1,1,"Juillet - Août","Cruentatus.jpg", "Fourmi de grande taille (6 à 15 mm de long), son corps est noir mat sur sa majeure partie sauf la présence d'une tache rouille sur l'abdomen. Les individus présentent une polymorphisme important. Les femelles sexuées ont une taille pouvant atteindre les 20 mm. Elles sont de couleur noir mat sauf l'abdomen dont la couleur présente une teinte noire rougeâtre. Les mâles ont une taille d'environ 8 mm et sont entièrement noirs.");
        $gender->addSpecies($species);
        $manager->persist($species);
        $manager->persist($gender);

        # genre Crematogaster
        $gender = new Gender("Crematogaster", "Crematogaster est un genre de fourmis diversifié sur le plan écologique que l'on retrouve partout dans le monde et qui se caractérise par un gastre en forme de cœur distinctif (abdomen) qui leur donne l'un de leurs noms communs, la fourmi de Saint-Valentin. Les membres de ce genre sont également connus sous le nom de fourmis à cocktail en raison de leur habitude de soulever leur abdomen lorsqu'ils sont alarmés. La plupart des espèces sont arboricoles. Ces fourmis sont parfois appelés fourmis acrobates. Les fourmis acrobates acquièrent de la nourriture en grande partie par la prédation d’autres insectes, comme les guêpes. Ils utilisent le venin pour assommer leurs proies et un processus complexe de pose de sentiers pour mener leurs camarades vers des sources de nourriture. Comme beaucoup d’insectes sociaux, ils se reproduisent lors des vols nuptiaux et la reine stocke le sperme lorsqu’elle commence un nouveau nid.");
        $species = new Species("Scutelaris",8, 10,3, 5,1,0,0,"Fin de l'été", "Scutellaris.jpeg", $default_description);
        $gender->addSpecies($species);
        $manager->persist($species);
        $manager->persist($gender);

        # genre Solenopsis
        $gender = new Gender("Solenopsis", "Le genre Solenopsis comprend des fourmis piqueuses (266 espèces), dont la fourmi de feu (Solenopsis invicta). ");
        $species = new Species("Invicta",6, 7,2, 7,1,0,1,"Toute l'année","Invicta.jpg", $default_description);
        $gender->addSpecies($species);
        $manager->persist($species);
        $manager->persist($gender);

        # genre Aphænogaster
        $gender = new Gender("Aphænogaster", "Traduit de l'anglais-Aphaenogaster est un genre de fourmis myrmicines. Environ 200 espèces ont été décrites, dont 18 espèces de fossiles. Ils sont présents dans le monde entier sauf en Amérique du Sud, au sud de la Colombie, en Afrique subsaharienne et en Antarctique. Ils sont souvent confondus avec Pheidole ou Pheidologeton");
        $species = new Species("Subteranea",7, 8,3,5,1,0,1,"Eté","Subteranea.jpg", $default_description);
        $gender->addSpecies($species);
        $manager->persist($species);
        $species = new Species("Dulcineae",7, 8,3,5,1,0,1,"Eté","Dulcinea.jpg", $default_description);
        $gender->addSpecies($species);
        $manager->persist($species);
        $manager->persist($gender);

        # Users
        $user = new User("Johan"); // password : 123
        $user->setPassword("\$argon2i\$v=19\$m=1024,t=2,p=2\$NUUuVHlRZmN0MWdIa3RObw\$h0aBA8nBLHcQisf5NqL5aUctSdgnrUr/pPV7722C9AM");
        $user->setRoles(["ROLE_ADMIN"]);
        $manager->persist($user);
        for ($i = 0 ; $i < 5 ; $i++){
            $user = new User("Test_$i");
            $user->setPassword("\$argon2i\$v=19\$m=1024,t=2,p=2\$NUUuVHlRZmN0MWdIa3RObw\$h0aBA8nBLHcQisf5NqL5aUctSdgnrUr/pPV7722C9AM");
            $manager->persist($user);
        }

        # Breeding sheets
        for ($i = 0 ; $i < 10 ; $i++) {
            $brdsht = new BreedingSheet("Breeding_sheet_$i", $species, $user, $default_description);
            $manager->persist($brdsht);
        }

        $manager->flush();

    }
}
