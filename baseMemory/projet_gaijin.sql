-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 06 oct. 2021 à 10:22
-- Version du serveur : 10.4.20-MariaDB
-- Version de PHP : 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_gaijin`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sous_titre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `titre`, `sous_titre`, `description`) VALUES
(1, 'GUIDE DE VOYAGE', 'Préparer et réussir son séjour japonais', 'Le Japon est une destination qui attire de plus en plus de voyageurs étrangers à travers le monde. En 2017, pour la première fois, ils étaient près de trente millions à fouler ses terres et les chiffres continuent de croître. Si les Asiatiques (Chinois, Sud-Coréens, Taïwanais...) sont les premiers touristes de l\'archipel, les Français ne sont généralement pas reste.\r\n\r\nPartir au Japon n\'est plus si difficile que ça ne pouvait l\'être à une époque, mais il convient de bien se renseigner pour en profiter au mieux. Pour cela, nous vous livrons ici l\'ensemble des informations nécessaires et vous proposons de répondre à toutes vos interrogations sur le sujet.\r\n\r\nGrâce à Kanpai, préparez votre séjour au Japon en toute sérénité pour bien voyager sans dépenser plus qu\'il ne faut. Retrouvez tous nos guides pratiques : visites au Japon, hébergements, transports, téléphone 📱 et Internet 📶, cuisine japonaise, calendrier par saison et bien d\'autres informations.\r\n\r\nDans notre grand guide de destinations au Japon (bouton ci-dessus) : des fiches individuelles descriptives par visite, agencées géographiquement, ornées d\'une carte et de nombreuses informations pratiques, illustrées de photos / vidéos et accompagnées de tous les bons plans touristiques parfois méconnus.\r\n\r\nÀ partir du 7 janvier 2019, tous les étrangers qui quittent le Japon, par exemple après un voyage de tourisme, s\'acquittent d\'une taxe internationale de 1.000¥ (~7,76€), collectée par les compagnies aériennes sur les billets retour sauf sur les enfants de moins de 2 ans. Les sommes collectées servent à améliorer les conditions de voyage touristique du pays.'),
(2, 'VISITES AU JAPON', 'Les destinations touristiques de l\'archipel', 'L\'archipel japonais est constitué de près de 7.000 îles, qui s\'étendent d\'Hokkaido au nord-est jusqu\'à Okinawa au sud-ouest, sur 3.000 kilomètres de long et 378.000 km². C\'est dire la variété des paysages promis à la découverte dans chacune de ses quarante-sept préfectures.\r\n\r\nLes quatre îles principales, avec Honshu en tête de file, couvrent à elles seules 95% de la superficie du Japon, dont les montagnes occupent plus des deux-tiers du territoire.\r\n\r\nNombreux sont les visiteurs à s\'arrêter à Tokyo et Kyoto ; sur Kanpai, sans les renier, nous cherchons à aller beaucoup plus loin et vous faire découvrir aussi bien les spots immanquables que de superbes visites insoupçonnées nichées dans tout le Japon.\r\n\r\nRetrouvez d\'innombrables destinations de séjour au Japon, des visites les plus touristiques aux lieux tout à fait confidentiels, des temples et sanctuaires majestueux aux découvertes insolites plus modestes, du dyptique incontournable à l\'étendue complète du Japon, des cîmes d\'Hokkaido jusqu\'aux plages 🏖 d\'Okinawa.\r\n\r\nNos fiches de voyage, toutes réalisées par des reporters Kanpai sur place, sont accompagnées d\'informations pratiques pour vous y rendre et agrémentées de nos propres photos ou vidéos pour apprécier les visites depuis votre écran.\r\n\r\nEt pour éviter les déceptions, vérifiez avant chaque visite les travaux et fermetures temporaires.'),
(3, 'SOCIETE & CULTURE', 'A la rencontre d\'une autre culture', 'La société japonaise et son fonctionnement peuvent parfois sembler déroutants d’un point de vue occidental.\r\n\r\nQui sont vraiment les Japonais et comment vivent-ils au quotidien ? Au-delà des préjugés, qu’ils soient négatifs (opposition honne / tatemae) ou positifs (gentillesse et propreté), cette thématique cherche à mieux connaître et comprendre les spécificités de la société japonaise en examinant différentes facettes, dont :\r\n\r\nLes traditions et la culture,\r\nLe fonctionnement contemporain de la société,\r\nLes sujets d’actualité,\r\nL’influence de la société japonaise hors des frontières de l’archipel.\r\nSur un plan plus pragmatique, cela passe notamment par la connaissance d’éléments de la langue japonaise, des guides pratiques utiles pour la vie quotidienne et la comparaison de sujets de préoccupation universels.\r\n\r\nEn présentant et analysant sa société, nous espérons vous aider à mieux connaître l’archipel et à entretenir son attrait loin des idées reçues. Cela permet aussi parfois d’éviter quelques impairs courants lors d’un voyage au Japon.');

-- --------------------------------------------------------

--
-- Structure de la table `category_faq`
--

CREATE TABLE `category_faq` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category_faq`
--

