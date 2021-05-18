-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2021 at 05:06 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `player`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `name` varchar(535) NOT NULL,
  `cover` text NOT NULL,
  `artistid` int(11) NOT NULL,
  `releasedate` date NOT NULL,
  `description` text NOT NULL,
  `typeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `name`, `cover`, `artistid`, `releasedate`, `description`, `typeid`) VALUES
(1, 'Chromatica', 'ladygagachromatica.png', 2, '2020-05-29', 'Chromatica is the sixth studio album by American singer Lady Gaga, released on May 29, 2020, by Interscope Records and subsidiary Streamline. Gaga supervised the production with longtime collaborator BloodPop and a variety of producers to create a concept album drawing on her dance-pop roots. The album contains collaborations with Blackpink, Ariana Grande, and Elton John. Chromatica eschews the acoustic style of its predecessors, Joanne and A Star Is Born, for a sound gleaning 1990s house music. Gaga resurfaced with a cyberpunk-inspired persona for the album.\r\nThe album‘s concept explores the pursuit of healing and unwavering happiness. Through often dark introspection of the subject matter, songs on Chromatica manifest Gaga‘s personal views of themes inspired by failed romance and mental health struggles in her private life. This sensibility contrasts with the upbeat thumping instrumentation, distinguished by dense synthesizers, pulsating percussion, ringing grooves, and orchestral arrangements which merge overarching melodies. Most of the recording took place at Henson Recording Studios and Gaga‘s in-home Hollywood Hills studio.', 1),
(2, 'ARTPOP', 'ladygagaartpop.jpg', 2, '2013-11-06', 'Artpop is the third studio album by American singer Lady Gaga. It was released on November 6, 2013, by Streamline and Interscope Records. Gaga began planning the project in 2011, shortly after the launch of her second effort, Born This Way. Work continued until 2013 while Gaga was traveling for her Born This Way Ball tour and recovering from surgery for an injury she had sustained while touring. Gaga described Artpop as \"a celebration and a poetic musical journey\" and an exploration of the \"reverse Warholian\" phenomenon in pop culture. It displays an intentional \"lack of maturity and responsibility\" by comparison to the darker and anthemic nature of Born This Way. Gaga collaborated with various producers on the record, including DJ White Shadow, Zedd and Madeon. Musically, Artpop is an EDM and synth-pop album, with influences from R&B, techno, industrial, and dubstep, among other genres. The themes of the album revolve around Gaga‘s personal views of fame, sex and self-empowerment; references include Greek and Roman mythology. It also features guest vocals from T.I., Too Short, Twista, and R. Kelly. In 2019, as a reaction to the documentary Surviving R. Kelly, Kelly‘s featured song, \"Do What U Want\", was removed from all streaming and online versions and new vinyl and CD pressings of the album.', 1),
(3, 'WHEN WE ALL FALL ASLEEP, WHERE DO WE GO?', 'billieeilishwhenweallfallasleepwheredowego.jpg', 1, '2019-03-29', 'When We All Fall Asleep, Where Do We Go? (stylized in all caps) is the debut studio album by American singer and songwriter Billie Eilish. It was released on March 29, 2019, by Darkroom and Interscope Records in the US and Polydor Records in the UK. Eilish largely co-wrote the album with her brother Finneas O‘Connell, who produced its music at his small bedroom studio in Highland Park, Los Angeles.\r\n\r\nMusically, When We All Fall Asleep, Where Do We Go? is a pop, electropop, avant-pop, and art pop record, though it also features influences from hip hop and industrial music. Its songs explore themes such as modern youth, drug addiction, heartbreak, suicide, and mental health, with lyrical sensibilities of humor and horror. Eilish said the album was inspired in part by lucid dreaming and night terrors, which are reflected on the cover photo.\r\n\r\nThe album was marketed with the release of seven singles, four of which were multi-platinum-certified in the US – \"You Should See Me in a Crown\", \"When the Party‘s Over\", \"Bury a Friend\" (whose lyric is the source of the album‘s title), and the worldwide hit \"Bad Guy\". Eilish also embarked on several tours in support of the album, including the When We All Fall Asleep Tour and the Where Do We Go? World Tour. An immediate commercial success, the album topped record charts in many countries during its first week of release. By June 2019, it had sold more than 1.3 million copies in the US and become the year‘s best-selling album in Canada, while in the UK it had made Eilish the youngest female solo act to chart at number one.\r\n\r\nWhen We All Fall Asleep, Where Do We Go? was also a widespread critical success and one of the year‘s most acclaimed records, with many reviewers praising its subject matter, songwriting, cohesiveness, and Eilish‘s vocal styling. At the 2020 Grammy Awards, it won Album of the Year, Best Pop Vocal Album, and Best Engineered Album, Non-Classical, while \"Bad Guy\" won Record of the Year and Song of the Year; Finneas also won the award for Producer of the Year, Non-Classical. In 2020, the album was ranked at 397 on Rolling Stone‘s 500 Greatest Albums of All Time list.', 1),
(4, 'Love Goes', 'samsmithlovegoes.jpg', 3, '2020-10-30', 'Love Goes is the upcoming third studio album by English singer Sam Smith. It is scheduled to be released on 30 October 2020 through Capitol Records. The album was originally titled To Die For and was due for release in June 2020 but was delayed due to the COVID-19 pandemic. Smith also felt it was insensitive to use the word \"die\" due to what many people were going through.', 1),
(5, 'Therefore I Am', 'billieeilishthereforeiam.jpg', 1, '2020-11-12', '', 3),
(6, 'Hot Pink', 'dojacathotpink.jpg', 4, '2019-11-07', 'Hot Pink is the second studio album by American singer and rapper Doja Cat. The album was released on November 7, 2019, by Kemosabe and RCA Records. A departure from the sound of her debut album Amala (2018), Hot Pink is a pop and R&B record containing elements of funk and soul. It was written by Doja Cat alongside other songwriters and producers, with production from Yeti Beats and Dr. Luke (under the pseudonym Tyson Trax). Guest vocals are contributed by Smino, Tyga, and Gucci Mane.\r\n\r\nThe album received generally favorable reviews from music critics, who praised Hot Pink for its versatility and incorporation of various music genres. Hot Pink was famed for its longevity and ability to produce singles long after its release, spawning seven singles from a total of 12 tracks between 2019 and 2021. In 2020, \"Say So\" became Doja Cat‘s first number-one single on the Billboard Hot 100 after being remixed by rapper Nicki Minaj. In early 2021, \"Streets\" became a sleeper hit and entered the top 20 of the Hot 100 and the UK Singles Chart, as well as the top ten on the Billboard Global 200.\r\n\r\nIn May 2020, Hot Pink peaked at number nine on the US Billboard 200, becoming Doja Cat‘s first top 10 entry on the chart. It has been certified gold in the United States by the Recording Industry Association of America (RIAA). It also peaked in the top 40 of 12 other countries including the United Kingdom, Australia, Canada, Ireland, New Zealand, Sweden and Norway. It was nominated for Favorite Soul/R&B Album at the 2020 American Music Awards.', 1),
(7, 'Kiss Me More (feat. SZA)', 'dojacatkissmemore.jpg', 4, '2021-04-09', '', 3),
(8, 'Star Shopping', 'lilpeepstarshopping.jpg', 6, '2019-04-18', '', 3),
(9, 'Spotlight', 'lilpeepspotlight.jpg', 6, '2018-02-12', '', 3),
(10, 'EVERYBODY‘S EVERYTHING', 'lilpeepeverybodyseverything.jpg', 6, '2019-11-15', 'Everybody‘s Everything is the first compilation album by American rapper Lil Peep. It was released on November 15, 2019, by Columbia Records, exactly two years after his death. The album was announced on November 1, 2019, which would have been the rapper‘s 23rd birthday. The album was released alongside a documentary of the same name. Several pop-up events to take place in November in New York City and Los Angeles were planned. The album was supported by four singles: \"I‘ve Been Waiting\", \"Moving On\", \"Belgium\", and \"When I Lie\". The latter three songs are from his EP, Goth Angel Sinner, which was released on October 31, 2019.', 1),
(11, 'Nevermind', 'nirvananevermind.jpg', 7, '1991-09-24', 'Nevermind is the second studio album by American rock band Nirvana, released on September 24, 1991 by DGC Records. Produced by Butch Vig, it was Nirvana‘s first release on the DGC label, as well as the first to feature drummer Dave Grohl. Nevermind features a more polished, radio-friendly sound than the band‘s prior work, and is therefore considered a significant departure from their debut album, Bleach. Recording for Nevermind took place at Sound City Studios in Van Nuys, California, and Smart Studios in Madison, Wisconsin in May and June 1991, with mastering being completed in August of that year at The Mastering Lab in Hollywood, California.\r\nAccording to frontman Kurt Cobain, the songs of Nevermind were influenced by bands such as the Pixies, R.E.M., the Smithereens, and the Melvins. He fashioned chord sequences using power chords, combining pop hooks with dissonant guitar riffs. Cobain intended for the album to sound like a fusion of mainstream pop bands such as the Knack and the Bay City Rollers with heavier rock bands such as Black Flag and Black Sabbath.', 1),
(12, 'MONTERO (Call Me By Your Name)', 'lilnasxmontero.jpg', 5, '2021-03-26', '', 3),
(13, 'Follow You / Cutthroat', 'imaginedragonsfollowyoucutthroat.jpg', 8, '2021-03-12', '', 3),
(14, '7 EP', 'lilnasx7ep.jpg', 5, '2021-06-21', '7 is the debut extended play by American rapper and singer Lil Nas X. The EP was released on June 21, 2019, by Columbia Records. It was preceded by the Billboard Hot 100 number one single \"Old Town Road\", \"Panini\", and \"Rodeo\". It features guest appearances from Cyrus, Travis Barker, and Cardi B. 7 received six Grammy Award nominations, including a nomination for Album of the Year despite the album‘s mixed reception from music critics. Clocking in at under 19 minutes, 7 is the shortest release to be nominated for the award in Grammy Award history.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `albumtypes`
--

CREATE TABLE `albumtypes` (
  `id` int(11) NOT NULL,
  `type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `albumtypes`
