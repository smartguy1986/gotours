-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2022 at 10:50 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mylaravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `blog_category` varchar(255) NOT NULL,
  `blog_banner` varchar(255) NOT NULL,
  `blog_image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` int(11) NOT NULL,
  `tags` longtext NOT NULL,
  `short_desc` longtext NOT NULL,
  `blog_content` longtext NOT NULL,
  `status` enum('0','1','2','3','4') NOT NULL COMMENT '0 = Draft\r\n1 = Pending Approval\r\n2 = Published\r\n3 = Rejected\r\n4 = Removed',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `blog_category`, `blog_banner`, `blog_image`, `title`, `author`, `tags`, `short_desc`, `blog_content`, `status`, `created_at`, `updated_at`, `views`) VALUES
(1, 'Adventure', '1651688131xpnzk2.jpg', '1651688131nmsd01.jpg', 'Everest Base Camp on My Mind', 1, '[\"Everest\",\"Himalaya\",\"Trekking\",\"Base Camp\",\"Adventure\"]', 'It has been almost 10 years! I gifted Everest Base Camp Trek to myself on my 40th birthday. And 10 years have gone by in a flash. I am staring at my 50th birthday, somewhat dazed! We have never been big on birthdays but spending the 40th on the trek was special. I have been reminiscing about it these days.', '<p>It has been almost 10 years! I gifted Everest Base Camp Trek to myself on my 40th birthday. And 10 years have gone by in a flash. I am staring at my 50th birthday, somewhat dazed! We have never been big on birthdays but spending the 40th on the trek was special. I have been reminiscing about it these days.</p>\r\n\r\n<p><img alt=\"\" src=\"http://traveltalesfromindia.in/wp-content/uploads/2022/04/dingboche.jpg\" style=\"height:682px; width:1024px\" /></p>\r\n\r\n<p>Dingboche, Everest Base Camp, Nepal</p>\r\n\r\n<p>While I was miserable and tired throughout the trek, but the memories are there for a lifetime. I only remember the good things, the beauty and the thrill. I was working full time when I went to EBC, my commute was long and my fitness low. But I am glad I went.</p>\r\n\r\n<p><img alt=\"\" src=\"http://traveltalesfromindia.in/wp-content/uploads/2022/04/tengboche-nepal.jpg\" style=\"height:632px; width:1024px\" /></p>\r\n\r\n<p>Tengboche, Nepal</p>\r\n\r\n<p>The good thing about traveling on birthdays is you can clearly remember what you did even after years. I was in South Africa on my birthday in 2013, in Barcelona in 2017 and Koh Samui in 2018. Other ones I have no clue what I did.</p>\r\n\r\n<p><img alt=\"\" src=\"http://traveltalesfromindia.in/wp-content/uploads/2022/04/tengboche.jpg\" style=\"height:682px; width:1024px\" /></p>\r\n\r\n<p>The Magnificent Views</p>\r\n\r\n<p>I trekked with <a href=\"https://abovethehimalaya.com/everest-trek-7-days.html\" target=\"_blank\">Above the Himalayas</a> and it was because of them I was able to complete this hike! Deepak was my trekking guide and he is a gem. He understood my pace, fatigue and nature perfectly. He got me going even though I doubted myself every day!</p>\r\n\r\n<p><img alt=\"\" src=\"http://traveltalesfromindia.in/wp-content/uploads/2022/04/monastery-tengboche.jpg\" style=\"height:563px; width:1002px\" /></p>\r\n\r\n<p>The Monastery at Tengboche</p>\r\n\r\n<p>I survived the trek by taking one day at a time. I knew about the climb to Namche. But no one wrote about trek to Tengboche being an equally tough! It totally killed me. But I somehow managed to walk for just one more day, every day!</p>\r\n\r\n<p><img alt=\"\" src=\"http://traveltalesfromindia.in/wp-content/uploads/2022/04/dingboche-nepal.jpg\" style=\"height:682px; width:1024px\" /></p>\r\n\r\n<p>Dingboche, Nepal</p>\r\n\r\n<p>The best part of the trek are the lodges where we stay. They have washrooms and they save you from freezing in a tent. But best are communal kitchens. Not only they provide sustenance, they were also the source of great conversations. The climbers who attempt the summit and walk back also stay at the same lodges. That makes for great stories.</p>\r\n\r\n<p><img alt=\"\" src=\"http://traveltalesfromindia.in/wp-content/uploads/2022/04/lobuje.jpg\" style=\"height:682px; width:1024px\" /></p>\r\n\r\n<p>Lobuje, Nepal</p>\r\n\r\n<p>It was when I reached Lobuje that I started to feel hopeful. It was the first time I thought, to go back without reaching the Everest Base Camp would be a pity. I had come a long way from Lukla.</p>\r\n\r\n<p><img alt=\"\" src=\"http://traveltalesfromindia.in/wp-content/uploads/2022/04/gorekshep.jpg\" style=\"height:682px; width:1024px\" /></p>\r\n\r\n<p>Gorekshep, Nepal</p>\r\n\r\n<p>While I was trekking, I kept thinking why do I pay good money to get tortured? It was that difficult for me. However, after a few days of rest my opinion completely changed. Even today, after visiting 32 countries I consider this to be the trip of my lifetime!</p>\r\n\r\n<p><img alt=\"\" src=\"http://traveltalesfromindia.in/wp-content/uploads/2022/04/rverest-base-camp.jpg\" style=\"height:682px; width:1024px\" /></p>\r\n\r\n<p>Everest Base Camp, Nepal</p>\r\n\r\n<p>To a traveler like me, it should be obvious that birthdays are meant for traveling. Corona also added a different dimension to life, it taught me not to take anything for granted</p>', '2', '2022-05-04 12:45:31', '2022-05-04 19:46:42', 0),
(2, 'Travel', '1651690933jab3o5.jpg', '16516909337xhlr4.jpg', 'Travel in Time of Covid19', 1, '[\"Covid\",\"Travel\",\"India\"]', 'As I start typing away, my mind wanders, was ‘Travel or lack of it in time of Covid19’ a better title? But then I go ahead and keep typing. I hardly write anything these days, I hardly travel too!', '<p>As I start typing away, my mind wanders, was &lsquo;Travel or lack of it in time of Covid19&rsquo; a better title? But then I go ahead and keep typing. I hardly write anything these days, I hardly travel too!</p>\r\n\r\n<p>Growing up in a small town, Gorakhpur, UP in the 1970s and the 80s travel was not on my horizon. My father worked for the Indian Railways but we didn&rsquo;t travel much. In those days eating out was not common, there was no five star hotel in my town and I hardly knew any friend who ever took a flight! Gorakhpur is an Airforce base so I saw a lot of fighter planes flying overhead and that was all.</p>\r\n\r\n<p>Or the stories my father brought back home, he did take a few flights, visited five star hotels and other countries but all for work. My eyes would widen listening to those tales, of the grand lobbies, the interiors of a plane, the expensive food in fancy hotels and lands far away.</p>\r\n\r\n<p>Growing up I never dreamed of travel. I never thought I would enter a plane or visit a fancy hotel. But life had other plans and a lot of it happened because of this blog. Though I went abroad initially for academic conferences and work but it was blogging that changed my world!</p>\r\n\r\n<p>I started blogging in 2005 with zero expectations. And slowly things changed. I started getting invited to places, a fancy restaurant, a five star hotel, and eventually on foreign trips! A trip to South Africa happened in May 2013 and I was like beyond amazed. I had already been to Malaysia, Thailand and Cambodia as a blogger before that!</p>\r\n\r\n<p>Then there were years when I did 6-7 trips abroad. Flying, staying in fancy places became the norm for me, particularly on all my blogging trips.</p>\r\n\r\n<p>I will be honest, when I first started going to those places I was in awe, I also had this feeling that I didn&rsquo;t belong. After all I was this small town 70s child, for whom travel was not even a dream! But after some time, I got used to them, in a good way. I also realized that being a decent human being was enough to belong, almost everywhere.</p>\r\n\r\n<p>I became so confident that I took my daughter and niece abroad on a vacation for the first time when they were 7 and 9 and it was just the three of us!</p>\r\n\r\n<p>So, I had no inkling that Vietnam (blogging trip in 2019) was going to be my last new country till date! If someone would have said it to me then, I would give them a rotten stare and go on clicking those million pictures I take!</p>\r\n\r\n<p>My previous passport had to be renewed three years before its expiry date because I simply ran out of pages! This woman from Gorakhpur was going places and it was never even on her agenda explicitly! I was dragging my sister Alka out on some vacations too. Little did I know that my Sri Lanka trip (January 2020) would be my last international trip for so many years. I visited Sri Lanka first in 2014 so it was not a new destination for me.</p>\r\n\r\n<p>The year 2021 was marginally better, I did two domestic trips, one to <a href=\"http://traveltalesfromindia.in/sariska-manor-a-beautiful-safari-lodge/\" target=\"_blank\">Sariska</a> and the other to <a href=\"http://traveltalesfromindia.in/fall-colors-in-ladakh/\" target=\"_blank\">Ladakh</a>. I have low expectations from 2022. Come mid January and my whole family went down with Covid, the Omicron version, which I have to say was not the horror that Delta must have been. We all have recovered and back on our feet for which we are truly thankful.</p>\r\n\r\n<p>But whenever travel opens up next, and it feels like a safe bet, I am waiting for it. For I didn&rsquo;t know when, but travel became the dream of my life!</p>', '2', '2022-05-04 13:32:13', '2022-05-04 19:46:46', 0),
(3, 'Food', '1651693015jwe7gc.jpg', '1651693015kezb1y.jpg', 'My Relationship with Food- It is Complicated!', 1, '[\"Food\",\"Travel\",\"India\"]', 'This is going to be a complicated post, I have been staring at this screen, while a thousand thoughts come rushing to my head. I almost want to give up and go. Instead I just go away to random webpages to scroll about random things but I keep coming back to this window. Finally I start typing once I acknowledge the complexity of the subject- my relationship with food, and it is complicated', '<p>This is going to be a complicated post, I have been staring at this screen, while a thousand thoughts come rushing to my head. I almost want to give up and go. Instead I just go away to random webpages to scroll about random things but I keep coming back to this window. Finally I start typing once I acknowledge the complexity of the subject- my relationship with food, and it is complicated</p>\r\n\r\n<p>Many people my age are nostalgic about home food, particularly from their childhood. But like Phil of <a href=\"https://www.netflix.com/title/80146601\" target=\"_blank\">Somebody Feed Phil</a> I would say &lsquo;not my home.&rsquo; Growing up in a small town I was really lucky. We lived in a house surrounded by trees and land. So we ate a lot of thigs fresh from out <em>&lsquo;khet</em>,&rsquo; even though I never heard &lsquo;Farm to table&rsquo; back then! However, I was not a foodie, not even close to it.</p>\r\n\r\n<p>After school I went to hostels, first to do my bachelors and masters degree and then to a separate place to do my Ph.D. It is safe to say it was here that I lost it. The food at the first place was bad. The food at the second place was even worse. Eating mess food for about ten years literally killed all my taste buds. These places had potatoes and bread on their menu every day, three times a day or something <a href=\"http://iitkdays.blogspot.com/2006/03/mess-food-saga.html\" target=\"_blank\">even worse</a>. For a very long time after graduating I couldn&rsquo;t stand either of them! My relationship with food was at the rock bottom. Throughout this period I had one salvation, I love sweets, the Indian mithai kind, but I can eat everything else too that goes by the name of dessert.</p>\r\n\r\n<p><img alt=\"Indian Breakfast\" src=\"http://traveltalesfromindia.in/wp-content/uploads/2019/03/puri-bhaji-jalebi-breakfast-1024x724.jpg\" style=\"height:724px; width:1024px\" /></p>\r\n\r\n<p>Indian Breakfast</p>\r\n\r\n<p>Then I started traveling and I should have explored food too. But it didn&rsquo;t happen. For a long time my brain would not process food! I didn&rsquo;t cook much myself. Even when I visited places like <a href=\"http://traveltalesfromindia.in/food-suryagarh-jaisalmer/\" target=\"_blank\">Suryagarh</a> that take food to the next level, I was lukewarm to it. I was trying but I would just not get excited about food.</p>\r\n\r\n<p>Then came 2020 followed by 2021 and now 2022, travel vanished, and the world became a stressful place in every sense of the word. I did manage to travel bit here and there but it was not the same.</p>\r\n\r\n<p>So, as I had a lot of time, I started watching food documentaries on Netflix. The first one that caught my attention was <a href=\"https://www.netflix.com/title/81249660\" target=\"_blank\">Street Food Latin America</a>, followed by Street Food Asia. I watched the first one in Spanish and it was beautiful. And then I got hooked. I watched Heavenly Bites, Restaurants on the Edge and finally something shifted. Currently I am at the Season 3 of Somebody Feed Phil. Finally my relationship with food started improving.</p>\r\n\r\n<p>I am now waiting for the world to get &lsquo;normal&rsquo; and I sincerely hope we are inching towards it. This time when I travel I am going to enjoy food. A tiny voice in my head tells me my choices as a vegetarian are limited in many places but I am not going to listen to it.</p>\r\n\r\n<p>I think I have made peace with food. My taste buds are reviving, all I need now is to travel again!</p>', '1', '2022-05-04 14:06:55', '2022-05-04 19:41:10', 0),
(4, 'Travel', '1651693245iexytv.jpg', '1651693245k6glab.jpg', 'The Grand Dragon Ladakh', 1, '[\"Ladakh\",\"India\",\"Accomodation\"]', 'This was my second stay at the Grand Dragon Ladakh. The first time I stayed there, it was of January 2016. Both the times I have stayed as a blogger, my stay was complimentary. The January 2016 was a group trip whereas in October 2021 I was staying alone and doing my own things!', '<p>This was my second stay at <a href=\"http://traveltalesfromindia.in/2016/01/stay-grand-dragon-ladakh-winter/\" target=\"_blank\">the Grand Dragon</a> Ladakh. The first time I stayed there, it was of January 2016. Both the times I have stayed as a blogger, my stay was complimentary. The January 2016 was a group trip whereas in October 2021 I was staying alone and doing my own things!</p>\r\n\r\n<p><img alt=\"\" src=\"http://traveltalesfromindia.in/wp-content/uploads/2021/10/garden-grand-dragon-ladakh.jpg\" style=\"height:768px; width:1024px\" /></p>\r\n\r\n<p>The Beautiful Grand Dragon Ladakh</p>\r\n\r\n<p>There are two ways in which I can start the story. In September 2021 I called my friend Meenaskhi and asked for a recommendation for a homestay in Ladakh. She convinced me to stay at the Grand Dragon instead. Not that it needed much convincing. I stayed there before, I knew how good it is.</p>\r\n\r\n<p><img alt=\"\" src=\"http://traveltalesfromindia.in/wp-content/uploads/2021/10/room-grand-dragon-ladakh.jpg\" style=\"height:768px; width:1024px\" /></p>\r\n\r\n<p>My Room at the Grand Dragon</p>\r\n\r\n<p>Then on the third day of my trip I was roaming around the Leh Palace at my leisurely pace. I met a girl who was seriously making content, so we started chatting. After a few minutes we connected on Instagram. After looking at my feed for a few seconds, she asked, &ldquo;So you are staying at <em>the</em> Grand Dragon?&rdquo; I was once again reminded to be thankful for the wonderful blogging opportunities I get!</p>\r\n\r\n<p><img alt=\"\" src=\"http://traveltalesfromindia.in/wp-content/uploads/2021/10/view-grand-dragon-ladakh.jpg\" style=\"height:768px; width:1024px\" /></p>\r\n\r\n<p>The View from my Porch!</p>\r\n\r\n<p>Once I settled in my room, I marveled at the view from my porch, I was going to wake up to it for 5 days. After the tough 2020 that we all had and then the horror of April 2021, this was the sight for my sore eyes! While I was posting on <a href=\"https://twitter.com/mridulablog\" target=\"_blank\">Twitter</a>, <a href=\"https://www.facebook.com/mridula.dwivedi\" target=\"_blank\">Facebook</a> and <a href=\"https://www.instagram.com/mridulablog/\" target=\"_blank\">Instagram</a>, many people messaged me and asked about the weather. I stayed in Leh from October 13 to 18. On all days the day temperature was above 12 degrees Celsius. The nights were cold but I would get tucked in my centrally heated room by 9.30 pm so it was never a problem. The last day on October 18 I woke up to 0 degree but all I was doing on that day was catching a flight! I liked the weather during my stay plus I got to see <a href=\"http://traveltalesfromindia.in/2021/10/fall-colors-in-ladakh/\" target=\"_blank\">the gorgeous fall colors!</a></p>\r\n\r\n<p><img alt=\"\" src=\"http://traveltalesfromindia.in/wp-content/uploads/2021/10/food.jpg\" style=\"height:548px; width:1024px\" /></p>\r\n\r\n<p>Food at the Grand Dragon Ladakh</p>\r\n\r\n<p>I was eating all my meals at the hotel. I did walk to the market many times, I saw all the cute cafes but in the end I chickened out, due to the crowd. October was busy in Leh. At the hotel the restaurant was spacious, so I felt safer eating there than in the cafes. I start checking out the buffet from the dessert counter and I was worried about eating so much hotel food. To my surprise I did not gain any weight during my stay even though I ate plenty of dessert. I believe the walking around at the high altitude balanced out my sweet intake!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>As I was present at every meal over 5 days the staff got used to me! They also knew my whims, and catered to it. I must have been the only person eating all my meals alone but I never felt it too much! I do not remember all the names but I so remember Dolma, Gagan, Tanmay (front desk) and Tara ji. We met at every meal and when they were not too busy they took out time to chat with me.</p>\r\n\r\n<p><img alt=\"\" src=\"http://traveltalesfromindia.in/wp-content/uploads/2021/10/kahwa-grand-dragon-ladakh.jpg\" style=\"height:768px; width:1024px\" /></p>\r\n\r\n<p>Kahwa in the Garden</p>\r\n\r\n<p>I am a chai person and I hardly ever swap it for anything except Kahwa. There is something magical about Kahwa at that height and weather. I can drink a lot of it.</p>\r\n\r\n<p><img alt=\"\" src=\"http://traveltalesfromindia.in/wp-content/uploads/2021/10/tea-grand-dragon-ladakh.jpg\" style=\"height:768px; width:1024px\" /></p>\r\n\r\n<p>Tea at the Terrace</p>\r\n\r\n<p>My vacations center around the amount of tea I drink and I had a lot of happy cups on this one. After my meals or breakfast inside the restaurant I would walk out to the terrace with chai or Kahwa in hand and bliss all around me.</p>\r\n\r\n<p><img alt=\"\" src=\"http://traveltalesfromindia.in/wp-content/uploads/2021/10/the-grand-dragon.jpg\" style=\"height:768px; width:1024px\" /></p>\r\n\r\n<p>Another Picture from my Porch</p>\r\n\r\n<p>I made a few rookie mistakes on this trip. Instead of resting completely I went for a walk in the evening on the first day. For the first two days I also did not increase my water intake. So, on the second day of my trip, I was having headache and I barely moved. My porch was my shelter and the views still were stunning. In fact, if I could force myself I would make it mandatory on all my trips to do nothing on one day. But I know it won&rsquo;t happen unless I need to rest, like on this trip!</p>\r\n\r\n<p><img alt=\"\" src=\"http://traveltalesfromindia.in/wp-content/uploads/2021/10/grand-dragon-ladakh.jpg\" style=\"height:800px; width:600px\" /></p>\r\n\r\n<p>Apples in the Garden</p>\r\n\r\n<p>Apples were growing in plentiful in the garden of the hotel! For a low altitude person like me it was exotic to see so many of them on the tree!</p>\r\n\r\n<p><img alt=\"\" src=\"http://traveltalesfromindia.in/wp-content/uploads/2021/10/evening-grand-dragon-ladakh.jpg\" style=\"height:800px; width:600px\" /></p>\r\n\r\n<p>The Grand Dragon Ladakh at Dusk</p>\r\n\r\n<p>It was so nice to spend a few days in such beautiful settings. When I arrived, I was so tired both physically and mentally. Many days have gone since I came back, I still feel rejuvenated after this trip.</p>\r\n\r\n<p><img alt=\"\" src=\"http://traveltalesfromindia.in/wp-content/uploads/2021/10/staff-grand-dragon-ladakh.jpg\" style=\"height:756px; width:1024px\" /></p>\r\n\r\n<p>The Wonderful Staff at the Grand Dragon Ladakh</p>\r\n\r\n<p>It is the people who make the stay memorable and here a few of them in one picture. I was late from sightseeing one afternoon and the lunch just got over. They got so many things for me from the kitchen that I could not finish it all. I fondly remember the hot <em>gulab jamun</em> that Dolma got me at the end! I requested them to take off the mask just for this picture! I do hope that travel will remain open now and that the worst is behind us. I feel so blessed to have been on this trip to Ladakh and for my wonderful stay at <a href=\"https://www.thegranddragonladakh.com/\" target=\"_blank\">the Grand Dragon Ladakh</a>.</p>', '1', '2022-05-04 14:10:45', '2022-05-04 14:10:45', 0);

