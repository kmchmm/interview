CREATE TABLE `applicant_table` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100)NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(10)NOT NULL,
  `cellphone_no` varchar(20) NOT NULL,
  `address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `applicant_table`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `applicant_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;