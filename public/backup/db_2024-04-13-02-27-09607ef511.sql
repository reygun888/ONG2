-- MySQL dump 10.13  Distrib 8.2.0, for macos14.0 (arm64)
--
-- Host: 127.0.0.1    Database: ong
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `contenu` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `description` longtext NOT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `sous_titre1` varchar(255) DEFAULT NULL,
  `sous_titre2` varchar(255) DEFAULT NULL,
  `sous_titre3` varchar(255) DEFAULT NULL,
  `sous_titre4` varchar(255) DEFAULT NULL,
  `sous_titre5` varchar(255) DEFAULT NULL,
  `paragraphe1` longtext DEFAULT NULL,
  `paragraphe2` longtext DEFAULT NULL,
  `paragraphe3` longtext DEFAULT NULL,
  `paragraphe4` longtext DEFAULT NULL,
  `paragraphe5` longtext DEFAULT NULL,
  `paragraphe6` longtext DEFAULT NULL,
  `paragraphe7` longtext DEFAULT NULL,
  `paragraphe8` longtext DEFAULT NULL,
  `paragraphe9` longtext DEFAULT NULL,
  `paragraphe10` longtext DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article`
--

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` VALUES (1,'TEST','<h1><strong>TITRE 1</strong></h1><div>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même.</div><h1><strong>TITRE 2</strong></h1><div>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même.</div><div>TITRE 2</div><div>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même.</div>','logo-66191d593133d.jpg','moi','2024-04-11','<div>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.</div>','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqw6WzAXifbLiZgkzaAa-ZPh7m-N8G4-Zfeg&s','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTFGMpJNzXfWZ12K3Xmgvu2HKmQi5532Y_GmQ&s','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRmEGmjq39qzr8i2qX2kCfEyIu4ZCFrI6Y8gQ&s','Qu\'est-ce que le Lorem Ipsum?','Pourquoi l\'utiliser?','D\'où vient-il?','Où puis-je m\'en procurer?','Lorem Ipsum','Contrairement à une opinion répandue, le Lorem Ipsum n\'est pas simplement du texte aléatoire. Il trouve ses racines dans une oeuvre de la littérature latine classique datant de 45 av. J.-C., le rendant vieux de 2000 ans.','Un professeur du Hampden-Sydney College, en Virginie, s\'est intéressé à un des mots latins les plus obscurs, consectetur, extrait d\'un passage du Lorem Ipsum, et en étudiant tous les usages de ce mot dans la littérature classique, découvrit la source incontestable du Lorem Ipsum.','Les premières lignes du Lorem Ipsum, \"Lorem ipsum dolor sit amet...\", proviennent de la section 1.10.32.','Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte.','L\'avantage du Lorem Ipsum sur un texte générique comme \'Du texte. Du texte. Du texte.\' est qu\'il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard.','De nombreuses suites logicielles de mise en page ou éditeurs de sites Web ont fait du Lorem Ipsum leur faux texte par défaut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'à leur phase de construction.','Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).','Il provient en fait des sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" (Des Suprêmes Biens et des Suprêmes Maux) de Cicéron. Cet ouvrage, très populaire pendant la Renaissance, est un traité sur la théorie de l\'éthique.','Il provient en fait des sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" (Des Suprêmes Biens et des Suprêmes Maux) de Cicéron. Cet ouvrage, très populaire pendant la Renaissance, est un traité sur la théorie de l\'éthique.','Il provient en fait des sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" (Des Suprêmes Biens et des Suprêmes Maux) de Cicéron. Cet ouvrage, très populaire pendant la Renaissance, est un traité sur la théorie de l\'éthique.'),(2,'Lorem Ipsum','<div>Il provient en fait des sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" (Des Suprêmes Biens et des Suprêmes Maux) de Cicéron. Cet ouvrage, très populaire pendant la Renaissance, est un traité sur la théorie de l\'éthique.</div>','7707e132ad149064179f84f5a0c091cb86f0e068.jpg','moi','2024-04-11','<div>Il provient en fait des sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" (Des Suprêmes Biens et des Suprêmes Maux) de Cicéron. Cet ouvrage, très populaire pendant la Renaissance, est un traité sur la théorie de l\'éthique.</div>','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS3yNdd3U2HdrnjNwRE0S-VgN4tDhXKA9N9jw&s','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRH1Qhx28QEOAtYJqmmQR0FCtpo2kFt10HGhw&s','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRXBfhC-QlgM4DmR6VXrznFyXdNwytV9-SOMw&s','Lorem Ipsum','Lorem Ipsum','Lorem Ipsum','Lorem Ipsum','Lorem Ipsum','Il provient en fait des sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" (Des Suprêmes Biens et des Suprêmes Maux) de Cicéron. Cet ouvrage, très populaire pendant la Renaissance, est un traité sur la théorie de l\'éthique.','Il provient en fait des sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" (Des Suprêmes Biens et des Suprêmes Maux) de Cicéron. Cet ouvrage, très populaire pendant la Renaissance, est un traité sur la théorie de l\'éthique.','Il provient en fait des sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" (Des Suprêmes Biens et des Suprêmes Maux) de Cicéron. Cet ouvrage, très populaire pendant la Renaissance, est un traité sur la théorie de l\'éthique.','Il provient en fait des sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" (Des Suprêmes Biens et des Suprêmes Maux) de Cicéron. Cet ouvrage, très populaire pendant la Renaissance, est un traité sur la théorie de l\'éthique.','Il provient en fait des sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" (Des Suprêmes Biens et des Suprêmes Maux) de Cicéron. Cet ouvrage, très populaire pendant la Renaissance, est un traité sur la théorie de l\'éthique.','Il provient en fait des sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" (Des Suprêmes Biens et des Suprêmes Maux) de Cicéron. Cet ouvrage, très populaire pendant la Renaissance, est un traité sur la théorie de l\'éthique.','Il provient en fait des sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" (Des Suprêmes Biens et des Suprêmes Maux) de Cicéron. Cet ouvrage, très populaire pendant la Renaissance, est un traité sur la théorie de l\'éthique.','Il provient en fait des sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" (Des Suprêmes Biens et des Suprêmes Maux) de Cicéron. Cet ouvrage, très populaire pendant la Renaissance, est un traité sur la théorie de l\'éthique.','Il provient en fait des sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" (Des Suprêmes Biens et des Suprêmes Maux) de Cicéron. Cet ouvrage, très populaire pendant la Renaissance, est un traité sur la théorie de l\'éthique.','Il provient en fait des sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" (Des Suprêmes Biens et des Suprêmes Maux) de Cicéron. Cet ouvrage, très populaire pendant la Renaissance, est un traité sur la théorie de l\'éthique.'),(3,'Lorem Ipsum','<div>L\'extrait standard de Lorem Ipsum utilisé depuis le XVIè siècle est reproduit ci-dessous pour les curieux. Les sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" de Cicéron sont aussi reproduites dans leur version originale, accompagnée de la traduction anglaise de H. Rackham (1914).</div>','2e1d6172f0bfc2c2c212e980ef92c91e2ac8772b.jpg','moi','2024-04-11','<div>L\'extrait standard de Lorem Ipsum utilisé depuis le XVIè siècle est reproduit ci-dessous pour les curieux. Les sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" de Cicéron sont aussi reproduites dans leur version originale, accompagnée de la traduction anglaise de H. Rackham (1914).</div>','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSaWTZQs52wwhObi5DNLPjqibHKIOAOPWnoMw&s','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRRBUydQONe0F9SEbxr3F0f-5fKmEPnX0iNJQ&s','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ3X7M6_o5UKhUgcJrCRH-eLewlJwTx7S2l3g&s','Lorem Ipsum','Lorem Ipsum','Lorem Ipsum','Lorem Ipsum','Lorem Ipsum','L\'extrait standard de Lorem Ipsum utilisé depuis le XVIè siècle est reproduit ci-dessous pour les curieux. Les sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" de Cicéron sont aussi reproduites dans leur version originale, accompagnée de la traduction anglaise de H. Rackham (1914).','L\'extrait standard de Lorem Ipsum utilisé depuis le XVIè siècle est reproduit ci-dessous pour les curieux. Les sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" de Cicéron sont aussi reproduites dans leur version originale, accompagnée de la traduction anglaise de H. Rackham (1914).','L\'extrait standard de Lorem Ipsum utilisé depuis le XVIè siècle est reproduit ci-dessous pour les curieux. Les sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" de Cicéron sont aussi reproduites dans leur version originale, accompagnée de la traduction anglaise de H. Rackham (1914).','L\'extrait standard de Lorem Ipsum utilisé depuis le XVIè siècle est reproduit ci-dessous pour les curieux. Les sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" de Cicéron sont aussi reproduites dans leur version originale, accompagnée de la traduction anglaise de H. Rackham (1914).','L\'extrait standard de Lorem Ipsum utilisé depuis le XVIè siècle est reproduit ci-dessous pour les curieux. Les sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" de Cicéron sont aussi reproduites dans leur version originale, accompagnée de la traduction anglaise de H. Rackham (1914).','L\'extrait standard de Lorem Ipsum utilisé depuis le XVIè siècle est reproduit ci-dessous pour les curieux. Les sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" de Cicéron sont aussi reproduites dans leur version originale, accompagnée de la traduction anglaise de H. Rackham (1914).','L\'extrait standard de Lorem Ipsum utilisé depuis le XVIè siècle est reproduit ci-dessous pour les curieux. Les sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" de Cicéron sont aussi reproduites dans leur version originale, accompagnée de la traduction anglaise de H. Rackham (1914).','L\'extrait standard de Lorem Ipsum utilisé depuis le XVIè siècle est reproduit ci-dessous pour les curieux. Les sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" de Cicéron sont aussi reproduites dans leur version originale, accompagnée de la traduction anglaise de H. Rackham (1914).','L\'extrait standard de Lorem Ipsum utilisé depuis le XVIè siècle est reproduit ci-dessous pour les curieux. Les sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" de Cicéron sont aussi reproduites dans leur version originale, accompagnée de la traduction anglaise de H. Rackham (1914).','L\'extrait standard de Lorem Ipsum utilisé depuis le XVIè siècle est reproduit ci-dessous pour les curieux. Les sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" de Cicéron sont aussi reproduites dans leur version originale, accompagnée de la traduction anglaise de H. Rackham (1914).');
/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sujet` varchar(100) DEFAULT NULL,
  `message` longtext NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (1,'Marie','Julie','julie@gmail.fr','test','teste','2024-04-05 12:57:36');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20240317155926','2024-04-06 14:16:42',49),('DoctrineMigrations\\Version20240331194649','2024-04-05 14:01:03',20),('DoctrineMigrations\\Version20240405135752','2024-04-05 13:59:05',22),('DoctrineMigrations\\Version20240405141426','2024-04-05 14:14:38',24),('DoctrineMigrations\\Version20240406141623','2024-04-06 14:19:13',51),('DoctrineMigrations\\Version20240408150924','2024-04-08 15:11:00',41),('DoctrineMigrations\\Version20240408182743','2024-04-08 18:27:53',17),('DoctrineMigrations\\Version20240409220725','2024-04-09 22:07:34',36);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messenger_messages`
