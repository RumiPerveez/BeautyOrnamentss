-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 12:32 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beautyornaments`
--

-- --------------------------------------------------------

--
-- Table structure for table `best_product`
--

CREATE TABLE `best_product` (
  `id` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_price` decimal(10,0) NOT NULL,
  `p_img` varchar(200) NOT NULL,
  `p_color` varchar(50) NOT NULL,
  `p_qty` varchar(50) NOT NULL,
  `p_details` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `best_product`
--

INSERT INTO `best_product` (`id`, `p_name`, `p_price`, `p_img`, `p_color`, `p_qty`, `p_details`) VALUES
(1, 'MATTEMOIST LIPSTICK', '1590', 'assets/images/lipstick/redLipstick.jpg', 'Peach', '20', 'The Mattemoist Lipstick delivers intense color without compromising on lip care. A velvety formula'),
(2, 'BO-ER-038', '890', 'assets/images/earring/silverEarRing.jpg', 'Silver', '20', 'This silver Earring gives grace and beauty, the kind that bring real strength to the soul.'),
(3, 'TERRACOTTA BLUSHER', '1690', 'assets/images/blusher/terracottaBlusher.jpg', 'Terracotta', '25', 'It provides a natural and healthy look to the cheeks. Macadamia Oil helps to balance sebum and hydra');

-- --------------------------------------------------------

--
-- Table structure for table `billing_tbl`
--

CREATE TABLE `billing_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `country` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `adres` varchar(100) NOT NULL,
  `cellno` varchar(50) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `bill_amnt` double NOT NULL,
  `bill_date` date NOT NULL,
  `payment_method` varchar(25) NOT NULL,
  `payment_recieved` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cate_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cate_name`) VALUES
(1, 'cosmetic'),
(2, 'jewellery');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `msg` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `msg`) VALUES
(4, 'Rumaisa', 'rumaisaperveez@gmail.com', 'hello world');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cellno` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `pswrd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `cellno`, `gender`, `pswrd`) VALUES
(2, 'rubaisha', 'rubaisha@gmail.com ', '7640735689346', 'female', '2134235'),
(3, 'ahmed', 'ahmed@gmail.com', '0786764233', 'male', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` varchar(200) NOT NULL,
  `answer` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`) VALUES
(1, '1.What are the benefits of creating an Account?', 'There are several benefits of creating an Account, including:1-Your billing / shipping information will be saved, and checkout will be faster.2-You will be able to view your previous Order histo'),
(2, '2.How do I make an Account?', 'Simply click on ‘Create an Account’, enter the required details & submit the form.\r\n\r\n'),
(3, '3.How do I search for an item on the website?', 'Click on the search icon on the top right of the website.\r\nEnter the item code you are looking for and press Enter on your keyboard.\r\n\r\n'),
(4, '4.Can I reserve my Order online?', 'Unfortunately, you cannot reserve your Order online.'),
(5, '5.What are the delivery charges for local Orders?', 'Delivery charges of PKR 169 are applicable on all orders.'),
(6, '6.What should I do if I have received a defected / wrong product or quantity?', 'You can also contact our Customer Service center by emailing us images of defected/wrong product at customercare@khaadi.com or calling us at 0800-74007 within 72 hours of delivery.');

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`id`, `cust_id`, `order_date`) VALUES
(12, 3, '2022-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl_dt`
--

CREATE TABLE `order_tbl_dt` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_price` decimal(10,0) NOT NULL,
  `p_img` varchar(300) NOT NULL,
  `p_sub_cate_id` int(11) NOT NULL,
  `p_color` varchar(20) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `p_details` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_price`, `p_img`, `p_sub_cate_id`, `p_color`, `p_qty`, `p_details`) VALUES
