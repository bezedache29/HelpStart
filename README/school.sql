-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 18 mars 2021 à 12:36
-- Version du serveur :  5.7.24
-- Version de PHP : 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `school`
--

-- --------------------------------------------------------

--
-- Structure de la table `administators`
--

CREATE TABLE `administators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `administators`
--

INSERT INTO `administators` (`id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2021-03-07 15:43:43', '2021-03-07 15:43:43', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `help_request_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promotion_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `courses`
--

INSERT INTO `courses` (`id`, `name`, `promotion_id`, `teacher_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Dev Back', 1, 1, NULL, NULL, '2021-02-18 08:24:54'),
(2, 'Dev Back', 2, 1, NULL, NULL, '2021-02-18 08:24:54'),
(3, 'Dev Front', 1, 2, NULL, NULL, NULL),
(4, 'Gestion de projet', 1, 1, NULL, '2021-03-11 09:47:59', '2021-03-11 09:47:59');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachement_id` bigint(20) UNSIGNED NOT NULL,
  `attachement_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `files`
--

INSERT INTO `files` (`id`, `filename`, `attachement_id`, `attachement_type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '119123598_3247182442034452_2525039441753047228_o.jpg', 11, 'App\\Models\\HelpRequest', '2021-02-25 10:15:27', '2021-02-25 10:15:27', NULL),
(2, '119123598_3247182442034452_2525039441753047228_o.jpg', 12, 'App\\Models\\HelpRequest', '2021-02-25 10:15:42', '2021-02-25 10:15:42', NULL),
(3, '129034670_3837979532945401_4287286606212044792_o.jpg', 13, 'App\\Models\\HelpRequest', '2021-02-25 10:17:01', '2021-02-25 10:17:01', NULL),
(4, '129186169_3411427095623235_1838191897293629809_n.jpg', 13, 'App\\Models\\HelpRequest', '2021-02-25 10:17:01', '2021-02-25 10:17:01', NULL),
(5, '129228837_3506427449441349_8434611902763503404_o.jpg', 13, 'App\\Models\\HelpRequest', '2021-02-25 10:17:01', '2021-02-25 10:17:01', NULL),
(6, 'CV_2021_Christophe_Salou.pdf', 14, 'App\\Models\\HelpRequest', '2021-03-04 07:44:35', '2021-03-04 07:44:35', NULL),
(19, 'Découverte des Algorithmes.pdf', 1, 'App\\Models\\Lesson', '2021-03-11 16:08:59', '2021-03-11 16:08:59', NULL),
(20, 'Exercices - variables, opérateurs, conditions.pdf', 2, 'App\\Models\\Lesson', '2021-03-11 16:11:33', '2021-03-11 16:11:33', NULL),
(21, 'Exercices - boucles.pdf', 4, 'App\\Models\\Lesson', '2021-03-11 16:16:46', '2021-03-11 16:16:46', NULL),
(22, 'Exercices - tableaux.pdf', 9, 'App\\Models\\Lesson', '2021-03-11 16:28:18', '2021-03-11 16:28:18', NULL),
(23, 'PHP - Framework 1.pdf', 10, 'App\\Models\\Lesson', '2021-03-11 16:29:01', '2021-03-11 16:29:01', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `help_requests`
--

CREATE TABLE `help_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `awailability` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `visibility` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `help_requests`
--

INSERT INTO `help_requests` (`id`, `title`, `student_id`, `content`, `awailability`, `status`, `visibility`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'aaaa', 2, 'aa', 'a', 0, 2, '2021-02-18 10:24:27', '2021-02-18 10:24:27', NULL),
(2, 'aaaa', 2, 'aa', 'a', 0, 1, '2021-02-18 10:26:29', '2021-02-18 10:26:29', NULL),
(3, 'aaaa', 2, 'aa', 'a', 0, 0, '2021-02-18 10:41:23', '2021-02-18 10:41:23', NULL),
(4, 'test', 2, 'blabla', 'aujourd\'hui', 0, 3, '2021-02-18 11:16:26', '2021-02-18 11:16:26', NULL),
(5, 'need help', 1, 'a l\'aide !!', NULL, 0, 0, '2021-02-25 07:20:25', '2021-02-25 07:20:25', NULL),
(6, 'allo', 1, 'test', NULL, 0, 2, '2021-02-25 08:19:10', '2021-02-25 08:19:10', NULL),
(7, 'qzdzqd', 1, 'qzdqzd', NULL, 0, 0, '2021-02-25 10:11:54', '2021-02-25 10:11:54', NULL),
(8, 'qzdzqd', 1, 'qzdqzd', NULL, 0, 0, '2021-02-25 10:12:33', '2021-02-25 10:12:33', NULL),
(9, 'qzdzqd', 1, 'qzdqzd', NULL, 0, 0, '2021-02-25 10:13:12', '2021-02-25 10:13:12', NULL),
(10, 'qzdzqd', 1, 'qzdqzd', NULL, 0, 0, '2021-02-25 10:13:57', '2021-02-25 10:13:57', NULL),
(11, 'qzdzqd', 1, 'qzdqzd', NULL, 0, 0, '2021-02-25 10:15:27', '2021-02-25 10:15:27', NULL),
(12, 'qzdzqd', 1, 'qzdqzd', NULL, 0, 0, '2021-02-25 10:15:42', '2021-02-25 10:15:42', NULL),
(13, 'aaaaa', 1, 'dqzdqzd', NULL, 0, 0, '2021-02-25 10:17:01', '2021-02-25 10:17:01', NULL),
(14, 'retest', 1, 'zqdqzdd', NULL, 0, 1, '2021-03-04 07:44:35', '2021-03-04 07:44:35', NULL),
(15, 'blabla', 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '4/03 à 10h00', 0, 3, '2021-03-04 10:13:17', '2021-03-04 10:13:17', NULL),
(16, 'blabla', 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '4/03 à 10h00', 0, 3, '2021-03-04 10:18:30', '2021-03-04 10:18:30', NULL),
(17, 'blabla', 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '4/03 à 10h00', 0, 3, '2021-03-04 10:19:23', '2021-03-04 10:19:23', NULL),
(18, 'blabla', 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '4/03 à 10h00', 0, 3, '2021-03-04 10:19:44', '2021-03-04 10:19:44', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `help_request_tag`
--

CREATE TABLE `help_request_tag` (
  `help_request_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `help_request_tag`
--

INSERT INTO `help_request_tag` (`help_request_id`, `tag_id`) VALUES
(2, 2),
(2, 4),
(3, 2),
(3, 4),
(4, 3),
(5, 2),
(5, 4),
(5, 3),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 3),
(14, 2),
(14, 4),
(14, 1),
(15, 4),
(15, 3),
(16, 4),
(16, 3),
(17, 4),
(17, 3),
(18, 4),
(18, 3);

