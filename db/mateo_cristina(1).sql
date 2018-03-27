-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Gazda: localhost:3306
-- Timp de generare: 20 Aug 2017 la 23:46
-- Versiune server: 5.6.33
-- Versiune PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Bază de date: `mateo_cristina`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `categorii`
--

CREATE TABLE IF NOT EXISTS `categorii` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `parent_id` int(4) NOT NULL,
  `nume` varchar(64) COLLATE utf8_bin NOT NULL,
  `pozitie` int(3) NOT NULL,
  `descriere_scurta` text COLLATE utf8_bin NOT NULL,
  `imagine` varchar(64) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=37 ;

--
-- Salvarea datelor din tabel `categorii`
--

INSERT INTO `categorii` (`id`, `parent_id`, `nume`, `pozitie`, `descriere_scurta`, `imagine`) VALUES
(1, 0, 'General', 0, 'Pagini generale', ''),
(3, 0, 'News', 4, 'Stiri din stomatologie', '');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `dictionar`
--

CREATE TABLE IF NOT EXISTS `dictionar` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `cheie` varchar(256) COLLATE utf8_bin NOT NULL,
  `cuvant` varchar(256) COLLATE utf8_bin NOT NULL,
  `lang` varchar(2) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Pentru traduceri' AUTO_INCREMENT=100 ;

--
-- Salvarea datelor din tabel `dictionar`
--

INSERT INTO `dictionar` (`id`, `cheie`, `cuvant`, `lang`) VALUES
(1, 'test', 'test', 'ro'),
(2, 'test', 'test', 'en'),
(3, 'SERVICES', 'SERVICES', 'en'),
(4, 'SERVICES', 'SERVICII', 'ro'),
(5, 'CONTACT US', 'CONTACT US', 'en'),
(6, 'CONTACT US', 'CONTACTEAZ&#258;-NE!', 'ro'),
(7, 'INFORMATIONS', 'INFORMATIONS', 'en'),
(8, 'INFORMATIONS', 'INFORMA&#354;II', 'ro'),
(9, 'INFORMATION', 'MENU', 'en'),
(10, 'INFORMATION', 'MENIU', 'ro'),
(11, 'Price List', 'Price List', 'en'),
(12, 'Price List', 'Lista de pre&#355;uri', 'ro'),
(13, 'Servicii', 'Services', 'en'),
(14, 'Servicii', 'Servicii', 'ro'),
(15, 'Harta', 'Map', 'en'),
(16, 'Harta', 'Harta', 'ro'),
(17, 'About Us', 'About Us', 'en'),
(18, 'About Us', 'Despre noi', 'ro'),
(19, 'Informations', 'Informations', 'en'),
(20, 'Informations', 'Informa&#355;ii pentru pacien&#355;i', 'ro'),
(21, 'Home', 'Home', 'en'),
(22, 'Home', 'Acas&#259;', 'ro'),
(23, 'Phone', 'Phone', 'en'),
(24, 'Phone', 'Telefon', 'ro'),
(25, 'Terms and Conditions', 'Terms and Conditions', 'en'),
(26, 'Terms and Conditions', 'Termeni &#351;i Condi&#355;ii', 'ro'),
(27, 'Terms and conditions', 'Terms and conditions', 'en'),
(28, 'Terms and conditions', 'Termene &#351;i condi&#355;ii', 'ro'),
(29, 'Make an appointment', 'Make an appointment', 'en'),
(30, 'Make an appointment', 'F&#259; o programare', 'ro'),
(31, 'Appointment', 'Appointment', 'en'),
(32, 'Appointment', 'Programare', 'ro'),
(33, 'Full name', 'Full name', 'en'),
(34, 'Full name', 'Numele (nume si prenume)', 'ro'),
(35, 'Phone number', 'Phone number', 'en'),
(36, 'Phone number', 'Telefonul', 'ro'),
(37, 'Email address', 'Email address', 'en'),
(38, 'Email address', 'E-mailul', 'ro'),
(39, 'Appointment date', 'Appointment date', 'en'),
(40, 'Appointment date', 'Data programarii', 'ro'),
(41, 'Message', 'Message', 'en'),
(42, 'Message', 'Mesaj', 'ro'),
(43, 'Send', 'Send', 'en'),
(44, 'Send', 'Trimite', 'ro'),
(45, 'LES MER', 'READ MORE', 'en'),
(46, 'LES MER', 'MAI MULT', 'ro'),
(47, 'Program de lucru', 'Program de lucru', 'ro'),
(48, 'Program de lucru', 'Timetable', 'en'),
(49, 'Luni', 'Luni', 'ro'),
(50, 'Luni', 'Monday', 'en'),
(51, 'Marti', 'Marti', 'ro'),
(52, 'Marti', 'Tuesday', 'en'),
(53, 'Miercuri', 'Miercuri', 'ro'),
(54, 'Miercuri', 'Wednesday', 'en'),
(55, 'Joi', 'Joi', 'ro'),
(56, 'Joi', 'Thursday', 'en'),
(57, 'Vineri', 'Vineri', 'ro'),
(58, 'Vineri', 'Friday', 'en'),
(59, 'Sambata', 'Sambata', 'ro'),
(60, 'Sambata', 'Saturday', 'en'),
(61, 'Kart', 'Map', 'en'),
(62, 'Kart', 'Harta', 'ro'),
(63, 'Informatii', 'Information', 'en'),
(64, 'Informatii', 'Informa&#355;ii', 'ro'),
(65, 'Services', 'Services', 'en'),
(66, 'Services', 'Servicii', 'ro'),
(67, 'Informatii pentru pacient', 'Informa&#355;ii pentru pacient', 'ro'),
(68, 'Informatii pentru pacient', 'Information for our clients', 'en'),
(69, 'About Us', 'Chi Siamo', 'it'),
(70, 'SERVICES', 'SERVIZI', 'it'),
(71, 'INFORMATIONS', 'INFORMAZIONI', 'it'),
(72, 'Servicii', 'Servizi', 'it'),
(73, 'Informations', 'Informazioni', 'it'),
(74, 'CONTACT US', 'CONTATTO', 'it'),
(75, 'About Us', 'Chi Siamo', 'it'),
(76, 'Home', 'Acasa', 'it'),
(77, 'Phone', 'Telefono', 'it'),
(78, 'Terms and Conditions', 'Termini e condizioni', 'it'),
(79, 'Make an appointment', 'Per fissare un appuntamento', 'it'),
(80, 'Harta', 'Mappa', 'it'),
(81, 'Phone number', 'Numero telefono', 'it'),
(82, 'Email address', 'E-mail', 'it'),
(83, 'Send', 'Inviare', 'it'),
(84, 'LES MER', 'DI PIU', 'it'),
(85, 'Full name', 'Nome (nome e cognome)', 'it'),
(86, 'Message', 'Messagio', 'it'),
(87, 'Program de lucru', 'Orario', 'it'),
(88, 'Luni', 'Lunedi', 'it'),
(89, 'Marti', 'Martedi', 'it'),
(90, 'Miercuri', 'Mercoledi', 'it'),
(91, 'Joi', 'Giovedi', 'it'),
(92, 'Vineri', 'Venerdi', 'it'),
(93, 'Sambata', 'Sabato', 'it'),
(94, 'Services', 'Servizi', 'it'),
(95, 'INFORMATION', 'MENU', 'it'),
(96, 'Terms and conditions', 'Termini e condizioni', 'it'),
(97, 'Informatii', 'Informazione', 'it'),
(98, 'Appointment date', 'Data programazione', 'it'),
(99, 'Kart', 'Mappa', 'it');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `evenimente`
--

