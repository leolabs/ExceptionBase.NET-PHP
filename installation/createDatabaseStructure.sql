-- Import this file into your MySQL database 
-- to create the ExceptionBase.NET structure.

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

USE `YOUR DATABASE NAME HERE`

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Tabellenstruktur für Tabelle `applications`
--

CREATE TABLE IF NOT EXISTS `applications` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Tabellenstruktur für Tabelle `exceptions`
--

CREATE TABLE IF NOT EXISTS `exceptions` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Fixed` tinyint(1) NOT NULL DEFAULT '0',
  `ExceptionMessage` text NOT NULL,
  `ExceptionInner` text,
  `StackTrace` text NOT NULL,
  `ErrorMethod` text NOT NULL,
  `UserDescription` text,
  `App` int(2) NOT NULL,
  `Version` varchar(50) NOT NULL,
  `NETFramework` varchar(25) NOT NULL,
  `InstalledOS` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=0 ;

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(2) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `PasswordHash` varchar(256) NOT NULL,
  `Mail` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