INSERT INTO `category_faq` (`id`, `titre`) VALUES
(1, 'Cuisine Japonaise'),
(2, 'Hébergement au japon'),
(3, 'Météo et climat au japon'),
(4, 'Téléphone et Internet au japon'),
(5, 'Transports au japon'),
(6, 'Visites au japon'),
(7, 'Contes et légendes Japonaises'),
(8, 'Le Japon dans le monde'),
(9, 'Les Japonais'),
(10, 'Religion et spiritualité au Japon'),
(11, 'Sports japonais'),
(12, 'Vivre au Japon'),
(13, 'Cours de japonais'),
(14, 'Etudier au Japon'),
(15, 'Kana & kanji'),
(16, 'Traductions japonais-français'),
(17, 'Arts japonais et Histoire'),
(18, 'Drama japonais'),
(19, 'Figurines japonaises et goodies'),
(20, 'Films japonais'),
(21, 'Jeux video'),
(22, 'Littérature japonaise'),
(23, 'Manga et japanimation'),
(24, 'Musique japonaise');

-- --------------------------------------------------------

--
-- Structure de la table `contenus`
--

CREATE TABLE `contenus` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sous_titre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contenus`
--

INSERT INTO `contenus` (`id`, `titre`, `sous_titre`, `description`, `category_id`) VALUES
(1, 'HEBERGEMENT AU JAPON', 'Hôtel, auberge ryokan, maison traditionnelle', 'Au Japon, il est possible de réserver différentes sortes de logements pour être hébergé au cours de son voyage. Trouver une chambre se fait facilement depuis Internet 📶 via les plateformes de réservation d\'hôtels 🏨 ou en passant directement par le site de l\'établissement, qui propose en général une version anglaise pour les touristes étrangers.\r\n\r\nBien sûr, les hôtels à l\'occidentale et les business hotels sont extrêmement nombreux, mais leurs superficies s\'avèrent souvent très limitées, en particulier dans les grandes villes, à moins d\'y consacrer un budget plus conséquent.\r\n\r\nLes hébergements plus traditionnels, comme les auberges ryokan ou les chambres d\'hôtes minshuku, sont également très prisés et leur coût n\'est pas toujours si élevé qu\'on pourrait parfois le craindre. Le tarif par nuitée dépend du nombre du personnes, du niveau de confort choisi pour la chambre et des services inclus ou non (dîner, petit-déjeuner, bain onsen ♨️ privé...).\r\n\r\nPour les familles ou les voyageurs désireux retrouver un cocon à la japonaise, la location d\'appartement ou de maison est très intéressant et vite rentable selon le nombre de personnes qui composent le groupe.\r\n\r\nEnfin, pour les plus petits budgets, les hôtels capsule, le système de guest-house voire de dortoir reste très utilisé, en particulier à Tokyo.', 1),
(2, 'TRANSPORTS AU JAPON', 'Train, métro, voiture, vélo, bateau japonais', 'Du point de vue des voyageurs étrangers, la réputation du réseau ferroviaire japonais n\'est plus à prouver et pour cause : son efficacité, son maillage et sa ponctualité rendent bien des services aussi bien aux locaux qu\'aux touristes. Certains néophytes pourront le trouver abscons au début, mais cela ne peut entâcher sa haute qualité générale.\r\n\r\nLe réseau ferré au Japon couvre les grandes agglomérations et tisse des itinéraires entre les villes. Il est donc aisé et pratique de choisir le train comme premier moyen de transport en commun sur place. Les quatre grandes îles présentent un maillage ferré dense et varié, composé de lignes à grande vitesse Shinkansen 🚅 pour relier les capitales régionales entre elles, mais aussi de lignes scéniques et moins rapides, qui permettent de profiter des jolis paysages naturels de l\'archipel, confortablement assis.\r\n\r\nToutefois, les trains et métros 🚇 ne doivent pas éclipser un ensemble d\'autres types de transports japonais, qui viennent soit le compléter pour ce qu\'on appelle le \"dernier segment\", soit le remplacer avantageusement pour des trajets non couverts, trop chers ou parfois peu pratiques en train. On pense alors au bus, au taxi, au bateau, au vélo 🚲 ou encore à la location de voiture 🚙, pour ceux qui souhaitent se libérer totalement des horaires de passage ou explorer des contrées reculées.', 1),
(3, 'AVION ET AÉROPORTS AU JAPON', 'Vols internationaux et domestiques pour visiter l\'archipel', 'L\'écrasante majorité des voyageurs au Japon s\'y rendent en avion ✈️ et les compagnies aériennes sont nombreuses à effectuer la liaison vers l\'archipel.\r\n\r\nDepuis la France, seules trois d\'entre elles (AirFrance, JAL et ANA) proposent des vols directs, mais bien d\'autres permettent de rallier le Japon via des escales en Europe, au moyen-orient ou en Asie.\r\n\r\nIl faut compter environ 11 à 13h de vol aller pour aller de Paris à Tokyo en vol direct.\r\n\r\nLes prix peuvent parfois descendre au-dessous de 500€ pour un aller-retour en classe économique en promotion, ou atteindre à l\'inverse 10.000€ pour des vols directs en Première classe.\r\nTokyo possède deux aéroports internationaux (Haneda et Narita), complétés par Osaka-Kansai. En passant par l\'un de ces trois-là, il est possible rejoindre bien d\'autres aéroports nationaux qui quadrillent l\'ensemble du Japon, d\'Hokkaido à Okinawa.\r\n\r\nÀ noter qu\'à partir du 7 janvier 2019, tout voyageur qui quitte le Japon (même les Japonais) au-delà d\'un transit de 24h doit s\'acquitter d\'une taxe de 1.000¥ soit ~7,71€ directement intégrée dans le prix du billet d\'avion.', 1),
(4, 'BUDGET ET ARGENT AU JAPON', NULL, 'Une des idées reçues les plus courantes liées au Japon concerne le coût de la vie et en particulier lors d\'un séjour sur l\'archipel. Or, avec un peu de recherche, il s\'avère très facile de bien mesurer et limiter intelligemment son budget de voyage et découvrir ainsi un Japon pas cher.\r\n\r\nLa fluctuation des devises (plus exactement le cours du Yen 💴 par rapport à l\'Euro et d\'autres monnaies) joue bien sûr un rôle très important dans l\'enveloppe totale que coûtera un séjour.\r\n\r\nNous distillons ici de nombreux bons plans pour économiser son argent et profiter de vos visites japonaises en payant moins cher. À noter que certains lieux au Japon (temples, musées, parcs...) offrent l\'entrée gratuite ; référez-vous aux informations pratiques indiquées sur chacune de nos fiches de voyage pour profiter de ces visites ouvertes aux plus petits budgets.\r\n\r\nPour estimer au mieux vos dépenses en séjour sur l\'archipel japonais, utilisez notre calculateur de budget voyage Japon.', 1),
(5, 'CUISINE JAPONAISE', 'Sushi, ramen, tempura, yakitori, soba', 'Vu de l\'occident, l\'on peut déplorer que la cuisine japonaise soit trop souvent limitée à ses sushis 🍣. D\'ailleurs, la France est leur deuxième plus gros consommateur mondial, hébergeant un nombre impressionnant de restaurants japonais sur son territoire.\r\n\r\nSi les Nippons sont évidemment parmi les plus gros consommateurs de poisson 🐟 cru dans le monde, leur gastronomie ne s\'y arrête certainement pas. Elle présente au contraire une variété de plats et de saveurs qui, bien loin d\'avoir à rougir des autres cuisines du monde, raffle chaque année toujours plus d\'étoiles dans les guides de restauration les plus prestigieux.\r\n\r\nQue mangent les Japonais au quotidien ?\r\nEn guise de mise en bouche, voici une liste non-exhaustive des plats les plus populaires et traditionnels, que l’on a facilement l’occasion de goûter lors d’un voyage au Japon :\r\n\r\nUdon et soba : nouilles japonaises à base de farine de blé ou de sarrasin, produits de base les plus consommés par les Japonais avec le riz ;\r\nRamen 🍜 : bol de nouilles chaudes servies dans un savoureux bouillon et agrémentées de garnitures comme des algues, du tofu, un œuf, des tranches fines de viandes ou des crustacés ;\r\nTempura 🍤 : beignets de légumes, viande, poissons ou crustacés panés puis frits dans l’huile ;\r\nYakitori : petites brochettes de volaille ou de légumes, marinés ou nature, grillées et servies comme accompagnement en apéritif ;\r\nNabe et oden 🍢 : pot-au-feu japonais servi au restaurant ou plus simplement à emporter au konbini, en choisissant parmi différents aliments (poissons, tofu, konjac) mijotés dans un bouillon de dashi ;\r\nSenbei : galette de riz grillé craquante et nappée de sauce soja sucrée-salée ;\r\nMochi : dessert japonais à base de riz gluant et assaisonné suivant les saisons (thé vert, sakura 🌸, fraise, haricots rouges azuki), peut-être servi à l’assiette ou sous forme de brochettes appelées dango 🍡 ;\r\nYokan : pâte sucrée de haricots rouges azuki et de gelée agar-agar ;\r\nDorayaki : petit pancake fourré à la pâte d’haricots rouges azuki ou à la patate douce.\r\nFaites saliver vos papilles en plongeant avec plaisir dans la vastitude de la production culinaire japonaise, qu\'elle soit salée ou sucrée, et sans oublier la saveur unique \"umami\".', 1),
(6, 'DÉCALAGE HORAIRE AU JAPON', '🕓 Fuseau horaire japonais', 'Le fuseau horaire du Japon est UTC / GMT+9, c\'est à dire qu\'il y a 9 heures d\'avance au Japon par rapport au méridien de référence, Greenwitch. Ce fuseau s\'appelle officiellement 日本標準時 Nihon Hyôjunji / 中央標準時 Chûô Hyôjunji / Japan Standard Time (JST).\r\n\r\nPar rapport à l\'heure en France, le décalage horaire 🕓 avec le Japon dépend à vrai dire des économies d\'énergie. Ainsi :\r\n\r\nsous l\'heure d\'été, de mars à octobre, il y a 7 heures de plus au Japon qu\'en France\r\nsous l\'heure d\'hiver, d\'octobre à mars, il y a 8 heures d\'avance au Japon par rapport à la France', 1),
(7, 'FÊTES JAPONAISES', 'Les jours fériés et célébrations nationales au Japon', 'Les fêtes et autres jours fériés rythment le calendrier japonais. Le passage des saisons ainsi que les célébrations religieuses bouddhistes et shintoïstes composent l’essentiel des évènements annuels importants.\r\n\r\nPour les voyageurs au Japon, les musées ainsi que certains temples et jardins sont fermés lors des fêtes nationales fériées. On dénombre une quinzaine de jours par an ; la journée de la montagne, le 11 août, a été la dernière ajoutée en 2016. Si la date tombe un dimanche, le lendemain est chômé.\r\nLes festivals traditionnels (matsuri) sont très prisés des Japonais pour leur ambiance populaire, leurs feux d’artifice et magnifiques parades. Nombreux tout au long de l\'année sur l\'archipel, ils se multiplient au cours du printemps 🌸 et de l\'été et peuvent se dérouler sur plusieurs jours, week-end compris.\r\n\r\nLes vacances nationales et spécialement la Golden Week à la fin avril / début mai symbolisent le boom du tourisme national ; c’est l’occasion pour les Japonais de quitter les grandes villes pour quelques jours en famille, à la campagne ou en bord de mer. Les transports et hébergements sont alors pris d’assaut.', 1),
(8, 'TÉLÉPHONE ET INTERNET AU JAPON', 'Rester connecté en illimité sur l\'archipel', 'Avec l\'arrivée des téléphones portables puis des smartphones quelques années plus tard, les habitudes de communication ont changé. Les personnes sont devenues plus connectées et veulent désormais pouvoir converser par téléphone ou partager sur Internet 📶 à l\'envie.\r\n\r\nEn voyage au Japon, cela n\'a pas toujours été évident, entre :\r\n\r\nUne prédilection pour les connexions filaires dans l’archipel, pratique pour les ordinateurs mais pas pour les autres objets connectés ;\r\nUn réseau de Wi-Fi gratuit morcelé, accessible principalement dans les gares, cafés, konbinis, etc.\r\nA cela s’ajoutaient parfois de très coûteux frais de roaming selon les opérateurs et les contrats, avec de mauvaises surprises sur la facture au retour.\r\n\r\nLe pratique Pocket Wi-Fi\r\nHeureusement, il existe à présent de nombreuses solutions pratiques et économiques pour rester connecté lors de ses visites sur l\'archipel, via un terminal mobile :\r\n\r\nL’achat ou la location d’un téléphone ou d’un smartphone 📱 japonais prépayé pour la durée du séjour ;\r\nL’achat ou la location d’une carte SIM japonaise, à utiliser avec son smartphone personnel, à condition de l’avoir fait désimlocker au préalable et de ne pas se tromper de taille de carte.\r\nCependant, la solution la plus simple et économique reste la location d’un Pocket Wi-Fi. Ce routeur de poche offre une connexion quasi-permanente, illimitée et simultanée à plusieurs appareils, dans une totale maîtrise des coûts.', 1),
(9, 'KANTO', 'La région la plus peuplée du Japon', 'Le Kanto est une région japonaise, située à l\'est sur l\'île principale de Honshu. Elle regroupe sept préfectures au total (Tokyo, Chiba, Gunma, Ibaraki, Kanagawa, Saitama et Tochigi) et abrite les deux plus grandes villes de l\'archipel en termes de démographie (la capitale et Yokohama). Il s\'agit du territoire le plus peuplé, le plus industrialisé et l\'un des plus touristiques.', 2),
(10, 'KANSAI', 'L\'autre cœur touristique japonais', 'Le Kansai est une région du Japon située sur l\'île principale de Honshu, également appelée Kinki. Composée de six préfectures, elle est la deuxième zone la plus peuplée de l\'archipel avec plus de 22 millions d\'habitants et abrite des grandes villes chargées d\'histoire telles que Kyoto, Osaka, Nara, Himeji ou encore Kobe.', 2),
(11, 'CHUBU', 'Le cœur du Japon, entre Kanto et Kansai', 'Chubu est une région centrale de l’île principale de Honshu, habillée par les Alpes japonaises avec le Mont Fuji comme relief dominant. Composée de neuf préfectures, ses plus grandes villes sont Niigata et Nagano au nord, Nagoya au sud et Kanazawa sur la côte nord-ouest.', 2),
(12, 'HOKKAIDO', 'La grande île du nord du Japon', 'Hokkaido est la deuxième plus grande île japonaise avec une superficie de 83.456 km², située tout au nord de l\'archipel. Elle est à la fois une préfecture et une région et compte plus de 5 millions d\'habitants, dont une minorité d\'Aïnous, les aborigènes du Japon. Sapporo est la ville la plus importante, centre politique et économique de l\'île.', 2),
(13, 'OKINAWA', '🏖 L\'archipel paradisiaque du royaume Ryukyu', 'L\'archipel d\'Okinawa est situé à l\'extrême sud-ouest du Japon, à mi-chemin entre Kyushu et Taiwan. Cet ensemble, qui compose la préfecture du même nom, a été annexé au Japon à la fin du XVIIIe siècle et fait partie des îles Ryukyu. On lui compte trois grands zones, dont l’île principale Okinawa-Honto, qui s\'étale sur 1.200 km² et accueille plus d\'un million d\'habitants.', 2),
(14, 'KYUSHU', 'L\'île subtropicale du sud du Japon', 'Kyushu est la troisième plus grande île du Japon, après Honshu et Hokkaido, avec près de 36.000 km² et plus de treize millions d\'habitants. Située au sud-ouest de l\'archipel, elle profite d\'un climat subtropical et serait le berceau de la civilisation japonaise. Composée de huit préfectures, sa plus grande ville est Fukuoka.', 2),
(15, 'CHUGOKU', 'Le Japon du milieu', 'Chugoku est une région au Japon située à l\'ouest de l\'île principale de Honshu. Composée de cinq préfectures, ses plus grandes villes sont notamment Hiroshima et Okayama, ainsi que l\'île de Miyajima. Rurale le long de la Mer du Japon et plus industrialisée du côté de la Mer Intérieure de Seto, la région affiche un tourisme authentique.', 2),
(16, 'SHIKOKU', 'La plus petite des quatre grandes îles japonaises', 'Shikoku est la plus petite des quatre îles principales du Japon avec une superficie de 18.800 km² et 4,5 millions d\'habitants. Divisée en quatre préfectures, ses principales villes sont Matsuyama, Takamatsu, Kochi et Tokushima. Plus rurale que touristique, elle est réputée pour la richesse de sa nature et son pèlerinage des 88 temples bouddhiques.', 2),
(17, 'TOHOKU', 'Le nord de Honshu entre côte pacifique et mer du Japon', 'Le Tohoku est une région japonaise située au nord-est de l\'île principale de Honshu. Occupant 30% de son territoire, elle se compose de six préfectures : Fukushima, Aomori, Akita, Iwate, Miyagi et Yamagata ; les plus grandes villes étant Sendai et Aomori.', 2),
(18, 'VISAS POUR LE JAPON', NULL, 'Pour voyager au Japon en tant que touriste, un simple passeport suffit. Grâce à celui-ci, il est possible d\'effectuer un séjour de 90 jours sur le sol nippon depuis la plupart des pays du monde qui ont signé un accord avec le Japon (180 depuis la Suisse). Il s\'agit du visa \"séjour temporaire\".\r\n\r\nSi toutefois vous souhaitez rester sur place plus longtemps, y travailler ou tout simplement vous expatrier, il vous faudra alors décrocher un autre type visa. Il en existe un certain nombre :\r\n\r\nTravail\r\nÉtudes\r\nStages\r\nÉpoux (mariage) et descendant de japonais\r\nRapprochement familial\r\nActivités culturelles\r\nVacances-travail\r\n...\r\nCe dernier, également appelé PVT, est relativement simple et rapide à obtenir et permet à de nombreux jeunes Français de profiter d\'une année complète sur l\'archipel japonais pour y voyager et y travailler.\r\n\r\nLe Japon a délivré 8,28 millions de ces visas en 2019 (et seulement 1,12 million en 2020 à cause de la crise sanitaire du Covid-19 🦠).', 3),
(19, 'SORTIR LE SOIR AU JAPON', NULL, 'La vie nocturne japonaise est forcément la plus animée dans les grandes villes et à Tokyo en première ligne.\r\n\r\nLa capitale nipponne possède ses quartiers les plus animés lorsque le soleil se couche (très tôt au Japon) ; on pense à Shinjuku et Kabukicho en particulier, ainsi qu\'à Shibuya ou encore Roppongi pour leurs boîtes de nuit et clubs. Les Japonais sont également de grands amateurs de karaoké.\r\n\r\nRentrer en taxi lorsque les transports en commun ne fonctionnent plus se montre pratique et tout à fait sûr. Il s\'agit d\'ailleurs de l\'un des moyens de déplacement préférés des Japonaises qui n\'aiment pas marcher même quelques mètres !\r\n\r\nLa nuit tombée, d\'autres expériences plus insolites peuvent être à découvrir bien au-delà de Tokyo. Ainsi, les visites de certains temples et autres lieux d\'intérêt sont magnifiés par les diverses floraisons, en particulier à l\'automne 🍁. De même, pour célébrer le passage à la nouvelle année, de nombreux sanctuaires offrent des évènements spéciaux très courus du public.', 3),
(20, 'TRAVAILLER AU JAPON', NULL, 'Pour de nombreux expatriés, même pour une période relativement courte, travailler au Japon est une nécessité.\r\n\r\nBien qu\'il existe une large gamme de postes ouverts aux étrangers vivant sur l\'archipel, certaines contraintes existent. Le visa PVT, par exemple, ne permet pas de travailler dans le milieu de la nuit. Pour de nombreux autres types d\'emploi, un niveau de japonais plus ou moins élevé est requis, parfois sanctionné par le JLPT.\r\n\r\nPuisque la plupart des postes sont fournis en priorité aux locaux, de nombreux expatriés choisissent de dispenser des cours de langue.\r\n\r\nNombre de travailleurs étrangers au Japon\r\nSelon les chiffres du gouvernement rapportés par Mainichi, il y avait 787.627 travailleurs étrangers sur l\'archipel à la fin octobre 2014, en hausse de 9,8% par rapport à un an plus tôt, établissant ainsi un record depuis 2007.\r\n\r\nParmi ceux-ci, on comptait 147.296 ingénieurs et experts, ainsi que 125.216 étudiants avec un petit boulot.\r\n\r\nPrincipale nationalité représentée : les Chinois, au nombre de 311.831, suivis des Brésiliens (94.171) et des Philippins (91.519).\r\n\r\nSMIC japonais\r\nAprès sa dernière augmentation (de 25¥ / ~0,19€) en juillet 2017, le salaire minimum horaire au Japon est actuellement de 848¥, soit ~6,53€.', 3),
(21, 'RELIGION ET SPIRITUALITÉ AU JAPON', 'Shintoïsme et bouddhisme', 'Il y a deux religions principales dans la société nipponne : shintoïsme et bouddhisme. La spiritualité et leur appartenance ne sont pas exclusives, ainsi la grande majorité des Japonais s\'identifie naturellement aux deux.\r\n\r\nC\'est d\'autant plus vrai que la présence religieuse fait partie intégrante de la vie quotidienne au Japon, à commencer par la présence d\'innombrables temples et sanctuaires. Ainsi, depuis tout petits jusqu\'à leur mort, les Japonais vénèrent des représentations de Bouddha et des kami (les dieux shinto) à travers de nombreux rites et traditions.\r\n\r\nAlors que depuis les années 1970, les Japonais étaient plutôt shinto que bouddhistes, en 2015 il y avait un nombre à peu près équivalent de croyants aux deux religions : environ 89 millions pour chacune.\r\n\r\nLes écoles bouddhistes les plus populaires actuellement au Japon sont :\r\n\r\nle Shingon, école ésotérique fondée par le moine Kukai au IXe siècle ;\r\nla Terre Pure, également appelée la secte Jodo et doctrine qui découle de l\'école ésotérique Tendai ;\r\nle Bouddhisme Zen qui comprend plusieurs branches dont le courant Rinzai ;\r\net la secte Nichiren, qui date de XIIIe siècle.\r\nOn compte également environ deux millions de chrétiens au Japon, ainsi qu\'une minorité de musulmans et de juifs.', 3),
(22, 'CONTES ET LÉGENDES JAPONAISES', 'L\'imaginaire collectif et traditionnel', 'Le shintoïsme et le bouddhisme inspirent amplement le folklore japonais. Les personnages surnaturels, les dieux et esprits (kami, yokai) ainsi que les autres animaux sacrés qui composent les récits sont tirés le plus souvent des deux principales religions du pays.\r\n\r\nRacontée aux enfants puis enseignée dans les classes de lettres aux étudiants, la mythologie populaire japonaise, avec ses histoires du passé (mukashibanashi), est largement présente au sein de la société actuelle. Par exemple, certaines œuvres contemporaines du réalisateur Hayao Miyazaki sont influencées par ces croyances :\r\n\r\nLe Voyage de Chihiro dépeint un Japon mythique truffé d’esprits et de monstres ;\r\nquant à Pompoko, il raconte les exploits des tanuki, chiens viverrins sacrés.\r\nOn peut également visiter à travers l’archipel des temples, sanctuaires et statues dédiés aux héros légendaires et divinités, tel que le fameux chien Hachiko. Parmi les contes merveilleux les plus appréciés, on découvre la légende de Momotaro, garçon prodige né dans une pêche (momo) dont la ville de naissance serait Okayama. Aujourd’hui, le sanctuaire shinto éponyme situé à Inuyama célèbre le personnage légendaire tous les ans au mois de mai.', 3),
(23, 'TATOUAGES AU JAPON', 'Le rapport complexe aux personnes tatouées', 'De nombreuses personnes en Occident sont tatouées et s\'interrogent sur la possibilité d’un voyage ou d’une expatriation au Japon.\r\n\r\nPlusieurs types de tatouages\r\nDe nos jours, on distingue deux types de tatouages, non par leur technique mais par leur design :\r\n\r\nLe wabori (和彫り) de style japonais,\r\nEt les autres yôbori (洋彫り) de style occidental.\r\nLe tatouage traditionnel japonais est réalisé grâce à une aiguille fixée au bout d\'un petit manche, que le tatoueur fait pénétrer rapidement sous la peau dans un mouvement manuel de va-et-vient. Cette technique reste plus douloureuse que la méthode occidentale \"moderne\" classique.\r\n\r\nUne pratique toujours stigmatisée\r\nSur l\'archipel nippon, le tatouage est traditionnellement lourd de sens et, encore aujourd\'hui, fréquemment associé au monde des yakuza (la mafia japonaise). Au cours de l\'époque Edo, on punissait d\'ailleurs les criminels en les tatouant. Ils devinrent illégaux pendant l\'ère Meiji, avec une loi en vigueur de 1872 à 1948.\r\n\r\nD\'iconographie japonaise ou non, même petits, discrets et sans aucun lien avec l\'univers mafieux, ils sont donc très souvent interdits notamment dans :\r\n\r\nLes sources thermales naturelles (onsen ♨️),\r\nLes salles de sport, les piscines, et les parcs aquatiques,\r\nEt même parfois dans certains hôtels 🏨 traditionnels (ryokan) quand leurs bains sont communs.\r\nEn général, aucune distinction n’est faite sur le type de motif encré et les touristes aussi peuvent se voir refuser l\'entrée de bains communs, même en dissimulant le tatouage par un pansement.\r\n\r\nLes établissements de bains publics sento sont beaucoup plus souples, et sous réserve de respecter les éventuelles consignes (couvrir la zone tatouée, venir à certains horaires, etc.), les personnes tatouées y seront bienvenues.\r\n\r\nCe sont des éléments à prendre en compte pour planifier au mieux vos visites et vos hébergements lors d\'un séjour au Japon, quitte à réserver des bains privatifs pour éviter toute déconvenue.\r\n\r\nDepuis juin 2015 toutefois, le gouvernement a initié une réflexion pour assouplir ces règles à destination des étrangers, dans le cadre de la croissance touristique attendue à l\'horizon des Jeux Olympiques 🏅 de Tokyo 2020 (2021).\r\n\r\nAujourd\'hui, le moyen le plus simple et sans risque pour admirer des tatouages traditionnels sur des yakuza est de participer au Sanja Matsuri, un festival shinto en plein-air, très couru des Japonais comme des étrangers (près de deux millions de visiteurs sur deux jours) qui se déroule au fameux Senso-ji d\'Asakusa à Tokyo, chaque troisième week-end de mai.', 3),
(24, 'MANGA (SUR PAPIER)', NULL, 'L\'origine du manga remonte à l\'époque de Nara, au début du XIXe siècle. On peut les définir depuis comme la bande dessinée japonaise, possédant un sens de lecture de droite à gauche.\r\n\r\nRéellement développés et sérialisés au Japon après la seconde Guerre Mondiale, ils se sont diffusés à l\'international un peu plus tard. La France, seconde consommatrice de mangas au monde, les a découverts au début des années 1990.\r\n\r\nDe nombreux genres et formats existent, mais le plus classique reste la publication d\'un chapitre au rythme hebdomadaire d\'un magazine de type \"Jump\", puis une sortie dédiée de dix chapitres cumulés dans un volume relié.\r\n\r\nAu Japon, une quinzaine de mangas ont dépassé les cent volumes publiés, parmi lesquels seuls quelques titres ont dépassé ses frontières : Golgo 13, JoJo\'s Bizarre Adventure ou encore Hajime no Ippo.', 3),
(26, 'ANIMÉ (SÉRIE JAPONAISE)', NULL, 'Par \"anime\", il faut comprendre les séries de dessins animés japonais diffusés sur les chaînes de télé au Japon. Les saisons les plus classiques se composent de 13 ou 26 épisodes d\'une vingtaine de minutes, mais il existes de nombreuses autres possibilités en fonction des types de programmes.\r\n\r\nInitié avec un succès public très fort dans les années 1970, le genre animé a très fortement participé à l\'exportation de la culture populaire japonais (également appelée \"soft power\"), en particulier en France à travers le Club Dorothée. D\'aucuns pensent qu\'il a connu un âge d\'or jusqu\'à la fin des années 1990 et que la qualité des anime japonais n\'a fait que baisser depuis.\r\n\r\nReste qu\'il s\'agit toujours de programmes phares de la télévision nipponne, à en prouver par le succès des adaptations de manga tels que One Piece ou Naruto, ou encore la longévité de certaines séries. Ainsi Sazae-san, diffusé depuis 1969, a dépassé les 7.000 épisodes en 2014 ! Doraemon, avec ses 2.500 épisodes, a encore du chemin pour le rattraper.', 3);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210925162609', '2021-09-29 10:59:29', 34),
('DoctrineMigrations\\Version20210928151237', '2021-09-28 17:12:49', 36),
('DoctrineMigrations\\Version20210928155941', '2021-09-28 17:59:45', 55),
('DoctrineMigrations\\Version20210929090828', '2021-09-29 11:09:43', 87),
('DoctrineMigrations\\Version20210929123251', '2021-09-29 14:32:57', 41),
('DoctrineMigrations\\Version20210929123947', '2021-09-29 14:39:52', 27),
('DoctrineMigrations\\Version20210929134322', '2021-09-29 15:43:27', 28),
('DoctrineMigrations\\Version20210929134349', '2021-09-29 15:43:51', 38),
('DoctrineMigrations\\Version20210929135748', '2021-09-29 15:57:53', 28),
('DoctrineMigrations\\Version20210929150609', '2021-09-29 17:06:13', 25),
('DoctrineMigrations\\Version20210930063933', '2021-09-30 08:39:45', 60),
('DoctrineMigrations\\Version20210930070814', '2021-09-30 09:08:18', 28),
('DoctrineMigrations\\Version20210930072921', '2021-09-30 09:29:27', 39),
('DoctrineMigrations\\Version20210930081449', '2021-09-30 10:14:53', 42),
('DoctrineMigrations\\Version20210930082901', '2021-09-30 10:29:06', 35),
('DoctrineMigrations\\Version20210930103601', '2021-09-30 12:36:05', 48),
('DoctrineMigrations\\Version20210930124023', '2021-09-30 14:40:27', 26),
('DoctrineMigrations\\Version20210930124518', '2021-09-30 14:45:22', 35),
('DoctrineMigrations\\Version20210930150059', '2021-09-30 17:01:06', 35),
('DoctrineMigrations\\Version20211001084911', '2021-10-01 10:49:15', 39),
('DoctrineMigrations\\Version20211001104545', '2021-10-01 12:45:49', 65),
('DoctrineMigrations\\Version20211005122933', '2021-10-05 14:29:38', 42),
('DoctrineMigrations\\Version20211005123455', '2021-10-05 14:34:59', 92);

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  `faq_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `faq`
--

