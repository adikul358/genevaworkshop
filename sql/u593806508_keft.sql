CREATE TABLE `registered_data` (
  `id` varchar(50),
  `first_name`varchar(1600),
  `last_name` varchar(1600) ,
  `phone` int,
  `email` varchar(1600),
  `city` varchar(1600),
  `employer` varchar(1600),
  `subjects` varchar(1600),
  `curriculum` varchar(1600),
  `class_size` int,
  `IB_curr` varchar(1600),
  PRIMARY KEY (`id`)
);

CREATE TABLE `temp_data` (
  `id` varchar(50),
  `first_name`varchar(1600),
  `last_name` varchar(1600) ,
  `phone` int,
  `email` varchar(1600),
  `city` varchar(1600),
  `employer` varchar(1600),
  `subjects` varchar(1600),
  `curriculum` varchar(1600),
  `class_size` int,
  `IB_curr` varchar(1600),
  PRIMARY KEY (`id`)
);

CREATE TABLE `writeup_data` (
  `id` varchar(50),
  `participate_reason` varchar(1600),
  `concept_teaching` varchar(1600),
  `apply1` varchar(1600),
  `apply2` varchar(1600),
  `apply3` varchar(1600),
  FOREIGN KEY (`id`) REFERENCES `registered_data`(`id`)
);

CREATE TABLE `temp_writeup_data` (
  `id` varchar(50),
  `participate_reason` varchar(1600),
  `concept_teaching` varchar(1600),
  `apply1` varchar(1600),
  `apply2` varchar(1600),
  `apply3` varchar(1600),
  FOREIGN KEY (`id`) REFERENCES `temp_data`(`id`)
);