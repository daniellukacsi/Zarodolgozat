-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Ápr 21. 12:05
-- Kiszolgáló verziója: 10.4.14-MariaDB
-- PHP verzió: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `kandomozi`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `eloadasok`
--

CREATE TABLE `eloadasok` (
  `EId` int(11) NOT NULL,
  `FId` int(11) NOT NULL,
  `EDatum` date NOT NULL,
  `Eido1` time DEFAULT NULL,
  `Eido2` time DEFAULT NULL,
  `Eido3` time DEFAULT NULL,
  `Eido4` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `eloadasok`
--

INSERT INTO `eloadasok` (`EId`, `FId`, `EDatum`, `Eido1`, `Eido2`, `Eido3`, `Eido4`) VALUES
(66, 1, '2021-03-17', '12:00:00', '14:00:00', '17:30:00', '18:00:00'),
(67, 2, '2021-03-17', '11:15:00', '14:00:00', '17:30:00', '18:00:00'),
(69, 4, '2021-03-17', '15:00:00', '15:45:00', '17:00:00', '17:15:00'),
(70, 5, '2021-03-17', '11:00:00', '16:40:00', '16:50:00', '18:30:00'),
(71, 6, '2021-03-17', '12:00:00', '12:50:00', '15:00:00', '18:10:00'),
(72, 1, '2021-03-18', '11:00:00', '14:00:00', '16:00:00', '18:00:00'),
(73, 2, '2021-03-18', '10:00:00', '11:45:00', '17:20:00', '19:20:00'),
(74, 3, '2021-03-18', '15:00:00', '16:30:00', '16:45:00', '18:30:00'),
(75, 4, '2021-03-18', '12:45:00', '16:00:00', '17:40:00', '19:50:00'),
(76, 5, '2021-03-18', '12:00:00', '14:00:00', '16:00:00', '18:00:00'),
(77, 6, '2021-03-18', '11:30:00', '14:00:00', '16:50:00', '19:10:00'),
(79, 1, '2021-03-19', '11:00:00', '13:30:00', '15:30:00', '17:30:00'),
(80, 2, '2021-03-19', '12:00:00', '16:20:00', '17:20:00', '19:50:00'),
(81, 3, '2021-03-19', '10:20:00', '14:00:00', '17:00:00', '19:10:00'),
(82, 4, '2021-03-19', '10:00:00', '11:45:00', '17:40:00', '19:20:00'),
(83, 5, '2021-03-19', '11:50:00', '15:50:00', '17:50:00', '20:00:00'),
(84, 6, '2021-03-19', '12:00:00', '16:40:00', '17:20:00', '19:10:00');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `filmek`
--

CREATE TABLE `filmek` (
  `fId` int(11) NOT NULL,
  `fCim` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `fImg` varchar(150) COLLATE utf8_hungarian_ci NOT NULL,
  `fMufaj` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `fHossz` int(11) NOT NULL,
  `fDatum` date NOT NULL,
  `fRendezok` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `fSzereplok` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `fTartalom` varchar(1000) COLLATE utf8_hungarian_ci NOT NULL,
  `fLink` varchar(100) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `filmek`
--

INSERT INTO `filmek` (`fId`, `fCim`, `fImg`, `fMufaj`, `fHossz`, `fDatum`, `fRendezok`, `fSzereplok`, `fTartalom`, `fLink`) VALUES
(1, 'Bosszúállók', 'boss.jpg', 'amerikai fantasztikus akciófilm, kalandfilm', 182, '2019-04-25', 'Anthony Russo Joe Russo', 'Robert Downey Jr., Chadwick Boseman, Ameenah Kapla', 'Thanos súlyos tette, amivel elpusztította az univerzum élőlényeinek felét és megtörte a Bosszúállókat, a megmaradt hősöket egy végső összecsapásra készteti a Marvel Studios huszonegy filmet megkoronázó, nagyszabású fináléjában, a Bosszúállók: Végjátékban.', 'https://www.youtube.com/embed/MB5xQwL-qQs'),
(2, 'Nap nap után', 'nap.jpg', 'amerikai romantikus film', 90, '2018-02-22', 'Michael Sucsy', 'Angourie Rice, Justice Smith,stb', 'A 16 éves Rhiannon beleszeret egy különös lélekbe, akit csak A-nak hívnak, és minden egyes nap más ágyban, más-más testben ébred. A kettejük között kialakuló kapcsolat olyan erős, hogy elhatározzák, minden nap megkeresik egymást, pedig még csak nem is sejtik, mit és kit hoz a következő reggel. Ahogy egyre inkább beleszeretnek egymásba, a realitásokkal is kénytelenek szembenézni: vajon képesek lehetnek úgy leélni közös életüket, hogy egyikük minden 24 órában más személyt testesít meg?', 'https://www.youtube.com/embed/KxB4dLM5JIc'),
(3, 'Sonic a sündisznó', 'sonic.jpg', 'akció,kaland,vígjáték', 90, '2019-02-14', 'Jeff Fowler', 'Jim Carrey,James Marsden,Tika Sumpter', 'Sonic, a sündisznó véletlenül hihetetlen erő birtokosa lesz, amit ő maga sem ért teljesen. Saját védelme érdekében a Földön rejtőzik el, és egyetlen szabályt kell betartania: nem szabad, hogy a világ tudomást szerezzen a létezéséről. Ám ez nem könnyű feladat egy 15 évesnek, főleg ha az a 15 éves Sonic képességeivel és habitusával van megáldva. Így aztán nem kell hozzá sok, hogy felfedezze őt Tom, a szarkasztikus, ám áldott jószívű kisvárosi zsaru. Ők ketten összeállnak, és hihetetlenül akciódús kalandokba keverednek, miközben átszelik a fél világot úgy, hogy üldözik őket a mániákus Dr. Robotnyik és robotszerkentyűi…', 'https://www.youtube.com/embed/2G6BHIl8fqI'),
(4, 'A láthatatlan ember', 'inviman.jpg', 'Thriller', 125, '2020-02-27', 'Leigh Whannell', 'Elisabeth Moss, Aldis Hodge, Storm Reid', 'Amit nem látsz, az nem árthat neked.\r\nAz Emmy-díjas Elisabeth Moss (Mi, A szolgálólány meséje) a főszereplője ennek a félelmetes modern mesének, melyet a Universal klasszikus szörnykaraktere ihletett.\r\nCecilia Kass egy erőszakos kapcsolat csapdájában vergődik egy gazdag és briliáns tudóssal, de egyszer csak úgy dönt, hogy megszökik éjnek évadján, és elrejtőzik. Tervében segítségére van a nővére, egy gyerekkori barát és annak tinédzser lánya.\r\nÁm amikor Cecilia erőszakos exe öngyilkosságot követ el, és hatalmas vagyonának egy jelentős részét feleségére hagyja, Cecilia arra gyanakszik, hogy élettársa halála csak színjáték volt. Amikor a hátborzongató események sora halálos fordulatot vesz, és szerettei életét veszélyezteti, Cecilia elméje kezd megbomlani, miközben kétségbeesetten próbálja bizonyítani, hogy kísérti őt valaki, akit senki sem lát...', 'https://www.youtube.com/embed/nIXGdIB1FLY'),
(5, 'Scooby!', 'scobby.jpg', 'Animáció, Akció, Kaland', 94, '2020-07-28', 'Tony Cervone', 'Kiersey Clemons,Zac Efron, Will Forte', 'Szerencsére mindig vannak, akik szívesen megmentik a világot. Amikor a Rejtély Rt. tagjai hírét veszik, hogy egy távoli, titkos szigeten valaki világuralomra készülődve kísértettenyésztésbe kezd, habozás nélkül akcióba lendülnek. Pedig ránézésre nem tűnnek túl félelmetesnek: négy fura kamasz, két fiú és két lány egy ócska autóban, kíséretükben egy beszélő dán doggal. Jó az, ha rájuk van bízva a világ jövője? Jobb már nem is lehetne! Cégük ugyanis szörny- és rémelhárításra, kísértetkergetésre és démonhatástalanításra szakosodott. Mindent tudnak erről az iparról, és rajtaveszt, aki alábecsüli őket. Mától van mitől félni a kísérteteknek!', 'https://www.youtube.com/embed/Wvn9w4jzbIo'),
(6, 'Álomépítők', 'dream.jpg', 'Animáció, Gyerek', 107, '2020-04-04', 'Kim Hagen Jensen', 'Chris Pratt, Will Ferrell, Elizabeth Banks', 'Minna élete a feje tetejére áll, amikor édasapja új menyasszonya és annak lánya beköltözik hozzájuk. A vele egykorú Jenny kiállhatatlan és Minna minden erőfeszítése ellenére sem tud közelebb kerülni utálatos mostohatestvéréhez. Egy éjszaka aztán a kislány felfedez egy varázslatos világot, ahol hatalmas színpadokon készülnek az álmaink, szorgos kis álommunkások segítségével. Mikor rájön, hogyan tudja befolyásolni az embereket az álomépítők segítségével, igyekszik Jenny álmaiba is beférkőzni, hogy végre igazi család lehessen belőlük.', 'https://www.youtube.com/embed/n04LFW0H_Wo');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `foglalas`
--

CREATE TABLE `foglalas` (
  `fogId` int(11) NOT NULL,
  `fogCim` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `fogDate` date NOT NULL,
  `fogTime` time(6) NOT NULL,
  `fogVnev` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `fogKnev` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `fogEmail` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `fogTelefon` varchar(12) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `visszajelzes`
--

CREATE TABLE `visszajelzes` (
  `uId` int(12) NOT NULL,
  `Vnev` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `Knev` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `Szov` varchar(500) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `visszajelzes`
--

INSERT INTO `visszajelzes` (`uId`, `Vnev`, `Knev`, `Email`, `Szov`) VALUES
(4, 'Dósa', 'Fanni', 'dosa.f@freemail.hu', 'Próba üzenet!!!'),
(5, 'Kecske', 'László', 'kecsk.laszl@gmail.com', 'Minden szuper!'),
(6, 'Bakos', 'Bernadett', 'bak.ber@citromail.hu', 'Ez egy kicsit hosszabb próba üzenet! egy kettő 3 négy 5 6atat hét nyolc 9enc tiz10!!');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `eloadasok`
--
ALTER TABLE `eloadasok`
  ADD PRIMARY KEY (`EId`),
  ADD KEY `FId` (`FId`),
  ADD KEY `EDatum` (`EDatum`),
  ADD KEY `EDatum_2` (`EDatum`);

--
-- A tábla indexei `filmek`
--
ALTER TABLE `filmek`
  ADD PRIMARY KEY (`fId`);

--
-- A tábla indexei `foglalas`
--
ALTER TABLE `foglalas`
  ADD PRIMARY KEY (`fogId`);

--
-- A tábla indexei `visszajelzes`
--
ALTER TABLE `visszajelzes`
  ADD PRIMARY KEY (`uId`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `eloadasok`
--
ALTER TABLE `eloadasok`
  MODIFY `EId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT a táblához `filmek`
--
ALTER TABLE `filmek`
  MODIFY `fId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT a táblához `foglalas`
--
ALTER TABLE `foglalas`
  MODIFY `fogId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT a táblához `visszajelzes`
--
ALTER TABLE `visszajelzes`
  MODIFY `uId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `eloadasok`
--
ALTER TABLE `eloadasok`
  ADD CONSTRAINT `eloadasok_ibfk_1` FOREIGN KEY (`FId`) REFERENCES `filmek` (`fId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