CREATE TABLE IF NOT EXISTS `evenimente` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `titlu` varchar(256) NOT NULL,
  `data` varchar(30) NOT NULL,
  `locul` varchar(64) NOT NULL,
  `tara` varchar(32) NOT NULL,
  `imagine` varchar(64) NOT NULL,
  `descriere` text NOT NULL,
  `lang` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `foto_categorii`
--

CREATE TABLE IF NOT EXISTS `foto_categorii` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Categorii galerii foto' AUTO_INCREMENT=2 ;

--
-- Salvarea datelor din tabel `foto_categorii`
--

INSERT INTO `foto_categorii` (`id`, `categorie`) VALUES
(1, 'General');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `foto_galerie`
--

CREATE TABLE IF NOT EXISTS `foto_galerie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foto_categorii_id` int(3) NOT NULL,
  `imagine` varchar(128) NOT NULL,
  `titlu` varchar(256) NOT NULL,
  `eveniment_id` int(3) NOT NULL COMMENT 'Acest camp este pentru acele fotos pentru care exista un eveniment asociat.',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='galeria foto' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `lang` varchar(2) COLLATE utf8_bin NOT NULL,
  `language` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Nu stiu daca acest tabel imi foloseste aici';

--
-- Salvarea datelor din tabel `languages`
--

INSERT INTO `languages` (`lang`, `language`) VALUES
('ro', 'Romana'),
('en', 'English'),
('it', 'Italian');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `pagini`
--

CREATE TABLE IF NOT EXISTS `pagini` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `categorii_id` int(4) NOT NULL,
  `categorie` varchar(64) COLLATE utf8_bin NOT NULL COMMENT '=categorie.nume',
  `titlu` varchar(256) COLLATE utf8_bin NOT NULL,
  `template` varchar(256) COLLATE utf8_bin NOT NULL,
  `tara` varchar(32) COLLATE utf8_bin NOT NULL COMMENT 'Poate fi Romania sau Austria',
  `tip_pagina` varchar(32) COLLATE utf8_bin NOT NULL COMMENT 'poate fi normala, cadru sau php(duce catre o aplicatie sau ceva asemanator)',
  `fisierul` varchar(256) COLLATE utf8_bin NOT NULL COMMENT 'este calea catre fisierul care trebuie folosit',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Acesta este, pratic, indexul paginilor statice' AUTO_INCREMENT=103 ;

--
-- Salvarea datelor din tabel `pagini`
--

INSERT INTO `pagini` (`id`, `categorii_id`, `categorie`, `titlu`, `template`, `tara`, `tip_pagina`, `fisierul`) VALUES
(95, 1, 'General', 'Prima Pagina - Col 1', 'General', 'Romania', '', ''),
(96, 1, 'General', 'Prima Pagina - Col 2', 'General', 'Romania', '', ''),
(97, 1, 'General', 'Prima Pagina - Col 3', 'General', 'Romania', '', ''),
(98, 1, 'General', 'Prima Pagina - Important', 'General', 'Romania', '', ''),
(99, 1, 'General', 'Despre noi', 'General', 'Romania', '', ''),
(100, 1, 'General', 'Servicii', 'General', 'Romania', '', ''),
(101, 1, 'General', 'INformatii pentru pacient, preturi', 'General', 'Romania', '', ''),
(102, 1, 'General', 'Lista de preturi', 'General', 'Romania', '', '');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `pagini_content`
--

CREATE TABLE IF NOT EXISTS `pagini_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pagini_id` int(10) NOT NULL,
  `titlu` varchar(256) COLLATE utf8_bin NOT NULL,
  `subtitlu` varchar(256) COLLATE utf8_bin NOT NULL,
  `short_description` text COLLATE utf8_bin NOT NULL,
  `content` longtext COLLATE utf8_bin NOT NULL,
  `lang` varchar(2) COLLATE utf8_bin NOT NULL,
  `keywords` text COLLATE utf8_bin NOT NULL,
  `imagine` varchar(128) COLLATE utf8_bin NOT NULL,
  `data` date NOT NULL,
  `ora` varchar(10) COLLATE utf8_bin NOT NULL,
  `users_id` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=29 ;

--
-- Salvarea datelor din tabel `pagini_content`
--

