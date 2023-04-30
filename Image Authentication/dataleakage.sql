
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `dataleakage`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `askkey`
--

CREATE TABLE `askkey` (
  `id` int(10) NOT NULL,
  `user` varchar(50) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `reciver` varchar(50) NOT NULL,
  `k` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `askkey`
--

INSERT INTO `askkey` (`id`, `user`, `filename`, `status`, `reciver`, `k`) VALUES
(28, 'agent2', 'data5', 'yes', 'admin', 'key5'),
(29, 'agent2', 'data5', 'yes', 'admin', 'key5'),
(30, 'agent1', 'data2', 'yes', 'admin', 'key2'),
(31, 'agent3', 'data6', 'yes', 'admin', 'key6'),
(33, 'agent4', 'data3', 'yes', 'admin', 'key3'),
(34, 'agent1', 'data1', 'no', 'admin', ''),
(35, 'agent4', 'data4', 'yes', 'admin', 'key4'),
(36, 'agent1', 'data3', 'no', 'admin', ''),
(37, 'agent1', 'data3', 'no', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `leaker`
--

CREATE TABLE `leaker` (
  `id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `probability` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaker`
--

INSERT INTO `leaker` (`id`, `name`, `probability`) VALUES
('agent1', 'agent1', 0.64),
('agent2', 'agent2', 0.736),
('agent3', 'agent3', 0.56),
('agent4', 'agent4', 0),
('agent6', 'agent6', 0),
('user1', 'name1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `id` int(10) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `reciver` varchar(50) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`id`, `sender`, `email`, `reciver`, `msg`) VALUES
(20, 'admin', 'agent1@gmail.com', 'agent1', 'xyz');

-- --------------------------------------------------------

--
-- Table structure for table `presentation`
--

CREATE TABLE `presentation` (
  `subject` varchar(50) NOT NULL,
  `Topic` text NOT NULL,
  `fname` varchar(100) NOT NULL,
  `time` date NOT NULL,
  `objNames` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presentation`
--

INSERT INTO `presentation` (`subject`, `Topic`, `fname`, `time`, `objNames`) VALUES
('data1', 'key1', 'T1.txt', '0000-00-00', 't1,t2,t3,t4,t5,t6,t7,t8,t9,t10'),
('data2', 'key2', 'T2.txt', '0000-00-00', 't2,t4,t6,t8,t10,t12'),
('data3', 'key3', 'T3.txt', '0000-00-00', 't1,t3,t5,t7,t9,t11'),
('data4', 'key4', 'T4.txt', '0000-00-00', 't1,t2,t3,t4,t5'),
('data5', 'key5', 'T5.txt', '0000-00-00', 't6,t7,t8,t9,t10'),
('data6', 'key6', 'T6.txt', '0000-00-00', 't1,t7,t9,t4,t5');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `subject` varchar(50) NOT NULL,
  `Topic` text NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `time` date NOT NULL,
  `sendto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`subject`, `Topic`, `fname`, `time`, `sendto`) VALUES
('data5', 'key5', NULL, '0000-00-00', 'agent2'),
('data2', 'key2', NULL, '0000-00-00', 'agent1'),
('data6', 'key6', NULL, '0000-00-00', 'agent3'),
('data3', 'key3', NULL, '0000-00-00', 'agent4'),
('data4', 'key4', NULL, '0000-00-00', 'agent4');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `userid` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `emailid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`username`, `userid`, `password`, `emailid`) VALUES
('agent1', 'agent1', 'agent1', 'agent1@gmail.com'),
('agent2', 'agent2', 'agent2', 'agent2@gmail.com'),
('agent3', 'agent3', 'agent3', 'agent3@gmail.com'),
('agent4', 'agent4', 'agent4', 'agent4@gmail.com'),
('agent5', 'agent5', 'agent5', 'agent5@gmail.com'),
('agent6', 'agent6', 'agent6', 'agent6@gmail.com'),
('user1.0', 'user1.0', 'user1.0', 'user1.0@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `askkey`
--
ALTER TABLE `askkey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaker`
--
ALTER TABLE `leaker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `askkey`
--
ALTER TABLE `askkey`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
