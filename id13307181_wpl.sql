-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 01, 2020 at 01:05 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id13307181_wpl`
--

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `email` varchar(30) NOT NULL,
  `level` varchar(30) NOT NULL,
  `stream` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `year` varchar(4) NOT NULL,
  `percent` float NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`email`, `level`, `stream`, `name`, `year`, `percent`, `id`) VALUES
('harshk9800@gmail.com', 'Diploma', 'Science', 'Spit', '2015', 98.54, 3);

-- --------------------------------------------------------

--
-- Table structure for table `exp`
--

CREATE TABLE `exp` (
  `email` varchar(30) NOT NULL,
  `comp` varchar(30) NOT NULL,
  `posn` varchar(30) NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `desr` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exp`
--

INSERT INTO `exp` (`email`, `comp`, `posn`, `sdate`, `edate`, `desr`) VALUES
('harshk9800@gmail.com', 'spit', 'jhvm ', '2020-04-01', '2020-04-24', 'n,sm kmwd x');

-- --------------------------------------------------------

--
-- Table structure for table `per_info`
--

CREATE TABLE `per_info` (
  `email` varchar(30) NOT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `addr` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `image` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `per_info`
--

INSERT INTO `per_info` (`email`, `fname`, `lname`, `contact`, `addr`, `city`, `zip`, `dob`, `gender`, `image`) VALUES
('harshk9800@gmail.com', 'hars', 'kothari', '+919874565287', '12,uhdnnw', 'mum,mah', '400066', '2020-04-17', 'Male', 0x52494646240500005745425056503820180500009031009d012a040118013ed960a74ea825a3222b8821001b09696ee16f69f6b36d0f6a6f28796ee806449eb0f783be0993accc238bfe1fb28ff3dfb2de707e99f602fd6c167c44c76575ba9b01df6f4e5de4812be6210ea0ef212b208c47c584ef7ed1589b8a170320743aa01d88c04238421c386ed78b14137e9578563736749f084d82f2ff955b443a0358dcc8761d777fc04202f3981587a5888c47c38426829c5a7aa479d75e9803990f3328ef6a24c011bb284cd4843c8d3d5bd2290210e0352a34a6b89a38ccb5ef0746bcbae2a0c2efb4c574ac7034ae62dad80db3bcebb05a59ea61251788491e7f52075300731ea015ffff0630676b3bdcefe08df17d80b2aa5ebe078b86489ffe672172b8ec0f8fb516d72a8ef069d8d2579db72ba44ac82422d3d58e1f58b93aeae4aae257612b20908b4f95592619e1ed9f8c0e89e3c5870b2820c775aa4bd818f4036bd50f555512c0a6d0eccf6b2d0cf58bd81b65d0924bc1008e6c76034584c56b54973b07b01c88e7e726124467dfb008be54109b054bd22073aa497bc09bf2d6c45a3ca4aaa000fefcb33c427a45a139c2df03753e472aab22b98b5f6382af3e2003e7347202c62e2634d56d1168d3be0c54a8cf7d57b133c45f1f849b92429f5e00f764cf52941e96ac34f8439a496695f243d1731365e607bb6a6fa6c2f7914a3c009ed508f09d505ea9a163a921b0888e4d14e8aeeb1044a39c54fc88a66b00086f3f6da519296608fba02d67de49dee6efcda8e171bd2c60bd982c218298bc672b9c138628f2ce42f1552aa62f02c51250adb6f750acfe2a2abbbffcbb2236314d55cecd3b6a92d9345dc12697a57129326a67167ee78560f8530eea02fc3456f3651d87626bf9ddc6af795f1e9f7660dac72f4dcbd8150e60a574b18e36cc334a8ecefcb9fbfe3e63915bf3a4b02423940143b5b2fd8f9eae31e6fbb18961a35350fc791f5a0cd43f1b57e431230f767c113d57d5978b802e77bfe9bd1091fee5ee41bcb1858f302850844700668d868876f3a654d28b33003aeb1792de866868f430735b03445c788fd1a203f7b3b1e2c63d3daf922eed612c24707545d6548126e176822cdb73f7eaf67331b172f14f41b3c1e8a8d2fea8150ec3ef6c0c58f6465fa895bfa3935f81f4ab5b9f735da633d7034008ab8f506d456a397ea79abf0fc015b6b4e28a42f5f420ef89bb419abc06e0fd22c2fe8669220ef6595fcee82ec6691ea0d4ea167ffbda524edac639ff08adff0e88a6289d17f531bc9e6154e88e6280878edcd8e50504dffa42eeda8605224e65cf8d44e1ee8f8d40d9f7c67245743bbd1cd8a6edebbfc0598755fc775afba069e0f7d2e2678a0e34c7e34b45c606bf256ed00c3ba25a94c39abe2f8c7814e462d100a6ea56c7ed5b3d87ae96ef102633565b3ffebac918f3fdac0e18920d91b2b480739ce36fe1de089e1f16774eaf2975816057bd8732ba0b0131e0466d380053c830f95887424571bf61b390eb4a4c5e364ecb4a709167c5faaa808604fed0537bde7c7d4e6de1ef0cfaed5a9a70e2eb0a2124b1058a487732a02a8a3a2cca7f71d5b979a6948c4bd5d52b87efb3a2e59dab67e9ebe38c008da2c0a0b2ac68b0d3a51c13e62b9140397e1860e4d90262cbfaaf7eb16bf3abca1c10ac6e4692c383ccf10fc50bbe4722b8a2fc649ec758b9d557b3cfcd6cfc10d64f48de38ab830c02aeed43e4f95adc9609fa0903a1090ebbfbe21947b6d1f84c860e635b1aa160e59b82a4604ae8df51a7a2adb3efec93b7371965e3763f9d3f95106f411772371f6a15a9bbe427544730652c000000);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `email` varchar(30) NOT NULL,
  `sk` varchar(100) DEFAULT NULL,
  `lang` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`email`, `sk`, `lang`) VALUES
('harshk9800@gmail.com', 'asx,nx ', 'hbsnjjsmq,oissm al'),
('rounak.jaiswal@spit.ac.in', NULL, NULL),
('utkarsh.jain@spit.ac.in', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`, `password`) VALUES
('harsh', 'harshk1800@gmail.com', '123'),
('Harsh', 'harshk9800@gmail.com', '123'),
('Rounak', 'rounak.jaiswal@spit.ac.in', '123'),
('utkarsh', 'utkarsh.jain@spit.ac.in', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `per_info`
--
ALTER TABLE `per_info`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