--

LOCK TABLES `messenger_messages` WRITE;
/*!40000 ALTER TABLE `messenger_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messenger_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `newz`
--

DROP TABLE IF EXISTS `newz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `newz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `auteur` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `newz`
--

LOCK TABLES `newz` WRITE;
/*!40000 ALTER TABLE `newz` DISABLE KEYS */;
INSERT INTO `newz` VALUES (2,'Don','Merci','Notre mission est ancrée dans le (REA) Réaménagement de l’Esprit Africain,\r\nun principe qui encourage l’éducation, l\'autosuffisance et la création d\'emplois locaux','oscar-omondi-sCrGzq9Ocag-unsplash-661640480fc2d.jpg','moi','2024-04-08'),(3,'article','Coucou','<div>Au centre de notre engagement, l\'éducation, une passerelle vers l\'autonomie</div>','ben-white-83tkHLPgg2Q-unsplash-66164538be13f.jpg','moi','2024-04-09'),(4,'article','Projet','<div>Engagés pour le développement local, nous favorisons et encourageons la création d\'emplois</div>','869a9bb49a59bc53cef3f0639029fcb20d3e44d9.avif','moi','2024-04-09'),(5,'Don','Coucou','Semez l\'éducation, l\'entraide et récoltez un avenir baigné d\'autonomie Rejoignez-nous dans cette magnifique aventure humaine','photo-1529390079861-591de354faf5-66164059cbf8b.avif','moi','2024-04-09');
/*!40000 ALTER TABLE `newz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `civilite` varchar(255) DEFAULT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '(DC2Type:json)' CHECK (json_valid(`role`)),
  `reset_password_token` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `siren` varchar(255) DEFAULT NULL,
  `forme_juridique` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) NOT NULL,
  `complement_adresse` varchar(255) DEFAULT NULL,
  `code_postal` varchar(10) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'Mme','Marie','Julie','julie@gmail.fr','$2y$13$64MVf5xuLqyQ.Hp2rxt0w.LlF1NswrXmYr9TIQ3L7FqpvBNc5PQWy','{\"4\":\"ROLE_S_AD\"}','','adherent',NULL,NULL,'06 88 88 88 88','10 rue d\'Ici',NULL,'75000','Paris','FR'),(3,'Mr','Pierre','Pierre','pierre@gmail.com','$2y$13$bv5ohf0dCbFYXEc9GvlAwOYlRvt4DC./kOrZs1IhbEuckA50QsqPG','[\"ROLE_USER\",\"ROLE_ADMIN\"]',NULL,'adherent',NULL,NULL,'06 88 88 88 90','10 rue d\'Ici',NULL,'75000','Paris','FR'),(4,'Mr','George','Paul','paul@gmail.com','$2y$13$40s/JAORHA0/LPWot9uAqeSQYMELJhrPs1odOOYMKuaU0n3fYonMa','[]',NULL,'adherent',NULL,NULL,'06 88 88 88 88','10 rue d\'Ici','Appt 88','75000','Paris','FR'),(13,'Mr','ADM',NULL,'adm@gmail.fr','$2y$13$CE6gedL5nUIezdrA0sCy4.WQ5TD3H5Cx.o3fyr8TlPZSqF.DeeJMy','[\"ROLE_USER\",\"ROLE_S_AD\"]',NULL,'entreprise','888888','SARL',NULL,'10 rue d\'Ici',NULL,'75000','Paris','FR');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-13  2:27:36
