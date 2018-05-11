-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Ven 11 Mai 2018 à 09:27
-- Version du serveur :  5.6.35
-- Version de PHP :  7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `banque`
--

-- --------------------------------------------------------

--
-- Structure de la table `compte_bancaire`
--

CREATE TABLE `compte_bancaire` (
  `num_compte` int(11) NOT NULL,
  `solde` float NOT NULL,
  `date_creation_compte` date NOT NULL,
  `id_membre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `compte_bancaire`
--

INSERT INTO `compte_bancaire` (`num_compte`, `solde`, `date_creation_compte`, `id_membre`) VALUES
(298438, 300, '2018-05-04', 1),
(298439, 65, '2018-05-04', 2),
(298440, 20000, '2018-05-04', 3);

-- --------------------------------------------------------

--
-- Structure de la table `droit`
--

CREATE TABLE `droit` (
  `id` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `id_compte` int(11) NOT NULL,
  `id_niveau_droit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `droit`
--

INSERT INTO `droit` (`id`, `id_membre`, `id_compte`, `id_niveau_droit`) VALUES
(1, 1, 298439, 3),
(2, 2, 298440, 4);

-- --------------------------------------------------------

--
-- Structure de la table `famille`
--

CREATE TABLE `famille` (
  `id` int(11) NOT NULL,
  `nom_famille` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `famille`
--

INSERT INTO `famille` (`id`, `nom_famille`) VALUES
(1, 'BENHAMMOU'),
(2, 'LUSAKA');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id` int(11) NOT NULL,
  `nom_membre` varchar(30) COLLATE utf8_bin NOT NULL,
  `prenom_membre` varchar(30) COLLATE utf8_bin NOT NULL,
  `adresse` text COLLATE utf8_bin NOT NULL,
  `id_famille` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`id`, `nom_membre`, `prenom_membre`, `adresse`, `id_famille`) VALUES
(1, 'benhammou', 'amine', '41 rue jules didier', 1),
(2, 'benhammou', 'marine', '8 , avenue blaise pascal', 1),
(3, 'lusaka', 'maxime', '8 avenue Blaise pascal ch342', 2);

-- --------------------------------------------------------

--
-- Structure de la table `mouvement`
--

CREATE TABLE `mouvement` (
  `id` int(11) NOT NULL,
  `montant` float NOT NULL,
  `date_mouvement` date NOT NULL,
  `valider` tinyint(1) NOT NULL,
  `descriptif` text COLLATE utf8_bin,
  `id_compte` int(11) NOT NULL,
  `id_membre` int(11) DEFAULT NULL,
  `id_moyen_paiement` int(11) DEFAULT NULL,
  `id_repetitif` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `mouvement`
--

INSERT INTO `mouvement` (`id`, `montant`, `date_mouvement`, `valider`, `descriptif`, `id_compte`, `id_membre`, `id_moyen_paiement`, `id_repetitif`) VALUES
(1, 3000, '2018-05-07', 1, 'Salaire mois mai', 298438, NULL, NULL, NULL),
(2, 57.39, '2018-05-07', 1, 'AUCHAN', 298438, 1, 1, NULL),
(3, 15.99, '2018-05-07', 1, 'forfait bouygues , mois mai .', 298438, NULL, NULL, 1),
(4, 150, '2018-05-08', 0, 'rembourser 150e a maxime .', 298438, 1, 2, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `mouvement_crediteur`
--

CREATE TABLE `mouvement_crediteur` (
  `id` int(11) NOT NULL,
  `id_mouvement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `mouvement_crediteur`
--

INSERT INTO `mouvement_crediteur` (`id`, `id_mouvement`) VALUES
(13853, 1);

-- --------------------------------------------------------

--
-- Structure de la table `mouvement_debiteur`
--

CREATE TABLE `mouvement_debiteur` (
  `id` int(11) NOT NULL,
  `id_mouvement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `mouvement_debiteur`
--

INSERT INTO `mouvement_debiteur` (`id`, `id_mouvement`) VALUES
(13830, 2);

-- --------------------------------------------------------

--
-- Structure de la table `moyen_paiement`
--

CREATE TABLE `moyen_paiement` (
  `id` int(11) NOT NULL,
  `libelle` varchar(30) COLLATE utf8_bin NOT NULL,
  `details` varchar(30) COLLATE utf8_bin NOT NULL,
  `id_compte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `moyen_paiement`
--

INSERT INTO `moyen_paiement` (`id`, `libelle`, `details`, `id_compte`) VALUES
(1, 'Carte bancaire', 'numero de la carte ...', 298438),
(2, 'cheque', 'numero de cheque :', 298438);

-- --------------------------------------------------------

--
-- Structure de la table `niveau_droit`
--

CREATE TABLE `niveau_droit` (
  `id` int(11) NOT NULL,
  `virement` tinyint(1) NOT NULL,
  `lecture` tinyint(1) NOT NULL,
  `ecriture` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `niveau_droit`
--

INSERT INTO `niveau_droit` (`id`, `virement`, `lecture`, `ecriture`) VALUES
(0, 0, 0, 0),
(1, 0, 0, 1),
(2, 0, 1, 0),
(3, 0, 1, 1),
(4, 1, 0, 0),
(5, 1, 0, 1),
(6, 1, 1, 0),
(7, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `periodicite`
--

CREATE TABLE `periodicite` (
  `id` int(11) NOT NULL,
  `libelle` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `periodicite`
--

INSERT INTO `periodicite` (`id`, `libelle`) VALUES
(1, '3 jours'),
(2, '7 jours'),
(3, '10 jours'),
(4, '15 jours'),
(5, '20 jours'),
(6, ' 30 jours'),
(7, '60 jours'),
(8, '90 jours'),
(9, '180 jours'),
(10, '365 jours');

-- --------------------------------------------------------

--
-- Structure de la table `repetitif`
--

CREATE TABLE `repetitif` (
  `id` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `id_periodocite` int(11) NOT NULL,
  `date_fin` date NOT NULL,
  `date_derniere_validation` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `repetitif`
--

INSERT INTO `repetitif` (`id`, `date_debut`, `id_periodocite`, `date_fin`, `date_derniere_validation`) VALUES
(1, '2018-05-07', 6, '2019-05-07', '2018-05-07');

-- --------------------------------------------------------

--
-- Structure de la table `virement`
--

CREATE TABLE `virement` (
  `id` int(11) NOT NULL,
  `id_mouvement` int(11) NOT NULL,
  `id_compte_crediteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `virement`
--

INSERT INTO `virement` (`id`, `id_mouvement`, `id_compte_crediteur`) VALUES
(1, 4, 298439);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `compte_bancaire`
--
ALTER TABLE `compte_bancaire`
  ADD PRIMARY KEY (`num_compte`),
  ADD KEY `fk_compte_membre` (`id_membre`);

--
-- Index pour la table `droit`
--
ALTER TABLE `droit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_droit_membre` (`id_membre`),
  ADD KEY `fk_droit_compte` (`id_compte`),
  ADD KEY `fk_droit_niveau` (`id_niveau_droit`);

--
-- Index pour la table `famille`
--
ALTER TABLE `famille`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_famille_membre` (`id_famille`);

--
-- Index pour la table `mouvement`
--
ALTER TABLE `mouvement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_compte_mouvement` (`id_compte`),
  ADD KEY `fk_membre_mouvement` (`id_membre`),
  ADD KEY `fk_paiement_mouvement` (`id_moyen_paiement`),
  ADD KEY `fk_repetitif_mouvement` (`id_repetitif`);

--
-- Index pour la table `mouvement_crediteur`
--
ALTER TABLE `mouvement_crediteur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mouvement_crediteur` (`id_mouvement`);

--
-- Index pour la table `mouvement_debiteur`
--
ALTER TABLE `mouvement_debiteur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mouvement_debiteur` (`id_mouvement`);

--
-- Index pour la table `moyen_paiement`
--
ALTER TABLE `moyen_paiement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_compte_paiement` (`id_compte`);

--
-- Index pour la table `niveau_droit`
--
ALTER TABLE `niveau_droit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `periodicite`
--
ALTER TABLE `periodicite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `repetitif`
--
ALTER TABLE `repetitif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_periodocite` (`id_periodocite`);

--
-- Index pour la table `virement`
--
ALTER TABLE `virement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mouvement_virement` (`id_mouvement`),
  ADD KEY `fk_virement_compte` (`id_compte_crediteur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `famille`
--
ALTER TABLE `famille`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `compte_bancaire`
--
ALTER TABLE `compte_bancaire`
  ADD CONSTRAINT `fk_compte_membre` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id`);

--
-- Contraintes pour la table `droit`
--
ALTER TABLE `droit`
  ADD CONSTRAINT `fk_droit_compte` FOREIGN KEY (`id_compte`) REFERENCES `compte_bancaire` (`num_compte`),
  ADD CONSTRAINT `fk_droit_membre` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id`),
  ADD CONSTRAINT `fk_droit_niveau` FOREIGN KEY (`id_niveau_droit`) REFERENCES `niveau_droit` (`id`);

--
-- Contraintes pour la table `membre`
--
ALTER TABLE `membre`
  ADD CONSTRAINT `fk_famille_membre` FOREIGN KEY (`id_famille`) REFERENCES `famille` (`id`);

--
-- Contraintes pour la table `mouvement`
--
ALTER TABLE `mouvement`
  ADD CONSTRAINT `fk_compte_mouvement` FOREIGN KEY (`id_compte`) REFERENCES `compte_bancaire` (`num_compte`),
  ADD CONSTRAINT `fk_membre_mouvement` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id`),
  ADD CONSTRAINT `fk_paiement_mouvement` FOREIGN KEY (`id_moyen_paiement`) REFERENCES `moyen_paiement` (`id`),
  ADD CONSTRAINT `fk_repetitif_mouvement` FOREIGN KEY (`id_repetitif`) REFERENCES `repetitif` (`id`);

--
-- Contraintes pour la table `mouvement_crediteur`
--
ALTER TABLE `mouvement_crediteur`
  ADD CONSTRAINT `fk_mouvement_crediteur` FOREIGN KEY (`id_mouvement`) REFERENCES `mouvement` (`id`);

--
-- Contraintes pour la table `mouvement_debiteur`
--
ALTER TABLE `mouvement_debiteur`
  ADD CONSTRAINT `fk_mouvement_debiteur` FOREIGN KEY (`id_mouvement`) REFERENCES `mouvement` (`id`);

--
-- Contraintes pour la table `moyen_paiement`
--
ALTER TABLE `moyen_paiement`
  ADD CONSTRAINT `fk_compte_paiement` FOREIGN KEY (`id_compte`) REFERENCES `compte_bancaire` (`num_compte`);

--
-- Contraintes pour la table `repetitif`
--
ALTER TABLE `repetitif`
  ADD CONSTRAINT `fk_periodocite` FOREIGN KEY (`id_periodocite`) REFERENCES `periodicite` (`id`);

--
-- Contraintes pour la table `virement`
--
ALTER TABLE `virement`
  ADD CONSTRAINT `fk_mouvement_virement` FOREIGN KEY (`id_mouvement`) REFERENCES `mouvement` (`id`),
  ADD CONSTRAINT `fk_virement_compte` FOREIGN KEY (`id_compte_crediteur`) REFERENCES `compte_bancaire` (`num_compte`);
