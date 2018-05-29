-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 29, 2018 at 04:10 PM
-- Server version: 5.5.58-0+deb8u1
-- PHP Version: 5.6.33-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abenha02`
--

-- --------------------------------------------------------

--
-- Table structure for table `compte_bancaire`
--

CREATE TABLE `compte_bancaire` (
  `id` int(11) NOT NULL,
  `num_compte` int(11) NOT NULL,
  `solde` float NOT NULL,
  `date_creation_compte` date NOT NULL,
  `id_membre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `compte_bancaire`
--

INSERT INTO `compte_bancaire` (`id`, `num_compte`, `solde`, `date_creation_compte`, `id_membre`) VALUES
(1, 385467, 300, '2018-05-04', 3),
(2, 385468, 65, '2018-05-04', 2),
(3, 385469, 20000, '2018-05-04', 3);

-- --------------------------------------------------------

--
-- Table structure for table `droit`
--

CREATE TABLE `droit` (
  `id` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `id_compte` int(11) NOT NULL,
  `id_niveau_droit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `droit`
--

INSERT INTO `droit` (`id`, `id_membre`, `id_compte`, `id_niveau_droit`) VALUES
(1, 1, 3, 3),
(2, 2, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `famille`
--

CREATE TABLE `famille` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `famille`
--

INSERT INTO `famille` (`id`, `nom`) VALUES
(1, 'BENHAMMOU'),
(2, 'LUSAKA');

-- --------------------------------------------------------

--
-- Table structure for table `membre`
--

CREATE TABLE `membre` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(30) COLLATE utf8_bin NOT NULL,
  `adresse` text COLLATE utf8_bin NOT NULL,
  `id_famille` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `membre`
--

INSERT INTO `membre` (`id`, `nom`, `prenom`, `adresse`, `id_famille`) VALUES
(1, 'benhammou', 'amine', '41 rue jules didier', 1),
(2, 'benhammou', 'marine', '8 , avenue blaise pascal', 1),
(3, 'lusaka', 'maxime', '8 avenue Blaise pascal ch342', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mouvement`
--

CREATE TABLE `mouvement` (
  `id` int(11) NOT NULL,
  `montant` float NOT NULL,
  `date_mouvement` datetime DEFAULT NULL,
  `valider` tinyint(1) NOT NULL,
  `description` text COLLATE utf8_bin,
  `id_compte_crediteur` int(11) NOT NULL,
  `id_compte_debiteur` int(11) NOT NULL,
  `id_membre` int(11) DEFAULT NULL,
  `id_moyen_paiement` int(11) DEFAULT NULL,
  `id_repetitif` int(11) DEFAULT NULL,
  `rapprochement` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `mouvement`
--

INSERT INTO `mouvement` (`id`, `montant`, `date_mouvement`, `valider`, `description`, `id_compte_crediteur`, `id_compte_debiteur`, `id_membre`, `id_moyen_paiement`, `id_repetitif`, `rapprochement`) VALUES
(4, 5000, '2018-05-15 00:00:00', 1, 'rien', 3, 1, 1, 2, 1, 1),
(5, 500, '2018-05-09 00:00:00', 1, 'test', 2, 3, 1, 1, NULL, 0),
(6, 30, '2015-01-01 00:00:00', 1, 'test test', 3, 1, 1, 1, NULL, 1),
(7, 30, '2015-01-01 00:00:00', 1, 'test test', 3, 1, 1, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mouvement_crediteur`
--

CREATE TABLE `mouvement_crediteur` (
  `id` int(11) NOT NULL,
  `id_mouvement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `mouvement_crediteur`
--

INSERT INTO `mouvement_crediteur` (`id`, `id_mouvement`) VALUES
(1, 4),
(2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `mouvement_debiteur`
--

CREATE TABLE `mouvement_debiteur` (
  `id` int(11) NOT NULL,
  `id_mouvement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `mouvement_debiteur`
--

INSERT INTO `mouvement_debiteur` (`id`, `id_mouvement`) VALUES
(1, 6),
(2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `moyen_paiement`
--

CREATE TABLE `moyen_paiement` (
  `id` int(11) NOT NULL,
  `libelle` varchar(30) COLLATE utf8_bin NOT NULL,
  `details` varchar(30) COLLATE utf8_bin NOT NULL,
  `id_compte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `moyen_paiement`
--

INSERT INTO `moyen_paiement` (`id`, `libelle`, `details`, `id_compte`) VALUES
(1, 'Carte bancaire', '**** **** **** 3541', 1),
(2, 'cheque', '35486', 1);

-- --------------------------------------------------------

--
-- Table structure for table `niveau_droit`
--

CREATE TABLE `niveau_droit` (
  `id` int(11) NOT NULL,
  `virement` tinyint(1) NOT NULL,
  `lecture` tinyint(1) NOT NULL,
  `ecriture` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `niveau_droit`
--

INSERT INTO `niveau_droit` (`id`, `virement`, `lecture`, `ecriture`) VALUES
(2, 0, 1, 0),
(3, 0, 1, 1),
(4, 1, 0, 0),
(6, 1, 1, 0),
(7, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `periodicite`
--

CREATE TABLE `periodicite` (
  `id` int(11) NOT NULL,
  `nombre` int(11) NOT NULL,
  `unite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `periodicite`
--

INSERT INTO `periodicite` (`id`, `nombre`, `unite`) VALUES
(6, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `repetitif`
--

CREATE TABLE `repetitif` (
  `id` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `id_periodicite` int(11) NOT NULL,
  `date_fin` date NOT NULL,
  `date_derniere_validation` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `repetitif`
--

INSERT INTO `repetitif` (`id`, `date_debut`, `id_periodicite`, `date_fin`, `date_derniere_validation`) VALUES
(1, '2018-05-07', 6, '2019-05-07', '2018-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `unite`
--

CREATE TABLE `unite` (
  `id` int(11) NOT NULL,
  `libelle` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unite`
--

INSERT INTO `unite` (`id`, `libelle`) VALUES
(1, 'jour'),
(2, 'semaine'),
(3, 'mois');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `salt`, `roles`) VALUES
(4, 'alexandre', 'alexandre', '', 'a:1:{i:0;s:9:"ROLE_USER";}'),
(5, 'marine', 'marine', '', 'a:1:{i:0;s:9:"ROLE_USER";}'),
(6, 'anna', 'anna', '', 'a:1:{i:0;s:9:"ROLE_USER";}');

-- --------------------------------------------------------

--
-- Table structure for table `virement`
--

CREATE TABLE `virement` (
  `id` int(11) NOT NULL,
  `id_mouvement_crediteur` int(11) NOT NULL,
  `id_mouvement_debiteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `compte_bancaire`
--
ALTER TABLE `compte_bancaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_compte_membre` (`id_membre`);

--
-- Indexes for table `droit`
--
ALTER TABLE `droit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_droit_membre` (`id_membre`),
  ADD KEY `fk_droit_compte` (`id_compte`),
  ADD KEY `fk_droit_niveau` (`id_niveau_droit`);

--
-- Indexes for table `famille`
--
ALTER TABLE `famille`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_famille_membre` (`id_famille`);

--
-- Indexes for table `mouvement`
--
ALTER TABLE `mouvement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_compte_mouvement` (`id_compte_crediteur`),
  ADD KEY `fk_membre_mouvement` (`id_membre`),
  ADD KEY `fk_paiement_mouvement` (`id_moyen_paiement`),
  ADD KEY `fk_repetitif_mouvement` (`id_repetitif`),
  ADD KEY `id_compte_debiteur` (`id_compte_debiteur`);

--
-- Indexes for table `mouvement_crediteur`
--
ALTER TABLE `mouvement_crediteur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mouvement_crediteur` (`id_mouvement`);

--
-- Indexes for table `mouvement_debiteur`
--
ALTER TABLE `mouvement_debiteur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mouvement_debiteur` (`id_mouvement`);

--
-- Indexes for table `moyen_paiement`
--
ALTER TABLE `moyen_paiement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_compte_paiement` (`id_compte`);

--
-- Indexes for table `niveau_droit`
--
ALTER TABLE `niveau_droit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periodicite`
--
ALTER TABLE `periodicite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unite` (`unite`);

--
-- Indexes for table `repetitif`
--
ALTER TABLE `repetitif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_periodocite` (`id_periodicite`);

--
-- Indexes for table `unite`
--
ALTER TABLE `unite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`);

--
-- Indexes for table `virement`
--
ALTER TABLE `virement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mouvement_virement_crediteur` (`id_mouvement_crediteur`),
  ADD KEY `fk_mouvement_virement_debiteur` (`id_mouvement_debiteur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `compte_bancaire`
--
ALTER TABLE `compte_bancaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `droit`
--
ALTER TABLE `droit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `famille`
--
ALTER TABLE `famille`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `membre`
--
ALTER TABLE `membre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mouvement`
--
ALTER TABLE `mouvement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `mouvement_crediteur`
--
ALTER TABLE `mouvement_crediteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mouvement_debiteur`
--
ALTER TABLE `mouvement_debiteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `moyen_paiement`
--
ALTER TABLE `moyen_paiement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `niveau_droit`
--
ALTER TABLE `niveau_droit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `periodicite`
--
ALTER TABLE `periodicite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `repetitif`
--
ALTER TABLE `repetitif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `unite`
--
ALTER TABLE `unite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `virement`
--
ALTER TABLE `virement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `compte_bancaire`
--
ALTER TABLE `compte_bancaire`
  ADD CONSTRAINT `fk_compte_membre` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id`);

--
-- Constraints for table `droit`
--
ALTER TABLE `droit`
  ADD CONSTRAINT `fk_droit-compte` FOREIGN KEY (`id_compte`) REFERENCES `compte_bancaire` (`id`),
  ADD CONSTRAINT `fk_droit_membre` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id`),
  ADD CONSTRAINT `fk_droit_niveau` FOREIGN KEY (`id_niveau_droit`) REFERENCES `niveau_droit` (`id`);

--
-- Constraints for table `membre`
--
ALTER TABLE `membre`
  ADD CONSTRAINT `fk_famille_membre` FOREIGN KEY (`id_famille`) REFERENCES `famille` (`id`);

--
-- Constraints for table `mouvement`
--
ALTER TABLE `mouvement`
  ADD CONSTRAINT `fk_compte_debiteur_mouvement` FOREIGN KEY (`id_compte_debiteur`) REFERENCES `compte_bancaire` (`id`),
  ADD CONSTRAINT `fk_compte_crediteur_mouvement` FOREIGN KEY (`id_compte_crediteur`) REFERENCES `compte_bancaire` (`id`),
  ADD CONSTRAINT `fk_membre_mouvement` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id`),
  ADD CONSTRAINT `fk_paiement_mouvement` FOREIGN KEY (`id_moyen_paiement`) REFERENCES `moyen_paiement` (`id`),
  ADD CONSTRAINT `fk_repetitif_mouvement` FOREIGN KEY (`id_repetitif`) REFERENCES `repetitif` (`id`);

--
-- Constraints for table `mouvement_crediteur`
--
ALTER TABLE `mouvement_crediteur`
  ADD CONSTRAINT `fk_mouvement_crediteur` FOREIGN KEY (`id_mouvement`) REFERENCES `mouvement` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mouvement_debiteur`
--
ALTER TABLE `mouvement_debiteur`
  ADD CONSTRAINT `fk_mouvement_debiteur` FOREIGN KEY (`id_mouvement`) REFERENCES `mouvement` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `moyen_paiement`
--
ALTER TABLE `moyen_paiement`
  ADD CONSTRAINT `fk_paiement_compte` FOREIGN KEY (`id`) REFERENCES `compte_bancaire` (`id`);

--
-- Constraints for table `periodicite`
--
ALTER TABLE `periodicite`
  ADD CONSTRAINT `FK_unite` FOREIGN KEY (`unite`) REFERENCES `unite` (`id`);

--
-- Constraints for table `virement`
--
ALTER TABLE `virement`
  ADD CONSTRAINT `fk_mouvement_virement_crediteur` FOREIGN KEY (`id_mouvement_crediteur`) REFERENCES `mouvement` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_mouvement_virement_debiteur` FOREIGN KEY (`id_mouvement_debiteur`) REFERENCES `mouvement` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