-- --------------------------------------------------------

--
-- Table structure for table `blog_comment`
--

CREATE TABLE `blog_comment` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `comment` longtext NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `flagged` int(11) NOT NULL,
  `published_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `company_banners`
--

CREATE TABLE `company_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tagline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageURL` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_banners`
--

INSERT INTO `company_banners` (`id`, `tagline`, `description`, `imageURL`, `status`, `created_at`, `updated_at`) VALUES
(1, 'TRAVELLING AROUND THE WORLD', 'Taciti quasi, sagittis excepteur hymenaeos, id temporibus hic proident ullam, eaque donec delectus tempor consectetur nunc, purus congue? Rem volutpat sodales! Mollit. Minus exercitationem wisi.', '1648546204.jpg', '1', '2022-03-29 04:00:04', '2022-03-29 04:00:04'),
(3, 'EXPERIENCE THE NATUR\'S BEAUTY', 'Taciti quasi, sagittis excepteur hymenaeos, id temporibus hic proident ullam, eaque donec delectus tempor consectetur nunc, purus congue? Rem volutpat sodales! Mollit. Minus exercitationem wisi.', '1648552562.jpg', '1', '2022-03-29 05:46:02', '2022-03-29 05:46:02');

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE `company_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_bio` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`id`, `company_name`, `company_address`, `company_phone`, `company_email`, `company_bio`, `created_at`, `updated_at`) VALUES
(1, 'GoTours Pvt. Ltd.', '1/23 A.B.C. Road, Kolkata - 700001', '+91 9856365892', 'contact@gotours.com', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia volupta.', NULL, '2022-03-28 09:04:34');

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `head_office_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `head_office_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tagline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageURL` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `name`, `head_office_address`, `head_office_phone`, `tagline`, `imageURL`, `status`, `description`, `featured`, `created_at`, `updated_at`) VALUES
(1, 'NORWAY', '2/76 M.L.P Road, Norway', '8574265410', 'Powered by Nature', '1648559729.jpg', '1', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.', '0', '2022-03-29 07:45:29', '2022-04-28 04:31:23'),
(2, 'JAPAN', '82/9 H.G. Road, Japan', '8574265455', 'Japan. EndlessDiscovery', '1648560588.jpg', '1', 'Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.', '1', '2022-03-29 07:59:48', '2022-04-22 01:59:01'),
(3, 'INDIA', '14/63 R.P.J Road, India', '5634265455', 'Incredible India', '1648561390.jpg', '1', 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', '1', '2022-03-29 08:13:10', '2022-03-30 14:31:32'),
(4, 'DUBAI', '7/9 M.B S.T Road, Dubai', '4785265411', 'Only in Dubai', '1648670460.jpg', '1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '1', '2022-03-29 08:15:18', '2022-03-30 14:31:15'),
(5, 'SINGAPORE', '11/63 Hang XII Road, Singapore', '2563584788', 'Passion Made Possible', '1648633875.jpg', '1', 'Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', '0', '2022-03-30 04:21:15', '2022-03-30 04:21:15'),
(6, 'MALDIVES', '4/13 L.K. Road, Maldives', '6352415263', 'Maldives - Always Natural', '1648634444.jpg', '1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '1', '2022-03-30 04:30:44', '2022-03-30 04:30:44');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_27_110311_add_profileimage_to_users_table', 2),
(6, '2022_03_27_110637_add_multiple_to_users_table', 3),
(7, '2022_03_28_065850_create_company_details_table', 4),
(8, '2022_03_28_193751_create_company_banners_table', 5),
(9, '2022_03_29_052529_add_status_to_company_banners_table', 6),
(10, '2022_03_29_115940_create_destinations_table', 7),
(11, '2022_03_30_091501_add_featured_to_destinations_table', 8),
(12, '2022_03_31_053108_create_package_category_table', 9),
(13, '2022_03_31_053322_create_packages_table', 10),
(14, '2022_03_31_053940_create_package_gallery_table', 11),
(15, '2022_03_31_054942_add_programme_to_packages_table', 12),
(16, '2022_03_31_055019_create_package_programme_table', 13),
(17, '2022_03_31_093937_add_banner_to_packages_table', 14),
(18, '2022_04_01_064221_add_multiple_to_packages_table', 15),
(19, '2022_04_01_091750_remove_multiple_to_packages_table', 16),
(20, '2022_04_01_104243_remove_multiple_to_packages_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tagline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageURL` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mingroup` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` int(11) NOT NULL,
  `descriptions` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `days` int(11) NOT NULL,
  `nights` int(11) NOT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_sale` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `category`, `title`, `tagline`, `banner`, `imageURL`, `mingroup`, `destination`, `descriptions`, `days`, `nights`, `contact_person`, `phone`, `address`, `price`, `is_sale`, `sale_price`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 'EXPERIENCE THE NATURAL BEAUTY OF ISLAND', 'Mollit voluptatem perspiciatis convallis elementum corporis quo veritatis aliquid blandit, blandit torquent, odit placeat.', '1651323289c8efh0.jpg', '1651323045e3fn98.jpg', 'Couple', 1, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', 4, 3, 'Niraj Kumar', '8745125487', '1/3 Bulhamia, Himachal Pradesh - 900052', '19500', '1', '17850', '1', '2022-04-01 05:16:59', '2022-04-01 05:16:59'),
(5, 5, 'FABULOUS KASHMIR VACATION', 'Excepteur sint occaecat cupidatat non proident', '1651410248571a3w.jpg', '16514102480j9zge.jpg', 'People : 4', 3, 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.', 6, 5, 'Abdul Hamid', '8574256352', '1/3 Bulhamia, Jammu & Kashmir - 370004', '32965', '0', '0', '1', '2022-05-01 07:34:08', '2022-05-01 07:34:08'),
(6, 2, 'GLORIOUS KERALA FLIGHT INCLUSIVE DEAL', 'Et harum quidem rerum facilis est et expedita distinction.', '16514966253689fb.jpg', '1651496625cnmo9e.jpg', 'Family', 3, 'Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.', 7, 6, 'Gagon Boral', '8574236594', '1/3 Bulhamia, Meghalaya - 370004', '29133', '1', '27750', '1', '2022-05-02 07:33:45', '2022-05-02 07:33:45');

-- --------------------------------------------------------

--
-- Table structure for table `package_category`
--

CREATE TABLE `package_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_tagline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_category`
--

INSERT INTO `package_category` (`id`, `cat_name`, `cat_image`, `cat_tagline`, `cat_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Honeymoon', '1648732502.png', 'Excepteur sint occaecat cupidatat non proident', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '1', '2022-03-30 18:30:00', NULL),
(2, 'Vacation', '1648732670.png', 'Excepteur sint occaecat cupidatat non proident', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '1', '2022-03-30 18:30:00', NULL),
(3, 'Weekend', '1648732738.png', 'Excepteur sint occaecat cupidatat non proident', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '1', '2022-03-30 18:30:00', NULL),
(4, 'New Year', '1648732754.png', 'Excepteur sint occaecat cupidatat non proident', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '1', '2022-03-30 18:30:00', NULL),
(5, 'Family', '1648732769.png', 'Excepteur sint occaecat cupidatat non proident', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '1', '2022-03-30 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `package_gallery`
--

CREATE TABLE `package_gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` int(11) NOT NULL,
  `imageURL` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_gallery`
--

INSERT INTO `package_gallery` (`id`, `package_id`, `imageURL`, `created_at`, `updated_at`) VALUES
(1, 2, '1651406473zvfabp.jpg', NULL, NULL),
(2, 2, '1651406474js1f8a.jpg', NULL, NULL),
(3, 2, '1651406474xtyb0m.jpg', NULL, NULL),
(4, 2, '1651406474qls3ey.jpg', NULL, NULL),
(9, 2, '16514071732kxqlh.jpg', NULL, NULL),
(10, 2, '1651408044cvif3t.jpg', NULL, NULL),
(11, 2, '1651408099y46otn.jpg', NULL, NULL),
(12, 5, '1651411465vysen1.jpg', NULL, NULL),
(15, 5, '1651411465j70e9y.jpg', NULL, NULL),
(18, 5, '1651488219e7f5iy.jpg', NULL, NULL),
(19, 5, '1651488219hk4p1w.jpg', NULL, NULL),
(21, 5, '1651488507l8fvnm.jpg', NULL, NULL),
(24, 6, '1651496731mtgeb9.jpg', NULL, NULL),
(25, 6, '1651496731fx5jso.jpg', NULL, NULL),
(26, 6, '1651496731q73myw.jpg', NULL, NULL),
(27, 6, '16514967312jf9ph.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `package_programme`
--

CREATE TABLE `package_programme` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_programme`
--

INSERT INTO `package_programme` (`id`, `package_id`, `day`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Ancient Rome Visit', 'Nostra semper ultricies eu leo eros orci porta provident, fugit? Pariatur interdum assumenda, qui aliquip ipsa! Dictum natus potenti pretium.', NULL, NULL),
(2, 2, 2, 'Classic Rome Sightseeing', 'Nostra semper ultricies eu leo eros orci porta provident, fugit? Pariatur interdum assumenda, qui aliquip ipsa! Dictum natus potenti pretium.', NULL, NULL),
(3, 2, 3, 'Vatican City Visit', 'Pariatur interdum assumenda, qui aliquip ipsa! Dictum natus potenti pretium. Nostra semper ultricies eu leo eros orci porta provident, fugit?', NULL, '2022-04-30 11:06:03'),
(19, 2, 4, 'Italian Food Tour', 'Nostra semper ultricies eu leo eros orci porta provident, fugit? Pariatur interdum assumenda, qui aliquip ipsa! Dictum natus potenti pretium.', '2022-04-30 10:24:44', '2022-04-30 11:09:30'),
(21, 5, 1, 'Arrival in Srinagar', 'Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.', '2022-05-01 13:05:49', '2022-05-01 13:05:49'),
(22, 5, 2, 'Srinagar Houseboat to Gulmarg', 'Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.', '2022-05-01 13:05:49', '2022-05-01 13:05:49'),
(23, 5, 3, 'Gulmarg to Pahalgam', 'Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.', '2022-05-01 13:05:49', '2022-05-01 13:05:49'),
(24, 5, 4, 'Pahalgam', 'Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.', '2022-05-01 13:05:49', '2022-05-01 13:05:49'),
(25, 5, 5, 'Pahalgam to Srinagar', 'Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.', '2022-05-01 13:05:49', '2022-05-01 13:05:49'),
(26, 5, 6, 'Departure from Srinagar', 'Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.', '2022-05-01 13:05:49', '2022-05-01 13:05:49'),
(27, 6, 1, 'Arrival in Kochi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2022-05-02 13:05:14', '2022-05-02 13:05:14'),
(28, 6, 2, 'Munnar', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2022-05-02 13:05:14', '2022-05-02 13:05:14'),
(29, 6, 3, 'Munnar to Thekkady', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2022-05-02 13:05:14', '2022-05-02 13:05:14'),
(30, 6, 4, 'Thekkady to Kovalam and Poovar', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2022-05-02 13:05:14', '2022-05-02 13:05:14'),
(31, 6, 5, 'Kovalam and Poovar', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2022-05-02 13:05:14', '2022-05-02 13:05:14'),
(32, 6, 6, 'Kovalam and Poovar to Allepey', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2022-05-02 13:05:14', '2022-05-02 13:05:14'),
(33, 6, 7, 'Departure from Kochi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2022-05-02 13:05:14', '2022-05-02 13:05:14');

-- --------------------------------------------------------

--
-- Table structure for table `package_review`
--

CREATE TABLE `package_review` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `review` longtext NOT NULL,
  `star_rate` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gotours.com', '$2y$10$xQCG3IDKpnOoI8CoJa0vQuYRHLGF0Cc1.bHsSvx42JSCadB683sA.', '2022-03-25 00:53:03');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `profileimage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` datetime NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `profileimage`, `dob`, `address`, `phonenum`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@gotours.com', NULL, '$2y$10$raAjpzEHSCpsF3.qMbnI4uDbdjXMybYNrPT2Tyfj4zyeLhmrQaJDy', 1, '', '0000-00-00 00:00:00', '', '', 'Y', NULL, '2022-03-25 00:22:16', '2022-03-25 00:22:16'),
(2, 'Manager User', 'manager@gotours.com', NULL, '$2y$10$J7er1gZmkQHZ.8K8D2RUCeYV35ybt3pd5r57Nx53pKSRaN.mJz4gq', 2, '', '0000-00-00 00:00:00', '', '', 'Y', NULL, '2022-03-25 00:22:16', '2022-03-25 00:22:16'),
(3, 'User', 'user@gotours.com', NULL, '$2y$10$hzPwiagTUmQgINXcBojYHume7SXcRaeMI/Bd7mn74/Zrqt3M19D7.', 0, '', '0000-00-00 00:00:00', '', '', 'Y', NULL, '2022-03-25 00:22:16', '2022-03-25 00:22:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_banners`
--
ALTER TABLE `company_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_details`
--
ALTER TABLE `company_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_category`
--
ALTER TABLE `package_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_gallery`
--
ALTER TABLE `package_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_programme`
--
ALTER TABLE `package_programme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_review`
--
ALTER TABLE `package_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_banners`
--
ALTER TABLE `company_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company_details`
--
ALTER TABLE `company_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `package_category`
--
ALTER TABLE `package_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `package_gallery`
--
ALTER TABLE `package_gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `package_programme`
--
ALTER TABLE `package_programme`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `package_review`
--
ALTER TABLE `package_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