(1, 'MATTEVER LIPSTICK', '1890', 'assets/images/lipstick/pinkLipstick.jpg', 1, 'Pink', 20, 'Saturate lips with the creamy, rich and long-lasting Mattever Lipstick. This iconic product features'),
(2, 'LONG WEARING LIPSTICK', '1390', 'assets/images/lipstick/redLipstick.jpg', 1, 'Red', 20, 'The lips feel soft, sensual and silky smooth. It protects its brightness and color for a long time.'),
(3, 'MATTEMOIST LIPSTICK', '1590', 'assets/images/lipstick/peachLipstick.jpg', 1, 'Peach', 20, 'The Mattemoist Lipstick delivers intense color without compromising on lip care. A velvety formula '),
(4, 'BO-BN-132', '990', 'assets/images/bangles/bangleGolden.jpg', 8, 'Golden', 15, 'High Quality Golden Bangles Premium Quality.These set usually wear in different event like wedding. '),
(5, 'BO-BN-133', '790', 'assets/images/bangles/bangleMultiGolden.jpg', 8, 'Multi-Golden', 15, 'Go in love of nature, of divine creation and our sense of wonder was told in our bangle art.'),
(6, 'BO-BN-134', '880', 'assets/images/bangles/bangleCopperGolden.jpg', 8, 'Copper-Golden', 15, 'High Quality Golden Bangles Premium Quality.These set usually wear in different event like wedding. '),
(7, 'TERRACOTTA BLUSHER', '1690', 'assets/images/blusher/terracottaBlusher.jpg', 4, 'Terracotta', 25, 'It provides a natural and healthy look to the cheeks. Macadamia Oil helps to balance sebum and hydra'),
(8, 'LUMINOUS SILK COMPACT BLUSHER', '1590', 'assets/images/blusher/pinkBlusher.jpg', 4, 'Pink', 25, 'The pigmented powder of this matte blusher is enlivened with moisturizing argan oil to brighten chee'),
(9, 'BAKED HIGHLIGHTER', '1890', 'assets/images/blusher/beigeBlusher.jpg', 4, 'Beige', 25, 'Baked Highlighter is an illuminator that gives a radiant appearance with special pearls in its formu'),
(10, 'BO-ER-036', '490', 'assets/images/earring/goldenEarRing.jpg', 7, 'Golden', 20, 'High Quality Golden Earring Premium Quality.These set usually wear in different event like wedding.'),
(11, 'BO-ER-037', '790', 'assets/images/earring/matte-godenEarRing.jpg', 7, 'Matte-Golden', 20, 'Wear something different this season with this Matte-Golden Earring with Premium Quality.'),
(12, 'BO-ER-038', '890', 'assets/images/earring/silverEarRing.jpg', 7, 'Silver', 20, 'This silver Earring gives grace and beauty, the kind that bring real strength to the soul.'),
(13, 'EYESHADOW PALETTE', '2690', 'assets/images/eyeshadow/4-metalShadeEyeShadow.jpg', 3, '4 Metal Shade', 35, 'An explosion of color that lasts very long time to strong adherence of the pigments and pearls.'),
(14, 'SILK QUATTRO EYESHADOW', '1590', 'assets/images/eyeshadow/smokeEyeshadow.jpg', 3, 'Smoke', 35, 'It creates elegant and sophisticated natural looks with 4 different color options.'),
(15, 'MINERAL EYESHADOW', '1790', 'assets/images/eyeshadow/coralEyeShadow.jpg', 3, 'Coral', 35, 'Its special formula contains pure minerals and provides intensive color create a deeper look.'),
(16, 'MINERAL FOUNDATION', '2790', 'assets/images/foundation/coralSeaweedFoundation.jpg', 2, 'Coral Seaweed', 20, 'This foundation is beautifully dewy without overloaded with shimmer & give natural glow.'),
(17, 'SUNGLOW FOUNDATION', '2190', 'assets/images/foundation/SPF15Foundation.jpg', 2, 'SPF 15', 35, 'It provides a natural and healthy glowing tan to your skin with a silky touch.'),
(18, 'MOISTURIZING FOUNDATION', '2390', 'assets/images/foundation/almondFoundation.jpg', 2, 'Almond', 20, 'It protects and balances your skin tone with natural coverage that lasts all day long.'),
(19, 'BO-RN-055', '490', 'assets/images/ring/goldenRing.jpg', 9, 'Golden', 35, 'It is a light and delicate engagement ring with jewels placed into the band itself.'),
(20, 'BO-RN-056', '490', 'assets/images/ring/goldenFlatRing.jpg', 9, 'Golden Flat', 35, 'Wear something different this season with this Matte-Golden ring with Premium Quality.'),
(21, 'BO-RN-057', '400', 'assets/images/ring/matte-goldenRing.jpg', 9, 'Matte-Golden', 20, 'This Matte ring gives grace and beauty, the kind that bring real strength to the soul.');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `img` varchar(300) NOT NULL,
  `head` varchar(20) NOT NULL,
  `descr` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `img`, `head`, `descr`) VALUES
(1, 'slider1.png', 'Super Stay', 'SuperStay Full Coverage Powder Foundation features a high-pigment form'),
(2, 'slider2.png', 'Embellished Wear', 'Jewellery is like the perfect spice..It complements what\'s already the'),
(3, 'slider3.png', 'Matte & Poreless', 'It mattifies and refines pores leaving a natural, seamless finish');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_cate_id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `sub_cate_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_cate_id`, `cate_id`, `sub_cate_name`) VALUES
(1, 1, 'LIPSTICK'),
(2, 1, 'FOUNDATION'),
(3, 1, 'EYESHADOW'),
(4, 1, 'BLUSHER'),
(7, 2, 'EAR RING'),
(8, 2, 'BANGLES'),
(9, 2, 'RINGS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `best_product`
--
ALTER TABLE `best_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_tbl`
--
ALTER TABLE `billing_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cust_id` (`cust_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gender` (`name`(10));

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_tbl_dt`
--
ALTER TABLE `order_tbl_dt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `p_sub_cate_id` (`p_sub_cate_id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_cate_id`),
  ADD KEY `cate_id` (`cate_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `best_product`
--
ALTER TABLE `best_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `billing_tbl`
--
ALTER TABLE `billing_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_tbl_dt`
--
ALTER TABLE `order_tbl_dt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing_tbl`
--
ALTER TABLE `billing_tbl`
  ADD CONSTRAINT `billing_tbl_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `billing_tbl_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order_tbl` (`id`);

--
-- Constraints for table `order_tbl_dt`
--
ALTER TABLE `order_tbl_dt`
  ADD CONSTRAINT `order_tbl_dt_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`p_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`p_sub_cate_id`) REFERENCES `sub_category` (`sub_cate_id`);

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `category` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