INSERT INTO `faq` (`id`, `titre`, `question`, `categorie_id`, `faq_user_id`) VALUES
(1, 'plat japonais', 'que mange t\'on au japon', 1, NULL),
(3, 'hebergement', 'ou aller', 2, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `home`
--

CREATE TABLE `home` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sous_titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_size` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`id`, `titre`, `description`, `image_name`, `image_size`, `updated_at`) VALUES
(6, 'Chat', 'Voici le petit chat', 'chat.jpg', NULL, '2021-09-10 10:41:25'),
(7, 'Fleur', 'Voici une fleur', 'fleur.jpg', NULL, '2021-09-10 10:41:25'),
(8, 'Mouette', 'Voici des mouettes', 'mouette.jpg', NULL, '2021-09-10 10:41:25'),
(9, 'Tablette', 'Voici une tablette', 'tablette.jpg', NULL, '2021-09-10 10:41:25'),
(10, 'Goutte', 'Voici des gouttes', 'goutte.jpg', NULL, '2021-09-10 10:41:25');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pseudo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `name`, `firstname`, `pseudo`, `country`, `is_verified`) VALUES
(2, 'admin@admin.com', '[\"ROLE_USER\",\"ROLE_ADMIN\"]', '$2y$13$V56GqI9O1dwk5t5QF/vOT.YT7xHm8LsTfuOtZAljBOSi3nSbntNHu', NULL, NULL, NULL, NULL, 1),
(3, 'user@user.com', '[\"ROLE_USER\"]', '$2y$13$d1wqrVpZIBGiRce.4qshKuZ4BpogFaTvY/W5X9EqIm43o.7zKAg9W', NULL, NULL, NULL, NULL, 1),
(5, 'jean.peuplus6@gmail.com', '[\"ROLE_USER\"]', '$2y$13$2pEEsTSGdkb3MZNxGvc3GOhRKJro.eOoZONewTXMoUTsoM5oo8yai', NULL, NULL, NULL, NULL, 1),
(6, 'jean.peuplus@gmail.com', '[\"ROLE_USER\"]', '$2y$13$jysF/xVZ2kq9DhM6m1WsReImayTRN9OpFp/PJ1lcGjJm9/Ika2uvW', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_size` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `video`
--

INSERT INTO `video` (`id`, `titre`, `description`, `video_name`, `video_size`, `updated_at`) VALUES
(6, 'App', 'Voici des apps', 'app.mp4', NULL, '2021-09-10 10:41:26'),
(7, 'Cosmique', 'c\'est quoi se truc !!!!!', 'cosmique.mp4', NULL, '2021-09-10 10:41:26'),
(8, 'Explosion', 'Voici une explosion', 'explosion.mp4', NULL, '2021-09-10 10:41:26'),
(9, 'Immeuble', 'Voici un immeuble, c\'est moche', 'immeuble.mp4', NULL, '2021-09-10 10:41:26'),
(10, 'Loading', 'Voici un chargement, juste pour faire chier', 'loading.mp4', NULL, '2021-09-10 10:41:26');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category_faq`
--
ALTER TABLE `category_faq`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contenus`
--
ALTER TABLE `contenus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_ADE1203612469DE2` (`category_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E8FF75CCBCF5E72D` (`categorie_id`),
  ADD KEY `IDX_E8FF75CCBC1FB8CE` (`faq_user_id`);

--
-- Index pour la table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- Index pour la table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `category_faq`
--
ALTER TABLE `category_faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `contenus`
--
ALTER TABLE `contenus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `home`
--
ALTER TABLE `home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contenus`
--
ALTER TABLE `contenus`
  ADD CONSTRAINT `FK_ADE1203612469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Contraintes pour la table `faq`
--
ALTER TABLE `faq`
  ADD CONSTRAINT `FK_E8FF75CCBC1FB8CE` FOREIGN KEY (`faq_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_E8FF75CCBCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `category_faq` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
