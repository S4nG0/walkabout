-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 06 Juin 2015 à 17:01
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `walkabout`
--

-- --------------------------------------------------------

--
-- Structure de la table `wa__actualites`
--

CREATE TABLE IF NOT EXISTS `wa__actualites` (
  `idActualites` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(400) NOT NULL,
  `date` date DEFAULT NULL,
  `texte` mediumtext,
  `description` varchar(150) NOT NULL,
  `publie` varchar(5) DEFAULT NULL,
  `photos` longtext,
  `idAdministrateur` int(11) NOT NULL,
  PRIMARY KEY (`idActualites`),
  KEY `idAdministrateur` (`idAdministrateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `wa__actualites`
--

INSERT INTO `wa__actualites` (`idActualites`, `titre`, `date`, `texte`, `description`, `publie`, `photos`, `idAdministrateur`) VALUES
(1, '\nDécouvrez notre nouvelle destination : le Pérou !', '2015-03-27', '<p>\n                                Avez-vous toujours rêvé de partir à la rencontre d''une culture hors-du-commun ?\n                                Walkabout vous permet de réaliser ce rêve ! Découvrez notre nouvelle destination, le Pérou, et partez\n                                à la rencontre de la tribu des Quéchuas.\n                            </p>\n                            <p>\n                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.\n                                Minus sint odio illo perferendis quam odit in laborum deserunt libero eum, iure commodi\n                                tempore voluptatibus nihil dicta eveniet magni laudantium consectetur.\n                            </p>\n                            <a href="single-destination.php" class="button pull-left">Découvrez la destination</a>', 'Avez-vous toujours rêvé de partir à la rencontre d''une culture hors-du-commun ?', 'true', 'actus/perou.jpg', 1),
(4, '\nDécouvrez notre nouvelle destination : le Pérou !', '2015-03-27', '<p>\n                                Avez-vous toujours rêvé de partir à la rencontre d''une culture hors-du-commun ?\n                                Walkabout vous permet de réaliser ce rêve ! Découvrez notre nouvelle destination, le Pérou, et partez\n                                à la rencontre de la tribu des Quéchuas.\n                            </p>\n                            <p>\n                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.\n                                Minus sint odio illo perferendis quam odit in laborum deserunt libero eum, iure commodi\n                                tempore voluptatibus nihil dicta eveniet magni laudantium consectetur.\n                            </p>\n                            <a href="single-destination.php" class="button pull-left">Découvrez la destination</a>', 'Avez-vous toujours rêvé de partir à la rencontre d''une culture hors-du-commun ?', 'true', 'actus/perou.jpg', 2),
(5, 'Walkabout possède maintenant son propre site internet !', '2015-03-27', '<p>\n                                Amateurs de voyages en immersion réjouissez-vous ! Walkabout dispose désormais de son propre site internet !\n                                Walkabout est une agence de voyage spécialisée dans le voyage en immersion. Nous donnons à nos client la possibilité de vivre une expérience inoubliable et enrichissante et de la partager avec la communauté des voyageurs à travers un carnet de voyage modulable. Ce carnet constitue un élément central de notre vision du voyage en immersion.\n                            </p>\n                            <p>\n                                N''attendez plus ! Découvrez maintenant <a href="#">nos destinations</a> ou feuilletez les <a href="#">carnets de nos voyageurs</a> !\n                            </p>', ' Amateurs de voyages en immersion réjouissez-vous ! Walkabout dispose désormais de son propre site internet ! ', 'true', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `wa__administrateur`
--

CREATE TABLE IF NOT EXISTS `wa__administrateur` (
  `idAdministrateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `identifiant` varchar(45) DEFAULT NULL,
  `mdp` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idAdministrateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `wa__administrateur`
--

INSERT INTO `wa__administrateur` (`idAdministrateur`, `nom`, `prenom`, `identifiant`, `mdp`) VALUES
(1, 'CAPI', 'Aurélien', 'T4GAD4', '11f8114ae7af9eb95f365e33205ef0bb1941451f4fe84282437b820a1e70784c'),
(2, 'Julien', 'VANDERMEERSCH', 'ju.vdm', '71d5cb1e151515fd9c2cbdfb52a1984f21c26286b7784b921d6a06d056eebd3a'),
(3, 'lamoot', 'alexandre', 'dev', 'ef260e9aa3c673af240d17a2660480361a8e081d1ffeca2a5ed0e3219fc18567');

-- --------------------------------------------------------

--
-- Structure de la table `wa__articles`
--

CREATE TABLE IF NOT EXISTS `wa__articles` (
  `idArticles` int(11) NOT NULL AUTO_INCREMENT,
  `idCarnet` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `ordre` varchar(45) DEFAULT NULL,
  `titre` text,
  `texte` longtext,
  `photos` longtext,
  PRIMARY KEY (`idArticles`),
  KEY `idCarnet` (`idCarnet`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `wa__articles`
--

INSERT INTO `wa__articles` (`idArticles`, `idCarnet`, `date`, `ordre`, `titre`, `texte`, `photos`) VALUES
(1, 1, '2015-04-01', '1', 'Mon arrivé au village', '<div class="tb-article--content">\r\n<p class="lead">\r\n    &laquo;&nbsp;Je suis arrivé dans le village dans lequel j''allais être hébergé pendant 2 semaines&nbsp;&raquo;\r\n</p>\r\n\r\n<p>\r\nJ''ai r&eacute;serv&eacute; mon trek &agrave; partir de Cuzco. J''ai pris une agence au hasard qui m''a dit qu''on serait au maximum 20 pour le trek, et on s''est retrouv&eacute; &agrave; 19 (sans compter le guide et les accompagnateurs), r&eacute;sultat en fait du groupement de plusieurs agences, avec certains qui s''attendaient &agrave; &ecirc;tre entre eux, &agrave; 5... Globalement, le groupe &eacute;tait sympathique, chacun &agrave; son rythme. Je me suis bien entendu avec la plupart d''entre eux. On est rest&eacute; 4 jours ensemble.</p>\r\n<img src="http://mesvoyages.net/Images/Perou/Matchup2.JPG" alt="La photo classique du Matchu Picchu, qu''on ne peut s''emp&ecirc;cher de faire pourtant en arrivant tellement c''est beau"/>\r\n<p>Le d&eacute;part de Cuzco se fait en bus jusqu''&agrave; un certain point, le km88, o&ugrave;, le long de la voie de chemin de fer qui va de Cuzco jusqu''&agrave; Matchu Picchu, l''on descend et d''o&ugrave; l''on marche, notre sac sur le dos. La <a name="1"></a>premi&egrave;re journ&eacute;e de marche, commen&ccedil;ant &agrave; 2200 m, est &agrave; peu pr&egrave;s plate jusqu''&agrave; 2750m, et pas trop longue et l''on est arriv&eacute; pr&egrave;s d''une petite maison o&ugrave; les accompagnateurs ont plant&eacute; les tentes, et o&ugrave; l''on a eu un repas fort sympathique. Plus tard, avec la nuit, on s''est demand&eacute; comment on allait dormir et l&agrave;, angoisse... il n''y avait pas assez de place dans les tentes. En fait, ils n''avaient pas pris assez de tentes. Certains sont all&eacute;s dans la petite maison, partageant la salle commune avec la famille qui &eacute;tait l&agrave;, d''autres dans les tentes et j''&eacute;tais sur le balcon devant la maison, dehors, par cette nuit froide. J''ai sorti mon duvet, ma couverture de survie pour me prot&eacute;ger le corps du vent, mes sacs poubelle pour faire un esp&egrave;ce d''abris face au vent, suspendus sur la rambarde du balcon. Je n''avais m&ecirc;me pas assez de place pour les jambes car un second trekker se trouvait aussi sur le balcon, dans l''alignement, ses jambes &agrave; lui d&eacute;passant au dessus de l''escalier. Dur pour une premi&egrave;re nuit, mais j''ai finalement bien dormi. Le lendemain soir, avant de nous coucher, le cuisinier, qui &eacute;tait responsable des tentes (et donc &eacute;tait rendu responsable devant tout le monde de l''oubli par le guide, alors que je pense que c''&eacute;tait le guide qui &eacute;tait responsable de ne pas avoir v&eacute;rifi&eacute;) et &eacute;tait redescendu &agrave; pieds en chercher, &eacute;tait revenu de la m&ecirc;me fa&ccedil;on avec d''autres tentes. Il a fait l''aller-retour (+ du stop jusqu''&agrave; Cuzco) dans la journ&eacute;e !</p>\r\n<img src="http://mesvoyages.net/Images/Perou/Col4200.JPG" alt="Le col &agrave; 4200 m"/>\r\n<p>La <a name="2"></a>seconde journ&eacute;e fut la plus dure, avec une ascension jusqu''&agrave; 4200 m dans la matin&eacute;e, en partant de 2750 m, soient 1450 m de d&eacute;nivel&eacute; d''un trait. C''est dur, mais j''aime cela, et je suis arriv&eacute; au col en bon &eacute;tat, en m&ecirc;me temps que la plupart. Il y a deux autres cols pendant le trek, mais ils ne sont pas trop durs. Certaines jeunes filles, qui faisaient pourtant partie d''un groupe d''Isra&eacute;liens sortant de leur service militaire (un grand classique en voyage que ces jeunes qui veulent se changer les id&eacute;es apr&egrave;s trois ans de service militaire - bien s&ucirc;r l''un d''entre eux n''arr&ecirc;tait pas de manipuler une machette qu''il portait dans son dos &agrave; la Rambo, ce qui mettait mal &agrave; l''aise tout le monde vu qu''en plus il ne souriait jamais, mais bon, on fait avec), ont eu beaucoup de mal, parce qu''avec leur sac (plus volumineux qu''elles) sur le dos ce fut tr&egrave;s dur. Mais leurs copains sont redescendus les aider, apr&egrave;s avoir d&eacute;pos&eacute; leur propre sac au col !</p>\r\n<p>On a mang&eacute; au col, en plein vent et, comme d''habitude, la nourriture fut excellente. Au soir, on s''est retrouv&eacute; en pleine nature, et on a pu dormir dans des tentes. Rien d''autre de sp&eacute;cial &agrave; signaler ce second jour. Le <a name="3"></a>troisi&egrave;me jour, apr&egrave;s le petit d&eacute;jeuner, on est parti vers la suite de notre voyage, pour une journ&eacute;e qui m''a sembl&eacute; longue. On a visit&eacute; un temple solaire, bien orient&eacute;, on a mang&eacute; sur un flanc de montagne orient&eacute; vers le Nord, dans un coin qui s''appelait la vall&eacute;e de la pluie... et il a plut. Puis on a march&eacute;, toujours sur ce flanc de montagne, dans un paysage tr&egrave;s humide, amazonien, avec des lianes, des murs de mousse o&ugrave; l''on peut plonger le bras sans toucher le rocher et un sol glissant. On est pass&eacute; dans des tunnels creus&eacute;s par les Incas suivant une technique ancestrale, utilisant le gonflement du bois mouill&eacute; pour faire exploser la roche. Le soir on est arriv&eacute; pr&egrave;s d''un b&acirc;timent en dur o&ugrave;, tout en dormant dans les tentes, on a pu aller prendre une douche (bienvenue), et manger assis sur une chaise, sur une table.</p>\r\n</div>', 'voyages/perou/03.jpg;voyages/perou/02.jpg;voyages/perou/03.jpg;voyages/perou/04.jpg;voyages/perou/05.jpg;'),
(3, 2, '2014-12-10', '1', 'Jour 1 : Lima', '<div class="tb-article--content">\r\n<p>Ce n’etait pas le point culminant de nos centres d’intérêt, mais nous y avons quand même passé trente six heures ce qui nous a permis de faire une rapide visite du couvent San Francisco(avec de superbes azuleros) du Museo Postal du patio du Ministère Des Affaires Etrangères. Nous avons eu le temps d’assister à une cérémonie sur les marches du Palais du Gouvernement: les maires étaient reçus par le Président de la République (dont la femme est d’origine française, nous a précisé un policier posté devant les grilles - Il se trompait, Eliana Karp est d''origine belge :-) De l’autre côté de la Plaza de Armas nous avons pu entendre une chorale de plusieurs centaines de jeunes chantant pour le rétablissement du Pape.</p>\r\n<p>Notre hôtel situé à Miraflores se trouve pas très loin d’un centre commercial moderne et assez luxueux, surplombant la mer au dessus des falaises. De nombreux restaurants servent d’excellents poissons. Pour manger une bonneceviche il vaut mieux choisir les restaurants situés sur les niveaux les plus élevés. C’est dans ce centre commercial que nous avons découvert les magasins d’alpaga et de vigogne les plus chics.</p>\r\n</div>', ''),
(4, 2, '2014-12-18', '2', 'Jour 2 : Nazca', '<div class="tb-article--content">\r\n<p>La voiture qui nous emmène vers le sud et Nazca traverse des paysages étonnants, tantôt le long du Pacifique, tantôt s’enfonçant dans les terres, tantôt lunaires, tantôt laissant penser que la route file dans un gigantesque tableau impressionniste, avec une palette de couleurs tendres variant à l’infini, à chaque virage, à chaque changement de lumière. Nous avons voulu éviter l’arrêt aux îles Ballestas.</p>\r\n<p class="lead">La voiture qui nous emmène vers le sud et Nazca traverse des paysages étonnants</p>\r\n<p>Nous avons fait connaissance avec le Pisco Sur, cette boisson traditionnelle que nous avons vu fabriquer dans une bodega près d’Ica, capitale du Pisco. Le goût du pisco ne nous a pas convaincu, mais peut-être faut-il habituer son palais? Nous en avons cependant acheté une petite fiole qui rejoindra dans un placard à alcool la tequila mexicaine et l’ouzo grec.</p>\r\n<p>En arrivant à Nazca, un petit avion, retenu par l’agence,nous a fait survoler pendant une demi-heure les étranges lignes. Le pilote prenant soin de tourner au-dessus de chaque dessin dans un sens puis dans l’autre nous a permis de très bien voir ces messages mystérieux, mais il vaut mieux avoir l’estomac bien accroché (l’un de nous en a souffert)</p>\r\n</div>', ''),
(5, 2, '2015-05-20', NULL, 'Jour 3', '<div class="tb-article--content">\r\n<p class="lead">Nous faisons également plus ample connaissance avec notre guide-interprète.</p>\r\n<p>Départ pour Saraguro, à la rencontre de cette communauté dans le petit village de Quisquinchir,  un assez long périple en voiture qui nous permet de découvrir des paysages andins  sous la brume, mais ça rajoute un peu de magie aux montagnes. Nous faisons également plus ample connaissance avec notre guide-interprète qui nous raconte l’histoire de son pays. Une pause " fruits " est organisée et nous voilà  devant un étal de couleurs, saveurs, odeurs à nous "gaver" de fruits connus et inconnus, tous excellents. </p>\r\n<p>Arrivée le soir dans nos familles, installation et rapide visite des lieux : que de sourires partout !!</p>\r\n</div>', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `wa__carnetdevoyage`
--

CREATE TABLE IF NOT EXISTS `wa__carnetdevoyage` (
  `idCarnetDeVoyage` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `publie` varchar(5) NOT NULL,
  `titre` varchar(100) DEFAULT NULL,
  `description` varchar(500) NOT NULL,
  `idUsers` int(11) NOT NULL,
  `idVoyage` int(11) NOT NULL,
  `idDestination` int(11) NOT NULL,
  `image_carnet` varchar(50) NOT NULL,
  `favoris` varchar(5) NOT NULL DEFAULT 'false',
  PRIMARY KEY (`idCarnetDeVoyage`),
  KEY `idUsers` (`idUsers`,`idVoyage`),
  KEY `idVoyage` (`idVoyage`),
  KEY `idDestination` (`idDestination`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `wa__carnetdevoyage`
--

INSERT INTO `wa__carnetdevoyage` (`idCarnetDeVoyage`, `date`, `publie`, `titre`, `description`, `idUsers`, `idVoyage`, `idDestination`, `image_carnet`, `favoris`) VALUES
(1, '2015-03-05', 'true', 'Mon aventure chez les Quéchuas', 'J''ai passé une merveilleuse expérience chez les Quéchuas du Pérou...', 1, 1, 1, 'cdv1.jpg', 'false'),
(2, '2015-03-05', 'true', 'Moi chez les péruviens', 'Une destination magnifique,<br/>et une expérience de voyage inoubliable', 1, 2, 1, 'carnets/peru.jpg', 'true'),
(3, '2015-03-05', 'true', 'Moi chez les péruviens', 'Une destination magnifique,<br/>et une expérience de voyage inoubliable', 2, 2, 1, 'cdv1.jpg', 'false'),
(4, '2015-03-05', 'true', 'Moi chez les péruviens', 'Une destination magnifique,<br/>et une expérience de voyage inoubliable', 2, 2, 1, 'carnets/peru.jpg', 'false');

-- --------------------------------------------------------

--
-- Structure de la table `wa__civilite`
--

CREATE TABLE IF NOT EXISTS `wa__civilite` (
  `idCivilite` int(11) NOT NULL AUTO_INCREMENT,
  `civilite` varchar(45) NOT NULL,
  PRIMARY KEY (`idCivilite`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `wa__civilite`
--

INSERT INTO `wa__civilite` (`idCivilite`, `civilite`) VALUES
(1, 'Monsieur'),
(2, 'Madame');

-- --------------------------------------------------------

--
-- Structure de la table `wa__commentaires`
--

CREATE TABLE IF NOT EXISTS `wa__commentaires` (
  `idCommentaires` int(11) NOT NULL AUTO_INCREMENT,
  `idCarnet` int(11) NOT NULL,
  `idUsers` int(11) NOT NULL,
  `date` date NOT NULL,
  `texte` longtext,
  `modere` varchar(5) DEFAULT NULL,
  `data` varchar(500) NOT NULL,
  PRIMARY KEY (`idCommentaires`),
  KEY `idCarnet` (`idCarnet`,`idUsers`),
  KEY `idUsers` (`idUsers`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `wa__commentaires`
--

INSERT INTO `wa__commentaires` (`idCommentaires`, `idCarnet`, `idUsers`, `date`, `texte`, `modere`, `data`) VALUES
(1, 1, 2, '2015-04-04', 'Tu m''as vraiment donné envie de visiter les Quechuas ! Ils ont vraiment l''air d''être un peuple facinant. As-tu été visité le temple ? Des amis m''ont dit que c''était l''un des plus beaux qu''ils aient vu !', 'true', ''),
(2, 1, 1, '2015-04-04', 'Merci pour ton commentaire !<br/>\r\nOui, j''ai visité le temple ! Je prépare actuellement un article à ce sujet.', 'true', ''),
(3, 1, 2, '2015-04-05', 'J''ai hâte de lire ce que tu en as pensé !', 'true', ''),
(5, 2, 1, '2015-04-04', 'Tu m''as vraiment donné envie de visiter les Quechuas ! Ils ont vraiment l''air d''être un peuple facinant. As-tu été visité le temple ? Des amis m''ont dit que c''était l''un des plus beaux qu''ils aient vu !', 'true', ''),
(6, 2, 2, '2015-04-04', 'Merci pour ton commentaire !<br/>\r\nOui, j''ai visité le temple ! Je prépare actuellement un article à ce sujet.', 'true', ''),
(7, 2, 1, '2015-04-05', 'J''ai hâte de lire ce que tu en as pensé !', 'true', ''),
(11, 3, 1, '2015-05-14', 'Hé béh!! Il manque beaucoup de contenu sur ce carnet! ;)', 'true', '{"nom":"CAPI","prenom":"Aur\\u00e9lien","email":null}');

-- --------------------------------------------------------

--
-- Structure de la table `wa__contact`
--

CREATE TABLE IF NOT EXISTS `wa__contact` (
  `idContact` int(11) NOT NULL AUTO_INCREMENT,
  `idVoyage` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `mail` varchar(45) DEFAULT NULL,
  `sujet` varchar(45) DEFAULT NULL,
  `message` longtext,
  PRIMARY KEY (`idContact`),
  KEY `idVoyage` (`idVoyage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `wa__destination`
--

CREATE TABLE IF NOT EXISTS `wa__destination` (
  `idDestination` int(11) NOT NULL AUTO_INCREMENT,
  `idPays` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `description` longtext NOT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `coordonnees` varchar(50) NOT NULL,
  `photos` longtext,
  `banner` varchar(50) NOT NULL,
  PRIMARY KEY (`idDestination`),
  KEY `idPays` (`idPays`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `wa__destination`
--

INSERT INTO `wa__destination` (`idDestination`, `idPays`, `titre`, `nom`, `description`, `ville`, `coordonnees`, `photos`, `banner`) VALUES
(1, 3, 'À LA DÉCOUVERTE DES QUECHUAS DU PÉROU', 'Voyage à Lima', 'Dans les montagnes, les Quechuas élèvent traditionnellement des lamas et des alpagas pour leur laine et leur viande.\n                                Ces animaux vivent en haute altitude ce qui oblige les hommes à s’établir sur des terres arides où rien ne pousse ou presque.\n                                Pourtant, les Quechuas sont également agriculteurs. Ils réussissent l’exploit de cultiver un véritable trésor : la pomme de terre.\n                                Plus qu’un aliment, la pomme de terre est l’emblème de la culture andine, elle symbolise la fertilité. Certaines sont même sacrées.\n                                Elles sont offertes à la Pachamama, « la terre mère », pour la remercier de ses bienfaits et implorer sa protection\n                                pour la récolte à venir.\n                                <br /><br />\n                                Au quotidien, les Quechuas vénèrent la nature sous toutes ses formes. Pour eux, les montagnes sont des Dieux et\n                                ils n’hésitent pas à effectuer un long voyage et à gravir des sommets vertigineux pour recueillir la glace sacrée\n                                qui bénira leur troupeau et leur terre.\n                                <br /><br />\n                                Faites l’expérience de leur culture en vous y immergeant  !', 'Lima', '-12.04,-77.04', 'voyages/perou/01.jpg;voyages/perou/04.jpg;voyages/perou/03.jpg;voyages/perou/02.jpg;voyages/perou/05.jpg;', 'perou-banner.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `wa__etatreservation`
--

CREATE TABLE IF NOT EXISTS `wa__etatreservation` (
  `idEtatReservation` int(11) NOT NULL AUTO_INCREMENT,
  `idReservation` int(11) NOT NULL,
  `etat` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idEtatReservation`),
  KEY `idReservation` (`idReservation`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `wa__etatreservation`
--

INSERT INTO `wa__etatreservation` (`idEtatReservation`, `idReservation`, `etat`) VALUES
(1, 5, 'Terminée'),
(2, 14, 'En cours'),
(3, 9, 'En cours'),
(4, 15, 'En cours'),
(7, 19, 'En cours');

-- --------------------------------------------------------

--
-- Structure de la table `wa__infoscomplementaire`
--

CREATE TABLE IF NOT EXISTS `wa__infoscomplementaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idDestination` int(11) NOT NULL,
  `information` mediumtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idVoyage` (`idDestination`),
  KEY `idDestination` (`idDestination`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `wa__infoscomplementaire`
--

INSERT INTO `wa__infoscomplementaire` (`id`, `idDestination`, `information`) VALUES
(1, 1, '<h3>Accompagnement</h3>\r\n                                        <p>\r\n                                            1 guide bilingue français/espagnol sur l’ensemble du séjour + guides locaux selon les spots\r\n                                        </p>'),
(2, 1, '<h3>Déplacements</h3><p>\r\n                                            Transport privé ou bus collectif (selon les régions traversées) + balades à pied, en pirogue, à vélo\r\n                                        </p>'),
(3, 1, '                                        <h3>Hébergement</h3>\r\n                                        <p>\r\n                                            5 nuits à l’hôtel / 5 nuits chez l’habitant / 1 nuit en vol\r\n                                        </p>'),
(4, 1, '                                        <h3>Repas &amp; Boissons</h3>\r\n                                        <p>\r\n                                            Tous les repas sont compris / l’eau minérale est servie pendant les repas\r\n                                        </p>');

-- --------------------------------------------------------

--
-- Structure de la table `wa__infosdestinations`
--

CREATE TABLE IF NOT EXISTS `wa__infosdestinations` (
  `idInfosDestinations` int(11) NOT NULL AUTO_INCREMENT,
  `idDestination` int(11) NOT NULL,
  `titre` varchar(45) DEFAULT NULL,
  `valeur` varchar(45) DEFAULT NULL,
  `image` varchar(455) NOT NULL,
  PRIMARY KEY (`idInfosDestinations`),
  KEY `idDestination` (`idDestination`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `wa__infosdestinations`
--

INSERT INTO `wa__infosdestinations` (`idInfosDestinations`, `idDestination`, `titre`, `valeur`, `image`) VALUES
(1, 1, 'Habite', 'Chez l''habitant', 'info-pics/pension.png'),
(2, 1, 'Animaux', 'acceptés', 'info-pics/animals.png'),
(3, 1, 'météo', 'varié', 'info-pics/climat.png'),
(4, 1, 'monnaie', 'nuevo sol', 'info-pics/currency.png'),
(6, 1, 'passport', 'obligatoire', 'info-pics/passport.png');

-- --------------------------------------------------------

--
-- Structure de la table `wa__level`
--

CREATE TABLE IF NOT EXISTS `wa__level` (
  `idLevel` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(45) NOT NULL,
  PRIMARY KEY (`idLevel`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `wa__level`
--

INSERT INTO `wa__level` (`idLevel`, `level`) VALUES
(1, '1'),
(2, '2');

-- --------------------------------------------------------

--
-- Structure de la table `wa__newsletter`
--

CREATE TABLE IF NOT EXISTS `wa__newsletter` (
  `idNewsletter` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`idNewsletter`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `wa__payement`
--

CREATE TABLE IF NOT EXISTS `wa__payement` (
  `idPayement` int(11) NOT NULL AUTO_INCREMENT,
  `idReservation` int(11) NOT NULL,
  `typePayement` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPayement`),
  KEY `idReservation` (`idReservation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `wa__paypal`
--

CREATE TABLE IF NOT EXISTS `wa__paypal` (
  `idPaypal` int(11) NOT NULL AUTO_INCREMENT,
  `idPayement` int(11) NOT NULL,
  `token` varchar(500) NOT NULL,
  `timestamp` varchar(500) NOT NULL,
  `correlationId` varchar(500) NOT NULL,
  `ack` varchar(500) NOT NULL,
  `transactionType` varchar(500) NOT NULL,
  `payementType` varchar(500) NOT NULL,
  `amt` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idPaypal`),
  KEY `idPayement` (`idPayement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `wa__pays`
--

CREATE TABLE IF NOT EXISTS `wa__pays` (
  `idPays` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `capitale` varchar(45) NOT NULL,
  `monnaie` varchar(45) DEFAULT NULL,
  `Dirigeant(e)` varchar(45) NOT NULL,
  `langues` varchar(45) NOT NULL,
  `population` varchar(45) DEFAULT NULL,
  `superficie` varchar(45) DEFAULT NULL,
  `densité` varchar(45) DEFAULT NULL,
  `climat` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPays`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `wa__pays`
--

INSERT INTO `wa__pays` (`idPays`, `nom`, `capitale`, `monnaie`, `Dirigeant(e)`, `langues`, `population`, `superficie`, `densité`, `climat`) VALUES
(2, 'Australie', 'Canberra', 'Dollar australien', 'Élisabeth II', 'Anglais', '23 500 000 Habitants', '7 686 850 Km²', '3 Hab./km²', 'varié'),
(3, 'Pérou', 'Lima', 'Nuevo sol', 'Ollanta Humala', 'Espagnol, Quechua et Aymara', '29 907 003 Habitants', '1 285 315 Km²', '22 Hab./km²', 'varié');

-- --------------------------------------------------------

--
-- Structure de la table `wa__personnalisation`
--

CREATE TABLE IF NOT EXISTS `wa__personnalisation` (
  `idPersonnalisation` int(11) NOT NULL AUTO_INCREMENT,
  `idCarnet` int(11) NOT NULL,
  `couleur_fond` varchar(45) DEFAULT NULL,
  `couleur_texte` varchar(45) DEFAULT NULL,
  `couleur_titre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPersonnalisation`),
  KEY `idCarnet` (`idCarnet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `wa__reservation`
--

CREATE TABLE IF NOT EXISTS `wa__reservation` (
  `idReservation` int(11) NOT NULL AUTO_INCREMENT,
  `idVoyage` int(11) NOT NULL,
  `idUsers` int(11) NOT NULL,
  `nb_personnes` int(11) NOT NULL,
  `date` varchar(10) NOT NULL,
  PRIMARY KEY (`idReservation`),
  KEY `idVoyage` (`idVoyage`),
  KEY `idUsers` (`idUsers`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `wa__reservation`
--

INSERT INTO `wa__reservation` (`idReservation`, `idVoyage`, `idUsers`, `nb_personnes`, `date`) VALUES
(5, 1, 1, 2, '2015-01-25'),
(9, 2, 2, 4, '2015-01-25'),
(14, 2, 1, 2, '2015-05-27'),
(15, 2, 12, 2, '2015-05-27'),
(19, 2, 15, 1, '2015-05-27');

-- --------------------------------------------------------

--
-- Structure de la table `wa__sessions`
--

CREATE TABLE IF NOT EXISTS `wa__sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `wa__sessions`
--

INSERT INTO `wa__sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('ec3da27a91fd62e5259b9ab9b545661a', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:38.0) Gecko/20100101 Firefox/38.0', 1433602738, ''),
('b0c7009e3122fff57beed8d45edf1f24', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.81 Safari/537.36', 1433602742, 'a:1:{s:11:"destination";s:1:"1";}');

-- --------------------------------------------------------

--
-- Structure de la table `wa__users`
--

CREATE TABLE IF NOT EXISTS `wa__users` (
  `idUsers` int(11) NOT NULL AUTO_INCREMENT,
  `idLevel` int(11) NOT NULL,
  `mail` varchar(45) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `adresse1` varchar(150) NOT NULL,
  `adresse2` varchar(150) NOT NULL,
  `CP` varchar(45) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `pays` varchar(100) NOT NULL,
  `tel_fixe` varchar(20) NOT NULL,
  `tel_port` varchar(20) NOT NULL,
  `date_naissance` date NOT NULL,
  `num_activation` varchar(45) NOT NULL,
  `active` varchar(5) NOT NULL,
  `photo` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idUsers`),
  KEY `idLevel` (`idLevel`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `wa__users`
--

INSERT INTO `wa__users` (`idUsers`, `idLevel`, `mail`, `mdp`, `nom`, `prenom`, `adresse1`, `adresse2`, `CP`, `ville`, `pays`, `tel_fixe`, `tel_port`, `date_naissance`, `num_activation`, `active`, `photo`) VALUES
(1, 1, 'aurelien.capi@gmail.com', '11f8114ae7af9eb95f365e33205ef0bb1941451f4fe84282437b820a1e70784c', 'CAPI', 'Aurélien', '654 rue du plouy', '', '62232', 'HINGES', 'FRANCE', '0321640744', '0623974082', '1992-10-28', '7851659894615189', 'true', 'profile2.png'),
(2, 1, 'celine@gmail.com', 'celine', 'Vano', 'Céline', '654 rue du plouy', '', '62232', 'HINGES', 'FRANCE', '0321643775', '0623974082', '1992-10-28', '549846519181915', 'true', 'profile.png'),
(12, 1, 'capi.aurelien@gmail.com', '11f8114ae7af9eb95f365e33205ef0bb1941451f4fe84282437b820a1e70784c', 'CAPI', 'Aurélien', '654 rue du plouy', '', '62232', 'HINGES', 'FRANCE', '', '', '1992-10-28', '3oKvnpMuhP4lNF2Zka', 'true', 'unsigned_user.jpg'),
(13, 1, 'julien.vdm@gmail.com', 'f938f74c4081a8994371697781acc42e163d893149dc255cec3bf1c4ce3ab7ab', 'Vandermeersch', 'Julien', '87 rue des Orions', '87 rue des Orions', '59200', 'Tourcoing', 'France', '0301020304', '', '1990-03-10', 'eROhZ3kZpa5YhPCY7X', 'true', 'unsigned_user.jpg'),
(14, 1, 'capi.aurelien@yopmail.fr', '11f8114ae7af9eb95f365e33205ef0bb1941451f4fe84282437b820a1e70784c', 'CAPI', 'aurélien', '654 rue du plouy', '', '62232', 'Hinges', 'fzfqfqzfqfzf', '', '', '1992-10-28', '0xV9E6dv9XR1lcUfCO', 'true', 'unsigned_user.jpg'),
(15, 1, 'aurelien.capi@yopmail.com', '11f8114ae7af9eb95f365e33205ef0bb1941451f4fe84282437b820a1e70784c', 'capi', 'Aurélien', '654 rue du plouy', '', '62232', 'Hinges', 'FRANCE', '', '', '1992-10-28', 'THag5VT6fiojoZiemo', 'true', 'unsigned_user.jpg'),
(16, 1, 'nightrei@hotmail.fr', 'c775e7b757ede630cd0aa1113bd102661ab38829ca52a6422ab782862f268646', 'valet', 'kevin', 'khfeiozhoifeh', 'kjdzkjs', '59000', 'oziapoepza', 'reservoir', '', '', '0000-00-00', 'YGhTWxlY6f7tY8MH32', 'false', 'unsigned_user.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `wa__voyage`
--

CREATE TABLE IF NOT EXISTS `wa__voyage` (
  `idVoyage` int(11) NOT NULL AUTO_INCREMENT,
  `idDestination` int(11) NOT NULL,
  `idInfos` int(11) NOT NULL,
  `date_depart` date DEFAULT NULL,
  `date_retour` date DEFAULT NULL,
  `prix` float NOT NULL,
  `nb_places` int(3) NOT NULL,
  PRIMARY KEY (`idVoyage`),
  KEY `idDestination` (`idDestination`,`idInfos`),
  KEY `idInfos` (`idInfos`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `wa__voyage`
--

INSERT INTO `wa__voyage` (`idVoyage`, `idDestination`, `idInfos`, `date_depart`, `date_retour`, `prix`, `nb_places`) VALUES
(1, 1, 2, '2015-03-28', '2015-04-03', 5200, 20),
(2, 1, 2, '2015-05-20', '2015-06-02', 4700, 5);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `wa__actualites`
--
ALTER TABLE `wa__actualites`
  ADD CONSTRAINT `id_actu_admin` FOREIGN KEY (`idAdministrateur`) REFERENCES `wa__administrateur` (`idAdministrateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `wa__articles`
--
ALTER TABLE `wa__articles`
  ADD CONSTRAINT `id_article_carnet` FOREIGN KEY (`idCarnet`) REFERENCES `wa__carnetdevoyage` (`idCarnetDeVoyage`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `wa__carnetdevoyage`
--
ALTER TABLE `wa__carnetdevoyage`
  ADD CONSTRAINT `id_carnet_destination` FOREIGN KEY (`idDestination`) REFERENCES `wa__destination` (`idDestination`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_carnet_users` FOREIGN KEY (`idUsers`) REFERENCES `wa__users` (`idUsers`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_carnet_voyage` FOREIGN KEY (`idVoyage`) REFERENCES `wa__voyage` (`idVoyage`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `wa__commentaires`
--
ALTER TABLE `wa__commentaires`
  ADD CONSTRAINT `id_com_carnet` FOREIGN KEY (`idCarnet`) REFERENCES `wa__carnetdevoyage` (`idCarnetDeVoyage`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_com_users` FOREIGN KEY (`idUsers`) REFERENCES `wa__users` (`idUsers`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `wa__contact`
--
ALTER TABLE `wa__contact`
  ADD CONSTRAINT `id_contact_voyage` FOREIGN KEY (`idVoyage`) REFERENCES `wa__voyage` (`idVoyage`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `wa__destination`
--
ALTER TABLE `wa__destination`
  ADD CONSTRAINT `id_destination_pays` FOREIGN KEY (`idPays`) REFERENCES `wa__pays` (`idPays`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `wa__etatreservation`
--
ALTER TABLE `wa__etatreservation`
  ADD CONSTRAINT `id_etatreservation_reservation` FOREIGN KEY (`idReservation`) REFERENCES `wa__reservation` (`idReservation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `wa__infoscomplementaire`
--
ALTER TABLE `wa__infoscomplementaire`
  ADD CONSTRAINT `wa__infoscomplementaire_ibfk_1` FOREIGN KEY (`idDestination`) REFERENCES `wa__destination` (`idDestination`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `wa__infosdestinations`
--
ALTER TABLE `wa__infosdestinations`
  ADD CONSTRAINT `id_infos_destination` FOREIGN KEY (`idDestination`) REFERENCES `wa__destination` (`idDestination`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `wa__payement`
--
ALTER TABLE `wa__payement`
  ADD CONSTRAINT `id_payement_reservation` FOREIGN KEY (`idReservation`) REFERENCES `wa__reservation` (`idReservation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `wa__paypal`
--
ALTER TABLE `wa__paypal`
  ADD CONSTRAINT `id_paypal_payement` FOREIGN KEY (`idPayement`) REFERENCES `wa__payement` (`idPayement`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `wa__personnalisation`
--
ALTER TABLE `wa__personnalisation`
  ADD CONSTRAINT `id_perso_carnet` FOREIGN KEY (`idCarnet`) REFERENCES `wa__carnetdevoyage` (`idCarnetDeVoyage`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `wa__reservation`
--
ALTER TABLE `wa__reservation`
  ADD CONSTRAINT `wa__reservation_ibfk_1` FOREIGN KEY (`idVoyage`) REFERENCES `wa__voyage` (`idVoyage`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `wa__reservation_ibfk_2` FOREIGN KEY (`idUsers`) REFERENCES `wa__users` (`idUsers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `wa__users`
--
ALTER TABLE `wa__users`
  ADD CONSTRAINT `id_users_level` FOREIGN KEY (`idLevel`) REFERENCES `wa__level` (`idLevel`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `wa__voyage`
--
ALTER TABLE `wa__voyage`
  ADD CONSTRAINT `id_voyage_destination` FOREIGN KEY (`idDestination`) REFERENCES `wa__destination` (`idDestination`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_voyage_infos` FOREIGN KEY (`idInfos`) REFERENCES `wa__infosdestinations` (`idInfosDestinations`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
