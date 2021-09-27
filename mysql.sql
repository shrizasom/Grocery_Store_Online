-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Sep 27, 2021 at 02:41 PM
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
-- Database: `mysql`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `desc` text NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `rrp` decimal(7,2) NOT NULL DEFAULT 0.00,
  `quantity` int(11) NOT NULL,
  `img` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `name`, `desc`, `price`, `rrp`, `quantity`, `img`, `date_added`) VALUES
(1, 'dairy and eggs', 'EGGS REGULAR', 'Fresh Table eggs are hygienically processed and securely filled for keeping these free from any contamination and impurity. It has high dietary content, protein, smell and rich taste. These are one of nature\'s most wholesome and cost-effective foods. You can bake enjoyable cakes, cookies, scones etc. with eggs; try your hand over at family pasta as well. It twisted boiled, sunny-side up, deviled or evens the Indian method curry eggs can be finished in so many unique tasty ways.', '78.00', '92.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/regular%20eggs.jpg', '2021-04-27 05:05:30'),
(2, 'dairy and eggs', 'FARM EGGS', 'Eggs are one of the common food items in most of the households. From breakfast to dinner, eggs are indulged in various ways. Poached, boiled, fried; we all have our own favourite choices. Not only are they delicious, but they are also crammed with health benefits. It is one of the most in-expensive sources of high protein.', '170.00', '200.00', 100, 'https://www.bigbasket.com/media/uploads/p/l/40117922_2-farm-made-eggs-free-range.jpg', '2021-04-27 05:32:12'),
(3, 'dairy and eggs', 'HEALTHY BROWN EGGS', 'UPF Brown Eggs are fresh and clean eggs produced from the vegetarian feed. These are infertile. Brown eggs are the natural sources of Omega-3 fatty acids.', '65.00', '77.00', 100, 'https://www.bigbasket.com/media/uploads/p/xxl/40161158_2-upf-healthy-brown-eggs.jpg', '2021-04-27 05:39:47'),
(4, 'dairy and eggs', 'DUCK EGGS', 'Ducks eggs are much bigger than the chicken egg. The speciality of these eggs is there big delicious yolk which makes it a favourite of many. These big yolks have a higher healthy fat content. Duck eggs are enriched with various essentials vitamins and minerals. The tasty is also much creamier and richer. ', '69.00', '80.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/duck%20eggs.jfif', '2021-04-27 05:05:30'),
(5, 'dairy and eggs', 'AMUL MILK', 'Amul Taaza Homogenized Toned Milk is fully wholesome and entirely luscious. It has a low-fat, low-carb, low-calorie and standard protein content. It continues fresh for 2 days after opening if kept in the refrigerator. ', '61.00', '72.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/amul%20milk.jpg', '2021-04-27 05:32:12'),
(6, 'dairy and eggs', 'FRESH PANEER', 'Paneer is also called cottage cheese. Amul Fresh Paneer is made from pure milk, hygenically packed untouched by hand. It adheres to FASSAI norms. Amul fresh paneer is a rich source of Protein.', '75.00', '88.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/fresh%20paneer.jpg', '2021-04-27 05:39:47'),
(7, 'dairy and eggs', 'LASSI', 'Grab this quick refreshing drink and replenish your energy instantly. It is a delicious milk based drink which is healthy and tasty.', '20.00', '24.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/lassi.jpg', '2021-04-27 05:05:30'),
(8, 'dairy and eggs', 'DAHI', 'Mother Dairy Dahi Cup 100% Natural is a luscious, smooth and well set curd which gives you the flavor of Homemade curd with no the hassles of setting curd at home. Our curd is arranged using the best quality standards making it disinfected. It is regularly thick, reliable and natural lacking the use of any preservatives. It is complete from pasteurized standardized milk which contains 4.5 % milk fat and 10 % milk SNF', '50.00', '60.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/dahi.jpg', '2021-04-27 05:32:12'),
(9, 'dairy and eggs', 'MILK SHAKE MIX', 'Enjoy delicious chocolaty Oreo crumb milkshake with the all-new Cadbury Oreo milkshake mix. This scrumptious Oreo shake will delight your taste buds with yumminess from the first sip right down to the last. Put 25g/3 tablespoons of Milkshake mix in approximately 200ml of cold milk and mix well for 10 seconds to enjoy this shake with the yumminess of chocolate and the crunchiness of Oreo. Top it up with whipped cream and some pieces of Cadbury Dairy Milk chocolate & Oreos for an even more delectable experience.', '330.00', '388.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/milk%20shake.jpg', '2021-04-27 05:39:47'),
(10, 'dairy and eggs', 'CONDENSED MILK', 'A versatile condensed milk for indian and western desserts. It is an essential ingredient for those who love making desserts. It is sweetened and has a creamy texture.', '108.00', '127.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/condensed%20milk.jpg', '2021-04-27 05:05:30'),
(11, 'dairy and eggs', 'MILK POWDER', 'Nestle EVERYDAY is a dairy whitener or dried milk powder that mixes in completely with your tea to lift its taste - so you get a thicker & tastier cup of tea, every time. We at Nestle use milk of the highest quality, and also use our international dairy know-how to carefully dry and balance this milk powder without losing any of its goodness, so that you and your family can enjoy a thicker, milkier, tastier cup of tea - with EVERYDAY, tea\'s perfect partner! Did you know that EVERYDAY is the No.1 selling dairy whitener in the country. It’s no wonder then, that in blind taste tests consumers ranked tea made with EVERYDAY milk powder as their No.1 choice for a perfect cup of tea! ', '450.00', '530.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/milk%20powder.jpeg', '2021-04-27 05:32:12'),
(12, 'Produce', 'APPLE', 'A combination of slightly tart tasting skin and honey floral tasting flesh, the Royal Gala apples, as the name suggests looks regal with beautiful golden coloured streaks.', '159.00', '187.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/apple.jpg', '2021-04-27 05:39:47'),
(13, 'Produce', 'CARROT', 'A popular sweet-tasting root vegetable, Carrots are narrow and cone shaped. They have thick, fleshy, deeply colored root, which grows underground, and feathery green leaves that emerge above the ground. While these greens are fresh tasting and slightly bitter, the carrot roots are crunchy textured with a sweet and minty aromatic taste. Fresho brings you the flavour and richness of the finest crispy and juicy carro', '8.00', '10.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/carrot.jpg', '2021-04-27 05:05:30'),
(14, 'Produce', 'MANGO', '10kg Mango Pack.', '699.00', '822.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/mango.jpg', '2021-04-27 05:32:12'),
(15, 'Produce', 'BANANA', 'Tiny and small sized, this variety is called Yelakki in Bangalore and Elaichi in Mumbai. Despite its small size, they are naturally flavoured, aromatic and sweeter compared to regular bananas. Yelakki bananas are around 3- 4 inches long and contain a thinner skin and better shelf lif', '55.00', '66.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/banana.jpg', '2021-04-27 05:39:47'),
(16, 'Produce', 'GRAPES', 'Grapes are rich in vitamins A, C, K. They relieve constipation, indigestion and treat kidney disorders.', '79.00', '93.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/grapes.jpg', '2021-04-27 05:05:30'),
(17, 'Produce', 'POMOGRANATE ', 'Pomegranate is a rich supplier of soluble and insoluble dietary fibers, vitamin K, C, minerals and B-complex vitamins such as B5, B6.', '165.00', '195.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/Pomegranate.jpg', '2021-04-27 05:32:12'),
(18, 'tinned and dried pro', 'PEPSI', 'Pepsi brings Pepsi Black - a zero calorie cola with maximum taste.', '154.00', '180.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/pepsi.jpg', '2021-04-27 05:39:47'),
(19, 'tinned and dried pro', 'DATES', 'Lion Dates - Desert King is one of the healthy and nutritionally rich fruits enriched with the natural taste, vitamins and minerals. The skin of the dried fruit is wrinkled ', '153.00', '179.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/dates.jpg', '2021-04-27 05:05:30'),
(20, 'tinned and dried pro', 'UNCLE CHIPS', '23 percent Extra and Spicy treat', '10.00', '12.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/uncle-chips.jpg', '2021-04-27 05:32:12'),
(21, 'tinned and dried pro', 'ALMONDS', 'Almonds are bite-sized all-rounders when it comes to keeping you young & fit. It\'s food for the brain, keeping your memory sharp. ', '683.00', '805.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/almonds.jpg', '2021-04-27 05:39:47'),
(22, 'tinned and dried pro', 'KISMIS', 'The organic kismis are preserved and dried version of grapes. It is fine for the health.', '75.00', '88.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/resins.jpg', '2021-04-27 05:05:30'),
(23, 'tinned and dried pro', 'MOUNTAIN DEW 150L', 'Mountain Dew exhilarates like no other because of its active, high-energy, extreme citrus taste. The idea of daring, challenges, a can-do attitude, adventure', '150.00', '177.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/mountain%20dew.jpg', '2021-04-27 05:32:12'),
(24, 'meat and fish', 'WHOLE CHICKEN', 'Pre skinned chicken ready to cook.', '250.00', '265.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/Whole%20chicken.jpg', '2021-04-27 05:32:12'),
(25, 'meat and fish', 'CHICKEN WINGS', 'Ready-to-fry chicken wings ', '200.00', '230.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/chicken%20wings.jpg', '2021-04-27 05:32:12'),
(26, 'meat and fish', 'CHICKEN NUGGETS', 'Ready-to-fry chicken nuggets (500g per pack)', '200.00', '230.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/nuggets.jpeg', '2021-04-27 05:32:12'),
(27, 'meat and fish', 'SHRIMP', 'Pack of 500g fresh shrimps', '180.00', '205.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/shrimp.jfif', '2021-04-27 05:32:12'),
(28, 'meat and fish', 'TUNA', 'Best quality tuna fish (currently at discount)', '550.00', '580.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/tuna.jpg', '2021-04-27 05:32:12'),
(29, 'meat and fish', 'SMOKED FISH', 'Charcoal smoked fish for added flavour', '200.00', '220.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/smoked%20fish.jpg', '2021-04-27 05:32:12'),
(30, 'meat and fish', 'CRAB', 'Fresh crabs ready-to-boil ', '190.00', '210.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/crab.jpeg', '2021-04-27 05:32:12'),
(31, 'meat and fish', 'CATFISH', 'Fresh delicious cat fish ', '240.00', '265.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/catfish.jpg', '2021-04-27 05:32:12'),
(32, 'grains and bread', 'WHEAT', 'Processed wheat for making flour', '25.00', '30.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/wheat.jpg', '2021-04-27 05:32:12'),
(33, 'grains and bread', 'BARLEY', 'Fine quality barley ', '299.00', '311.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/Barley.jpg', '2021-04-27 05:32:12'),
(34, 'grains and bread', 'RICE', 'Long grain basmati rice at good price', '90.00', '101.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/rice.jpg', '2021-04-27 05:32:12'),
(35, 'grains and bread', 'BROWN BREAD', 'Brown bread pack of 15 slices ', '149.00', '160.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/brown%20bread.jpg', '2021-04-27 05:32:12'),
(36, 'grains and bread', 'WHITE BREAD', 'White bread pack of 20 slices', '50.00', '60.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/white%20bread.jpg', '2021-04-27 05:32:12'),
(37, 'grains and bread', 'BAGUETTE', 'Freshly made baguette breads', '60.00', '62.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/baguette.jpg', '2021-04-27 05:32:12'),
(38, 'grains and bread', 'OATS', 'Healthy oats suitable for breakfast', '150.00', '180.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/OATS.jpg', '2021-04-27 05:32:12'),
(39, 'oil and fat', 'MUSTARD OIL', 'mustard cooking oil ', '130.00', '150.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/MusterdOil.jpg', '2021-04-27 05:32:12'),
(40, 'oil and fat', 'SUNFLOWER OIL', 'Commonly used as frying oil', '140.00', '155.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/sunfloweroil.jpg', '2021-04-27 05:32:12'),
(41, 'oil and fat', 'OLIVE OIL', 'Used for salad seasoning as well as cooking', '120.00', '150.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/olive%20oil.jpg', '2021-04-27 05:32:12'),
(42, 'oil and fat', 'REFINED OIL', 'used commonly for frying', '140.00', '155.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/refinedoil.jpg', '2021-04-27 05:32:12'),
(43, 'oil and fat', 'BUTTER', 'A fat rich dairy product ', '100.00', '115.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/butter.jpg', '2021-04-27 05:32:12'),
(44, 'oil and fat', 'COCONUT OIL', 'oil extracted from coconuts also good for cooking', '400.00', '440.00', 100, 'http://localhost/ASSIGNMENT/PICTURES/coconut%20oil.jpg', '2021-04-27 05:32:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'shrizasom', '$2y$10$W6w02SmBfMH56i6OFykl3.LoWULetNoHvzLflIGJqgGFC/OhpRApW', '2021-09-17 00:23:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