INSERT INTO `pagini_content` (`id`, `pagini_id`, `titlu`, `subtitlu`, `short_description`, `content`, `lang`, `keywords`, `imagine`, `data`, `ora`, `users_id`) VALUES
(5, 95, 'Prima Pagina - Col 1', 'Col 1 - Despre noi', '', '<p>Suntem un cabinet stomatologic cu 15 ani vechime. Am functionat la adresa str. N. Iorga iar din anul 2009 ne-am mutat la adresa.....</p><p><em>Noua adresa. </em><br></p><p>Cu o experienta de peste 15 ani, dr. Mihaela Tanasescu va poate oferi cele mai bune servicii stomatologice din Craiova.<br></p><p><br></p>', 'ro', '', '', '2015-12-17', '02:30', 0),
(6, 95, 'Prima Pagina - Col 1', 'Col 1 - Despre noi', '', '<p><span lang="en" id="result_box"><span class="hps">We are</span> <span class="hps">a dental practice</span> <span class="hps">15</span> <span class="hps">years old.</span> <span class="hps">I</span> <span class="hps">worked</span> <span class="hps">at</span> <span class="hps">Str</span><span>.</span> <span class="hps">Nicolae Iorga</span> <span class="hps">and</span> <span class="hps">in 2009</span> <span class="hps">we moved</span> <span class="hps">to the</span> </span></p>\r\n<p><span lang="en" id="result_box">...<em> <span class="hps">new address</span> </em><span class="hps">.....</span><span>.</span><br />\r\n<br />\r\n<span class="hps">With an experience of</span> <span class="hps">over 15 years</span><span>,</span> <span class="hps">dr.</span> <span class="hps">Mihaela</span> <span class="hps">Tanasescu</span> <span class="hps">can offer</span> <span class="hps">the best</span> <span class="hps">dental services</span> <span class="hps">in</span> <span class="hps">Craiova.</span></span></p>', 'en', '', '', '2015-12-17', '02:30', 0),
(7, 96, 'Prima Pagina - Col 2', 'Coloana 2', '', '<p>Aici poti afla mai multe detalii despre tratamente stomatologice, terapii si alte servicii disponibile.<br></p><p><br></p>', 'ro', '', '', '2015-12-17', '02:37', 0),
(8, 96, 'Prima Pagina - Col 2', 'Coloana 2', '', '<p>Here you can find out more informations about treatments and oral therapy. Click to read more. <br></p><p><br></p>', 'en', '', '', '2015-12-17', '02:37', 0),
(9, 97, 'Prima Pagina - Col 3', 'Coloana 3', '', '<p>Cabinetul nostru stomatologic ofera urmatoarele servicii: Estetica dentară, Protocolul primei consultantii, Albire dentară, Soluții estetice integral ceramice din zirconiu dentar, Fatete dentare, Solutii estetice parodontale, Solutii estetice ortodontice, Tratamente stomatologice<em> si altele.</em><br></p><p><em></em><br></p>', 'ro', '', '', '2015-12-17', '02:39', 0),
(10, 97, 'Prima Pagina - Col 3', 'Coloana 3', '', '<p>Our dental office offers the following services: Dental Aesthetics, Protocol first consultants, whitening, aesthetic solutions zirconia ceramic dental veneers dental, periodontal esthetic solutions, solutions aesthetic orthodontic dental treatments <em>and</em> <em>more</em>.<br></p><p><br></p>', 'en', '', '', '2015-12-17', '02:39', 0),
(11, 98, 'Prima Pagina - Important', 'Important', '', '<p>In perioada sarbatorilor de iarna lucram mai putin. Avem cateva zile libere.</p><p><br></p><p><em>Va mulțumim!</em><br></p>', 'ro', '', '', '2015-12-18', '09:57', 0),
(12, 98, 'Prima Pagina - Important', 'Important', '', '<p>During the holidays we work less. We have a few days off.<br></p><p>Please call ahead.<br><br></p>', 'en', '', '', '2015-12-18', '09:57', 0),
(13, 99, 'Despre noi', 'Despre noi', '', '<p>Suntem un cabinet stomatologic cu 15 ani vechime. Am functionat la adresa str. N. Iorga iar din anul 2009 ne-am mutat la adresa.....Noua adresa.</p><p>Cu o experienta de peste 15 ani, dr. Mihaela Tanasescu va poate oferi cele mai bune servicii stomatologice din Craiova.</p><p>Este un cabinet. <br></p><p><br></p><p><br></p>', 'ro', '', '', '2015-12-18', '10:21', 0),
(14, 99, 'Despre noi', 'Despre noi', '', '<p>We are a dental practice 15 years old. I worked at Str. Nicolae Iorga and in 2009 we moved to the new address.<br><br>With an experience of over 15 years, dr. Mihaela Tanasescu can offer the best dental services in Craiova.<br><br>Mihaela Tanasescu Dentist\\''s offers a variety of dental services to Western standards: orthodontics, cosmetic dentistry, prosthetic dentistry, implantology, periodontics or pedodontics. Our existing equipment in the dental office is the latest generation and enables us to offer some of the best dental services in the country.<br><br>Being close to our clients we can offer one of the best appointments with a dentist.<br></p><p><br></p><p><br></p>', 'en', '', '', '2015-12-18', '10:21', 0),
(24, 101, 'Informatii pentru pacient, preturi', '', 'in italiana', '<h2><span lang="en" id="result_box"><span title="Informatii generale\r\n">General information</span></span></h2>\r\n<h4><span lang="en" id="result_box"><span title="Ortodontia adultului\r\n">Adult Orthodontics</span></span></h4>\r\n<p><span lang="en" id="result_box"><span title="Tratamentele ortodontice moderne nu mai sunt limitate de v&acirc;rsta pacientului.">Modern Orthodontic treatments are no longer limited by age. </span><span title="DisciplinÄƒ relativ nouÄƒ, ortodonÅ£ia adultului rÄƒspunde tot mai mult cerinÅ£elor estetice ÅŸi nevoilor preventive ale pacienÅ£ilor.">Relatively new discipline, adult orthodontics increasingly meet aesthetic requirements and preventive needs of patients. </span><span title="PacienÅ£ii de orice v&acirc;rstÄƒ se adreseazÄƒ cel mai des din motive fizionomice, caracterizate prin &icirc;nghesuiri dentare.">Patients of all ages are addressed esthetic reasons most often characterized by dental crowding. </span><span title="PacienÅ£ii cu probleme parodontale, care implicÄƒ de multe ori ÅŸi migrÄƒri dentare ÅŸi trauma ocluzalÄƒ, au nevoie de tratament ortodontic complementar celui parodontal pentru alinierea dentarÄƒ ÅŸi echilibrarea ocluzalÄƒ.">Patients  with periodontal problems, often involving migration and dental and  occlusal trauma, need orthodontic treatment for periodontal  complementary to the occlusal tooth alignment and balancing. </span><span title="OrtodonÅ£ia preproteticÄƒ ÅŸi parodontalÄƒ a adultului presupune colaborarea medicului stomatolog generalist cu ortodontul, parodontologul ÅŸi chirurgul dentoalveolar pentru a obÅ£ine o esteticÄƒ mult mai bunÄƒ, prin aliniere, redimensionarea spaÅ£iilor &icirc;ntre dinÅ£ii st&acirc;lpi, remodelarea festonului gingival, intruzia ÅŸi imobilizarea dinÅ£ilor parodontotici.">Preprosthetic  orthodontic and periodontal adult general dentist involves  collaboration with the orthodontist, periodontist and dentoalveolare  surgeon to get a much better aesthetics by aligning, resizing columns  spaces between teeth, gingival festoon remodeling, periodontal teeth  intrusion and immobilization. </span><span title="Aceste tratamente beneficiazÄƒ de multiple variante de aparate ortodontice fixe: &bull; aparatul ortodontic fix cu brakets metalici (aparatul fix tradiÅ£ional) &bull; aparatul ortodontic fix cu brakets ceramici (un aparat fizionomic mult mai estetic dec&acirc;t aparatul metalic) &bull; aparatul ortodontic fix cu brakets din Safir (">These  treatments benefit from multiple variants of fixed orthodontic  appliances: &bull; fixed orthodontic appliance with brakets metal (fixed  device Traditional) &bull; fixed orthodontic appliance with brakets ceramic  (a device esthetic more aesthetic than machine metal) &bull; fixed  orthodontic appliance with brakets in Safir ( </span><span title="brakets fizionomici de culoare asemÄƒnÄƒtoare cu a dinÅ£ilor ÅŸi cu efect cameleonic astfel &icirc;nc&acirc;t nu se pot distinge de la distanÅ£Äƒ) &bull; aparat ortodontic fix Incognito ( invizibil, cu brakets montaÅ£i pe suprafaÅ£a internÄƒ (oralÄƒ) a dinÅ£ilor)\r\n&nbsp;\r\n">brakets physiognomy similar to tooth color with chameleon effect and  so can not be distinguished from a distance) &bull; Incognito fixed  orthodontic appliance (invisible to the internal surface mount brakets  (oral) teeth)<br />\r\n<br />\r\n</span></span></p>\r\n<h4><span lang="en" id="result_box"><span title="Pret aparat dentar\r\n">Price braces</span></span></h4>\r\n<p><span lang="en" id="result_box"><span title="Pretul unui aparat dentar are 3 componente: 1. costul aparatului dentar, 2. costul consultatiei, in cazul nostru aceastea este GRATUITA!">The price of a dental device has three components: 1. the cost of braces, 2. the cost of consultation, in our case it is FREE! </span><span title="3. costul manoperei cum ar fi descimentare bracket sau schimbarea de arc.">3. labor costs such as descimentare bracket or change the arc. </span><span title="Un pret de baza pentru un aparat dentar nu poate fi stabilit.">A base price for braces can not be established. </span><span title="Pretul unui aparat dentar variaza de la caz la caz\r\n&nbsp;\r\n">The price of braces varies from case to case<br />\r\n<br />\r\n&nbsp;</span></span></p>\r\n<h4><span lang="en" id="result_box"><span title="Anatomia dintelui\r\n">Anatomy tooth</span></span></h4>\r\n<p><span lang="en" id="result_box"><span title="Anatomia dintelui\r\n"><br />\r\n</span><span title="La suprafaÅ£Äƒ, dintele se prezintÄƒ ca o structurÄƒ durÄƒ, rigidÄƒ.">On the surface, the tooth structure is presented as a tough, rigid. </span><span title="AceastÄƒ secÅ£iune prin dinte aratÄƒ structura compexÄƒ ÅŸi realÄƒ a acestuia.\r\n">This section shows the structure of the tooth and its real Compex.<br />\r\n<br />\r\n</span><span title="SuprafaÅ£a dintelui este compusÄƒ din smalÅ£, dentinÄƒ ÅŸi cement.\r\n">The tooth surface is composed of enamel dentine and cement.<br />\r\n<br />\r\n</span><span title="Interiorul dintelui este format dintr-un Å£esut moale format din nervi, vase ÅŸi Å£esut de susÅ£inere.">The interior of the tooth is formed of a soft tissue consisting of nerves, vessels and connective tissue support. </span><span title="Periferia rÄƒdÄƒcinii face legÄƒtura cu osul de susÅ£inere prin ligamentele periodontale.\r\n">Peripherals root connects to the bone supporting periodontal ligaments.</span></span></p>\r\n<h4><span lang="en" id="result_box"><span title="Tratamentul stomatologic &icirc;n timpul sarcinii ÅŸi al alÄƒptÄƒrii\r\n">Dental treatment during pregnancy and breastfeeding</span></span></h4>\r\n<p><span lang="en" id="result_box"><span title="Tratamentul stomatologic &icirc;n timpul sarcinii ÅŸi al alÄƒptÄƒrii\r\n"><br />\r\n</span><span title="&Icirc;n aceastÄƒ perioadÄƒ, vizita la stomatolog este obligatorie.">During this period, the visit to the dentist is required. </span><span title="ModificÄƒrile hormonale determinÄƒ o fragilitate crescutÄƒ a gingiilor ÅŸi a dinÅ£ilor &icirc;n faÅ£a atacului bacteriilor, cresc&acirc;nd astfel riscul complicaÅ£iilor de naturÄƒ dentarÄƒ sau gingivalÄƒ.\r\n">Hormonal changes cause increased fragility of the gums and teeth  before the onslaught of bacteria, increasing the risk of complications  such as dental or gum.<br />\r\n<br />\r\n</span><span title="Scopul tratamentului profilactic este obÅ£inerea unei stÄƒri optime de igienÄƒ oralÄƒ prin: control periodic, detartraj, periaj profesional, toate acestea influenÅ£&acirc;nd reducerea inflamaÅ£iei gingivale apÄƒrute ca urmare a tulburÄƒrilor endocrine, o problemÄƒ frecvent &icirc;nt&acirc;lnitÄƒ &icirc;n aceastÄƒ perioadÄƒ.">The  goal of prophylactic treatment is to achieve optimum oral hygiene  conditions through: periodic control, scaling, professional cleaning,  all of which influence the reduction of gingival inflammation that  result from endocrine disorders, a problem frequently encountered in  this period. </span><span title="Pentru evitarea complicaÅ£iilor dentare ÅŸi parodontale din perioada sarcinii, sunt indicate controale regulate ÅŸi cel puÅ£in douÄƒ igienizÄƒri.\r\n">Dental and periodontal To avoid complications during pregnancy, contains at least two regular checkups and hygiene works.<br />\r\n<br />\r\n</span><span title="Relativ rar existÄƒ riscul apariÅ£iei celei mai frecvente compicaÅ£ii a inflamaÅ£iei gingivale, o formaÅ£iune, hiperplazicÄƒ gingivalÄƒ, numitÄƒ epulis gravidorum sau tumora de sarcinÄƒ care, uneori, din cauza dimensiunilor foarte mari, nu se remite ÅŸi este nevoie, dupÄƒ naÅŸtere, de o intervenÅ£ie chirurgicalÄƒ">Relatively  rare is no risk of the most common compicaÅ£ii inflammation gum  formation, gingival hyperplasia, called epulis gravidorum or tumor  burden that sometimes because of size large, not resolved and is  necessary after childbirth, surgery </span><span title="simplÄƒ pentru &icirc;ndepÄƒrtarea acesteia.\r\n">Simple to remove.<br />\r\n<br />\r\n</span><span title="&Icirc;n special &icirc;n primul trimestru al sarcinii, se recomandÄƒ evitarea expunerii pacientelor gravide la radiografii cu radiatii Roentgen.">Especially in the first trimester, pregnant patients is recommended to avoid exposure to radiation x-rays Roentgen. </span><span title="&Icirc;ncep&acirc;nd cu al doilea trimestru acestea sunt permise dar numai cu condiÅ£ia utilizÄƒrii necondiÅ£ionate a ÅŸorÅ£ului de plumb pentru reducerea la zero a radiaÅ£iei periculoase.">Since the second quarter they are allowed but only if you use a lead apron to put zeroing dangerous radiation.</span></span></p>\r\n<p>&nbsp;</p>\r\n<h2>&nbsp;</h2>', 'it', '', '', '2015-12-18', '10:33', 0),
(15, 100, 'Servicii', '', '', '<p>Cabinetul nostru stomatologic oferă urmatoarele servicii:<br></p><h3>Estetica dentara</h3><ul><li>Protocolul primei consultantii</li><li>Albire dentara<br></li><li>Solutii estetice integral ceramice din zirconiu dentar . . . .</li><li>Fatete dentare</li><li>Solutii estetice parodontale</li><li>Solutii estetice ortodontice</li></ul><h3>Tratamente stomatologice</h3><ul><li>Pret Implant dentar<br></li><li>Solutii restaurative si proteice<br></li><li>SoluÅ£ii chirurgicale ÅŸi parodontale</li><li>Endodontia, tratamentul radacinilor dentare, obturatia de canal</li><li>Ortodontie – Aparat Dentar</li><li>Tratamente preventive si cosmetice</li></ul><h3>PrevenȚIE dentarĂ</h3>', 'ro', '', '', '2015-12-18', '10:24', 0),
(16, 100, 'Servicii', '', '', '<p>Our dental office offers the following services:</p>\r\n<h3><br />\r\nDental Aesthetics</h3>\r\n<ul>\r\n    <li>First Protocol consultants&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; </li>\r\n    <li>Whitening</li>\r\n    <li>Solutions aesthetic dental ceramic zirconium</li>\r\n    <li>Dental Veneers</li>\r\n    <li>Periodontal aesthetic solutions</li>\r\n    <li>Aesthetic orthodontic solutions<br />\r\n    &nbsp;</li>\r\n</ul>\r\n<h3>Entaltreatment</h3>\r\n<ul>\r\n    <li>Dental Implant</li>\r\n    <li>PriceRestorative Solutions and protein</li>\r\n    <li>Surgical and periodontal Solutions</li>\r\n    <li>Endodontic treatment of tooth root, root canal</li>\r\n    <li>Orthodontics - braces</li>\r\n    <li>Preventive and cosmetic</li>\r\n</ul>\r\n<h3>Preventive dental</h3>', 'en', '', '', '2015-12-18', '10:24', 0),
(21, 95, 'Prima pagina - col 1', 'Col 1 - Despre noi', 'desspre noi in italiana', 'Despre noi in italiana', 'it', '', '', '2016-04-04', '00:00', 1),
(22, 96, 'Prima pagina - col 2', 'Col 2 - Informatii', 'Informatii in italiana', '<p>Informatii in italiana.. hsdghdg hg<br></p><p><br></p><h3>sadfsdfs <br></h3><pre>hsgdfhsg</pre>', 'it', '', '', '2016-04-04', '', 0),
(23, 102, 'Lista de preturi', 'Lista de preturi', 'in italiana', '<div class="preturi">\r\n<table>\r\n    <tbody>\r\n        <tr>\r\n            <th width="448">Serviciu</th>\r\n            <th width="141" style="text-align: right;">Pret</th>\r\n        </tr>\r\n        <tr>\r\n            <td>Unders&oslash;kelse inkl. 2r&oslash;ntgen bilder, tannstenrens, fjerning av misfarginger</td>\r\n            <td class="dreapta">820 lei</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Konsultasjon av akutt pasient</td>\r\n            <td class="dreapta">400 lei</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Tannrens\\puss</td>\r\n            <td class="dreapta">350 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Komposittfylling, 1 flate</td>\r\n            <td class="dreapta">600 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Komposittfylling, 2 flater</td>\r\n            <td class="dreapta">1 100 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Komposittfylling, 3 flater</td>\r\n            <td class="dreapta">1 300 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Midlertidig fylling IRM</td>\r\n            <td class="dreapta">500 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Bed&oslash;velse</td>\r\n            <td class="dreapta">150 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>R&oslash;ntgenbilde</td>\r\n            <td class="dreapta">130 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Krone, inkl.teknikerutgifter</td>\r\n            <td class="dreapta">5 500 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Rotfylling, 1-4 kanaler</td>\r\n            <td class="dreapta">2500 - 4000 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Bleking, en kjeve</td>\r\n            <td class="dreapta">2 500 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Bleking, begge kjever</td>\r\n            <td class="dreapta">4 000 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Ukomplisert ekstraksjon</td>\r\n            <td class="dreapta">800 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Del\\helprotese en kjeve, inkl.teknikerutgifter</td>\r\n            <td class="dreapta">10000 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Hygienetillegg(tilkommer pr behandling)</td>\r\n            <td class="dreapta">120 nok</td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</div>\r\n<div class="clar">&nbsp;</div>\r\n<h3>Reduceri</h3>', 'it', '', '', '2015-12-18', '10:36', 0),
(17, 101, 'INformatii pentru pacient, preturi', '', '', '<p>Ortodontia adultului</p><p>Tratamentele ortodontice moderne nu mai sunt limitate de vârsta pacientului. DisciplinÄƒ relativ nouÄƒ, ortodonÅ£ia adultului rÄƒspunde tot mai mult cerinÅ£elor estetice ÅŸi nevoilor preventive ale pacienÅ£ilor. PacienÅ£ii de orice vârstÄƒ se adreseazÄƒ cel mai des din motive fizionomice, caracterizate prin înghesuiri dentare. PacienÅ£ii cu probleme parodontale, care implicÄƒ de multe ori ÅŸi migrÄƒri dentare ÅŸi trauma ocluzalÄƒ, au nevoie de tratament ortodontic complementar celui parodontal pentru alinierea dentarÄƒ ÅŸi echilibrarea ocluzalÄƒ. OrtodonÅ£ia preproteticÄƒ ÅŸi parodontalÄƒ a adultului presupune colaborarea medicului stomatolog generalist cu ortodontul, parodontologul ÅŸi chirurgul dentoalveolar pentru a obÅ£ine o esteticÄƒ mult mai bunÄƒ, prin aliniere, redimensionarea spaÅ£iilor între dinÅ£ii stâlpi, remodelarea festonului gingival, intruzia ÅŸi imobilizarea dinÅ£ilor parodontotici. Aceste tratamente beneficiazÄƒ de multiple variante de aparate ortodontice fixe: • aparatul ortodontic fix cu brakets metalici (aparatul fix tradiÅ£ional) • aparatul ortodontic fix cu brakets ceramici (un aparat fizionomic mult mai estetic decât aparatul metalic) • aparatul ortodontic fix cu brakets din Safir (brakets fizionomici de culoare asemÄƒnÄƒtoare cu a dinÅ£ilor ÅŸi cu efect cameleonic astfel încât nu se pot distinge de la distanÅ£Äƒ) • aparat ortodontic fix Incognito ( invizibil, cu brakets montaÅ£i pe suprafaÅ£a internÄƒ (oralÄƒ) a dinÅ£ilor)<br></p><p><br></p><p>Pret aparat dentar</p><p>Pretul unui aparat dentar are 3 componente: 1. costul aparatului dentar, 2. costul consultatiei, in cazul nostru aceastea este GRATUITA! 3. costul manoperei cum ar fi descimentare bracket sau schimbarea de arc. Un pret de baza pentru un aparat dentar nu poate fi stabilit. Pretul unui aparat dentar variaza de la caz la caz</p><p><br></p><h3>Informatii generale</h3><p>Anatomia dintelui</p><p>La suprafaÅ£Äƒ, dintele se prezintÄƒ ca o structurÄƒ durÄƒ, rigidÄƒ. AceastÄƒ secÅ£iune prin dinte aratÄƒ structura compexÄƒ ÅŸi realÄƒ a acestuia.</p><p>SuprafaÅ£a dintelui este compusÄƒ din smalÅ£, dentinÄƒ ÅŸi cement.</p><p>Interiorul dintelui este format dintr-un Å£esut moale format din nervi, vase ÅŸi Å£esut de susÅ£inere. Periferia rÄƒdÄƒcinii face legÄƒtura cu osul de susÅ£inere prin ligamentele periodontale.</p><p>Tratamentul stomatologic în timpul sarcinii ÅŸi al alÄƒptÄƒrii</p><p>În aceastÄƒ perioadÄƒ, vizita la stomatolog este obligatorie. ModificÄƒrile hormonale determinÄƒ o fragilitate crescutÄƒ a gingiilor ÅŸi a dinÅ£ilor în faÅ£a atacului bacteriilor, crescând astfel riscul complicaÅ£iilor de naturÄƒ dentarÄƒ sau gingivalÄƒ.</p><p>Scopul tratamentului profilactic este obÅ£inerea unei stÄƒri optime de igienÄƒ oralÄƒ prin: control periodic, detartraj, periaj profesional, toate acestea influenÅ£ând reducerea inflamaÅ£iei gingivale apÄƒrute ca urmare a tulburÄƒrilor endocrine, o problemÄƒ frecvent întâlnitÄƒ în aceastÄƒ perioadÄƒ. Pentru evitarea complicaÅ£iilor dentare ÅŸi parodontale din perioada sarcinii, sunt indicate controale regulate ÅŸi cel puÅ£in douÄƒ igienizÄƒri.</p><p>Relativ rar existÄƒ riscul apariÅ£iei celei mai frecvente compicaÅ£ii a inflamaÅ£iei gingivale, o formaÅ£iune, hiperplazicÄƒ gingivalÄƒ, numitÄƒ epulis gravidorum sau tumora de sarcinÄƒ care, uneori, din cauza dimensiunilor foarte mari, nu se remite ÅŸi este nevoie, dupÄƒ naÅŸtere, de o intervenÅ£ie chirurgicalÄƒ simplÄƒ pentru îndepÄƒrtarea acesteia.</p><p>În special în primul trimestru al sarcinii, se recomandă evitarea expunerii pacientelor gravide la radiografii cu radiatii Roentgen. Începând cu al doilea trimestru acestea sunt permise dar numai cu condiÅ£ia utilizÄƒrii necondiÅ£ionate a ÅŸorÅ£ului de plumb pentru reducerea la zero a radiației periculoase.<br></p><p><br></p><h2><br></h2>', 'ro', '', '', '2015-12-18', '10:33', 0),
(18, 101, 'INformatii pentru pacient, preturi', '', '', '<h2>General information</h2><p>Adult Orthodontics</p><p>Modern Orthodontic treatments are no longer limited by age. Relatively new discipline, adult orthodontics increasingly meet aesthetic requirements and preventive needs of patients. Patients of all ages are addressed esthetic reasons most often characterized by dental crowding. Patients with periodontal problems, often involving migration and dental and occlusal trauma, need orthodontic treatment for periodontal complementary to the occlusal tooth alignment and balancing. Preprosthetic orthodontic and periodontal adult general dentist involves collaboration with the orthodontist, periodontist and dentoalveolare surgeon to get a much better aesthetics by aligning, resizing columns spaces between teeth, gingival festoon remodeling, periodontal teeth intrusion and immobilization. These treatments benefit from multiple variants of fixed orthodontic appliances: • fixed orthodontic appliance with brakets metal (fixed device Traditional) • fixed orthodontic appliance with brakets ceramic (a device esthetic more aesthetic than machine metal) • fixed orthodontic appliance with brakets in Safir ( brakets physiognomy similar to tooth color with chameleon effect and so can not be distinguished from a distance) • Incognito fixed orthodontic appliance (invisible to the internal surface mount brakets (oral) teeth)<br><br></p><p>Price braces</p><p>The price of a dental device has three components: 1. the cost of braces, 2. the cost of consultation, in our case it is FREE! 3. labor costs such as descimentare bracket or change the arc. A base price for braces can not be established. The price of braces varies from case to case<br><br><br></p><p>Anatomy tooth</p><p><br>On the surface, the tooth structure is presented as a tough, rigid. This section shows the structure of the tooth and its real Compex.<br><br>The tooth surface is composed of enamel dentine and cement.<br><br>The interior of the tooth is formed of a soft tissue consisting of nerves, vessels and connective tissue support. Peripherals root connects to the bone supporting periodontal ligaments.</p><p>Dental treatment during pregnancy and breastfeeding</p><p><br>During this period, the visit to the dentist is required. Hormonal changes cause increased fragility of the gums and teeth before the onslaught of bacteria, increasing the risk of complications such as dental or gum.<br><br>The goal of prophylactic treatment is to achieve optimum oral hygiene conditions through: periodic control, scaling, professional cleaning, all of which influence the reduction of gingival inflammation that result from endocrine disorders, a problem frequently encountered in this period. Dental and periodontal To avoid complications during pregnancy, contains at least two regular checkups and hygiene works.<br><br>Relatively rare is no risk of the most common compicaÅ£ii inflammation gum formation, gingival hyperplasia, called epulis gravidorum or tumor burden that sometimes because of size large, not resolved and is necessary after childbirth, surgery Simple to remove.<br><br>Especially in the first trimester, pregnant patients is recommended to avoid exposure to radiation x-rays Roentgen. Since the second quarter they are allowed but only if you use a lead apron to put zeroing dangerous radiation. .... <br></p><p><br></p><h2><br></h2>', 'en', '', '', '2015-12-18', '10:33', 0),
(19, 102, 'Lista de preturi', '', '', '<div class="preturi">\r\n<table>\r\n    <tbody>\r\n        <tr>\r\n            <th width="448">Serviciu</th>\r\n            <th width="141" style="text-align: right;">Pret</th>\r\n        </tr>\r\n        <tr>\r\n            <td>Unders&oslash;kelse inkl. 2r&oslash;ntgen bilder, tannstenrens, fjerning av misfarginger</td>\r\n            <td class="dreapta">820 lei</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Konsultasjon av akutt pasient</td>\r\n            <td class="dreapta">400 lei</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Tannrens\\puss</td>\r\n            <td class="dreapta">350 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Komposittfylling, 1 flate</td>\r\n            <td class="dreapta">600 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Komposittfylling, 2 flater</td>\r\n            <td class="dreapta">1 100 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Komposittfylling, 3 flater</td>\r\n            <td class="dreapta">1 300 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Midlertidig fylling IRM</td>\r\n            <td class="dreapta">500 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Bed&oslash;velse</td>\r\n            <td class="dreapta">150 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>R&oslash;ntgenbilde</td>\r\n            <td class="dreapta">130 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Krone, inkl.teknikerutgifter</td>\r\n            <td class="dreapta">5 500 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Rotfylling, 1-4 kanaler</td>\r\n            <td class="dreapta">2500 - 4000 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Bleking, en kjeve</td>\r\n            <td class="dreapta">2 500 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Bleking, begge kjever</td>\r\n            <td class="dreapta">4 000 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Ukomplisert ekstraksjon</td>\r\n            <td class="dreapta">800 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Del\\helprotese en kjeve, inkl.teknikerutgifter</td>\r\n            <td class="dreapta">10000 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Hygienetillegg(tilkommer pr behandling)</td>\r\n            <td class="dreapta">120 nok</td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</div>\r\n<div class="clar">&nbsp;</div>\r\n<h3>Reduceri</h3>', 'ro', '', '', '2015-12-18', '10:36', 0),
(20, 102, 'Lista de preturi', '', '', '<div class="preturi">\r\n<table>\r\n    <tbody>\r\n        <tr>\r\n            <th width="448">Serviciu</th>\r\n            <th width="141" style="text-align: right;">Pret</th>\r\n        </tr>\r\n        <tr>\r\n            <td>Unders&oslash;kelse inkl. 2r&oslash;ntgen bilder, tannstenrens, fjerning av misfarginger</td>\r\n            <td class="dreapta">820 lei</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Konsultasjon av akutt pasient</td>\r\n            <td class="dreapta">400 lei</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Tannrens\\puss</td>\r\n            <td class="dreapta">350 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Komposittfylling, 1 flate</td>\r\n            <td class="dreapta">600 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Komposittfylling, 2 flater</td>\r\n            <td class="dreapta">1 100 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Komposittfylling, 3 flater</td>\r\n            <td class="dreapta">1 300 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Midlertidig fylling IRM</td>\r\n            <td class="dreapta">500 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Bed&oslash;velse</td>\r\n            <td class="dreapta">150 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>R&oslash;ntgenbilde</td>\r\n            <td class="dreapta">130 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Krone, inkl.teknikerutgifter</td>\r\n            <td class="dreapta">5 500 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Rotfylling, 1-4 kanaler</td>\r\n            <td class="dreapta">2500 - 4000 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Bleking, en kjeve</td>\r\n            <td class="dreapta">2 500 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Bleking, begge kjever</td>\r\n            <td class="dreapta">4 000 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Ukomplisert ekstraksjon</td>\r\n            <td class="dreapta">800 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Del\\helprotese en kjeve, inkl.teknikerutgifter</td>\r\n            <td class="dreapta">10000 nok</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Hygienetillegg(tilkommer pr behandling)</td>\r\n            <td class="dreapta">120 nok</td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</div>\r\n<div class="clar">&nbsp;</div>\r\n<h3>Reduceri</h3>', 'en', '', '', '2015-12-18', '10:36', 0),
(25, 97, 'Prima Pagina - Col 3', 'Coloana 3 - italiana', '', 'In Italiano . . . . \r\n<p><span lang="en" id="result_box"><span class="hps">Our dental office</span> <span class="hps">offers the following services</span><span>:</span> <span class="hps">Dental</span> <span class="hps">Aesthetics</span><span>,</span> <span class="hps">Protocol</span> <span class="hps">first</span> <span class="hps">consultants</span><span>,</span> <span class="hps">whitening</span><span>,</span> <span class="hps">aesthetic solutions</span> <span class="hps">zirconia</span> <span class="hps">ceramic</span> <span class="hps">dental</span> <span class="hps">veneers</span> <span class="hps">dental</span><span>,</span> <span class="hps">periodontal</span> <span class="hps">esthetic</span> <span class="hps">solutions</span><span>,</span> <span class="hps">solutions</span> <span class="hps">aesthetic</span> <span class="hps">orthodontic</span> <span class="hps">dental treatments</span> <em><span class="hps">and</span></em><span class="hps"> <em>more</em>.</span></span></p>', 'it', '', '', '2015-12-17', '02:39', 0),
(26, 98, 'Prima Pagina - Important', 'Important - in italiana', 'italiana', 'Italiano . . . \r\n<p><span lang="en" id="result_box"><span class="hps">During</span> <span class="hps">the holidays</span> <span class="hps">we work</span> <span class="hps">less.</span> <span class="hps">We have</span> <span class="hps">a few days off</span><span>.</span><br />\r\n<br />\r\n&nbsp;<br />\r\n<br />\r\n<em><span class="hps">Please</span> <span class="hps">call ahead</span><span>.</span></em></span></p>\r\n<p>&nbsp;</p>\r\n<p><em>&nbsp;</em></p>', 'it', '', '', '2015-12-18', '09:57', 0),
(27, 99, 'Despre noi', 'Despre noi', '', '<p>(italiano) va fi italiana . . . <br></p><p>We are a dental practice 15 years old. I worked at Str. Nicolae Iorga and in 2009 we moved to the new address ......<br><br>With an experience of over 15 years, dr. Mihaela Tanasescu can offer the best dental services in Craiova.<br><br>Mihaela Tanasescu Dentist\\''s offers a variety of dental services to Western standards: orthodontics, cosmetic dentistry, prosthetic dentistry, implantology, periodontics or pedodontics. Our existing equipment in the dental office is the latest generation and enables us to offer some of the best dental services in the country.<br><br>Being close to our clients we can offer one of the best appointments with a dentist.</p>', 'it', '', '', '2015-12-18', '10:21', 0),
(28, 100, 'Servicii', 'in itaiana', '', '<p>itaiano</p><p>Our dental office offers the following services:</p><h3><br>Dental Aesthetics</h3><ul><li>First Protocol consultants', 'it', '', '', '2015-12-18', '10:24', 0);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `pagini_img`
--

