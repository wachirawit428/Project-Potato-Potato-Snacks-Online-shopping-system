-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 23, 2022 at 10:41 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `abailday`
--

CREATE TABLE `abailday` (
  `id` int(225) NOT NULL,
  `sday` varchar(225) NOT NULL,
  `stime` varchar(225) NOT NULL,
  `etime` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `abailday`
--

INSERT INTO `abailday` (`id`, `sday`, `stime`, `etime`) VALUES
(1, 'Sunday', '10:00', '22:00'),
(2, 'Monday', '10:00', '22:00'),
(3, 'Tuesday', '10:10', '22:35'),
(4, 'Wednesday', '10:00', '22:00'),
(5, 'Thursday', '10:00', '22:00'),
(10, 'Friday', '10:00', '22:00'),
(13, 'Sunday', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(30) NOT NULL,
  `client_ip` varchar(225) NOT NULL,
  `user_id` int(225) NOT NULL,
  `product_id` int(225) NOT NULL,
  `qty` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `client_ip`, `user_id`, `product_id`, `qty`) VALUES
(3, '', 2, 7, 1),
(4, '', 2, 5, 1),
(10, '', 3, 7, 1),
(12, '', 4, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `catimg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category_list`
--

INSERT INTO `category_list` (`id`, `name`, `catimg`) VALUES
(1, 'ข้าว', '1666459920_1638278700_special-chinese-rice_12493.jpg'),
(2, 'พิซซ่า', '1638273900_Pizza-from-Scratch.jpg'),
(5, 'เคบับ', '1638274080_Paneer-Frankie-Kathi-Roll-Recipe-Piping-Pot-Curry.jpg'),
(8, 'เบอร์เกอร์', '1638274440_09-1441783294-cover-imahe-.jpg'),
(9, 'อาหารทอด', '1666454100_เฟรนช์ฟรายส์ 1.png');

-- --------------------------------------------------------

--
-- Table structure for table `odernotification`
--

CREATE TABLE `odernotification` (
  `id` int(225) NOT NULL,
  `osdate` varchar(225) NOT NULL,
  `oedate` varchar(225) NOT NULL,
  `omssg` text NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `odernotification`
--

INSERT INTO `odernotification` (`id`, `osdate`, `oedate`, `omssg`, `status`) VALUES
(1, '2021-11-26', '2021-11-27', 'Promotion french fries  buy 2 free 1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(30) NOT NULL,
  `usrid` int(225) NOT NULL,
  `odrId` int(225) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `mobile` text NOT NULL,
  `email` text NOT NULL,
  `status` tinytext NOT NULL,
  `tprice` varchar(225) NOT NULL,
  `odrdate` varchar(225) NOT NULL,
  `cnclreson` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `usrid`, `odrId`, `name`, `address`, `mobile`, `email`, `status`, `tprice`, `odrdate`, `cnclreson`) VALUES
(4, 3, 69514, 'wachirawit walairat', '88/8 703', '0994492235', 'sosaint5758@gmail.com', '2', '145.00', '21/10/2022 10:27 PM', ''),
(5, 4, 60343, 'wachirawit walairat', '88/8 703', '0994492235', 'sosaint5758@gmil.com', '2', '145.00', '21/10/2022 10:48 PM', ''),
(6, 5, 49501, 'wachirawit walairat', '88/8 703', '0994492235', 'sosaint5758@gmil.com', '3', '50.00', '21/10/2022 11:00 PM', ''),
(7, 6, 64108, 'wachirawit walairat', '88/8 703', '0994492235', 'wachirawit.wal@ku.th', '2', '', '22/10/2022 12:35 AM', 'อิ่ม'),
(9, 6, 31956, 'wachirawit walairat', '88/8 703', '0994492235', 'wachirawit.wal@ku.th', '2', '0.00', '22/10/2022 12:48 AM', 'ไม่กิน'),
(11, 6, 76322, 'wachirawit walairat', '88/8 703', '0994492235', 'wachirawit.wal@ku.th', '2', '', '22/10/2022 01:08 AM', 'กิน\r\n'),
(12, 7, 22822, 'wachirawit walairat', '88/8 703', '0994492235', 'sosaint5758@gmil.com', '3', '', '22/10/2022 01:38 AM', 'อร่อย'),
(13, 7, 57326, 'wachirawit walairat', '88/8 703', '0994492235', 'sosaint5758@gmil.com', '1', '0.00', '22/10/2022 01:41 AM', ''),
(14, 8, 70958, 'wachirawit walairat', '88/8 703', '0994492235', 'sosaint5758@gmil.com', '1', '50.00', '22/10/2022 05:07 AM', ''),
(15, 9, 48932, 'wachirawit walairat', '88/8 703', '0994492235', 'sosaint5758@gmil.com', '3', '', '22/10/2022 11:59 PM', 'ไม่กินแล้ว'),
(16, 9, 34738, 'wachirawit walairat', '88/8 703', '0994492235', 'sosaint5758@gmil.com', '3', '', '23/10/2022 02:20 AM', 'ไม่กิน'),
(17, 9, 18661, 'wachirawit walairat', '88/8 703', '0994492235', 'sosaint5758@gmil.com', '0', '', '23/10/2022 02:38 AM', ''),
(18, 9, 12116, 'wachirawit walairat', '88/8 703', '0994492235', 'sosaint5758@gmil.com', '3', '', '23/10/2022 02:39 AM', 'อิ่ม'),
(30, 9, 76262, 'wachirawit walairat', '88/8 703', '0994492235', 'sosaint5758@gmil.com', '0', '', '23/10/2022 05:49 ', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `id` int(30) NOT NULL,
  `order_id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `qty` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`id`, `order_id`, `product_id`, `qty`) VALUES
(6, 69514, 14, 1),
(7, 60343, 14, 1),
(8, 49501, 7, 1),
(9, 64108, 10, 1),
(11, 31956, 7, 1),
(13, 76322, 7, 1),
(14, 22822, 14, 1),
(15, 57326, 7, 1),
(16, 70958, 7, 1),
(17, 48932, 1, 1),
(18, 34738, 30, 4),
(19, 34738, 5, 1),
(20, 18661, 31, 1),
(21, 12116, 31, 1),
(33, 76262, 31, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `id` int(225) NOT NULL,
  `category_id` int(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL DEFAULT '0',
  `delprice` int(225) NOT NULL,
  `img_path` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0= unavailable, 2 Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`id`, `category_id`, `name`, `description`, `price`, `delprice`, `img_path`, `status`) VALUES
(1, 8, 'Veg Burger', '<span style=\"color: rgb(79, 79, 79); font-family: Okra, Helvetica, sans-serif;\">Crisp golden potato patties sandwiched in burgur buns,with veggies and spiced with chutneys.</span>', 69, 80, '1638274560_09-1441783294-cover-imahe-.jpg', 1),
(2, 8, 'Non Veg Burger', '<span style=\"color: rgb(79, 79, 79); font-family: Okra, Helvetica, sans-serif;\">Crispy seasoned chicken, topped with a mandatory slice of melted cheese and piled onto soft rolls with onion, avocado, lettuce, tomato and garlic mayo.</span>', 79, 89, '1638274680_non-veg.jpg', 1),
(3, 2, 'Barbecue Chicken Pizza', '<span style=\"color: rgb(79, 79, 79); font-family: Okra, Helvetica, sans-serif;\">A famous pie from Italy which is a delight served with barbecue chicken and onion.</span>', 129, 145, '1638275820_bbqpizza.jpg', 1),
(4, 2, 'Non Veg Supreme Pizza', '<span style=\"color: rgb(79, 79, 79); font-family: Okra, Helvetica, sans-serif;\">A famous pie from Italy which is a delight served with black olive, onion, mushroom, barbecue chicken, peri peri chicken, chicken slice, spicy chicken, grilled chicken and extra cheese.</span>', 178, 190, '1638275940_140418-Web-Pizza_NonVegSuperme.jpg', 1),
(5, 2, 'Spicy Chicken Pizza', '<span style=\"color: rgb(79, 79, 79); font-family: Okra, Helvetica, sans-serif;\">A famous pie from Italy which is a delight served with onion, spicy chicken.</span>', 129, 150, '1638276060_55002-3.1.jpg', 1),
(6, 2, 'Veg Margherita Pizza', '<span style=\"color: rgb(79, 79, 79); font-family: Okra, Helvetica, sans-serif;\">A famous pie from Italy which is a cheesy classic.</span>', 99, 120, '1638276180_margherita-pizza-5.jpg', 1),
(22, 5, 'Paneer Roll', '<span style=\"color: rgb(79, 79, 79); font-family: Okra, Helvetica, sans-serif;\">A delightful dish made of grated paneer wrapped in a paratha tossed with chopped onions and thick gravy</span>', 60, 70, '1638278160_download.jpg', 1),
(23, 5, 'Egg Roll', '<span style=\"color: rgb(79, 79, 79); font-family: Okra, Helvetica, sans-serif;\">An egg roll is a cylindrical, savory roll with shredded cabbage and other fillings inside a thickly-wrapped wheat flour skin, which is fried in hot oil</span>', 40, 45, '1638278220_eggroll.png', 1),
(24, 5, 'Chicken Roll', '<span style=\"color: rgb(79, 79, 79); font-family: Okra, Helvetica, sans-serif;\">An irresistible that consists of soft parathas layered with spicy chicken mix and onions with a taste of lime wrapped in a foil.</span>', 60, 70, '1638278280_60f2ea67b471327a1d82959b_chicken roll_1500 x 1200.jpg', 1),
(25, 1, 'ข้าวยำไก่แซ่บ', '<font color=\"#4f4f4f\" face=\"Okra, Helvetica, sans-serif\">ข้าวไก่ทอกที่ผสมน้ำยำแบบแซ่บแบบสุดใจ</font>', 40, 50, '1666460280_ข้าวยำไก่แซ่บ.png', 1),
(26, 1, 'ข้าวไก่ทอดเทอริยากิ', '<font color=\"#4f4f4f\" face=\"Okra, Helvetica, sans-serif\">ข้าวหน้าไก่ทอดซอสเทอริยากิสุดแสนอร่อย</font>', 50, 60, '1666460040_ข้าวไก่เทอริยากิ.png', 1),
(29, 1, 'ข้าวสะโพกไก่ทอด', 'ข้าวสะโพกไก่ทอดมาพร้อมน้ำจิ้มไก่ที่สุดจะลงตัว', 50, 60, '1666460460_ข้าวสะโพกไก่ทอด.png', 1),
(30, 9, 'เฟรนช์ฟรายส์ไซด์ S', '<h5>เฟรนช์ฟรายส์ไซด์ S ทอดใหม่ทุกออร์เดอร์</h5><p></p><p dir=\"auto\" style=\"margin-bottom: 1rem; padding: 0px; border: none; outline: none; font-size: 16px; color: rgb(0, 0, 0); line-height: 23px; font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif;\"><br></p><p></p>', 39, 0, '1666462800_เฟรนช์ฟรายส์.jpg', 1),
(31, 9, 'โดนัทกุ้ง', 'โดนัดกุ้ง ไส้กุ้งแน่นๆแป้งกรอบ กรุบ อร่อย', 35, 0, '1666464180_โดนัทกุ้ง.png', 1),
(32, 9, 'ชีสบอล', 'ชีสบอล กรอบนอก นุ่มใน ชีสยื้ดยืดกลมกล่อม', 35, 0, '1666464360_ชีสบอล.png', 1),
(33, 9, 'ไก่ป๊อปสไปซี่', 'ไก่ป๊อปโรยด้วยผงสไปซี่เพิ่มรสชาติจี๊ดจ๊าด', 35, 0, '1666472580_ไก่ป็อปสไปซี่.png', 1),
(34, 9, 'นักเก็ต', 'นักเก็ตแป้งนุ่มเนื้อไก่แน่นๆ', 35, 0, '1666472640_นักเก็ต.png', 1),
(35, 9, 'น่องไก่กรอบบาบีคิว', 'น่องไก่ทอดกรอบโรยด้วยผงบาบีคิวเพิ่มรสชาติความอร่อย', 35, 0, '1666472820_น่องไก่กรอบบาร์บีคิว.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `address`, `cover_img`, `about_content`) VALUES
(1, 'Potato Snacks Online shopping system', 'potatosnackkps@gmail.com', '+66 99 495 5259.', 'ที่อยู่ 107 หมู่ 12 ต.กำแพงแสน อ.กำแพงแสน, Amphoe Kamphaeng Saen 73140', '1666442280_potato.jpg', '&lt;p class=&quot;x11i5rnm xat24cr x1mh8g0r x1vvkbs xtlvy1s x126k92a&quot; style=&quot;margin-top: 0.5em; margin-bottom: 0px; white-space: pre-wrap; overflow-wrap: break-word; font-family: &amp;quot;Segoe UI Historic&amp;quot;, &amp;quot;Segoe UI&amp;quot;, Helvetica, Arial, sans-serif; color: rgb(5, 5, 5); font-size: 15px;&quot;&gt;&lt;/p&gt;&lt;p dir=&quot;auto&quot; style=&quot;font-family: inherit;&quot;&gt;&lt;/p&gt;&lt;span style=&quot;font-size:16px;font-family: inherit;&quot;&gt;&lt;b&gt;&lt;p dir=&quot;auto&quot; style=&quot;font-family: inherit; font-size: 16px;&quot;&gt;&lt;/p&gt;&lt;span style=&quot;font-size:20px;font-family: inherit;&quot;&gt;&lt;p dir=&quot;auto&quot; style=&quot;font-family: inherit; font-size: 20px;&quot;&gt;&lt;/p&gt;&lt;/span&gt;&lt;/b&gt;&lt;/span&gt;&lt;span style=&quot;color:rgb(0,0,0);font-family: inherit; font-size: 20px;&quot;&gt;&lt;span style=&quot;font-size: 16px; font-family: inherit; color: rgb(0, 0, 0);&quot;&gt;&lt;b style=&quot;color: rgb(0, 0, 0);&quot;&gt;&lt;span style=&quot;font-size: 20px; font-family: inherit; color: rgb(0, 0, 0);&quot;&gt;&lt;p dir=&quot;auto&quot; style=&quot;font-family: inherit; font-size: 20px; color: rgb(0, 0, 0);&quot;&gt;&lt;span class=&quot;x3nfvp2 x1j61x8r x1fcty0u xdj266r xhhsvwb xat24cr xgzva0m xxymvpz xlup9mm x1kky2od&quot; style=&quot;font-family: inherit; font-size: 20px; color: rgb(0, 0, 0);&quot;&gt;&lt;img height=&quot;16&quot; width=&quot;16&quot; alt=&quot;👉🏻&quot; referrerpolicy=&quot;origin-when-cross-origin&quot; src=&quot;https://static.xx.fbcdn.net/images/emoji.php/v9/tc/1/16/1f449_1f3fb.png&quot; style=&quot;font-family: inherit; font-size: 20px; color: rgb(0, 0, 0);&quot;&gt;&lt;/span&gt; ร้านอยู่ตรงข้ามกับหอแมนเนอร์&lt;span class=&quot;x3nfvp2 x1j61x8r x1fcty0u xdj266r xhhsvwb xat24cr xgzva0m xxymvpz xlup9mm x1kky2od&quot; style=&quot;width: 16px; display: inline-flex; margin: 0px 1px; height: 16px; vertical-align: middle; font-family: inherit; font-size: 20px; color: rgb(0, 0, 0);&quot;&gt;&lt;img height=&quot;16&quot; width=&quot;16&quot; alt=&quot;👈🏻&quot; referrerpolicy=&quot;origin-when-cross-origin&quot; src=&quot;https://static.xx.fbcdn.net/images/emoji.php/v9/t4b/1/16/1f448_1f3fb.png&quot; style=&quot;border: 0px; font-size: 20px; color: rgb(0, 0, 0);&quot;&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;font-size: 20px; color: rgb(0, 0, 0);&quot;&gt;&lt;/p&gt;&lt;p class=&quot;x11i5rnm xat24cr x1mh8g0r x1vvkbs xtlvy1s x126k92a&quot; style=&quot;margin-top: 0.5em; margin-bottom: 0px; white-space: pre-wrap; overflow-wrap: break-word; font-family: &amp;quot;Segoe UI Historic&amp;quot;, &amp;quot;Segoe UI&amp;quot;, Helvetica, Arial, sans-serif; color: rgb(0, 0, 0); font-size: 20px;&quot;&gt;&lt;/p&gt;&lt;p dir=&quot;auto&quot; style=&quot;font-family: inherit; font-size: 20px; color: rgb(0, 0, 0);&quot;&gt;เปิด 19.00-01.30&lt;/p&gt;&lt;p style=&quot;font-size: 20px; color: rgb(0, 0, 0);&quot;&gt;&lt;/p&gt;&lt;p class=&quot;x11i5rnm xat24cr x1mh8g0r x1vvkbs xtlvy1s x126k92a&quot; style=&quot;margin-top: 0.5em; margin-bottom: 0px; white-space: pre-wrap; overflow-wrap: break-word; font-family: &amp;quot;Segoe UI Historic&amp;quot;, &amp;quot;Segoe UI&amp;quot;, Helvetica, Arial, sans-serif; color: rgb(0, 0, 0); font-size: 20px;&quot;&gt;&lt;/p&gt;&lt;p dir=&quot;auto&quot; style=&quot;font-family: inherit; font-size: 20px; color: rgb(0, 0, 0);&quot;&gt;&lt;span class=&quot;x3nfvp2 x1j61x8r x1fcty0u xdj266r xhhsvwb xat24cr xgzva0m xxymvpz xlup9mm x1kky2od&quot; style=&quot;width: 16px; display: inline-flex; margin: 0px 1px; height: 16px; vertical-align: middle; font-family: inherit; font-size: 20px; color: rgb(0, 0, 0);&quot;&gt;&lt;img height=&quot;16&quot; width=&quot;16&quot; alt=&quot;🥔&quot; referrerpolicy=&quot;origin-when-cross-origin&quot; src=&quot;https://static.xx.fbcdn.net/images/emoji.php/v9/tb0/1/16/1f954.png&quot; style=&quot;border: 0px; font-size: 20px; color: rgb(0, 0, 0);&quot;&gt;&lt;/span&gt; POTATO SNACK &lt;span class=&quot;x3nfvp2 x1j61x8r x1fcty0u xdj266r xhhsvwb xat24cr xgzva0m xxymvpz xlup9mm x1kky2od&quot; style=&quot;width: 16px; display: inline-flex; margin: 0px 1px; height: 16px; vertical-align: middle; font-family: inherit; font-size: 20px; color: rgb(0, 0, 0);&quot;&gt;&lt;img height=&quot;16&quot; width=&quot;16&quot; alt=&quot;❤️&quot; referrerpolicy=&quot;origin-when-cross-origin&quot; src=&quot;https://static.xx.fbcdn.net/images/emoji.php/v9/t6c/1/16/2764.png&quot; style=&quot;border: 0px; font-size: 20px; color: rgb(0, 0, 0);&quot;&gt;&lt;/span&gt;&lt;/p&gt;&lt;p dir=&quot;auto&quot; style=&quot;font-family: inherit; font-size: 20px; color: rgb(0, 0, 0);&quot;&gt;เมนูทานเล่น&lt;span class=&quot;x3nfvp2 x1j61x8r x1fcty0u xdj266r xhhsvwb xat24cr xgzva0m xxymvpz xlup9mm x1kky2od&quot; style=&quot;width: 16px; display: inline-flex; margin: 0px 1px; height: 16px; vertical-align: middle; font-family: inherit; font-size: 20px; color: rgb(0, 0, 0);&quot;&gt;&lt;img height=&quot;16&quot; width=&quot;16&quot; alt=&quot;🍟&quot; referrerpolicy=&quot;origin-when-cross-origin&quot; src=&quot;https://static.xx.fbcdn.net/images/emoji.php/v9/t5c/1/16/1f35f.png&quot; style=&quot;border: 0px; font-size: 20px; color: rgb(0, 0, 0);&quot;&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;font-size: 20px; color: rgb(0, 0, 0);&quot;&gt;&lt;/p&gt;&lt;p class=&quot;x11i5rnm xat24cr x1mh8g0r x1vvkbs xtlvy1s x126k92a&quot; style=&quot;margin-top: 0.5em; margin-bottom: 0px; white-space: pre-wrap; overflow-wrap: break-word; font-family: &amp;quot;Segoe UI Historic&amp;quot;, &amp;quot;Segoe UI&amp;quot;, Helvetica, Arial, sans-serif; color: rgb(0, 0, 0); font-size: 20px;&quot;&gt;&lt;/p&gt;&lt;p dir=&quot;auto&quot; style=&quot;font-family: inherit; font-size: 20px; color: rgb(0, 0, 0);&quot;&gt;ไก่ป๊อป 29 บาท&lt;/p&gt;&lt;p dir=&quot;auto&quot; style=&quot;font-family: inherit; font-size: 20px; color: rgb(0, 0, 0);&quot;&gt;นักเก็ต 29 บาท (6ชิ้น)&lt;/p&gt;&lt;p dir=&quot;auto&quot; style=&quot;font-family: inherit; font-size: 20px; color: rgb(0, 0, 0);&quot;&gt;โดนัทกุ้ง 29 บาท (2ชิ้น)&lt;/p&gt;&lt;p dir=&quot;auto&quot; style=&quot;font-family: inherit; font-size: 20px; color: rgb(0, 0, 0);&quot;&gt;ชีสบอล 29 บาท (8ชิ้น)&lt;/p&gt;&lt;/span&gt;&lt;p dir=&quot;auto&quot; style=&quot;font-family: inherit; font-size: 16px; color: rgb(0, 0, 0);&quot;&gt;&lt;/p&gt;&lt;/b&gt;&lt;/span&gt;&lt;p dir=&quot;auto&quot; style=&quot;font-family: inherit; font-size: 14px; color: rgb(0, 0, 0);&quot;&gt;&lt;/p&gt;&lt;p dir=&quot;auto&quot; style=&quot;font-family: inherit; color: rgb(0, 0, 0);&quot;&gt;&lt;/p&gt;&lt;p dir=&quot;auto&quot; style=&quot;font-family: &amp;quot;Segoe UI Historic&amp;quot;, &amp;quot;Segoe UI&amp;quot;, Helvetica, Arial, sans-serif; color: rgb(0, 0, 0); font-size: 15px;&quot;&gt;&lt;/p&gt;&lt;/span&gt;&lt;p dir=&quot;auto&quot; style=&quot;font-family: &amp;quot;Segoe UI Historic&amp;quot;, &amp;quot;Segoe UI&amp;quot;, Helvetica, Arial, sans-serif; font-size: 15px; color: rgb(5, 5, 5);&quot;&gt;&lt;/p&gt;&lt;span style=&quot;color:rgb(0,0,0);font-family: &amp;quot;Segoe UI Historic&amp;quot;, &amp;quot;Segoe UI&amp;quot;, Helvetica, Arial, sans-serif; font-size: 15px;&quot;&gt;&lt;p dir=&quot;auto&quot; style=&quot;font-family: &amp;quot;Segoe UI Historic&amp;quot;, &amp;quot;Segoe UI&amp;quot;, Helvetica, Arial, sans-serif; color: rgb(0, 0, 0); font-size: 15px;&quot;&gt;&lt;/p&gt;&lt;span style=&quot;font-size:16px;font-family: &amp;quot;Segoe UI Historic&amp;quot;, &amp;quot;Segoe UI&amp;quot;, Helvetica, Arial, sans-serif; color: rgb(0, 0, 0);&quot;&gt;&lt;p dir=&quot;auto&quot; style=&quot;font-family: &amp;quot;Segoe UI Historic&amp;quot;, &amp;quot;Segoe UI&amp;quot;, Helvetica, Arial, sans-serif; color: rgb(0, 0, 0); font-size: 16px;&quot;&gt;ราคา&lt;/p&gt;&lt;p dir=&quot;auto&quot; style=&quot;font-family: &amp;quot;Segoe UI Historic&amp;quot;, &amp;quot;Segoe UI&amp;quot;, Helvetica, Arial, sans-serif; color: rgb(0, 0, 0); font-size: 16px;&quot;&gt;39 เลือกได้ 1 รสชาติ&lt;/p&gt;&lt;p dir=&quot;auto&quot; style=&quot;font-family: &amp;quot;Segoe UI Historic&amp;quot;, &amp;quot;Segoe UI&amp;quot;, Helvetica, Arial, sans-serif; color: rgb(0, 0, 0); font-size: 16px;&quot;&gt;49 เลือกได้ 2 รสชาติ&lt;/p&gt;&lt;p dir=&quot;auto&quot; style=&quot;font-family: &amp;quot;Segoe UI Historic&amp;quot;, &amp;quot;Segoe UI&amp;quot;, Helvetica, Arial, sans-serif; color: rgb(0, 0, 0); font-size: 16px;&quot;&gt;59 เลือกได้ 3 รสชาติ&lt;/p&gt;&lt;p dir=&quot;auto&quot; style=&quot;font-family: &amp;quot;Segoe UI Historic&amp;quot;, &amp;quot;Segoe UI&amp;quot;, Helvetica, Arial, sans-serif; color: rgb(0, 0, 0); font-size: 16px;&quot;&gt;1.ผงรสเกลือ&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Segoe UI Historic&amp;quot;, &amp;quot;Segoe UI&amp;quot;, Helvetica, Arial, sans-serif; font-size: 16px;&quot;&gt;6.ผงรสทรัฟเฟิล&lt;/span&gt;&lt;/p&gt;&lt;p dir=&quot;auto&quot; style=&quot;font-family: &amp;quot;Segoe UI Historic&amp;quot;, &amp;quot;Segoe UI&amp;quot;, Helvetica, Arial, sans-serif; color: rgb(0, 0, 0); font-size: 16px;&quot;&gt;2.ผงรสไข่เค็ม&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Segoe UI Historic&amp;quot;, &amp;quot;Segoe UI&amp;quot;, Helvetica, Arial, sans-serif; font-size: 16px;&quot;&gt;7.ผงหม่าล่า&lt;/span&gt;&lt;/p&gt;&lt;p dir=&quot;auto&quot; style=&quot;font-family: &amp;quot;Segoe UI Historic&amp;quot;, &amp;quot;Segoe UI&amp;quot;, Helvetica, Arial, sans-serif; color: rgb(0, 0, 0); font-size: 16px;&quot;&gt;3.ผงรสซาวครีมและหัวหอม&amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Segoe UI Historic&amp;quot;, &amp;quot;Segoe UI&amp;quot;, Helvetica, Arial, sans-serif; font-size: 16px;&quot;&gt;8.ผงสโมคกี้บาร์บิคิว&lt;/span&gt;&lt;/p&gt;&lt;p dir=&quot;auto&quot; style=&quot;font-family: &amp;quot;Segoe UI Historic&amp;quot;, &amp;quot;Segoe UI&amp;quot;, Helvetica, Arial, sans-serif; color: rgb(0, 0, 0); font-size: 16px;&quot;&gt;4.ผงรสเชดด้าชีส&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Segoe UI Historic&amp;quot;, &amp;quot;Segoe UI&amp;quot;, Helvetica, Arial, sans-serif; font-size: 16px;&quot;&gt;9.โนริสาหร่าย&lt;/span&gt;&lt;/p&gt;&lt;p dir=&quot;auto&quot; style=&quot;font-family: &amp;quot;Segoe UI Historic&amp;quot;, &amp;quot;Segoe UI&amp;quot;, Helvetica, Arial, sans-serif; color: rgb(0, 0, 0); font-size: 16px;&quot;&gt;5.ผงรสปาปริก้า&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Segoe UI Historic&amp;quot;, &amp;quot;Segoe UI&amp;quot;, Helvetica, Arial, sans-serif; font-size: 16px;&quot;&gt;10. คาราเมล&lt;/span&gt;&lt;/p&gt;&lt;/span&gt;&lt;p dir=&quot;auto&quot; style=&quot;font-family: &amp;quot;Segoe UI Historic&amp;quot;, &amp;quot;Segoe UI&amp;quot;, Helvetica, Arial, sans-serif; color: rgb(0, 0, 0); font-size: 15px;&quot;&gt;&lt;/p&gt;&lt;/span&gt;&lt;p dir=&quot;auto&quot; style=&quot;font-family: &amp;quot;Segoe UI Historic&amp;quot;, &amp;quot;Segoe UI&amp;quot;, Helvetica, Arial, sans-serif; color: rgb(5, 5, 5); font-size: 15px;&quot;&gt;&lt;/p&gt;&lt;p dir=&quot;auto&quot; style=&quot;font-family: &amp;quot;Segoe UI Historic&amp;quot;, &amp;quot;Segoe UI&amp;quot;, Helvetica, Arial, sans-serif; color: rgb(5, 5, 5); font-size: 15px;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1=admin , 2 = staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`) VALUES
(1, 'admin', 'admin', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address`) VALUES
(1, 'Sarmistha', 'Biswas', 'sarmi@gmail.com', 'caf1a3dfb505ffed0d024130f58c5cfa', '+916298598', '107 Ranaghat Nadia\r\nRanaghat'),
(2, 'Dipan', 'Karmakar', 'dipan@gmail.com', '202cb962ac59075b964b07152d234b70', '6298568975', 'Ranaghat Nadia, PIN: 741201'),
(9, 'wachirawit', 'walairat', 'sosaint5758@gmil.com', 'd41d8cd98f00b204e9800998ecf8427e', '0994492235', '88/8 703');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abailday`
--
ALTER TABLE `abailday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `odernotification`
--
ALTER TABLE `odernotification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abailday`
--
ALTER TABLE `abailday`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `odernotification`
--
ALTER TABLE `odernotification`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
