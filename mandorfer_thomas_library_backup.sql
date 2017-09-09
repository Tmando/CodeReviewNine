-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 09. Sep 2017 um 22:00
-- Server-Version: 10.1.26-MariaDB
-- PHP-Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `mandorfer_thomas_library`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Author`
--

CREATE TABLE `Author` (
  `authorid` int(11) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `Author`
--

INSERT INTO `Author` (`authorid`, `firstname`, `lastname`) VALUES
(1, 'Mirijam ', 'Pressler'),
(2, 'Ursula ', 'Poznanski'),
(3, 'Roman', 'Pichler'),
(4, 'Kristina', 'Kobilke'),
(5, 'Walter ', 'Moers'),
(6, 'Christina', 'Bauer'),
(7, 'Stefanie', 'Reeb'),
(8, 'René ', 'Goscinny'),
(9, 'Ingrid ', 'Brodnig'),
(10, 'Julia ', 'Ortner');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Book`
--

CREATE TABLE `Book` (
  `bookid` int(11) NOT NULL,
  `booktitle` varchar(100) DEFAULT NULL,
  `authorid` int(11) NOT NULL,
  `isbn` varchar(100) DEFAULT NULL,
  `shortdescription` text,
  `binding` varchar(100) DEFAULT NULL,
  `pages` int(11) DEFAULT NULL,
  `releasedate` date DEFAULT NULL,
  `languageBook` varchar(100) DEFAULT NULL,
  `publisher` varchar(100) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `categoryid` int(11) NOT NULL,
  `imageLink` text,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `Book`
--

INSERT INTO `Book` (`bookid`, `booktitle`, `authorid`, `isbn`, `shortdescription`, `binding`, `pages`, `releasedate`, `languageBook`, `publisher`, `weight`, `categoryid`, `imageLink`, `status`) VALUES
(1, 'Nathan und seine Kinder ', 1, '978-3-407-81186-8 ', 'Jerusalem, zur Zeit der Kreuzzüge um 1192: Ein junger Tempelritter rettet Recha, die Tochter des jüdischen Kaufmanns Nathan, aus dem Feuer. Daraufhin richtet Sultan Saladin die schwierigste aller Fragen an Nathan: Welche Religion ist die einzig wahre? Nathan antwortet mit dem berühmten Gleichnis von den drei Ringen – doch wird das den Sultan zufriedenstellen? Außerdem ahnt Nathan nicht, dass ihm inzwischen der christliche Patriarch von Jerusalem und ein moslemischer Hauptmann nach dem Leben trachten ... ', 'gebundene Ausgabe ', 259, '2015-03-02', 'Deutsch', 'Beltz', 340, 8, 'https://www.beltz.de/fileadmin/beltz/productsfine/9783407742339.jpg', 'free'),
(2, 'Malka Mai', 1, '978-3-407-78594-7', '1943: Die jüdische Ärztin Hanna Mai lebt mit ihren Töchtern Minna und Malka an der polnisch-ungarischen Grenze. Als die Deutschen auch hier mit den Deportationen beginnen, müssen die drei überstürzt fliehen. Sie wollen zu Fuß über die Karpaten, doch Malka wird krank und kann nicht mehr weiter. Schweren Herzens entschließt Hanna sich, das Kind bei Bauern zurückzulassen, die ihr versprechen, das Mädchen nachzubringen, sobald es sich erholt hat. Aber es kommt alles anders: Malka wird entdeckt und in ein Getto verfrachtet. Dort entwickelt die Kleine ungeahnte Kräfte, die sie Hunger, Kälte, Krankheit und Einsamkeit überstehen lassen - bis ihre Mutter schließlich unter großen Gefahren zurückkehrt, um sie zu retten.', 'Taschenbuch', 324, '2017-02-06', 'Deutsch', 'Beltz', 315, 8, 'https://www.beltz.de/fileadmin/beltz/productsfine/9783407785947.jpg', 'booked'),
(3, 'Aquila', 2, '978-3-7855-8613-6 ', 'LETZTE CHANCE. Quer über dem Badezimmerspiegel prangen diese beiden Worte, als Studentin Nika, verkatert von der letzten Partynacht, ihr Badezimmer betritt. Doch was sie hier noch als einen schlechten Scherz ihrer Mitbewohnerin abtut, zieht schon bald härtere Konsequenzen nach sich, als Nika sich je hätte vorstellen können. Denn schnell wird klar: Sie hat nicht nur kleine Gedächtnislücken, was den vergangenen Abend angeht – ihr fehlen die Erinnerungen an die gesamten letzten 2 Tage …', 'Paperback', 432, '2017-08-14', 'Deutsch', 'Loewe', 570, 1, 'http://www.loewe-verlag.de/_cover_media/titel/648h/8371.jpg', 'free'),
(4, 'Erebos', 2, '978-3-7855-7361-7 ', 'In einer Londoner Schule wird ein Computerspiel herumgereicht Â– Erebos. Wer es startet, kommt nicht mehr davon los. Dabei sind die Regeln Ã¤uÃŸerst streng: Jeder hat nur eine Chance. Er darf mit niemandem darÃ¼ber reden und muss immer allein spielen. Und wer gegen die Regeln verstÃ¶ÃŸt oder seine Aufgaben nicht erfÃ¼llt, fliegt raus und kann Erebos auch nicht mehr starten.\r\nErebos lÃ¤sst Fiktion und Wirklichkeit auf irritierende Weise verschwimmen: Die Aufgaben, die das Spiel stellt, mÃ¼ssen in der realen Welt ausgefÃ¼hrt werden.\r\nAuch Nick ist sÃ¼chtig nach Erebos Â– bis es ihm befiehlt, einen Menschen umzubringen Â…', 'Taschenbuch', 488, '2011-06-06', 'Deutsch', 'Loewe', 546, 1, 'http://www.loewe-verlag.de/_cover_media/titel/648h/4322.jpg', 'booked'),
(5, ' Scrum\r\nAgiles Projektmanagement erfolgreich einsetzen', 3, '978-3-89864-478-5', 'Scrum ist ein agiles Projektmanagementframework, das sich auf alle Arten der Softwareentwicklung anwenden lässt. Richtig eingesetzt hilft Scrum, Kundenzufriedenheit und Wertschöpfung nachhaltig zu steigern.\r\n\r\nDieses Buch vermittelt Ihnen das notwendige Wissen, um Scrum erfolgreich anzuwenden. Es beschreibt Scrum umfassend, systematisch und leicht verständlich. Dabei werden die folgenden Themen behandelt:\r\n\r\n- Scrum-Rollen, ScrumMaster, Product Owner und Team, und der Scrum-Prozess\r\n- Anforderungsbeschreibung und -management in Scrum inkl. Produkt Backlog und User Stories\r\n- Releasemanagement inkl. Schätzen, Planen und Verfolgen\r\n- Das Arbeiten mit Sprints inkl. Eigenschaften von Sprints, die Vorbereitung und Durchführung von Sprint-Planungssitzungen, das Sprint Backlog, Daily Scrum, Sprint-Review und -Retrospektive sowie das Verfolgen und Optimieren des Sprint-Fortschritts\r\n- Die Anwendung von Scrum für große und verteilte Projekte\r\n- Die unternehmensweite Einführung von Scrum', 'Kunststoff-Einband ', 184, '2017-12-01', 'Deutsch', 'Dpunkt.verlag GmbH', 426, 2, 'https://www.dpunkt.de/common/images/cover_masterid/300/10856.jpg', 'free'),
(6, 'Marketing mit Instagram ', 4, '978-3-95845-531-3 ', 'Auf Instagram ist die Marken- und Kaufaffinität der Nutzer besonders hoch. Beiträge von Unternehmen werden hier regelmäßig mit Likes belohnt und sind Inspiration für den nächsten Kauf. Im heutigen Marketing-Mix spielt Instagram daher eine immer größere Rolle. Und wo sonst hat man die Möglichkeit, bestehende und potentielle Kunden nicht nur persönlich zu jeder Zeit und an jedem Ort, sondern auch emotional zu erreichen?', 'Taschenbuch ', 256, NULL, 'Deutsch', 'MITP Verlags GmbH', 496, 2, 'https://media1.jpc.de/image/w600/front/0/9783958455313.jpg', 'booked'),
(7, 'Prinzessin Insomnia', 5, '978-3-8135-0785-0 ', '\r\n\r\nPrinzessin Dylia, die sich selbst „Prinzessin Insomnia“ nennt, ist die schlafloseste Prinzessin von ganz Zamonien. Eines Nachts erhält sie Besuch von einem alptraumfarbenen Nachtmahr. Havarius Opal, wie sich der ebenso beängstigende wie sympathische Gnom vorstellt, kündigt an, die Prinzessin in den Wahnsinn treiben zu wollen. Vorher nimmt er die Prinzessin aber noch mit auf eine abenteuerliche Reise durch die Welt des Denkens und Träumens, die für beide immer neue und überraschende Wendungen bereit hält, bis sie schließlich zum dunklen Herz der Nacht gelangen. Walter Moers erzählt dieses Märchen aus der zamonischen Spätromantik voller skurriler Charaktere mit der ihm eigenen Komik: spannend und anrührend zugleich.', 'gebundene Ausgabe', 344, '2017-08-30', 'Deutsch', 'Knaus', 794, 3, 'https://www.randomhouse.de/content/edition/covervoila_hires/Moers_WRode_LPrinzessin_Insomnia__179772.jpg', 'free'),
(8, 'Rumo & die Wunder im Dunkeln', 5, '978-3-8135-0795-9', 'Rumo & Die Wunder im Dunkeln ist der dritte Band des Zamonien-Zyklus und der bisher einzige, der direkt und ausschließlich von Walter Moers stammt (also weder von Hildegunst von Mythenmetz noch von Blaubär).\r\n\r\nDie Geschichte dreht sich um Rumo von Zamonien, ein Wolpertinger, der bereits in Die 13 1/2 Leben des Käpt\'n Blaubär eine Nebenrolle spielte, und einer der größten Helden Zamoniens, der seine Heimat und seine große Liebe findet, beides wieder verliert und vor den Bewohnern von Untenwelt retten muss. Es ist bislang der vermutlich blutigste Zamonien-Roman. ', 'gebundene Ausgabe', 704, '2017-08-28', 'Deutsch', 'Knaus', 1317, 8, 'https://vignette.wikia.nocookie.net/zamonien/images/9/9f/RP03H.jpg/revision/latest?cb=20100712065201&path-prefix=de', 'booked'),
(9, 'Backen mit Christina', 6, '978-3-7066-2628-6', '20 Minuten sind genug! Davon ist Christina Bauer überzeugt und zeigt, wie Sie zuhause ganz einfach Brot und Gebäck aus dem Ofen zaubern. Das Geheimnis der Seminarbäuerin aus dem Lungau? Sie hat keines. Und genau darauf kommt es an. Mit wenigen Zutaten, unkompliziert und blitzschnell gelingen bei ihr selbst gemachte Semmel und knuspriges Bauernbrot fürs Frühstück, pikante Schinken-Käse-Stangerl zur Jause und süßer Nussstollen zum Kaffee.', 'gebundene Ausgabe', 704, '2017-08-28', 'Deutsch', 'Edition Loewenzahn', 1320, 4, 'http://www.backenmitchristina.at/wp-content/themes/primo-lite/images/kwer/9783706626286_kl.jpg', 'free'),
(10, ' Süß & gesund\r\nBacken ohne Zucker, Laktose, Eier und Weizen', 7, '978-3-426-67502-1', 'Ganz dem Rhythmus der Natur und den Jahreszeiten folgend, präsentiert die leidenschaftliche Bäckerin köstlich vegane Rezepte für Soul-Cakes und -Cookies, die dem Gaumen und der Seele guttun. Dabei berücksichtigt sie die heilende Wirkung der verwendeten Kräuter und Pflanzen und gibt Back-Empfehlungen zur Steigerung des persönlichen Wohlbefindens.', 'gebundene Ausgabe', 208, '2015-01-10', 'Deutsch', 'Droemer Knaur Verlag', 909, 4, 'https://www.droemer-knaur.de/fm/48/978-3-426-67502-1_Druck.jpg', 'booked'),
(13, 'Asterix bei den Briten', 8, '978-3-7704-3608-8 ', 'Im Jahre 45 nach der ersten Veröffentlichung in Deutschland erfährt Asterix die erste große Überarbeitung! In sorgfältiger Detailarbeit wurden alle 34 Asterix-Alben einheitlich koloriert und die Sprechblasen neu gelettert.', 'gebundene Ausgabe ', 48, '2013-03-14', 'Deutsch', 'Egmont Comic Collection', 359, 5, 'http://www.asterix.com/bd/albs/08de.jpg', 'free'),
(14, 'Wie Obelix als kleines Kind in den Zaubertrank geplumpst ist ', 8, '978-3-7704-3731-3 ', 'Wer schon immer wissen wollte, wie denn Obelix eigentlich in diesen Kessel plumpsen konnte und, ob er und Asterix schon immer dicke Freunde waren, der ist mit diesem \"Comic\" gut beraten ...', 'gebundene Ausgabe ', 32, '2013-11-07', 'Deutsch', 'Egmont Comic Collection', 346, 5, 'https://images-na.ssl-images-amazon.com/images/I/51epBmzvnUL._SX380_BO1,204,203,200_.jpg', 'booked'),
(15, 'Lügen im Netz ', 9, '978-3-7106-0160-6 ', 'Der Betrug ist allgegenwärtig. Mit Falschmeldungen und manipulierten Bildern wird im Internet Stimmung gemacht – und Wähler beeinflusst. Politische Manipulation wird zur realen Gefahr. Gerade Populisten und extreme Bewegungen profitieren von diesen Schattenseiten des Internet. Das Netz, das eigentlich ein Medium der Aufklärung und menschlichen Versta?ndigung sein sollte.', 'gebundene Ausgabe ', 208, '2017-06-26', 'Deutsch', 'Brandstätter Verlag', 467, 6, 'https://www.brandstaetterverlag.com/sites/default/files/styles/book_large/public/book/cover/brodnig-download_1.jpg?itok=IjE5b5vI', 'booked'),
(16, ' Hass im Netz\r\nWas wir gegen Hetze, Mobbing und Lügen tun können.', 9, '978-3-7106-0035-7 ', 'Wir leben in zornigen Zeiten: Hasskommentare, Lügengeschichten und Hetze verdrängen im Netz sachliche Wortmeldungen. Die digitale Debatte hat sich radikalisiert, ein respektvoller Austausch scheint unmöglich. Dabei sollte das Internet doch ein Medium der Aufk­lärung sein: Höchste Zeit, das Netz zurückzuerobern. Das Buch deckt die Mechanismen auf, die es den Trollen im Internet so einfach machen. Es zeigt die Tricks der Fälscher, die gezielt Unwahrheiten verbreiten, sowie die Rhetorik von Hassgruppen, um Diskussionen eskalieren zu lassen.', 'Taschenbuch ', 232, '2016-04-18', 'Deutsch', 'Brandstätter Verlag', 400, 6, 'https://www.brandstaetterverlag.com/sites/default/files/styles/book_large/public/book/cover/hass_im_internet_cover_0.jpg?itok=e2N4nAVj', 'free'),
(17, ' Willkommen in Österreich\r\nWas wir für Flüchtlinge leisten können und wo Österreich versagt hat.', 10, '978-3-7022-3617-5', 'Ferry Maier berichtet über die Hintergründe und Erfahrungen jenes Jahres, als der einstige Raffeisen-Generalanwalt Christian Konrad und er im Auftrag der Bundesregierung die Flüchtlingskoordination im Land übernahmen. Rojin Ali und andere Flüchtlinge, die nach Österreich kamen, erzählen von ihren Erfahrungen des Verlassens und Wiederfindens einer Heimat. Julia Ortner interviewt Experten wie Kilian Kleinschmidt oder Gerry Foitik und spricht mit der ehrenamtlichen Helferin Doraja Eberle oder dem Bürgermeister Dieter Posch über den Einsatz vieler Menschen an der Basis, ohne deren Engagement Österreich die große Flucht nicht so gut bewältigt hätte. Ihr Arbeitsmotto heute: Wir müssen das schaffen!', 'gebundene Ausgabe', 176, '2017-06-01', 'Deutsch', 'Tyrolia Verlagsanstalt', 442, 6, 'http://www.tyroliaverlag.at/cover/9783702236175/700x500xfit.jpg', 'booked'),
(24, 'Ein Buch fÃƒÂ¼r Hanna', 1, '978-3-407-81079-3', 'Hanna ist erst 14, als sie Nazi-Deutschland verlassen muss: Damit beginnt eine Odyssee, die sie zuerst nach DÃƒÂ¤nemark fÃƒÂ¼hrt, von wo sie, zusammen mit einer Gruppe von dÃƒÂ¤nischen Juden, in das KZ Theresienstadt deportiert wird. ', 'gebundene Ausgabe', 348, '2011-04-01', 'Deutsch', 'Beltz', 553, 1, 'https://media.buch.de/img-adb/25922991-00-00.jpg', NULL),
(25, 'Der unsichtbare Mensch', 9, '978-3-7076-0483-2', 'Von hasserfüllten Postings über Facebook bis hin zur Enthüllungsplattform Wikileaks: Die Anonymität ist zu einem zentralen Thema des 21. Jahrhunderts geworden. Wann ist die Geheimhaltung der eigenen Identität berechtigt und notwendig? Und wann wird sie als schützender Mantel missbraucht?\r\nSeit jeher, in absoluten Systemen oder Krisenzeiten, kann Anonymität ', 'Taschenbuch', 176, '2014-02-01', 'Deutsch', 'Czernin Verlag', 260, 2, 'https://media.buch.de/img-adb/37622363-00-00.jpg', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Category`
--

CREATE TABLE `Category` (
  `categoryid` int(11) NOT NULL,
  `categoryname` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `Category`
--

INSERT INTO `Category` (`categoryid`, `categoryname`) VALUES
(1, 'Jugendbücher'),
(2, 'Fachbücher'),
(3, 'Fantasy'),
(4, 'Kochbücher'),
(5, 'Comics'),
(6, 'Sachbücher'),
(7, 'Krimis'),
(8, 'Romane'),
(9, 'Reise'),
(10, 'Zeitschrift'),
(11, 'Sport'),
(12, 'Ratgeber'),
(13, 'Kalender');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `Role` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`userId`, `firstname`, `lastname`, `email`, `userPass`, `Role`) VALUES
(2, 'Thomas', 'Mandorfer', 't.mandorfer@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'user'),
(3, 'Joe', 'Doe', 'doe@gmx.at', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'user'),
(4, 'Max', 'Mustermann', 'mustermann@gmx.at', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'admin');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `Author`
--
ALTER TABLE `Author`
  ADD PRIMARY KEY (`authorid`);

--
-- Indizes für die Tabelle `Book`
--
ALTER TABLE `Book`
  ADD PRIMARY KEY (`bookid`),
  ADD KEY `categoryid` (`categoryid`),
  ADD KEY `authorid` (`authorid`);

--
-- Indizes für die Tabelle `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `Author`
--
ALTER TABLE `Author`
  MODIFY `authorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT für Tabelle `Book`
--
ALTER TABLE `Book`
  MODIFY `bookid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT für Tabelle `Category`
--
ALTER TABLE `Category`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `Book`
--
ALTER TABLE `Book`
  ADD CONSTRAINT `Book_ibfk_1` FOREIGN KEY (`categoryid`) REFERENCES `Category` (`categoryid`),
  ADD CONSTRAINT `Book_ibfk_2` FOREIGN KEY (`authorid`) REFERENCES `Author` (`authorid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