CREATE TABLE IF NOT EXISTS `pagini_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pagini_id` int(11) NOT NULL,
  `nume` varchar(128) COLLATE utf8_bin NOT NULL,
  `titlu_imagine` varchar(128) COLLATE utf8_bin NOT NULL,
  `pozitia` int(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='POzele atasate paginilor' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `produse`
--

CREATE TABLE IF NOT EXISTS `produse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produse_categorii_id` int(5) NOT NULL,
  `nume` varchar(128) NOT NULL,
  `produse_categorii` varchar(256) NOT NULL COMMENT 'e un string construit din tot arborele categoriei din care face parte produsul',
  `imagine` varchar(64) NOT NULL,
  `avertisment_red` varchar(128) NOT NULL COMMENT 'gen: paraben free formula',
  `avertisment` tinytext NOT NULL COMMENT 'ex: not tested on animals',
  `descriere` text NOT NULL,
  `cantitate` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `produse_categorii`
--

CREATE TABLE IF NOT EXISTS `produse_categorii` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `parent_id` int(5) NOT NULL COMMENT 'categorii, subcategorii eyc.',
  `nume` varchar(64) NOT NULL,
  `imagine` varchar(128) NOT NULL,
  `pozitie` int(4) NOT NULL COMMENT 'asta este optionala',
  `descriere` text NOT NULL COMMENT 'asta este optionala',
  `nivel` int(11) NOT NULL COMMENT '0 - categorie, 1 subcategorie, 2 subsubcateg/produs, 3 culori',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `produse_content`
--

CREATE TABLE IF NOT EXISTS `produse_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produse_id` int(11) NOT NULL,
  `nume` varchar(256) NOT NULL,
  `avertisment_red` tinytext NOT NULL,
  `avertisment` tinytext NOT NULL,
  `descriere` text NOT NULL,
  `cantitate` varchar(128) NOT NULL COMMENT 'sau DOZAJ etc.',
  `lang` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Acesta este tabelul care contine descrierea produsului in fi' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8_bin NOT NULL,
  `password` varchar(32) COLLATE utf8_bin NOT NULL,
  `IP_last` varchar(25) COLLATE utf8_bin NOT NULL,
  `tip` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Salvarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `IP_last`, `tip`) VALUES
(1, 'stefan', '1c734729bcefaf7e2fe334665d16c4ed', '', 1),
(2, 'admin', 'd441c6c5ea342eac531cd28c7938e4f9', '', 1);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `users_access`
--

CREATE TABLE IF NOT EXISTS `users_access` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `users_id` int(3) NOT NULL,
  `nivel_acces` varchar(64) COLLATE utf8_bin NOT NULL COMMENT 'categorii, pagini, produse',
  `id_acces` int(6) NOT NULL COMMENT 'id_categii, id_pagini, id_produse',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='pentru userii simpli se da acces doar la anumite pagini sau ' AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
