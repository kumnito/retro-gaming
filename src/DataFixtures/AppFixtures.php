<?php

namespace App\DataFixtures;


use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Jeux;
use App\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Faker;

class AppFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $faker = Faker\Factory::create('fr_FR');

        $conMega = $this->getReference('conMega');
        $conSuper = $this->getReference('conSuper');
        
        $aventure= $this->getReference('catAventure');
        $flipper = $this->getReference('catFlipper');
        $plateForme = $this->getReference('catPlateForme');
        $action = $this->getReference('catAction');
        $sport = $this->getReference('catSport');
        $reflexion = $this->getReference('catReflexion');
        $tir = $this->getReference('catTir');
        $combat = $this->getReference('catCombat');
        $fantastic = $this->getReference('catFanta');

        $user = new User();
        $user->setEmail('julien@wf3.fr');
        $user->setPassword('$argon2id$v=19$m=65536,t=4,p=1$WXY5OEw0bG41VXNmNVpkSQ$2e01kUlqC101oxyLD83guZ8popc+sDyGMEQBjOVYnhc');
        $user->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);

        $user = new User();
        $user->setEmail('victoria@wf3.fr');
        $user->setPassword('$argon2id$v=19$m=65536,t=4,p=1$NDZTbTFUc0VvcEs0aUdOUg$ZykB4EmG4caLZWcqE/2ZE/agSOSYTOe1v4Td6iC+I2s');
        $user->setRoles(['ROLE_USER']);
        $manager->persist($user);

        $jeu = new Jeux();
        $jeu->setTitre("Sonic Spinball");
        $jeu->setAnnee(1993);
        $jeu->setPrix(12.99);
        $jeu->setConsoleId($conMega);
        $jeu->setCategorie($flipper);
        $jeu->setPhoto('SonicSpinball.jpg');
        $jeu->setCompteur($faker->numberBetween(10, 150));
        $jeu->setDescription("Le but du jeu est d'attraper des émeraudes cachées dans les flippers, il y aura un flipper de pistons et d’organes mécaniques en tout genre. Il faudra d'abord libérer la voie pour y accéder, puis les attraper. Les niveaux se concluent par l'affrontement contre un chef qui est l’ennemi.");
        $manager->persist($jeu);

        $jeu = new Jeux();
        $jeu->setTitre("Jurassic Park");
        $jeu->setAnnee(1993);
        $jeu->setPrix(11.99);
        $jeu->setConsoleId($conMega);
        $jeu->setCategorie($aventure);
        $jeu->setPhoto('JurassicPark1993.png');
        $jeu->setCompteur($faker->numberBetween(10, 150));
        $jeu->setDescription("Le joueur principal Grant dispose de 3 vies, d'un arsenal dont les munitions sont disséminées un peu partout dans les différents niveaux du jeu, tout comme les points de santé, matérialisées sous forme de trousses médicales. Le vélociraptor dispose de 3 vies, et peut tuer ses ennemis par morsures et coups de griffes. En guise de points de santé, il trouvera des pattes de dinde et des procompsognathus (petits dinosaures verts) disséminés un peu partout dans les différents niveaux du jeu.");
        $manager->persist($jeu);

        $jeu = new Jeux();
        $jeu->setTitre("Mickey Mania");
        $jeu->setAnnee(1996);
        $jeu->setPrix(24.99);
        $jeu->setConsoleId($conMega);
        $jeu->setCategorie($plateForme);
        $jeu->setPhoto('MickeyMania1994.jpg');
        $jeu->setCompteur($faker->numberBetween(10, 150));
        $jeu->setDescription("Le joueur dirige Mickey Mouse dans des niveaux reprenant certains des dessins animés les plus connus de son histoire.");
        $manager->persist($jeu);

        $jeu = new Jeux();
        $jeu->setTitre("Sonic Compilation");
        $jeu->setAnnee(1995);
        $jeu->setPrix(39.99);
        $jeu->setConsoleId($conMega);
        $jeu->setCategorie($plateForme);
        $jeu->setPhoto('Sonic1995.jpg');
        $jeu->setCompteur($faker->numberBetween(10, 150));
        $jeu->setDescription("Sonic Compilation, comme son nom l'indique, une compilation de plusieurs titres de l'univers de Sonic. Les niveaux se concluent par l'affrontement contre un chef qui est l’ennemi.");
        $manager->persist($jeu);

        $jeu = new Jeux();
        $jeu->setTitre("Bugs Bunny Double Trouble");
        $jeu->setAnnee(1996);
        $jeu->setPrix(39.99);
        $jeu->setConsoleId($conMega);
        $jeu->setCategorie($plateForme);
        $jeu->setPhoto('Bunny1996.jpg');
        $jeu->setCompteur($faker->numberBetween(10, 150));
        $jeu->setDescription("Bugs Bunny doit arrêter Gossamer, le robot créé par Sam le Pirate, désormais hors de contrôle de son créateur. Bugs Bunny in Double Trouble sur Megadrive est un jeu de plates-formes où vous devrez tantôt guider un personnage vers un endroit sûr, échapper à un poursuivant, ou battre un monstre. Bugs révèle ses talents de lièvre grâce à sa course rapide et à de grands bonds dont vous devrez tirer profit !");
        $manager->persist($jeu);

        $jeu = new Jeux();
        $jeu->setTitre("Pinocchio");
        $jeu->setAnnee(1995);
        $jeu->setPrix(29.99);
        $jeu->setConsoleId($conMega);
        $jeu->setCategorie($aventure);
        $jeu->setPhoto('Pinocchio1995.jpg');
        $jeu->setCompteur($faker->numberBetween(10, 150));
        $jeu->setDescription("Vous dirigez la petite marionnette et revivez l'histoire du film, en parcourant les différents niveaux avec l'aide de Jiminy Cricket. Attention cependant à ne pas mentir ou faire des bêtises, sous peine de se voir changé en âne ou de voir votre nez s'allonger.");
        $manager->persist($jeu);

        $jeu = new Jeux();
        $jeu->setTitre("Aladdin");
        $jeu->setAnnee(1993);
        $jeu->setPrix(24.99);
        $jeu->setConsoleId($conMega);
        $jeu->setCategorie($action);
        $jeu->setPhoto('Aladdin1993.jpg');
        $jeu->setCompteur($faker->numberBetween(10, 150));
        $jeu->setDescription(" Ce jeu propose effectivement de suivre Aladdin dans les rues d'Agrabah aux couloirs du palais royal en passant bien sûr par la célèbre caverne aux merveilles. Le Génie est aussi de la partie et permet de gagner des bonus.");
        $manager->persist($jeu);

        $jeu = new Jeux();
        $jeu->setTitre("DecapAttack");
        $jeu->setAnnee(1990);
        $jeu->setPrix(15.99);
        $jeu->setConsoleId($conMega);
        $jeu->setCategorie($plateForme);
        $jeu->setPhoto('DeCapAttack1991.jpg');
        $jeu->setCompteur($faker->numberBetween(10, 150));
        $jeu->setDescription(" Le personnage peut sauter, frapper avec sa machoire extensible, lancer un crâne, ou encore utiliser des potions magiques pour augmenter ses capacités durant quelques secondes.");
        $manager->persist($jeu);

        $jeu = new Jeux();
        $jeu->setTitre("Les Schtroumpfs");
        $jeu->setAnnee(1990);
        $jeu->setPrix(14.99);
        $jeu->setConsoleId($conMega);
        $jeu->setCategorie($plateForme);
        $jeu->setPhoto('Schtroumpfs1993.jpg');
        $jeu->setCompteur($faker->numberBetween(10, 150));
        $jeu->setDescription(" Dans Les Schtroumpf, vous incarnez un habitant du village, désigné pour aller porter secours à trois de ses amis, capturés par le diabolique Gargamel. Tracez votre route à travers les forêts, montagnes, marais et autres grottes.");
        $manager->persist($jeu);

        $jeu = new Jeux();
        $jeu->setTitre("Marsupilami");
        $jeu->setAnnee(1995);
        $jeu->setPrix(29.99);
        $jeu->setConsoleId($conMega);
        $jeu->setCategorie($action);
        $jeu->setPhoto('Marsupilami1995.jpg');
        $jeu->setCompteur($faker->numberBetween(10, 150));
        $jeu->setDescription(" Vous contrôlez le Marsupilami qui se retrouve enfermé dans un cirque mais qui ne tardera pas à se libérer, en même temps que tous les animaux de la ménagerie. Il faudra retrouver votre chemin à travers plusieurs niveaux aux environnements variés tout en récoltant des fruits.");
        $manager->persist($jeu);

        $jeu = new Jeux();
        $jeu->setTitre("Le Roi Lion");
        $jeu->setAnnee(1995);
        $jeu->setPrix(34.99);
        $jeu->setConsoleId($conMega);
        $jeu->setCategorie($plateForme);
        $jeu->setPhoto('LeroiLion1994.jpg');
        $jeu->setCompteur($faker->numberBetween(10, 150));
        $jeu->setDescription(" Vous parcourez la savane avec Simba, de son plus jeune âge jusqu'à son retour dans la tribu des lions à l'âge adulte. Tous les personnages et passages du film sont présents, de même que les musiques qui permettent aux nostalgiques de plonger pleinement dans l'univers d'un des classiques de Disney.");
        $manager->persist($jeu);

        $jeu = new Jeux();
        $jeu->setTitre("Tom and Jerry Frantics Antics");
        $jeu->setAnnee(1993);
        $jeu->setPrix(59.99);
        $jeu->setConsoleId($conMega);
        $jeu->setCategorie($plateForme);
        $jeu->setPhoto('TomandJerryFranticAntics!1993.jpg');
        $jeu->setCompteur($faker->numberBetween(10, 150));
        $jeu->setDescription(" Un jeu d'aventure et d'action dans lequel vous contrôlez Tom le chat mais aussi la souris Jerry. Tous deux sont unis pour récupérer leur ami : Robyn. Traversez huit niveaux et soyez prêt à affronter vos ennemis et récupérez le fromage et le poisson pour gagner des forces.");
        $manager->persist($jeu);

        $jeu = new Jeux();
        $jeu->setTitre("Ghostbusters");
        $jeu->setAnnee(1993);
        $jeu->setPrix(44.99);
        $jeu->setConsoleId($conMega);
        $jeu->setCategorie($aventure);
        $jeu->setPhoto('Ghostbusters1993.jpg');
        $jeu->setCompteur($faker->numberBetween(10, 150));
        $jeu->setDescription(" L'histoire du jeu implique des fantômes terrorisant une ville après un tremblement de terre. Les Ghostbusters ont chacun leurs propres traits liés à la vitesse et à la force de tir, et ils sont chacun animés de têtes surdimensionnées censées ressembler à la ressemblance de leur acteur respectif. Le joueur peut s'accroupir, sauter, et est équipé d'un pistolet à positrons, qui peut être tiré dans toutes les directions et est utilisé pour éliminer les fantômes.");
        $manager->persist($jeu);

        $jeu = new Jeux();
        $jeu->setTitre("NBA LIVE");
        $jeu->setAnnee(1996);
        $jeu->setPrix(44.99);
        $jeu->setConsoleId($conMega);
        $jeu->setCategorie($sport);
        $jeu->setPhoto('NBA1996.jpg');
        $jeu->setCompteur($faker->numberBetween(10, 150));
        $jeu->setDescription(" Vous pouvez jouer avec les 29 équipes officielles du championnat professionnel et effectuer une saison complète. Si les vrais joueurs ne vous conviennent pas, vous pouvez également créer votre propre équipe formée de joueurs fictifs issus de votre imagination.");
        $manager->persist($jeu);

        $jeu = new Jeux();
        $jeu->setTitre("Bob");
        $jeu->setAnnee(1993);
        $jeu->setPrix(49.99);
        $jeu->setConsoleId($conSuper);
        $jeu->setCategorie($action);
        $jeu->setPhoto('bob.jpg');
        $jeu->setCompteur($faker->numberBetween(10, 150));
        $jeu->setDescription(" B.O.B est un jeune robot à l'apparence de fourmi humanoïde. C’est un jeu d'action  en 2D à thème futuriste. Le jeu est composé de 45 niveaux. Pour se défendre, B.O.B. est doté d'un canon de tir à la place du bras, ainsi que plusieurs gadgets interchangeables en permanence mais en quantités limitées.");
        $manager->persist($jeu);

        $jeu = new Jeux();
        $jeu->setTitre("Super Mario World");
        $jeu->setAnnee(1990);
        $jeu->setPrix(19.99);
        $jeu->setConsoleId($conSuper);
        $jeu->setCategorie($plateForme);
        $jeu->setPhoto('Supermarioworld1992.jpg');
        $jeu->setCompteur($faker->numberBetween(10, 150));
        $jeu->setDescription(" Super Mario World à la poursuite de Bowser qui a kidnappé pour la énième fois la princesse Peach. Exploitez de nouveaux objets tels que la plume permettant aux héros de planer pendant un court instant, et faites surtout connaissance avec le petit dinosaure vert Yoshi qui apparaît avec sa tribu pour la toute première fois dans la série.");
        $manager->persist($jeu);

        $jeu = new Jeux();
        $jeu->setTitre("Goof Troop");
        $jeu->setAnnee(1993);
        $jeu->setPrix(59.99);
        $jeu->setConsoleId($conSuper);
        $jeu->setCategorie($fantastic);
        $jeu->setPhoto('GoofTroop1993.jpg');
        $jeu->setCompteur($faker->numberBetween(10, 150));
        $jeu->setDescription(" Goof Troop est une aventure. Dingo et son fils profitent d'une journée de pêche quand ils apprennent que leurs amis Pat Hibulaire et Pat Junior ont été kidnappés par des pirates. Ils partent à leur rescousse en traversant l'île de Spoonerville. Là, de nombreux pièges et énigmes se dressent sur leur passage. En solo ou en coopération avec un ami, vous pouvez mener Dingo et Max dans cette aventure.");
        $manager->persist($jeu);

        $jeu = new Jeux();
        $jeu->setTitre("Star Wars");
        $jeu->setAnnee(1992);
        $jeu->setPrix(25.99);
        $jeu->setConsoleId($conSuper);
        $jeu->setCategorie($tir);
        $jeu->setPhoto('StarWars1992.jpg');
        $jeu->setCompteur($faker->numberBetween(10, 150));
        $jeu->setDescription(" Ce jeu est en grande partie basé sur le film 'Un Nouvel Espoir' de la Saga Star Wars, sorti en 1977. Il combine de nombreux styles de jeu, mais principalement un jeu à défilement horizontal. Le jeu débute sur Tatooine, où vous incarnez Luke Skywalker. Vous aurez par la suite la possibilité de contrôler la princesse Leia et Han Solo");
        $manager->persist($jeu);

        $jeu = new Jeux();
        $jeu->setTitre("Robocop");
        $jeu->setAnnee(1991);
        $jeu->setPrix(20.99);
        $jeu->setConsoleId($conSuper);
        $jeu->setCategorie($action);
        $jeu->setPhoto('robocop1991.jpg');
        $jeu->setCompteur($faker->numberBetween(10, 150));
        $jeu->setDescription(" RoboCop est un jeu d'action sur Commodore 64. Vous êtes à Néo-Détroit, en 2015. Les quartiers sont à feu et à sang et l'OCP prend le contrôle de la ville. Au coeur d'une sombre machination entre pouvoir, corruption et trafic de drogue, vous incarnez RoboCop, le seul espoir.");
        $manager->persist($jeu);

        $jeu = new Jeux();
        $jeu->setTitre("Tiny Toon Adventures - Buster Busts Loose!");
        $jeu->setAnnee(1992);
        $jeu->setPrix(34.99);
        $jeu->setConsoleId($conSuper);
        $jeu->setCategorie($plateForme);
        $jeu->setPhoto('TinyToonAdventures-BusterBustsLoose!1992.jpg');
        $jeu->setCompteur($faker->numberBetween(10, 150));
        $jeu->setDescription(" Buster Bunny doit progresser à travers 6 niveaux empruntés à l'univers des Tiny Toons(Acme Looniversity, The Western Movie, Spook Mansion, Acme Looniversity Football, Buster Sky-jinks et Space Opera). Buster Bunny peut foncer à toute vitesse à travers les niveaux pour franchir les obstacles et attaquer les ennemis.");
        $manager->persist($jeu);

        $jeu = new Jeux();
        $jeu->setTitre("The addams family");
        $jeu->setAnnee(1992);
        $jeu->setPrix(34.99);
        $jeu->setConsoleId($conSuper);
        $jeu->setCategorie($plateForme);
        $jeu->setPhoto('Theaddamsfamily1992.jpg');
        $jeu->setCompteur($faker->numberBetween(10, 150));
        $jeu->setDescription(" The Addams Family est un jeu. L'histoire se situe vers la fin du film La Famille Addams alors que la famille est expulsée de son manoir par un avocat zélé. Comme si cela ne suffisait pas, on apprend que Morticia, Pugsley, Mercredi et les autres ont disparu ! Vous incarnez donc Gomez, seul rescapé, qui partira à la recherche de sa famille et affrontera tous ses ennemis jusqu'au dernier : l'avocat !");
        $manager->persist($jeu);

        $jeu = new Jeux();
        $jeu->setTitre("The Death and the return of Superman");
        $jeu->setAnnee(1994);
        $jeu->setPrix(64.99);
        $jeu->setConsoleId($conSuper);
        $jeu->setCategorie($combat);
        $jeu->setPhoto('TheDeathandthereturnofSuperman1994.jpg');
        $jeu->setCompteur($faker->numberBetween(10, 150));
        $jeu->setDescription(" Superman meurt au début, dans un combat contre Doomsday, vous serez amené à contrôler d'autres héros tels qu'Eradicator ou Superboy. Les attaques des héros sont variées : coups de poing, laser, coup spécial... Ils peuvent même voler. La mort de Superman est un tournant dans l'histoire des comics et ce jeu vous permet de revivre cette aventure.");
        $manager->persist($jeu);

        $jeu = new Jeux();
        $jeu->setTitre("The Itchy and Scratchy");
        $jeu->setAnnee(1995);
        $jeu->setPrix(44.99);
        $jeu->setConsoleId($conSuper);
        $jeu->setCategorie($action);
        $jeu->setPhoto('TheItchyandScratchyGame1994.jpg');
        $jeu->setCompteur($faker->numberBetween(10, 150));
        $jeu->setDescription(" The Itchy & Scratchy est un jeu tiré de l'univers des Simpson. Itchy (la souris) s'efforce de tuer Scratchy (le chat) en faisant preuve d'une violence et d'une imagination sans limite. Dans ce jeu vidéo, le joueur incarne Itchy et doit trouver diverses armes à travers les 7 niveaux pour démolir une fois de plus son ennemi de toujours.");
        $manager->persist($jeu);

        $jeu = new Jeux();
        $jeu->setTitre("Krusty's Super Fun House");
        $jeu->setAnnee(1992);
        $jeu->setPrix(24.99);
        $jeu->setConsoleId($conSuper);
        $jeu->setCategorie($reflexion);
        $jeu->setPhoto('KrustySuperFunHouse1992.jpg');
        $jeu->setCompteur($faker->numberBetween(10, 150));
        $jeu->setDescription(" Krusty's est un jeu de réflexion dans lequel vous incarnez le clown pathétique des Simpsons. La maison de Krusty a été envahie par des rats et il vous incombe la tâche de les faire partir en les dirigeant vers des pièges. Pour ce faire, manipulez judicieusement les éléments de l'environnement de manière à conduire les rats dans la bonne direction.");
        $manager->persist($jeu);

        $jeu = new Jeux();
        $jeu->setTitre("The incredible Hulk");
        $jeu->setAnnee(1994);
        $jeu->setPrix(34.99);
        $jeu->setConsoleId($conSuper);
        $jeu->setCategorie($combat);
        $jeu->setPhoto('TheincredibleHulk1991.jpg');
        $jeu->setCompteur($faker->numberBetween(10, 150));
        $jeu->setDescription(" Prenez le contrôle de Hulk et du Dr.Banner dans The Incredible Hulk, c’est un jeu d'action où vous devez exploiter la force incroyable du géant vert pour vous débarrasser de vos assaillants. Lorsque vous êtes trop affaibli par les attaques, vous redevenez Bruce Banner, faiblement armé, et donc vulnérable. Cependant cette transformation sera nécessaire pour emprunter certains passages, trop étroits pour Hulk.");
        $manager->persist($jeu);

        $jeu = new Jeux();
        $jeu->setTitre("The Legend Of Zelda A link to the past");
        $jeu->setAnnee(1992);
        $jeu->setPrix(14.99);
        $jeu->setConsoleId($conSuper);
        $jeu->setCategorie($fantastic);
        $jeu->setPhoto('TheLegendOfZeldaAlinktothepast1992.jpg');
        $jeu->setCompteur($faker->numberBetween(10, 150));
        $jeu->setDescription(" Dans the Legend of Zelda : A Link to the Past, le joueur dirige Link dans sa quête pour sauver Hyrule. Dans ce jeu d'action/aventure en 2D, il est possible de basculer du monde des ténèbres à celui de la lumière pour sauver la princesse Zelda du sorcier Agahnim et trouver les nombreux objets nécessaires à l'accomplissement de la quête");
        $manager->persist($jeu);

        $jeu = new Jeux();
        $jeu->setTitre("Wolverine Adamantium Rage");
        $jeu->setAnnee(1994);
        $jeu->setPrix(29.99);
        $jeu->setConsoleId($conSuper);
        $jeu->setCategorie($action);
        $jeu->setPhoto('Wolverine1994.jpg');
        $jeu->setCompteur($faker->numberBetween(10, 150));
        $jeu->setDescription(" Wolverine est à la recherche de son passé lorsqu'il est contacté par une mystérieuse personne lui demandant de venir au Canada. Chaque niveau du jeu lèvera une partie du voile sur sa véritable identité. Le joueur dispose de plusieurs coups pour se défaire de ses ennemis, il est notamment possible de grimper aux murs grâce aux griffes du super-héros.");
        $manager->persist($jeu);

        $jeu = new Jeux();
        $jeu->setTitre("Super Mario Super AllStars");
        $jeu->setAnnee(1993);
        $jeu->setPrix(39.99);
        $jeu->setConsoleId($conSuper);
        $jeu->setCategorie($plateForme);
        $jeu->setPhoto('SuperMarioAllStar1993.jpg');
        $jeu->setCompteur($faker->numberBetween(10, 150));
        $jeu->setDescription(" Super Mario All-Stars est une compilation sur Super Nintendo de tous les jeux de plates-formes comprenant Mario sortis sur Nintendo. Y figurent donc : Super Mario Bros. 1, 2 et 3 ainsi que Super Mario Bros. : The Lost Levels, jusqu'alors jamais édité en Europe. Plus qu'une simple compilation, le jeu apporte des graphismes améliorés et la possibilité de sauvegarder sa progression. Les nostalgiques de la première console Nintendo ont de quoi être satisfaits");
        $manager->persist($jeu);

        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }
}
