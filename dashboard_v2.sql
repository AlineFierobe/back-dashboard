-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 13, 2021 at 08:40 PM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `perso_2021_vue_dashboard_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `ID_config` bigint(20) NOT NULL,
  `SITENAME_config` varchar(60) NOT NULL,
  `DEVNAME_config` varchar(60) NOT NULL,
  `DEVSITE_config` varchar(255) NOT NULL,
  `ABOUT_config` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`ID_config`, `SITENAME_config`, `DEVNAME_config`, `DEVSITE_config`, `ABOUT_config`) VALUES
(1, 'myDashboard', 'Aline Fierobe', 'https://alinefierobe.com', '\n\nmyDashboard est un site réalisé dans le but d\'organiser son travail.\n\nL\'utilisateur à la possibilité de créer des Projets, des Réunions et des Tâches. \n\nGrâce à un système de Filtre, l\'utilisateur retrouve sur la page d\'Accueil les Tâches et les Réunions qui sont planifiées pour le jour en cours. De cette manière il peut garder un oeil rapide sur son activité du jour. \nIl peut aussi retrouver toutes les Réunions et toutes les Tâches toujours en cours grâce à la barre de navigation.\n\nSi vous souhaitez un site similaire pour votre usage personnel, n\'hésitez pas à envoyer un mail à contact@alinefierobe.com');

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `ID_meeting` bigint(20) NOT NULL,
  `NAME_meeting` varchar(255) NOT NULL,
  `DATE_meeting` date NOT NULL,
  `TIME_meeting` time NOT NULL,
  `DESCRIPTION_meeting` text NOT NULL,
  `MORE_meeting` text NOT NULL,
  `REPORT_meeting` text NOT NULL,
  `TYPE_meeting` int(11) NOT NULL,
  `PROJECT_meeting` int(11) NOT NULL,
  `STATUS_meeting` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `ID_project` bigint(20) NOT NULL,
  `NAME_project` varchar(255) NOT NULL,
  `DESCRIPTION_project` text NOT NULL,
  `DEADLINE_project` date NOT NULL,
  `TYPE_project` int(11) NOT NULL,
  `STATUS_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `ID_status` bigint(20) NOT NULL,
  `NAME_status` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`ID_status`, `NAME_status`) VALUES
(1, 'en cours'),
(2, 'terminé'),
(3, 'abandonné');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `ID_task` bigint(20) NOT NULL,
  `NAME_task` varchar(255) NOT NULL,
  `DEADLINE_task` date NOT NULL,
  `DESCRIPTION_task` text NOT NULL,
  `TYPE_task` int(11) NOT NULL,
  `PROJECT_task` int(11) NOT NULL,
  `STATUS_task` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `type_meeting`
--

CREATE TABLE `type_meeting` (
  `ID_type_meeting` bigint(20) NOT NULL,
  `NAME_type_meeting` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_meeting`
--

INSERT INTO `type_meeting` (`ID_type_meeting`, `NAME_type_meeting`) VALUES
(1, 'téléphone'),
(2, 'visio/vidéo'),
(3, 'au bureau'),
(4, 'à l\'extérieur');

-- --------------------------------------------------------

--
-- Table structure for table `type_project`
--

CREATE TABLE `type_project` (
  `ID_type_project` bigint(20) NOT NULL,
  `NAME_type_project` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_project`
--

INSERT INTO `type_project` (`ID_type_project`, `NAME_type_project`) VALUES
(1, 'FrontEnd'),
(2, 'BackEnd'),
(3, 'FullStack'),
(4, 'WordPress'),
(5, 'Autre');

-- --------------------------------------------------------

--
-- Table structure for table `type_task`
--

CREATE TABLE `type_task` (
  `ID_type_task` bigint(20) NOT NULL,
  `NAME_type_task` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_task`
--

INSERT INTO `type_task` (`ID_type_task`, `NAME_type_task`) VALUES
(1, 'todo'),
(2, 'bug');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID_user` bigint(20) NOT NULL,
  `FIRSTNAME_user` varchar(32) NOT NULL,
  `LASTNAME_user` varchar(32) NOT NULL,
  `MORE_user` varchar(255) NOT NULL,
  `ICON_user` varchar(255) NOT NULL,
  `PASSWORD_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`ID_config`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`ID_meeting`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`ID_project`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`ID_status`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`ID_task`);

--
-- Indexes for table `type_meeting`
--
ALTER TABLE `type_meeting`
  ADD PRIMARY KEY (`ID_type_meeting`);

--
-- Indexes for table `type_project`
--
ALTER TABLE `type_project`
  ADD PRIMARY KEY (`ID_type_project`);

--
-- Indexes for table `type_task`
--
ALTER TABLE `type_task`
  ADD PRIMARY KEY (`ID_type_task`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `ID_config` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `ID_meeting` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `ID_project` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `ID_status` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `ID_task` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type_meeting`
--
ALTER TABLE `type_meeting`
  MODIFY `ID_type_meeting` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `type_project`
--
ALTER TABLE `type_project`
  MODIFY `ID_type_project` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `type_task`
--
ALTER TABLE `type_task`
  MODIFY `ID_type_task` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_user` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