-- --------------------------------------------------------

--
-- Structure de la table `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `lessons`
--

INSERT INTO `lessons` (`id`, `title`, `description`, `order`, `course_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Algorithmes', 'Gingerbread soufflé chocolate bar lollipop jelly bear claw tootsie roll. Chocolate cake pudding cupcake soufflé pudding. Bear claw pudding candy canes pastry tart marzipan dragée cake. Wafer fruitcake candy canes sugar plum gummies. Jelly beans jelly-o powder muffin chocolate bar. Bonbon gingerbread sesame snaps cheesecake gummi bears marshmallow sesame snaps danish liquorice. Pie tart tart liquorice sesame snaps halvah bonbon marzipan wafer. Chocolate bar carrot cake topping chocolate. Gingerbread gummies tiramisu fruitcake. Carrot cake jelly beans cheesecake powder tart sweet carrot cake sweet roll cotton candy. Cheesecake tiramisu tiramisu. Cheesecake cheesecake brownie soufflé marzipan wafer soufflé. Caramels tiramisu candy canes macaroon jelly beans.', 1, 1, '2021-03-11 16:08:59', '2021-03-11 16:08:59', NULL),
(2, 'Variables / Conditions', 'Jelly chocolate dragée biscuit sweet toffee cake marzipan. Cookie tart pie. Apple pie marzipan pastry wafer croissant dessert gummies danish jujubes. Wafer muffin tootsie roll bear claw marzipan halvah. Pastry pie marzipan jelly beans powder jelly-o apple pie icing pie. Sweet tootsie roll marzipan candy marshmallow powder toffee chupa chups carrot cake. Cotton candy soufflé caramels toffee caramels croissant bear claw. Dragée gummies gummies biscuit brownie tootsie roll. Marzipan danish chocolate bar lollipop sugar plum. Chocolate cake bear claw dragée dragée apple pie jujubes. Marshmallow liquorice macaroon icing topping. Cheesecake croissant toffee caramels caramels apple pie candy canes sweet bonbon. Liquorice cake liquorice.', 2, 1, '2021-03-11 16:11:33', '2021-03-11 16:11:33', NULL),
(3, 'POO', 'Jelly beans toffee chocolate cake powder. Wafer ice cream cookie powder. Cake candy canes donut. Sweet roll dessert powder. Marshmallow lollipop caramels sesame snaps sugar plum sesame snaps jujubes chocolate cake. Sugar plum halvah chupa chups liquorice jelly-o tiramisu. Chupa chups brownie pastry cookie bonbon. Ice cream powder gingerbread. Candy canes sesame snaps jelly-o. Carrot cake danish macaroon. Chocolate sweet roll ice cream gingerbread tart carrot cake sweet. Fruitcake lemon drops cake. Chupa chups jujubes lemon drops.\r\n\r\nSweet roll muffin cupcake fruitcake jelly beans. Gingerbread marshmallow gummi bears jelly-o topping. Chocolate bar wafer candy canes chocolate croissant lemon drops. Biscuit gummi bears fruitcake cheesecake chocolate bar powder candy canes carrot cake chocolate bar. Tootsie roll jujubes candy canes cake topping. Liquorice carrot cake wafer sesame snaps candy canes. Bonbon lemon drops dragée tart cake dragée gummi bears biscuit sesame snaps. Cookie dragée cotton candy croissant. Cake powder jelly beans wafer lemon drops candy. Lollipop bear claw jelly croissant. Candy pastry toffee marzipan soufflé macaroon bear claw candy soufflé. Bonbon jelly chupa chups muffin chocolate bar. Jelly beans cupcake tart. Lemon drops candy canes cotton candy.', 1, 2, '2021-03-11 16:13:14', '2021-03-11 16:13:14', NULL),
(4, 'Boucles', 'Gingerbread candy danish macaroon topping. Brownie sugar plum biscuit icing marzipan cotton candy chocolate cake lemon drops bonbon. Macaroon cheesecake chocolate bar sugar plum candy canes donut chocolate bar. Cotton candy topping bonbon candy chocolate cake. Ice cream caramels sweet roll icing liquorice pie. Sweet roll candy dragée dragée lemon drops liquorice gummi bears tiramisu sweet. Brownie marshmallow muffin muffin. Carrot cake soufflé powder soufflé gingerbread. Lollipop dragée chupa chups pie jujubes donut biscuit liquorice. Chupa chups croissant danish gummies. Chupa chups croissant topping candy canes. Pastry toffee biscuit gingerbread carrot cake biscuit cupcake. Cupcake cake dessert ice cream cake chupa chups cupcake.', 3, 1, '2021-03-11 16:16:46', '2021-03-11 16:16:46', NULL),
(9, 'Tableaux', 'Croissant halvah chocolate chocolate cake pudding topping liquorice halvah tiramisu. Macaroon soufflé caramels candy chocolate cupcake pudding. Gummies jelly candy canes cheesecake topping muffin icing fruitcake. Macaroon sweet roll tootsie roll sesame snaps. Croissant chocolate bar cotton candy chocolate bar cheesecake gummi bears topping chocolate cake liquorice. Jujubes muffin ice cream carrot cake topping bear claw fruitcake. Chocolate bar croissant tootsie roll candy tart. Ice cream topping halvah jelly bear claw. Brownie sugar plum sweet. Marshmallow marshmallow jelly beans brownie danish icing. Tootsie roll cotton candy cake chocolate cake jelly beans fruitcake. Gummies marzipan macaroon cake. Apple pie croissant tootsie roll. Oat cake chocolate bar sweet roll candy canes gummies pie.', 4, 1, '2021-03-11 16:28:18', '2021-03-11 16:28:18', NULL),
(10, 'Framework', 'Bear claw oat cake gingerbread. Jelly-o sesame snaps chocolate sugar plum powder icing pie. Danish pudding brownie. Donut muffin tiramisu biscuit jelly beans sesame snaps biscuit. Bonbon sweet roll donut lollipop cheesecake bear claw cookie sweet roll. Tootsie roll bonbon oat cake marshmallow. Halvah cake soufflé sugar plum chocolate danish lemon drops. Muffin halvah marzipan icing gummi bears candy jujubes lemon drops. Chocolate cake chocolate ice cream pastry tart gummi bears cotton candy donut gummi bears. Powder soufflé chupa chups soufflé carrot cake chupa chups ice cream jelly-o tart. Jujubes biscuit biscuit carrot cake lollipop gingerbread toffee. Gummies cake icing soufflé. Danish cheesecake cotton candy danish danish caramels ice cream macaroon gummi bears.', 2, 2, '2021-03-11 16:29:01', '2021-03-11 16:29:01', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2021_01_28_103426_add_firstname_to_users', 1),
(13, '2021_01_28_104417_create_students_table', 1),
(14, '2021_01_28_110750_create_teachers_table', 2),
(15, '2021_01_28_111116_create_administators_table', 2),
(19, '2021_02_04_075827_create_sections_table', 3),
(20, '2021_02_04_080006_create_promotions_table', 3),
(21, '2021_02_04_080044_add_contacts_to_students_table', 3),
(22, '2021_02_04_110129_add_moderation_to_users_table', 4),
(41, '2021_02_04_113004_add_moderation_to_users_table', 5),
(42, '2021_02_11_111603_add_edition_to_users_table', 5),
(43, '2021_02_11_123951_create_courses_table', 5),
(47, '2021_02_18_094233_create_help_requests_table', 6),
(48, '2021_02_18_100444_create_tags_table', 6),
(49, '2021_02_18_100851_create_table_help_request_tag', 6),
(51, '2021_02_25_101418_create_files_table', 7),
(57, '2021_03_04_092225_create_answers_table', 8),
(58, '2021_03_07_162725_create_lessons_table', 8);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `promotions`
--

INSERT INTO `promotions` (`id`, `name`, `section_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'DEV1', 1, NULL, NULL, NULL),
(2, 'DEV2', 1, NULL, NULL, NULL),
(3, 'WebMarket1', 4, NULL, NULL, NULL),
(4, 'WebMarket2', 4, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sections`
--

INSERT INTO `sections` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Développement Fullstack', NULL, NULL, NULL),
(2, 'Community Manager', NULL, NULL, NULL),
(3, 'Prépa Web', NULL, NULL, NULL),
(4, 'WebMarketing', NULL, NULL, NULL),
(5, 'UX / UI', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_delegate` tinyint(1) NOT NULL DEFAULT '0',
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `messenger` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discord` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `promotion_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `students`
--

INSERT INTO `students` (`id`, `is_delegate`, `linkedin`, `twitter`, `instagram`, `messenger`, `discord`, `phone`, `created_at`, `updated_at`, `deleted_at`, `promotion_id`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-28 10:37:20', '2021-02-04 10:33:50', NULL, 2),
(2, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-11 09:40:58', '2021-02-11 12:08:46', NULL, 1),
(3, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-18 07:38:17', '2021-02-18 07:38:17', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ux', NULL, NULL, NULL),
(2, 'dev', NULL, NULL, NULL),
(3, 'urgent', NULL, NULL, NULL),
(4, 'php', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `teachers`
--

INSERT INTO `teachers` (`id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2021-02-10 10:20:19', '2021-02-10 10:20:19', NULL),
(2, '2021-02-10 10:28:27', '2021-02-10 10:28:27', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_id` bigint(20) UNSIGNED NOT NULL,
  `profile_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `needs_moderation` tinyint(1) NOT NULL DEFAULT '0',
  `needs_edition` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `firstname`, `email`, `profile_id`, `profile_type`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `needs_moderation`, `needs_edition`) VALUES
(1, 'salou', 'christophe', 'bezedache29@gmail.com', 1, 'App\\Models\\Student', NULL, '$2y$10$fsbtG9Q3awdZIJyR4EPyaeQLnXHN.b8VXTdTKUbyzlhHQRrxRa0/G', NULL, '2021-01-28 10:37:20', '2021-02-04 10:33:50', NULL, 0, 0),
(2, 'Strueux', 'Simon', 'simon-strueux@best.fr', 1, 'App\\Models\\Teacher', NULL, '$2y$10$tgWJ0U2DCy6sona01WAxWuPk03YozmE2g.ZVyDJURQ9bD0VdYalBa', NULL, '2021-02-10 10:20:19', '2021-02-18 08:24:54', NULL, 1, 0),
(3, 'Diote', 'Kelly', 'kellydiote@oops.fr', 2, 'App\\Models\\Teacher', NULL, '$2y$10$Rr/bgq4ArPwozzqE7mtBHu2uN/epwG4/WhzDKb8LVBfBGJrHOJNSO', NULL, '2021-02-10 10:28:27', '2021-02-10 10:28:27', NULL, 0, 0),
(4, 'Lopez', 'Anthony', 'anto-lopez@gmail.com', 2, 'App\\Models\\Student', NULL, '$2y$10$832dJd4ZEpGVmMbK8/FJ9eXpB4vnrppPoyK1KVN4JTpiIaTRHU4ka', NULL, '2021-02-11 09:40:58', '2021-02-11 12:32:54', NULL, 0, 0),
(5, 'Mich', 'Jean', 'jean-mich@muche.fr', 3, 'App\\Models\\Student', NULL, '$2y$10$3RUwBqxpy5OW02c50V/9Fu/eUPu01p0zr8ovGgaIuj.gsy1QseWTa', NULL, '2021-02-18 07:38:17', '2021-02-18 07:38:17', NULL, 1, 0),
(6, 'lemodo', 'jo', 'jo.lemodo@gmail.com', 1, 'App\\Models\\Administator', NULL, '$2y$10$NvRlGZ3LNwuSn0TGw8JDwOyCuZroMxleMCJbEWP1FP.GuQvIvNJtq', NULL, '2021-03-07 15:43:43', '2021-03-07 15:43:43', NULL, 0, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administators`
--
ALTER TABLE `administators`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answers_help_request_id_foreign` (`help_request_id`),
  ADD KEY `answers_user_id_foreign` (`user_id`);

--
-- Index pour la table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_promotion_id_foreign` (`promotion_id`),
  ADD KEY `courses_teacher_id_foreign` (`teacher_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `help_requests`
--
ALTER TABLE `help_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `help_requests_student_id_foreign` (`student_id`);

--
-- Index pour la table `help_request_tag`
--
ALTER TABLE `help_request_tag`
  ADD KEY `help_request_tag_help_request_id_foreign` (`help_request_id`),
  ADD KEY `help_request_tag_tag_id_foreign` (`tag_id`);

--
-- Index pour la table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lessons_course_id_foreign` (`course_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `promotions_section_id_foreign` (`section_id`);

--
-- Index pour la table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_promotion_id_foreign` (`promotion_id`);

--
-- Index pour la table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administators`
--
ALTER TABLE `administators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `help_requests`
--
ALTER TABLE `help_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT pour la table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_help_request_id_foreign` FOREIGN KEY (`help_request_id`) REFERENCES `help_requests` (`id`),
  ADD CONSTRAINT `answers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_promotion_id_foreign` FOREIGN KEY (`promotion_id`) REFERENCES `promotions` (`id`),
  ADD CONSTRAINT `courses_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

--
-- Contraintes pour la table `help_requests`
--
ALTER TABLE `help_requests`
  ADD CONSTRAINT `help_requests_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Contraintes pour la table `help_request_tag`
--
ALTER TABLE `help_request_tag`
  ADD CONSTRAINT `help_request_tag_help_request_id_foreign` FOREIGN KEY (`help_request_id`) REFERENCES `help_requests` (`id`),
  ADD CONSTRAINT `help_request_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Contraintes pour la table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Contraintes pour la table `promotions`
--
ALTER TABLE `promotions`
  ADD CONSTRAINT `promotions_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`);

--
-- Contraintes pour la table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_promotion_id_foreign` FOREIGN KEY (`promotion_id`) REFERENCES `promotions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