--

INSERT INTO `albumtypes` (`id`, `type`) VALUES
(1, 'Album'),
(2, 'EP'),
(3, 'Single');

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `name` varchar(535) NOT NULL,
  `picture` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `name`, `picture`, `description`) VALUES
(1, 'Billie Eilish', 'billieeilish.jpg', 'Billie Eilish Pirate Baird O‘Connell is an American singer and songwriter. She first gained attention in 2015 when she uploaded the song \"Ocean Eyes\" to SoundCloud, which was subsequently released by the Interscope Records subsidiary Darkroom. The song was written and produced by her brother Finneas O‘Connell, with whom she collaborates on music and live shows. Her debut EP, Don‘t Smile at Me, became a sleeper hit, reaching the top 15 in the US, UK, Canada, and Australia. Eilish‘s debut studio album, When We All Fall Asleep, Where Do We Go?, debuted atop the US Billboard 200, reached number-one in the UK, and became one of the best-selling albums of 2019. The album‘s fifth single \"Bad Guy\" became her first number-one song on the Billboard Hot 100. In 2020, she performed the theme song \"No Time to Die\" for the James Bond film of the same name, which became her first number-one single in the UK. Her later singles \"Everything I Wanted\", \"My Future\", and \"Therefore I Am\" peaked within the top 10 in the US and UK.'),
(2, 'Lady Gaga', 'ladygaga.jpg', 'Academy Award, Golden Globe and Grammy-winner Lady Gaga is a one-of-a kind artist and performer. She has amassed an outstanding 35 million global album sales, 32 billion streams and 275 million in song consumption, making her one of the best-selling musicians of all time. Gaga is also one of the biggest living forces in social media with over 59 million likes on Facebook, over 80 million followers on Twitter and over 39 million followers on Instagram.'),
(3, 'Sam Smith', 'samsmith.jpg', 'Samuel Frederick Smith is an English singer and songwriter. They rose to prominence in October 2012 after being featured on Disclosure‘s breakthrough single \"Latch\", which peaked at number eleven on the UK Singles Chart. Smith was subsequently featured on Naughty Boy‘s \"La La La\", which became a number one single in May 2013. In December 2013, they were nominated for the 2014 Brit Critics‘ Choice Award and the BBC‘s Sound of 2014 poll, winning both. Smith‘s debut studio album, In the Lonely Hour, was released in May 2014 on Capitol Records UK. The album‘s lead single, \"Lay Me Down\", was released prior to \"La La La\". The album‘s second single, \"Money on My Mind\", became Smith‘s second number one single in the UK. The third single, \"Stay with Me\", was an international success, reaching number one in the UK and number two on the US Billboard Hot 100, while their singles \"I‘m Not the Only One\" and \"Like I Can\" reached the top ten in the UK. The album won four awards, at the 57th Annual Grammy Awards, including Best Pop Vocal Album, Best New Artist, Record of the Year, Song of the Year, and nominations for Album of the Year and Best Pop Solo Performance.'),
(4, 'Doja Cat', 'dojacat.jpg', 'Amala Ratna Zandile Dlamini, known professionally as Doja Cat, is an American singer, rapper, songwriter and record producer. Born and raised in Los Angeles, she began making and releasing music on SoundCloud as a teenager. Her song \"So High\" caught the attention of Kemosabe and RCA Records where she signed a joint record deal at the age of 17, subsequently releasing her debut EP Purrr! in 2014. After a hiatus from music, Doja Cat released her debut studio album, Amala, and later earned viral success as an internet meme with the single \"Mooo!\", which appeared on the deluxe version of her debut album along with singles \"Juicy\" and \"Tia Tamera\" in 2019. Doja Cat‘s second studio album, Hot Pink, reached the top 10 of the US Billboard 200 and spawned the single \"Say So\", which was certified multi-platinum and topped the Billboard Hot 100 chart following the release of a remix featuring Nicki Minaj. In 2020, Doja Cat collaborated with Ariana Grande on their song, \"Motive\", and later featured on the remix of Grande‘s \"34+35\" alongside Megan Thee Stallion, which became her second song to reach the top ten of the Billboard Hot 100.'),
(5, 'Lil Nas X', 'LilNasX.jpg', 'Montero Lamar Hill, known by his stage name Lil Nas X, is an American rapper, singer, songwriter, and media personality. He rose to prominence with the release of his country rap single \"Old Town Road\", which first achieved viral popularity in early 2019 before climbing music charts internationally and becoming diamond certified by November of that same year. \"Old Town Road\" spent 19 weeks atop the US Billboard Hot 100 chart, becoming the longest-running number-one song since the chart debuted in 1958. Several remixes of the song were released, the most popular of which featured country singer Billy Ray Cyrus. Nas X came out as gay while \"Old Town Road\" was atop the Hot 100, becoming the only artist to do so while having a number-one record. Following the success of \"Old Town Road\", Nas X released his debut extended play, titled 7, which spawned two further singles⁠, with \"Panini\" peaking at number five and \"Rodeo\" peaking at number 22 on the Hot 100. His forthcoming debut studio album, Montero, is preceded by the singles \"Holiday\" and the chart-topping \"Montero\".'),
(6, 'Lil Peep', 'lilpeep.jpg', 'Gustav Elijah Åhr, known professionally as Lil Peep, was an American rapper, singer, songwriter and model. The child of Harvard graduates who divorced when he was a teenager, Gustav channeled working class themes into music compositions despite an affluent background. He was a member of the emo rap collective GothBoiClique. Helping pioneer an emo revival style of rap and rock music, Lil Peep has been credited as the leading figure of the mid–late 2010s emo rap scene and came to be an inspiration to outcasts and youth subcultures. Born in Allentown, Pennsylvania, and raised on Long Island, New York, Lil Peep started releasing music on SoundCloud in 2014, using the pseudonym Lil Peep because his mother had called him \"Peep\" since he was a child. He soon became popular on the platform for his collaborations with Lil Tracy and several mixtapes: Lil Peep; Part One, Live Forever, Crybaby and Hellboy; the latter‘s success led him to his first solo tour across the United States. Soon after the tour, Lil Peep emigrated to London, where he recorded his debut studio album.'),
(7, 'Nirvana', 'nirvana.jpg', 'Nirvana was an American rock band that was formed by singer/guitarist Kurt Cobain and bassist Krist Novoselic in Aberdeen, Washington. Nirvana went through a succession of drummers, the longest-lasting being Dave Grohl, who joined the band in 1990. With the lead single \"Smells Like Teen Spirit\" from the group‘s second album Nevermind (1991), Nirvana entered into the mainstream, bringing along with it a subgenre of alternative rock called grunge. Other Seattle grunge bands such as Alice in Chains, Pearl Jam, and Soundgarden also gained popularity, and, as a result, alternative rock became a dominant genre on radio and music television in the United States during the early-to-middle 1990s. As Nirvana‘s frontman, Kurt Cobain found himself referred to in the media as the \"spokesman of a generation\", with Nirvana the \"flagship band\" of \"Generation X\". Cobain was uncomfortable with the attention and placed his focus on the band‘s music, challenging the band‘s audience with its third studio album In Utero (1993). Nirvana‘s brief run ended with Cobain‘s death in April 1994, but the band‘s popularity continued in the years that followed.'),
(8, 'Imagine Dragons', 'imaginedragons.jpg', 'Imagine Dragons is an American pop rock band from Las Vegas, Nevada, consisting of lead singer Dan Reynolds, lead guitarist Wayne Sermon, bassist Ben McKee, and drummer Daniel Platzman. The band first gained exposure with the release of their single \"It‘s Time\", followed by their award-winning debut studio album Night Visions, which resulted in the chart-topping singles \"Radioactive\" and \"Demons\". Rolling Stone named \"Radioactive\", which holds the record for most weeks charted on the Billboard Hot 100, the \"biggest rock hit of the year\". MTV called them \"the year‘s biggest breakout band\", and Billboard named them their \"Breakthrough Band of 2013\" and \"Biggest Band of 2017\". and placed them at the top of their \"Year in Rock\" rankings for 2013, 2017, and 2018. Imagine Dragons topped the Billboard Year-End \"Top Artists – Duo/Group\" category in 2018. The band‘s second studio album Smoke + Mirrors reached number one in the US, Canada and the UK. The album was preceded by the top 40 single \"I Bet My Life\", and second and third singles, \"Gold\" and \"Shots\".');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `name` varchar(535) NOT NULL,
  `number` int(11) NOT NULL,
  `song` text NOT NULL,
  `albumid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `name`, `number`, `song`, `albumid`) VALUES
(1, 'Chromatica I', 1, 'ladygaga-chromatica1.mp3', 1),
(2, 'Alice', 2, 'ladygaga-alice.mp3', 1),
(3, 'Stupid Love', 3, 'ladygaga-stupidlove.mp3', 1),
(4, 'Rain On Me (feat. Ariana Grande)', 4, 'ladygaga-rainonme.mp3', 1),
(5, 'Aura', 1, 'lady_gaga-aura.mp3', 2),
(6, 'Venus', 2, 'lady_gaga-venus.mp3', 2),
(14, 'G.U.Y.', 3, 'lady_gaga-guy.mp3', 2),
(15, 'Sexxx Dreams', 4, 'lady_gaga-sexxx_dreams.mp3', 2),
(16, 'Jewels N‘ Drugs (feat. T.I., Too $hort & Twista)', 5, '1553607039_lady-gaga-jewels-n-drugs-2013-muzonov_net.mp3', 2),
(17, 'MANiCURE', 6, '1553607066_lady-gaga-manicure-2013-muzonov_net.mp3', 2),
(18, 'ARTPOP', 7, 'Lady Gaga - ARTPOP.mp3', 2),
(19, 'Swine', 8, 'lady_gaga-swine.mp3', 2),
(20, 'Donatella', 9, 'lady_gaga-donatella.mp3', 2),
(21, 'Fashion!', 10, 'Lady Gaga — Fashion!.mp3', 2),
(22, 'Mary Jane Holland', 11, 'lady_gaga-mary_jane_holland.mp3', 2),
(23, 'Dope', 12, 'lady_gaga-dope.mp3', 2),
(24, 'Gypsy', 13, '1553607099_lady-gaga-gypsy-2013-muzonov_net.mp3', 2),
(25, 'Applause', 14, 'lady_gaga-applause.mp3', 2),
(26, '!!!!!!!', 1, 'billieeilish!!!!!!!.mp3', 3),
(27, 'bad guy', 2, 'bad guy.mp3', 3),
(28, 'xanny', 3, 'xanny.mp3', 3),
(29, 'you should see me in a crown', 4, 'you should see me in a crown.mp3', 3),
(30, 'all the good girls go to hell', 5, 'all the good girls go to hell.mp3', 3),
(31, 'wish you were gay', 6, 'wish you were gay.mp3', 3),
(32, 'when the party‘s over', 7, 'when the party‘s over.mp3', 3),
(33, '8', 8, '8.mp3', 3),
(34, 'my strange addiction', 9, 'my strange addiction.mp3', 3),
(35, 'bury a friend', 10, 'bury a friend.mp3', 3),
(36, 'ilomilo', 11, 'ilomilo.mp3', 3),
(37, 'listen before i go', 12, 'listen before i go.mp3', 3),
(38, 'i love you', 13, 'i love you.mp3', 3),
(39, 'goodbye', 14, 'goodbye.mp3', 3),
(56, 'Young', 1, 'Young.mp3', 4),
(57, 'Diamonds', 2, 'Diamonds.mp3', 4),
(58, 'Another One', 3, 'Another One.mp3', 4),
(59, 'My Oasis (feat. Burna Boy)', 4, 'My Oasis.mp3', 4),
(60, 'So Serious', 5, 'So Serious.mp3', 4),
(61, 'Dance: ‘Til You Love Someone Else', 6, 'Dance (Til You Love Someone Else).mp3', 4),
(62, 'For The Lover That I Lost', 7, 'For The Lover That I Lost.mp3', 4),
(63, 'Breaking Hearts', 8, 'Breaking Hearts.mp3', 4),
(64, 'Forgive Myself', 9, 'Forgive Myself.mp3', 4),
(65, 'Love Goes', 10, 'Love Goes.mp3', 4),
(66, 'Kids Again', 11, 'Kids Again.mp3', 4),
(67, 'Dancing With A Stranger feat. Normani (Bonus Track)', 12, 'Dancing With A Stranger (with Normani).mp3', 4),
(68, 'How Do You Sleep? (Bonus Track)', 13, 'How Do You Sleep (Bonus Track).mp3', 4),
(69, 'To Die For (Bonus Track)', 14, 'To Die For (Bonus Track).mp3', 4),
(70, 'I‘m Ready (feat. Demi Lovato)', 15, 'Im Ready.mp3', 4),
(71, 'Fire On Fire', 16, 'Fire On Fire (Bonus Track).mp3', 4),
(72, 'Therefore I Am', 1, 'Therefore I Am.mp3', 5),
(73, 'Cyber Sex', 1, 'Cyber Sex.mp3', 6),
(74, 'Won‘t Bite (feat. Smino)', 2, 'Won‘t Bite.mp3', 6),
(75, 'Rules', 3, 'Rules.mp3', 6),
(76, 'Bottom Bitch', 4, 'Bottom Bitch.mp3', 6),
(77, 'Say So', 5, 'Say So.mp3', 6),
(78, 'Like That (feat. Gucci Mane)', 6, 'Like That.mp3', 6),
(79, 'Talk Dirty', 7, 'Talk Dirty.mp3', 6),
(80, 'Addiction', 8, 'Addiction.mp3', 6),
(81, 'Streets', 9, 'Streets.mp3', 6),
(82, 'Shine', 10, 'Shine.mp3', 6),
(83, 'Better Than Me', 11, 'Better Than Me.mp3', 6),
(84, 'Juicy', 12, 'Juicy.mp3', 6),
(85, 'Kiss Me More (feat. SZA)', 1, 'Kiss Me More.mp3', 7),
(86, 'Free Woman', 5, 'Free Woman.mp3', 1),
(87, 'Fun Tonight', 6, 'Fun Tonight.mp3', 1),
(88, 'Chromatica II', 7, 'Chromatica II.mp3', 1),
(89, '911', 8, '911.mp3', 1),
(90, 'Plastic Doll', 9, 'Plastic Doll.mp3', 1),
(91, 'Sour Candy (feat. BLACKPINK)', 10, 'Sour Candy.mp3', 1),
(92, 'Enigma', 11, 'Enigma.mp3', 1),
(93, 'Replay', 12, 'Replay.mp3', 1),
(94, 'Chromatica III', 13, 'Chromatica III.mp3', 1),
(95, 'Sine From Above (feat. Elton John)', 14, 'Sine From Above.mp3', 1),
(96, '1000 Doves', 15, '1000 Doves.mp3', 1),
(97, 'Babylon', 16, 'Babylon.mp3', 1),
(98, 'Star Shopping', 1, 'Star Shopping.mp3', 8),
(99, 'MONTERO (Call Me By Your Name)', 1, 'MONTERO (Call Me By Your Name).mp3', 12),
(119, 'Liar', 1, 'Liar.mp3', 10),
(120, 'AQUAFINA (feat. Rich The Kid)', 2, 'AQUAFINA.mp3', 10),
(121, 'RATCHETS', 3, 'RATCHETS.mp3', 10),
(122, 'Fangirl (feat. Gab3)', 4, 'Fangirl.mp3', 10),
(123, 'LA to London (feat. Gab3)', 5, 'LA to London.mp3', 10),
(124, 'Rockstarz (feat. Gab3)', 6, 'Rockstarz.mp3', 10),
(125, 'Text Me (feat. Era)', 7, 'Text Me.mp3', 10),
(126, 'PRINCESS', 8, 'PRINCESS.mp3', 10),
(127, 'Moving On', 9, 'Moving On.mp3', 10),
(128, 'Belgium', 10, 'Belgium.mp3', 10),
(129, 'When I Lie', 11, 'When I Lie.mp3', 10),
(130, 'I‘ve Been Waiting (feat. ILOVEMAKONNEN)', 12, 'Ive Been Waiting (Original Version).mp3', 10),
(131, 'Live Forever', 13, 'Live Forever.mp3', 10),
(132, 'ghost boy', 14, 'ghost boy.mp3', 10),
(133, 'Keep My Coo', 15, 'Keep My Coo.mp3', 10),
(134, 'white tee', 16, 'white tee.mp3', 10),
(135, 'cobain', 17, 'cobain.mp3', 10),
(136, 'witchblades', 18, 'witchblades.mp3', 10),
(137, 'walk away as the door slams (acoustic)', 19, 'walk away as the door slams (acoustic).mp3', 10),
(164, 'Smells Like Teen Spirit', 1, 'Smells Like Teen Spirit.mp3', 11),
(165, 'In Bloom (Nevermind Version)', 2, 'nirvana-in-bloom.mp3', 11),
(166, 'Come As You Are', 3, 'Come As You Are.mp3', 11),
(167, 'Breed', 4, 'Breed.mp3', 11),
(168, 'Lithium', 5, 'Lithium.mp3', 11),
(169, 'Polly', 6, 'Polly.mp3', 11),
(170, 'Territorial Pissings', 7, 'Territorial Pissings.mp3', 11),
(171, 'Drain You', 8, 'Drain You.mp3', 11),
(172, 'Lounge Act', 9, 'Lounge Act.mp3', 11),
(173, 'Stay Away', 10, 'Stay Away.mp3', 11),
(174, 'On A Plain', 11, 'On A Plain.mp3', 11),
(175, 'Something In The Way', 12, 'Something In The Way.mp3', 11),
(176, 'Endless, Nameless', 13, 'Endless, Nameless.mp3', 11),
(177, 'Old Town Road (Remix) (feat. Billy Ray Cyrus)', 1, 'Old Town Road (Remix).mp3', 14),
(178, 'Panini', 2, 'Panini.mp3', 14),
(179, 'F9mily (You & Me)', 3, 'F9mily (You & Me).mp3', 14),
(180, 'Kick It', 4, 'Kick It.mp3', 14),
(181, 'Rodeo', 5, 'Rodeo.mp3', 14),
(182, 'Bring U Down', 6, 'Bring U Down.mp3', 14),
(183, 'C7osure (You Like)', 7, 'C7osure (You Like).mp3', 14),
(184, 'Old Town Road', 8, 'Old Town Road.mp3', 14),
(185, 'Spotlight', 1, 'Spotlight.mp3', 9),
(186, 'Follow You', 1, 'Follow You.mp3', 13),
(187, 'Cutthroat', 2, 'Cutthroat.mp3', 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artistid` (`artistid`),
  ADD KEY `typeid` (`typeid`);

--
-- Indexes for table `albumtypes`
--
ALTER TABLE `albumtypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `albumid` (`albumid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `albumtypes`
--
ALTER TABLE `albumtypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_ibfk_1` FOREIGN KEY (`typeid`) REFERENCES `albumtypes` (`id`),
  ADD CONSTRAINT `albums_ibfk_2` FOREIGN KEY (`artistid`) REFERENCES `artists` (`id`);

--
-- Constraints for table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`albumid`) REFERENCES `albums` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
