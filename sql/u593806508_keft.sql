-- --------------------------------------------------------

--
-- Table structure for table `registrationData`
--

CREATE TABLE `registrationData` (
  `id` varchar,
  `first_name`varchar,
  `last_name` varchar ,
  `phone` int,
  `email` varchar,
  `city` varchar,
  `employer` varchar,
  `subjects` varchar,
  `curriculum` varchar,
  `class_size` int,
  `IB curr` varchar,
);

CREate

-- --------------------------------------------------------

--
-- Table structure for table `tempData`
--

CREATE TABLE `tempData` (
  `fName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `verID` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
